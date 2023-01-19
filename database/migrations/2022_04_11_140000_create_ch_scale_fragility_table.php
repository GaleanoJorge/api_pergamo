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
            Schema::dropIfExists('ch_scale_fragility');
        }
    }
