<?php

namespace App\Http\Controllers\Management;

use App\Models\PharmacyUpdateMaxMin;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class PharmacyUpdateMaxMinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PharmacyUpdateMaxMin = PharmacyUpdateMaxMin::with('pharmacy_stock', 'PharmacyLotStock');

        if ($request->_sort) {
            $PharmacyUpdateMaxMin->orderBy($request->_sort, $request->_order);
        }
        if ($request->pharmacy_stock_id) {
            $PharmacyUpdateMaxMin->where('pharmacy_stock_id', $request->pharmacy_stock_id);
        }

        if ($request->search) {
            $PharmacyUpdateMaxMin->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $PharmacyUpdateMaxMin = $PharmacyUpdateMaxMin->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PharmacyUpdateMaxMin = $PharmacyUpdateMaxMin->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Stock maximo y minimo obtenidos exitosamente',
            'data' => ['pharmacy_update_max_min' => $PharmacyUpdateMaxMin]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $PharmacyUpdateMaxMin = new PharmacyUpdateMaxMin;
        $PharmacyUpdateMaxMin->pharmacy_lot_stock_id = $request->pharmacy_lot_stock_id;
        $PharmacyUpdateMaxMin->own_pharmacy_stock_id = $request->own_pharmacy_stock_id;
        $PharmacyUpdateMaxMin->request_pharmacy_stock_id = $request->request_pharmacy_stock_id;
        $PharmacyUpdateMaxMin->save();

        return response()->json([
            'status' => true,
            'message' => 'Stock maximo y minimo exitosamente',
            'data' => ['pharmacy_update_max_min' => $PharmacyUpdateMaxMin->toArray()]
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
        $PharmacyUpdateMaxMin = PharmacyUpdateMaxMin::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Stock maximo y minimo obtenido exitosamente',
            'data' => ['pharmacy_update_max_min' => $PharmacyUpdateMaxMin]
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
        $PharmacyUpdateMaxMin = PharmacyUpdateMaxMin::find($id);
        $PharmacyUpdateMaxMin->pharmacy_lot_stock_id = $request->pharmacy_lot_stock_id;
        $PharmacyUpdateMaxMin->own_pharmacy_stock_id = $request->own_pharmacy_stock_id;
        $PharmacyUpdateMaxMin->request_pharmacy_stock_id = $request->request_pharmacy_stock_id;
        $PharmacyUpdateMaxMin->save();

        return response()->json([
            'status' => true,
            'message' => 'Stock maximo y minimo actualizado exitosamente',
            'data' => ['pharmacy_update_max_min' => $PharmacyUpdateMaxMin]
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
            $PharmacyUpdateMaxMin = PharmacyUpdateMaxMin::find($id);
            $PharmacyUpdateMaxMin->delete();

            return response()->json([
                'status' => true,
                'message' => 'Stock maximo y minimo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Stock maximo y minimo en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
