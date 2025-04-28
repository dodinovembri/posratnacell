<?php

namespace App\Models;
use CodeIgniter\Model;

class CashOpenModel extends Model {
    protected $table = 'cash_open';
    protected $primaryKey = 'id';
    protected $allowedFields = ['100ribu', '50ribu', '20ribu', '10ribu', '5ribu', '2ribu', '1ribu', '500perak', 'date', 'warehouse', 'user', 'modified_at', 'modified_by'];
}

