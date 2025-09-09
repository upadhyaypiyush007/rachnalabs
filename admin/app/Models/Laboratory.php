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
        // 'cast_id',
        // 'package_id',
        // 'test_id',
        'status'
    ];
    public function casts()
    {
        return $this->belongsToMany(Cast::class, 'laboratory_cast');
    }
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'laboratory_package');
    }
    public function tests()
    {
        return $this->belongsToMany(LabTest::class,  'laboratory_test', 'laboratory_id', 'test_id');
    }
    public function LabTest()
    {
        return $this->belongsTo(LabTest::class, 'test_id');
    }
    public function test()
    {
        return $this->belongsTo(LabTest::class, 'test_id');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'center_id');
    }
}
