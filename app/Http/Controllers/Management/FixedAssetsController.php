<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedAssets;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FixedAssetsRequest;
use Illuminate\Database\QueryException;

class FixedAssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedAssets = FixedAssets::with('fixed_clasification', 'fixed_clasification.fixed_code', 'fixed_property');

        if ($request->_sort) {
            $FixedAssets->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $FixedAssets->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedAssets = $FixedAssets->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedAssets = $FixedAssets->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Activos Fijos obtenidos exitosamente',
            'data' => ['fixed_assets' => $FixedAssets]
        ]);
    }


    public function store(FixedAssetsRequest $request): JsonResponse
    {
        $FixedAssets = new FixedAssets;
        $FixedAssets->fixed_clasification_id = $request->fixed_clasification_id;
        $FixedAssets->fixed_type_role_id = $request->fixed_type_role_id;
        $FixedAssets->fixed_property_id = $request->fixed_property_id;
        $FixedAssets->obs_property = $request->obs_property;
        $FixedAssets->plaque = $request->plaque;
        $FixedAssets->company_id = $request->company_id;
        $FixedAssets->name = $request->name;
        $FixedAssets->amount = $request->amount;
        $FixedAssets->model = $request->model;
        $FixedAssets->mark = $request->mark;
        $FixedAssets->serial = $request->serial;
        $FixedAssets->description = $request->description;
        $FixedAssets->detail_description = $request->detail_description;
        $FixedAssets->color = $request->color;
        $FixedAssets->fixed_condition_id = $request->fixed_condition_id;
        $FixedAssets->save();

        return response()->json([
            'status' => true,
            'message' => 'Activos Fijos creado exitosamente',
            'data' => ['fixed_assets' => $FixedAssets->toArray()]
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
        $FixedAssets = FixedAssets::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Activos Fijos obtenido exitosamente',
            'data' => ['fixed_assets' => $FixedAssets]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FixedAssetsRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(FixedAssetsRequest $request, int $id): JsonResponse
    {
        $FixedAssets = FixedAssets::find($id);
        $FixedAssets->fixed_clasification_id = $request->fixed_clasification_id;
        $FixedAssets->fixed_type_role_id = $request->fixed_type_role_id;
        $FixedAssets->fixed_property_id = $request->fixed_property_id;
        $FixedAssets->obs_property = $request->obs_property;
        $FixedAssets->plaque = $request->plaque;
        $FixedAssets->name = $request->name;
        $FixedAssets->amount = $request->amount;
        $FixedAssets->company_id = $request->company_id;
        $FixedAssets->model = $request->model;
        $FixedAssets->mark = $request->mark;
        $FixedAssets->serial = $request->serial;
        $FixedAssets->description = $request->description;
        $FixedAssets->detail_description = $request->detail_description;
        $FixedAssets->color = $request->color;
        $FixedAssets->fixed_condition_id = $request->fixed_condition_id;
        $FixedAssets->save();

        return response()->json([
            'status' => true,
            'message' => 'Activos Fijos actualizado exitosamente',
            'data' => ['fixed_assets' => $FixedAssets]
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
            $FixedAssets = FixedAssets::find($id);
            $FixedAssets->delete();

            return response()->json([
                'status' => true,
                'message' => 'Activos Fijos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Activos Fijos esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
