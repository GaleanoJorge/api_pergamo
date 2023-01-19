    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChRespiratoryTherapyTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_respiratory_therapy', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('medical_diagnosis_id') ->nullable();
                $table->longText('therapeutic_diagnosis') ->nullable();
                $table->longText('reason_consultation') ->nullable();
                $table->unsignedBigInteger('type_record_id');
                $table->unsignedBigInteger('ch_record_id');
                $table->timestamps();

                $table->index('type_record_id');
                $table->foreign('type_record_id')->references('id')
                    ->on('type_record');
                    
                $table->index('ch_record_id');
                $table->foreign('ch_record_id')->references('id')
                    ->on('ch_record');

                $table->index('medical_diagnosis_id');
                $table->foreign('medical_diagnosis_id')->references('id')
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
            Schema::dropIfExists('ch_respiratory_therapy');
        }
    }
