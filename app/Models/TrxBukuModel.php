<?php

namespace App\Models;

use CodeIgniter\Model;

class TrxBukuModel extends Model
{
    protected $table = 'trxbuku';

    public function getTrxBuku($id = false)
    {
        if (!$id) {
            return $this->get()->getResult();
        }
        else {
            return $this->table('trxbuku')
                        ->join('buku', 'trxbuku.id_buku = buku.id_buku')
                        ->where('buku.id_buku', $id)
                        ->get()
                        ->getRow();
        }
    }
    
    public function insertTrxBuku($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function deleteTrxBuku($id)
    {
        return $this->db->table($this->table)->delete(['id_trxbuku' => $id]);
    }
}
