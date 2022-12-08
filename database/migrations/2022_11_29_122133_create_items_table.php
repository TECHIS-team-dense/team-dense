<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->index();
            $table->string('status', 100)->default('active');
            $table->smallInteger('type')->nullable();
            $table->string('detail', 500)->nullable();
            $table->string('filename')->nullable();
            $table->string('filename_one')->nullable();
            $table->string('filename_two')->nullable();
            $table->string('filename_three')->nullable();
            $table->integer('price');
            $table->foreignId('secondary_category_id');
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
        Schema::dropIfExists('items');
    }
}
