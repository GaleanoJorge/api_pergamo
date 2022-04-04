<?php

namespace App\Http\Controllers\Management;

use App\Models\PharmacyStock;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class PharmacyStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PharmacyStock = PharmacyStock::select();

        if ($request->_sort) {
            $PharmacyStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PharmacyStock->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $PharmacyStock = $PharmacyStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PharmacyStock = $PharmacyStock->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Registro en farmacia obtenidos exitosamente',
            'data' => ['pharmacy_stock' => $PharmacyStock]
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byadmission(Request $request, int $id): JsonResponse
    {
        $PharmacyStock = PharmacyStock::where('admissions_id', $id);

        if ($request->_sort) {
            $PharmacyStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PharmacyStock->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $PharmacyStock = $PharmacyStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PharmacyStock = $PharmacyStock->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Registro en farmacia obtenidos exitosamente',
            'data' => ['pharmacy_stock' => $PharmacyStock]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $PharmacyStock = new PharmacyStock;
        $PharmacyStock->pharmacy = $request->pharmacy;
        $PharmacyStock->name = $request->name;
        $PharmacyStock->campus_id = $request->campus_id;
        $PharmacyStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Registro en farmacia asociado al en farmacia exitosamente',
            'data' => ['pharmacy_stock' => $PharmacyStock->toArray()]
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
        $PharmacyStock = PharmacyStock::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Registro en farmacia obtenido exitosamente',
            'data' => ['pharmacy_stock' => $PharmacyStock]
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
        $PharmacyStock = PharmacyStock::find($id);
        $PharmacyStock->pharmacy = $request->pharmacy;
        $PharmacyStock->name = $request->name;
        $PharmacyStock->campus_id = $request->campus_id;
        $PharmacyStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Registro en farmacia actualizado exitosamente',
            'data' => ['pharmacy_stock' => $PharmacyStock]
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
            $PharmacyStock = PharmacyStock::find($id);
            $PharmacyStock->delete();

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
