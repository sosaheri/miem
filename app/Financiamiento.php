<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financiamiento extends Model
{

    protected $fillable = [
        'user', 'monto', 'comprobante', 'fecha', 'cuota', 'metodo_de_pago',
    ];


}
