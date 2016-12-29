<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Villages extends Model
{
    /**
     * Get the Talukas that owns the village.
     */

    public function talukas()
    {
        return $this->belongsTo('App\Models\Talukas','taluka_id');
    }
    /**
     * Get the work
     */

    public function work()
    {
        return $this->hasMany('App\Models\Work');
    }

}
