<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSuppliesTherapy;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChSuppliesTherapyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSuppliesTherapy = ChSuppliesTherapy::select();

        if ($request->_sort) {
            $ChSuppliesTherapy->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSuppliesTherapy->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSuppliesTherapy = $ChSuppliesTherapy->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSuppliesTherapy = $ChSuppliesTherapy->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Solicitud de insumos obtenidos exitosamente',
            'data' => ['ch_supplies_therapy' => $ChSuppliesTherapy]
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
        $ChSuppliesTherapy = ChSuppliesTherapy::where('ch_record_id', $id)->where('type_record_id',$type_record_id)->with('product')
        ->get()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'Solicitud de insumo obtenido exitosamente',
            'data' => ['ch_supplies_therapy' => $ChSuppliesTherapy]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        if($request->ch_supplies_therapy_class_id==1){
        $validate=ChSuppliesTherapy::where('ch_record_id', $request->ch_record_id)->where('product_id',$request->product_id)->first();
        }else{
            $validate=null;
        }
        if(!$validate){
        $ChSuppliesTherapy = new ChSuppliesTherapy;
        $ChSuppliesTherapy->product_id = $request->product_id;
        $ChSuppliesTherapy->amount = $request->amount;
        $ChSuppliesTherapy->justification = $request->justification;
        $ChSuppliesTherapy->type_record_id = $request->type_record_id;
        $ChSuppliesTherapy->ch_record_id = $request->ch_record_id;
        $ChSuppliesTherapy->save();

        return response()->json([
            'status' => true,
            'message' => 'Solicitud de insumo asociado al paciente exitosamente',
            'data' => ['ch_supplies_therapy' => $ChSuppliesTherapy->toArray()]
        ]);
    }else{
        return response()->json([
            'status' => false,
            'message' => 'Ya tiene un solicitud de insumo principal asociado'
        ], 423);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChSuppliesTherapy = ChSuppliesTherapy::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Solicitud de insumo obtenido exitosamente',
            'data' => ['ch_supplies_therapy' => $ChSuppliesTherapy]
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
        $ChSuppliesTherapy = ChSuppliesTherapy::find($id);
        $ChSuppliesTherapy->product_id = $request->product_id;
        $ChSuppliesTherapy->amount = $request->amount;
        $ChSuppliesTherapy->justification = $request->justification;
        $ChSuppliesTherapy->type_record_id = $request->type_record_id;
        $ChSuppliesTherapy->ch_record_id = $request->ch_record_id;
        $ChSuppliesTherapy->save();

        return response()->json([
            'status' => true,
            'message' => 'Solicitud de insumo actualizado exitosamente',
            'data' => ['ch_supplies_therapy' => $ChSuppliesTherapy]
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
            $ChSuppliesTherapy = ChSuppliesTherapy::find($id);
            $ChSuppliesTherapy->delete();

            return response()->json([
                'status' => true,
                'message' => 'Solicitud de insumo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Solicitud de insumo en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
