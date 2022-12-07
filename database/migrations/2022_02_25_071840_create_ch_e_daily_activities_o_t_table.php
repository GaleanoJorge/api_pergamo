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
            $table->string('cook')->nullable();
            $table->string('kids')->nullable();
            $table->string('wash')->nullable();
            $table->string('game')->nullable();
            $table->string('ironing')->nullable();
            $table->string('walk')->nullable();
            $table->string('clean')->nullable();
            $table->string('sport')->nullable();
            $table->string('decorate')->nullable();
            $table->string('social')->nullable();
            $table->string('act_floristry')->nullable();
            $table->string('friends')->nullable();
            $table->string('read')->nullable();
            $table->string('politic')->nullable();
            $table->string('view_tv')->nullable();
            $table->string('religion')->nullable();
            $table->string('write')->nullable();
            $table->string('look')->nullable();
            $table->string('arrange')->nullable();
            $table->string('travel')->nullable();
            $table->longText('observation_activity')->nullable();
            $table->string('test')->nullable();
            $table->longText('observation_test')->nullable();
            
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
