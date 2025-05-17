<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegimeEspesial extends Model
{
    protected $table = 'regime_espesial';
    protected $fillable = ['naran_regime', 'salariu'];

    public function funsionariu(): BelongsTo {
        return $this->belongsTo(Funsionariu::class, 'id_regime_espesial');
    }

}
