<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddAvailabilityToBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->unsignedBigInteger('center_id')->after('booking_type');
            $table->string('time_slot')->after('center_id');
            $table->date('date')->nullable()->after('time_slot'); // make it nullable first
            $table->string('availability')->nullable()->after('date');
            $table->unsignedBigInteger('cast_id')->after('center_id');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->dropColumn(['center_id','cast_id', 'time_slot', 'date', 'availability']);
        });
    }
}
