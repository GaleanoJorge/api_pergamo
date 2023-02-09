<?php

namespace App\Http\Controllers\Management;

use App\Models\PharmacyProductRequest;
use App\Models\ReportPharmacy;
use DB;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
class ReportPharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ReportPharmacy = ReportPharmacy::select();

        if ($request->_sort) {
            $ReportPharmacy->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ReportPharmacy->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ReportPharmacy = $ReportPharmacy->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ReportPharmacy = $ReportPharmacy->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Reporte Farmacia exitosamente',
            'data' => ['report_pharmacy' => $ReportPharmacy]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ReportPharmacy = new ReportPharmacy;
        $ReportPharmacy->initial_report = $request->initial_report;
        $ReportPharmacy->final_report = $request->final_report;
        $ReportPharmacy->pharmacy_product_request_id = $request->pharmacy_product_request_id;
        $ReportPharmacy->status = $request->status;
        $ReportPharmacy->user_id = $request->user_id;
        $ReportPharmacy->save();

        return response()->json([
            'status' => true,
            'message' => 'Creado Reporte Farmacia exitosamente',
            'data' => ['report_pharmacy' => $ReportPharmacy->toArray()]
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function exportPharmacy(Request $request, int $id): JsonResponse
    {
        $hoja1 = PharmacyProductRequest::select(
            // Encabezados de las tablas
            'pharmacy_product_request.id AS Identificador',
            'pharmacy_product_request.created_at AS Fecha Solicitud',
            'pharmacy_stock.name AS Farmacia', //Nombre de la Farmacia
            DB::raw('CONCAT_WS(" ",users.firstname,users.middlefirstname,users.lastname,users.middlelastname) AS Solicitante'), // Concatena Nombre Completo del tramitador
            'product.id AS Identificador Producto',
            'product_supplies_com.id AS Identificador Insumo Comercial',
            'product_supplies_com.name AS Insumo Comercial',
            'product_generic.id AS Identificador Producto Génerico',
            'product_supplies.id AS Identificador Insumo Génerico',
            'manual_price.name AS Med Génerico',
            'product.name AS Med Comercial',
            'pharmacy_request_shipping.amount',
            'patients.identification',
            DB::raw('CONCAT_WS(" ",patients.firstname,patients.middlefirstname,patients.lastname,patients.middlelastname) AS Paciente'),
            'program.name AS Programa',
            'company.name AS EPS'
        )
            // Consulta de Datos Especificos   
            ->leftJoin('pharmacy_request_shipping','pharmacy_request_shipping.pharmacy_product_request_id','pharmacy_product_request.id')
            ->leftJoin('pharmacy_lot_stock', 'pharmacy_lot_stock.id', 'pharmacy_request_shipping.pharmacy_lot_stock_id')
            ->leftJoin('billing_stock', 'billing_stock.id', 'pharmacy_lot_stock.billing_stock_id')
            ->leftJoin('product', 'product.id', 'billing_stock.product_id')
            ->leftJoin('product_generic', 'product_generic.id', 'product.product_generic_id')
            ->leftJoin('product_supplies_com', 'product_supplies_com.id', 'billing_stock.product_supplies_com_id')
            ->leftJoin('product_supplies', 'product_supplies.id', 'product_supplies_com.product_supplies_id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'pharmacy_product_request.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('admissions', 'admissions.id', 'pharmacy_product_request.admissions_id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('contract', 'contract.id', 'admissions.contract_id')
            ->leftJoin('company', 'company.id', 'contract.company_id')
            ->leftJoin('location', 'location.admissions_id', 'admissions.id')
            ->leftJoin('program', 'program.id', 'location.program_id')
            ->leftJoin('users', 'users.id', 'pharmacy_product_request.user_request_pad_id')
            ->leftJoin('pharmacy_stock', 'pharmacy_stock.id', 'pharmacy_product_request.own_pharmacy_stock_id')
            ->leftJoin('campus', 'campus.id', 'pharmacy_stock.campus_id')
            // Ruta de Consulta
            ->where('pharmacy_product_request.status', [$request->status])
            ->where('pharmacy_product_request.own_pharmacy_stock.id', $id)
            // ->where('own_pharmacy_stock.id', $id)
            ->where('pharmacy_request_shipping.amount' > 0)
            // Entre fechas
            ->whereBetween('pharmacy_product_request.created_at', [$request->initial_report, $request->final_report])
            // Agrupar datos por especificación
            ->groupBy('pharmacy_request_shipping.id')
            ->get()->toArray();
        
        $response = [
            'pharmacy_stock' => $hoja1,
        ];

        return response()->json([
            'status' => true,
            'message' => 'Reporte Farmacia solicitado exitosamente',
            'data' => ['report_pharmacy' => $response]
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
        $ReportPharmacy = ReportPharmacy::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Reporte Farmacia exitosamente',
            'data' => ['report_pharmacy' => $ReportPharmacy]
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
        $ReportPharmacy = ReportPharmacy::find($id);
        $ReportPharmacy->initial_report = $request->initial_report;
        $ReportPharmacy->final_report = $request->final_report;
        $ReportPharmacy->pharmacy_stock_id = $request->pharmacy_stock_id;
        $ReportPharmacy->status = $request->status;
        $ReportPharmacy->user_id = $request->user_id;
        $ReportPharmacy->save();

        return response()->json([
            'status' => true,
            'message' => 'Reporte Farmacia actualizado exitosamente',
            'data' => ['report_pharmacy' => $ReportPharmacy]
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
            $ReportPharmacy = ReportPharmacy::find($id);
            $ReportPharmacy->delete();

            return response()->json([
                'status' => true,
                'message' => 'Reporte Farmacia eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Reporte Farmacia en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
