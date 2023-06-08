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
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('inventory_card')->nullable();
            $table->string('project');
            $table->integer('price')->default(0)->nullable();
            $table->timestamp('loan_date')->nullable();
            $table->timestamp('buy_date')->nullable();
            $table->string('location');
            $table->string('user')->nullable();
            $table->enum('condition', ['Baik', 'Rusak', 'Dijual', 'Hilang']);
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyeks');
    }
};
