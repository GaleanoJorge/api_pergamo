<?php

namespace App\Http\Controllers\Management;

use App\Models\DietWeek;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietWeekRequest;
use Illuminate\Database\QueryException;

class DietWeekController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietWeek = DietWeek::select();

        if($request->_sort){
            $DietWeek->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $DietWeek->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $DietWeek=$DietWeek->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $DietWeek=$DietWeek->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Semanas de dietas obtenidos exitosamente',
            'data' => ['diet_week' => $DietWeek]
        ]);
    }

    public function store(DietWeekRequest $request): JsonResponse
    {
        $DietWeek = new DietWeek;
        $DietWeek->name = $request->name;
        
        $DietWeek->save();

        return response()->json([
            'status' => true,
            'message' => 'Semanas de dietas creados exitosamente',
            'data' => ['diet_week' => $DietWeek->toArray()]
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
        $DietWeek = DietWeek::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Semanas de dietas obtenidos exitosamente',
            'data' => ['diet_week' => $DietWeek]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietWeekRequest $request, int $id): JsonResponse
    {
        $DietWeek = DietWeek::find($id);
        $DietWeek->name = $request->name;
        
        $DietWeek->save();

        return response()->json([
            'status' => true,
            'message' => 'Semanas de dietas actualizados exitosamente',
            'data' => ['diet_week' => $DietWeek]
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
            $DietWeek = DietWeek::find($id);
            $DietWeek->delete();

            return response()->json([
                'status' => true,
                'message' => 'Semanas de dietas eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Semanas de dietas estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
