<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cotacto extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
				'null' => false,
            ],
            'id_propiedad' => [
                'type'       => 'INT',
                'constraint' => 11,
				'null' => false,
            ],
			'id_arrendatario' => [
                'type'       => 'INT',
                'constraint' => 11,
				'null' => false,
            ],
			'tel_arrendatario' => [
				'type'       => 'BIGINT',
				'null' => false,
            ],
			'tel_arrendador' => [
				'type'       => 'BIGINT',
				'null' => false,
            ],
			'created_at' => [
				'type'       => 'DATETIME',
			],

			'updated_at' => [
				'type'       => 'DATETIME',
			],

			'deleted_at' => [
				'type'       => 'DATETIME',
			],
        ]);
		$this->forge->addKey('id', true);
        $this->forge->createTable('contacto');
	}

	public function down()
	{
		// $this->forge->dropTable('contacto');
	}
}
