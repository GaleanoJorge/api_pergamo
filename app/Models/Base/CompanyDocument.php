<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyMail
 * 
 * @property int $id
 * @property BigInteger $cdc_company
 * @property BigInteger $cdc_document
 * @property string $cdc_file
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class CompanyDocument extends Model
{
	protected $table = 'company_document';

	
}
