<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Funsionariu extends Model
{
    protected $table = 'funsionariu';
    protected $fillable = [
        'id_munisipiu',
        'id_grau',
        'id_regime',
        'id_espasu_servisu',
        'naran_kompletu',
        'sexu',
        'loron_moris',
        'email',
        'nu_telefone',
        'tipu_fun',
        'nivel_edukasaun',
        'titulu_akademiku',
        'tipu_kontratu',
        'pozisaun',
        'status',
        'start_work',
        'end_work',
        'pmis',
        'payroll',
    ];

    public function subsidiu(): BelongsToMany
    {
        return $this->belongsToMany(Subsidiu::class, 'funsionariu_subsidiu', 'id_funsionariu', 'id_subsidiu')
        ->withPivot('start_date', 'end_date')
        ->withTimestamps();
    }

    public function funsionariuSubsidiu(): BelongsTo{
        return $this->belongsTo(FunsionariuSubsidiu::class, 'id_funsionariu');
    }

    public function grau(): HasMany {
        return $this->hasMany(Grau::class, 'id');
    }

    public function munisipiu(): HasMany {
        return $this->hasMany(Munisipiu::class, 'id');
    }

    public function espasu_servisu(): HasMany {
        return $this->hasMany(EspasuServisu::class, 'id');
    }

    public function regimeEspesial(): HasMany {
        return $this->hasMany(RegimeEspesial::class, 'id_regime');
    }
}
