<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinalOfficer extends Model
{
    public  function work()
    {
        return $this->hasMany('App\Models\Work');
    }

    public function talukas()
    {
        return $this->belongsTo('App\Models\Talukas','taluka_id');
    }
}
