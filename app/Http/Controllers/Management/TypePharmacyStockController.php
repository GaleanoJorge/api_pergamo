<?php

namespace App\Http\Controllers\Management;

use App\Models\TypePharmacyStock;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TypePharmacyStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $TypePharmacyStock = TypePharmacyStock::select();

        if ($request->_sort) {
            $TypePharmacyStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $TypePharmacyStock->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $TypePharmacyStock = $TypePharmacyStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $TypePharmacyStock = $TypePharmacyStock->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipo de soporte obtenidos exitosamente',
            'data' => ['type_pharmacy_stock' => $TypePharmacyStock]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $TypePharmacyStock = new TypePharmacyStock;
        $TypePharmacyStock->name = $request->name;


        $TypePharmacyStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de soporte asociado al paciente exitosamente',
            'data' => ['type_pharmacy_stock' => $TypePharmacyStock->toArray()]
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
        $TypePharmacyStock = TypePharmacyStock::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de soporte obtenido exitosamente',
            'data' => ['type_pharmacy_stock' => $TypePharmacyStock]
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
        $TypePharmacyStock = TypePharmacyStock::find($id);
        $TypePharmacyStock->name = $request->name; 
        $TypePharmacyStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de soporte actualizado exitosamente',
            'data' => ['type_pharmacy_stock' => $TypePharmacyStock]
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
            $TypePharmacyStock = TypePharmacyStock::find($id);
            $TypePharmacyStock->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de soporte eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de soporte en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
