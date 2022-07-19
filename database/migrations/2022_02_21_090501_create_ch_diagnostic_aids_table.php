    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChDiagnosticAidsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_diagnostic_aids', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('scan')->nullable();
                $table->string('spirometry')->nullable();
                $table->string('gases')->nullable();
                $table->string('polysomnography')->nullable();
                $table->string('other')->nullable();
                $table->string('none')->nullable();
                $table->string('observation')->nullable();
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
            Schema::dropIfExists('ch_diagnostic_aids');
        }
    }