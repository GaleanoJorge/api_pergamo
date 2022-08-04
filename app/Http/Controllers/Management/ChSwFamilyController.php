<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwFamily;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChSwFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwFamily = ChSwFamily::select('ch_sw_family.*')
        ->with('relationship');

        if ($request->_sort) {
            $ChSwFamily->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSwFamily->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSwFamily = $ChSwFamily->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSwFamily = $ChSwFamily->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Información familiar obtenidos exitosamente',
            'data' => ['ch_sw_family' => $ChSwFamily]
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


        $ChSwFamily = ChSwFamily::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->with(
                'relationship',
                'identification_type',
                'marital_status',
                'academic_level',
                'study_level_status',
                'activities',
                'inability',
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Información familiar obtenida exitosamente',
            'data' => ['ch_sw_family' => $ChSwFamily]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChSwFamily = new ChSwFamily;
        $ChSwFamily->firstname = $request->firstname;
        $ChSwFamily->middlefirstname = $request->middlefirstname;
        $ChSwFamily->lastname = $request->lastname;
        $ChSwFamily->middlelastname = $request->middlelastname;
        $ChSwFamily->range_age = $request->range_age;
        $ChSwFamily->identification = $request->identification;
        $ChSwFamily->phone = $request->phone;
        $ChSwFamily->landline = $request->landline;
        $ChSwFamily->email = $request->email;
        $ChSwFamily->residence_address = $request->residence_address;
        $ChSwFamily->is_disability = $request->is_disability;
        $ChSwFamily->relationship_id = $request->relationship_id;
        $ChSwFamily->identification_type_id = $request->identification_type_id;
        $ChSwFamily->marital_status_id = $request->marital_status_id;
        $ChSwFamily->academic_level_id = $request->academic_level_id;
        $ChSwFamily->study_level_status_id = $request->study_level_status_id;
        $ChSwFamily->activities_id = $request->activities_id;
        $ChSwFamily->inability_id = $request->inability_id;
        $ChSwFamily->carer = $request->carer;
        $ChSwFamily->type_record_id = $request->type_record_id;
        $ChSwFamily->ch_record_id = $request->ch_record_id;
        $ChSwFamily->save();

        return response()->json([
            'status' => true,
            'message' => 'Información familiar asociada al paciente exitosamente',
            'data' => ['ch_sw_family' => $ChSwFamily->toArray()]
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
        $ChSwFamily = ChSwFamily::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Información familiar obtenida exitosamente',
            'data' => ['ch_sw_family' => $ChSwFamily]
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
        $ChSwFamily = ChSwFamily::find($id);
        $ChSwFamily->firstname = $request->firstname;
        $ChSwFamily->middlefirstname = $request->middlefirstname;
        $ChSwFamily->lastname = $request->lastname;
        $ChSwFamily->middlelastname = $request->middlelastname;
        $ChSwFamily->range_age = $request->range_age;
        $ChSwFamily->identification = $request->identification;
        $ChSwFamily->phone = $request->phone;
        $ChSwFamily->landline = $request->landline;
        $ChSwFamily->email = $request->email;
        $ChSwFamily->residence_address = $request->residence_address;
        $ChSwFamily->is_disability = $request->is_disability;
        $ChSwFamily->relationship_id = $request->relationship_id;
        $ChSwFamily->identification_type_id = $request->identification_type_id;
        $ChSwFamily->marital_status_id = $request->marital_status_id;
        $ChSwFamily->academic_level_id = $request->academic_level_id;
        $ChSwFamily->study_level_status_id = $request->study_level_status_id;
        $ChSwFamily->activities_id = $request->activities_id;
        $ChSwFamily->inability_id = $request->inability_id;
        $ChSwFamily->carer = $request->carer;
        $ChSwFamily->type_record_id = $request->type_record_id;
        $ChSwFamily->ch_record_id = $request->ch_record_id;
        $ChSwFamily->save();

        return response()->json([
            'status' => true,
            'message' => 'Información familiar actualizada exitosamente',
            'data' => ['ch_sw_family' => $ChSwFamily]
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
            $ChSwFamily = ChSwFamily::find($id);
            $ChSwFamily->delete();

            return response()->json([
                'status' => true,
                'message' => 'Información familiar eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Información familiar en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
