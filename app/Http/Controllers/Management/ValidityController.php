<?php

namespace App\Http\Controllers\Management;

use App\Models\Validity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidityRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;



class ValidityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $validity = Validity::select('*');

        if ($request->_sort) {
            $validity->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $validity->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $validity = $validity->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $validity = $validity->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Vigencias obtenidas exitosamente',
            'data' => ['validitys' => $validity],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ValidityRequest $request
     * @return JsonResponse
     */
    public function store(ValidityRequest $request): JsonResponse
    {
        $validity = new Validity;
        $validity->name = $request->name;
        $validity->description = $request->description;
        $validity->save();

        return response()->json([
            'status' => true,
            'message' => 'Vigencia creada exitosamente',
            'data' => ['validity' => $validity->toArray()]
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
        $validity = Validity::where('id', $id)
            ->get()
            ->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Vigencia obtenida exitosamente',
            'data' => ['validity' => $validity]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ValidityRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ValidityRequest $request, int $id): JsonResponse
    {
        $validity = Validity::find($id);
        $validity->name = $request->name;
        $validity->description = $request->description;
        $validity->save();

        return response()->json([
            'status' => true,
            'message' => 'Vigencia actualizada exitosamente',
            'data' => ['validity' => $validity]
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
            $validity = Validity::find($id);
            $validity->delete();

            return response()->json([
                'status' => true,
                'message' => 'Vigencia eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La vigencia esta en uso, no es posible eliminar'
            ], 423);
        }
    }
}
