<?php

namespace App\Controllers;
use App\Models\SalesModel;

class HomeController extends BaseController
{
    public function dashboard()
    {
        $sales = new SalesModel();
        $warehouse = session()->get('warehouse');

        $data['sales'] = $sales->table('sales')
        ->select('sales.product_code, sales.amount, sales.date, product.name')
        ->join('product', 'product.id = sales.product_id', 'right')
        ->where('warehouse', $warehouse)
        ->orderBy('sales.id', 'DESC')
        ->get()
        ->getResult();

        // return json_encode($data['sales']);
        return view('home/index', $data);
    }
}
