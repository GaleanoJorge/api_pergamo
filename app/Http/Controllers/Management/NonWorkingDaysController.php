<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NonWorkingDaysRequest;
use App\Models\NonWorkingDays;
use Illuminate\Database\QueryException;

class NonWorkingDaysController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $non_working_days = NonWorkingDays::select('non_working_days.*');

        if($request->_sort){
            $non_working_days->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $non_working_days->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $non_working_days=$non_working_days->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $non_working_days=$non_working_days->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Días no habiles asociados exitosamente',
            'data' => ['non_working_days' => $non_working_days]
        ]);
    }
    

    public function store(NonWorkingDaysRequest $request): JsonResponse
    {
        $non_working_days = new NonWorkingDays;
        $non_working_days->day = $request->day; 
        $non_working_days->description = $request->description; 
        $non_working_days->save();

        return response()->json([
            'status' => true,
            'message' => 'Dia no laboral creado exitosamente',
            'data' => ['non_working_days' => $non_working_days->toArray()]
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
        $non_working_days = NonWorkingDays::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Dia no habil obtenido exitosamente',
            'data' => ['non_working_days' => $non_working_days]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(NonWorkingDaysRequest $request, int $id): JsonResponse
    {
        $non_working_days = NonWorkingDays::find($id);
        $non_working_days->day = $request->day;
        $non_working_days->description = $request->description;  
        $non_working_days->save();

        return response()->json([
            'status' => true,
            'message' => 'Dia no laboral actualizado exitosamente',
            'data' => ['non_working_days' => $non_working_days]
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
            $non_working_days = NonWorkingDays::find($id);
            $non_working_days->delete();

            return response()->json([
                'status' => true,
                'message' => 'Dia no habil eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Dia no habil en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
