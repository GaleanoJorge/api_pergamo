<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedAssets as BaseFixedAssets;

class FixedAssets extends BaseFixedAssets
{
	protected $fillable = [
		'fixed_clasification_id',
		'fixed_type_id',
		'fixed_stock_id',
		'fixed_property_id',
		'company_id',
		'obs_property',
		'plaque',
		'status_prod',
		'model',
		'mark',
		'serial',
		'fixed_nom_product_id',
		'detail_description',
		'color',
		'fixed_condition_id',
		'calibration_certificate',
		'health_register',
		'warranty',
		'cv',
		'last_maintenance',
		'last_pame',
		'interventions_carriet',
		'type',
		'mobile_fixed',
		'clasification_risk_id',
		'biomedical_classification_id',
		'code_ecri',
		'form_acquisition',
		'date_adquisicion',
		'date_warranty',
		'useful_life',
		'cost',
		'maker',
		'phone_maker',
		'email_maker',
		'power_supply',
		'predominant_technology',
		'volt',
		'stream',
		'power',
		'frequency_rank',
		'temperature_rank',
		'humidity_rank',
		'manuals',
		'guide',
		'periodicity_frequency_id',
		'calibration_frequency_id',
		'accessories',
	];
}
