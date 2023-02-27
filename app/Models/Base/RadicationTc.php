<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RadicationTc
 * 
 * @property int $id 
 * @property string $invoice
 * @property string $invoice_date
 * @property string $entity
 * @property string $filing_date
 * @property string $status
 * @property integer $total_eps
 * @property string $ambit
 * @property string $campus
 * @property string $filing_period
 * @property string $year
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class RadicationTc extends Model
{
	protected $table = 'radication_tc';
}
