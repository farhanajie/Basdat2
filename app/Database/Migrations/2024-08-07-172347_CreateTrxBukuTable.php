<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTrxBukuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_trxbuku' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_transaksi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'id_buku' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => 7
            ],
            'subtotal' => [
                'type'       => 'BIGINT',
                'constraint' => 20
            ]
        ]);

        $this->forge->addKey('id_trxbuku', true);
        $this->forge->addForeignKey('id_transaksi', 'transaksi', 'id_transaksi', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_buku', 'buku', 'id_buku', 'CASCADE', 'CASCADE');
        $this->forge->createTable('trxbuku');
    }

    public function down()
    {
        $this->forge->dropTable('trxbuku');
    }
}
