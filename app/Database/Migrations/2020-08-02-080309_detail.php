<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Detail extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_det'=>[
				'type' => 'int',
				'constraint' => 11,
				'auto_increment' => true
			],
			'id_pesanan'=>[
				'type' => 'varchar',
				'constraint' => 15,
			],
			'id_produk'=>[
				'type' => 'varchar',
				'constraint' => 15,
			],
			'qty_pesanan'=>[
				'type' => 'int',
				'constraint' => 15,
			],
		]);

		$this->forge->addKey('id_det',true);
		$this->forge->createTable('detail_pesanan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('detail_pesanan');
	}
}
