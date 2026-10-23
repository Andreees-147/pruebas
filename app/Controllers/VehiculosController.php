<?php

namespace App\Controllers;

use App\Models\VehiculosModel;
use CodeIgniter\Controller;

class VehiculosController extends Controller
{
    protected $vehiculosModel;

    public function __construct()
    {
        $this->vehiculosModel = new VehiculosModel();
    }

    public function index()
    {
        return view('vehiculos/index');
    }

    public function create()
    {
        return view('vehiculos/create');
    }

    public function delete($id)
    {
        
    }
}
