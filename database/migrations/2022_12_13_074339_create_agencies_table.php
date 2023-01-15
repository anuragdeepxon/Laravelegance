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
        Schema::create('agencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('user_id')->references('uuid')->on('users')->onDelete('cascade');
            $table->string('phone')->nullable()->default(null);
            $table->text('address')->nullable()->default(null);
            $table->string('website')->nullable()->default(null);
            $table->string('logo')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->rememberToken();
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
        Schema::dropIfExists('agencies');
    }
};
