<?php

namespace App\Models;
use CodeIgniter\Model;

class PurchaseModel extends Model {
    protected $table = 'purchase';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'product_code', 'qty', 'base_price', 'selling_price', 'amount', 'date', 'warehouse', 'user', 'modified_at', 'modified_by'];
}

