<?php

namespace App\Http\Controllers\Management;

use App\Models\ChTypeGynecologists;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChTypeGynecologistsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChTypeGynecologists = ChTypeGynecologists::select();

        if($request->_sort){
            $ChTypeGynecologists->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChTypeGynecologists->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChTypeGynecologists=$ChTypeGynecologists->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChTypeGynecologists=$ChTypeGynecologists->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenidos exitosamente',
            'data' => ['ch_type_gynecologists' => $ChTypeGynecologists]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChTypeGynecologists = new ChTypeGynecologists; 
        $ChTypeGynecologists->name = $request->name; 
        $ChTypeGynecologists->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos asociado al paciente exitosamente',
            'data' => ['ch_type_gynecologists' => $ChTypeGynecologists->toArray()]
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
        $ChTypeGynecologists = ChTypeGynecologists::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos obtenido exitosamente',
            'data' => ['ch_type_gynecologists' => $ChTypeGynecologists]
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
        $ChTypeGynecologists = ChTypeGynecologists::find($id);  
        $ChTypeGynecologists->name = $request->name; 
          
        
        
        $ChTypeGynecologists->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Ginecoobstetricos actualizado exitosamente',
            'data' => ['ch_type_gynecologists' => $ChTypeGynecologists]
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
            $ChTypeGynecologists = ChTypeGynecologists::find($id);
            $ChTypeGynecologists->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo Ginecoobstetricos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo Ginecoobstetricos en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
