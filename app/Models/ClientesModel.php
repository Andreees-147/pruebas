<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';

    protected $allowedFields = [
        'nombre',
        'cedula',
        'telefono',
    ];
}
