
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
            $table->unsignedBigInteger('payment_type_id')->nullable(); // 1 cuota moderadora - 2 copago - 3 exento
            $table->string('category');
            $table->double('value', 16, 4);
            $table->unsignedTinyInteger('status_id');
            $table->timestamps();

            $table->index('status_id');
            $table->index('payment_type_id');

            $table->foreign('status_id')->references('id')
                ->on('status');
            $table->foreign('payment_type_id')->references('id')
                ->on('payment_type');
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
