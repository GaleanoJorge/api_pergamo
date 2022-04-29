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
                $table->Integer('parameter_one');
                $table->Integer('parameter_two');
                $table->Integer('parameter_three');
                $table->Integer('parameter_four');
                $table->Integer('parameter_five');
                $table->Integer('parameter_six');
                $table->Integer('parameter_seven');
                $table->Integer('parameter_eight');
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
