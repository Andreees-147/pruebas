<?php

namespace App\Controllers;

use App\Models\FacturaModel;
use CodeIgniter\Controller;

class FacturaController extends Controller
{
    protected $facturaModel;

    public function __construct()
    {
        $this->facturaModel = new FacturaModel();
    }

    public function index()
    {
        return view('factura/index');
    }

    public function create()
    {
        return view('factura/create');
    }

    public function delete($id)
    {

    }
}
