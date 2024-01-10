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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table -> string('Type')->nullable();
            $table -> string('Item')->nullable();
            $table -> string('Currency')->nullable();
            $table -> text('Bill')->nullable();
            $table -> integer('Amount')->nullable();
            $table -> date('Date')->nullable();
            $table -> string('Created_By')->nullable();
            $table -> string('Owner')->nullable();
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
         Schema::dropIfExists('expenses');
    }
};
