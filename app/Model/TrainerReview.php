<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainerReview extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'trainer_id',
        'rate',
        'comment'
    ]; 

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function trainer()
    {
        return $this->belongsTo('App\User','trainer_id');
    }

    public function academy()
    {
        return $this->belongsTo('App\Model\Academy');
    }
}
