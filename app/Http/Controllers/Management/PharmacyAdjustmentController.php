<?php

namespace App\Http\Controllers\Management;

use App\Models\PharmacyAdjustment;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PharmacyAdjustmentRequest;
use Illuminate\Database\QueryException;

class PharmacyAdjustmentController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PharmacyAdjustment = PharmacyAdjustment::select();

        if($request->_sort){
            if ($request->_sort != "actions") {

            $PharmacyAdjustment->orderBy($request->_sort, $request->_order);
        }            
    }            

        if ($request->search) {
            $PharmacyAdjustment->where('name','like','%' . $request->search. '%')
            ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $PharmacyAdjustment=$PharmacyAdjustment->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $PharmacyAdjustment=$PharmacyAdjustment->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Ajustes de inventario obtenidos exitosamente',
            'data' => ['pharmacy_adjustment' => $PharmacyAdjustment]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $PharmacyAdjustment = new PharmacyAdjustment;
        $PharmacyAdjustment->name = $request->name;
        $PharmacyAdjustment->save();

        return response()->json([
            'status' => true,
            'message' => 'Ajustes de inventario creado exitosamente',
            'data' => ['pharmacy_adjustment' => $PharmacyAdjustment->toArray()]
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
        $PharmacyAdjustment = PharmacyAdjustment::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ajustes de inventario obtenido exitosamente',
            'data' => ['pharmacy_adjustment' => $PharmacyAdjustment]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PharmacyAdjustmentRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(request $request, int $id): JsonResponse
    {
        $PharmacyAdjustment = PharmacyAdjustment ::find($id);
        $PharmacyAdjustment->name = $request->name;
        $PharmacyAdjustment->save();

        return response()->json([
            'status' => true,
            'message' => 'Ajustes de inventario actualizado exitosamente',
            'data' => ['pharmacy_adjustment' => $PharmacyAdjustment]
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
            $PharmacyAdjustment = PharmacyAdjustment::find($id);
            $PharmacyAdjustment->delete();

            return response()->json([
                'status' => true,
                'message' => 'Ajustes de inventario eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ajustes de inventario esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
