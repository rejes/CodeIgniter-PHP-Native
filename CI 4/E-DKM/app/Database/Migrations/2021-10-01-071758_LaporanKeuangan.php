<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LaporanKeuangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
            'tanggal'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
			'keterangan'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'pemasukkan'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'pengeluaran'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			]
 
		]);

		$this->forge->addPrimaryKey('id', true);
		$this->forge->createTable('laporan_keuangan');
    }

    public function down()
    {
        $this->forge->dropTable('laporan_keuangan');
    }
}
