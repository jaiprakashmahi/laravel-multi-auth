<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    public function sectors()
    {
        return $this->hasMany('App\Models\Sectors');
    }
    /**
     * Get the work
     */

    public function work()
    {
        return $this->hasMany('App\Models\Work');
    }


}
