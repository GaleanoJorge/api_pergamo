<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCopayIdToAuthorizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authorization', function (Blueprint $table) {
            $table->unsignedBigInteger('copay_id')->after('observation')->nullable();
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
        Schema::table('authorization', function (Blueprint $table) {
            $table->dropColumn('copay_id');
            // $table->dropColumn('show_menu');
        });
    }
}
