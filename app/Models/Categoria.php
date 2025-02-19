<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'perfil_id'];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }

    public function chamados()
    {
        return $this->hasMany(Chamado::class);
    }
}
