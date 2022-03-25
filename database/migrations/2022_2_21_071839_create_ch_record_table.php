    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChRecordTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_record', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('status');
                $table->date('date_attention');
                $table->unsignedBigInteger('admissions_id');
                $table->unsignedBigInteger('user_id');
                $table->date('date_finish');
                $table->timestamps();

                $table->index('admissions_id');
                $table->foreign('admissions_id')->references('id')
                    ->on('admissions');

                    $table->index('user_id');
                    $table->foreign('user_id')->references('id')
                        ->on('users');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('ch_record');
        }
    }
