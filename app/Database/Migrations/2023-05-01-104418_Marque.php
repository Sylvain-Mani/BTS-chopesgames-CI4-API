<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Marque extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'NOMARQUE' => [
                'type'           => 'INT',
                'constraint'     => 2,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'NOM' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);
        $this->forge->addKey('NOMARQUE', true);
        $this->forge->createTable('marque');
    }

    public function down()
    {
        $this->forge->dropTable('marque');
    }
}
