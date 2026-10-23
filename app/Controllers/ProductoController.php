<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use CodeIgniter\Controller;

class ProductoController extends Controller
{
    protected $productoModel;

    public function __construct()
    {
        $this->productoModel = new ProductoModel();
    }

    public function index()
    {
        return view('producto/index');
    }

    public function create()
    {
        return view('producto/create');
    }

    public function delete($id)
    {
        
    }
}
