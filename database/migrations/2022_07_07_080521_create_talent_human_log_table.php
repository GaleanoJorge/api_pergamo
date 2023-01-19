
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalentHumanLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talent_human_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('talent_human_action_id')->nullable();
            $table->unsignedBigInteger('talent_human_user_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('talent_human_action_id');
            $table->foreign('talent_human_action_id')->references('id')
                ->on('talent_human_action');

            $table->index('talent_human_user_id');
            $table->foreign('talent_human_user_id')->references('id')
                ->on('users');
            $table->index('user_id');
            $table->foreign('user_id')->references('id')
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
        Schema::dropIfExists('talent_human_log');
    }
}
