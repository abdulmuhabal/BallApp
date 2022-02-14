<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Academy extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'price',
        'terms_en',
        'terms_ar',
        'services_en',
        'services_ar',
        'about_the_academy_en',
        'about_the_academy_ar',
    ];

    public function academyTrainers()
    {
        return $this->hasMany('App\Model\AcademyTrainer','academy_id');
    }

}
