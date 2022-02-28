<?php

namespace App\Http\Controllers\Management;

use App\Models\DietSuppliesInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietSuppliesInputRequest;
use Illuminate\Database\QueryException;

class DietSuppliesInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietSuppliesInput = DietSuppliesInput::with('diet_supplies','diet_supplies.measurement_units' ,'company', 'campus');

        if ($request->_sort) {
            $DietSuppliesInput->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $DietSuppliesInput->where('amount', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%');
        }
        if ($request->company_id) {
            $DietSuppliesInput->where('company_id', $request->company_id);
        }
        if ($request->campus_id) {
            $DietSuppliesInput->where('campus_id', $request->campus_id);
        }
        if ($request->diet_supplies_id) {
            $DietSuppliesInput->where('diet_supplies_id', $request->diet_supplies_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DietSuppliesInput = $DietSuppliesInput->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietSuppliesInput = $DietSuppliesInput->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Inventarios de dietas obtenidas exitosamente',
            'data' => ['diet_supplies_input' => $DietSuppliesInput]
        ]);
    }

    public function store(DietSuppliesInputRequest $request): JsonResponse
    {
        $DietSuppliesInput = new DietSuppliesInput;
        $DietSuppliesInput->amount = $request->amount;
        $DietSuppliesInput->price = $request->price;
        $DietSuppliesInput->company_id = $request->company_id;
        $DietSuppliesInput->diet_supplies_id = $request->diet_supplies_id;
        $DietSuppliesInput->campus_id = $request->campus_id;
        $DietSuppliesInput->invoice_number = $request->invoice_number;

        $DietSuppliesInput->save();

        return response()->json([
            'status' => true,
            'message' => 'Inventarios de dietas creadas exitosamente',
            'data' => ['diet_supplies_input' => $DietSuppliesInput->toArray()]
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
        $DietSuppliesInput = DietSuppliesInput::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Inventarios de dietas obtenidas exitosamente',
            'data' => ['diet_supplies_input' => $DietSuppliesInput]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietSuppliesInputRequest $request, int $id): JsonResponse
    {
        $DietSuppliesInput = new DietSuppliesInput;
        $DietSuppliesInput->amount = $request->amount;
        $DietSuppliesInput->price = $request->price;
        $DietSuppliesInput->company_id = $request->company_id;
        $DietSuppliesInput->diet_supplies_id = $request->diet_supplies_id;
        $DietSuppliesInput->campus_id = $request->campus_id;
        $DietSuppliesInput->invoice_number = $request->invoice_number;

        $DietSuppliesInput->save();

        return response()->json([
            'status' => true,
            'message' => 'Inventarios de dietas actualizadas exitosamente',
            'data' => ['diet_supplies_input' => $DietSuppliesInput]
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
            $DietSuppliesInput = DietSuppliesInput::find($id);
            $DietSuppliesInput->delete();

            return response()->json([
                'status' => true,
                'message' => 'Inventarios de dietas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Inventarios de dietas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
