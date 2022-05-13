<?php

namespace App\Http\Controllers\Management;

use App\Models\RadicationTc;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RadicationTcRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class RadicationTcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $RadicationTc = RadicationTc::select();

        if ($request->_sort) {
            $RadicationTc->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $RadicationTc->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $RadicationTc->where('status_id', $request->status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $RadicationTc = $RadicationTc->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $RadicationTc = $RadicationTc->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Radicación de facturas obtenidos exitosamente',
            'data' => ['radication_tc' => $RadicationTc]
        ]);
    }

    public function store(RadicationTcRequest $request): JsonResponse
    {
        $RadicationTc = new RadicationTc;
        $RadicationTc->invoice = $request->invoice;
        $RadicationTc->invoice_date = $request->invoice_date;
        $RadicationTc->entity = $request->entity;
        $RadicationTc->filing_date = $request->filing_date;
        $RadicationTc->status = $request->status;
        $RadicationTc->total_eps = $request->total_eps;
        $RadicationTc->ambit = $request->ambit;
        $RadicationTc->campus = $request->campus;
        $RadicationTc->filing_period = $request->filing_period;

        $RadicationTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Radicación de facturas creados exitosamente',
            'data' => ['radication_tc' => $RadicationTc->toArray()]
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
        $RadicationTc = RadicationTc::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Radicación de facturas obtenidos exitosamente',
            'data' => ['radication_tc' => $RadicationTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(RadicationTcRequest $request, int $id): JsonResponse
    {
        $RadicationTc = RadicationTc::find($id);
        $RadicationTc->invoice = $request->invoice;
        $RadicationTc->invoice_date = $request->invoice_date;
        $RadicationTc->entity = $request->entity;
        $RadicationTc->filing_date = $request->filing_date;
        $RadicationTc->status = $request->status;
        $RadicationTc->total_eps = $request->total_eps;
        $RadicationTc->ambit = $request->ambit;
        $RadicationTc->campus = $request->campus;
        $RadicationTc->filing_period = $request->filing_period;

        $RadicationTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Radicación de facturas actualizados exitosamente',
            'data' => ['radication_tc' => $RadicationTc]
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

            $RadicationTc = new RadicationTc;
            if(isset($item['FACTURA'])){
                $RadicationTc->invoice = $item['FACTURA'];
            }  
            if(isset($item['FECHA FACTURA'])){
                $RadicationTc->invoice_date =  Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($item['FECHA FACTURA']));
            }  
            if(isset($item['ENTIDAD'])){
                $RadicationTc->entity = $item['ENTIDAD'];
            }    
            if(isset($item['FECHA RADICADO'])){
                $RadicationTc->filing_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($item['FECHA RADICADO']));
            } 
            if(isset($item['ESTADO'])){
                $RadicationTc->status = $item['ESTADO'];
            } 
            if(isset($item['TOTAL EPS'])){
                $RadicationTc->total_eps = $item['TOTAL EPS'];
            }     
            if(isset($item['AMBITO'])){
                $RadicationTc->ambit = $item['AMBITO'];
            }     
            if(isset($item['SEDE'])){
                $RadicationTc->campus = $item['SEDE'];
            }            
             if(isset($item['PERIODO RADICADO'])){
                $RadicationTc->filing_period = $item['PERIODO RADICADO'];
            }           
            $RadicationTc->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Radicación de facturas actualizados exitosamente',
            'data' => ['radication_tc' => $RadicationTc]
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
            $RadicationTc = RadicationTc::find($id);
            $RadicationTc->delete();

            return response()->json([
                'status' => true,
                'message' => 'Radicación de facturas eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Radicación de facturas estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
