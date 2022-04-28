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
            Schema::create('', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->number('q_one');
                $table->number('q_two');
                $table->number('q_three');
                $table->number('q_four');
                $table->number('q_five');
                $table->number('q_six');
                $table->number('q_seven');
                $table->number('q_eight');
                $table->number('q_nine');
                $table->number('q_ten');

                $table->number('q_eleven');
                $table->number('q_twelve');
                $table->number('q_thirteen');
                $table->number('q_fourteen');
                $table->number('q_fifteen');
                $table->number('q_sixteen');
                $table->number('q_seventeen');
                $table->number('q_eighteen');
                $table->number('q_nineteen');
                $table->number('q_twenty');

                $table->number('q_twenty_one');
                $table->number('q_twenty_two');
                
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
            Schema::dropIfExists('ch_scale_zarit');
        }
    }
