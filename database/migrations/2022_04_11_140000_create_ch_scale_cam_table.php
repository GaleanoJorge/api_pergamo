    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleCamTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_cam', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('mind_title');
                $table->Integer('mind_value');
                $table->string('mind_detail');
                $table->string('attention_title');
                $table->Integer('attention_value');
                $table->string('attention_detail');
                $table->string('thought_title');
                $table->Integer('thought_value');
                $table->string('thought_detail');
                $table->string('awareness_title');
                $table->Integer('awareness_value');
                $table->string('awareness_detail');
                $table->string('result');
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
            Schema::dropIfExists('ch_scale_cam');
        }
    }
