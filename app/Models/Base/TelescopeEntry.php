<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\TelescopeEntriesTag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TelescopeEntry
 * 
 * @property int $sequence
 * @property string $uuid
 * @property string $batch_id
 * @property string $family_hash
 * @property bool $should_display_on_index
 * @property string $type
 * @property string $content
 * @property Carbon $created_at
 * 
 * @property TelescopeEntriesTag $telescope_entries_tag
 *
 * @package App\Models\Base
 */
class TelescopeEntry extends Model
{
	protected $table = 'telescope_entries';
	protected $primaryKey = 'sequence';
	public $timestamps = false;

	protected $casts = [
		'should_display_on_index' => 'bool'
	];

	public function telescope_entries_tag()
	{
		return $this->hasOne(TelescopeEntriesTag::class, 'entry_uuid', 'uuid');
	}
}
