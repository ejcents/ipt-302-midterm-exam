<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sportbikes', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('brand');
            $table->year('year');
            $table->string('engine');
            $table->string('color');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sportbikes');
    }
};
