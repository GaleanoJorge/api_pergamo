<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FileContract
 * 
 * @property int $id
 * @property string $name
 * @property string $file
 * @property int $contract_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class FileContract extends Model
{
	protected $table = 'file_contract';

	
}
