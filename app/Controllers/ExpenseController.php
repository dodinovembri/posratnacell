<?php

namespace App\Controllers;

use App\Models\ExpenseModel;
use CodeIgniter\I18n\Time;

class ExpenseController extends BaseController
{

    public function index()
    {
        // product
        $app = new ExpenseModel();
        $warehouse = session()->get('warehouse');
        $date_now = Time::now('Asia/Jakarta')->toDateString();

        $data['expenses'] = $app->table('expense')
            ->where('warehouse', $warehouse)
            ->where('DATE(date)', $date_now)
            ->orderBy('id', 'DESC')
            ->get()
            ->getResult();

        return view('expense/index', $data);
    }

    public function create()
    {
        return view('expense/create');
    }

    public function store()
    {
        $expense = new ExpenseModel();
        $warehouse = session()->get('warehouse');

        $expense->insert([
            'description' => $this->request->getPost('description'),
            'amount' => intval(str_replace('.', '', $this->request->getPost('amount'))),
            'date' => Time::now('Asia/Jakarta'),
            'warehouse' => $warehouse,
            'user' => session()->get('name')
        ]);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('expense'));
    }

    public function edit($id)
    {
        $expense = new ExpenseModel();
        $data['expense'] = $expense->where('id', $id)->get()->getFirstRow();

        return view('expense/edit', $data);
    }

    public function update($id)
    {
        $update = new ExpenseModel();
        $update->update($id, [
            'description' => $this->request->getPost('description'),
            'amount' => intval(str_replace('.', '', $this->request->getPost('amount'))),
            'modified_at' => Time::now('Asia/Jakarta'),
            'modified_by' => session()->get('name')
        ]);

        session()->setFlashdata('success', 'Data Berhasil Diubah');
        return redirect()->to(base_url('expense'));
    }
}
