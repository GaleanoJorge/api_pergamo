<?php

namespace App\Http\Controllers\Management;

use App\Models\ObservationNovelty;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ObservationNoveltyRequest;
use Illuminate\Database\QueryException;

class ObservationNoveltyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    
    {
        $ObservationNovelty = ObservationNovelty::select();

        if($request->_sort){
            $ObservationNovelty->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ObservationNovelty->where('name','like','%' . $request->search. '%');
        }
   
        if($request->query("pagination", true)=="false"){
            $ObservationNovelty=$ObservationNovelty->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ObservationNovelty=$ObservationNovelty->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Observación de novedades asociadas exitosamente',
            'data' => ['observation_novelty' => $ObservationNovelty]
        ]);
    }

    
    public function store(ObservationNoveltyRequest $request)
    
    {
        $ObservationNovelty = new ObservationNovelty;
        
        $ObservationNovelty->name = $request->name; 
     
        $ObservationNovelty->save();

        return response()->json([
            'status' => true,
            'message' => 'Observación de novedades creadas exitosamente',
            'data' => ['observation_novelty' => $ObservationNovelty->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    
    {
        $ObservationNovelty = ObservationNovelty::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Observación de novedades obtenidas exitosamente',
            'data' => ['observation_novelty' => $ObservationNovelty]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ObservationNoveltyRequest $request, int $id): JsonResponse
   
    {
        $ObservationNovelty = ObservationNovelty::find($id);
    
        $ObservationNovelty->name = $request->name; 

        $ObservationNovelty->save();

        return response()->json([
            'status' => true,
            'message' => 'Observación de novedades actualizadas exitosamente',
            'data' => ['observation_novelty' => $ObservationNovelty]
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
            $ObservationNovelty = ObservationNovelty::find($id);
            $ObservationNovelty->delete();

            return response()->json([
                'status' => true,
                'message' => 'Observación de novedades eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Observación de novedades estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
