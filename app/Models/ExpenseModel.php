<?php

namespace App\Models;
use CodeIgniter\Model;

class ExpenseModel extends Model {
    protected $table = 'expense';
    protected $primaryKey = 'id';
    protected $allowedFields = ['description', 'amount', 'date', 'warehouse', 'user', 'modified_at', 'modified_by'];
}

