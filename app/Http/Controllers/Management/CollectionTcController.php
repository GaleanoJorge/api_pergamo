<?php

namespace App\Http\Controllers\Management;

use App\Models\CollectionTc;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CollectionTcRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Mockery\Undefined;

class CollectionTcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $CollectionTc = CollectionTc::select();

        if ($request->_sort) {
            $CollectionTc->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $CollectionTc->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $CollectionTc->where('status_id', $request->status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $CollectionTc = $CollectionTc->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $CollectionTc = $CollectionTc->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Recaudo general obtenido exitosamente',
            'data' => ['collection_tc' => $CollectionTc]
        ]);
    }

    public function store(CollectionTcRequest $request): JsonResponse
    {
        $CollectionTc = new CollectionTc;
        $CollectionTc->transaction_date = $request->transaction_date;
        $CollectionTc->period = $request->period;
        $CollectionTc->nit = $request->nit;
        $CollectionTc->entity = $request->entity;
        $CollectionTc->bank_value = $request->bank_value;

        $CollectionTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Recaudo general creado exitosamente',
            'data' => ['collection_tc' => $CollectionTc->toArray()]
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
        $CollectionTc = CollectionTc::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Recaudo general obtenido exitosamente',
            'data' => ['collection_tc' => $CollectionTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CollectionTcRequest $request, int $id): JsonResponse
    {
        $CollectionTc = CollectionTc::find($id);
        $CollectionTc->transaction_date = $request->transaction_date;
        $CollectionTc->period = $request->period;
        $CollectionTc->nit = $request->nit;
        $CollectionTc->entity = $request->entity;
        $CollectionTc->bank_value = $request->bank_value;

        $CollectionTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Recaudo general actualizado exitosamente',
            'data' => ['collection_tc' => $CollectionTc]
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

            $CollectionTc = new CollectionTc;
            if(isset($item['FECHA DE TRANSACCIÓN'])){
                $CollectionTc->transaction_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($item['FECHA DE TRANSACCIÓN']));
            } 
             if(isset($item['PERIODO'])){
                $CollectionTc->period = $item['PERIODO'];
            } 
            if(isset($item['NIT'])){
                $CollectionTc->nit = $item['NIT'];
            } 
            if(isset($item['ENTIDAD'])){
                $CollectionTc->entity = $item['ENTIDAD'];
            } 
            if(isset($item['VR. BANCOS'])){
                $CollectionTc->bank_value = $item['VR. BANCOS'];
            } 
            $CollectionTc->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Recaudo general actualizado exitosamente',
            'data' => ['collection_tc' => $CollectionTc]
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
            $CollectionTc = CollectionTc::find($id);
            $CollectionTc->delete();

            return response()->json([
                'status' => true,
                'message' => 'Recaudo general eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Recaudo general estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
