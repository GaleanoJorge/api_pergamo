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
                $table->String('q_one_title');
                $table->Integer('q_one_value');
                $table->String('q_one_detail');
                $table->String('q_two_title');
                $table->Integer('q_two_value');
                $table->String('q_two_detail');
                $table->String('q_three_title');
                $table->Integer('q_three_value');
                $table->String('q_three_detail');
                $table->String('q_four_title');
                $table->Integer('q_four_value');
                $table->String('q_four_detail');
                $table->String('q_five_title');
                $table->Integer('q_five_value');
                $table->String('q_five_detail');
                $table->String('q_six_title');
                $table->Integer('q_six_value');
                $table->String('q_six_detail');
                $table->String('q_seven_title');
                $table->Integer('q_seven_value');
                $table->String('q_seven_detail');
                $table->String('q_eight_title');
                $table->Integer('q_eight_value');
                $table->String('q_eight_detail');
                $table->Integer('q_nine_title');
                $table->String('q_nine_value');
                $table->String('q_nine_detail');
                $table->Integer('q_ten_title');
                $table->String('q_ten_value');
                $table->String('q_ten_detail');
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
