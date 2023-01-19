<?php

namespace App\Http\Controllers\Management;

use App\Models\ChTypeBackground;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChTypeBackgroundController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChTypeBackground = ChTypeBackground::select();

        if($request->_sort){
            $ChTypeBackground->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChTypeBackground->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChTypeBackground=$ChTypeBackground->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChTypeBackground=$ChTypeBackground->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Antecedentes obtenidos exitosamente',
            'data' => ['ch_type_background' => $ChTypeBackground]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChTypeBackground = new ChTypeBackground; 
        $ChTypeBackground->name = $request->name; 
        $ChTypeBackground->save();

        return response()->json([
            'status' => true,
            'message' => 'Antecedentes asociado al paciente exitosamente',
            'data' => ['ch_type_background' => $ChTypeBackground->toArray()]
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
        $ChTypeBackground = ChTypeBackground::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Antecedentes obtenido exitosamente',
            'data' => ['ch_type_background' => $ChTypeBackground]
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
        $ChTypeBackground = ChTypeBackground::find($id);  
        $ChTypeBackground->name = $request->name; 
          
        
        
        $ChTypeBackground->save();

        return response()->json([
            'status' => true,
            'message' => 'Antecedentes actualizado exitosamente',
            'data' => ['ch_type_background' => $ChTypeBackground]
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
            $ChTypeBackground = ChTypeBackground::find($id);
            $ChTypeBackground->delete();

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
