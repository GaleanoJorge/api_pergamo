    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChRtInspectionTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_rt_inspection', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('expansion');
                $table->string('masses');
                $table->longText('detail_masses')->nullable();
                $table->string('crepitations');
                $table->string('fracturues');
                $table->longText('detail_fracturues')->nullable();
                $table->string('airway');
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
            Schema::dropIfExists('ch_rt_inspection');
        }
    }
