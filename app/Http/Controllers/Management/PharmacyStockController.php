<?php

namespace App\Http\Controllers\Management;

use App\Models\PharmacyStock;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\PharmacyStockRequest;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PharmacyStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PharmacyStock = PharmacyStock::select('pharmacy_stock.*')->with(
            'campus',
            'type_pharmacy_stock',
            'user_pharmacy_stock.user',
            'services_pharmacy_stock.scope_of_attention',
        );

        if($request->type==1){
            $PharmacyStock->where('type_pharmacy_stock_id',1);
        }else if($request->type==2){
            $PharmacyStock->where('type_pharmacy_stock_id',2);
        }

        if ($request->_sort) {
            $PharmacyStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PharmacyStock->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->not_pharmacy) {
            $PharmacyStock->where('id', '!=', $request->not_pharmacy);
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
            'message' => 'Tipo de establecimiento obtenidos exitosamente',
            'data' => ['pharmacy_stock' => $PharmacyStock]
        ]);
    }

    public function store(PharmacyStockRequest $request): JsonResponse
    {
        $PharmacyStock = new PharmacyStock;
        $PharmacyStock->name = $request->name;
        $PharmacyStock->type_pharmacy_stock_id = $request->type_pharmacy_stock_id;
        $PharmacyStock->campus_id = $request->campus_id;
        $PharmacyStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de establecimiento asociado al en farmacia exitosamente',
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
            'message' => 'Tipo de establecimiento obtenido exitosamente',
            'data' => ['pharmacy_stock' => $PharmacyStock]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PharmacyStockRequest  $request

     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PharmacyStockRequest $request, int $id): JsonResponse
    {
        $PharmacyStock = PharmacyStock::find($id);
        $PharmacyStock->name = $request->name;
        $PharmacyStock->type_pharmacy_stock_id = $request->type_pharmacy_stock_id;
        $PharmacyStock->campus_id = $request->campus_id;
        $PharmacyStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de establecimiento actualizado exitosamente',
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
                'message' => 'Tipo de establecimiento eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de establecimiento en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
