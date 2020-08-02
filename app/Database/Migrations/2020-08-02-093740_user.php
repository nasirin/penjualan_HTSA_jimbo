<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_user' => [
				'type' => 'varchar',
				'constraint' => 15
			],
			'nama_user' => [
				'type' => 'varchar',
				'constraint' => 50
			],
			'email_user' => [
				'type' => 'varchar',
				'constraint' => 50
			],
			'password_user' => [
				'type' => 'varchar',
				'constraint' => 50
			],
			'notelp_user' => [
				'type' => 'int',
				'constraint' => 16
			],
			'alamat_user' => [
				'type' => 'text'
			],
			'created-at' => [
				'type' => 'datetime'
			],
		]);

		$this->forge->addKey('id_user',true);
		$this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
