<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subsidiu extends Model
{
    protected $table = 'subsidiu';
    protected $fillable = ['naran_subsidiu', 'montante'];

    public function funsionariu(): BelongsToMany
    {
        return $this->belongsToMany(Funsionariu::class, 'funsionariu_subsidiu', 'id_subsidiu', 'id_funsionariu');
    }

    public function funsionariuSubsidiu(): BelongsTo{
        return $this->belongsTo(FunsionariuSubsidiu::class, 'id');
    }

}
