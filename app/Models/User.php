<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use App\Notifications\MailResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status_id',
        'gender_id',
        'academic_level_id',
        'identification_type_id',
        'birthplace_municipality_id',
        'username',
        'email',
        'email_verified_at',
        'password',
        'firstname',
        'middlefirstname',
        'lastname',
        'middlelastname',
        'identification',
        'birthday',
        'age',
        'phone',
        'sync_id',
        'ethnicity',
        'landline',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Notify mail reset password
     *
     * @param [type] $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordNotification($token));
    }

    public function origins()
    {
        return $this->belongsToMany(Origin::class, 'user_origin')
            ->withPivot('id')
            ->withTimestamps();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role')
            ->withPivot('id')
            ->withTimestamps();
    }

    public function user_role()
    {
        return $this->hasMany(UserRole::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function academic_level()
    {
        return $this->belongsTo(AcademicLevel::class, 'academic_level_id');
    }

    public function identification_type()
    {
        return $this->belongsTo(IdentificationType::class, 'identification_type_id');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'birthplace_municipality_id');
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }
    public function admissions()
	{
		return $this->hasMany(Admissions::class);
	}
    public function assistance()
    {
        return $this->hasMany(Assistance::class);
    }
}
