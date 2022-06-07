    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleEsasTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_esas', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('pain_title');
                $table->Integer('pain_value');
                $table->string('tiredness_title');
                $table->Integer('tiredness_value');
                $table->string('retching_title');
                $table->Integer('retching_value');
                $table->string('depression_title');
                $table->Integer('depression_value');
                $table->string('anxiety_title');
                $table->Integer('anxiety_value');
                $table->string('drowsiness_title');
                $table->Integer('drowsiness_value');
                $table->string('appetite_title');
                $table->Integer('appetite_value');
                $table->string('breathing_title');
                $table->Integer('breathing_value');
                $table->string('welfare_title');
                $table->Integer('welfare_value');
                $table->string('sleep_title');
                $table->Integer('sleep_value');
                $table->string('observation');
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
            Schema::dropIfExists('ch_scale_esas');
        }
    }
