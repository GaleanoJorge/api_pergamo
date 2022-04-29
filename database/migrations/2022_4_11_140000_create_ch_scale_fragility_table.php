    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleFragilityTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_fragility', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->number('question_one');
                $table->number('question_two');
                $table->number('question_three');
                $table->number('question_four');
                $table->number('question_five');
                $table->number('question_six');
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
            Schema::dropIfExists('ch_scale_fragility');
        }
    }
