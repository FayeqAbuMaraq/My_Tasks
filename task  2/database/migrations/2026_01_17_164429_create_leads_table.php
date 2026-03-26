<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('leads', function (Blueprint $create) {
            $create->id();
            $create->string('first_name');
            $create->string('last_name');
            $create->string('email');
            $create->string('phone');
            $create->string('clinic_name');
            $create->string('role'); 
            $create->text('message')->nullable(); 
            $create->string('status')->default('new'); 
            $create->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leads');
    }
};