<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

    /**
     * Get the agency that owns the work.
     */

    public function agency()
    {
        return $this->belongsTo('App\Models\User','agency_id');
    }

    public function AssignBy()
    {
        return $this->belongsTo('App\Models\User','created_by');
    }

    /**
     * Get the Worktype that owns the work.
     */

    public function worktype()
    {
        return $this->belongsTo('App\Models\Worktype','work_type_id');
    }

    /**
     * Get the administrator that owns the work.
     */

    public function administrator()
    {
        return $this->belongsTo('App\Models\Administrators','administrator_id');
    }

    /**
     * Get the Officers that owns the work.
     */

    public function officer()
    {
        return $this->belongsTo('App\Models\Officers','officer_id');
    }

    public function FinalOfficer()
    {

        return $this->belongsTo('App\Models\FinalOfficer','final_officer_id');
    }

    /**
     * Get the financial that owns the work.
     */

    public function financial()
    {
        return $this->belongsTo('App\Models\FinancialYears','financial_year_id');

    }
    /**
     * Get the plane that owns the work.
     */

    public function plane()
    {
        return $this->belongsTo('App\Models\Plane','plane_id');
    }

    /**
     * Get the sector that owns the work.
     */

    public function sector()
    {
        return $this->belongsTo('App\Models\Sectors','sector_id');
    }

    /**
     * Get the sector that owns the work.
     */

    public function subsector()
    {
        return $this->belongsTo('App\Models\Subsectors','sub_sector_id');
    }

    /**
     * Get the scheme that owns the work.
     */

    public function scheme()
    {
        return $this->belongsTo('App\Models\Scheme','scheme_id');
    }

    /**
     * Get the district that owns the work.
     */

    public function district()
    {
        return $this->belongsTo('App\Models\District','district_id');
    }

    /**
     * Get the taluka that owns the work.
     */

    public function taluka()
    {
        return $this->belongsTo('App\Models\Talukas','taluka_id');
    }

    /**
     * Get the village that owns the work.
     */

    public function village()
    {
        return $this->belongsTo('App\Models\Villages','village_id');
    }

    public function workProgress()
    {
        return $this->hasMany('App\Models\WorkProgress');
    }

}
