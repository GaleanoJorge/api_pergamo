<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateHasSignature extends Model
{
    /**
	 * The table associated with the model.
	 *
	 * @var string
	 */
    protected $table = 'templates_has_signatures';

    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = ['position_x', 'position_y','templates_id', 'signatures_id', 'position', 'height', 'width'];

    /**
     * Function to get templates data
     */
    public function templates() {
        return $this->belongsTo('App\Models\Template', 'templates_id');
    } 

    /**
     * Function to get signatures data
     */
    public function signatures() {
        return $this->belongsTo('App\Models\Signatures', 'signatures_id');
        // return 'ejecuto';
    } 
}
