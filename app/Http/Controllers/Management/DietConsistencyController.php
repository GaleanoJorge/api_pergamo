<?php

namespace App\Http\Controllers\Management;

use App\Models\DietConsistency;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietConsistencyRequest;
use Illuminate\Database\QueryException;

class DietConsistencyController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietConsistency = DietConsistency::select();

        if($request->_sort){
            $DietConsistency->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $DietConsistency->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $DietConsistency=$DietConsistency->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $DietConsistency=$DietConsistency->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Consistencia de dietas obtenidos exitosamente',
            'data' => ['diet_consistency' => $DietConsistency]
        ]);
    }

    public function store(DietConsistencyRequest $request): JsonResponse
    {
        $DietConsistency = new DietConsistency;
        $DietConsistency->name = $request->name;
        
        $DietConsistency->save();

        return response()->json([
            'status' => true,
            'message' => 'Consistencia de dietas creados exitosamente',
            'data' => ['diet_consistency' => $DietConsistency->toArray()]
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
        $DietConsistency = DietConsistency::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Consistencia de dietas obtenidos exitosamente',
            'data' => ['diet_consistency' => $DietConsistency]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietConsistencyRequest $request, int $id): JsonResponse
    {
        $DietConsistency = DietConsistency::find($id);
        $DietConsistency->name = $request->name;
        
        $DietConsistency->save();

        return response()->json([
            'status' => true,
            'message' => 'Consistencia de dietas actualizados exitosamente',
            'data' => ['diet_consistency' => $DietConsistency]
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
            $DietConsistency = DietConsistency::find($id);
            $DietConsistency->delete();

            return response()->json([
                'status' => true,
                'message' => 'Consistencia de dietas eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Consistencia de dietas estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
