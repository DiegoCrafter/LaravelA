<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    protected $table='GTD_DOCUMENTO';

    public $timestamps=false;

    protected $fillable = [
        'IDGTD_DOCUMENTO', 'IDGTD_TIPO_DOCUMENTO','DOC_CODIGO',
        'DOC_NOMBRE', 'DOC_FORMATO_RUTA','DOC_ESTADO','DOC_INICIO_TRAMITE'
    ];
    
}
