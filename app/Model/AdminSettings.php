<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminSettings extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_en',
        'name_ar',
        'about_us_en',
        'about_us_ar',
        'terms_en',
        'terms_ar',
        'price_per_hour'
    ]; 
}
