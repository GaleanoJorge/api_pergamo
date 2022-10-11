<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChEDailyActivitiesOTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_e_daily_activities_o_t', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cook');
            $table->string('kids');
            $table->string('wash');
            $table->string('game');
            $table->string('ironing');
            $table->string('walk');
            $table->string('clean');
            $table->string('sport');
            $table->string('decorate');
            $table->string('social');
            $table->string('act_floristry');
            $table->string('friends');
            $table->string('read');
            $table->string('politic');
            $table->string('view_tv');
            $table->string('religion');
            $table->string('write');
            $table->string('look');
            $table->string('arrange');
            $table->string('travel');
            $table->string('observation_activity')->nullable();
            $table->string('test');
            $table->string('observation_test')->nullable();
            
            $table->unsignedBigInteger('type_record_id');
            $table->unsignedBigInteger('ch_record_id');
            $table->timestamps();

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
        Schema::dropIfExists('ch_e_daily_activities_o_t');
    }
}
