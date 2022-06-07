    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleJhDowntonTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_jh_downton', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('falls_title');
                $table->Integer('falls_value');
                $table->string('falls_detail');
                $table->string('medication_title');
                $table->Integer('medication_value');
                $table->string('medication_detail');
                $table->string('deficiency_title');
                $table->Integer('deficiency_value');
                $table->string('deficiency_detail');
                $table->string('mental_title');
                $table->Integer('mental_value');
                $table->string('mental_detail');
                $table->string('wandering_title');
                $table->Integer('wandering_value');
                $table->string('wandering_detail');
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
            Schema::dropIfExists('ch_scale_jh_downton');
        }
    }
