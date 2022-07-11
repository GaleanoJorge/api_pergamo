<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedAccessories;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class FixedAccessoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedAccessories = FixedAccessories::with('campus');

        if ($request->_sort) {
            $FixedAccessories->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedAccessories->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedAccessories = $FixedAccessories->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedAccessories = $FixedAccessories->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Accesorios de act. fijos obtenidos exitosamente',
            'data' => ['fixed_accessories' => $FixedAccessories]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedAccessories = new FixedAccessories;
        $FixedAccessories->name = $request->name;
        $FixedAccessories->amount = $request->amount;
        $FixedAccessories->actual_amount = $request->amount;
        $FixedAccessories->campus_id = $request->campus_id;
        $FixedAccessories->fixed_type_role_id = $request->fixed_type_role_id;
        $FixedAccessories->save();

        return response()->json([
            'status' => true,
            'message' => 'Accesorios de act. fijos asociado exitosamente',
            'data' => ['fixed_accessories' => $FixedAccessories->toArray()]
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
        $FixedAccessories = FixedAccessories::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Accesorios de act. fijos obtenido exitosamente',
            'data' => ['fixed_accessories' => $FixedAccessories]
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
        $FixedAccessories = FixedAccessories::find($id);
        $FixedAccessories->name = $request->name;
        $FixedAccessories->amount = $request->amount;
        $FixedAccessories->actual_amount = $request->amount;
        $FixedAccessories->campus_id = $request->campus_id;
        $FixedAccessories->fixed_type_role_id = $request->fixed_type_role_id;
        $FixedAccessories->save();

        return response()->json([
            'status' => true,
            'message' => 'Accesorios de act. fijos actualizado exitosamente',
            'data' => ['fixed_accessories' => $FixedAccessories]
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
            $FixedAccessories = FixedAccessories::find($id);
            $FixedAccessories->delete();

            return response()->json([
                'status' => true,
                'message' => 'Accesorios de act. fijos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Accesorios de act. fijos en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
