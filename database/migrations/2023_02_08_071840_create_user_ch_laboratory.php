    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUserChLaboratory extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('user_ch_laboratory', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('ch_laboratory_id');
                $table->unsignedBigInteger('laboratory_status_id');
                $table->string('observation');

                $table->index('user_id');
                $table->foreign('user_id')->references('id')
                    ->on('users');

                $table->index('ch_laboratory_id');
                $table->foreign('ch_laboratory_id')->references('id')
                    ->on('ch_laboratory');

                $table->index('laboratory_status_id');
                $table->foreign('laboratory_status_id')->references('id')
                    ->on('laboratory_status');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('user_ch_laboratory');
        }
    }
