<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Models\Base\Admissions as BaseAdmissions;

class Admissions extends BaseAdmissions
{
    protected $fillable = [
    'admission_route_id',
    'campus_id',
    'scope_of_attention_id',
    'program_id',
    'pavilion_id',
    'flat_id',
    'regimen_id',
    'bed_id',
    'contract_id',
    'patient_data_id',
    'user_id',
    

	];

    public function residence_municipality()
    {
        return $this->belongsTo(Municipality::class, 'residence_municipality_id');
    }

    public function residence()
    {
        return $this->belongsTo(NeighborhoodOrResidence::class, 'neighborhood_or_residence_id');
    }

    public function patients()
    {
        return $this->belongsTo(Patient::class, 'patient_id')->select(
            'patients.*',
            DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
        );
    }

}
