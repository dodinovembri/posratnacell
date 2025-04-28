<?php

namespace App\Models;
use CodeIgniter\Model;

class BalanceModel extends Model {
    protected $table = 'balance';
    protected $primaryKey = 'id';
    protected $allowedFields = ['app_name', 'balance_open', 'balance_close', 'status', 'date', 'warehouse', 'user', 'modified_at', 'modified_by'];
}

