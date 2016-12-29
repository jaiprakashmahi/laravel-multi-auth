<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Sectors extends Model
{
    /**
     * Get the sector for the sub sector.
     */
    public function subsectors()
    {
        return $this->hasMany('App\Models\Subsectors');
    }

    /**
     * Get the sector that owns the sub sector.
     */

    public function plane()
    {
        return $this->belongsTo('App\Models\Plane','plane_id');
    }

    /**
     * Get the work
     */

    public function work()
    {
        return $this->hasMany('App\Models\Work');
    }


}
