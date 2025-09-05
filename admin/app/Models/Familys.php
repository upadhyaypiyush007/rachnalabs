<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Familys extends Authenticatable
{
    // use HasFactory;
    use Notifiable;

    protected $table = 'family';
    protected $guarded = array();
    
    public function relation()
    {
        return $this->belongsTo(Relation::class,'relation');
    }
    

}
