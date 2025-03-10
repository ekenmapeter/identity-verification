<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiesTable extends Migration
{
    public function up()
    {
        // Check if the table already exists
        if (!Schema::hasTable('verify')) {
            Schema::create('verify', function (Blueprint $table) {
                $table->id();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('front_image');
                $table->string('back_image');
                $table->string('selfie_image');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        // Drop the table if it exists
        Schema::dropIfExists('verify');
    }
}
