<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyDocument
 * 
 * @property int $id
 * @property BigInteger $company_id
 * @property BigInteger $document_id
 * @property string $file
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
