<?php

namespace App\Http\Controllers\Management;

use App\Models\UsersFixedStock;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class UsersFixedStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $UsersFixedStock = UsersFixedStock::select();

        if ($request->_sort) {
            $UsersFixedStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $UsersFixedStock->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $UsersFixedStock = $UsersFixedStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $UsersFixedStock = $UsersFixedStock->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipo obtenidos exitosamente',
            'data' => ['users_fixed_stock' => $UsersFixedStock]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $users = json_decode($request->users);
        foreach ($users as $user) {
            $UsersFixedStock = new UsersFixedStock;
            $UsersFixedStock->fixed_stock_id = $request->fixed_stock_id;
            $UsersFixedStock->user_id = $user;
            $UsersFixedStock->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Tipo asociado exitosamente',
            'data' => ['users_fixed_stock' => $UsersFixedStock->toArray()]
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
        $UsersFixedStock = UsersFixedStock::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo obtenido exitosamente',
            'data' => ['users_fixed_stock' => $UsersFixedStock]
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
        $UsersFixedStock = UsersFixedStock::find($id);
        $UsersFixedStock->fixed_stock_id = $request->fixed_stock_id;
        $UsersFixedStock->user_id = $request->user_id;
        $UsersFixedStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo actualizado exitosamente',
            'data' => ['users_fixed_stock' => $UsersFixedStock]
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
            $UsersFixedStock = UsersFixedStock::find($id);
            $UsersFixedStock->delete();

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