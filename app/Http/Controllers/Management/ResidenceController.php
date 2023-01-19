<?php

namespace App\Http\Controllers\Management;

use App\Models\Residence;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ResidenceRequest;
use Illuminate\Database\QueryException;

class ResidenceController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $residence = residence::select();

        if($request->_sort){
            $residence->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $residence->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $residence=$residence->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $residence=$residence->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Residencias zonales asociadas exitosamente',
            'data' => ['residence' => $residence]
        ]);
    }
    

    public function store(ResidenceRequest $request): JsonResponse
    {
        $residence = new Residence;
        $residence->name = $request->name; 
        $residence->save();

        return response()->json([
            'status' => true,
            'message' => 'Residencia zonal creada exitosamente',
            'data' => ['residence' => $residence->toArray()]
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
        $residence = Residence::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Residencias zonales obtenidas exitosamente',
            'data' => ['residence' => $residence]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(residenceRequest $request, int $id): JsonResponse
    {
        $residence = Residence::find($id);
        $residence->name = $request->name; 
        $residence->save();

        return response()->json([
            'status' => true,
            'message' => 'Residencias zonales actualizadas exitosamente',
            'data' => ['residence' => $residence]
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
            $residence = residence::find($id);
            $residence->delete();

            return response()->json([
                'status' => true,
                'message' => 'Residencias zonal eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Residencia zonal en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
