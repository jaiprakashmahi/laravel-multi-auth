<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Subsectors extends Model
{
    /**
     * Get the sector that owns the sub sector.
     */

    public function sectors()
    {
        return $this->belongsTo('App\Models\Sectors','sector_id');
    }

    public function scheme()
    {
        return $this->hasMany('App\Models\Scheme');
    }
    /**
     * Get the work
     */

    public function work()
    {
        return $this->hasMany('App\Models\Work');
    }

}
