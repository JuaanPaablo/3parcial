<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bddtabla1 extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'inv_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'inv_titulo' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'inv_descripcion' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('inv_id', true);
        $this->forge->createTable('tbl_inventario');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_inventario');
    }
}
