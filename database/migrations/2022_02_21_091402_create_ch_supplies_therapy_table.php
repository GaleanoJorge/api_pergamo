    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChSuppliesTherapyTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_supplies_therapy', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('product_id')->nullable();
                $table->string('amount') ->nullable();
                $table->string('justification')->nullable();
                $table->unsignedBigInteger('type_record_id');
                $table->unsignedBigInteger('ch_record_id');
                $table->timestamps();
            

                $table->index('product_id');
                $table->foreign('product_id')->references('id')
                    ->on('product_supplies');

                $table->index('type_record_id');
                $table->foreign('type_record_id')->references('id')
                    ->on('type_record');

                $table->index('ch_record_id');
                $table->foreign('ch_record_id')->references('id')
                    ->on('ch_record');

            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('ch_supplies_therapy');
        }
    }
