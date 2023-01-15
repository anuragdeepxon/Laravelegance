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
        Schema::create('employers', function (Blueprint $table) {
            $table->uuid('uuid')->unique()->primary();
            $table->uuid('user_id')->references('uuid')->on('users')->onDelete('cascade');
            $table->boolean('is_candidate_accept')->default(false);
            $table->boolean('is_employer_accept')->default(false);
            $table->timestamp('candidate_accepted_at')->nullable()->default(null);
            $table->timestamp('employer_accepted_at')->nullable()->default(null);
            $table->string('status')->default('IN REVIEW');
            $table->string('company_name')->nullable()->default(null);
            $table->text('address')->nullable()->default(null);
            $table->string('position')->nullable()->default(null);
            $table->string('phone_one')->nullable()->default(null);
            $table->string('phone_two')->nullable()->default(null);
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
        Schema::dropIfExists('employers');
    }
};
