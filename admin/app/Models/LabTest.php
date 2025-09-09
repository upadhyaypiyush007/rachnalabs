<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class LabTest extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'price',
        'category',
    ];
    public function laboratories()
    {
        return $this->hasMany(Laboratory::class);
    }
}