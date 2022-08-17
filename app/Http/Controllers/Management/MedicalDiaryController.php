<?php

namespace App\Http\Controllers\Management;

use App\Models\MedicalDiary;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
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
        $medical_diary = MedicalDiary::with('assistance');

        if ($request->assistance) {
            $medical_diary->where('assistance_id', $request->assistance );
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
            'message' => 'MedicalDiarys obtenidas exitosamente',
            'data' => ['medical_diary' => $medical_diary]
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $MedicalDiary = new MedicalDiary;
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
            'message' => 'Agenda creada exitosamente',
            'data' => ['medical_diary' => $MedicalDiary->toArray()]
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
            'message' => 'Área obtenida exitosamente',
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
    public function update(Request $request, int $id)
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
            $MedicalDiary = MedicalDiary::find($id);
            $MedicalDiary->delete();

            return response()->json([
                'status' => true,
                'message' => 'Agenda eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Agenda esta en uso, no es posible eliminar'
            ], 423);
        }
    }
}
