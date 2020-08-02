<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keranjang extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_ker' => [
				'type' => 'int',
				'constraint' => 15
			],
			'id_pelanggan' => [
				'type' => 'varchar',
				'constraint' => 15
			],
			'id_produk' => [
				'type' => 'varchar',
				'constraint' => 15
			],
			'qty' => [
				'type' => 'int',
				'constraint' => 15
			],
			'created_at' => [
				'type' => 'datetime',
			],
			'updated_at' => [
				'type' => 'datetime',
				'null' => true
			],
		]);
		$this->forge->addKey('id_ker',true);
		$this->forge->createTable('keranjang');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('kerajang');
	}
}
