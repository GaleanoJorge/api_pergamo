
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionTcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_tc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_date');
            $table->string('period');
            $table->string('nit');
            $table->string('entity');
            $table->string('bank_value');
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
        Schema::dropIfExists('collection_tc');
    }
}
