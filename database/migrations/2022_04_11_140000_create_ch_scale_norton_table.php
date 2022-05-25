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
                $table->String('physical_title');
                $table->Integer('physical_value');
                $table->String('physical_detail');
                $table->String('mind_title');
                $table->Integer('mind_value');
                $table->String('mind_detail');
                $table->String('mobility_title');
                $table->Integer('mobility_value');
                $table->String('mobility_detail');
                $table->String('activity_title');
                $table->Integer('activity_value');
                $table->String('activity_detail');
                $table->String('incontinence_title');
                $table->Integer('incontinence_value');
                $table->String('incontinence_detail');
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
            Schema::dropIfExists('ch_scale_norton');
        }
    }
