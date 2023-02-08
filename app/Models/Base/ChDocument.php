<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChDocument
 * 
 * @property int $id
 * @property string $name
 * @property string $file
 * @property int $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChDocument extends Model
{
	protected $table = 'ch_document';

	
}
