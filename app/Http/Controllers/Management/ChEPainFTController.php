<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEPainFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChEPainFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEPainFT = ChEPainFT::select();


        if ($request->ch_record_id) {
            $ChEPainFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChEPainFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEPainFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEPainFT = $ChEPainFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEPainFT = $ChEPainFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_pain_f_t' => $ChEPainFT]
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


        $ChEPainFT = ChEPainFT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
            


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_pain_f_t' => $ChEPainFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChEPainFT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
        // if(!$validate){
        $ChEPainFT = new ChEPainFT;
        if (isset($request->type)) {
            foreach ($request->type as $element) {
                if ($element == 'Quemante') 
                {
                    $ChEPainFT->burning = $element;
                } 
                else if ($element == 'Punzante') {
                    $ChEPainFT->stinging = $element;
                } 
                else if ($element == 'Localizado') {
                    $ChEPainFT->locatedi = $element;
                }
                else if ($element == 'Opresivo') {
                    $ChEPainFT->oppressive = $element;
                }
              }
        }

        $ChEPainFT->irradiated = $request->irradiated;
        $ChEPainFT->located = $request->located;
        $ChEPainFT->intensity = $request->intensity;
        $ChEPainFT->exaccervating = $request->exaccervating;
        $ChEPainFT->decreated = $request->decreated;

        $ChEPainFT->type_record_id = $request->type_record_id;
        $ChEPainFT->ch_record_id = $request->ch_record_id;
        $ChEPainFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_pain_f_t' => $ChEPainFT->toArray()]
        ]);
        // }else{
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Ya tiene observación'
        //     ], 423);
        // }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChEPainFT = ChEPainFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_pain_f_t' => $ChEPainFT]
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
        $ChEPainFT = new ChEPainFT;
        if (isset($request->type)) {
            foreach ($request->type as $element) {
                if ($element == 'Quemante') 
                {
                    $ChEPainFT->burning = $element;
                } 
                else if ($element == 'Punzante') {
                    $ChEPainFT->stinging = $element;
                } 
                else if ($element == 'Localizado') {
                    $ChEPainFT->locatedi = $element;
                }
                else if ($element == 'Opresivo') {
                    $ChEPainFT->oppressive = $element;
                }
              }
        }
        $ChEPainFT->irradiated = $request->irradiated;
        $ChEPainFT->located = $request->located;
        $ChEPainFT->intensity = $request->intensity;
        $ChEPainFT->exaccervating = $request->exaccervating;
        $ChEPainFT->decreated = $request->decreated;
        
        $ChEPainFT->type_record_id = $request->type_record_id;
        $ChEPainFT->ch_record_id = $request->ch_record_id;
        $ChEPainFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_pain_f_t' => $ChEPainFT]
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
            $ChEPainFT = ChEPainFT::find($id);
            $ChEPainFT->delete();

            return response()->json([
                'status' => true,
                'message' => 'valoracion eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'valoracion en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}