<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('booking_code')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('bank_id');
            $table->date('booking_date');
            $table->text('message')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['pending', 'paid', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('restrict');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('restrict');
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
