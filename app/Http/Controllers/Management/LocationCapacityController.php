<?php

namespace App\Http\Controllers\Management;

use App\Models\LocationCapacity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LocationCapacityRequest;
use Illuminate\Database\QueryException;

class LocationCapacityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $LocationCapacity = LocationCapacity::with('residence','installed_capacity');

        if($request->_sort){
            $LocationCapacity->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $LocationCapacity->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $LocationCapacity=$LocationCapacity->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $LocationCapacity=$LocationCapacity->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Localidades obtenidas exitosamente',
            'data' => ['location_capacity' => $LocationCapacity]
        ]);
    }

    

    /* Get campus by portafolio.
    *
    * @param  int  $briefcaseId
    * @return JsonResponse
    */
   public function getByLocality(Request $request, int $assistnceId): JsonResponse
   {
       $LocationCapacity = LocationCapacity::where('assistance_id', $assistnceId);
       if ($request->search) {
           $LocationCapacity->where('name', 'like', '%' . $request->search . '%')
           ->Orwhere('id', 'like', '%' . $request->search . '%');
       }
       if ($request->query("pagination", true) === "false") {
           $LocationCapacity = $LocationCapacity->get()->toArray();
       } else {
           $page = $request->query("current_page", 1);
           $per_page = $request->query("per_page", 10);

           $LocationCapacity = $LocationCapacity->paginate($per_page, '*', 'page', $page);
       }

       return response()->json([
           'status' => true,
           'message' => 'Localidades obtenidas exitosamente',
           'data' => ['location_capacity' => $LocationCapacity]
       ]);
   }
    

    public function store(LocationCapacityRequest $request): JsonResponse
    {
        $LocationCapacity = new LocationCapacity;
        $LocationCapacity->assistance_id = $request->assistance_id;
        $LocationCapacity->location_id = $request->location_id;
        $LocationCapacity->PAD_patient_quantity = $request->PAD_patient_quantity;
        $LocationCapacity->PAD_patient_attended = $request->PAD_patient_attended;
        $LocationCapacity->PAD_patient_actual_capacity = $request->PAD_patient_actual_capacity;
        $LocationCapacity->save();

        return response()->json([
            'status' => true,
            'message' => 'Localidades creada exitosamente',
            'data' => ['location_capacity' => $LocationCapacity->toArray()]
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
        $LocationCapacity = LocationCapacity::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Localidades obtenido exitosamente',
            'data' => ['location_capacity' => $LocationCapacity]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(LocationCapacityRequest $request, int $id): JsonResponse
    {
        $LocationCapacity = LocationCapacity::find($id);
        $LocationCapacity->assistance_id = $request->assistance_id;
        $LocationCapacity->location_id = $request->location_id;
        $LocationCapacity->PAD_patient_quantity = $request->PAD_patient_quantity;
        $LocationCapacity->PAD_patient_attended = $request->PAD_patient_attended;
        $LocationCapacity->PAD_patient_actual_capacity = $request->PAD_patient_actual_capacity;
        $LocationCapacity->save();

        return response()->json([
            'status' => true,
            'message' => 'Localidades actualizado exitosamente',
            'data' => ['location_capacity' => $LocationCapacity]
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
            $LocationCapacity = LocationCapacity::find($id);
            $LocationCapacity->delete();

            return response()->json([
                'status' => true,
                'message' => 'Localidades eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Localidades esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
