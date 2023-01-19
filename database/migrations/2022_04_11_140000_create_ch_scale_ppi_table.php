    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScalePpiTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_ppi', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('pps_title');
                $table->Integer('pps_value');
                $table->string('pps_detail');
                $table->string('oral_title');
                $table->Integer('oral_value');
                $table->string('oral_detail');
                $table->string('edema_title');
                $table->Integer('edema_value');
                $table->string('edema_detail');
                $table->string('dyspnoea_title');
                $table->Integer('dyspnoea_value');
                $table->string('dyspnoea_detail');
                $table->string('delirium_title');
                $table->Integer('delirium_value');
                $table->string('delirium_detail');
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
            Schema::dropIfExists('ch_scale_ppi');
        }
    }
