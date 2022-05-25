    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleScreeningTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_screening', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('v_one_title');
                $table->Integer('v_one_value');
                $table->string('v_one_detail');

                $table->string('v_two_title');
                $table->Integer('v_two_value');
                $table->string('v_two_detail');
                
                $table->string('v_three_title');
                $table->Integer('v_three_value');
                $table->string('v_three_detail');

                $table->string('v_four_title');
                $table->Integer('v_four_value');
                $table->string('v_four_detail');

                $table->string('v_five_title');
                $table->Integer('v_five_value');
                $table->string('v_five_detail');

                $table->string('v_six_title');
                $table->Integer('v_six_value');
                $table->string('v_six_detail');

                $table->string('v_seven_title');
                $table->Integer('v_seven_value');
                $table->string('v_seven_detail');

                $table->string('v_eight_title');
                $table->Integer('v_eight_value');
                $table->string('v_eight_detail');

                $table->string('v_nine_title');
                $table->Integer('v_nine_value');
                $table->string('v_nine_detail');

                $table->string('v_ten_title');
                $table->Integer('v_ten_value');
                $table->string('v_ten_detail');
               
                $table->Integer('total');
                $table->string('risk');
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
            Schema::dropIfExists('ch_scale_screening');
        }
    }
