<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'id_pedido';

    protected $allowedFields = [
        'descripcion',
        'estado',
        'fecha_creacion',
    ];
}
