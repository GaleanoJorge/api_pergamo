<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BiomedicalClassification;
use App\Models\Campus;
use App\Models\Company;
use App\Models\FixedClasification;
use App\Models\FixedCondition;
use App\Models\FixedNomProduct;
use App\Models\FixedProperty;
use App\Models\FixedType;
use App\Models\Frequency;
use App\Models\Risk;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedAssets
 
 * 
 * @property int $id
 * @property BigInteger $fixed_clasification_id
 * @property BigInteger $fixed_type_id
 * @property BigInteger $fixed_property_id
 * @property BigInteger $company_id
 * @property BigInteger $campus_id
 * @property string $obs_property
 * @property string $plaque
 * @property string $status
 * @property integer $amount_total
 * @property integer $actual_amount
 * @property string $model
 * @property string $mark
 * @property string $serial
 * @property BigInteger $fixed_nom_product_id
 * @property string $detail_description
 * @property string $color
 * @property BigInteger $fixed_condition_id 
 * @property string $calibration_certificate
 * @property string $health_register
 * @property string $warranty
 * @property string $cv
 * @property string $last_maintenance
 * @property string $last_pame
 * @property string $interventions_carriet
 * @property string $type
 * @property string $mobile_fixed
 * @property BigInteger $clasification_risk_id
 * @property BigInteger $biomedical_classification_id
 * @property string $code_ecri
 * @property string $form_acquisition
 * @property string $date_adquisicion
 * @property string $date_warranty
 * @property string $useful_life
 * @property integer $cost
 * @property string $maker
 * @property string $phone_maker
 * @property string $email_maker
 * @property string $power_supply
 * @property string $predominant_technology
 * @property string $volt
 * @property string $stream
 * @property string $power
 * @property string $frequency_rank
 * @property string $temperature_rank
 * @property string $humidity_rank
 * @property string $manuals
 * @property string $guide
 * @property BigInteger $periodicity_frequency_id
 * @property BigInteger $calibration_frequency_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FixedAssets extends Model
{
	protected $table = 'fixed_assets';

	public function fixed_clasification()
	{
		return $this->belongsTo(FixedClasification::class);
	}
	public function fixed_nom_product()
	{
		return $this->belongsTo(FixedNomProduct::class);
	}
	public function fixed_type()
	{
		return $this->belongsTo(FixedType::class);
	}
	public function fixed_property()
	{
		return $this->belongsTo(FixedProperty::class);
	}
	public function fixed_condition()
	{
		return $this->belongsTo(FixedCondition::class);
	}
	public function company()
	{
		return $this->belongsTo(Company::class);
	}
	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}
	public function clasification_risk()
	{
		return $this->belongsTo(Risk::class);
	}
	public function biomedical_classification()
	{
		return $this->belongsTo(BiomedicalClassification::class);
	}
	public function periodicity_frequency()
	{
		return $this->belongsTo(Frequency::class);
	}
	public function calibration_frequency()
	{
		return $this->belongsTo(Frequency::class);
	}
}
