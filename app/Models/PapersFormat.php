<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PapersFormat extends Model
{
    /**
	 * The table associated with the model.
	 *
	 * @var string
	 */
    protected $table = 'papers_formats';
    
    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['height','width','name', 'margin_top', 'margin_bottom', 'margin_left', 'margin_rigth', 'landscape'];

	/**
	 * Function to get template data
	 * 
	 */
	public function template() {
		return $this->hasMany('App\Models\Template', 'papers_formats_id');
	}

}
