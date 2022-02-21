<?php

namespace App\Http\Controllers\Management;

use App\Models\Locality;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LocalityRequest;
use Illuminate\Database\QueryException;

class LocalityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Locality = Locality::select();

        if($request->_sort){
            $Locality->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Locality->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Locality=$Locality->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Locality=$Locality->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Localidades de residencia asociadas exitosamente',
            'data' => ['locality' => $Locality]
        ]);
    }
    

    public function store(LocalityRequest $request): JsonResponse
    {
        $Locality = new Locality;
        $Locality->name = $request->name; 
        $Locality->municipality_id = $request->municipality_id; 
        $Locality->save();

        return response()->json([
            'status' => true,
            'message' => 'Localidad de residencia creada exitosamente',
            'data' => ['locality' => $Locality->toArray()]
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
        $Locality = Locality::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Localidad de residencia obtenida exitosamente',
            'data' => ['locality' => $Locality]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(LocalityRequest $request, int $id): JsonResponse
    {
        $Locality = Locality::find($id);
        $Locality->name = $request->name; 
        $Locality->municipality_id = $request->municipality_id;  
        $Locality->save();

        return response()->json([
            'status' => true,
            'message' => 'Localidad de residencia actualizada exitosamente',
            'data' => ['locality' => $Locality]
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
            $Locality = Locality::find($id);
            $Locality->delete();

            return response()->json([
                'status' => true,
                'message' => 'Localidad de residencia eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Localidad de residencia esta en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
