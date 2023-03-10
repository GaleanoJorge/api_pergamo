    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleFlaccTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_flacc', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('face_title');
                $table->Integer('face_value');
                $table->string('face_detail');
                $table->string('leg_titles');
                $table->Integer('legs_value');
                $table->string('legs_detail');
                $table->string('activity_title');
                $table->Integer('activity_value');
                $table->string('activity_detail');
                $table->string('crying_title');
                $table->Integer('crying_value');
                $table->string('crying_detail');
                $table->Integer('comfor_titlet');
                $table->string('comfort_value');
                $table->string('comfort_detail');
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
            Schema::dropIfExists('ch_scale_flacc');
        }
    }
