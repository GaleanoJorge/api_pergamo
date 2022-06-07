    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleNewsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_news', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('p_one_title');
                $table->Integer('p_one_value');
                $table->string('p_one_detail');
                $table->string('p_two_title');
                $table->Integer('p_two_value');
                $table->string('p_two_detail');
                $table->string('p_three_title');
                $table->Integer('p_three_value');
                $table->string('p_three_detail');
                $table->string('p_four_title');
                $table->Integer('p_four_value');
                $table->string('p_four_detail');
                $table->string('p_five_title');
                $table->Integer('p_five_value');
                $table->string('p_five_detail');
                $table->string('p_six_title');
                $table->Integer('p_six_value');
                $table->string('p_six_detail');
                $table->string('p_seven_title');
                $table->Integer('p_seven_value');
                $table->string('p_seven_detail');
                $table->string('p_eight_title');
                $table->Integer('p_eight_value');
                $table->string('p_eight_detail');
                $table->Integer('qualification');
                $table->string('risk');
                $table->string('response');
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
            Schema::dropIfExists('ch_scale_news');
        }
    }
