<?php

namespace App\Controllers;

use App\Models\TransporteModel;
use CodeIgniter\Controller;

class TransporteController extends Controller
{
    protected $transporteModel;

    public function __construct()
    {
        $this->transporteModel = new TransporteModel();
    }

    public function index()
    {
        return view('transporte/index');
    }

    public function create()
    {
        return view('transporte/create');
    }

    public function delete($id)
    {
        
    }
}
