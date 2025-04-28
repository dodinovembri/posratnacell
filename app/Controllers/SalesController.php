<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\StockModel;
use App\Models\SalesModel;
use CodeIgniter\I18n\Time;

class SalesController extends BaseController
{

    public function index()
    {
        $sales = new SalesModel();
        $warehouse = session()->get('warehouse');
        $date_now = Time::now('Asia/Jakarta')->toDateString();


        $data['sales'] = $sales->table('sales')
            ->select('sales.product_code, sales.amount, sales.date, product.name')
            ->join('product', 'product.id = sales.product_id', 'right')
            ->where('warehouse', $warehouse)
            ->where('DATE(date)', $date_now)
            ->orderBy('sales.id', 'DESC')
            ->get()
            ->getResult();

        return view('sales/index', $data);
    }

    public function ajax_result()
    {
        $product = new ProductModel();
        $keyword = $this->request->getPost('keyword');

        $data['results'] = $product->table('product')
            ->join('stock', 'product.id = stock.product_id', 'right')
            ->distinct()
            ->where('warehouse', session()->get('warehouse'))
            ->groupStart() // Grouping untuk LIKE dan OR LIKE
            ->like('name', $keyword)
            ->orLike('code', $keyword)
            ->groupEnd() // Tutup grup
            ->get()
            ->getResult();


        return view('sales/search_result_ajax', $data);
    }

    public function create($id)
    {
        // product
        $product = new ProductModel();
        $warehouse = session()->get('warehouse');

        $data['product'] = $product->table('product')
            ->select('product.*, stock.qty, stock.qty_alert')
            ->join('stock', 'product.id = stock.product_id', 'right')
            ->where('warehouse', $warehouse)
            ->where('stock.product_id', $id)->get()->getFirstRow();

        return view('sales/create', $data);
    }

    public function store_fee_fixed()
    {
        $product = new ProductModel();
        $warehouse = session()->get('warehouse');
        $product_id = $this->request->getPost('product_id');

        $productdb = $product->table('product')
            ->select('product.*, stock.qty, stock.qty_alert, stock.id as stock_id')
            ->join('stock', 'product.id = stock.product_id', 'right')
            ->where('warehouse', $warehouse)
            ->where('stock.product_id', $product_id)->get()->getFirstRow();

        $qty_order = intval($this->request->getPost('qty_order'));
        $discount = intval($this->request->getPost('discount'));
        $final_amount = ($qty_order * $productdb->selling_price) - $discount;

        $sales = new SalesModel();
        $sales->insert([
            'product_id' => $productdb->id,
            'product_code' => $productdb->code,
            'qty' => $this->request->getPost('qty_order'),
            'base_price' => $productdb->base_price,
            'selling_price' => $productdb->selling_price,
            'amount' => $final_amount,
            'discount' => $discount,
            'date' => Time::now('Asia/Jakarta'),
            'warehouse' => $warehouse,
            'user' => session()->get('name'),
        ]);

        // update stock
        $aftersale_stock = $productdb->qty - $qty_order;

        $stock = new StockModel();
        $stock->update($productdb->stock_id, [
            'qty' => $aftersale_stock,
            'modified_at' => Time::now('Asia/Jakarta'),
            'modified_by' => session()->get('name')
        ]);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('sales'));
    }

    public function store_fee_transfer()
    {
        $product = new ProductModel();
        $warehouse = session()->get('warehouse');
        $product_id = $this->request->getPost('product_id');

        $productdb = $product->table('product')
            ->select('product.*, stock.qty, stock.qty_alert, stock.id as stock_id')
            ->join('stock', 'product.id = stock.product_id', 'right')
            ->where('warehouse', $warehouse)
            ->where('stock.product_id', $product_id)->get()->getFirstRow();

        $base_price = intval(str_replace('.', '', $this->request->getPost('base_price')));
        $admin_fee = intval(str_replace('.', '', $this->request->getPost('admin_fee')));
        $final_amount = $base_price + $admin_fee;

        $sales = new SalesModel();
        $sales->insert([
            'product_id' => $productdb->id,
            'product_code' => $productdb->code,
            'qty' => 1,
            'base_price' => $base_price,
            'selling_price' => $final_amount,
            'amount' => $final_amount,
            'date' => Time::now('Asia/Jakarta'),
            'warehouse' => $warehouse,
            'user' => session()->get('name'),
        ]);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('sales'));
    }

    public function store_fee_package()
    {
        $product = new ProductModel();
        $warehouse = session()->get('warehouse');
        $product_id = $this->request->getPost('product_id');

        $productdb = $product->table('product')
            ->select('product.*, stock.qty, stock.qty_alert, stock.id as stock_id')
            ->join('stock', 'product.id = stock.product_id', 'right')
            ->where('warehouse', $warehouse)
            ->where('stock.product_id', $product_id)->get()->getFirstRow();

        $base_price = intval(str_replace('.', '', $this->request->getPost('base_price')));
        $selling_price = intval(str_replace('.', '', $this->request->getPost('selling_price')));
        $final_amount = $selling_price;

        $sales = new SalesModel();
        $sales->insert([
            'product_id' => $productdb->id,
            'product_code' => $productdb->code,
            'qty' => 1,
            'base_price' => $base_price,
            'selling_price' => $selling_price,
            'amount' => $final_amount,
            'date' => Time::now('Asia/Jakarta'),
            'warehouse' => $warehouse,
            'user' => session()->get('name'),
        ]);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('sales'));
    }
}
