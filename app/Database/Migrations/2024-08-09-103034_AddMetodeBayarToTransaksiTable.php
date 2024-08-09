<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMetodeBayarToTransaksiTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('transaksi', [
            'metode_bayar' => [
                'type'       => 'ENUM',
                'constraint' => ['Cash', 'QRIS', 'Debit', 'Kredit'],
                'default'    => 'Cash',
                'after'      => 'tanggal_transaksi'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('transaksi', 'metode_bayar');
    }
}
