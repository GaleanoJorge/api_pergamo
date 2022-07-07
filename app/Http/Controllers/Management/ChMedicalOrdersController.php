<?php

namespace App\Http\Controllers\Management;

use App\Models\ChMedicalOrders;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChMedicalOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChMedicalOrders = ChMedicalOrders::with('procedure','frequency');

        if ($request->_sort) {
            $ChMedicalOrders->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChMedicalOrders->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChMedicalOrders = $ChMedicalOrders->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChMedicalOrders = $ChMedicalOrders->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Ordenes Medicas obtenidos exitosamente',
            'data' => ['ch_medical_orders' => $ChMedicalOrders]
        ]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id,int $type_record_id): JsonResponse
    {
        
       
        $ChMedicalOrders = ChMedicalOrders::where('ch_record_id', $id)->where('type_record_id',$type_record_id)->with('procedure','frequency')
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Ordenes Medicas asociado al paciente exitosamente',
            'data' => ['ch_medical_orders' => $ChMedicalOrders]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChMedicalOrders = new ChMedicalOrders;
        $ChMedicalOrders->ambulatory_medical_order = $request->ambulatory_medical_order;
        $ChMedicalOrders->procedure_id = $request->procedure_id;
        $ChMedicalOrders->amount = $request->amount;
        $ChMedicalOrders->frequency_id = $request->frequency_id;
        $ChMedicalOrders->observations = $request->observations;
        $ChMedicalOrders->type_record_id = $request->type_record_id;
        $ChMedicalOrders->ch_record_id = $request->ch_record_id;
        $ChMedicalOrders->save();

        return response()->json([
            'status' => true,
            'message' => 'Ordenes Medicas asociado al paciente exitosamente',
            'data' => ['ch_medical_orders' => $ChMedicalOrders->toArray()]
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
        $ChMedicalOrders = ChMedicalOrders::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ordenes Medicas obtenido exitosamente',
            'data' => ['ch_medical_orders' => $ChMedicalOrders]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $ChMedicalOrders = ChMedicalOrders::find($id);
        $ChMedicalOrders->ambulatory_medical_order = $request->ambulatory_medical_order;
        $ChMedicalOrders->procedure_id = $request->procedure_id;
        $ChMedicalOrders->amount = $request->amount;
        $ChMedicalOrders->frequency_id = $request->frequency_id;
        $ChMedicalOrders->observations = $request->observations;
        $ChMedicalOrders->type_record_id = $request->type_record_id;
        $ChMedicalOrders->ch_record_id = $request->ch_record_id;
        $ChMedicalOrders->save();

        return response()->json([
            'status' => true,
            'message' => 'Ordenes Medicas actualizado exitosamente',
            'data' => ['ch_medical_orders' => $ChMedicalOrders]
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
            $ChMedicalOrders = ChMedicalOrders::find($id);
            $ChMedicalOrders->delete();

            return response()->json([
                'status' => true,
                'message' => 'Ordenes Medicas eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ordenes Medicas en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
