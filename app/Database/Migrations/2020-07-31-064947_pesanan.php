<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesanan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pes' => [
				'type' => 'varchar',
				'constraint' => 15
			],
			'id_keranjang'=>[
				'type' => 'int',
				'constraint' => 15,
				'null' => true,
			],
			'id_produk'=>[
				'type' => 'varchar',
				'null' => true,
				'constraint' => 15
			],
			'id_pelanggan'=>[
				'type' => 'varchar',
				'null' => true,
				'constraint' => 15
			],
			'qty_produk'=>[
				'type' => 'int',
				'null' => true,
				'constraint' => 15
			],
			'status_pesanan'=>[
				'type' => 'varchar',
				'null' => true,
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

		$this->forge->addKey('id_pes',true);
		$this->forge->createTable('pesanan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pesanan');
	}
}
