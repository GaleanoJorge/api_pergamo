    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleGlasgowTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_glasgow', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->String('ocular_title');
                $table->Integer('ocular_value');
                $table->String('ocular_detail');
                $table->String('verbal_title');
                $table->Integer('verbal_value');
                $table->String('verbal_detail');
                $table->String('motor_title');
                $table->Integer('motor_value');
                $table->String('motor_detail');
                $table->Integer('total');
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
            Schema::dropIfExists('ch_scale_glasgow');
        }
    }
