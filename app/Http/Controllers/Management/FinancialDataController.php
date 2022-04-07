<?php

namespace App\Http\Controllers\Management;

use App\Models\FinancialData;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FinancialDataRequest;
use Illuminate\Database\QueryException;

class FinancialDataController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $FinancialData = FinancialData::with('bank_information_id');
        

        if($request->_sort){
            $FinancialData->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) { 
            $FinancialData->where('name','like','%' . $request->search. '%');

        }

        
        if($request->query("pagination", true)=="false"){
            $FinancialData=$FinancialData->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $FinancialData=$FinancialData->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Datos Financieros  asociados exitosamente',
            'data' => ['financial_data' => $FinancialData]
        ]);
    }
    

    public function store(FinancialDataRequest $request): JsonResponse
    {
        $FinancialData = new FinancialData;
        $FinancialData->user_id = $request->user_id;
        $FinancialData->bank_id = $request->bank_id;
        $FinancialData->rut = $request->rut;
        $FinancialData->account_type_id = $request->account_type_id;
        $FinancialData->account_number = $request->account_number;
       
        
        $FinancialData->save();

        return response()->json([
            'status' => true,
            'message' => 'Datos Financieros creados exitosamente',
            'data' => ['financial_data' => $FinancialData->toArray()]
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
        $FinancialData = FinancialData::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Datos Financieros obtenidos exitosamente',
            'data' => ['financial_data' => $FinancialData]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(FinancialDataRequest $request, int $id): JsonResponse
    {
        $FinancialData = FinancialData::find($id);
        $FinancialData->user_id = $request->user_id;
        $FinancialData->bank_id = $request->bank_id;
        $FinancialData->rut = $request->rut;
        $FinancialData->account_type_id = $request->account_type_id;
        $FinancialData->account_number = $request->account_number;
        $FinancialData->save();

        return response()->json([
            'status' => true,
            'message' => 'Datos Financieros actualizados exitosamente',
            'data' => ['financial_data' => $FinancialData]
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
            $FinancialData = FinancialData::find($id);
            $FinancialData->delete();

            return response()->json([
                'status' => true,
                'message' => 'Datos Financieros eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Datos Financieros esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
