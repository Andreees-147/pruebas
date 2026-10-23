<?php

namespace App\Controllers;

use App\Models\ProveedoresModel;
use CodeIgniter\Controller;

class ProveedoresController extends Controller
{
    protected $proveedoresModel;

    public function __construct()
    {
        $this->proveedoresModel = new ProveedoresModel();
    }

    public function index()
    {
        return view('proveedores/index');
    }

    public function create()
    {
        return view('proveedores/create');
    }

    public function delete($id)
    {
        
    }
}
