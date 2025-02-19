<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'password', 'perfil_id'];

    protected $hidden = ['password'];

    public function perfil(): BelongsTo
    {
        return $this->belongsTo(Perfil::class);
    }
}
