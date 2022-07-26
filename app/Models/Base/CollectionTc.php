<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CollectionTc
 * 
 * @property int $id 
 * @property string $transaction_date
 * @property string $period
 * @property string $nit
 * @property string $entity
 * @property string $bank_value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class CollectionTc extends Model
{
	protected $table = 'collection_tc';
}
