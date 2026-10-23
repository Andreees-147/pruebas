<?php

namespace App\Models;

use CodeIgniter\Model;

class VehiculosModel extends Model
{
    protected $table = 'vehiculos';
    protected $primaryKey = 'id_vehiculo';

    protected $allowedFields = [
        'placa',
        'marca',
        'modelo',
    ];
}
