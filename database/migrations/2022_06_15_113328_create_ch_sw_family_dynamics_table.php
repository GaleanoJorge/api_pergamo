<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateChSwFamilyDynamicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_sw_family_dynamics', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->unsignedBigInteger('decisions_id')->nullable();
            $table->unsignedBigInteger('authority_id')->nullable();
            $table->unsignedBigInteger('ch_sw_communications_id')->nullable();
            $table->unsignedBigInteger('ch_sw_expression_id')->nullable();
            $table->longText('observations')->nullable();
            
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');

            $table->timestamps();

            $table->index('ch_sw_communications_id');
            $table->foreign('ch_sw_communications_id')->references('id')
                ->on('ch_sw_communications');

            $table->index('decisions_id');
            $table->foreign('decisions_id')->references('id')
                ->on('ch_sw_family');

            $table->index('authority_id');
            $table->foreign('authority_id')->references('id')
                ->on('ch_sw_family');

            $table->index('ch_sw_expression_id');
            $table->foreign('ch_sw_expression_id')->references('id')
                ->on('ch_sw_expression');

            $table->index('type_record_id');
            $table->foreign('type_record_id')->references('id')
                ->on('type_record');

            $table->index('ch_record_id');
            $table->foreign('ch_record_id')->references('id')
                ->on('ch_record');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ch_sw_family_dynamics');
    }
}
