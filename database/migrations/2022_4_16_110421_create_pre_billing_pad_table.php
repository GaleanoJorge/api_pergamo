
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreBillingPadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_billing_pad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('procedure_id');
            $table->unsignedBigInteger('admissions_id');
            $table->timestamps();

            $table->index('procedure_id');
            $table->foreign('procedure_id')->references('id')
                ->on('procedure');

            $table->index('admissions_id');
            $table->foreign('admissions_id')->references('id')
                ->on('admissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_billing_pad');
    }
}
