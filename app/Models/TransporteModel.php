<?php

namespace App\Models;

use CodeIgniter\Model;

class TransporteModel extends Model
{
    protected $table = 'transporte';
    protected $primaryKey = 'id_transporte';

    protected $allowedFields = [
        'nombre_empresa',
        'tipo_vehiculo',
        'telefono_contacto',
    ];
}
