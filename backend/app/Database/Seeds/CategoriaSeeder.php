<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nome' => 'Aluguel'],
            ['nome' => 'Salário'],
            ['nome' => 'Alimentação'],
            ['nome' => 'Lazer'],
        ];

        $this->db->table('categorias')->insertBatch($data);
    }
}