<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChPsSphereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_ps_sphere', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('euthymia');
            $table->string('observations')->nullable();

            $table->unsignedBigInteger('ch_ps_sadness_id')->nullable();
            $table->unsignedBigInteger('ch_ps_joy_id')->nullable();
            $table->unsignedBigInteger('ch_ps_fear_id')->nullable();
            $table->unsignedBigInteger('ch_ps_anger_id')->nullable();
            $table->unsignedBigInteger('ch_ps_insufficiency_id')->nullable();
            $table->unsignedBigInteger('ch_ps_several_id')->nullable();
        
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');

            $table->timestamps();

            $table->index('ch_ps_sadness_id');
            $table->foreign('ch_ps_sadness_id')->references('id')
                ->on('ch_ps_sadness');

            $table->index('ch_ps_joy_id');
            $table->foreign('ch_ps_joy_id')->references('id')
                ->on('ch_ps_joy');

            $table->index('ch_ps_fear_id');
            $table->foreign('ch_ps_fear_id')->references('id')
                ->on('ch_ps_fear');

            $table->index('ch_ps_anger_id');
            $table->foreign('ch_ps_anger_id')->references('id')
                ->on('ch_ps_anger');

            $table->index('ch_ps_insufficiency_id');
            $table->foreign('ch_ps_insufficiency_id')->references('id')
                ->on('ch_ps_insufficiency');
           
            $table->index('ch_ps_several_id');
            $table->foreign('ch_ps_several_id')->references('id')
                ->on('ch_ps_several');
           
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
        Schema::dropIfExists('ch_ps_sphere');
    }
}
