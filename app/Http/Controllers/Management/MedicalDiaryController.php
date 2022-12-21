<?php

namespace App\Http\Controllers\Management;

use App\Models\MedicalDiary;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalDiaryDaysRequest;
use App\Models\Bed;
use App\Models\MedicalDiaryDays;
use App\Models\NonWorkingDays;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MedicalDiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $medical_diary = MedicalDiary::select(
            'medical_diary.*',
            // DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
        )
            // ->leftJoin('medical_diary_days', 'medical_diary.id', 'medical_diary_days.medical_diary_id')
            // ->leftJoin('patients', 'medical_diary_days.patient_id', 'patients.id')
            ->with(
                'assistance',
                'status',
                'medical_diary_days_grouped.days',
                'office',
                'procedure',
                'office.pavilion.flat.campus',
            );

        if ($request->user) {
            $medical_diary
                ->leftJoin('assistance', 'medical_diary.assistance_id', 'assistance.id')
                ->leftJoin('users', 'assistance.user_id', 'users.id')
                ->where('assistance.user_id', $request->user);
        }

        if ($request->assistance_id) {
            $medical_diary->where('assistance_id', $request->assistance_id);
        }

        if ($request->status_id) {
            // var_dump($request->status_id);
            $medical_diary->where('medical_diary.diary_status_id', $request->status_id);
        }


        if ($request->_sort) {
            $medical_diary->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $medical_diary->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $medical_diary = $medical_diary->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $medical_diary = $medical_diary->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Agendas medicas obtenidas exitosamente',
            'data' => ['medical_diary' => $medical_diary]
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function store(MedicalDiaryDaysRequest $request): JsonResponse
    {


        $calendar_days = json_decode($request->calendar_array);
        foreach ($calendar_days as $item) {
            $validate_schedule_range =  MedicalDiaryDays::select('medical_diary_days.*')
                ->leftJoin('medical_diary', 'medical_diary_days.medical_diary_id', 'medical_diary.id')
                ->where('assistance_id', $request->assistance_id)
                ->where(function ($query) use ($request, $item) {
                    $low_border = Carbon::parse($item . $request->start_time);
                    $high_border = Carbon::parse($item . $request->finish_time);
                    $query->where('start_hour', '>', $low_border)
                        ->Where('start_hour', '<', $high_border)
                        ->orWhere(function ($que) use ($low_border, $high_border) {
                            $que->Where('finish_hour', '>', $low_border)
                                ->Where('finish_hour', '<', $high_border);

                        });
                })->first();
            
            if($validate_schedule_range){
                return response()->json([
                    'status' => false,
                    'message' => 'Conflicto horario de '. $validate_schedule_range->start_hour .' a ' .  $validate_schedule_range->finish_hour,
                ]);
            }
        }

        $MedicalDiary = new MedicalDiary;

        $MedicalDiary->assistance_id = $request->assistance_id;
        $MedicalDiary->procedure_id = $request->procedure_id;
        $MedicalDiary->start_time = $request->start_time;
        $MedicalDiary->finish_time = $request->finish_time;
        $MedicalDiary->finish_date = $calendar_days[0];
        $MedicalDiary->start_date = $calendar_days[count($calendar_days) - 1];
        $MedicalDiary->interval = $request->interval;
        $MedicalDiary->campus_id = $request->campus_id;
        $MedicalDiary->flat_id = $request->flat_id;
        $MedicalDiary->pavilion_id = $request->pavilion_id;
        $MedicalDiary->office_id = $request->office_id;
        $MedicalDiary->diary_status_id = 1;

        $MedicalDiary->patient_quantity = $request->patient_quantity;

        // $validate_multiple_patients = 

        $MedicalDiary->save();

        $Office = Bed::find($request->office_id);
        $Office->status_bed_id = 2;
        $Office->save();

        foreach($calendar_days as $item_dates){
            $non_working = NonWorkingDays::select('non_working_days.*')->where('day', $item_dates)->first();
            if(!$non_working)
            {
                $dateTimeStart = $item_dates . " " . $request->start_time;
                $dateTimeFinish = $item_dates . " " . $request->finish_time;

                $start_diary_scheduling = new DateTime($dateTimeStart);
                $finish_diary_scheduling = new DateTime($dateTimeFinish);

                $start = new DateTime($dateTimeStart);
                $finish = new DateTime($dateTimeStart);
                $finish = $finish->modify('+' . $request->interval . ' minutes');

                $dayInf = getdate(strtotime($item_dates));
                $numberDay = $dayInf['wday'] + 1;

                while (($finish <= $finish_diary_scheduling)) {

                    $MedicalDiaryDays = new MedicalDiaryDays;

                    $MedicalDiaryDays->days_id = $numberDay;
                    $MedicalDiaryDays->medical_diary_id = $MedicalDiary->id;
                    $MedicalDiaryDays->medical_status_id = 1;
                    $MedicalDiaryDays->start_hour = $start->format("Y-m-d H:i:s");
                    $start = $start->modify('+' . $request->interval . ' minutes');
                    $MedicalDiaryDays->finish_hour = $finish->format("Y-m-d H:i:s");
                    $finish = $finish->modify('+' . $request->interval . ' minutes');

                    $MedicalDiaryDays->save();

                    $pq = intval($request->patient_quantity);

                    //multiple_patients
                    for ($j = 0; $j < $pq-1; $j++) {

                        $MultiMedicalDiaryDays = new MedicalDiaryDays;

                        $MultiMedicalDiaryDays->days_id = $MedicalDiaryDays->days_id;
                        $MultiMedicalDiaryDays->medical_diary_id = $MedicalDiary->id;
                        $MultiMedicalDiaryDays->medical_status_id = 1;
                        $MultiMedicalDiaryDays->start_hour =  $MedicalDiaryDays->start_hour;
                        $MultiMedicalDiaryDays->finish_hour =  $MedicalDiaryDays->finish_hour;
                        $MultiMedicalDiaryDays->diary_days_id =  $MedicalDiaryDays->id;

                        $MultiMedicalDiaryDays->save();
                    }
                }

            }
        }

        $InitScheduling = new DateTime($request->start_date);


        $ValidateWeekDays =  $InitScheduling->modify("-1 day")->format("Y-m-d");
        $FinishScheduling = new DateTime($request->finish_date);


        $diff = $InitScheduling->diff($FinishScheduling);


        // for ($i = 0; $i < $diff->days; $i++) {

        //     if (gettype($ValidateWeekDays) == "string") {
        //         $ValidateWeekDays = new DateTime($ValidateWeekDays);
        //     }
        //     $ValidateWeekDays = $ValidateWeekDays->modify("+1 day")->format("Y-m-d");
        //     $dateTimeStart = $ValidateWeekDays . " " . $request->start_time;
        //     $dateTimeFinish = $ValidateWeekDays . " " . $request->finish_time;

        //     $start_diary_scheduling = new DateTime($dateTimeStart);
        //     $finish_diary_scheduling = new DateTime($dateTimeFinish);

        //     $dayInf = getdate(strtotime($ValidateWeekDays));
        //     $numberDay = $dayInf['wday'] + 1;
        //     $day = array_search($numberDay, $request->weekdays);

        //     if (array_search($numberDay, $request->weekdays) === 0 || array_search($numberDay, $request->weekdays) != false) {

        //         $non_working = NonWorkingDays::select('non_working_days.*')->where('day', $ValidateWeekDays)->get()->toArray();
        //         $start = new DateTime($dateTimeStart);
        //         $finish = new DateTime($dateTimeStart);
        //         $finish = $finish->modify('+' . $request->interval . ' minutes');
        //         // $view = $start->format("Y-m-d H:i:s");
        //         // $view2 = $finish->format("Y-m-d H:i:s");

        //         while (($finish < $finish_diary_scheduling || $finish == $finish_diary_scheduling) && sizeof($non_working) == 0) {

        //             $MedicalDiaryDays = new MedicalDiaryDays;

        //             $MedicalDiaryDays->days_id = $request->weekdays[array_search($dayInf['wday'] + 1, $request->weekdays)];
        //             $MedicalDiaryDays->medical_diary_id = $MedicalDiary->id;
        //             $MedicalDiaryDays->medical_status_id = 1;
        //             // $view2 = $finish->format("Y-m-d H:i:s");
        //             // $view = $start->format("Y-m-d H:i:s");
        //             $MedicalDiaryDays->start_hour = $start->format("Y-m-d H:i:s");
        //             $start = $start->modify('+' . $request->interval . ' minutes');
        //             // $view = $start->format("Y-m-d H:i:s");
        //             // $view2 = $finish->format("Y-m-d H:i:s");
        //             $MedicalDiaryDays->finish_hour = $finish->format("Y-m-d H:i:s");
        //             $finish = $finish->modify('+' . $request->interval . ' minutes');
        //             // $view = $start->format("Y-m-d H:i:s");
        //             // $view2 = $finish->format("Y-m-d H:i:s");

        //             $MedicalDiaryDays->save();

        //             $pq = intval($request->patient_quantity);

        //             //multiple_patients
        //             for ($j = 0; $j < $pq; $j++) {

        //                 $MultiMedicalDiaryDays = new MedicalDiaryDays;

        //                 $MultiMedicalDiaryDays->days_id = $request->weekdays[array_search($dayInf['wday'] + 1, $request->weekdays)];
        //                 $MultiMedicalDiaryDays->medical_diary_id = $MedicalDiary->id;
        //                 $MultiMedicalDiaryDays->medical_status_id = 1;
        //                 $MultiMedicalDiaryDays->start_hour =  $MedicalDiaryDays->start_hour;
        //                 $MultiMedicalDiaryDays->finish_hour =  $MedicalDiaryDays->finish_hour;
        //                 $MultiMedicalDiaryDays->diary_days_id =  $MedicalDiaryDays->id;

        //                 $MultiMedicalDiaryDays->save();
        //             }
        //         }
        //     }
        // }


        // $days = json_decode($request->weekdays);
        // foreach($days as $day){

        //     $MedicalDiaryDays = new MedicalDiaryDays;

        //     $MedicalDiaryDays->days_id = $day;
        //     $MedicalDiaryDays->medical_diary_id = $MedicalDiary->id;

        //     $MedicalDiaryDays->save();
        // }

        return response()->json([
            'status' => true,
            'message' => 'Agendas medicas creada exitosamente',
            'data' => ['medical_diary' => $MedicalDiary->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function changeStatus(Request $request, int $id): JsonResponse
    {
        $MedicalDiary = MedicalDiary::find($id);
        $validate_diary =  MedicalDiaryDays::select('medical_diary_days.*')
            ->where('medical_diary_days.medical_diary_id', $id)
            ->where('medical_diary_days.medical_status_id', '!=', 1)->get()->toArray();

        if (count($validate_diary) > 0) {
            return response()->json([
                'status' => false,
                'message' => 'No se puede inactivar la agenda, cuenta con citaciones en ejecución',
            ]);
        }

        ($request->status_id == 1) ?  $message = 'Agenda activada exitosamente' : $message = 'Agenda inactivada exitosamente';
        $MedicalDiary->diary_status_id = $request->status_id;
        $MedicalDiary->save();

        return response()->json([
            'status' => true,
            'message' =>  $message,
            'data' => ['medical_diary' => $MedicalDiary]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        $MedicalDiary = MedicalDiary::where('id', $id)
            ->get()
            ->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Agendas medicas obtenida exitosamente',
            'data' => ['medical_diary' => $MedicalDiary]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(MedicalDiaryDaysRequest $request, int $id)
    {
        $MedicalDiary = MedicalDiary::find($id);
        $MedicalDiary->assistance_id = $request->assistance_id;
        $MedicalDiary->weekdays = $request->weekdays;
        $MedicalDiary->start_time = $request->start_time;
        $MedicalDiary->finish_time = $request->finish_time;
        $MedicalDiary->start_date = $request->start_date;
        $MedicalDiary->finish_date = $request->finish_date;
        $MedicalDiary->interval = $request->interval;
        $MedicalDiary->save();

        return response()->json([
            'status' => true,
            'message' => 'Agenda actualizada exitosamente',
            'data' => ['medical_diary' => $MedicalDiary]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $MedicalDiaryDays = MedicalDiaryDays::select('medical_diary_days.*')
                ->where('medical_diary_id', $id)
                ->where('medical_status_id', '=', 1)->get();

            $MedicalDiaryDaysQuantity = $MedicalDiaryDays->count();

            foreach($MedicalDiaryDays as $MedicalDiary){
                $MedicalDiary->delete();
            }

            return response()->json([
                'status' => true,
                'message' => $MedicalDiaryDaysQuantity . ' agendas libres eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            $e;
            return response()->json([
                'status' => false,
                'message' => 'Agenda está en uso, no es posible eliminar'
            ], 423);
        }
    }
}
