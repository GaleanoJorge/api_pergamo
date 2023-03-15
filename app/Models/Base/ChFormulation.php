<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AdministrationRoute;
use App\Models\HourlyFrequency;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;
use App\Models\OxigenAdministrationWay;
use App\Models\PharmacyProductRequest;
use App\Models\ProductGeneric;
use App\Models\ProductSupplies;
use App\Models\ServicesBriefcase;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
/**
 * Class ChFormulation
 
 * 
 * @property int $id
 * @property unsignedBigInteger $product_generic_id
 * @property unsignedBigInteger $product_supplies_id
 * @property unsignedBigInteger $services_briefcase_id
 * @property unsignedBigInteger $administration_route_id
 * @property unsignedBigInteger $hourly_frequency_id
 * @property unsignedBigInteger $oxigen_administration_way_id
 * @property string $required
 * @property string $medical_formula
 * @property string $suspended
 * @property Integer $treatment_days 
 * @property string $outpatient_formulation
 * @property string $dose
 * @property string $observation
 * @property Integer $number_mipres
 * @property Integer $num_supplies
 * @property unsignedBigInteger $pharmacy_product_request_id
 * @property unsignedBigInteger $type_record_id
 * @property unsignedBigInteger $ch_record_id
 * @property unsignedBigInteger $status_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChFormulation extends Model
{
	protected $table = 'ch_formulation';

	public function product_generic()
	{
		return $this->belongsTo(ProductGeneric::class,'product_generic_id');
	}

	// public function product_id()
	// {
	// 	return $this->belongsTo(Product::class,'product_generic_id');
	// }
	public function services_briefcase()
	{
		return $this->belongsTo(ServicesBriefcase::class);
	}
	public function product_supplies()
	{
		return $this->belongsTo(ProductSupplies::class);
	}
	public function administration_route()
	{
		return $this->belongsTo(AdministrationRoute::class);
	}
	public function hourly_frequency()
	{
		return $this->belongsTo(HourlyFrequency::class);
	}
	public function pharmacy_product_request()
	{
		return $this->belongsTo(PharmacyProductRequest::class);
	}
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
	public function oxigen_administration_way()
	{
		return $this->belongsTo(OxigenAdministrationWay::class);
	}

}
