    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleBarthelTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->number('eat');
                $table->number('move');
                $table->number('cleanliness');
                $table->number('toilet');
                $table->number('shower');
                $table->number('commute');
                $table->number('stairs');
                $table->number('dress');
                $table->number('fecal');
                $table->number('urine');
                $table->string('classification');
                $table->number('score');
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
            Schema::dropIfExists('ch_scale_barthel');
        }
    }
