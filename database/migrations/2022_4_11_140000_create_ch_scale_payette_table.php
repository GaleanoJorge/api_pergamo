    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScalePayetteTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_payette', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->Integer('question_one');
                $table->Integer('question_two');
                $table->Integer('question_three');
                $table->Integer('question_four');
                $table->Integer('question_five');
                $table->Integer('question_six');
                $table->Integer('question_seven');
                $table->Integer('question_eight');
                $table->Integer('question_nine');
                $table->Integer('question_ten');
                $table->Integer('classification');
                $table->string('risk');
                $table->string('recommendations');
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
            Schema::dropIfExists('ch_scale_payette');
        }
    }
