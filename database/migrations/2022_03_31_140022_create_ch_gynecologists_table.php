    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateChGynecologistsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ch_gynecologists', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('pregnancy_status')->nullable();
                $table->date('gestational_age')->nullable();
                $table->date('date_childbirth')->nullable();
                $table->integer('menarche_years');
                $table->date('last_menstruation');
                $table->integer('time_menstruation')->nullable();
                $table->integer('duration_menstruation')->nullable();
                $table->date('date_last_cytology')->nullable();
                $table->date('date_biopsy')->nullable();
                $table->date('date_mammography')->nullable();
                $table->date('date_colposcipia')->nullable();
                $table->integer('childbirth_number')->nullable();
                $table->integer('caesarean_operation')->nullable();
                $table->integer('misbirth')->nullable();
                $table->integer('molar_pregnancy')->nullable();
                $table->integer('ectopic')->nullable();
                $table->integer('dead_sons')->nullable();
                $table->integer('living_sons')->nullable();
                $table->integer('sons_dead_first_week')->nullable();
                $table->integer('children_died_after_the_first_week')->nullable();
                $table->integer('total_feats')->nullable();
                $table->string('misbirth_unstudied')->nullable();
                $table->string('background_twins')->nullable();
                $table->string('last_planned_pregnancy')->nullable();
                $table->date('date_of_last_childbirth')->nullable();
                $table->integer('last_weight')->nullable();
                $table->date('since_planning')->nullable();
                $table->integer('sexual_partners')->nullable();
                $table->integer('time_exam_breast_self')->nullable();
                $table->string('observation_breast_self_exam')->nullable();
                $table->string('observation_flow')->nullable();
                $table->unsignedBigInteger('ch_type_gynecologists_id')->nullable();
                $table->unsignedBigInteger('ch_planning_gynecologists_id')->nullable();
                $table->unsignedBigInteger('ch_exam_gynecologists_id')->nullable();
                $table->unsignedBigInteger('ch_failure_method_gyneco_id')->nullable();
                $table->unsignedBigInteger('ch_flow_gynecologists_id')->nullable();
                $table->unsignedBigInteger('ch_method_planning_gyneco_id')->nullable();
                $table->unsignedBigInteger('ch_rst_biopsy_gyneco_id')->nullable();
                $table->unsignedBigInteger('ch_rst_colposcipia_gyneco_id')->nullable();
                $table->unsignedBigInteger('ch_rst_cytology_gyneco_id')->nullable();
                $table->unsignedBigInteger('ch_rst_mammography_gyneco_id')->nullable();
                $table->unsignedBigInteger('type_record_id')->nullable();
                $table->unsignedBigInteger('ch_record_id')->nullable();
                $table->timestamps();

                $table->index('ch_type_gynecologists_id');
                $table->foreign('ch_type_gynecologists_id')->references('id')
                      ->on('ch_type_gynecologists');

                $table->index('ch_planning_gynecologists_id');
                $table->foreign('ch_planning_gynecologists_id')->references('id')
                    ->on('ch_planning_gynecologists');

                $table->index('ch_exam_gynecologists_id');
                $table->foreign('ch_exam_gynecologists_id')->references('id')
                    ->on('ch_exam_gynecologists');

                $table->index('ch_failure_method_gyneco_id');
                $table->foreign('ch_failure_method_gyneco_id')->references('id')
                   ->on('ch_failure_method_gyneco');

                $table->index('ch_flow_gynecologists_id');
                $table->foreign('ch_flow_gynecologists_id')->references('id')
                    ->on('ch_flow_gynecologists');
                    
                $table->index('ch_method_planning_gyneco_id');
                $table->foreign('ch_method_planning_gyneco_id')->references('id')
                     ->on('ch_method_planning_gyneco');

                $table->index('ch_rst_biopsy_gyneco_id');
                $table->foreign('ch_rst_biopsy_gyneco_id')->references('id')
                     ->on('ch_rst_biopsy_gyneco');
                
                $table->index('ch_rst_colposcipia_gyneco_id');
                $table->foreign('ch_rst_colposcipia_gyneco_id')->references('id')
                    ->on('ch_rst_colposcipia_gyneco');

                $table->index('ch_rst_cytology_gyneco_id');
                $table->foreign('ch_rst_cytology_gyneco_id')->references('id')
                    ->on('ch_rst_cytology_gyneco');
                
                $table->index('ch_rst_mammography_gyneco_id');
                $table->foreign('ch_rst_mammography_gyneco_id')->references('id')
                        ->on('ch_rst_mammography_gyneco');

                $table->index('type_record_id');
                $table->foreign('type_record_id')->references('id')
                      ->on('type_record');
       
                $table->index('ch_record_id');
                $table->foreign('ch_record_id')->references('id')
                    ->on('ch_record');

                });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('ch_gynecologists');
        }
    }
