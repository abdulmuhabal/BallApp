<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExerciseJoin extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'exercise_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function exercise()
    {
        return $this->belongsTo('App\Model\Exercise','exercise_id');
    }
}
