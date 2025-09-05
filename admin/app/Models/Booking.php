<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $guarded = array();
    
     public function user()
    {
        return $this->belongsTo(Users::class,'user_id');
    }

    public function test()
    {
        return $this->belongsTo(Service::class,'test_id');
    }
}
