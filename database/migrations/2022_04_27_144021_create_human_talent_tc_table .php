
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumanTalentTcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('human_talent_tc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('period');
            $table->string('status');
            $table->string('contract');
            $table->string('nrodoc');
            $table->string('typedoc');
            $table->string('name');
            $table->string('accrued_cost');
            $table->string('employer_cost');
            $table->string('provision_cost');
            $table->string('total_cost');
            $table->string('net');
            $table->string('percent');
            $table->string('campus');
            $table->string('ambit_gen');
            $table->string('ambit_esp');
            $table->string('ambit_esp2');
            $table->string('specialty');
            $table->string('position');
            $table->string('agreement');
            $table->string('direction');
            $table->string('account_type');
            $table->string('nroaccount');
            $table->string('bank');
            $table->string('codbank');
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
        Schema::dropIfExists('human_talent_tc');
    }
}
