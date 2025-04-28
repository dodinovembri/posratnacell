<?php

namespace App\Controllers;

use App\Models\BalanceModel;
use App\Models\BalanceAdjustmentModel;
use CodeIgniter\I18n\Time;

class BalanceController extends BaseController
{

    public function index()
    {
        $balance = new BalanceModel();
        $warehouse = session()->get('warehouse');
        $role = session()->get('role');

        $date_now = Time::now('Asia/Jakarta')->toDateString();
        $date_yesterday = Time::now('Asia/Jakarta')->subDays(1)->toDateString();

        // check balance tanggal hari ini
        $today_balance = $balance->table('balance')
            ->where('DATE(date)', $date_now)
            ->get()
            ->getResult();

        if (count($today_balance) == 0) {
            // check balance tanggal sebelumnya
            $last_date_balance = $balance->table('balance')
                ->where('DATE(date)', $date_yesterday)
                ->get()
                ->getResult();

            // store new balance
            $insert = new BalanceModel();
            foreach ($last_date_balance as $key => $value) {
                $insert->insert([
                    'app_name' => $value->app_name,
                    'balance_open' => $value->balance_close,
                    'status' => $value->status,
                    'date' => Time::now('Asia/Jakarta'),
                    'warehouse' => $value->warehouse
                ]);
            }
        }

        $data['balance_desc'] = null;
        $data['balance_session'] = null;
        $data['warehouse'] = null;


        if ($role == "owner") {
            return view('balance/index_owner', $data);
        } else {
            $balance = new BalanceModel();
            $data['balances'] = $balance->table('balance')
                ->where('warehouse', $warehouse)
                ->where('DATE(date)', $date_now)
                ->get()
                ->getResult();

            return view('balance/index', $data);
        }
    }

    public function update_balance($id)
    {
        if (session()->get('role') == "owner") {
            $warehouse = $this->request->getPost('warehouse');
        } else {
            $warehouse = session()->get('warehouse');
        }

        if (!is_null($this->request->getPost('indicator_adjust'))) {
            $balance_adjustment = new BalanceAdjustmentModel();
            $balance_adjustment->insert([
                'balance_id' => $id,
                'description' => $this->request->getPost('adjust_description'),
                'indicator' => $this->request->getPost('indicator_adjust'),
                'amount' => $this->request->getPost('adjust_amount'),
                'user' => session()->get('name'),
                'warehouse' => $warehouse,
                'date' => Time::now('Asia/Jakarta')
            ]);

            if ($this->request->getPost('indicator_adjust') == "plus") {
                $balanceModel = new BalanceModel();
                $balance = $balanceModel->find($id);

                $update_balance = new BalanceModel();
                $update_balance->update($id, [
                    'balance_open' => $balance['balance_open'] + intval($this->request->getPost('adjust_amount')),
                    'modified_at' => Time::now('Asia/Jakarta'),
                    'modified_by' => session()->get('name')
                ]);
            } else if ($this->request->getPost('indicator_adjust') == "minus") {
                $balanceModel = new BalanceModel();
                $balance = $balanceModel->find($id);

                $update_balance = new BalanceModel();
                $update_balance->update($id, [
                    'balance_open' => $balance['balance_open'] - intval($this->request->getPost('adjust_amount')),
                    'modified_at' => Time::now('Asia/Jakarta'),
                    'modified_by' => session()->get('name')
                ]);
            }
        }

        if ($this->request->getPost('balance_close') != "") {
            $update = new BalanceModel();
            $update->update($id, [
                'balance_close' => intval($this->request->getPost('balance_close')),
                'modified_at' => Time::now('Asia/Jakarta'),
                'modified_by' => session()->get('name')
            ]);
        }

        session()->setFlashdata('success', 'Success update data');
        return redirect()->to(base_url('balance'));
    }

    public function get_data_by_id()
    {
        if (session()->get('role') == "owner") {
            $warehouse = $this->request->getPost('warehouse');
        } else {
            $warehouse = session()->get('warehouse');
        }

        $id = $this->request->getPost('id'); // Ambil id dari AJAX        
        $date_now = Time::now('Asia/Jakarta')->toDateString();

        $balance = new BalanceAdjustmentModel();
        $data['balance_adjustments'] = $balance->table('balance_adjustment')
                ->where('warehouse', $warehouse)
                ->where('DATE(date)', $date_now)
                ->where('balance_id', $id)
                ->orderBy('id', 'DESC')
                ->get()
                ->getResult();

        return view('balance/modal_data_view', $data); // View khusus isi modal
    }

    public function melati()
    {
        $data['warehouse'] = "melati";

        $balance = new BalanceModel();
        $data['balance_desc'] = "Saldo Aplikasi Melati";
        $data['balances'] = $balance->table('balance')
            ->where('warehouse', "melati")
            ->get()
            ->getResult();

        return view('balance/index', $data);
    }

    public function srengseng()
    {
        $data['warehouse'] = "srengseng";

        $balance = new BalanceModel();
        $data['balance_desc'] = "Saldo Aplikasi Srengseng";
        $data['balances'] = $balance->table('balance')
            ->where('warehouse', "srengseng")
            ->get()
            ->getResult();

        return view('balance/index', $data);
    }

}
