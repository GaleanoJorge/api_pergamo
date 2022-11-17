<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthToAssistanceSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assistance_supplies', function (Blueprint $table) {
            $table->unsignedBigInteger('authorization_id')->after('application_hour')->nullable();

            $table->index('authorization_id');
            $table->foreign('authorization_id')->references('id')
                ->on('authorization');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item', function (Blueprint $table) {
            $table->dropForeign('authorization_id');
            $table->dropColumn('authorization_id');
        });
    }
}
