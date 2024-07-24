<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRakTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rak' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'kode_rak' => [
                'type'       => 'CHAR',
                'constraint' => 3,
            ],
            'nama_rak' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);

        $this->forge->addKey('id_rak', true);
        $this->forge->createTable('rak');
    }

    public function down()
    {
        $this->forge->dropTable('rak');
    }
}
