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

    //scales
    Route::apiResource('chScaleNorton', 'Management\ChScaleNortonController');
    Route::apiResource('chScaleGlasgow', 'Management\ChScaleGlasgowController');
    Route::apiResource('chScaleBarthel', 'Management\ChScaleBarthelController');
    Route::apiResource('chScalePayette', 'Management\ChScalePayetteController');
    Route::apiResource('ch_scale_fragility', 'Management\ChScaleFragilityController');
    Route::apiResource('ch_scale_news', 'Management\ChScaleNewsController');
    Route::apiResource('ch_scale_pap', 'Management\ChScalePapController');
    Route::apiResource('ch_scale_hamilton', 'Management\ChScaleHamiltonController');
    Route::apiResource('ch_scale_cam', 'Management\ChScaleCamController');
    Route::apiResource('ch_scale_fac', 'Management\ChScaleFacController');
    Route::apiResource('ch_scale_red_cross', 'Management\ChScaleRedCrossController');
    Route::apiResource('ch_scale_karnofsky', 'Management\ChScaleKarnofskyController');
    Route::apiResource('ch_scale_ecog', 'Management\ChScaleEcogController');
    Route::apiResource('ch_scale_pediatric_nutrition', 'Management\ChScalePediatricNutritionController');
    Route::apiResource('ch_scale_esas', 'Management\ChScaleEsasController');
    Route::apiResource('ch_scale_flacc', 'Management\ChScaleFlaccController');
    Route::apiResource('ch_scale_ppi', 'Management\ChScalePpiController');
    Route::apiResource('ch_scale_zarit', 'Management\ChScaleZaritController');
    Route::apiResource('ch_scale_pain', 'Management\ChScalePainController');
    Route::apiResource('ch_scale_wong_baker', 'Management\ChScaleWongBakerController');
    Route::apiResource('ch_scale_pfeiffer', 'Management\ChScalePfeifferController');
    Route::apiResource('ch_scale_jh_downton', 'Management\ChScaleJhDowntonController');
    Route::apiResource('ch_scale_screening', 'Management\ChScaleScreeningController');

    Route::apiResource('ch_scale_pps', 'Management\ChScalePpsController');
    Route::apiResource('ch_scale_braden', 'Management\ChScaleBradenController');
    Route::apiResource('ch_scale_lawton', 'Management\ChScaleLawtonController');
                        
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

    //Locality-neighborhood
    Route::apiResource('locality', 'Management\LocalityController');
    Route::apiResource('neighborhood_or_residence', 'Management\NeighborhoodOrResidenceController');
    Route::apiResource('pad_risk', 'Management\PadRiskController');
    Route::apiResource('tariff', 'Management\TariffController');

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

    // patients
    Route::apiResource('patient', 'Management\PatientController');
    Route::get('all_patients', 'Management\PatientController@indexByRole');
    Route::post('PacientInscription', 'Management\PatientController@store');
    Route::post('PacientInscription/{id}', 'Management\PatientController@update');
    Route::get('patient/{id}', 'Management\PatientController@show');
    Route::get('patient/byPAD/{roleId}/{userId}', 'Management\PatientController@indexPacientByPAD');
    Route::get('patient/byPAC/{roleId}', 'Management\PatientController@indexPacientByPAC');
    Route::get('user/byAdmission/{roleId}', 'Management\PatientController@indexPacientByAdmission');





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
    Route::get(
        'company_mail/MailByCompany/{companyId}',
        'Management\CompanyMailController@getByCompany'
    );

    //Asociacion de las empresas con los documentos solicitantes
    Route::apiResource('company_document', 'Management\CompanyDocumentController');

    //Documentos por compañia
    Route::get(
        'company_document/DocumentByCompany/{companyId}',
        'Management\CompanyDocumentController@getByCompany'
    );


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
    Route::get(
        'company_taxes/TaxesByCompany/{companyId}',
        'Management\CompanyTaxesController@getByCompany'
    );

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
    Route::get(
        'PatientData/PatientDatabyAdmission/{admissionId}',
        'Management\PatientDataController@getByAdmissions'
    );

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
    Route::get('contractByCompany/{id}', 'Management\ContractController@byCompany');

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

    Route::get(
        'admissions/active/{id}',
        'Management\AdmissionsController@getActive'
    );

    Route::get(
        'admissions/Briefcase/{briefcase_id}',
        'Management\AdmissionsController@getByBriefcase'
    );

    Route::apiResource('auth_package', 'Management\AuthorizationPackageController');

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
    Route::apiResource('assigned_management_plan', 'Management\AssignedManagementPlanController');


    Route::get('viewHC/{id}', 'Management\ChRecordController@ViewHC');

    Route::get('assigned_management_plan/{managementId}/{userId}', 'Management\AssignedManagementPlanController@indexPacientByManagement');
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

    //Portafolio de servicios
    Route::apiResource('human_talent_request', 'Management\HumanTalentRequestController');
    //Portafolio de servicios por contrato
    Route::get(
        'ServiceBriefcase/PackageByBriefcase/{briefcaseId}',
        'Management\ServicesBriefcaseController@getPackageByBriefcase'
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
    Route::get(
        'base_location_capacity/AssistanceByLocation/{assistanceId}',
        'Management\BaseLocationCapacityController@getByLocality'
    );
    Route::apiResource('location_capacity', 'Management\LocationCapacityController');
    Route::apiResource('base_location_capacity', 'Management\BaseLocationCapacityController');
    Route::apiResource('role_attention', 'Management\RoleAttentionController');

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
    Route::apiResource('conciliation_response', 'Management\ConciliationResponseController');
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

    Route::apiResource('packing', 'Management\PackingController');
    Route::apiResource('product_dose', 'Management\ProductDoseController');

    Route::apiResource('type_billing_evidence', 'Management\TypeBillingEvidenceController');
    Route::apiResource('billing', 'Management\BillingController');
    Route::apiResource('billing_stock', 'Management\BillingStockController');
    Route::apiResource('permission_pharmacy_stock', 'Management\PermissionPharmacyStockController');
    Route::apiResource('type_pharmacy_stock', 'Management\TypePharmacyStockController');
    Route::apiResource('pharmacy_stock', 'Management\PharmacyStockController');
    Route::apiResource('pharmacy_lot', 'Management\PharmacyLotController');
    Route::apiResource('pharmacy_lot_stock', 'Management\PharmacyLotStockController');
    Route::post('pharmacy_lot_stock/updateInventoryByLot/{lot_id}', 'Management\PharmacyLotStockController@updateInventoryByLot');
    Route::get('pharmacy_lot_stock/pharmacies/{user_id}', 'Management\PharmacyLotStockController@getPharmacyByUserId');
    Route::get('pharmacy_lot_stock/pharmacies/{user_id}', 'Management\PharmacyLotStockController@getPharmacyBillingId');
    Route::apiResource('pharmacy_product_request', 'Management\PharmacyProductRequestController');
    Route::apiResource('pharmacy_request_shipping', 'Management\PharmacyRequestShippingController');
    Route::apiResource('pharmacy_update_max_min', 'Management\PharmacyUpdateMaxMinController');

    Route::apiResource('pharmacy_product_request', 'Management\PharmacyProductRequestController');
    Route::post('pharmacy_product_request/updateInventoryByLot/{lot_id}', 'Management\PharmacyProductRequestController@updateInventoryByLot');
    Route::get('pharmacy_product_request/pharmacies/{user_id}', 'Management\PharmacyProductRequestController@getPharmacyByUserId');
    
    Route::apiResource('nom_product', 'Management\NomProductController');
    Route::get('NomProduct/byCategory/{product_subcategory_id}',
        'Management\NomProductController@getSubcategoryByCategory'
    );


    //Activos fijos
    Route::apiResource('fixed_accessories', 'Management\FixedAccessoriesController');
    Route::apiResource('fixed_area_campus', 'Management\FixedAreaCampusController');
    Route::apiResource('fixed_assets', 'Management\FixedAssetsController');
    Route::apiResource('fixed_clasification', 'Management\FixedClasificationController');
    Route::apiResource('fixed_code', 'Management\FixedCodeController');
    Route::apiResource('fixed_condition', 'Management\FixedConditionController');
    Route::apiResource('fixed_loan', 'Management\FixedLoanController');
    Route::apiResource('fixed_location_campus', 'Management\FixedLocationCampusController');
    Route::apiResource('fixed_permission_type', 'Management\FixedPermissionTypeController');
    Route::apiResource('fixed_property', 'Management\FixedPropertyController');
    Route::apiResource('fixed_stock_accessories', 'Management\FixedStockAccessoriesController');
    Route::apiResource('fixed_type', 'Management\FixedTypeController');
    Route::apiResource('fixed_type_role', 'Management\FixedTypeRoleController');




    Route::post('pharmacy_lot_stock/updateInventoryByLot/{lot_id}', 'Management\PharmacyLotStockController@updateInventoryByLot');
    Route::get('pharmacy_lot_stock/pharmacies/{user_id}', 'Management\PharmacyLotStockController@getPharmacyByUserId');

    Route::apiResource('ch_type_gynecologists', 'Management\ChTypeGynecologistsController');
    Route::apiResource('ch_planning_gynecologists', 'Management\ChPlanningGynecologistsController');
    Route::apiResource('ch_flow_gynecologists', 'Management\ChFlowGynecologistsController');
    Route::apiResource('ch_exam_gynecologists', 'Management\ChExamGynecologistsController');

    Route::apiResource('ch_rst_cytology_gyneco', 'Management\ChRstCytologyGynecoController');
    Route::apiResource('ch_rst_biopsy_gyneco', 'Management\ChRstBiopsyGynecoController');
    Route::apiResource('ch_rst_mammography_gyneco', 'Management\ChRstMammographyGynecoController');
    Route::apiResource('ch_rst_colposcipia_gyneco', 'Management\ChRstColposcipiaGynecoController');
    Route::apiResource('ch_failure_method_gyneco', 'Management\ChFailureMethodGynecoController');
    Route::apiResource('ch_method_planning_gyneco', 'Management\ChMethodPlanningGynecoController');

    //Evolución 
    Route::apiResource('ch_evo_soap', 'Management\ChEvoSoapController');
    Route::get('ch_evo_soap/by_record/{id}/{type_record_id}', 'Management\ChEvoSoapController@getByRecord');
    Route::get('ch_vital_signs/by_record/{id}/{type_record_id}', 'Management\ChVitalSignsController@byrecord');
    Route::get('ch_diagnosis/by_record/{id}/{type_record_id}', 'Management\ChDiagnosisController@getByRecord');

    Route::apiResource('ch_diets_evo', 'Management\ChDietsEvoController');
    Route::get('ch_diets_evo/by_record/{id}/{type_record_id}', 'Management\ChDietsEvoController@getByRecord');

    Route::apiResource('ch_recommendations_evo', 'Management\ChRecommendationsEvoController');
    Route::apiResource('recommendations_evo', 'Management\RecommendationsEvoController');
    Route::get('ch_recommendations_evo/by_record/{id}/{type_record_id}', 'Management\ChRecommendationsEvoController@getByRecord');

    Route::apiResource('ch_formulation', 'Management\ChFormulationController');
    Route::apiResource('hourly_frequency', 'Management\HourlyFrequencyController');
    Route::get('ch_formulation/by_record/{id}/{type_record_id}', 'Management\ChFormulationController@getByRecord');

    //Scales
    Route::apiResource('ch_scales', 'Management\ChScalesController');


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
    Route::apiResource('role_type', 'Management\RoleTypeController');


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

    //Programa de atención complementaria.
    Route::apiResource('PacMonitoring', 'Management\PacMonitoringController');

    // Nomina OPS (TERCEROS ASISTENCIALES)

    Route::apiResource('account_receivable', 'Management\AccountReceivableController');
    Route::get('account_receivable/byUser/{id}', 'Management\AccountReceivableController@getByUser');
    Route::post('account_receivable_file/{id}', 'Management\AccountReceivableController@saveFile');
    Route::get('account_receivable/generate_file/{id}', 'Management\AccountReceivableController@generatePdf');
    Route::apiResource('bill_user_activity', 'Management\BillUserActivityController');
    Route::get('bill_user_activity/byAccountReceivable/{Id}', 'Management\BillUserActivityController@getByAccountReceivable');


    Route::apiResource('user_activity', 'Management\UserActivityController');
    Route::apiResource('status_bill', 'Management\StatusBillController');
    Route::apiResource('financial_data', 'Management\FinancialDataController');
    Route::apiResource('retentions', 'Management\RetentionsController');
    Route::apiResource('account_type', 'Management\AccountTypeController');
    Route::apiResource('bank', 'Management\BankController');
    Route::post('fileUpload_account_receivable', 'Management\AccountReceivableController@import');
    //Autorizaciones
    Route::apiResource('authorization', 'Management\AuthorizationController');
    Route::get('authorization/byStatus/{statusId}', 'Management\AuthorizationController@InProcess');
    Route::get('authorization/Historic/{statusId}', 'Management\AuthorizationController@InHistoric');
    Route::get('authorization/auth_byAdmission/{admissionsId}', 'Management\AuthorizationController@GetByAdmissions');
    //Estado de autorizaciones.
    Route::apiResource('auth_status', 'Management\AuthStatusController');
    //Registro de autorizaciones.
    Route::apiResource('auth_log', 'Management\AuthLogController');

    //Retenciones
    Route::apiResource('source_retention', 'Management\SourceRetentionController');
    Route::get('source_retention/get_by_account_receivable_id/{account_receivable_id}', 'Management\SourceRetentionController@getByAccountReceivableId');
    Route::apiResource('source_retention_type', 'Management\SourceRetentionTypeController');
    Route::apiResource('tax_value_unit', 'Management\TaxValueUnitController');
    Route::apiResource('municipality_ica', 'Management\MunicipalityIcaController');
    Route::get('tax_value_unit/get_latest_tax_value_unit/{prueba_id}', 'Management\TaxValueUnitController@getLatestTaxValueUnit');
    Route::apiResource('minimum_salary', 'Management\MinimumSalaryController');

    //Tablero Doc Mariana.
    Route::apiResource('billing_tc', 'Management\BillingTcController');
    Route::apiResource('radication_tc', 'Management\RadicationTcController');
    Route::apiResource('human_talent_tc', 'Management\HumanTalentTcController');
    Route::post('billing_tc/file', 'Management\BillingTcController@import');
    Route::post('radication_tc/file', 'Management\RadicationTcController@import');
    Route::post('human_talent_tc/file', 'Management\HumanTalentTcController@import');

    //Campos nuevos de Signos Vitales
    Route::apiResource('oxygen_type', 'Management\OxygenTypeController');
    Route::apiResource('liters_per_minute', 'Management\LitersPerMinuteController');
    Route::apiResource('parameters_signs', 'Management\ParametersSignsController');

    // Campo de evolución Fallida
    Route::apiResource('ch_failed', 'Management\ChFailedController');
    Route::apiResource('ch_reason', 'Management\ChReasonController');
    Route::get('ch_failed/by_record/{id}/{type_record_id}', 'Management\ChFailedController@getByRecord');

    //Campo nuevo de dietas
    Route::apiResource('enterally_diet', 'Management\EnterallyDietController');
    //prefactura PAD
    Route::apiResource('billing_pad', 'Management\BillingPadController');
    Route::get('billing_pad/getEnabledAdmissions/{id}', 'Management\BillingPadController@getEnabledAdmissions');
    Route::get('billing_pad/getAuthorizedProcedures/{id}', 'Management\BillingPadController@getAuthorizedProcedures');
    Route::get('billing_pad/getProceduresByAuthPackage/{id}', 'Management\BillingPadController@getProceduresByAuthPackage');
    Route::get('billing_pad/getPgpContracts/{id}', 'Management\BillingPadController@getPgpContracts');
    Route::get('billing_pad/getPgpBillings/{id}', 'Management\BillingPadController@getPgpBillings');
    Route::put('billing_pad/generatePgpBilling/{id}', 'Management\BillingPadController@generatePgpBilling');

    //Tabla de salida de paciente.
    Route::apiResource('ch_patient_exit', 'Management\ChPatientExitController');
    Route::apiResource('reason_exit', 'Management\ReasonExitController');
    Route::get('ch_patient_exit/by_record/{id}/{type_record_id}', 'Management\ChPatientExitController@getByRecord');

    //Tablas de Ordenes medicas
    Route::apiResource('ch_medical_orders', 'Management\ChMedicalOrdersController');
    Route::get('ch_medical_orders/by_record/{id}/{type_record_id}', 'Management\ChMedicalOrdersController@getByRecord');
    Route::apiResource('ch_interconsultation', 'Management\ChInterconsultationController');
    Route::get('ch_interconsultation/by_record/{id}/{type_record_id}', 'Management\ChInterconsultationController@getByRecord');

    //Ostomias 
    Route::apiResource('ostomy', 'Management\OstomyController');

    //posiciones del paciente 
    Route::apiResource('patient_position', 'Management\PatientPositionController');

    //Planes de cuidado del paciente 
    Route::apiResource('nursing_care_plan', 'Management\NursingCarePlanController');

    //Rutas de fluidos
    Route::apiResource('ch_route_fluid', 'Management\ChRouteFluidController');

    //Tipos de fluidos
    Route::apiResource('ch_type_fluid', 'Management\ChTypeFluidController');

    //Estados de la piel
    Route::apiResource('skin_status', 'Management\SkinStatusController');

    //Regiones del cuerpo
    Route::apiResource('body_region', 'Management\BodyRegionController');

    //Rutas de procedimientos de enfermeria
    Route::apiResource('nursing_procedure', 'Management\NursingProcedureController');

    //Historia clinica de enfermeria
    //ruta entrada clinica
    Route::apiResource('ch_nursing_entry', 'Management\ChNursingEntryController');
    //ruta nota de enfermeria
    Route::apiResource('ch_notes_description', 'Management\ChNotesDescriptionController');
    Route::get('ch_notes_description/by_record/{record_id}', 'Management\ChNotesDescriptionController@getByRecord');
    //ruta plan de cuidado
    Route::apiResource('ch_care_plan', 'Management\ChCarePlanController');
    Route::get('ch_care_plan/by_record/{record_id}', 'Management\ChCarePlanController@getByRecord');
    //ruta de liquidos de control
    Route::apiResource('ch_liquid_control', 'Management\ChLiquidControlController');
    Route::get('ch_liquid_control/by_record/{record_id}', 'Management\ChLiquidControlController@getByRecord');
    //ruta de valoracion de piel
    Route::apiResource('ch_skin_valoration', 'Management\ChSkinValorationController');
    Route::get('ch_skin_valoration/by_record/{record_id}', 'Management\ChSkinValorationController@getByRecord');
    //ruta de valoracion de piel
    Route::apiResource('ch_nursing_procedure', 'Management\ChNursingProcedureController');
    Route::get('ch_nursing_procedure/by_record/{record_id}', 'Management\ChNursingProcedureController@getByRecord');
    
    //ch nutrición
    Route::apiResource('ch_nutrition_anthropometry', 'Management\ChNutritionAnthropometryController');
    Route::apiResource('ch_nutrition_food_history', 'Management\ChNutritionFoodHistoryController');
    Route::apiResource('ch_nutrition_gastrointestinal', 'Management\ChNutritionGastrointestinalController');
    Route::apiResource('ch_nutrition_parenteral', 'Management\ChNutritionParenteralController');
    Route::apiResource('ch_nutrition_interpretation', 'Management\ChNutritionInterpretationController');
    Route::apiResource('ch_nutrition_diet_type', 'Management\ChNutritionDietTypeController');

});
