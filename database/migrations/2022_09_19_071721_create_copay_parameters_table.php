
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCopayParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copay_parameters', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_contract_id');
            $table->unsignedTinyInteger('status_id');
            $table->string('category');
            $table->bigInteger('value');
            $table->timestamps();

            $table->index('type_contract_id');
            $table->foreign('type_contract_id')->references('id')
                ->on('type_contract');

            $table->index('status_id');
            $table->foreign('status_id')->references('id')
                ->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('copay_parameters');
    }
}
