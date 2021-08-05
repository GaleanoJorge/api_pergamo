<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signatures extends Model
{
    /**
	 * The table associated with the model.
	 *
	 * @var string
	 */
    protected $table = 'signatures';
    
    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['url','name','code', 'elements'];
	
	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'elements' => 'json',// Deserialize the JSON attribute
	];

	/**
	 * Function to get template has signature data
	 * 
	 */
	public function signatures() {
		return $this->hasMany('App/Models/TemplateHasSignature', 'signatures_id');
	}
}



