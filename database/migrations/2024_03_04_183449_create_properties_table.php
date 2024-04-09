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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('access')->nullable();
            $table->string('title');
            $table->string('phone');
            $table->string('promote_url');
            $table->string('email');
            $table->string('company_website');
            $table->string('address');
            $table->string('area');
            $table->integer('price');
            $table->integer('garages');
            $table->integer('baths');
            $table->integer('beds');
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
        Schema::dropIfExists('properties');
    }
};
