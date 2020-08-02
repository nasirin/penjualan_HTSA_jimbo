<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_prod' => [
				'type' => 'varchar',
				'constraint' => 15
			],
			'id_department' => [
				'type' => 'int',
				'unsigned' => true,
				'constraint' => 15
			],
			'nama_produk' => [
				'type' => 'varchar',
				'constraint' => 30
			],
			'varian_produk' => [
				'type' => 'varchar',
				'constraint' => 30
			],
			'image_produk' => [
				'type' => 'varchar',
				'constraint' => 30
			],
			'qty_produk' => [
				'type' => 'int',
				'constraint' => 15,
			],
			'harga_produk' => [
				'type' => 'int',
				'constraint' => 15,
			],
			'ukuran_produk' => [
				'type' => 'int',
				'constraint' => 10,
			],
			'slug_produk' => [
				'type' => 'varchar',
				'constraint' => 50,
			],
			'keterangan_produk' => [
				'type' => 'varchar',
				'constraint' => 100,
			],
			'created_at' => [
				'type' => 'datetime',
			],
			'updated_at' => [
				'type' => 'datetime',
				'null' => true
			],
		]);

		$this->forge->addKey('id_prod',true);
		$this->forge->createTable('produk');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('produk');
	}
}
