<?php

namespace App\Http\Controllers\Management;

use App\Models\TlTherapyLanguageRegular;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TlTherapyLanguageRegularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $TlTherapyLanguageRegular = TlTherapyLanguageRegular::with('diagnosis',);

        if ($request->_sort) {
            $TlTherapyLanguageRegular->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $TlTherapyLanguageRegular->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $TlTherapyLanguageRegular = $TlTherapyLanguageRegular->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $TlTherapyLanguageRegular = $TlTherapyLanguageRegular->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Nota Regular obtenidos exitosamente',
            'data' => ['tl_therapy_language_regular' => $TlTherapyLanguageRegular]
        ]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id,int $type_record_id): JsonResponse
    {
        
       
        $TlTherapyLanguageRegular = TlTherapyLanguageRegular::with('diagnosis') ->where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Nota Regular asociado al paciente exitosamente',
            'data' => ['tl_therapy_language_regular' => $TlTherapyLanguageRegular]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $TlTherapyLanguageRegular = new TlTherapyLanguageRegular;
        $TlTherapyLanguageRegular->diagnosis_id = $request->diagnosis_id;
        $TlTherapyLanguageRegular->status_patient = $request->status_patient;
        $TlTherapyLanguageRegular->type_record_id = $request->type_record_id;
        $TlTherapyLanguageRegular->ch_record_id = $request->ch_record_id;
        $TlTherapyLanguageRegular->save();

        return response()->json([
            'status' => true,
            'message' => 'Nota Regular asociado al paciente exitosamente',
            'data' => ['tl_therapy_language_regular' => $TlTherapyLanguageRegular->toArray()]
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
        $TlTherapyLanguageRegular = TlTherapyLanguageRegular::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Nota Regular obtenido exitosamente',
            'data' => ['tl_therapy_language_regular' => $TlTherapyLanguageRegular]
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
        $TlTherapyLanguageRegular = TlTherapyLanguageRegular::find($id);
        $TlTherapyLanguageRegular->diagnosis_id = $request->diagnosis_id;
        $TlTherapyLanguageRegular->status_patient = $request->status_patient;
        $TlTherapyLanguageRegular->type_record_id = $request->type_record_id;
        $TlTherapyLanguageRegular->ch_record_id = $request->ch_record_id;
        $TlTherapyLanguageRegular->save();
       

        return response()->json([
            'status' => true,
            'message' => 'Nota Regular actualizado exitosamente',
            'data' => ['tl_therapy_language_regular' => $TlTherapyLanguageRegular]
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
            $TlTherapyLanguageRegular = TlTherapyLanguageRegular::find($id);
            $TlTherapyLanguageRegular->delete();

            return response()->json([
                'status' => true,
                'message' => 'Nota Regular eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Nota Regular en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
