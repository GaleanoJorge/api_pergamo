    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleBarthelTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_barthel', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('eat_title');
                $table->Integer('eat_value');
                $table->string('eat_detail');
                $table->string('move_title');
                $table->Integer('move_value');
                $table->string('move_detail');
                $table->string('cleanliness_title');
                $table->Integer('cleanliness_value');
                $table->string('cleanliness_detail');
                $table->string('toilet_title');
                $table->Integer('toilet_value');
                $table->string('toilet_detail');
                $table->string('shower_title');
                $table->Integer('shower_value');
                $table->string('shower_detail');
                $table->string('commute_title');
                $table->Integer('commute_value');
                $table->string('commute_detail');
                $table->string('stairs_title');
                $table->Integer('stairs_value');
                $table->string('stairs_detail');
                $table->string('dress_title');
                $table->Integer('dress_value');
                $table->string('dress_detail');
                $table->string('fecal_title');
                $table->Integer('fecal_value');
                $table->string('fecal_detail');
                $table->string('urine_title');
                $table->Integer('urine_value');
                $table->string('urine_detail');
                $table->string('classification');
                $table->Integer('score');
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
            Schema::dropIfExists('ch_scale_barthel');
        }
    }
