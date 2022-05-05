<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourceRetentionTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source_retention_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('value');
            $table->unsignedBigInteger('tax_value_unit_id');
            $table->timestamps();

            $table->index('tax_value_unit_id');
            $table->foreign('tax_value_unit_id') ->references('id')
                ->on('tax_value_unit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('source_retention_type');
    }
}
