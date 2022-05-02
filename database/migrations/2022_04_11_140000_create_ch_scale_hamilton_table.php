    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleHamiltonTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_hamilton', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->Integer('variable_one');
                $table->Integer('variable_two');
                $table->Integer('variable_three');
                $table->Integer('variable_four');
                $table->Integer('variable_five');
                $table->Integer('variable_six');
                $table->Integer('variable_seven');
                $table->Integer('variable_eigth');
                $table->Integer('variable_nine');
                $table->Integer('variable_ten');
                $table->Integer('variable_eleven');
                $table->Integer('variable_twelve');
                $table->Integer('variable_thirteen');
                $table->Integer('variable_fourteen');
                $table->Integer('variable_fifteen');
                $table->Integer('variable_sixteen');
                $table->Integer('variable_seventeen');
                $table->Integer('variable_eighteen');
                $table->Integer('total');
                $table->string('qualification');
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
            Schema::dropIfExists('ch_scale_hamilton');
        }
    }
