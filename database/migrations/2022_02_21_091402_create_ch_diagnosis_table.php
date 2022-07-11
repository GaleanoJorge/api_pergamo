    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChDiagnosisTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_diagnosis', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('ch_diagnosis_type_id');
                $table->unsignedBigInteger('ch_diagnosis_class_id');
                $table->unsignedBigInteger('diagnosis_id');
                $table->string('diagnosis_observation')->nullable();
                $table->unsignedBigInteger('type_record_id');
                $table->unsignedBigInteger('ch_record_id');
                $table->timestamps();

                $table->index('type_record_id');
                $table->foreign('type_record_id')->references('id')
                    ->on('type_record');
                $table->index('ch_record_id');
                $table->foreign('ch_record_id')->references('id')
                    ->on('ch_record');

                $table->index('ch_diagnosis_type_id');
                $table->foreign('ch_diagnosis_type_id')->references('id')
                    ->on('ch_diagnosis_type');


                $table->index('ch_diagnosis_class_id');
                $table->foreign('ch_diagnosis_class_id')->references('id')
                    ->on('ch_diagnosis_class');


                $table->index('diagnosis_id');
                $table->foreign('diagnosis_id')->references('id')
                    ->on('diagnosis');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('ch_diagnosis');
        }
    }
