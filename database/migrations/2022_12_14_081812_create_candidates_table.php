<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('user_id')->references('uuid')->on('users')->onDelete('cascade');
            $table->text('address')->nullable()->default(null);
            $table->text('regulatory_college')->nullable()->default(null);
            $table->string('regulatory_college_no')->nullable()->default(null);
            $table->text('experience')->nullable()->default(null);
            $table->string('resume')->nullable()->default(null);
            $table->boolean('is_travel_allowance')->nullable()->default(0);
            $table->boolean('is_meal_allowance')->nullable()->default(0);
            $table->boolean('is_accomadation_allowance')->nullable()->default(0);
            $table->decimal('travel_allowance_amount', 10, 2)->nullable()->default(0);
            $table->decimal('meal_allowance_amount', 10, 2)->nullable()->default(0);
            $table->decimal('accommodation_allowance_amount', 10, 2)->nullable()->default(0);
            $table->string('rate_type')->nullable()->default(null);
            $table->decimal('rate_amount', 10, 2)->nullable()->default(0);
            $table->text('notes')->nullable()->default(null);
            $table->string('shift_type')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};
