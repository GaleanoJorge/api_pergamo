<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChInterconsultationToChRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ch_record', function (Blueprint $table) {
            $table->unsignedBigInteger('ch_interconsultation_id')->after('assigned_management_plan_id')->nullable();
            
            $table->index('ch_interconsultation_id');
            $table->foreign('ch_interconsultation_id')->references('id')
                ->on('ch_interconsultation');
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
            $table->dropColumn('ch_interconsultation_id');
            // $table->dropColumn('show_menu');
        });
    }
}
