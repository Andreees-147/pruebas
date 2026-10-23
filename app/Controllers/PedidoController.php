<?php

namespace App\Controllers;

use App\Models\PedidoModel;
use CodeIgniter\Controller;

class PedidoController extends Controller
{
    protected $pedidoModel;

    public function __construct()
    {
        $this->pedidoModel = new PedidoModel();
    }

    public function index()
    {
        return view('pedido/index');
    }

    public function create()
    {
        return view('pedido/create');
    }

    public function delete($id)
    {
    
    }
}
