<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';
    protected $guarded = array();

public function blogcategory()
    {
        return $this->belongsTo(Blogcategory::class,'category_id');
    }
}
