<?php

namespace App\Http\Controllers\Management;

use App\Models\InstalledCapacity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InstalledCapacityRequest;
use Illuminate\Database\QueryException;

class InstalledCapacityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $InstalledCapacity = InstalledCapacity::select();

        if($request->_sort){
            $InstalledCapacity->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $InstalledCapacity->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $InstalledCapacity=$InstalledCapacity->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $InstalledCapacity=$InstalledCapacity->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Capacidad instalada obtenidas exitosamente',
            'data' => ['installed_capacity' => $InstalledCapacity]
        ]);
    }
    

    public function store(InstalledCapacityRequest $request): JsonResponse
    {
        $InstalledCapacity = new InstalledCapacity;
        $InstalledCapacity->user_id = $request->user_id;
        $InstalledCapacity->start_date = $request->start_date;
        $InstalledCapacity->finish_date = $request->finish_date;
        $InstalledCapacity->PAD_patient_quantity = $request->PAD_patient_quantity;
        $InstalledCapacity->save();

        return response()->json([
            'status' => true,
            'message' => 'Capacidad instalada creada exitosamente',
            'data' => ['installed_capacity' => $InstalledCapacity->toArray()]
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
        $InstalledCapacity = InstalledCapacity::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Capacidad instalada obtenido exitosamente',
            'data' => ['installed_capacity' => $InstalledCapacity]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(InstalledCapacityRequest $request, int $id): JsonResponse
    {
        $InstalledCapacity = InstalledCapacity::find($id);
        $InstalledCapacity->user_id = $request->user_id;
        $InstalledCapacity->start_date = $request->start_date;
        $InstalledCapacity->finish_date = $request->finish_date;
        $InstalledCapacity->PAD_patient_quantity = $request->PAD_patient_quantity;

        $InstalledCapacity->save();

        return response()->json([
            'status' => true,
            'message' => 'Capacidad instalada actualizado exitosamente',
            'data' => ['installed_capacity' => $InstalledCapacity]
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
            $InstalledCapacity = InstalledCapacity::find($id);
            $InstalledCapacity->delete();

            return response()->json([
                'status' => true,
                'message' => 'Capacidad instalada eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Capacidad instalada esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
