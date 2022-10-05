<?php

namespace App\Http\Controllers\Admissions;

use App\Models\LogAdmissions;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LogAdmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $LogAdmissions = LogAdmissions::select('log_admissions.*')
        ->with(     
        'user',
        'patient',
        'admissions');

        if ($request->_sort) {
            $LogAdmissions->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $LogAdmissions->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $LogAdmissions = $LogAdmissions->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $LogAdmissions = $LogAdmissions->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Log Admissions obtenidos exitosamente',
            'data' => ['log_admissions' => $LogAdmissions]
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {


        $LogAdmissions = LogAdmissions::with(
            'user',
            'patient',
            'admissions'
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Log Admissions obtenida exitosamente',
            'data' => ['log_admissions' => $LogAdmissions]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        $LogAdmissions = new LogAdmissions;
        $LogAdmissions->user_id = $request->user_id;
        $LogAdmissions->patient_id = $request->patient_id;
        $LogAdmissions->admissions_id = $request->admissions_id;
        $LogAdmissions->status = $request->status;
        $LogAdmissions->save();

        // $areas = json_decode($request->areas_id);
        // foreach ($areas as $element) {
        //     $ChNutritionDietDay = new LogAdmissions;
        //     $ChNutritionDietDay->name = $element;
        //     $ChNutritionDietDay->ch_nutrition_food_history_id = $LogAdmissions->id;
        //     $ChNutritionDietDay->save();
        // }


        return response()->json([
            'status' => true,
            'message' => 'Log Admissions asociada al paciente exitosamente',
            'data' => ['log_admissions' => $LogAdmissions->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $LogAdmissions = LogAdmissions::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Log Admissions obtenida exitosamente',
            'data' => ['log_admissions' => $LogAdmissions]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $LogAdmissions = LogAdmissions::find($id);
        $LogAdmissions->user_id = $request->user_id;
        $LogAdmissions->patient_id = $request->patient_id;
        $LogAdmissions->admissions_id = $request->admissions_id;
        $LogAdmissions->status = $request->status;
        $LogAdmissions->save();

        return response()->json([
            'status' => true,
            'message' => 'Log Admissions actualizada exitosamente',
            'data' => ['log_admissions' => $LogAdmissions]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $LogAdmissions = LogAdmissions::find($id);
            $LogAdmissions->delete();

            return response()->json([
                'status' => true,
                'message' => 'Log Admissions eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Log Admissions en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
