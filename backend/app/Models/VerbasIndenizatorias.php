<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerbasIndenizatorias extends Model
{
    protected $table = "verbas_indenizatorias";
    protected $fillable = ["deputado_id", "ano", "mes", "valor", "descricao"];

    public function deputado()
    {
        return $this->belongsTo(Deputado::class, 'deputado_id');
    }
}
