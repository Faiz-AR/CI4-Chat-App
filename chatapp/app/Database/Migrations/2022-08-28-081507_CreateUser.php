<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'username' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'password_hash' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'email' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'date_of_birth' => [
                'type'              => 'DATE',
                'null'              => true,
                'default'           => null
            ],
            'gender' => [
                'type'              => 'VARCHAR',
                'constraint'        => '10',
            ],
            'country' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'created_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
                'default'           => null
            ],
            'updated_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
                'default'           => null
            ],
        ]);

        $this->forge->addPrimaryKey('id')
                    ->addUniqueKey('email');
                    
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
