<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('province');
            $table->string('city');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade')->onUpdate('cascade');
            $table->string('types', "500");
            $table->string('proof', "500");
            $table->string('description', "6553");
            $table->string('status');
            for ($i = 1; $i <= 5; $i++) {
                $table->string('attachment' . $i)->nullable();
            }
            $table->string('image1');
            for ($j = 2; $j <= 5; $j++) {
                $table->string('image' . $j)->nullable();
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
