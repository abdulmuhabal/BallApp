<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademyTrainer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'trainer_id',
        'academy_id',
    ]; 

    public function trainer()
    {
        return $this->belongsTo('App\Model\Trainer');
    }

    public function academy()
    {
        return $this->belongsTo('App\Model\Academy');
    }
}
