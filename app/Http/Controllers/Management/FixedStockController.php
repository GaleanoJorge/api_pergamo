<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedStock;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use App\Models\UsersFixedStock;
use Illuminate\Database\QueryException;

class FixedStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedStock = FixedStock::with('campus', 'fixed_type');

        if ($request->_sort) {
            $FixedStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedStock->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedStock = $FixedStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedStock = $FixedStock->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipo obtenidos exitosamente',
            'data' => ['fixed_stock' => $FixedStock]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedStock = new FixedStock;
        $FixedStock->fixed_type_id = $request->fixed_type_id;
        $FixedStock->campus_id = $request->campus_id;
        $FixedStock->save();

        foreach ($request->user_id as $user) {
            $UsersFixedStock = new UsersFixedStock;
            $UsersFixedStock->user_id = $user;
            $UsersFixedStock->fixed_stock_id = $FixedStock->id;
            $UsersFixedStock->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Tipo asociado exitosamente',
            'data' => ['fixed_stock' => $FixedStock->toArray()]
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
        $FixedStock = FixedStock::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo obtenido exitosamente',
            'data' => ['fixed_stock' => $FixedStock]
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
        $FixedStock = FixedStock::find($id);
        $FixedStock->fixed_type_id = $request->fixed_type_id;
        $FixedStock->campus_id = $request->campus_id;
        $FixedStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo actualizado exitosamente',
            'data' => ['fixed_stock' => $FixedStock]
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
            $FixedStock = FixedStock::find($id);
            $FixedStock->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
