<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class Pelanggan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pel'=>[
				'type' => 'varchar',
				'constraint' => 15
			],
			'nama' => [
				'type' => 'varchar',
				'constraint' => 30
			],
			'email' => [
				'type' => 'varchar',
				'constraint' => 50
			],
			'password' => [
				'type' => 'varchar',
				'constraint' => 50
			],
			'notelp' => [
				'type' => 'int',
				'constraint' => 15
			],
			'alamat' => [
				'type' =>'text'
			],
			'created_at' => [
				'type' => 'datetime',
			],
			'updated_at' => [
				'type' => 'datetime',
				'null' => true
			],
		]);
		$this->forge->addKey('id_pel',true);
		$this->forge->createTable('pelanggan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pelanggan');
	}
}
