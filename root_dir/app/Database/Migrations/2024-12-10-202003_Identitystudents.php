<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Identitystudents extends Migration
{
	public function up()
	{
		$this->forge->addColumn('identitytenant', [
            'prefix' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
                'after' => 'phone'
            ],
        ]);
	}

	public function down()
	{
		$this->forge->dropColumn('identitytenant', 'prefix');
	}
}
