<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_Option extends Model
{
    use HasFactory;

    protected $table = 'payment_option';
    protected $guarded = array();
}
