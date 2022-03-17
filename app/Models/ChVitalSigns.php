<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChVitalSigns as BaseChVitalSigns;

class ChVitalSigns extends BaseChVitalSigns
{
  protected $fillable = [
    'cardiac_frequency',
    'respiratory_frequency',
    'temperature',
    'oxigen_saturation',
    'intracranial_pressure',
    'cerebral_perfusion_pressure',
    'intra_abdominal',
    'pressure_systolic',
    'pressure_diastolic',
    'pressure_half',
    'pulse',
    'venous_pressure',
    'size',
    'weight',
    'glucometry',
    'body_mass_index',
    'pulmonary_systolic',
    'pulmonary_diastolic',
    'pulmonary_half',
    'head_circunference',
    'abdominal_perimeter',
    'chest_perimeter',
    'fetal_heart_rate',
    'right_reaction',
    'pupil_size_right',
    'left_reaction',
    'pupil_size_left',
    'glomerular_filtration_rate',
    'cardiovascular_risk  ',
    'vital_hydration_id',
    'vital_ventilated_id',
    'vital_temperature_id',
    'vital_neurological_id',
    'type_record_id',
    'ch_record_id'
  ];
}
