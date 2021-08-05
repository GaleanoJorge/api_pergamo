<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    /**
	 * The table associated with the model.
	 *
	 * @var string
	 */
    protected $table = 'templates';
    
    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = ['background','name','papers_formats_id', 'color', 'thumbnail'];
    
    
    /**
     * Function to get paper format data
     */
    public function papers_format() {
        return $this->belongsTo('App\Models\PapersFormat', 'papers_formats_id');
    } 

    /**
	 * Function to get template data
	 * 
	 */
	public function certificates() {
		return $this->hasMany('App\Models\Certificate', 'templates_id');
    }
    
    /**
	 * Function to get template has signature data
	 * 
	 */
	public function template_has_signature() {
		return $this->hasMany('App\Models\TemplateHasSignature', 'templates_id');
	}
}
