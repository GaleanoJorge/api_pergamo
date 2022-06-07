<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourceRetentionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source_retention', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file');
            $table->double('value')->nullable();
            $table->unsignedBigInteger('account_receivable_id');
            $table->unsignedBigInteger('source_retention_type_id');
            $table->timestamps();

            $table->index('account_receivable_id');
            $table->foreign('account_receivable_id') ->references('id')
                ->on('account_receivable');

            $table->index('source_retention_type_id');
            $table->foreign('source_retention_type_id') ->references('id')
                ->on('source_retention_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('source_retention');
    }
}
