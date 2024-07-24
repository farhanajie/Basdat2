<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBukuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_buku' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_rak' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'null'           => true
            ],
            'kode_buku' => [
                'type'       => 'CHAR',
                'constraint' => 3
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'penulis' => [
                'type'       => 'VARCHAR',
                'constraint' => 30
            ],
            'penerbit' => [
                'type'       => 'VARCHAR',
                'constraint' => 30
            ],
            'harga' => [
                'type'       => 'INT',
                'constraint' => 10
            ],
            'sinopsis' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true
            ],
            'stok' => [
                'type'       => 'INT',
                'constraint' => 7,
                'default'    => 0
            ]
        ]);

        $this->forge->addKey('id_buku', true);
        $this->forge->addForeignKey('id_rak', 'rak', 'id_rak', 'SET NULL', 'CASCADE');
        $this->forge->createTable('buku');
    }

    public function down()
    {
        $this->forge->dropTable('buku');
    }
}
