<?php

namespace App\Models;

use CodeIgniter\Model;

class TransacaoModel extends Model
{
    protected $table = 'transacoes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descricao', 'valor', 'tipo', 'categoria_id', 'data'];

    // Método para buscar as transações com o nome da categoria
    public function getTransacoes()
    {
        return $this->select('transacoes.*, categorias.nome as categoria_nome')
                    ->join('categorias', 'categorias.id = transacoes.categoria_id', 'left')
                    ->findAll();
    }
}