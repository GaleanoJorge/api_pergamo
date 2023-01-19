<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedClasification;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class FixedClasificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedClasification = FixedClasification::with('fixed_code')->orderBy('name', 'asc');;

        if ($request->_sort) {
            $FixedClasification->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedClasification->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedClasification = $FixedClasification->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedClasification = $FixedClasification->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Clasificación obtenidos exitosamente',
            'data' => ['fixed_clasification' => $FixedClasification]
        ]);
    }


    /**
     * Display a listing of the resource
     *
     * @param integer $fixed_type_id
     * @return JsonResponse
     */
    public function getCategoryByGroup(int $fixed_type_id): JsonResponse
    {
        $FixedClasification = FixedClasification::where('fixed_type_id', $fixed_type_id)->with('fixed_code')
            ->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Categoria del insumo obtenidos exitosamente',
            'data' => ['fixed_clasification' => $FixedClasification]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedClasification = new FixedClasification;
        $FixedClasification->name = $request->name;
        $FixedClasification->fixed_code_id = $request->fixed_code_id;
        $FixedClasification->fixed_type_id = $request->fixed_type_id;
        $FixedClasification->save();

        return response()->json([
            'status' => true,
            'message' => 'Clasificación asociado exitosamente',
            'data' => ['fixed_clasification' => $FixedClasification->toArray()]
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
        $FixedClasification = FixedClasification::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Clasificación obtenido exitosamente',
            'data' => ['fixed_clasification' => $FixedClasification]
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
        $FixedClasification = FixedClasification::find($id);
        $FixedClasification->name = $request->name;
        $FixedClasification->fixed_code_id = $request->fixed_code_id;
        $FixedClasification->fixed_type_id = $request->fixed_type_id;
        $FixedClasification->save();

        return response()->json([
            'status' => true,
            'message' => 'Clasificación actualizado exitosamente',
            'data' => ['fixed_clasification' => $FixedClasification]
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
            $FixedClasification = FixedClasification::find($id);
            $FixedClasification->delete();

            return response()->json([
                'status' => true,
                'message' => 'Clasificación eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Clasificación en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
