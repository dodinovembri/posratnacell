<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model {
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'code', 'name', 'base_price', 'selling_price', 'product_type', 'created_at', 'modified_at', 'modified_by'];
}

