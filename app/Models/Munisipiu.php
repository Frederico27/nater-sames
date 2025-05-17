<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Munisipiu extends Model
{
    

    protected $table = 'munisipiu';
    protected $fillable = ['naran_munisipiu'];
    public $timestamps = false;

    public function funsionariu(): BelongsTo {
        return $this->belongsTo(Funsionariu::class, 'id_munisipiu');
    }

}
