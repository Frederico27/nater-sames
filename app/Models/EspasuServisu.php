<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EspasuServisu extends Model
{
    protected $table = 'espasu_servisu';
    protected $fillable = ['id_diresaun', 'fatin_servisu'];

    public $timestamps = false;

    public function diresaun(): HasMany
    {
        return $this->hasMany(Diresaun::class, 'id');
    }

    public function funsionariu(): HasMany {
        return $this->hasMany(Funsionariu::class, 'id_espasu_servisu');
    }
    
}
