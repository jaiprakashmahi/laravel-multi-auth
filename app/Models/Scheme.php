<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    public function subsector()
    {
        return $this->belongsTo('App\Models\Subsectors','sub_sector_id');
    }


    /**
     * Get the work
     */

    public function work()
    {
        return $this->hasMany('App\Models\Work');
    }


}
