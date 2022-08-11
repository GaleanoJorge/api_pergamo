<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChVitalSigns as BaseChVitalSigns;

class ChVitalSigns extends BaseChVitalSigns
{
  protected $fillable = [
    'clock',
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
    'right_reaction',
    'pupil_size_right',
    'left_reaction',
    'pupil_size_left',
    'mydriatic',
    'normal',
    'lazy_reaction_light',
    'fixed_lazy_reaction',
    'miotic_size',
    'observations_glucometry',
    'has_oxigen',
    'ch_vital_hydration_id',
    'ch_vital_ventilated_id',
    'ch_vital_temperature_id',
    'ch_vital_neurological_id',
    'oxygen_type_id',
    'liters_per_minute_id',
    'parameters_signs_id',
    'type_record_id',
    'ch_record_id'
  ];
}
