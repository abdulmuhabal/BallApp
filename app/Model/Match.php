<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Match extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'starts',
        'no_of_players',
        'no_of_reserve_players',
        'referee',
        'description',
        'gender',
        'age_bracket_id',
        'stadium_location',
        'stadium_location_long',
        'stadium_location_lat',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ageBracket()
    {
        return $this->belongsTo('App\Model\AgeBracket','age_bracket_id');
    }
}
