
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingPadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_pad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total_value')->nullable();
            $table->date('validation_date')->nullable();
            $table->unsignedBigInteger('billing_pad_status_id')->nullable();
            $table->unsignedBigInteger('admissions_id')->nullable();
            $table->unsignedBigInteger('billing_pad_pgp_id')->nullable();
            $table->timestamps();

            $table->index('billing_pad_status_id');
            $table->foreign('billing_pad_status_id')->references('id')
                ->on('billing_pad_status');

            $table->index('admissions_id');
            $table->foreign('admissions_id')->references('id')
                ->on('admissions');

            $table->index('billing_pad_pgp_id');
            $table->foreign('billing_pad_pgp_id')->references('id')
                ->on('billing_pad_pgp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_pad');
    }
}
