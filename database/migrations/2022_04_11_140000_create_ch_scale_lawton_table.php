    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChScaleLawtonTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_scale_lawton', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->String('phone_title');
                $table->Integer('phone_value');
                $table->String('phone_detail');
                $table->String('shopping_title');
                $table->Integer('shopping_value');
                $table->String('shopping_detail');
                $table->String('food_title');
                $table->Integer('food_value');
                $table->String('food_detail');
                $table->String('house_title');
                $table->Integer('house_value');
                $table->String('house_detail');
                $table->String('clothing_title');
                $table->Integer('clothing_value');
                $table->String('clothing_detail');
                $table->String('transport_title');
                $table->Integer('transport_value');
                $table->String('transport_detail');
                $table->String('medication_title');
                $table->Integer('medication_value');
                $table->String('medication_detail');
                $table->String('finance_title');
                $table->Integer('finance_value');
                $table->String('finance_detail');
                $table->Integer('total');
                $table->string('risk');
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
            Schema::dropIfExists('ch_scale_lawton');
        }
    }
