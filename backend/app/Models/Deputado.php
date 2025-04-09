<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deputado extends Model
{
    protected $table = "deputados";
    protected $fillable = [
        'id',
        'nome',
        'partido',
        'tag_localizacao',
    ];

    public $incrementing = false;

    public function redeSocial() {
        return $this->hasMany(RedeSocial::class);
    }

    public function verbasIndenizatorias()
    {
        return $this->hasMany(VerbasIndenizatorias::class, 'deputado_id');
    }
}
