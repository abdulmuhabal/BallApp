<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademyJoin extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'age',
        'academy_id',
    ]; 

    public function academy()
    {
        return $this->belongsTo('App\Model\Academy');
    }
    
}
