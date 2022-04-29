    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleEsasTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_esas', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->Integer('pain');
                $table->Integer('tiredness');
                $table->Integer('retching');
                $table->Integer('depression');
                $table->Integer('anxiety');
                $table->Integer('drowsiness');
                $table->Integer('appetite');
                $table->Integer('breathing');
                $table->Integer('welfare');
                $table->Integer('sleep');
                $table->string('observation');
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
            Schema::dropIfExists('ch_scale_esas');
        }
    }
