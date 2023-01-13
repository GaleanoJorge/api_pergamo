<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMedicalToChRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ch_record', function (Blueprint $table) {
            $table->unsignedBigInteger('medical_diary_days_id')->after('assigned_management_plan_id')->nullable();

            
            $table->index('medical_diary_days_id');
            $table->foreign('medical_diary_days_id')->references('id')
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
        Schema::table('ch_record', function (Blueprint $table) {
            $table->dropForeign('medical_diary_days_id');
            $table->dropColumn('medical_diary_days_id');
        });
    }
}
