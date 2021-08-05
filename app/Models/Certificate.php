<?php

namespace App\Models;
use App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /**
	 * The table associated with the model.
	 *
	 * @var string
	 */
    protected $table = 'certificates';

    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = ['name', 'elements', 'templates_id', 'thumbnail'];
    
    /**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'elements' => 'json',// Deserialize the JSON attribute
	];

    /**
     * Function to get templates data
     */
    public function templates() {
        return $this->belongsTo('App\Models\Template', 'templates_id');
	} 
	
	/**
	 * Relation with certificates on course Models
	 */
	public function courses()
	{
		return $this->hasMany(Course::class);
	}
}
