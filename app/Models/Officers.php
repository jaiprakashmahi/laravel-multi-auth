<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Officers extends Model
{
    /**
     * Get the talukas that owns the Officers.
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
