<?php

namespace App\Http\Controllers\Management;

use App\Models\DietTherapeutic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietTherapeuticRequest;
use Illuminate\Database\QueryException;

class DietTherapeuticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietTherapeutic = DietTherapeutic::with('diet_consistency');

        if ($request->_sort) {
            $DietTherapeutic->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $DietTherapeutic->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->diet_consistency_id) {
            $DietTherapeutic->where('diet_consistency_id', $request->diet_consistency_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DietTherapeutic = $DietTherapeutic->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietTherapeutic = $DietTherapeutic->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Dietas terapeuticas obtenidas exitosamente',
            'data' => ['diet_therapeutic' => $DietTherapeutic]
        ]);
    }

    public function store(DietTherapeuticRequest $request): JsonResponse
    {
        $DietTherapeutic = new DietTherapeutic;
        $DietTherapeutic->name = $request->name;
        $DietTherapeutic->diet_consistency_id = $request->diet_consistency_id;
       
        $DietTherapeutic->save();
     
        return response()->json([
            'status' => true,
            'message' => 'Dietas terapeuticas creadas exitosamente',
            'data' => ['diet_therapeutic' => $DietTherapeutic->toArray()]
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
        $DietTherapeutic = DietTherapeutic::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Dietas terapeuticas obtenidas exitosamente',
            'data' => ['diet_therapeutic' => $DietTherapeutic]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietTherapeuticRequest $request, int $id): JsonResponse
    {
        $DietTherapeutic = DietTherapeutic::find($id);
        $DietTherapeutic->name = $request->name;
        $DietTherapeutic->diet_consistency_id = $request->diet_consistency_id;

        $DietTherapeutic->save();

        return response()->json([
            'status' => true,
            'message' => 'Dietas terapeuticas actualizadas exitosamente',
            'data' => ['diet_therapeutic' => $DietTherapeutic]
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
            $DietTherapeutic = DietTherapeutic::find($id);
            $DietTherapeutic->delete();

            return response()->json([
                'status' => true,
                'message' => 'Dietas terapeuticas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Dietas terapeuticas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
