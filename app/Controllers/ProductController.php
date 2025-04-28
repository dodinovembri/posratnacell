<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\StockModel;
use CodeIgniter\I18n\Time;

class ProductController extends BaseController
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
        $role = session()->get('role');

        if ($role == "owner") {
            $data['products'] = $app->table('product')
                ->select('product.*, stock.qty')
                ->join('stock', 'product.id = stock.product_id', 'right')
                ->get()
                ->getResult();
        } else {
            $data['products'] = $app->table('product')
                ->select('product.*, stock.qty')
                ->join('stock', 'product.id = stock.product_id', 'right')
                ->where('warehouse', $warehouse)
                ->get()
                ->getResult();
        }

        return view('product/index', $data);
    }

    public function create_fee_fixed()
    {
        return view('product/create_fee_fixed');
    }

    public function store_fee_fixed()
    {
        $app = new ProductModel();

        $app->insert([
            'code' => $this->request->getPost('code'),
            'name' => $this->request->getPost('name'),
            'base_price' => intval($this->request->getPost('base_price')),
            'selling_price' => intval($this->request->getPost('selling_price')),
            'product_type' => "fee_fixed",
            'created_at' => Time::now('Asia/Jakarta')
        ]);

        $last_id = $this->db->insertID();

        $qty_melati = $this->request->getPost('qty_melati');
        if ($qty_melati > 0) {
            $melati = new StockModel();

            $melati->insert([
                'product_id' => $last_id,
                'warehouse' => "melati",
                'qty' => $this->request->getPost('qty_melati'),
                'qty_alert' => $this->request->getPost('qty_alert')
            ]);
        }

        $qty_srengseng = $this->request->getPost('qty_srengseng');
        if ($qty_srengseng > 0) {
            $srengseng = new StockModel();

            $srengseng->insert([
                'product_id' => $last_id,
                'warehouse' => "srengseng",
                'qty' => $this->request->getPost('qty_srengseng'),
                'qty_alert' => $this->request->getPost('qty_alert')
            ]);
        }

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('product'));
    }

    public function create_fee_transfer()
    {
        return view('product/create_fee_transfer');
    }

    public function store_fee_transfer()
    {
        $app = new ProductModel();

        $app->insert([
            'code' => $this->request->getPost('code'),
            'name' => $this->request->getPost('name'),
            'product_type' => "fee_transfer",
            'created_at' => Time::now('Asia/Jakarta')
        ]);

        $last_id = $this->db->insertID();

        $melati = new StockModel();
        $melati->insert([
            'product_id' => $last_id,
            'warehouse' => "melati"
        ]);
        
        $srengseng = new StockModel();
        $srengseng->insert([
            'product_id' => $last_id,
            'warehouse' => "srengseng"
        ]);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('product'));
    }

    public function create_fee_package()
    {
        return view('product/create_fee_package');
    }

    public function store_fee_package()
    {
        $app = new ProductModel();

        $app->insert([
            'code' => $this->request->getPost('code'),
            'name' => $this->request->getPost('name'),
            'product_type' => "fee_package",
            'created_at' => Time::now('Asia/Jakarta')
        ]);

        $last_id = $this->db->insertID();

        $melati = new StockModel();
        $melati->insert([
            'product_id' => $last_id,
            'warehouse' => "melati"
        ]);
        
        $srengseng = new StockModel();
        $srengseng->insert([
            'product_id' => $last_id,
            'warehouse' => "srengseng"
        ]);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('product'));
    }
}
