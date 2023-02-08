<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToMedicalDiaryDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_diary_days', function (Blueprint $table) {

            $table->unsignedBigInteger('relationship_id')->after('relative_name')->nullable();

            $table->index('relationship_id');
            $table->foreign('relationship_id')->references('id')
                ->on('relationship');
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
            $table->dropForeign('relationship_id');
            $table->dropColumn('relationship_id');
        });
    }
}
