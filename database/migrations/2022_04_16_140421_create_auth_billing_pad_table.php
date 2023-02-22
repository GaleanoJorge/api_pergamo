
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthBillingPadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_billing_pad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('value');
            $table->unsignedBigInteger('billing_pad_id')->nullable();
            $table->unsignedBigInteger('billing_pad_pgp_id')->nullable();
            $table->unsignedBigInteger('billing_pad_mu_id')->nullable();
            $table->unsignedBigInteger('authorization_id')->nullable();
            $table->timestamps();

            $table->index('billing_pad_id');
            $table->foreign('billing_pad_id')->references('id')
                ->on('billing_pad');

            $table->index('billing_pad_pgp_id');
            $table->foreign('billing_pad_pgp_id')->references('id')
                ->on('billing_pad_pgp');

            $table->index('billing_pad_mu_id');
            $table->foreign('billing_pad_mu_id')->references('id')
                ->on('billing_pad_mu');

            $table->index('authorization_id');
            $table->foreign('authorization_id')->references('id')
                ->on('authorization');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth_billing_pad');
    }
}
