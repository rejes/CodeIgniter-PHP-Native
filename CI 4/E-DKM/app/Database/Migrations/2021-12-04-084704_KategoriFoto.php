<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriFoto extends Migration
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
            'nama_kategori'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'slug'       => [
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
		$this->forge->createTable('kategori_foto');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_foto');
    }
}
