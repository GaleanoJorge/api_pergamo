<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DocumentAccount
 * 
 * @property int $id
 * @property string $name
 * @property TinyInteger $status_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class DocumentAccount extends Model
{
	protected $table = 'document_account';

	
}
