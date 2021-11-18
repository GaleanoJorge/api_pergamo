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
                // $this->call(EducationalInstitutionSeeder::class);
                $this->call(RoleSeeder::class);
                $this->call(UserSeeder::class);
                $this->call(UserRoleSeeder::class);
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
                $this->call(GlossStatusSeeder::class);
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
        
        }
}
