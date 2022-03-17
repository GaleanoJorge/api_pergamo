<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Admin Routes
|--------------------------------------------------------------------------
*/

Route::post('login', 'Auth\LoginController@login');
Route::post('loginJWH', 'Auth\LoginController@loginJWH');
Route::post('forgot', 'Auth\ForgotController');

// Papers
Route::get('papers', 'Certificates\PapersFormatController@index');
Route::get('papers/{id}', 'Certificates\PapersFormatController@show');
Route::post('papers', 'Certificates\PapersFormatController@store');
Route::put('papers/{id}', 'Certificates\PapersFormatController@update');
Route::delete('papers/{id}', 'Certificates\PapersFormatController@destroy');

//Signatures
Route::get('signatures', 'Certificates\SignaturesController@index');
Route::get('signatures/{id}', 'Certificates\SignaturesController@show');
Route::post('signatures', 'Certificates\SignaturesController@store');
Route::post('signatures/{id}', 'Certificates\SignaturesController@update');
Route::delete('signatures/{id}', 'Certificates\SignaturesController@destroy');

//Templates
Route::get('templates', 'Certificates\TemplatesController@index');
Route::get('templates/{id}', 'Certificates\TemplatesController@show');
Route::post('templates', 'Certificates\TemplatesController@store');
Route::post('templates/{id}', 'Certificates\TemplatesController@update');
Route::delete('templates/{id}', 'Certificates\TemplatesController@destroy');

//Certificates
// Route::resource('certificates', 'Certificates\CertificatesController');
Route::get('certificates', 'Certificates\CertificatesController@index');
Route::get('certificates/{id}', 'Certificates\CertificatesController@show');
Route::post('certificates', 'Certificates\CertificatesController@store');
Route::post('certificates/{id}', 'Certificates\CertificatesController@update');
Route::delete('certificates/{id}', 'Certificates\CertificatesController@destroy');
Route::get('get_pdf_certificate/{id}', 'Certificates\CertificatesController@get_pdf');
Route::post('send_certificate', 'Certificates\CertificatesController@send_certificate_email');

//Templates has signatures
Route::resource('template_has_signature', 'Certificates\TemplateHasSignaturesController');
Route::get('get_templates_signatures/{signatures_id}', 'Certificates\TemplateHasSignaturesController@get_signatures');
Route::get('get_signatures_templates/{templates_id}', 'Certificates\TemplateHasSignaturesController@get_templates');

//Notificaciones
Route::post('send-email-register-user', 'Notifications\SendEmailsController@index');

// Validate User Email
Route::get('check-email-user/{id}', 'Admin\UserController@checkUser');

// Validate User Email
Route::post('find-email', 'Admin\UserController@findEmail');

// Validate User Certificate
Route::post('find-certificate', 'Admin\UserController@findCertificate');

// ProcessType
Route::resource('process-type', 'LmsIntegration\ProcessTypeController');
// Process
Route::get('process', 'LmsIntegration\ProcessController@index');
Route::get('process/{id}', 'LmsIntegration\ProcessController@show');
Route::get('process-details', 'LmsIntegration\ProcessDetailController@index');
Route::get('process-details/{id}', 'LmsIntegration\ProcessDetailController@show');
Route::get('process-enroll', 'LmsIntegration\ProcessDetailEnrollController@enroll');
Route::get('process-detail', 'LmsIntegration\ProcessDetailEnrollController@show');

Route::get('process-details-activity', 'LmsIntegration\ProcessDetailActivityController@index');
Route::get('process-details-activity/{id}', 'LmsIntegration\ProcessDetailActivityController@show');
Route::get('process-details-activity-rubrics', 'LmsIntegration\ProcessDetailActivityRubricController@index');
Route::get('process-details-activity-rubrics/{id}', 'LmsIntegration\ProcessDetailActivityRubricController@show');
Route::get('process-details-activity-competences', 'LmsIntegration\ProcessDetailActivityCompetenceController@index');
Route::get('process-details-activity-competences/{id}', 'LmsIntegration\ProcessDetailActivityCompetenceController@show');
// Endpoints LMS
Route::get('competition-activity', 'LmsIntegration\CompetitionActivityController@index');
Route::get('competition-activity/{id}', 'LmsIntegration\CompetitionActivityController@show');
Route::get('competition-activity-byCourse/{id}', 'LmsIntegration\CompetitionActivityController@byCourse');


Route::post('lms-ratings', 'LmsIntegration\LMSController@ratings');

Route::group(['middleware' => ['cors', 'jwt.auth', 'api']], function () {
    Route::post('lms-enrollment', 'LmsIntegration\LMSController@enrollment');
    //Auth
    Route::post('logout', 'Auth\LoginController@logout');
    Route::post('refresh', 'Auth\LoginController@refresh');
    Route::post('me', 'Auth\LoginController@me');
    Route::get('user/auth/roles', 'Auth\LoginController@getRolesUserAuth');
    Route::post(
        'user/auth/changeRole/{roleId}',
        'Auth\LoginController@changeRoleUserAuth'
    );

    //Status
    Route::get('status', 'Admin\StatusController@index');

    //Gender
    Route::get('gender', 'Admin\GenderController@index');

    //Academic Level
    Route::get('academicLevel', 'Admin\AcademicLevelController@index');

    //Identification Type
    Route::get('identificationType', 'Admin\IdentificationTypeController@index');

    //Role
    Route::apiResource('role', 'Admin\RoleController');
    Route::get('role/userByRole/{roleId}', 'Admin\RoleController@getUserByRole');
    Route::post('role/addUser', 'Admin\RoleController@addRoleToUser');
    Route::delete('role/deleteUser/{roleId}', 'Admin\RoleController@deleteRoleToUser');

    //Permission
    Route::apiResource('permission', 'Admin\PermissionController')
        ->except(['store', 'destroy']);

    //Item
    Route::apiResource('item', 'Admin\ItemController');

    //Item Rol Permission
    Route::get(
        'item/role/permission/byRole/{roleId}',
        'Admin\ItemRolePermissionController@getByRole'
    );
    Route::post(
        'item/role/permission',
        'Admin\ItemRolePermissionController@store'
    );
    Route::delete(
        'item/role/permission/{id}',
        'Admin\ItemRolePermissionController@destroy'
    );


    //Campus By User
    Route::get(
        'campus/byUser/{userId}',
        'Admin\UserCampusController@getByUser'
    );
    Route::post('usercampus', 'Admin\UserCampusController@store');

    //Educational Institution
    Route::apiResource('institution', 'Admin\InstitutionController');
    Route::get(
        'institution/byMunicipality/{municipalityId}',
        'Admin\InstitutionController@getInstitutionsByMunicipality'
    );
    Route::get(
        'institution/byParent/{parentId}',
        'Admin\InstitutionController@getInstitutionsByParent'
    );
    Route::get(
        'institution/byId/{id}',
        'Admin\InstitutionController@getInstitutionById'
    );

    //Location
    Route::get(
        'country',
        'Admin\LocationController@getCountry'
    );
    Route::get(
        'region/byCountry/{countryId}',
        'Admin\LocationController@getRegionByCountry'
    );
    Route::get(
        'municipality/byRegion/{regionId}',
        'Admin\LocationController@getMunicipalityByRegion'
    );

    Route::get(
        'residence/byMunicipality/{municipalityId}',
        'Admin\LocationController@getNeighborhoodResidenceByMunicipality'
    );

    Route::get(
        'residence/locationbyMunicipality/{municipalityId}',
        'Admin\LocationController@GetLocalityByMunicipality'
    );

    Route::get(
        'residence/byLocality/{localityId}',
        'Admin\LocationController@getNeighborhoodResidenceByLocality'
    );

    //User
    Route::apiResource('user', 'Admin\UserController');
    Route::get('user/byRole/{roleId}', 'Admin\UserController@indexByRole');
    Route::get('users/Profesionals', 'Admin\UserController@ProfesionalsByCampus');
    Route::get('user/byPAD/{roleId}', 'Admin\UserController@indexPacientByPAD');
    Route::get('user/byPAC/{roleId}', 'Admin\UserController@indexPacientByPAC');
    Route::get('userByPacient', 'Admin\UserController@indexByPacient');
    Route::get('user/all/{roleId}', 'Admin\UserController@index2');
    Route::get('getUserAuxiliaryData', 'Admin\UserController@getAuxiliaryData');
    Route::patch('user/{id}/changeStatus', 'Admin\UserController@changeStatus');
    Route::get('userCurriculumByHistory', 'Admin\UserController@getHistory');
    Route::get('userCurriculumByHistory/{user_id}', 'Admin\UserController@getHistory');
    Route::patch('user/{id}/forceResetPassword', 'Admin\UserController@forceResetPassword');
    Route::patch('user-changePassword', 'Admin\UserController@changePassword');
    // Route::post('user/', 'Admin\UserController@store');
    // Route::put('user/{id}', 'Admin\UserController@update');

    Route::post('user/addParentUser', 'Admin\UserController@addParentUser');
    Route::get(
        'user/allChildrenOfParentUser/{parentUserId}',
        'Admin\UserController@getChildrenOfParentUser'
    );

    //UserRole
    Route::get('userRole/getByRole/{roleId}', 'Admin\UserRoleController@getByRole');

    //UserRoleCourse

    Route::get('inscriptionsByCourse', 'Admin\UserRoleCourseController@indexInscriptions');
    Route::get('inscriptionsByCourse/{inscriptionstatusId}', 'Admin\UserRoleCourseController@index2');
    Route::get('statsInscriptionsByCourse', 'Admin\UserRoleCourseController@statsInscriptionsByStatus');
    Route::get('statsInscriptionsByFilter/{validityId}/{originId}/{categoryId}', 'Admin\UserRoleCourseController@statsInscriptionsByFilter');
    Route::get('coursesByUser', 'Admin\UserRoleCourseController@indexByUser');
    Route::put('userRoleCourse/{id}', 'Admin\UserRoleCourseController@update');
    Route::get('countPoblationAcademic', 'Admin\UserRoleCourseController@countPoblationAcademic');

    //Teams
    Route::get('testRoomTeams', 'Admin\TeamsController@test');
    Route::post('createRoomTeams', 'Admin\TeamsController@createRoomTeams');
    Route::put('createRoomSession/{id}', 'Admin\TeamsController@updateRoomSession');
});
