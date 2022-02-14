<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Model\Category;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable;
    
    protected $fillable = [
        'role',
        'name',
        'email',
        'phone',
        'password',
        'otp_code',
        'is_verified',
        'api_token',
        'photo',
    ]; 

    protected $hidden = [
        'password'
    ];

    protected $appends = [
        'photo_url'
    ];

    public static function boot()
    {
        parent::boot();   
    }

    public function hasRole($role)
    {
        if ($this->role == $role) {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        return $this->hasRole('ADMIN');
    }

    public function isPlayer()
    {
        return $this->hasRole('PLAYER');
    }

    public function isTrainer()
    {
        return $this->hasRole('TRAINER');
    }

    public function player()
    {
        return $this->hasOne('App\Model\Player','user_id');
    }

    public function trainer()
    {
        return $this->hasOne('App\Model\Trainer','user_id');
    }

}
