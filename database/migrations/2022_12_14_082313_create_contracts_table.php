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
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employer_id')->unsigned()->references('id')->on('employers')->onDelete('cascade');
            $table->string('company_name')->nullable()->default(null);
            $table->string('location')->nullable()->default(null);
            $table->string('experience')->nullable()->default(null);
            $table->date('from_start')->nullable()->default(null);
            $table->date('to_date')->nullable()->default(null);
            $table->string('shift_type')->nullable()->default(null);
            $table->string('schedule')->nullable()->default(null);
            $table->boolean('is_travel_allowance')->nullable()->default(0);
            $table->boolean('is_meal_allowance')->nullable()->default(0);
            $table->boolean('is_accomadation_allowance')->nullable()->default(0);
            $table->decimal('travel_allowance_amount', 8, 2)->nullable()->default(0);
            $table->decimal('meal_allowance_amount', 8, 2)->nullable()->default(0);
            $table->string('rate_type')->nullable()->default(null);
            $table->decimal('rate_amount', 8, 2)->nullable()->default(null);
            $table->text('notes')->nullable()->default(null);
            $table->date('posting_start_date')->nullable()->default(null);
            $table->date('posting_end_date')->nullable()->default(null);
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
        Schema::dropIfExists('contracts');
    }
};
