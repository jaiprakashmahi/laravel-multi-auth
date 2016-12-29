<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Worktype extends Model
{
    /**
     * Get the work
     */

    public function work()
    {
        return $this->hasMany('App\Models\Work');
    }

}
