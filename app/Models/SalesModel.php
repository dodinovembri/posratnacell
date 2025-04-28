<?php

namespace App\Models;
use CodeIgniter\Model;

class SalesModel extends Model {
    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'product_code', 'qty', 'base_price', 'selling_price', 'amount', 'discount', 'date', 'warehouse', 'user', 'modified_date', 'modified_by'];
}

