<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diresaun extends Model
{
    protected $table = 'diresaun';
    protected $fillable = ['naran_diresaun'];

    public $timestamps = false;

    public function espasuServisu():BelongsTo
    {
        return $this->belongsTo(EspasuServisu::class, 'id_diresaun');
    }

}
