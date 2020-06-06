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
            $table->text('name');
            $table->text('desc');
            $table->text('img');
            $table->text('price');
            $table->text('cate');
            $table->text('sub_cate');
            $table->text('size')->nullable();
            $table->integer('show')->default(0);
            $table->integer('slide')->default(0);
            $table->double('off')->default(0);
            $table->text('per_price')->nullable();
            $table->integer('quantity')->default(0);
            $table->double('instruction')->default(0);
            $table->integer('relate')->default(0);
            $table->text('etc')->nullable();
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
        Schema::dropIfExists('items');
    }
}
