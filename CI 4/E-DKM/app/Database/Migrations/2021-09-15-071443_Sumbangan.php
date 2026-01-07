<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sumbangan extends Migration
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
            'name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'no_telp'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '13',
            ],
            'jumlah'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
			'pesan'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'bukti_transfer'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
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
		$this->forge->createTable('sumbangan');
    }

    public function down()
    {
        $this->forge->dropTable('sumbangan');
    }
}
