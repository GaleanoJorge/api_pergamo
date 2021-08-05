<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('item_parent_id')->nullable();
            $table->string('name', 100);
            $table->text('route')->nullable();
            $table->string('icon', 100)->nullable();
            $table->timestamps();

            $table->index('item_parent_id');
            $table->foreign('item_parent_id')->references('id')->on('item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
