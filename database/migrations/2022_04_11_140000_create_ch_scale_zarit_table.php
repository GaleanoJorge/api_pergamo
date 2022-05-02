    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleZaritTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_zarit', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->Integer('q_one');
                $table->Integer('q_two');
                $table->Integer('q_three');
                $table->Integer('q_four');
                $table->Integer('q_five');
                $table->Integer('q_six');
                $table->Integer('q_seven');
                $table->Integer('q_eight');
                $table->Integer('q_nine');
                $table->Integer('q_ten');

                $table->Integer('q_eleven');
                $table->Integer('q_twelve');
                $table->Integer('q_thirteen');
                $table->Integer('q_fourteen');
                $table->Integer('q_fifteen');
                $table->Integer('q_sixteen');
                $table->Integer('q_seventeen');
                $table->Integer('q_eighteen');
                $table->Integer('q_nineteen');
                $table->Integer('q_twenty');

                $table->Integer('q_twenty_one');
                $table->Integer('q_twenty_two');
                
                $table->Integer('total');
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
            Schema::dropIfExists('ch_scale_zarit');
        }
    }
