<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Materi extends Migration
{
	public function up()
	{
		$this->forge->addfield([
			'materi_id' => [
				'type'			 => 'INT',
				'constraint' 	 => 16,
				'unsigned' 		 => true,
				'auto_increment' => true,
			],
			'materi_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'materi_img' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'materi_file' => [
				'type' => 'VARCHAR',
				'constraint' =>'255',
			],
			'materi_created_at' => [
				'type' => 'TIMESTAMP',
			],
		]);
		$this->forge->addKey('materi_id',true);
		$this->forge->createTable('materi');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
