    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateTypeChPhysicalExamTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('type_ch_physical_exam', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name'); 
                $table->string('description'); 
                $table->timestamps();

            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('type_ch_physical_exam');
        }
    }
