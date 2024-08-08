<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    public function getTransaksi($id = false)
    {
        if (!$id) {
            return $this->get()->getResult();
        }
        else {
            return $this->table('transaksi')
                        ->join('trxbuku', 'transaksi.id_transaksi = trxbuku.id_transaksi')
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

    public function updateHargaTotal($id, $harga_total)
    {
        $data['harga_total'] = $harga_total;
        return $this->db->table($this->table)->update($data, ['id_transaksi' => $id]);
    }
}
