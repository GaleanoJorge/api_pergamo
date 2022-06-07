
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadicationTcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radication_tc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice');
            $table->string('invoice_date');
            $table->string('entity');
            $table->string('filing_date');
            $table->string('status');
            $table->string('total_eps');
            $table->string('ambit');
            $table->string('campus');
            $table->string('filing_period');
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
        Schema::dropIfExists('radication_tc');
    }
}
