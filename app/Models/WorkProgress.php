<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkProgress extends Model
{
    public function work()
    {
        return $this->belongsTo('App\Models\Work','work_id');
    }
}
