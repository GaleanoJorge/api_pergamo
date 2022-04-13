<?php

namespace App\Http\Controllers\Management;

use App\Models\PermissionPharmacyStock;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class PermissionPharmacyStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PermissionPharmacyStock = PermissionPharmacyStock::select();

        if ($request->_sort) {
            $PermissionPharmacyStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PermissionPharmacyStock->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $PermissionPharmacyStock = $PermissionPharmacyStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PermissionPharmacyStock = $PermissionPharmacyStock->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Permiso en farmacia obtenidos exitosamente',
            'data' => ['permission_pharmacy_stock' => $PermissionPharmacyStock]
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byadmission(Request $request, int $id): JsonResponse
    {
        $PermissionPharmacyStock = PermissionPharmacyStock::where('admissions_id', $id);

        if ($request->_sort) {
            $PermissionPharmacyStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PermissionPharmacyStock->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $PermissionPharmacyStock = $PermissionPharmacyStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PermissionPharmacyStock = $PermissionPharmacyStock->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Permiso en farmacia obtenidos exitosamente',
            'data' => ['permission_pharmacy_stock' => $PermissionPharmacyStock]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $PermissionPharmacyStock = new PermissionPharmacyStock;
        $PermissionPharmacyStock->pharmacy_stock_id = $request->pharmacy_stock_id;
        $PermissionPharmacyStock->permission_id = $request->permission_id;
        $PermissionPharmacyStock->user_id = $request->user_id;
        $PermissionPharmacyStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Permiso en farmacia asociado al en farmacia exitosamente',
            'data' => ['permission_pharmacy_stock' => $PermissionPharmacyStock->toArray()]
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
        $PermissionPharmacyStock = PermissionPharmacyStock::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Permiso en farmacia obtenido exitosamente',
            'data' => ['permission_pharmacy_stock' => $PermissionPharmacyStock]
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
        $PermissionPharmacyStock = PermissionPharmacyStock::find($id);
        $PermissionPharmacyStock->pharmacy_stock_id = $request->pharmacy_stock_id;
        $PermissionPharmacyStock->permission_id = $request->permission_id;
        $PermissionPharmacyStock->user_id = $request->user_id;



        $PermissionPharmacyStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Permiso en farmacia actualizado exitosamente',
            'data' => ['permission_pharmacy_stock' => $PermissionPharmacyStock]
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
            $PermissionPharmacyStock = PermissionPharmacyStock::find($id);
            $PermissionPharmacyStock->delete();

            return response()->json([
                'status' => true,
                'message' => 'Permiso en farmacia eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Permiso en farmacia en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
