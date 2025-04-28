<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\StockModel;
use App\Models\PurchaseModel;
use CodeIgniter\I18n\Time;

class PurchaseController extends BaseController
{

    public function index()
    {
        $purchase = new PurchaseModel();
        $warehouse = session()->get('warehouse');
        $date_now = Time::now('Asia/Jakarta')->toDateString();

        $data['purchases'] = $purchase->table('purchase')
            ->select('purchase.product_code, purchase.amount, purchase.date, product.name')
            ->join('product', 'product.id = purchase.product_id', 'right')
            ->where('warehouse', $warehouse)
            ->where('DATE(date)', $date_now)
            ->orderBy('purchase.id', 'DESC')
            ->get()
            ->getResult();

        return view('purchase/index', $data);
    }

    public function ajax_result()
    {
        $product = new ProductModel();
        $keyword = $this->request->getPost('keyword');

        $data['results'] = $product->table('product')
            ->join('stock', 'product.id = stock.product_id', 'right')
            ->where('warehouse', session()->get('warehouse'))
            ->where('product_type', 'fee_fixed')
            ->groupStart()
            ->like('name', $keyword)
            ->orLike('code', $keyword)
            ->groupEnd()
            ->get()
            ->getResult();


        return view('purchase/search_result_ajax', $data);
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

        return view('purchase/create', $data);
    }

    public function store()
    {
        $product = new ProductModel();
        $warehouse = session()->get('warehouse');
        $product_id = $this->request->getPost('product_id');

        $productdb = $product->table('product')
            ->select('product.*, product.id as productid, stock.qty, stock.qty_alert, stock.id as stock_id')
            ->join('stock', 'product.id = stock.product_id', 'right')
            ->where('warehouse', $warehouse)
            ->where('stock.product_id', $product_id)->get()->getFirstRow();

        $qty_order = intval($this->request->getPost('qty_order'));
        $base_price = intval($this->request->getPost('base_price'));
        
        $final_amount = $qty_order * $base_price;
        
        $sales = new PurchaseModel();
        $sales->insert([
            'product_id' => $productdb->id,
            'product_code' => $productdb->code,
            'qty' => $qty_order,
            'base_price' => $base_price,
            'amount' => $final_amount,
            'date' => Time::now('Asia/Jakarta'),
            'warehouse' => $warehouse,
            'user' => session()->get('name'),
        ]);
        
        // update stock
        $aftersale_stock = $productdb->qty + $qty_order;
        
        $stock = new StockModel();
        $stock->update($productdb->stock_id, [
            'qty' => $aftersale_stock,
            'modified_at' => Time::now('Asia/Jakarta'),
            'modified_by' => session()->get('name')
        ]);
        
        // update product base price
        $new_base_price = ($base_price + $productdb->base_price) / 2;
        
        if ($productdb->base_price != $new_base_price) {
            $product = new ProductModel();
            $product->update($productdb->productid, [
                'base_price' => $new_base_price,
                'modified_at' => Time::now('Asia/Jakarta'),
                'modified_by' => session()->get('name')
            ]);
        }

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('purchase'));
    }
}
