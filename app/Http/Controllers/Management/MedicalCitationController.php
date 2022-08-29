<?php

namespace App\Http\Controllers\Management;

use App\Models\MedicalCitation;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MedicalCitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $MedicalCitation = MedicalCitation::with('patient','user','status','assistance');

        if ($request->_sort) {
            $MedicalCitation->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $MedicalCitation->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $MedicalCitation = $MedicalCitation->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $MedicalCitation = $MedicalCitation->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'MedicalCitations obtenidas exitosamente',
            'data' => ['medical_citation' => $MedicalCitation]
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
        $MedicalCitation = new MedicalCitation;
        $MedicalCitation->title = $request->title;
        $MedicalCitation->note = $request->note;
        $MedicalCitation->start_time = $request->start_time;
        $MedicalCitation->finish_time = $request->finish_time;
        $MedicalCitation->start_date = $request->start_date;
        $MedicalCitation->finish_date = $request->finish_date;
        $MedicalCitation->patient_id = $request->patient_id;
        $MedicalCitation->assistance_id = $request->assistance_id;
        $MedicalCitation->user_id = $request->user_id;
        $MedicalCitation->status_id = $request->status_id;
        $MedicalCitation->save();

        return response()->json([
            'status' => true,
            'message' => 'Cita medica creada exitosamente',
            'data' => ['medical_citation' => $MedicalCitation->toArray()]
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
        $MedicalCitation = MedicalCitation::where('id', $id)
            ->get()
            ->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cita medica obtenida exitosamente',
            'data' => ['medical_citation' => $MedicalCitation]
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
        $MedicalCitation = MedicalCitation::find($id);
        $MedicalCitation->name = $request->name;
        $MedicalCitation->description = $request->description;
        $MedicalCitation->save();

        return response()->json([
            'status' => true,
            'message' => 'Cita medica actualizada exitosamente',
            'data' => ['medical_citation' => $MedicalCitation]
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
            $MedicalCitation = MedicalCitation::find($id);
            $MedicalCitation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Cita medica eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cita medica esta en uso, no es posible eliminar'
            ], 423);
        }
    }
}
