<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChMedicalOrdersToAssignedManagementPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assigned_management_plan', function (Blueprint $table) {
            $table->unsignedBigInteger('ch_medical_orders_id')->after('management_plan_id')->nullable();
            
            $table->index('ch_medical_orders_id');
            $table->foreign('ch_medical_orders_id')->references('id')
                ->on('ch_medical_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assigned_management_plan', function (Blueprint $table) {
            $table->dropColumn('ch_medical_orders_id');
            // $table->dropColumn('show_menu');
        });
    }
}
