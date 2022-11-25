<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCopayToMedicalDiaryDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_diary_days', function (Blueprint $table) {
            $table->unsignedBigInteger('copay_id')->after('cancel_description')->nullable();
            $table->unsignedBigInteger('copay_value')->after('copay_id')->nullable();

            $table->index('copay_id');
            $table->foreign('copay_id')->references('id')
                ->on('copay_parameters');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medical_diary_days', function (Blueprint $table) {
            $table->dropForeign('copay_id');
            $table->dropColumn('copay_id');
            $table->dropColumn('copay_value');
        });
    }
}
