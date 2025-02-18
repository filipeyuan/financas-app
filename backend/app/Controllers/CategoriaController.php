<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\CategoriaModel;

class CategoriaController extends ResourceController
{
    protected $modelName = 'App\Models\CategoriaModel';
    protected $format    = 'json';

    // Listar todas as categorias
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // Criar nova categoria
    public function create()
    {
        $data = $this->request->getJSON(true);
        if ($this->model->insert($data)) {
            return $this->respondCreated($data);
        }
        return $this->fail('Erro ao criar categoria.');
    }
}