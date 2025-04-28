<?php

namespace App\Controllers;

use App\Models\IncomeModel;
use CodeIgniter\I18n\Time;

class IncomeController extends BaseController
{

    public function index()
    {
        // product
        $app = new IncomeModel();
        $warehouse = session()->get('warehouse');
        $date_now = Time::now('Asia/Jakarta')->toDateString();

        $data['incomes'] = $app->table('income')
            ->where('warehouse', $warehouse)
            ->where('DATE(date)', $date_now)
            ->orderBy('id', 'DESC')
            ->get()
            ->getResult();
        
        return view('income/index', $data);
    }


    public function create()
    {
        return view('income/create');
    }

    public function store()
    {
        $income = new IncomeModel();
        $warehouse = session()->get('warehouse');
    
        $income->insert([
            'description' => $this->request->getPost('description'),
            'amount' => intval(str_replace('.', '', $this->request->getPost('amount'))),
            'date' => Time::now('Asia/Jakarta'),
            'warehouse' => $warehouse,
            'user' => session()->get('name')
        ]);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('income'));
    } 

    public function edit($id)
    {
        $income = new IncomeModel();
        $data['income'] = $income->where('id', $id)->get()->getFirstRow();

        return view('income/edit', $data);
    }

    public function update($id)
    {
        $update = new IncomeModel();
        $update->update($id, [
            'description' => $this->request->getPost('description'),
            'amount' => intval(str_replace('.', '', $this->request->getPost('amount'))),
            'modified_at' => Time::now('Asia/Jakarta'),
            'modified_by' => session()->get('name')
        ]);

        session()->setFlashdata('success', 'Data Berhasil Diubah');
        return redirect()->to(base_url('income'));
    }

    public function destroy($id)
    {
        // 
    }
}
