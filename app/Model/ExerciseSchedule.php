<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExerciseSchedule extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'exercise_id',
        'weekday_id',
        'time_id',
    ];

    public function exercise()
    {
        return $this->belongsTo('App\Model\Exercise');
    }

    public function weekday()
    {
        return $this->belongsTo('App\Model\Weekday');
    }

    public function time()
    {
        return $this->belongsTo('App\Model\Time');
    }
}
