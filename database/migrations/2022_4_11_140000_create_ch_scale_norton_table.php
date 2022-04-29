    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleNortonTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_norton', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->number('physical_state');
                $table->number('state_mind');
                $table->number('mobility');
                $table->number('activity');
                $table->number('incontinence');
                $table->number('total');
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
            Schema::dropIfExists('ch_scale_norton');
        }
    }
