<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistantTcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistant_tc', function (Blueprint $table) {
            $table->string('agent_number');
            $table->string('agent_name');
            $table->string('hold');
            $table->string('lunch');
            $table->string('break_am');
            $table->string('break_pm');
            $table->string('outgoing_call');
            $table->string('bathroom');
            $table->string('whatsapp');
            $table->string('user_attention');
            $table->string('meeting');
            $table->string('total');
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
        Schema::dropIfExists('assistant_tc');
    }
}
