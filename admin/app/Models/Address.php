<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';
    protected $guarded = array();
    
    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }
    
     public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

}
