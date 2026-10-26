<?php

namespace App\Controllers;

use App\Models\VehiculosModel;
use CodeIgniter\Controller;

class VehiculosController extends Controller
{
    protected $vehiculosModel;

    public function __construct()
    {
        helper(['form']);
        $this->vehiculosModel = new VehiculosModel();
    }

    // Reglas de validación (sirven para crear y para editar)
    private function reglas($id = null): array
    {
        // Al editar, la placa puede repetirse solo consigo misma
        $unica = $id === null
            ? 'is_unique[vehiculos.placa]'
            : 'is_unique[vehiculos.placa,id_vehiculo,' . (int) $id . ']';

        return [
            'placa' => [
                'rules'  => 'required|exact_length[8]|' . $unica . '|regex_match[/^[A-Za-z]{3}-[0-9]{4}$/]',
                'errors' => [
                    'required'    => 'La placa es obligatoria.',
                    'exact_length' => 'La placa debe tener 8 caracteres (ejemplo: ABC-1234).',
                    'regex_match' => 'La placa debe tener el formato ABC-1234 (3 letras, guion y 4 números).',
                    'is_unique'   => 'Ya existe un vehículo con esa placa.',
                ],
            ],
            'marca' => [
                'rules'  => 'required|max_length[50]|regex_match[/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/u]',
                'errors' => [
                    'required'    => 'La marca es obligatoria.',
                    'max_length'  => 'La marca no puede pasar de 50 caracteres.',
                    'regex_match' => 'La marca solo puede tener letras.',
                ],
            ],
            'modelo' => [
                'rules'  => 'required|max_length[50]|regex_match[/^[A-Za-z0-9ÁÉÍÓÚáéíóúÑñ .\-]+$/u]',
                'errors' => [
                    'required'    => 'El modelo es obligatorio.',
                    'max_length'  => 'El modelo no puede pasar de 50 caracteres.',
                    'regex_match' => 'El modelo solo puede tener letras, números, espacios, punto y guion.',
                ],
            ],
        ];
    }

    // Deja los datos ordenados: placa en mayúsculas, marca y modelo con inicial mayúscula
    private function datosLimpios(): array
    {
        $placa  = strtoupper(trim($this->request->getPost('placa')));
        $marca  = trim(preg_replace('/\s+/', ' ', $this->request->getPost('marca')));
        $modelo = trim(preg_replace('/\s+/', ' ', $this->request->getPost('modelo')));

        return [
            'placa'  => $placa,
            // Toyota, Chevrolet, Mercedes Benz
            'marca'  => mb_convert_case($marca, MB_CASE_TITLE, 'UTF-8'),
            // Hilux, Corolla 2020 (no toca "CX-5" ni "RAV4")
            'modelo' => ucwords($modelo),
        ];
    }

    // LISTAR
    public function index()
    {
        $data['vehiculos'] = $this->vehiculosModel
            ->orderBy('id_vehiculo', 'ASC')
            ->findAll();

        return view('vehiculos/index', $data);
    }

    // Muestra el formulario de CREAR
    public function create()
    {
        return view('vehiculos/create');
    }

    // GUARDAR un vehículo nuevo
    public function store()
    {
        if (! $this->validate($this->reglas())) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->vehiculosModel->insert($this->datosLimpios());

        return redirect()->to(base_url('vehiculos'))
            ->with('success', 'Vehículo registrado correctamente.');
    }

    // Muestra el formulario de EDITAR con los datos actuales
    public function edit($id)
    {
        $vehiculo = $this->vehiculosModel->find($id);

        if (! $vehiculo) {
            return redirect()->to(base_url('vehiculos'))
                ->with('errors', ['El vehículo no existe.']);
        }

        return view('vehiculos/edit', ['vehiculo' => $vehiculo]);
    }

    // GUARDAR los cambios de un vehículo
    public function update($id)
    {
        if (! $this->vehiculosModel->find($id)) {
            return redirect()->to(base_url('vehiculos'))
                ->with('errors', ['El vehículo no existe.']);
        }

        if (! $this->validate($this->reglas($id))) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->vehiculosModel->update($id, $this->datosLimpios());

        return redirect()->to(base_url('vehiculos'))
            ->with('success', 'Vehículo actualizado correctamente.');
    }

    // ELIMINAR
    public function delete($id)
    {
        $this->vehiculosModel->delete($id);

        return redirect()->to(base_url('vehiculos'))
            ->with('success', 'Vehículo eliminado correctamente.');
    }
}