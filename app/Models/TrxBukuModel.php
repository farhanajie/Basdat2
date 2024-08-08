<?php

namespace App\Models;

use CodeIgniter\Model;

class TrxBukuModel extends Model
{
    protected $table = 'trxbuku';

    public function insertTrxBuku($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
