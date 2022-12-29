
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
            // $table->unsignedBigInteger('type_contract_id');
            $table->integer('payment_type')->nullable(); // 1 cuota moderadora - 2 copago - 3 exento
            $table->string('category');
            $table->float('value');
            $table->unsignedTinyInteger('status_id');
            $table->timestamps();

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
