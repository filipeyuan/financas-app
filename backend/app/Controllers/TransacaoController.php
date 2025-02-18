<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\TransacaoModel;

class TransacaoController extends ResourceController
{
    protected $modelName = 'App\Models\TransacaoModel';
    protected $format    = 'json';

    // Listar todas as transações
    public function index()
    {
        $model = new TransacaoModel();
        $data = $model->getTransacoes();

        return $this->respond($data);
    }

    public function create()
    {
        $json = $this->request->getJSON(true); // Captura os dados JSON enviados

        if (!$json) {
            return $this->fail('Dados inválidos', 400);
        }
        if ($json['tipo'] === 'despesa' && $json['valor'] > 0) {
            $json['valor'] = -$json['valor'];
        }

        $model = new TransacaoModel();
        
        if ($model->insert($json)) {
            return $this->respondCreated(['message' => 'Transação cadastrada com sucesso']);
        }

        return $this->fail('Erro ao cadastrar transação', 500);
    }

    public function delete($id = null)
    {
        $model = new TransacaoModel();

        if ($model->find($id)) {
            $model->delete($id);
            return $this->respondDeleted(['message' => 'Transação excluída com sucesso']);
        }

        return $this->failNotFound('Transação não encontrada');
    }

    public function update($id = null)
    {
        $model = new TransacaoModel();
        $data = $this->request->getJSON(true);

        if (!$model->find($id)) {
            return $this->failNotFound('Transação não encontrada');
        }
        if ($data['tipo'] === 'despesa' && $data['valor'] > 0) {
            $data['valor'] = -$data['valor'];
        }

        if ($model->update($id, $data)) {
            return $this->respond(['message' => 'Transação atualizada com sucesso']);
        }

        return $this->fail('Erro ao atualizar transação', 500);
    }
}