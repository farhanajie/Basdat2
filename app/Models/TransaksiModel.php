<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    public function getTransaksi($id = false)
    {
        if ($id === false) {
            return $this->table('transaksi')
                        ->join('buku', 'buku.id_buku = transaksi.id_buku')
                        ->get()
                        ->getResult();
        }
        else {
            return $this->table('transaksi')
                        ->join('buku', 'buku.id_buku = transaksi.id_buku')
                        ->where('transaksi.id_transaksi', $id)
                        ->get()
                        ->getRow();
        }
    }

    public function insertTransaksi($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function deleteTransaksi($id)
    {
        return $this->db->table($this->table)->delete(['id_transaksi' => $id]);
    }
}
