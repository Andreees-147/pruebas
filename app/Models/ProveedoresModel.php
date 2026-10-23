<?php

namespace App\Models;

use CodeIgniter\Model;

class ProveedoresModel extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedor';

    protected $allowedFields = [
        'ruc',
        'ubicacion',
        'telefono',
    ];
}
