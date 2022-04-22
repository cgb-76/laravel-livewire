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
        Schema::create('masters', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 255);
            $table->float('cash', 16, 2)->default(0);
            $table->timestamps();
        });
        Schema::create('children', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('master_id'); 
            $table->string('name', 255);
            $table->float('cash', 16, 2)->default(0);
            $table->timestamps();
            $table->foreign('master_id')->references('id')->on('masters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masters');
        Schema::dropIfExists('children');
    }
};
