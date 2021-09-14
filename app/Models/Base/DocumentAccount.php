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
 * @property string $dac_name
 * @property TinyInteger $dac_state
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
