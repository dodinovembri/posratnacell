<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\StockModel;
use CodeIgniter\I18n\Time;

class StockController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // product
        $app = new ProductModel();
        $warehouse = session()->get('warehouse');

        $data['products'] = $app->table('product')
            ->select('product.*, stock.qty, stock.id as stock_id')
            ->join('stock', 'product.id = stock.product_id', 'right')
            ->where('warehouse', $warehouse)
            ->where('stock.modified_at IS NULL')
            ->where('product.product_type', 'fee_fixed')
            ->get()
            ->getResult();

        return view('stock/index', $data);
    }

    function update($id)
    {
        $stock = new StockModel();

        $stock->update($id, [
            'qty' => $this->request->getPost('stock'),
            'modified_at' => Time::now('Asia/Jakarta'),
            'modified_by' => session()->get('name')
        ]);
        

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('stock'));
    }
}
