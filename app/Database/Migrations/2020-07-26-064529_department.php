<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Department extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_depart' => [
				'type' => 'int',
				'unsigned' => true,
				'constraint' => 11,
				'auto_increment' => true
			],
			'nama_department' => [
				'type' => 'varchar',
				'constraint' => 30,
			],
		]);

		$this->forge->addKey('id_depart',true);
		$this->forge->createTable('department');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('department');
	}
}
