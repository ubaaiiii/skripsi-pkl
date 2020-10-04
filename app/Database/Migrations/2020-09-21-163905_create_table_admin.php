<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAdmin extends Migration
{
        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'constraint'     => 11,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'nama'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],
                        'nomor_induk' => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '25',
                        ],
                        'jabatan' => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '15',
                        ],
                        'created_at' => [
                                'type'           => 'DATETIME',
                                'null'                                         => true,
                        ],
                        'updated_at' => [
                                'type'           => 'DATETIME',
                                'null'                                         => true,
                        ],
                        'deleted_at' => [
                                'type'           => 'DATETIME',
                                'null'                                         => true,
                        ],
                ]);
                $this->forge->addKey('id', true);
                $this->forge->createTable('admin');
        }

        //--------------------------------------------------------------------

        public function down()
        {
                $this->forge->dropTable('admin');
        }
}
