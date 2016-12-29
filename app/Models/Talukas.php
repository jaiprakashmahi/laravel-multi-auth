<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Talukas extends Model
{
    /**
     * Get the villages for the talukas.
     */
    public function villages()
    {
        return $this->hasMany('App\Models\Villages');
    }

    /**
     * Get the officers for the Talukas.
     */
    public function officers()
    {
        return $this->hasMany('App\Models\Officers');
    }

    /**
     * Get the Administrator for the Talukas.
     */
    public function administrator()
    {
        return $this->hasMany('App\Models\Administrators');
    }

    /**
     * Get the work
     */

    public function work()
    {
        return $this->hasMany('App\Models\Work');
    }

}
