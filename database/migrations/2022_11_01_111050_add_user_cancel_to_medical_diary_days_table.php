<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserCancelToMedicalDiaryDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_diary_days', function (Blueprint $table) {

            $table->unsignedBigInteger('user_cancel_id')->after('patient_id')->nullable();

            $table->index('user_cancel_id');
            $table->foreign('user_cancel_id')->references('id')
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
        Schema::table('medical_diary_days', function (Blueprint $table) {
            $table->dropForeign('user_cancel_id');
            $table->dropColumn('user_cancel_id');
        });
    }
}
