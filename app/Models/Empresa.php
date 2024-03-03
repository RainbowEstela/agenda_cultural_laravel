<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empresa extends Model
{
    use HasFactory;

    public function experiencias(): HasMany
    {
        return $this->hasMany(Experiencia::class);
    }

    public function usuarios(): HasMany
    {
        return $this->hasMany(Empresa::class);
    }
}
