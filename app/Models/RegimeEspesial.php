<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegimeEspesial extends Model
{
    protected $table = 'regime_espesial';
    protected $fillable = ['naran_regime', 'salariu'];


    public function funsionariu(): HasMany {
        return $this->hasMany(Funsionariu::class, 'id_regime');
    }

}
