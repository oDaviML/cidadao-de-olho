<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedeSocial extends Model
{
    protected $table = "redes_sociais";
    protected $fillable = [
        'deputado_id',
        'nome',
    ];

    public function deputado() {
        return $this->belongsTo(Deputado::class);
    }
}
