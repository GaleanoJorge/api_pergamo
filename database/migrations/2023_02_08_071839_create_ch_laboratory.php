    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChLaboratory extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_laboratory', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('medical_order_id');
                $table->unsignedBigInteger('laboratory_status_id');
                $table->unsignedBigInteger('authorization_id');
                $table->string('file')->nullable();

                $table->index('medical_order_id');
                $table->foreign('medical_order_id')->references('id')
                    ->on('ch_medical_orders');

                $table->index('laboratory_status_id');
                $table->foreign('laboratory_status_id')->references('id')
                    ->on('laboratory_status');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('ch_laboratory');
        }
    }
