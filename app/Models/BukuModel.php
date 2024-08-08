<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';

    public function getBuku($id = false)
    {
        if (!$id) {
            return $this->table('buku')
                        ->join('rak', 'rak.id_rak = buku.id_rak')
                        ->get()
                        ->getResult();
        }
        else {
            return $this->table('buku')
                        ->join('rak', 'rak.id_rak = buku.id_rak')
                        ->where('buku.id_buku', $id)
                        ->get()
                        ->getRow();
        }
    }

    public function insertBuku($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateBuku($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_buku' => $id]);
    }

    public function deleteBuku($id)
    {
        return $this->db->table($this->table)->delete(['id_buku' => $id]);
    }

    public function updateStok($id, $stok)
    {
        $data['stok'] = $stok;
        return $this->db->table($this->table)->update($data, ['id_buku' => $id]);
    }
}
