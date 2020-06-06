<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('location');
            $table->text('icon_url');
            $table->mediumText('items')->nullable();
            $table->text('link')->nullable();
            $table->text('desc')->nullable();
            $table->text('time_start')->nullable();
            $table->text('time_end')->nullable();
            $table->integer('noorder')->default(0);
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
        Schema::dropIfExists('stores');
    }
}
