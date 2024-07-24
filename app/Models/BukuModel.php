<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';

    public function getBook($id = false)
    {
        if ($id === false) {
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
}
