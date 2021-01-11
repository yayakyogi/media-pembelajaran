<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'user_id' => [
				'type' => 'INT',
				'constraint' => 16,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'user_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'user_email' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'user_password' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'user_created_at' => [
				'type' => 'TIMESTAMP',
			],
		]);
		$this->forge->addKey('user_id',true);
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
