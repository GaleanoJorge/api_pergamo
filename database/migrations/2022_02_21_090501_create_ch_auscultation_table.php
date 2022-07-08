    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChAuscultationTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_auscultation', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('murmur')->nullable();
                $table->string('obs_murmur')->nullable();
                $table->string('crepits')->nullable();
                $table->string('obs_crepits')->nullable();
                $table->string('rales')->nullable();
                $table->string('obs_rales')->nullable();
                $table->string('stridor')->nullable();
                $table->string('obs_stridor')->nullable();
                $table->string('pleural')->nullable();
                $table->string('obs_pleural')->nullable();
                $table->string('roncus')->nullable();
                $table->string('obs_roncus')->nullable();
                $table->string('wheezing')->nullable();
                $table->string('obs_wheezing')->nullable();
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
            Schema::dropIfExists('ch_auscultation');
        }
    }
