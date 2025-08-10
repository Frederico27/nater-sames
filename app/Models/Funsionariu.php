<?php

namespace App\Models;

use Carbon\Carbon;
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

    protected static function boot()
    {
        parent::boot();
        
        static::retrieved(function ($model) {
            $model->checkAndUpdateStatus();
        });
        
        static::saving(function ($model) {
            $model->checkAndUpdateStatus();
        });
    }
    
    protected function checkAndUpdateStatus()
    {
        if ($this->end_work && Carbon::parse($this->end_work)->isPast()) {
            $this->status = 'inativu';
        }
    }

    public function subsidiu(): BelongsToMany
    {
        return $this->belongsToMany(Subsidiu::class, 'funsionariu_subsidiu', 'id_funsionariu', 'id_subsidiu')
            ->withPivot('start_date', 'end_date')
            ->withTimestamps();
    }

    
    public function funsionariuSubsidiu(): HasMany
    {
        return $this->hasMany(FunsionariuSubsidiu::class, 'id_funsionariu', 'id');
    }

    public function grau(): BelongsTo
    {
        return $this->belongsTo(Grau::class, 'id_grau');
    }
    public function munisipiu(): BelongsTo
    {
        return $this->belongsTo(Munisipiu::class, 'id_munisipiu');
    }
    public function espasu_servisu(): BelongsTo
    {
        return $this->belongsTo(EspasuServisu::class, 'id_espasu_servisu');
    }

    public function regimeEspesial(): BelongsTo
    {
        return $this->belongsTo(RegimeEspesial::class, 'id_regime');
    }
}
