<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
                $this->call(RetinerSeeder::class);
                $this->call(PaymentTermsSeeder::class);
                $this->call(CompanyKindpersonSeeder::class);
                $this->call(CompanyTypeSeeder::class);
                $this->call(PriceTypeSeeder::class);
                $this->call(RipsTypefileSeeder::class);
                $this->call(CompanyCategorySeeder::class);
                $this->call(RipsTypeSeeder::class);
                $this->call(ProcedureCategorySeeder::class);
                $this->call(ProcedureAgeSeeder::class);
                $this->call(ProcedurePurposeSeeder::class);
                $this->call(PbsTypeSeeder::class);
                $this->call(ProcedureTypeSeeder::class);
                $this->call(PurposeServiceSeeder::class);
                $this->call(IvaSeeder::class);
                $this->call(CountrySeeder::class);
                $this->call(StatusSeeder::class);
                $this->call(IdentificationTypeSeeder::class);
                $this->call(GenderSeeder::class);
                $this->call(RegionSeeder::class);
                $this->call(MunicipalitySeeder::class);
                $this->call(AcademicLevelSeeder::class);
                $this->call(ActivitiesSeeder::class);
                $this->call(LocalitySeeder::class);
                $this->call(PadRiskSeeder::class);
                $this->call(NeighborhoodOrResidenceSeeder::class);
                $this->call(SelectRhSeeder::class);
                $this->call(StudyLevelStatusSeeder::class);
                $this->call(MaritalStatusSeeder::class);
                $this->call(InabilitySeeder::class);
                $this->call(PopulationGroupSeeder::class);
                $this->call(AffiliateTypeSeeder::class);
                $this->call(StatusBedSeeder::class);
                $this->call(AdmissionRouteSeeder::class);
                $this->call(ScopeOfAttentionSeeder::class);
                $this->call(ProgramSeeder::class);
                $this->call(CompanySeeder::class);
                $this->call(ReceivedBySeeder::class);
                $this->call(AdministrationRouteSeeder::class);
                $this->call(TypeContractSeeder::class);
                $this->call(ContractTypeSeeder::class);
                
                $this->call(EthnicitySeeder::class);
                $this->call(DiagnosisSeeder::class);

                // $this->call(EducationalInstitutionSeeder::class);
                $this->call(RoleTypeSeeder::class);
                $this->call(RoleSeeder::class);
                $this->call(UserSeeder::class);
                $this->call(UserRole2Seeder::class);
                $this->call(BillingPadPrefixSeeder::class);
                //$this->call(UserOriginSeeder::class);
                $this->call(CampusSeeder::class);
                $this->call(UserCampusSeeder::class);
                //$this->call(CourseEducationalInstitutionSeeder::class);
                //$this->call(CourseInstitutionCohortSeeder::class);
                //$this->call(UserRoleCourseSeeder::class);
                //$this->call(SessionSeeder::class);
                //$this->call(ActivityTypeSeeder::class);
                //$this->call(ActivitySeeder::class);
                //$this->call(GoalSeeder::class);
                //$this->call(CompetitionSeeder::class);
                //$this->call(CompetitionCourseSeeder::class);
                //$this->call(UserRoleEducationalInstitutionSeeder::class);
                $this->call(PermissionSeeder::class);
                $this->call(ItemSeeder::class);
                $this->call(ItemRolePermissionSeeder::class);
                $this->call(ObjetionCodeSeeder::class);
                $this->call(ObjetionResponseSeeder::class);
                $this->call(GlossStatusSeeder::class);
                $this->call(GlossModalitySeeder::class);
                $this->call(GlossAmbitSeeder::class);
                $this->call(GlossServiceSeeder::class);
                $this->call(ObjetionCodeResponseSeeder::class);
                $this->call(ObjetionTypeSeeder::class);
                $this->call(RepeatedInitialSeeder::class);
                $this->call(TypeOfAttentionSeeder::class);
                $this->call(FrequencySeeder::class);
                $this->call(RelationshipSeeder::class);
                $this->call(ResidenceSeeder::class);
                
                //dietas
                $this->call(DietComponentSeeder::class);
                $this->call(DietConsistencySeeder::class);
                $this->call(DietDaySeeder::class);
                $this->call(DietMenuTypeSeeder::class);
                $this->call(DietSupplyTypeSeeder::class);
                $this->call(DietWeekSeeder::class);
                $this->call(MeasurementUnitsSeeder::class);
                $this->call(DietSuppliesSeeder::class);
                $this->call(DietDishSeeder::class);
                $this->call(DietDishStockSeeder::class);
                $this->call(DietMenuSeeder::class);
                $this->call(DietMenuDishSeeder::class);
                
                $this->call(TypeProfessionalSeeder::class);
                $this->call(SpecialtySeeder::class);
                $this->call(TariffSeeder::class);
                $this->call(RoleAttentionSeeder::class);

                //Terceros Asistenciales
                $this->call(BankSeeder::class);
                $this->call(AccountTypeSeeder::class);
                $this->call(StatusBillSeeder::class);

                $this->call(ChDiagnosisClassSeeder::class);
                $this->call(ChDiagnosisTypeSeeder::class);
                $this->call(ChExternalCauseSeeder::class);
                $this->call(ChVitalHydrationSeeder::class);
                $this->call(ChVitalNeurologicalSeeder::class);
                $this->call(ChVitalTemperatureSeeder::class);
                $this->call(ChVitalVentilatedSeeder::class);
                $this->call(ChTypePhysicalExamSeeder::class);
                $this->call(ChTypeSystemExamSeeder::class);

                $this->call(ChTypeBackgroundSeeder::class);

                //valoracion terapia respiratoria 
                $this->call(ChAssChestSymmetrySeeder::class);
                $this->call(ChAssChestTypeSeeder::class);
                $this->call(ChAssCoughSeeder::class);
                $this->call(ChAssFrequencySeeder::class);
                $this->call(ChAssModeSeeder::class);
                $this->call(ChAssPatternSeeder::class);
                $this->call(ChSignsSeeder::class);
                $this->call(ChAssSwingSeeder::class);


                //autorizaciones
                $this->call(AuthStatusSeeder::class);
                
                $this->call(TypeBillingEvidenceSeeder::class);


                //Antecedentes Gyneco
                $this->call(ChExamGynecologistsSeeder::class);
                $this->call(ChFlowGynecologistsSeeder::class);
                $this->call(ChPlanningGynecologistsSeeder::class);
                $this->call(ChTypeGynecologistsSeeder::class);
                $this->call(ChRstCytologyGynecoSeeder::class);
                $this->call(ChRstBiopsyGynecoSeeder::class);
                $this->call(ChRstMammographyGynecoSeeder::class);
                $this->call(ChRstColposcipiaGynecoSeeder::class);
                $this->call(ChFailureMethodGynecoSeeder::class);
                $this->call(ChMethodPlanningGynecoSeeder::class);

                $this->call(TypePharmacyStockSeeder::class);
                $this->call(PackingSeeder::class);
                
                
                // retenciones en la fuente
                $this->call(TaxValueUnitSeeder::class);
                $this->call(MinimumSalarySeeder::class);
                $this->call(SourceRetentionTypeSeeder::class);
                $this->call(MunicipalityIcaSeeder::class);
                
                $this->call(ProductDoseSeeder::class);
                $this->call(SuppliesMeasureSeeder::class);

                // BillingPad
                $this->call(BillingPadStatusSeeder::class);

                // clinic history of nursing

                $this->call(NursingCarePlansSeeder::class);
                $this->call(PatientPositionSeeder::class);
                $this->call(OstomySeeder::class);
                $this->call(NursingTypePhysicalSeeder::class);
                $this->call(NursingProcedureSeeder::class);
                $this->call(BodyRegionSeeder::class);
                $this->call(SkinStatusSeeder::class);
                $this->call(ChRouteFluidSeeder::class);
                $this->call(ChTypeFluidSeeder::class);
                $this->call(ChTypeSeeder::class);
        
                $this->call(ProductGroupSeeder::class);
                $this->call(ProductConcentrationSeeder::class);
                $this->call(ProductPresentationSeeder::class);
                $this->call(ProductCategorySeeder::class);
                $this->call(ProductSubCategorySeeder::class);
                $this->call(NomProductSeeder::class);


                $this->call(FixedAreaCampusSeeder::class);
                $this->call(FixedCodeSeeder::class);
                $this->call(FixedPropertySeeder::class);
                $this->call(FixedConditionSeeder::class);       
                $this->call(StorageConditionsSeeder::class);
                $this->call(SuppliesMeasureSeeder::class);
                // BillingPad
                $this->call(InvimaStatusSeeder::class);
                $this->call(FixedTypeSeeder::class);
                $this->call(FixedStockSeeder::class);
                $this->call(BiomedicalClassificationSeeder::class);
                $this->call(RiskSeeder::class);
                $this->call(MultidoseConcentrationSeeder::class);
                $this->call(ProductGenericSeeder::class);
                $this->call(ProductSuppliesSeeder::class);
                $this->call(FixedClasificationSeeder::class);
                $this->call(PatientsSeeder::class);
                $this->call(FactorySeeder::class);
                $this->call(ProductSeeder::class);
                $this->call(FixedNomProductSeeder::class);
                $this->call(PeriodicityFrequencySeeder::class);
                $this->call(FixedAssetsSeeder::class);
                $this->call(AssistanceSeeder::class);
                $this->call(BaseLocationCapacitySeeder::class);
                $this->call(LocationCapacitySeeder::class);
                $this->call(FinancialDataSeeder::class);
                $this->call(AssistanceSpecialSeeder::class);
                //$this->call(TypeOfAttention::class);
                //$this->call(FrequencySeeder::class);
                //$this->call(CriterionSeeder::class);
                //$this->call(CriterionActivityGoalSeeder::class);
                //$this->call(CustomFieldTypeSeeder::class);
                //MIGRATION-$this->call(UserUserSeeder::class);
                // $this->call(InstitutionMacSeeder::class);
                //Test
                //$this->call(GroupActivitySeeder::class);
                //$this->call(UserGroupActivitySeeder::class);
                //$this->call(DeliverySeeder::class);
                //$this->call(CategoryGoalSeeder::class);
                //$this->call(ScoreSeeder::class);
                //$this->call(CustomFieldSeeder::class);
                //$this->call(CustomFieldUserRoleSeeder::class);
                //$this->call(CustomFieldEducationalInstitutionSeeder::class);
                //$this->call(CustomFieldCourseSeeder::class);
                //$this->call(CompetitionCourseSeeder::class);
                //MIGRATION-$this->call(CurriculumSeeder::class);
                //MIGRATION-$this->call(UserRoleGroupSeeder::class);             
                //MIGRATION-$this->call(AssistanceSessionSeeder::class);
                //MIGRATION-$this->call(UserRoleCourseSeeder::class);

                //Semillas Campos Adicionales Signos Vitales
                $this->call(LitersPerMinuteSeeder::class);
                $this->call(OxygenTypeSeeder::class); 
                $this->call(ParametersSignsSeeder::class);

                //Semillas De Pruebas
                $this->call(ContractStatusSeeder::class);
                $this->call(CoverageSeeder::class);
                $this->call(FirmsSeeder::class);
                $this->call(InsuranceCarrierSeeder::class);
                $this->call(ModalitySeeder::class);
                $this->call(TypeBriefcaseSeeder::class);
                $this->call(PolicyTypeSeeder::class);
                
                //Semillas Tipo de registro
                $this->call(ChTypeRecordSeeder::class);

                 //Semillas HC Medica
                $this->call(ReasonExitSeeder::class);
                $this->call(RecommendationsEvoSeeder::class);
                $this->call(EnterallyDietSeeder::class);
                $this->call(ChTypeProcedureSeeder::class);
                $this->call(ChTypeInabilitySeeder::class);
                $this->call(ChContingencyCodeSeeder::class);
                $this->call(ChReasonSeeder::class);
                $this->call(HourlyFrequencySeeder::class);
                
                //Semillas  Consentimiento informado
                $this->call(TypeConsentsSeeder::class);
                
                
                //Semillas HC SocialWork
                $this->call(ChSwActivitiesSeeder::class);
                $this->call(ChSwSenioritySeeder::class);
                $this->call(ChSwOccupationSeeder::class);
                $this->call(ChSwHoursSeeder::class);
                $this->call(ChSwTurnSeeder::class);
                $this->call(ChSwCommunicationsSeeder::class);
                $this->call(ChSwExpressionSeeder::class);
                $this->call(ChSwHousingSeeder::class);
                $this->call(ChSwHousingTypeSeeder::class);
                $this->call(ChSwServicesSeeder::class);
                $this->call(ChSwNetworkSeeder::class);
                
                
                
                //Semillas talento humano
                $this->call(TalentHumanActionSeeder::class);
                $this->call(HumanTalentRequestObservationSeeder::class);
                //
                $this->call(SuppliesStatusSeeder::class);
          




        }
}
