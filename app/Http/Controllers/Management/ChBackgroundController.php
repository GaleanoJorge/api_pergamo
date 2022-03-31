<?php

namespace App\Http\Controllers\Management;

use App\Models\ChBackground;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChBackgroundController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChBackground = ChBackground::with('ch_background');

        if($request->_sort){
            $ChBackground->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChBackground->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChBackground=$ChBackground->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChBackground=$ChBackground->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Antecedentes obtenidos exitosamente',
            'data' => ['ch_background' => $ChBackground]
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
        
       
        $ChBackground = ChBackground::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->with('ch_type_background')->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Antecedentes obtenidos exitosamente',
            'data' => ['ch_background' => $ChBackground]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $validate=ChBackground::where('ch_record_id', $request->ch_record_id)->where('ch_type_background_id',$request->ch_type_background_id)->first();
        if(!$validate){
        $ChBackground = new ChBackground; 
        $ChBackground->revision = $request->revision; 
        $ChBackground->observation = $request->observation; 
        $ChBackground->ch_type_background_id = $request->ch_type_background_id; 
        $ChBackground->type_record_id = $request->type_record_id; 
        $ChBackground->ch_record_id = $request->ch_record_id; 
        $ChBackground->save();

        return response()->json([
            'status' => true,
            'message' => 'Antecedentes asociados al paciente exitosamente',
            'data' => ['ch_background' => $ChBackground->toArray()]
        ]);
    }else{
        return response()->json([
            'status' => false,
            'message' => 'Ya tiene observación'
        ], 423);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChBackground = ChBackground::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Antecedentes obtenido exitosamente',
            'data' => ['ch_background' => $ChBackground]
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
        $ChBackground = ChBackground::find($id);  
        $ChBackground->revision = $request->revision; 
        $ChBackground->observation = $request->observation; 
        $ChBackground->ch_type_background_id = $request->ch_type_background_id; 
        $ChBackground->type_record_id = $request->type_record_id; 
        $ChBackground->ch_record_id = $request->ch_record_id; 
        $ChBackground->save();

        return response()->json([
            'status' => true,
            'message' => 'Antecedentes actualizados exitosamente',
            'data' => ['ch_background' => $ChBackground]
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
            $ChBackground = ChBackground::find($id);
            $ChBackground->delete();

            return response()->json([
                'status' => true,
                'message' => 'Antecedente eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Antecedente en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
