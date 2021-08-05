<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Report Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['cors', 'jwt.auth', 'api']], function () {

    //Rating
    Route::get(
        'report/rating/averageByStudentCourseAndMinMax',
        'Report\RatingController@averageByStudentCourseAndMinMax'
    );
    Route::get(
        'report/rating/averageDeliveryRegion',
        'Report\RatingController@averageDeliveryRegion'
    );
    Route::get(
        'report/rating/activityByStudentCourse',
        'Report\RatingController@activityByStudentCourse'
    );
    Route::get(
        'report/rating/allByStudentCourse',
        'Report\RatingController@allByStudentCourse'
    );
    Route::get(
        'report/rating/approvedStudents',
        'Report\RatingController@approvedStudents'
    );
    Route::get(
        'report/rating/gradePointTeachers',
        'Report\RatingController@gradePointTeachers'
    );

    //Percentage
    Route::get(
        'report/percentage/competitionByStudentCourse',
        'Report\PercentageController@competitionByStudentCourse'
    );
    Route::get(
        'report/percentage/noApprovedStudents',
        'Report\PercentageController@noApprovedStudents'
    );
    Route::get(
        'report/percentage/groupAndIndividualDeliveries',
        'Report\PercentageController@groupAndIndividualDeliveries'
    );
    Route::get(
        'report/percentage/studentCompetitionsTecnovsTecnos',
        'Report\PercentageController@studentCompetitionsTecnovsTecnos'
    );
    Route::get(
        'report/percentage/averageGradesForTeacher',
        'Report\PercentageController@averageGradesForTeacher'
    );


    //Progress
    Route::get(
        'report/progress/expectedByStudentCourseInstitutionRegion',
        'Report\ProgressController@expectedByStudentCourseInstitutionRegion'
    );
    Route::get(
        'report/progress/studentsPendingDelivery',
        'Report\ProgressController@studentsPendingDelivery'
    );
    Route::get(
        'report/progress/gradePointAveragePerCourse',
        'Report\ProgressController@gradePointAveragePerCourse'
    );
    Route::get(
        'report/progress/approvedDeliveries',
        'Report\ProgressController@approvedDeliveries'
    );
    Route::get(
        'report/progress/approvedDeliveries2',
        'Report\ProgressController@approvedDeliveries2'
    );
    Route::get(
        'report/progress/projectProgress',
        'Report\ProgressController@projectProgress'
    );
    Route::get(
        'report/progress/fuid',
        'Report\ProgressController@fuid'
    );
    Route::get(
        'report/progress/goals',
        'Report\ProgressController@goals'
    );

    /**
     * Filtros Reportes SGA
     */
    Route::get('report-sga/courses','Report\ReportsController@getCourseFilters');
    Route::get('report-sga/users','Report\ReportsController@getUserFilters');
    Route::get('report-sga/filtersDiscente/{type?}','Report\ReportsController@getFiltersDiscente');
    Route::get('report-sga/filterGroups','Report\ReportsController@getFilterGroups');
    Route::get('report-sga/resumeAcademicRecord','Report\ReportsPDFController@getResumeAcademicRecord');
    Route::get('report-sga/filtersMulticriteria','Report\ReportsController@getFiltersMulticriteria');
    Route::get('report-sga/filtersCategory','Report\ReportsController@getFilterCategory');
    Route::get('report-sga/participantsMulticriteria', 'Report\ReportsController@jxMulticriteriaFilters');
    Route::get('report-sga/filtersSurvey/{type}','Report\SurveyController@indexSurveyTrainers');
    Route::get('report-sga/searchSurveyTrainer', 'Report\SurveyController@getSurveyTrainers');
    Route::get('report-sga/searchSurveyCourse', 'Report\SurveyController@getSurveyCourses');
    /**
     * Reportes SGA
     */
    Route::get('report-excel/consolidatedEvents','Report\ReportsController@exportConsolidatedEvents');
    Route::get('report-excel/academicActivities', 'Report\ReportsController@exportAcademicActivities');
    Route::get('report-excel/hoursOfAssistance', 'Report\ReportsController@exportHoursOfAssistance');
    Route::get('report-excel/attendeesOfAllCourses', 'Report\ReportsController@exportAttendeesOfAllCourses');
    Route::get('report-excel/registeredCourses', 'Report\ReportsController@exportRegisteredCourses');
    Route::get('report-excel/assignedTrainers', 'Report\ReportsController@exportAssignedTrainers');
    Route::get('report-pdf/academicRecord', 'Report\ReportsPDFController@exportAcademicRecord');
    Route::get('report-excel/activitiesCarriedOut', 'Report\ReportsController@exportActivitiesCarriedOutAndScheduled');
    Route::get('report-excel/multicriteriaInscribedFilters', 'Report\ReportsController@exportMulticriteriaInscribedFilters');
    Route::get('report-excel/extraordinaryRecord', 'Report\ReportsController@exportExtraordinaryRecord');
    Route::get('report-excel/activitiesPendingClosingEvent', 'Report\ReportsController@exportActivitiesPendingClosingEvent');
    Route::get('report-excel/activitiesPendingAssignmentTrainer', 'Report\ReportsController@exportActivitiesPendingAssignmentTrainer');
    Route::get('report-excel/multicriteriaFilters', 'Report\ReportsController@exportMulticriteriaFilters');
    Route::get('report-excel/exportSurveyTrainer', 'Report\SurveyController@exportSurveyTrainers');
    Route::get('report-excel/exportSurveyCourse', 'Report\SurveyController@exportSurveyCourses');
    Route::get('report-excel/tabulationSurvey', 'Report\SurveyController@exportTabulationSurvey');
    Route::get('report-excel/inconsistencies', 'Report\ReportsController@exportInconsistencies');
    
});
