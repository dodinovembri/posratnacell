<?php

namespace App\Models;
use CodeIgniter\Model;

class BalanceAdjustmentModel extends Model {
    protected $table = 'balance_adjustment';
    protected $primaryKey = 'id';
    protected $allowedFields = ['balance_id', 'description', 'indicator', 'amount', 'user', 'warehouse', 'date', 'modified_at', 'modified_by'];
}

