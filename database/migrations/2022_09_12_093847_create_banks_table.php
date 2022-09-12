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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('acc_no');
            $table->string('branch_name')->nullable();
            $table->string('photo')->nullable();
            $table->string('card_no')->nullable();
            $table->string('card_user_name')->nullable();
            $table->string('card_pass')->nullable();
            $table->enum('uses',['salary','savings','visa card', 'other']);
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
        Schema::dropIfExists('banks');
    }
};
