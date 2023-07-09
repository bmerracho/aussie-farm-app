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
        /**
         * Run the migrations.
         */
        Schema::create('t_kangaroo_info', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 50)->unique();
            $table->string('nickname', 25)->nullable();
            $table->float('weight');
            $table->float('height');
            $table->enum('gender', ['male', 'female']);
            $table->date('birthday');
            $table->string('color', 15)->nullable();
            $table->enum('friendliness', ['friendly', 'not friendly'])->nullable();
            $table->timestamps();
            $table->index('name');
            $table->index('birthday');
            $table->index('friendliness');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_kangaroo_info');
    }
};
