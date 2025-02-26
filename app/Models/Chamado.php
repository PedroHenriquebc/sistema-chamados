<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'descricao', 'usuario_id', 'categoria_id',
        'data_abertura', 'data_inicio_desenvolvimento', 'data_fechamento', 'status_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function getDiasAbertoAttribute()
    {
        return now()->diffInDays($this->data_abertura);
    }

    public function getDiasDesenvolvimentoAttribute()
    {
        if ($this->data_inicio_desenvolvimento && $this->data_fechamento) {
            return $this->data_inicio_desenvolvimento->diffInDays($this->data_fechamento);
        }
        return null;
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
