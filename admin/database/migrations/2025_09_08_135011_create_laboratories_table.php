<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->unsignedBigInteger('cast_id');
            $table->unsignedBigInteger('package_id')->nullable();
            $table->unsignedBigInteger('test_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['0', '1'])->default('1');
            $table->timestamps();

            // Foreign keys
            $table->foreign('cast_id')->references('id')->on('cast')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('package')->onDelete('set null');
            $table->foreign('test_id')->references('id')->on('lab_tests')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laboratories');
    }
}
