
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingTcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_tc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('consecutive');
            $table->string('date');
            $table->string('made_by');
            $table->integer('value');
            $table->string('entity');
            $table->string('branch_office')->nullable();
            $table->string('procedures')->nullable();
            $table->string('doctor')->nullable();
            $table->string('details')->nullable();
            $table->string('period');
            $table->string('consecutive2');
            $table->string('ambit');
            $table->string('campus');
            $table->strig('year');
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
        Schema::dropIfExists('billing_tc');
    }
}
