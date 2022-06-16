<?php

namespace App\Http\Controllers\Management;

use App\Models\ChAssCough;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChAssCoughController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChAssCough = ChAssCough::select();

        if($request->_sort){
            $ChAssCough->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChAssCough->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChAssCough=$ChAssCough->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChAssCough=$ChAssCough->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tos obtenidos exitosamente',
            'data' => ['ch_ass_cough' => $ChAssCough]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChAssCough = new ChAssCough; 
        $ChAssCough->name = $request->name; 
        $ChAssCough->type_record_id = $request->type_record_id; 
        $ChAssCough->ch_record_id = $request->ch_record_id;  
        $ChAssCough->save();

        return response()->json([
            'status' => true,
            'message' => 'Tos asociado al paciente exitosamente',
            'data' => ['ch_ass_cough' => $ChAssCough->toArray()]
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
        $ChAssCough = ChAssCough::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tos obtenido exitosamente',
            'data' => ['ch_ass_cough' => $ChAssCough]
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
        $ChAssCough = ChAssCough::find($id);  
        $ChAssCough->name = $request->name;           
        $ChAssCough->type_record_id = $request->type_record_id; 
        $ChAssCough->ch_record_id = $request->ch_record_id;          
        $ChAssCough->save();

        return response()->json([
            'status' => true,
            'message' => 'Tos actualizado exitosamente',
            'data' => ['ch_ass_cough' => $ChAssCough]
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
            $ChAssCough = ChAssCough::find($id);
            $ChAssCough->delete();

            return response()->json([
                'status' => true,
                'message' => 'Toseliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tosen uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
