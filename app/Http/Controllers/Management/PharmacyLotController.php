<?php

namespace App\Http\Controllers\Management;

use App\Models\PharmacyLot;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class PharmacyLotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PharmacyLot = PharmacyLot::select();

        if ($request->_sort) {
            $PharmacyLot->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PharmacyLot->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $PharmacyLot = $PharmacyLot->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PharmacyLot = $PharmacyLot->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Registro en farmacia obtenidos exitosamente',
            'data' => ['pharmacy_lot' => $PharmacyLot]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $PharmacyLot = new PharmacyLot;
        $PharmacyLot->subtotal = $request->subtotal;
        $PharmacyLot->vat = $request->vat;
        $PharmacyLot->total = $request->total;
        $PharmacyLot->receipt_date = $request->receipt_date;
        $PharmacyLot->pharmacy_stock_id = $request->pharmacy_stock_id;
        $PharmacyLot->date_invoice = $request->date_invoice;
        $PharmacyLot->num_invoice = $request->num_invoice;
        $PharmacyLot->save();

        return response()->json([
            'status' => true,
            'message' => 'Registro en farmacia asociado al en farmacia exitosamente',
            'data' => ['pharmacy_lot' => $PharmacyLot->toArray()]
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
        $PharmacyLot = PharmacyLot::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Registro en farmacia obtenido exitosamente',
            'data' => ['pharmacy_lot' => $PharmacyLot]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $i
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $PharmacyLot = PharmacyLot::find($id);
        $PharmacyLot->subtotal = $request->subtotal;
        $PharmacyLot->vat = $request->vat;
        $PharmacyLot->total = $request->total;
        $PharmacyLot->receipt_date = $request->receipt_date;
        $PharmacyLot->pharmacy_stock_id = $request->pharmacy_stock_id;
        $PharmacyLot->date_invoice = $request->date_invoice;
        $PharmacyLot->num_invoice = $request->num_invoice;
        $PharmacyLot->save();

        return response()->json([
            'status' => true,
            'message' => 'Registro en farmacia actualizado exitosamente',
            'data' => ['pharmacy_lot' => $PharmacyLot]
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
            $PharmacyLot = PharmacyLot::find($id);
            $PharmacyLot->delete();

            return response()->json([
                'status' => true,
                'message' => 'Registro en farmacia eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Registro en farmacia en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
