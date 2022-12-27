<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChPsThoughtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_ps_thought', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('grade');
            $table->string('contents');
            $table->string('prevalent')->nullable();
            $table->longText('observations')->nullable();

            $table->unsignedBigInteger('ch_ps_speed_id')->nullable();
            $table->unsignedBigInteger('ch_ps_delusional_id')->nullable();
            $table->unsignedBigInteger('ch_ps_overrated_id')->nullable();
            $table->unsignedBigInteger('ch_ps_obsessive_id')->nullable();
            $table->unsignedBigInteger('ch_ps_association_id')->nullable();
        
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');

            $table->timestamps();

            $table->index('ch_ps_speed_id');
            $table->foreign('ch_ps_speed_id')->references('id')
                ->on('ch_ps_speed');

            $table->index('ch_ps_delusional_id');
            $table->foreign('ch_ps_delusional_id')->references('id')
                ->on('ch_ps_delusional');

            $table->index('ch_ps_overrated_id');
            $table->foreign('ch_ps_overrated_id')->references('id')
                ->on('ch_ps_overrated');

            $table->index('ch_ps_obsessive_id');
            $table->foreign('ch_ps_obsessive_id')->references('id')
                ->on('ch_ps_obsessive');

            $table->index('ch_ps_association_id');
            $table->foreign('ch_ps_association_id')->references('id')
                ->on('ch_ps_association');
           
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
        Schema::dropIfExists('ch_ps_thought');
    }
}
