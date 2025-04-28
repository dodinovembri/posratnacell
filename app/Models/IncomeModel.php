<?php

namespace App\Models;
use CodeIgniter\Model;

class IncomeModel extends Model {
    protected $table = 'income';
    protected $primaryKey = 'id';
    protected $allowedFields = ['description', 'amount', 'date', 'warehouse', 'user', 'modified_at', 'modified_by'];
}

