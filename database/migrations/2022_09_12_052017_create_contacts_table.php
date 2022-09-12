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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('nick_name')->nullable();
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('photo')->nullable();
            $table->string('relation')->nullable();
            $table->string('email')->nullable();
            $table->string('education')->nullable();
            $table->string('profession')->nullable();
            $table->enum('friend_status',['school friend','university friend','college friend','primary school friend', 'collegue'])->nullable();
            $table->string('organization')->nullable();
            $table->string('designation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
