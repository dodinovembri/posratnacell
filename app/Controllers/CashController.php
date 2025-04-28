<?php

namespace App\Controllers;

use App\Models\CashOpenModel;
use App\Models\CashCloseModel;
use CodeIgniter\I18n\Time;

class CashController extends BaseController
{

    public function index()
    {
        // product
        $warehouse = session()->get('warehouse');
        $role = session()->get('role');
        $data['desc_cash'] = null;
        $data['cash_session'] = null;

        if ($role == "owner") {
            return view('cash/index_owner', $data);
        } else {
            $cash_open = new CashOpenModel();
            $data['cash_open'] = $cash_open->table('cash_open')
                ->where('warehouse', $warehouse)
                ->get()
                ->getFirstRow();

            $cash_close = new CashCloseModel();
            $data['cash_close'] = $cash_close->table('cash_close')
                ->where('warehouse', $warehouse)
                ->get()
                ->getFirstRow();

            return view('cash/index', $data);
        }

    }

    public function melati()
    {
        $cash_open = new CashOpenModel();
        $data['desc_cash'] = "Cash Melati";
        $data['cash_session'] = "melati";
        $data['cash_open'] = $cash_open->table('cash_open')
            ->where('warehouse', "melati")
            ->get()
            ->getFirstRow();

        $cash_close = new CashCloseModel();
        $data['cash_close'] = $cash_close->table('cash_close')
            ->where('warehouse', "melati")
            ->get()
            ->getFirstRow();
        
        return view('cash/index', $data);
    }

    public function srengseng()
    {
        $cash_open = new CashOpenModel();
        $data['desc_cash'] = "Cash Srengseng";
        $data['cash_session'] = "srengseng";
        $data['cash_open'] = $cash_open->table('cash_open')
            ->where('warehouse', "srengseng")
            ->get()
            ->getFirstRow();

        $cash_close = new CashCloseModel();
        $data['cash_close'] = $cash_close->table('cash_close')
            ->where('warehouse', "srengseng")
            ->get()
            ->getFirstRow();
        
        return view('cash/index', $data);
    }

    public function store_cash_open()
    {
        $insert = new CashOpenModel();

        $insert->insert([
            '100ribu' => $this->request->getPost('cash_open_100ribu'),
            '50ribu' => $this->request->getPost('cash_open_50ribu'),
            '20ribu' => $this->request->getPost('cash_open_20ribu'),
            '10ribu' => $this->request->getPost('cash_open_10ribu'),
            '5ribu' => $this->request->getPost('cash_open_5ribu'),
            '2ribu' => $this->request->getPost('cash_open_2ribu'),
            '1ribu' => $this->request->getPost('cash_open_1ribu'),
            '500perak' => $this->request->getPost('cash_open_500perak'),
            'date' => Time::now('Asia/Jakarta'),
            'user' => session()->get('name'),
            'warehouse' =>  $this->request->getPost('cash_session')
        ]);

        session()->setFlashdata('success', 'Success update data');
        return redirect()->to(base_url('cash'));
    }

    public function update_cash_open($id)
    {
        $update = new CashOpenModel();

        $update->update($id, [
            '100ribu' => $this->request->getPost('cash_open_100ribu'),
            '50ribu' => $this->request->getPost('cash_open_50ribu'),
            '20ribu' => $this->request->getPost('cash_open_20ribu'),
            '10ribu' => $this->request->getPost('cash_open_10ribu'),
            '5ribu' => $this->request->getPost('cash_open_5ribu'),
            '2ribu' => $this->request->getPost('cash_open_2ribu'),
            '1ribu' => $this->request->getPost('cash_open_1ribu'),
            '500perak' => $this->request->getPost('cash_open_500perak'),
            'modified_at' => Time::now('Asia/Jakarta'),
            'modified_by' => session()->get('name')
        ]);

        session()->setFlashdata('success', 'Success update data');
        return redirect()->to(base_url('cash'));
    }

    public function store_cash_close()
    {
        $insert = new CashCloseModel();
        $warehouse = session()->get('warehouse');

        $insert->insert([
            '100ribu' => $this->request->getPost('cash_close_100ribu'),
            '50ribu' => $this->request->getPost('cash_close_50ribu'),
            '20ribu' => $this->request->getPost('cash_close_20ribu'),
            '10ribu' => $this->request->getPost('cash_close_10ribu'),
            '5ribu' => $this->request->getPost('cash_close_5ribu'),
            '2ribu' => $this->request->getPost('cash_close_2ribu'),
            '1ribu' => $this->request->getPost('cash_close_1ribu'),
            '500perak' => $this->request->getPost('cash_close_500perak'),
            'date' => Time::now('Asia/Jakarta'),
            'user' => session()->get('name'),
            'warehouse' => $warehouse
        ]);

        session()->setFlashdata('success', 'Success update data');
        return redirect()->to(base_url('cash'));
    }

    public function update_cash_close($id)
    {
        $update = new CashCloseModel();
        $warehouse = session()->get('warehouse');

        $update->update($id, [
            '100ribu' => $this->request->getPost('cash_close_100ribu'),
            '50ribu' => $this->request->getPost('cash_close_50ribu'),
            '20ribu' => $this->request->getPost('cash_close_20ribu'),
            '10ribu' => $this->request->getPost('cash_close_10ribu'),
            '5ribu' => $this->request->getPost('cash_close_5ribu'),
            '2ribu' => $this->request->getPost('cash_close_2ribu'),
            '1ribu' => $this->request->getPost('cash_close_1ribu'),
            '500perak' => $this->request->getPost('cash_close_500perak'),
            'modified_at' => Time::now('Asia/Jakarta'),
            'modified_by' => session()->get('name'),
            'warehouse' => $warehouse
        ]);

        session()->setFlashdata('success', 'Success update data');
        return redirect()->to(base_url('cash'));
    }

    public function destroy($id)
    {
        // 
    }
}
