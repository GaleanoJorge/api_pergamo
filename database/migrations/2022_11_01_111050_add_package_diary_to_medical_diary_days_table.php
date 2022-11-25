<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPackageDiaryToMedicalDiaryDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_diary_days', function (Blueprint $table) {

            $table->unsignedBigInteger('diary_days_id')->after('copay_value')->nullable();

            $table->index('diary_days_id');
            $table->foreign('diary_days_id')->references('id')
                ->on('medical_diary_days');
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
            $table->dropForeign('diary_days_id');
            $table->dropColumn('diary_days_id');
            // $table->dropColumn('copay_value');
        });
    }
}
