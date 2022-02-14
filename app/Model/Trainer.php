<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'bio',
        'location',
        'location_long',
        'location_lat',
        'gender',
        'age',
        'price',
        'documents',
        'instagram_url',
        'youtube_url',
        'twitter_url',
        'whatsapp',
        'is_expert_trainer',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
