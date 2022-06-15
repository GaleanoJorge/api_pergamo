<?php

namespace App\Http\Controllers\Management;

use App\Models\TherapyConceptTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TherapyConceptTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $TherapyConceptTl = TherapyConceptTl::select();

        if ($request->_sort) {
            $TherapyConceptTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $TherapyConceptTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $TherapyConceptTl = $TherapyConceptTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $TherapyConceptTl = $TherapyConceptTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Concepto De Fonoaudiología obtenidos exitosamente',
            'data' => ['therapy_concept_tl' => $TherapyConceptTl]
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
        
       
        $TherapyConceptTl = TherapyConceptTl::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Concepto De Fonoaudiología asociado al paciente exitosamente',
            'data' => ['therapy_concept_tl' => $TherapyConceptTl]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $TherapyConceptTl = new TherapyConceptTl;
        $TherapyConceptTl->text = $request->text;
        $TherapyConceptTl->type_record_id = $request->type_record_id;
        $TherapyConceptTl->ch_record_id = $request->ch_record_id;
        $TherapyConceptTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Concepto De Fonoaudiología asociado al paciente exitosamente',
            'data' => ['therapy_concept_tl' => $TherapyConceptTl->toArray()]
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
        $TherapyConceptTl = TherapyConceptTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Concepto De Fonoaudiología obtenido exitosamente',
            'data' => ['therapy_concept_tl' => $TherapyConceptTl]
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
        $TherapyConceptTl = TherapyConceptTl::find($id);
        $TherapyConceptTl->text = $request->text;
        $TherapyConceptTl->type_record_id = $request->type_record_id;
        $TherapyConceptTl->ch_record_id = $request->ch_record_id;
        $TherapyConceptTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Concepto De Fonoaudiología actualizado exitosamente',
            'data' => ['therapy_concept_tl' => $TherapyConceptTl]
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
            $TherapyConceptTl = TherapyConceptTl::find($id);
            $TherapyConceptTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Concepto De Fonoaudiología eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Concepto De Fonoaudiología en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
