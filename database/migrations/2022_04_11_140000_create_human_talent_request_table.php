    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateHumanTalentRequestTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('human_talent_request', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('admissions_id');
                $table->unsignedBigInteger('management_plan_id');
                $table->string('observation')->nullable();
                $table->string('status')->nullable();


                $table->timestamps();

                $table->index('admissions_id');
                $table->foreign('admissions_id')->references('id')
                    ->on('admissions');

                $table->index('management_plan_id');
                $table->foreign('management_plan_id')->references('id')
                    ->on('management_plan');

            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('human_talent_request');
        }
    }
