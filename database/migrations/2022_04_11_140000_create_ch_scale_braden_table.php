    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleBradenTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_braden', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->String('sensory_title');
                $table->Integer('sensory_value');
                $table->String('sensory_detail');
                $table->String('humidity_title');
                $table->Integer('humidity_value');
                $table->String('humidity_detail');
                $table->String('activity_title');
                $table->Integer('activity_value');
                $table->String('activity_detail');
                $table->String('mobility_title');
                $table->Integer('mobility_value');
                $table->String('mobility_detail');
                $table->String('nutrition_title');
                $table->Integer('nutrition_value');
                $table->String('nutrition_detail');
                $table->String('lesion_title');
                $table->Integer('lesion_value');
                $table->String('lesion_detail');
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
            Schema::dropIfExists('ch_scale_braden');
        }
    }
