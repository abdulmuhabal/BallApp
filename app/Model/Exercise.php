<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'starts',
        'ends',
        'no_of_players',
        'gender',
        'referee',
        'age_bracket_id',
        'price',
        'description',
        'stadium_location',
        'stadium_location_long',
        'stadium_location_lat',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function exerciseSchedules()
    {
        return $this->hasMany('App\Model\ExerciseSchedule');
    }

    public function ageBracket()
    {
        return $this->belongsTo('App\Model\AgeBracket','age_bracket_id');
    }
}
