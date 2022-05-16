<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AccountReceivable;
use App\Models\SourceRetentionType;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
/**
 * Class SourceRetention
 
 * 
 * @property int $id
 * @property string $file
 * @property double $value
 * @property unsignedBigInteger $account_receivable_id
 * @property unsignedBigInteger $source_retention_type_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class SourceRetention extends Model
{
	protected $table = 'source_retention';

	public function account_receivable()
	{
		return $this->belongsTo(AccountReceivable::class);
	}
	public function source_retention_type()
	{
		return $this->belongsTo(SourceRetentionType::class);
	}
	
}
