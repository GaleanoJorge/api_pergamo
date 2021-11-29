<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MediumSignatureFile
 * 
 * @property int $id

 * @property string $file
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class MediumSignatureFile extends Model
{
	protected $table = 'medium_signature_file';

	
}
