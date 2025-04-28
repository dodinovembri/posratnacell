<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\StockModel;

class AdjustmentController extends BaseController
{

    public function index()
    {
        $product = new ProductModel();

        $data['products'] = $product->table('product')
            ->whereNotIn('id', function ($builder) {
                return $builder->select('product_id')->from('stock')->where('warehouse', session()->get('warehouse'));
            })
            ->get()
            ->getResult();

        return view('adjustment/index', $data);
    }

    public function create($id)
    {
        $product = new ProductModel();

        $data['product'] = $product->table('product')
            ->where('id', $id)
            ->get()
            ->getFirstRow();

        return view('adjustment/create', $data);
    }

    public function store()
    {
        $qty = new StockModel();
        $qty->insert([
            'product_id' => $this->request->getPost('id'),
            'warehouse' => session()->get('warehouse'),
            'qty' => $this->request->getPost('qty'),
            'qty_alert' => $this->request->getPost('qty_alert')
        ]);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('product'));
    }
}
