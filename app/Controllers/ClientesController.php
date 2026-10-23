<?php

namespace App\Controllers;

use App\Models\ClientesModel;
use CodeIgniter\Controller;

class ClientesController extends Controller
{
    protected $clientesModel;

    public function __construct()
    {
        $this->clientesModel = new ClientesModel();
    }

    public function index()
    {
        return view('clientes/index');
    }

    public function create()
    {
        return view('clientes/create');
    }

    public function delete($id)
    {
        
    }
}
