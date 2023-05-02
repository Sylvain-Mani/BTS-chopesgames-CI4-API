<?php

// ! Génération automatique : php spark make:migration Categorie
// * créer la table :     php 
// * maj de la table :    php 
// * détruire la table :  php 

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categorie extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'NOCATEGORIE' => [
                'type'           => 'INT',
                'constraint'     => 2,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'LIBELLE' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);
        $this->forge->addKey('NOCATEGORIE', true);
        $this->forge->createTable('categorie');
    }

    public function down()
    {
        $this->forge->dropTable('categorie');
    }
}
