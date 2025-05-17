<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FunsionariuSubsidiu extends Model
{
    protected $table = 'funsionariu_subsidiu';
    protected $fillable = ['id_funsionariu', 'id_subsidiu', 'start_date', 'end_date'];
    public $timestamps = false;

    public function funsionariu(): HasMany
    {
        return $this->hasMany(Funsionariu::class, 'id');
    }

    public function subsidiu(): HasMany
    {
        return $this->hasMany(Subsidiu::class, 'id');
    }
   

}
