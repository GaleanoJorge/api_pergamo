<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Management Routes
|--------------------------------------------------------------------------
*/

//Routes free for the render and finished the survey
Route::apiResource('survey_detail', 'Management\SurveyDetailController');
Route::apiResource('user_assig_survey', 'Management\UserAssignSurveyController');
Route::post('user_assig_survey/{id}', 'Management\UserAssignSurveyController@update');
Route::get('user_surveys/{id}', 'Management\UserAssignSurveyController@get_user_surveys');
Route::apiResource('surveyInstance', 'Management\SurveyInstanceController');


Route::group(['middleware' => ['cors', 'jwt.auth', 'api']], function () {

    //Origin
    Route::get('origin/allByUserAuth', 'Management\OriginController@getByUserAuth');
    //Route::get('origin', 'Management\OriginController@index');
    Route::apiResource('origin', 'Management\OriginController');

    //Red de Formadores
    Route::apiResource('trainersNetwork', 'Management\UserRoleCategoryInscriptionController');
    Route::get('trainersByCourse', 'Management\UserRoleCategoryInscriptionController@indexTrainersByCourse');


    //Inscription Status
    Route::apiResource('inscriptionStatus', 'Management\InscriptionStatusController');

    //Group
    Route::apiResource('group', 'Management\GroupController');

    //SectionalCouncil
    Route::apiResource('sectionalCouncil', 'Management\SectionalCouncilController');

    //District
    Route::apiResource('district', 'Management\DistrictController');

    //Circuit
    Route::apiResource('circuit', 'Management\CircuitController');

    //Dependence
    Route::apiResource('dependence', 'Management\DependenceController');

    //Municipality
    Route::apiResource('municipality', 'Management\MunicipalityController');
    Route::get('municipalityAutocomplete', 'Management\MunicipalityController@autocomplete');

    //Region
    Route::apiResource('region', 'Management\RegionController');

    //product category by group
    Route::get(
        'productCategory/byGroup/{product_group_id}',
        'Management\ProductCategoryController@getCategoryByGroup'
    );

    //product subcategory by category
    Route::get(
        'productSubcategory/byCategory/{product_category_id}',
        'Management\ProductSubcategoryController@getSubcategoryByCategory'
    );

    //Position
    Route::apiResource('position', 'Management\PositionController');

    //Status Invima
    Route::apiResource('invima_status', 'Management\InvimaStatusController');

    //Product
    Route::apiResource('product', 'Management\ProductController');

    //Risk
    Route::apiResource('risk', 'Management\RiskController');

    //Storage Conditions
    Route::apiResource('storage_conditions', 'Management\StorageConditionsController');

    //Specialty
    Route::apiResource('specialty', 'Management\SpecialtyController');

    //Entity
    Route::apiResource('entity', 'Management\EntityController');

    //Office
    Route::apiResource('office', 'Management\OfficeController');

    //Area
    Route::apiResource('area', 'Management\AreaController');

    //Subarea
    Route::apiResource('subarea', 'Management\SubareaController');

    //themes
    Route::apiResource('themes', 'Management\ThemesController');


    //competition
    Route::apiResource('competition', 'Management\CompetitionController');


    //Validity
    Route::apiResource('validity', 'Management\ValidityController');

    //Category
    Route::get('category/all', 'Management\CategoryController@all');
    Route::get('category/byprogram/{program}', 'Management\CategoryController@getByProgram');
    Route::get('category/bysubprogram/{program}', 'Management\CategoryController@getBySubProgram');
    Route::apiResource('category', 'Management\CategoryController');
    Route::post('category/{id}', 'Management\CategoryController@update');
    Route::get(
        'category/allByOrigin/{originId}',
        'Management\CategoryController@getByOrigin'
    );
    Route::get(
        'category/goalByCategory/{categoryId}',
        'Management\CategoryController@getGoals'
    );

    Route::get(
        'category/categoryByOrigin/{originId}',
        'Management\CategoryController@getCatByOrigin'
    );

    //Course
    Route::get('course', 'Management\CourseController@index');
    Route::get(
        'courseAutocomplete',
        'Management\CourseController@autocomplete'
    );
    Route::get(
        'course/allByCategory/{categoryId}',
        'Management\CourseController@getByCategory'
    );
    Route::get(
        'course/allByInstitution/{institutionId}',
        'Management\CourseController@getByInstitution'
    );
    Route::get(
        'course/byIdWithCompetitions/{courseId}',
        'Management\CourseController@getByIdWithCompetitions'
    );
    Route::get(
        'course/structure/{courseId}',
        'Management\CourseController@GetCourseStructure'
    );
    Route::get(
        'course/groupDelivery/{group}',
        'Management\CourseController@GetGroupDelivery'
    );

    //CategoryOrigin
    Route::apiResource('categoryOrigin', 'Management\CategoriesOriginController');

    //Course UserRole
    Route::get(
        'course/userRoleByCourse/{courseId}',
        'Management\CourseController@getUserRole'
    );
    Route::get(
        'course/allByUserRole/{roleId}',
        'Management\CourseController@getAllByUserRole'
    );

    //Course EducationalInstitution
    Route::get(
        'course/EducationalInstitution/{courseId}',
        'Management\CourseController@getEducationalInstitutionByCourseId'
    );

    //Module
    Route::apiResource('module', 'Management\ModuleController');
    Route::get(
        'module/moduleByCategory/{categoryId}',
        'Management\ModuleController@getByCategory'
    );
    Route::get(
        'module/allByCourse/{courseId}',
        'Management\ModuleController@getByCourse'
    );

    //Session
    Route::apiResource('session', 'Management\SessionController');
    Route::get(
        'session/allByModule/{courseId}',
        'Management\SessionController@getByModule'
    );
    Route::get('session/allByGroup/{groupId}', 'Management\SessionController@getByGroup');
    Route::get('sessionsByTeacher', 'Management\SessionController@getByTeacher');
    Route::get('assistanceDiaryCheck', 'Management\SessionController@assistanceDiaryCheck');
    Route::get('assistanceCloseCheck', 'Management\SessionController@assistanceCloseCheck');
    Route::get('session/CreateQRCode/{sessionId}/{urgId}', 'Management\SessionController@CreateQRCode');

    //Activity
    Route::get(
        'activity/allBySession/{sessionId}',
        'Management\ActivityController@getBySession'
    );

    //Group Activity
    Route::get(
        'groupActivity/allByActivity/{activityId}',
        'Management\GroupActivityController@getByActivity'
    );
    Route::get(
        'groupActivity/userByGroupActivity/{groupActivityId}',
        'Management\GroupActivityController@getUserByGroupActivity'
    );

    //Delivery
    Route::get(
        'delivery/allByActivity/{activityId}',
        'Management\DeliveryController@getByActivity'
    );
    Route::get(
        'delivery/allGroupActivity/{deliveryId}',
        'Management\DeliveryController@getGroupActivity'
    );

    //Score
    Route::get(
        'score/allByDelivery/{deliveryId}',
        'Management\ScoreController@getByDelivery'
    );

    //Competition
    Route::get(
        'competition/allByCourse/{courseId}',
        'Management\CompetitionController@getByCourse'
    );

    //Custom Field
    Route::get(
        'customField/allByCourse/{courseId}',
        'Management\CustomFieldController@getByCourse'
    );
    Route::get(
        'customField/allByInstitution/{institutionId}',
        'Management\CustomFieldController@getByInstitution'
    );
    Route::get(
        'customField/allByUserRole/{userRoleId}',
        'Management\CustomFieldController@getByUserRole'
    );

    //Goals
    Route::get('goals', 'Management\GoalController@index');

    //CourseMain
    Route::apiResource('courses', 'Management\CourseMainController');
    Route::get('courses/byvalidity/{validityId}/{originId}/{categoryId}', 'Management\CourseMainController@index2');


    //Coursebase
    Route::apiResource('basecourses', 'Management\CoursebaseController');
    Route::post('basecourses/{id}', 'Management\CoursebaseController@update');
    Route::get('basecourses/courseByCategory/{category_id}', 'Management\CoursebaseController@getCourseByCategory');

    //Campus
    Route::apiResource('campus', 'Management\CampusController');

    //Procedimiento Edad
    Route::apiResource('procedure_age', 'Management\ProcedureAgeController');

    //Categorias de Procedimiento
    Route::apiResource('procedure_category', 'Management\ProcedureCategoryController');

    //Objetivo de Procedimiento
    Route::apiResource('procedure_purpose', 'Management\ProcedurePurposeController');

    //Clasificación de RIPS
    Route::apiResource('purpose_service', 'Management\PurposeServiceController');

    //Tipo de procedimiento
    Route::apiResource('procedure_type', 'Management\ProcedureTypeController');

    //Tipo de PBS plan básico de salud
    Route::apiResource('pbs_type', 'Management\PbsTypeController');

    //Tipo de registros individuales de prestación de servicios de salud
    Route::apiResource('rips_type', 'Management\RipsTypeController');

    //Contiene las abreviaturas de los archivos para los rips
    Route::apiResource('rips_typefile', 'Management\RipsTypefileController');

    //Procedimiento
    Route::apiResource('procedure', 'Management\ProcedureController');

    //Procedimiento para manual
    Route::get('procedure_bymanual/{id}', 'Management\ProcedureController@getByManual');

    //Procedimiento para paquete
    Route::get('procedure_bypackage', 'Management\ProcedureController@getByProcedure');

    //Procedimiento para paquete all
    Route::apiResource('procedure_package', 'Management\ProcedurePackageController');

    //Procedimiento para paquete all
    Route::get('bypackage_procedure/{id}', 'Management\ProcedurePackageController@getByPackage');

    //Tipos de personas contablemente
    Route::apiResource('company_kindperson', 'Management\CompanyKindpersonController');

    //Categoría de la empresa
    Route::apiResource('company_category', 'Management\CompanyCategoryController');

    //Tipo de compañias de entidades de salud
    Route::apiResource('company_type', 'Management\CompanyTypeController');

    //Tipos de identificaciones
    Route::apiResource('identification_type', 'Management\IdentificationTypeController');

    //Direccion de Correos electronico de las compañias
    Route::apiResource('company_mail', 'Management\CompanyMailController');

    //Direcciones de correo por compañia
    Route::get('company_mail/MailByCompany/{companyId}',
    'Management\CompanyMailController@getByCompany');

    //Asociacion de las empresas con los documentos solicitantes
    Route::apiResource('company_document', 'Management\CompanyDocumentController');

    //Documentos por compañia
    Route::get('company_document/DocumentByCompany/{companyId}',
    'Management\CompanyDocumentController@getByCompany');


    //Documentos contables
    Route::apiResource('document_account', 'Management\DocumentAccountController');

    //Documentos 
    Route::apiResource('document', 'Management\DocumentController');

    //Grupos de la clasificación industrial internacional uniforme
    Route::apiResource('ciiu_group', 'Management\CiiuGroupController');

    //Division de la clasificación industrial internacional uniforme
    Route::apiResource('ciiu_division', 'Management\CiiuDivisionController');

    //Clase de la clasificación industrial internacional uniforme 
    Route::apiResource('ciiu_class', 'Management\CiiuClassController');

    //Asociación de las actividades economicas con las emrpresas 
    Route::apiResource('company_ciiu', 'Management\CompanyCiiuController');

    //Asociación de las actividades economicas con las emrpresas 
    Route::apiResource('company_fiscal', 'Management\CompanyFiscalController');

    //Guarda la responsabilidad fiscal del contribuyente
    Route::apiResource('fiscal_characteristic', 'Management\FiscalCharacteristicController');

    //Priorizacion de los atributos fiscales
    Route::apiResource('fiscal_clasification', 'Management\FiscalClasificationController');

    //Impuestos
    Route::apiResource('company_taxes', 'Management\CompanyTaxesController');

    //Impuestos
    Route::apiResource('taxes', 'Management\TaxesController');
    // Impuestos para compañia
    Route::get('company_taxes/TaxesByCompany/{companyId}',
     'Management\CompanyTaxesController@getByCompany');

    //Empresas dentro de las que se indetifican las prestadoras de salud
    Route::apiResource('company', 'Management\CompanyController');

    //Nombre del tipo de iva
    Route::apiResource('iva', 'Management\IvaController');

    //Nombre del tipo de Parentesco
    Route::apiResource('relationship', 'Management\RelationshipController');

    //Tipos de residencia
    Route::apiResource('residence', 'Management\ResidenceController');

    //Numero de días para el termino de pago
    Route::apiResource('payment_terms', 'Management\PaymentTermsController');

    //Tabla parametro para seleccionar identificar si las empresas son autorretendoras
    Route::apiResource('retiner', 'Management\RetinerController');

    //Manual Tarifario 
    Route::apiResource('manual', 'Management\ManualController');
    Route::put('manual_clone/{id}', 'Management\ManualController@clone');


    //Asociación de los manuales con los procedimientos y las tarifas
    Route::apiResource('manual_price', 'Management\ManualPriceController');
    Route::post('fileUpload_manual_price/{id}', 'Management\ManualPriceController@import');
    Route::get(
        'ManualPrice/ProcedureByManual/{manualId}',
        'Management\ManualPriceController@getByManual'
    );
    Route::get(
        'manual_pricebybriefcase/{briefcaseId}',
        'Management\ManualPriceController@getByBriefcase'
    );
    Route::get(
        'ManualPrice/ProcedureByManual2/{manualId}',
        'Management\ManualPriceController@getByManual2'
    );

    //Tipo de precio que uilizan las tarifas en salud UVR y Valor 
    Route::apiResource('price_type', 'Management\PriceTypeController');

    //Empresas que fabrican medicamentos
    Route::apiResource('factory', 'Management\FactoryController');

    //CourseType
    Route::apiResource('course_type', 'Management\CourseTypeController');

    //CourseStates
    Route::apiResource('course_states', 'Management\CourseStatesController');

    //EntityType
    Route::apiResource('entityType', 'Management\EntityTypeController');

    //Specialtym
    Route::apiResource('specialtym', 'Management\SpecialtymController');

    //CourseModule
    Route::apiResource('courseModule', 'Management\CourseModuleController');
    Route::get('modulesByCourse', 'Management\CourseModuleController@indexModulesByCourse');

    //Producto Generico
    Route::apiResource('product_generic', 'Management\ProductGenericController');

    //Presentacion del producto
    Route::apiResource('product_presentation', 'Management\ProductPresentationController');

    //Concentracion del producto
    Route::apiResource('product_concentration', 'Management\ProductConcentrationController');

    //Concentración del producto
    Route::apiResource('measurement_units', 'Management\MeasurementUnitsController');

    //Grupo del producto
    Route::apiResource('product_group', 'Management\ProductGroupController');

    //Categoria del producto
    Route::apiResource('product_category', 'Management\ProductCategoryController');

    //Subcategoria del producto
    Route::apiResource('product_subcategory', 'Management\ProductSubcategoryController');

    //Vía de  Administración 
    Route::apiResource('administration_route', 'Management\AdministrationRouteController');

    //Obsevacion de novedades
    Route::apiResource('observation_novelty', 'Management\ObservationNoveltyController');

    //Cambio de usuario
    Route::apiResource('user_change', 'Management\UserChangeController');
   //Tipo de poliza
   Route::apiResource('policy_type', 'Management\PolicyTypeController');
   
   //Datos de paciente (acompañante y/o responsable)
   Route::apiResource('patient_data', 'Management\PatientDataController');

   //Tener acompañante y/o responsable por paciente
   Route::get('PatientData/PatientDatabyAdmission/{admissionId}',
    'Management\PatientDataController@getByAdmissions');

    //Tipo de poliza
    Route::apiResource('policy_type', 'Management\PolicyTypeController');

    //Póliza
    Route::apiResource('policy', 'Management\PolicyController');

    //Unidad de Consumo
    Route::apiResource('consumption_unit', 'Management\ConsumptionUnitController');


    //Activos Fijos 
    Route::apiResource('fixed_assets', 'Management\FixedAssetsController');

    //Tipos de Activos Fijos
    Route::apiResource('type_assets', 'Management\TypeAssetsController');

    //Contratos
    Route::apiResource('contract', 'Management\ContractController');

    //Tipos de Contratos
    Route::apiResource('type_contract', 'Management\TypeContractController');

    //Contratos
    Route::apiResource('contract', 'Management\ContractController');

    //Firmas (Contratistas, Contratante)
    Route::apiResource('firms', 'Management\FirmsController');

    //Archivo del contrato
    Route::apiResource('file_contract', 'Management\FileContractController');

    //seleccion RH
    Route::apiResource('select_rh', 'Management\SelectRhController');

    //Estado de nivel de estudio
    Route::apiResource('study_level_status', 'Management\StudyLevelStatusController');

    //Barrio/Vereda De Residencia
    Route::apiResource('neighborhood_or_residence', 'Management\NeighborhoodOrResidenceController');

    //Ocupaciones
    Route::apiResource('activities', 'Management\ActivitiesController');

    //Vía de ingreso de l paciente
    Route::apiResource('admission_route', 'Management\AdmissionRouteController');

    //Ambito de atención
    Route::apiResource('scope_of_attention', 'Management\ScopeOfAttentionController');

    //Ambito por ruta de admisión
    Route::get(
        'scopeofattention/byAdmission/{admission_route_id}',
        'Management\ScopeOfAttentionController@getScopeByAdmission'
    );

    //Programa en el cual va a ser atendio
    Route::apiResource('program', 'Management\ProgramController');

    //Ambito por ruta de admisión
    Route::get(
        'program/byScope/{scope_of_attention_id}',
        'Management\ProgramController@getProgramByScope'
    );
    //Piso 
    Route::apiResource('flat', 'Management\FlatController');

    //Ambito por ruta de admisión
    Route::get(
        'flat/byCampus/{campus_id}',
        'Management\FlatController@getFlatByCampus'
    );

    //Pabellón
    Route::apiResource('pavilion', 'Management\PavilionController');

    //Ambito por ruta de admisión
    Route::get(
        'pavilion/byFlat/{flat_id}',
        'Management\PavilionController@getPavilionByFlat'
    );

    //Cama asignada al paciente
    Route::apiResource('bed', 'Management\BedController');

    Route::get(
        'bedbyPacient',
        'Management\BedController@getBedByPacient'
    );


    Route::get(
        'bed/byPavilion/{pavilion_id}/{ambit}',
        'Management\BedController@getBedByPavilion'
    );

    //Estados de la cama
    Route::apiResource('status_bed', 'Management\StatusBedController');

    //Discapacidad del usuario
    Route::apiResource('inability', 'Management\InabilityController');

    //Atención Especial
    Route::apiResource('special_attention', 'Management\SpecialAttentionController');

    //Grupo Poblacional
    Route::apiResource('population_group', 'Management\PopulationGroupController');

    //Información del paciente
    Route::apiResource('patient_data', 'Management\PatientDataController');

    //Tipo de afiliado
    Route::apiResource('affiliate_type', 'Management\AffiliateTypeController');

    //Admisiones
    Route::apiResource('admissions', 'Management\AdmissionsController');
    Route::get('admission/byPAC/{roleId}', 'Management\AdmissionsController@ByPAC');
    

    //Tipo de contrato del empleado
    Route::apiResource('contract_type', 'Management\ContractTypeController');

    //Centro de costos
    Route::apiResource('cost_center', 'Management\CostCenterController');

    //Tipo de profesional
    Route::apiResource('type_professional', 'Management\TypeProfessionalController');

    //Especialidad
    Route::apiResource('special_field', 'Management\SpecialFieldController');

    //Firma digital del profesional
    Route::apiResource('medium_signature_file', 'Management\MediumSignatureFileController');





    Route::get(
        'admissions/ByPacient/{pacientId}',
        'Management\AdmissionsController@getByPacient'
    );

    //location
    Route::apiResource('location', 'Management\LocationController');

    Route::put(
        'location/changeService/{Id}',
        'Management\LocationController@changeService'
    );



    //diagnosis
    Route::apiResource('diagnosis', 'Management\DiagnosisController');


    Route::get(
        'FileContract/FileByContract/{contractId}',
        'Management\FileContractController@getByContract'
    );

    //Tener Póliza por contrato
    Route::get(
        'Policy/FileByContract/{contractId}',
        'Management\PolicyController@getByContract'
    );

    //Tipo de portafolios
    Route::apiResource('type_briefcase', 'Management\TypeBriefcaseController');

    //Cobertura de atención 
    Route::apiResource('coverage', 'Management\CoverageController');

    //Tipo de atención para plan de manejo PAD 
    Route::apiResource('type_of_attention', 'Management\TypeOfAttentionController');

    //frecuencia para plan de manejo PAD
    Route::apiResource('frequency', 'Management\FrequencyController');

    //Plan de manejo PAD
    Route::apiResource('management_plan', 'Management\ManagementPlanController');

    Route::get('assigned_management_plan/{managementId}', 'Management\AssignedManagementPlanController@indexPacientByManagement');
    //Tener acompañante y/o responsable por paciente
    // Route::get('Policy/FileByContract/{contractId}',
    // 'Management\PolicyController@getByContract');

   //Tipo de portafolios
   Route::apiResource('type_briefcase', 'Management\TypeBriefcaseController');

    //Portafolio de servicios
    Route::get('management_plan_by_admissions/{id}', 'Management\ManagementPlanController@getByAdmission');

    //Modalidad del servicio
    Route::apiResource('modality', 'Management\ModalityController');

    //Portafolio de servicios
    Route::apiResource('services_briefcase', 'Management\ServicesBriefcaseController');

    //Portafolio de servicios
    Route::put('services_updatebriefcase/{id}', 'Management\ServicesBriefcaseController@update');

    //manual price filter x manual
    Route::get('manual_price/{id}/{id2}', 'Management\ManualPriceController@getByFilterManual');

    //Portafolio de servicios por contrato
    Route::get(
        'ServiceBriefcase/ServicesByBriefcase/{briefcaseId}',
        'Management\ServicesBriefcaseController@getByBriefcase'
    );

    //Sedes del Portafolio de servicios
    Route::apiResource('campus_briefcase', 'Management\CampusBriefcaseController');

    //Portafolio de servicios por contrato
    Route::get(
        'campus_briefcase/campusByBriefcase/{briefcaseId}',
        'Management\CampusBriefcaseController@getByBriefcase'
    );

        //Portafolio de servicios por contrato
        Route::get(
            'location_capacity/AssistanceByLocation/{assistanceId}',
            'Management\LocationCapacityController@getByLocality'
        );

    //Portafolio de servicios
    Route::apiResource('briefcase', 'Management\BriefcaseController');

    //Portafolio de servicios por contrato
    Route::get(
        'briefcasecontract/briefcaseByContract/{contractId}',
        'Management\BriefcaseController@getByContract'
    );

    //Aseguradoras
    Route::apiResource('insurance_carrier', 'Management\InsuranceCarrierController');

    //Registro de contrato
    Route::apiResource('contract_log', 'Management\ContractLogController');

    //Estado del Contrato
    Route::apiResource('contract_status', 'Management\ContractStatusController');


    //Estado Civil del usuario
    Route::apiResource('marital_status', 'Management\MaritalStatusController');

    //CourseThemes
    Route::apiResource('courseThemes', 'Management\CourseThemesController');
    Route::get('themesByCourse', 'Management\CourseThemesController@indexThemesByCourse');

    //CourseCompetition
    Route::apiResource('coursecompetition', 'Management\CourseCompetitionController');
    Route::get('competitionByCourse', 'Management\CourseCompetitionController@indexCompetitionByCourse');

    Route::apiResource('ethnicity', 'Management\EthnicityController');

    //CategoryApproval
    Route::apiResource('categoryApproval', 'Management\CategoryApprovalController');
    Route::post('categoryApproval/{id}', 'Management\CategoryApprovalController@update');
    Route::get(
        'categoryApproval/ApprovalByCategory/{categoryId}',
        'Management\CategoryApprovalController@getByCategory'
    );

    //CourseApproval
    Route::apiResource('courseApproval', 'Management\CourseApprovalController');
    Route::post('courseApproval/{id}', 'Management\CourseApprovalController@update');
    Route::get(
        'courseApproval/ApprovalByCourse/{courseId}',
        'Management\CourseApprovalController@getByCourse'
    );

    //UserRole
    Route::apiResource('storeStudent', 'Management\UserRoleController');
    Route::post('storeStudent', 'Management\UserRoleController@storeStudent');
    Route::post('storeCoordinator', 'Management\UserRoleController@storeCoordinator');
    Route::delete('destroyCoordinator/{id}', 'Management\UserRoleController@destroyCoordinator');
    Route::post('storeFormer', 'Management\UserRoleController@storeFormer');
    Route::delete('destroyFormer/{id}', 'Management\UserRoleController@destroyFormer');

    //AssistanceSession
    Route::apiResource('assistanceSession', 'Management\AssistanceSessionController');

    //Assistance
    Route::apiResource('assistance', 'Management\AssistanceController');

    //Assistance special
    Route::apiResource('assistance_special', 'Management\AssistanceSpecialController');

    //UserRoleGroup
    Route::apiResource('userRoleGroup', 'Management\UserRoleGroupController');
    Route::get('userRoleByGroup/{userRoleId}', 'Management\UserRoleGroupController@getByGroup');

    //Section
    Route::apiResource('section', 'Management\SectionController');


    //Survey
    Route::apiResource('survey', 'Management\SurveyController');
    Route::post('survey/{id}', 'Management\SurveyController@update');
    Route::get('surveyTypes', 'Management\SurveyController@types');
    Route::get('surveySummary', 'Management\SurveyController@exportSummary');
    Route::get('pieSummary', 'Management\SurveyController@pieSummary');

    //SurveySections
    Route::apiResource('surveySections', 'Management\SurveySectionsController');
    Route::put('surveySections/{id}/move/{direction}', 'Management\SurveySectionsController@move');

    //SurveyInstance
    // Route::apiResource('surveyInstance', 'Management\SurveyInstanceController');

    //AnswerType
    Route::apiResource('answerType', 'Management\AnswerTypeController');

    //Glosas
    Route::apiResource('objetion_type', 'Management\ObjetionTypeController');
    Route::apiResource('repeated_initial', 'Management\RepeatedInitialController');
    Route::apiResource('received_by', 'Management\ReceivedByController');
    Route::apiResource('gloss_modality', 'Management\GlossModalityController');
    Route::apiResource('gloss_ambit', 'Management\GlossAmbitController');
    Route::apiResource('gloss_service', 'Management\GlossServiceController');
    Route::apiResource('objetion_code', 'Management\ObjetionCodeController');
    Route::apiResource('gloss', 'Management\GlossController');
    Route::post('changeStatus', 'Management\GlossController@ChangeStatusBriefcase');
    Route::get('gloss/byStatus/{status}/{user_id}', 'Management\GlossController@getByStatus');
    Route::apiResource('gloss_status', 'Management\GlossStatusController');
    Route::apiResource('objetion_response', 'Management\ObjetionResponseController');
    Route::apiResource('objetion_code_response', 'Management\ObjetionCodeResponseController');
    Route::apiResource('gloss_response', 'Management\GlossResponseController');
    Route::apiResource('gloss_conciliations', 'Management\GlossConciliationsController');
    Route::apiResource('gloss_radication', 'Management\GlossRadicationController');
    Route::post('fileUpload', 'Management\GlossController@import');

    //Dietas
    Route::apiResource('diet_component', 'Management\DietComponentController');
    Route::apiResource('diet_consistency', 'Management\DietConsistencyController');
    Route::apiResource('diet_day', 'Management\DietDayController');
    Route::apiResource('diet_dish', 'Management\DietDishController');
    Route::apiResource('diet_dish_stock', 'Management\DietDishStockController');
    Route::apiResource('diet_menu', 'Management\DietMenuController');
    Route::apiResource('diet_menu_dish', 'Management\DietMenuDishController');
    Route::get('diet_menu_dish/byMenu/{menu_id}', 'Management\DietMenuDishController@getByMenuId');
    Route::apiResource('diet_menu_type', 'Management\DietMenuTypeController');
    Route::apiResource('diet_stock', 'Management\DietStockController');
    Route::apiResource('diet_supplies', 'Management\DietSuppliesController');
    Route::apiResource('diet_supply_type', 'Management\DietSupplyTypeController');
    Route::apiResource('diet_supplies_output', 'Management\DietSuppliesOutputController');
    Route::apiResource('diet_week', 'Management\DietWeekController');
    Route::apiResource('diet_supplies_output_menu', 'Management\DietSuppliesOutputMenuController');
    Route::apiResource('diet_order', 'Management\DietOrderController');
    Route::apiResource('diet_supplies_input', 'Management\DietSuppliesInputController');
    Route::apiResource('diet_admission', 'Management\DietAdmissionController');
    Route::apiResource('diet_admission_component', 'Management\DietAdmissionComponentController');

    //historia clinica    
    Route::apiResource('ch_diagnosis', 'Management\ChDiagnosisController');
    Route::get('ch_diagnosis/by_record/{id}/{type_record_id}', 'Management\ChDiagnosisController@getByRecord');
    Route::apiResource('ch_diagnosis_class', 'Management\ChDiagnosisClassController');
    Route::apiResource('ch_diagnosis_type', 'Management\ChDiagnosisTypeController');
    Route::apiResource('ch_external_cause', 'Management\ChExternalCauseController');
    
    Route::apiResource('ch_physical_exam', 'Management\ChPhysicalExamController');
    Route::apiResource('ch_system_exam', 'Management\ChSystemExamController');
    Route::apiResource('ch_background', 'Management\ChBackgroundController');

    Route::get('ch_physical_exam/by_record/{id}/{type_record_id}', 'Management\ChPhysicalExamController@getByRecord');
    Route::get('ch_system_exam/by_record/{id}/{type_record_id}', 'Management\ChSystemExamController@getByRecord');
    Route::get('ch_background/by_record/{id}/{type_record_id}', 'Management\ChBackgroundController@getByRecord');

    Route::apiResource('ch_reason_consultation', 'Management\ChReasonConsultationController');
    Route::apiResource('ch_record', 'Management\ChRecordController');
    Route::apiResource('ch_review_system', 'Management\ChReviewSystemController');

    Route::apiResource('type_ch_physical_exam', 'Management\ChTypePhysicalExamController');
    Route::apiResource('type_ch_system_exam', 'Management\ChTypeSystemExamController');
    Route::apiResource('ch_type_background', 'Management\ChTypeBackgroundController');

    Route::apiResource('type_review_system', 'Management\ChTypeReviewSystemController');
    Route::apiResource('type_record', 'Management\ChTypeRecordController');
    Route::apiResource('ch_vital_hydration', 'Management\ChVitalHydrationController');
    Route::apiResource('ch_vital_neurological', 'Management\ChVitalNeurologicalController');
    Route::apiResource('ch_vital_signs', 'Management\ChVitalSignsController');
    Route::apiResource('ch_vital_temperature', 'Management\ChVitalTemperatureController');
    Route::apiResource('ch_vital_ventilated', 'Management\ChVitalVentilatedController');
    Route::get('ch_record/byadmission/{id}/{id2}', 'Management\ChRecordController@byadmission');
    Route::get('ch_vital_signs/byrecord/{id}', 'Management\ChVitalSignsController@byrecord');

    

    //Answer
    Route::apiResource('answer', 'Management\AnswerController');
    Route::put('answer/{id}/move/{direction}', 'Management\AnswerController@move');

    //Question
    Route::apiResource('question', 'Management\QuestionController');
    Route::get('question/justAnswers/{id}', 'Management\QuestionController@justAnswers');
    Route::put('question/{id}/move/{direction}', 'Management\QuestionController@move');
    //QuestionType
    Route::apiResource('questionType', 'Management\QuestionTypeController');

    //UserAssignSurvey
    Route::get('user_assig_survey', 'Management\UserAssignSurveyController@index');

    //SurveyDetail
    Route::post('survey_detail/{id}', 'Management\SurveyDetailController@update');
    Route::post('survey_detail_answer', 'Management\SurveyDetailController@get_questions_answer');

    //UserCertificate
    Route::apiResource('user_certificate', 'Management\UserCertificateController');

    //Concepts
    Route::apiResource('concept', 'Management\ConceptController');
    Route::get('getConceptAuxiliaryData', 'Management\ConceptController@getAuxiliaryData');
    Route::get('conceptAutocomplete', 'Management\ConceptController@autocomplete');
    Route::get('copyValidity', 'Management\ConceptController@copyValidity');
    Route::post('storeNewValidityConcepts', 'Management\ConceptController@storeNewValidityConcepts');

    //ConceptsBase
    Route::apiResource('conceptBase', 'Management\ConceptBaseController');
    Route::get('getConceptBaseAuxiliaryData', 'Management\ConceptBaseController@getAuxiliaryData');

    //Contracts
    Route::apiResource('contract', 'Management\ContractController');
    Route::get('getContractAuxiliaryData', 'Management\ContractController@getAuxiliaryData');
    Route::patch('contract/{id}/updateEvents', 'Management\ContractController@updateEvents');
    Route::get('contract/{id}/events', 'Management\ContractController@getEvents');

    //ContractPayments
    Route::apiResource('contractPayment', 'Management\ContractPaymentController');

    //Events
    Route::apiResource('event', 'Management\EventController');
    Route::put('closeEvent/{id}', 'Management\EventController@closeEvent');
    Route::get('getEventAuxiliaryData', 'Management\EventController@getAuxiliaryData');
    Route::get('executeEvents', 'Management\EventController@indexExecute');
    Route::get('reportLogisticSummary', 'Management\EventController@reportLogisticSummary');
    Route::get('reportTransportSummary', 'Management\EventController@reportTransportSummary');


    //Events Tickets
    Route::apiResource('eventTicket', 'Management\EventTicketController');
    Route::put('buyTickets', 'Management\EventTicketController@updateBuyArray');
    Route::post('requireTickets', 'Management\EventTicketController@storeRequireArray');
    Route::post('chargeDataTickets', 'Management\EventTicketController@chargeDataTickets');
    Route::get('exportExcelReportTickets', 'Management\EventTicketController@exportExcelReportTickets');

    //History Event Status
    Route::apiResource('historyEventStatus', 'Management\HistoryEventApprovedController');
    Route::get('getHistoryEventAuxiliaryData', 'Management\HistoryEventApprovedController@getAuxiliaryData');

    //EventDays
    Route::apiResource('eventDay', 'Management\EventDayController');

    //EventConcepts
    Route::apiResource('eventConcept', 'Management\EventConceptController');
    Route::post('eventConcept/{id}', 'Management\EventConceptController@update');
    Route::post('projectEventConcept', 'Management\EventConceptController@storeProjectEventConcept');
    Route::put('projectEventConcept/{id}', 'Management\EventConceptController@updateProjectEventConcept');
    Route::post('specialEventConcept', 'Management\EventConceptController@storeSpecialEventConcept');
    Route::put('specialEventConcept/{id}', 'Management\EventConceptController@updateSpecialEventConcept');
    Route::put('executeSpecialEventConceptArray', 'Management\EventConceptController@updateExecuteSpecialArray');
    Route::post('executeEventConceptArray', 'Management\EventConceptController@updateExecuteArray');
    Route::post('storeTicketExtra', 'Management\EventConceptController@storeTicketExtra');
    Route::put('updateTicketExtra', 'Management\EventConceptController@updateTicketExtra');

    //Categories Origin
    Route::get('getCategoriesByOrigin', 'Management\CategoriesOriginController@indexArray');
    Route::post('setCategoriesOriginArray', 'Management\CategoriesOriginController@updateArray');
    Route::get('presupuestoAuxiliaryData', 'Management\CategoriesOriginController@getAuxiliaryData');
    Route::get('reportAllocatedBudget', 'Management\CategoriesOriginController@reportAllocatedBudget');
    Route::get('reportConsolidatedLogistics', 'Management\CategoriesOriginController@reportConsolidatedLogistics');
    Route::get('reportConsolidatedTransport', 'Management\CategoriesOriginController@reportConsolidatedTransport');

    //UserRole
    Route::get('userRole/{userId}/{roleId}', 'Management\UserRoleController@getByUserRole');
    Route::get('userRoleCoordinator/{userId}/{roleId}', 'Management\UserRoleController@getByUserRoleCoordinator');
    Route::get('userRoleFormer/{userId}/{roleId}', 'Management\UserRoleController@getByUserRoleFormer');


    Route::get('get_students_by_course/{id}', 'Management\UserCertificateController@get_students');
    Route::post('certificate_students', 'Management\UserCertificateController@certificate_students');

    //AnswersQuestion
    Route::apiResource('answersQuestion', 'Management\AnswersQuestionController');
    Route::put('answersQuestion/{id}/move/{direction}', 'Management\AnswersQuestionController@move');

    //Auxiliares Old SGA
    Route::get('oldsga-reports/filtersRunCourses', 'OldSGA\AuxiliaryDataController@RunCourses');
    Route::get('oldsga-reports/filterCourses', 'OldSGA\AuxiliaryDataController@Courses');
    Route::get('oldsga-reports/filterGroups', 'OldSGA\AuxiliaryDataController@Groups');
    Route::get('oldsga-reports/filtersMulticriterio', 'OldSGA\AuxiliaryDataController@Multicriterio');
    Route::get('oldsga-reports/filtersRegistroHoras', 'OldSGA\AuxiliaryDataController@FiltersRegistroHoras');
    Route::get('oldsga-reports/cursosRegistroHoras', 'OldSGA\AuxiliaryDataController@CursosRegistroHoras');
    Route::get('oldsga-reports/resumenRegistroAcademico', 'OldSGA\AuxiliaryDataController@resumenRegistroAcademico');
    Route::get('oldsga-reports/filtersEncuestaIndividual', 'OldSGA\AuxiliaryDataController@filtersEncuestaIndividual');
    Route::get('oldsga-reports/filtersMulticriterioGeneral', 'OldSGA\AuxiliaryDataController@MulticriterioGeneral');

    //Reportes Old SGA
    Route::get('oldsga-reports/exportExcelRunCourses', 'OldSGA\ReportsController@exportExcelRunCourses');
    Route::get('oldsga-reports/exportExcelCourses', 'OldSGA\ReportsController@exportExcelCourses');
    Route::get('oldsga-reports/exportExcelStatsDiscentesCourse', 'OldSGA\ReportsController@exportExcelStatsDiscentesCourse');
    Route::get('oldsga-reports/exportExcelMulticriterioInscritos', 'OldSGA\ReportsController@exportExcelMulticriterioInscritos');
    Route::get('oldsga-reports/exportPdfRegistroHoras', 'OldSGA\ReportsController@exportPdfRegistroHoras');
    Route::get('oldsga-reports/exportPdfRegistroAcademico', 'OldSGA\ReportsController@exportPdfRegistroAcademico');
    Route::get('oldsga-reports/exportExcelEncuestaIndividual', 'OldSGA\ReportsController@exportExcelEncuestaIndividual');
    Route::get('oldsga-reports/exportExcelEncuestasActividad', 'OldSGA\ReportsController@exportExcelEncuestasActividad');
    Route::get('oldsga-reports/participantesMulticriterio', 'OldSGA\ReportsController@jxParticipants');
    Route::get('oldsga-reports/exportExcelMulticriterioParticipantes', 'OldSGA\ReportsController@exportExcelMulticriterioParticipantes');

    ////AnswerType
    Route::apiResource('PacMonitoring', 'Management\PacMonitoringController');
});
