<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NSeed extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $data = [
                'inv_titulo' => 'Escobas'.$i,
                'inv_descripcion' => 'Armario de escobas'.$i,
            ];

            // Using Query Builder
            $this->db->table('tbl_inventario')->insert($data);
        }

    }
}