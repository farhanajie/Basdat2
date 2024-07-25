<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeFotoColumnToNotNull extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('buku', [
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('buku', [
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
        ]);
    }
}
