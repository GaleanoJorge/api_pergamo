    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScalePapTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_pap', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->number('variable_one');
                $table->number('variable_two');
                $table->number('variable_three');
                $table->number('variable_four');
                $table->number('variable_five');
                $table->number('variable_six');
                $table->number('total');
                $table->string('classification');
                $table->unsignedBigInteger('type_record_id');
                $table->unsignedBigInteger('ch_record_id');
                $table->timestamps();

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
            Schema::dropIfExists('ch_scale_pap');
        }
    }
