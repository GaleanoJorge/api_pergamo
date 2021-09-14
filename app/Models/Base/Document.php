<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Document
 * 
 * @property int $id
 * @property string $doc_name
 * @property TinyInteger $doc_state
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class Document extends Model
{
	protected $table = 'document';

	
}
