<?php

namespace App\Http\Controllers\Management;

use App\Models\Tariff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TariffRequest;
use Illuminate\Database\QueryException;

class TariffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Tariff = Tariff::with('pad_risk', 'specialty', 'scope_of_attention');

        if ($request->_sort) {
            $Tariff->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Tariff->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->pad_risk_id) {
            $Tariff->where('pad_risk_id', $request->pad_risk_id);
        }
        if ($request->specialty_id) {
            $Tariff->where('specialty_id', $request->specialty_id);
        }
        if ($request->scope_of_attention_id) {
            $Tariff->where('scope_of_attention_id', $request->scope_of_attention_id);
        }

        if ($request->query("pagination", true) == "false") {
            $Tariff = $Tariff->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $Tariff = $Tariff->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tarifas obtenidas exitosamente',
            'data' => ['tariff' => $Tariff]
        ]);
    }

    public function store(TariffRequest $request): JsonResponse
    {
        $TariffTest = Tariff::where('pad_risk_id', $request->pad_risk_id)
            ->where('specialty_id', $request->specialty_id)
            ->where('scope_of_attention_id', $request->scope_of_attention_id)
            ->first();
        if ($TariffTest) {
            return response()->json([
                'status' => false,
                'message' => 'Tarifa ya existe',
                'data' => ['tariff' => []]
            ]);
        }
        $Tariff = new Tariff;
        $Tariff->name = $request->name;
        $Tariff->amount = $request->amount;
        $Tariff->specialty_id = $request->specialty_id;
        $Tariff->pad_risk_id = $request->pad_risk_id;
        $Tariff->scope_of_attention_id = $request->scope_of_attention_id;
       
        $Tariff->save();
     
        return response()->json([
            'status' => true,
            'message' => 'Tarifas creadas exitosamente',
            'data' => ['tariff' => $Tariff->toArray()]
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
        $Tariff = Tariff::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tarifas obtenidas exitosamente',
            'data' => ['tariff' => $Tariff]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(TariffRequest $request, int $id): JsonResponse
    {
        $Tariff = Tariff::find($id);
        $Tariff->name = $request->name;
        $Tariff->amount = $request->amount;
        $Tariff->specialty_id = $request->specialty_id;
        $Tariff->pad_risk_id = $request->pad_risk_id;
        $Tariff->scope_of_attention_id = $request->scope_of_attention_id;

        $Tariff->save();

        return response()->json([
            'status' => true,
            'message' => 'Tarifas actualizadas exitosamente',
            'data' => ['tariff' => $Tariff]
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
            $Tariff = Tariff::find($id);
            $Tariff->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tarifas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tarifas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
