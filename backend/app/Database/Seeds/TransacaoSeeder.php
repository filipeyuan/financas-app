<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransacaoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'descricao'   => 'Pagamento de aluguel',
                'valor'       => -1200,
                'tipo'        => 'despesa',
                'categoria_id' => 1, // ID da categoria "Aluguel"
                'data'        => '2025-02-01'
            ],
            [
                'descricao'   => 'Salário recebido',
                'valor'       => 5000,
                'tipo'        => 'receita',
                'categoria_id' => 2, // ID da categoria "Salário"
                'data'        => '2025-02-05'
            ],
            [
                'descricao'   => 'Jantar no restaurante',
                'valor'       => -80,
                'tipo'        => 'despesa',
                'categoria_id' => 3, // ID da categoria "Alimentação"
                'data'        => '2025-02-10'
            ]
        ];

        $this->db->table('transacoes')->insertBatch($data);
    }
}