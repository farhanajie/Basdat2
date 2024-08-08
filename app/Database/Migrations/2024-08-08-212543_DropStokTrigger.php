<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropStokTrigger extends Migration
{
    public function up()
    {
        $this->db->query("DROP TRIGGER cek_stok; ");
    }

    public function down()
    {
        $this->db->query("
            CREATE TRIGGER cek_stok BEFORE INSERT ON transaksi
            FOR EACH ROW BEGIN
                IF NEW.jumlah > (SELECT stok FROM buku WHERE buku.id_buku = NEW.id_buku) THEN 
                    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Jumlah beli melebihi stok barang yang ada.';
                END IF;
            END
        ");
    }
}
