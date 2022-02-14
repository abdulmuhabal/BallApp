<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'location',
        'location_long',
        'location_lat',
        'gender',
        'age',
        'level',
        'favorite_position_id',
        'height',
        'weight',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function favoritePosition()
    {
        return $this->belongsTo('App\Model\Position','favorite_position_id');
    }
}
