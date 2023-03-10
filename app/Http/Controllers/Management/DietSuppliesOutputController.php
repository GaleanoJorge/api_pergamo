<?php

namespace App\Http\Controllers\Management;

use App\Models\DietSuppliesOutput;
use App\Models\DietSuppliesOutputMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietSuppliesOutputRequest;
use Illuminate\Database\QueryException;

class DietSuppliesOutputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietSuppliesOutput = DietSuppliesOutput::with('campus');

        if ($request->_sort) {
            $DietSuppliesOutput->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $DietSuppliesOutput->where('date', 'like', '%' . $request->search . '%');
        }

        if ($request->campus_id) {
            $DietSuppliesOutput->where('campus_id', $request->campus_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DietSuppliesOutput = $DietSuppliesOutput->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietSuppliesOutput = $DietSuppliesOutput->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Dietas terapeuticas obtenidas exitosamente',
            'data' => ['diet_supplies_output' => $DietSuppliesOutput]
        ]);
    }

    public function store(DietSuppliesOutputRequest $request): JsonResponse
    {
        $DietSuppliesOutput = new DietSuppliesOutput;
        $DietSuppliesOutput->campus_id = $request->campus_id;
       
        $DietSuppliesOutput->save();
     
        return response()->json([
            'status' => true,
            'message' => 'Dietas terapeuticas creadas exitosamente',
            'data' => ['diet_supplies_output' => $DietSuppliesOutput->toArray()]
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
        $DietSuppliesOutput = DietSuppliesOutput::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Dietas terapeuticas obtenidas exitosamente',
            'data' => ['diet_supplies_output' => $DietSuppliesOutput]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietSuppliesOutputRequest $request, int $id): JsonResponse
    {
        $DietSuppliesOutput = DietSuppliesOutput::find($id);
        $DietSuppliesOutput->campus_id = $request->campus_id;

        $DietSuppliesOutput->save();

        return response()->json([
            'status' => true,
            'message' => 'Dietas terapeuticas actualizadas exitosamente',
            'data' => ['diet_supplies_output' => $DietSuppliesOutput]
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
            $DietSuppliesOutputMenuDeleteArray = DietSuppliesOutputMenu::where('diet_supplies_output_id', $id)->get()->toArray();
            foreach ($DietSuppliesOutputMenuDeleteArray as $element) {
                $DietSuppliesOutputMenuDelete = DietSuppliesOutputMenu::where('id', $element['id']);
                $DietSuppliesOutputMenuDelete->delete();
            }
            
            $DietSuppliesOutput = DietSuppliesOutput::find($id);
            $DietSuppliesOutput->delete();

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
