<?php

namespace App\Models;
use CodeIgniter\Model;

class StockModel extends Model {
    protected $table = 'stock';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'warehouse', 'qty', 'qty_alert', 'modified_at', 'modified_by'];
}

