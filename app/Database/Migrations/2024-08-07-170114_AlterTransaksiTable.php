<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTransaksiTable extends Migration
{
    public function up()
    {
        $this->forge->dropForeignKey('transaksi', 'transaksi_id_buku_foreign');
        $this->forge->dropColumn('transaksi', ['id_buku', 'jumlah']);
    }

    public function down()
    {
        $this->forge->addColumn('transaksi', [
            'id_buku' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => 7
            ],
        ]);
        $this->forge->addForeignKey('id_buku', 'buku', 'id_buku', 'CASCADE', 'CASCADE');
    }
}
