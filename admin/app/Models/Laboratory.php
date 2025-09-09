<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Laboratory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'cast_id',
        'package_id',
        'test_id',
        'user_id',
        'status'
    ];
    public function cast()
    {
        return $this->belongsTo(Cast::class);
    }
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function LabTest()
    {
        return $this->belongsTo(LabTest::class,'test_id');
    }
    public function test()
    {
        return $this->belongsTo(LabTest::class,'test_id');
    }
    public function user()
    {
        return $this->belongsTo(Users::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'center_id');
    }
}
