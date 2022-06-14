<?php

namespace App\Http\Controllers\Management;

use App\Models\Ostomy;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OstomyRequest;
use Illuminate\Database\QueryException;

class OstomyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $Ostomy = Ostomy::select();

        if($request->_sort){
            $Ostomy->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Ostomy->where('name','like','%' . $request->search. '%');
        }
   
        if($request->query("pagination", true)=="false"){
            $Ostomy=$Ostomy->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Ostomy=$Ostomy->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Ostomias asociadas exitosamente',
            'data' => ['ostomy' => $Ostomy]
        ]);
    }

    
    public function store(OstomyRequest $request)
    {
        $Ostomy = new Ostomy;
        $Ostomy->name = $request->name; 
        $Ostomy->save();

        return response()->json([
            'status' => true,
            'message' => 'Ostomias creadas exitosamente',
            'data' => ['ostomy' => $Ostomy->toArray()]
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
        $Ostomy = Ostomy::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ostomias obtenidas exitosamente',
            'data' => ['ostomy' => $Ostomy]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(OstomyRequest $request, int $id): JsonResponse
    {
        $Ostomy = Ostomy::find($id);
        $Ostomy->name = $request->name; 
        $Ostomy->save();

        return response()->json([
            'status' => true,
            'message' => 'Ostomias actualizadas exitosamente',
            'data' => ['ostomy' => $Ostomy]
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
            $Ostomy = Ostomy::find($id);
            $Ostomy->delete();

            return response()->json([
                'status' => true,
                'message' => 'Ostomias eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ostomias estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
