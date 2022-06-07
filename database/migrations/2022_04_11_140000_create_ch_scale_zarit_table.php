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
                $table->string('q_one_title');
                $table->Integer('q_one_value');
                $table->string('q_one_detail');
                $table->string('q_two_title');
                $table->Integer('q_two_value');
                $table->string('q_two_detail');
                $table->string('q_three_title');
                $table->Integer('q_three_value');
                $table->string('q_three_detail');
                $table->string('q_four_title');
                $table->Integer('q_four_value');
                $table->string('q_four_detail');
                $table->string('q_five_title');
                $table->Integer('q_five_value');
                $table->string('q_five_detail');
                $table->string('q_six_title');
                $table->Integer('q_six_value');
                $table->string('q_six_detail');
                $table->string('q_seven_title');
                $table->Integer('q_seven_value');
                $table->string('q_seven_detail');
                $table->string('q_eight_title');
                $table->Integer('q_eight_value');
                $table->string('q_eight_detail');
                $table->string('q_nine_title');
                $table->Integer('q_nine_value');
                $table->string('q_nine_detail');
                $table->string('q_ten_title');
                $table->Integer('q_ten_value');
                $table->string('q_ten_detail');
                $table->string('q_eleven_title');
                $table->Integer('q_eleven_value');
                $table->string('q_eleven_detail');
                $table->string('q_twelve_title');
                $table->Integer('q_twelve_value');
                $table->string('q_twelve_detail');
                $table->string('q_thirteen_title');
                $table->Integer('q_thirteen_value');
                $table->string('q_thirteen_detail');
                $table->string('q_fourteen_title');
                $table->Integer('q_fourteen_value');
                $table->string('q_fourteen_detail');
                $table->string('q_fifteen_title');
                $table->Integer('q_fifteen_value');
                $table->string('q_fifteen_detail');
                $table->string('q_sixteen_title');
                $table->Integer('q_sixteen_value');
                $table->string('q_sixteen_detail');
                $table->string('q_seventeen_title');
                $table->Integer('q_seventeen_value');
                $table->string('q_seventeen_detail');
                $table->string('q_eighteen_title');
                $table->Integer('q_eighteen_value');
                $table->string('q_eighteen_detail');
                $table->string('q_nineteen_title');
                $table->Integer('q_nineteen_value');
                $table->string('q_nineteen_detail');
                $table->string('q_twenty_title');
                $table->Integer('q_twenty_value');
                $table->string('q_twenty_detail');
                $table->string('q_twenty_one_title');
                $table->Integer('q_twenty_one_value');
                $table->string('q_twenty_one_detail');
                $table->string('q_twenty_two_title');
                $table->Integer('q_twenty_two_value');
                $table->string('q_twenty_two_detail');
                
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
