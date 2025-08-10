<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Munisipiu extends Model
{
    

    protected $table = 'munisipiu';
    protected $fillable = ['naran_munisipiu'];
    public $timestamps = false;

    
public function funsionarius(): HasMany {
    return $this->hasMany(Funsionariu::class, 'id_munisipiu');
}

}
