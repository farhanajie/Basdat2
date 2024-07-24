<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_buku' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'tanggal_transaksi' => [
                'type'    => 'TIMESTAMP'
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => 7
            ],
            'harga_total' => [
                'type'       => 'BIGINT',
                'constraint' => 20
            ]
        ]);

        $this->forge->addKey('id_transaksi', true);
        $this->forge->addForeignKey('id_buku', 'buku', 'id_buku', 'CASCADE', 'CASCADE');
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
