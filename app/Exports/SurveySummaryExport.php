<?php

namespace App\Exports;

use App\Models\Section;
use App\Models\UserAssignSurvey;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class SurveySummaryExport implements FromView, WithDrawings
{
    use Exportable;

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Escudo');
        //$drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/images/EscudoColombia.jpg'));
        $drawing->setHeight(70);
        $drawing->setCoordinates('B2');

        $drawing2 = new Drawing();
        $drawing2->setName('Logo');
        //$drawing2->setDescription('This is a second image');
        $drawing2->setPath(public_path('/images/nameEJRLBderecho.jpg'));
        $drawing2->setHeight(70);
        $drawing2->setCoordinates('G2');

        return [$drawing, $drawing2];
    }

    public function forSurveyId(int $id)
    {
        $this->survey_id = $id;        
        return $this;
    }

    public function forSurveyInstanceId(int $id)
    {
        $this->survey_instance_id = $id;        
        return $this;
    }

    public function view(): View
    {
        /* AL HACER ESTA MOVIDA EN EL WITH, ESTAMOS ACCEDIENDO AL MODELO QUESTION POR
        LO CUAL ES POSIBLE ADICIONAR UN WITH
        $sections=Section::with(['questions'=> function($query){
            $query->with('survey_details');
        }])*/
        $sections=Section::select('section.id','survey_sections.survey_id','section.name')
        ->with('questions')
        ->Join('survey_sections', 'survey_sections.section_id', 'section.id')
        ->Join('survey', 'survey.id', 'survey_sections.survey_id')
        ->groupBy('section.id');

        $participants=UserAssignSurvey::select('user_assign_survey.*')
        ->with(['survey_details' => function($query){
            $query->with('answer');
        }])
        ->Join('survey_instance', 'user_assign_survey.survey_instance_id', 'survey_instance.id')
        ->Join('survey', 'survey.id', 'survey_instance.survey_id');

        if(@$this->survey_id){
            $sections->where('survey.id', $this->survey_id);
            $participants->where('survey.id', $this->survey_id);
        }
        if(@$this->survey_instance_id){
            $participants->where('survey_instance.id', $this->survey_instance_id);
        }

        return view('exports.surveySummary', [
            'sections' => $sections->get()->toArray(),
            'participants' => $participants->get()->toArray()
        ]);
    }
}