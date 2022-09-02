<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleFac;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScaleFacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScaleFac = ChScaleFac::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {

        $ChScaleFac = ChScaleFac::select();

        if($request->_sort){
            $ChScaleFac->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScaleFac->where('name','like','%' . $request->search. '%');
        }
        if ($request->ch_record_id) {
            $ChScaleFac->where('ch_record_id', $request->ch_record_id);
        }

        if ($request->latest  && isset($request->latest)) {
        }
        if($request->query("pagination", true)=="false"){
            $ChScaleFac=$ChScaleFac->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScaleFac=$ChScaleFac->paginate($per_page,'*','page',$page); 
        } 

    }

            return response()->json([
                'status' => true,
                'message' => 'Escala FAC obtenida exitosamente',
                'data' => ['ch_scale_fac' => $ChScaleFac]
            ]);
        }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {

        $ChScaleFac = ChScaleFac::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escala FAC obtenida exitosamente',
            'data' => ['ch_scale_fac' => $ChScaleFac]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleFac = new ChScaleFac;
        $ChScaleFac->level_title = $request->level_title;
        $ChScaleFac->level_value = $request->level_value;
        $ChScaleFac->definition = $request->definition;
        $ChScaleFac->type_record_id = $request->type_record_id;
        $ChScaleFac->ch_record_id = $request->ch_record_id;
        $ChScaleFac->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala FAC asociada al paciente exitosamente',
            'data' => ['ch_scale_fac' => $ChScaleFac->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChScaleFac = ChScaleFac::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala FAC obtenida exitosamente',
            'data' => ['ch_scale_fac' => $ChScaleFac]
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
        $ChScaleFac = ChScaleFac::find($id);
        $ChScaleFac->level_title = $request->level_title;
        $ChScaleFac->level_value = $request->level_value;
        $ChScaleFac->definition = $request->definition;
        $ChScaleFac->type_record_id = $request->type_record_id;
        $ChScaleFac->ch_record_id = $request->ch_record_id;
        $ChScaleFac->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala FAC actualizada exitosamente',
            'data' => ['ch_scale_fac' => $ChScaleFac]
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
            $ChScaleFac = ChScaleFac::find($id);

            $ChScaleFac->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala FAC eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala FAC en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
