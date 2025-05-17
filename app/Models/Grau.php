<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grau extends Model
{
    protected $table = 'grau';
    protected $fillable = ['naran_grau', 'salariu'];


    public function funsionariu(): BelongsTo {
        return $this->belongsTo(Funsionariu::class, 'id_grau');
    }

}
