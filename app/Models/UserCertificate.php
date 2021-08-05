<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCertificate extends Model
{
    /**
	 * The table associated with the model.
	 *
	 * @var string
	 */
    protected $table = 'user_certificate';

    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = ['user_role_course_id','user_employee_id','user_id', 'url_certificate'];

     /**
     * Function to get user role course data
     */
    public function user_role_course() {
        return $this->belongsTo('App\Models\UserRoleCourse', 'user_role_course_id');
    } 
    
    /**
     * Function to get user employee data
     */
    public function user_employee() {
        return $this->belongsTo('App\Models\User', 'user_employee_id');
    } 

    /**
     * Function to get user student data
     */
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    } 
}
