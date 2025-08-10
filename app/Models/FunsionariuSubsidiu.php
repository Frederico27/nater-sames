<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function subsidiu(): BelongsTo
    {
        return $this->belongsTo(Subsidiu::class, 'id_subsidiu', 'id');
    }
   
     /**
     * Get the current status based on end_date
     *
     * @return string
     */
    public function getStatusAttribute($value)
    {
        // If status is explicitly set, return it
        if (!empty($value)) {
            return $value;
        }
        
        // If end_date is passed, return 'inativu'
        if ($this->end_date && Carbon::parse($this->end_date)->isPast()) {
            return 'inactive';
        }
        
        return 'active'; // Default status
    }
    
    /**
     * Update status based on end_date
     *
     * @return void
     */
    public function updateStatusBasedOnEndDate()
    {
        if ($this->end_date && Carbon::parse($this->end_date)->isPast()) {
            $this->status = 'inactive';
            $this->save();
        }
    }

}
