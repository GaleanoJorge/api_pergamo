<?php

namespace App\Http\Controllers\Management;

use App\Models\RentabilityTc;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RentabilityTcRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class RentabilityTcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $RentabilityTc = RentabilityTc::select();

        if ($request->_sort) {
            $RentabilityTc->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $RentabilityTc->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $RentabilityTc->where('status_id', $request->status_id); 
        }

        if ($request->query("pagination", true) == "false") {
            $RentabilityTc = $RentabilityTc->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $RentabilityTc = $RentabilityTc->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Transacción exitosa',
            'data' => ['rentability_tc' => $RentabilityTc]
        ]);
    }

    public function store(RentabilityTcRequest $request): JsonResponse
    {
        $RentabilityTc = new RentabilityTc;
        $RentabilityTc->cost_center = $request->cost_center;
        $RentabilityTc->cc1 = $request->cc1;
        $RentabilityTc->cc2 = $request->cc2;
        $RentabilityTc->cc3 = $request->cc3;
        $RentabilityTc->cc4 = $request->cc4;
        $RentabilityTc->area1 = $request->area1;
        $RentabilityTc->area2 = $request->area2;
        $RentabilityTc->area3 = $request->area3;
        $RentabilityTc->area4 = $request->area4;
        $RentabilityTc->name_cost_center = $request->name_cost_center;
        $RentabilityTc->bill = $request->bill;
        $RentabilityTc->name_bill = $request->name_bill;
        $RentabilityTc->value = $request->value;
        $RentabilityTc->month = $request->month;
        $RentabilityTc->year = $request->year;

        $RentabilityTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Transacciones creadas exitosamente',
            'data' => ['rentability_tc' => $RentabilityTc->toArray()]
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
        $RentabilityTc = RentabilityTc::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Transacciones obtenidas exitosamente',
            'data' => ['rentability_tc' => $RentabilityTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(RentabilityTcRequest $request, int $id): JsonResponse
    {
        $RentabilityTc = RentabilityTc::find($id);
        $RentabilityTc = new RentabilityTc;
        $RentabilityTc->cost_center = $request->cost_center;
        $RentabilityTc->cc1 = $request->cc1;
        $RentabilityTc->cc2 = $request->cc2;
        $RentabilityTc->cc3 = $request->cc3;
        $RentabilityTc->cc4 = $request->cc4;
        $RentabilityTc->area1 = $request->area1;
        $RentabilityTc->area2 = $request->area2;
        $RentabilityTc->area3 = $request->area3;
        $RentabilityTc->area4 = $request->area4;
        $RentabilityTc->name_cost_center = $request->name_cost_center;
        $RentabilityTc->bill = $request->bill;
        $RentabilityTc->name_bill = $request->name_bill;
        $RentabilityTc->value = $request->value;
        $RentabilityTc->month = $request->month;
        $RentabilityTc->year = $request->year;
        $RentabilityTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Transacciones actualizadas exitosamente',
            'data' => ['rentability_tc' => $RentabilityTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function import(Request $request): JsonResponse
    {
        foreach ($request->toArray() as $key => $item) {

            $RentabilityTc = new RentabilityTc;
            if(isset($item['CentroCosto'])){
                $RentabilityTc->cost_center = $item['CentroCosto'];
            }  
            if(isset($item['CC1'])){
                $RentabilityTc->cc1 = $item['CC1'];
            }  
            if(isset($item['CC2'])){
                $RentabilityTc->cc2 = $item['CC2'];
            }    
            if(isset($item['CC3'])){
                $RentabilityTc->cc3 = $item['CC3'];
            } 
            if(isset($item['CC4'])){
                $RentabilityTc->cc4 = $item['CC4'];
            } 
            if(isset($item['Area1'])){
                $RentabilityTc->area1 = $item['Area1'];
            }     
            if(isset($item['Area2'])){
                $RentabilityTc->area2 = $item['Area2'];
            }     
            if(isset($item['Area3'])){
                $RentabilityTc->area3 = $item['Area3'];
            }            
             if(isset($item['Area4'])){
                $RentabilityTc->area4 = $item['Area4'];
            }    
            if(isset($item['NomCentroCosto'])){
                $RentabilityTc->name_cost_center = $item['NomCentroCosto'];
            } 
            if(isset($item['Cuenta'])){
                $RentabilityTc->bill = $item['Cuenta'];
            } 
            if(isset($item['NomCuenta'])){
                $RentabilityTc->name_bill = $item['NomCuenta'];
            }     
            if(isset($item['Valor'])){
                $RentabilityTc->value = $item['Valor'];
            }     
            if(isset($item['Mes'])){
                $RentabilityTc->month = $item['Mes'];
            }            
             if(isset($item['Año'])){
                $RentabilityTc->year = $item['Año'];
            }        
            $RentabilityTc->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Transacciones actualizadas exitosamente',
            'data' => ['rentability_tc' => $RentabilityTc]
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
            $RentabilityTc = RentabilityTc::find($id);
            $RentabilityTc->delete();

            return response()->json([
                'status' => true,
                'message' => 'Transacciones eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Transacciones en uso, no es posible eliminar'
            ], 423);
        }
    }
}
