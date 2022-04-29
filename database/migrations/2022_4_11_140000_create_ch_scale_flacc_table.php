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
                $table->number('face');
                $table->number('legs');
                $table->number('activity');
                $table->number('crying');
                $table->number('comfort');
                $table->number('total');
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
