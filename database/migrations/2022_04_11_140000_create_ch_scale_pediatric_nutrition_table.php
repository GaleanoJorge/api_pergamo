    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScalePediatricNutritionTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_pediatric_nutrition', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('score_one_title');
                $table->Integer('score_one_value');
                $table->string('score_one_detail');
                $table->string('score_two_title');
                $table->Integer('score_two_value');
                $table->string('score_two_detail');
                $table->string('score_three_title');
                $table->Integer('score_three_value');
                $table->string('score_three_detail');
                $table->string('score_four_title');
                $table->Integer('score_four_value');
                $table->string('score_four_detail');
                $table->string('total');
                $table->string('risk');
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
            Schema::dropIfExists('ch_scale_pediatric_nutrition');
        }
    }
