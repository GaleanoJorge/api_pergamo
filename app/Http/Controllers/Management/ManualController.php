<?php

namespace App\Http\Controllers\Management;

use App\Models\Manual;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ManualRequest;
use App\Models\ManualPrice;
use App\Models\ProcedurePackage;
use Illuminate\Database\QueryException;

class ManualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Manual = Manual::select('manual.*')
            ->orderBy('name', 'ASC')
            ->with('status');

        if ($request->_sort) {
            $Manual->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Manual->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('year', 'like', '%' . $request->search . '%')
                ->orWhere('type_manual', 'like', '%' . $request->search . '%');
        }

        if ($request->gloss_modality_id) {
            $Manual->where('status_id', $request->status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $Manual = $Manual->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Manual = $Manual->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Manuales tarifarios obtenidas exitosamente',
            'data' => ['manual' => $Manual]
        ]);
    }


    public function store(ManualRequest $request): JsonResponse
    {
        $Manual = new Manual;
        $Manual->name = $request->name;
        $Manual->year = $request->year;
        $Manual->type_manual = $request->type_manual;
        $Manual->status_id = $request->status_id;
        $Manual->save();

        return response()->json([
            'status' => true,
            'message' => 'Manual tarifario creada exitosamente',
            'data' => ['manual' => $Manual->toArray()]
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
        $Manual = Manual::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Manuales tarifarios obtenidos exitosamente',
            'data' => ['manual' => $Manual]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ManualRequest $request, int $id): JsonResponse
    {
        $Manual = Manual::find($id);
        $Manual->name = $request->name;
        $Manual->year = $request->year;
        $Manual->type_manual = $request->type_manual;
        $Manual->status_id = $request->status_id;
        $Manual->save();

        return response()->json([
            'status' => true,
            'message' => 'Manual tarifario actualizado exitosamente',
            'data' => ['manual' => $Manual]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function clone(ManualRequest $request, int $id): JsonResponse
    {
        $Manual = new Manual;
        $Manual->name = $request->name;
        $Manual->year = $request->year;
        $Manual->type_manual = $request->type_manual;
        $Manual->status_id = $request->status_id;
        $Manual->save();

        $ManualPricePackageBase = ManualPrice::where('manual_id', $id)
            ->get()->toArray();

        foreach ($ManualPricePackageBase as $MPB) {
            $newMP = new ManualPrice;
            $newMP->name = $MPB['name'];
            $newMP->own_code = $MPB['own_code'];
            $newMP->manual_id = $Manual->id;
            $newMP->procedure_id = $MPB['procedure_id'];
            $newMP->product_id = $MPB['product_id'];
            $newMP->patient_id = $MPB['patient_id'];
            $newMP->supplies_id = $MPB['supplies_id'];
            $newMP->manual_procedure_type_id = $MPB['manual_procedure_type_id'];
            $newMP->description = $MPB['description'];
            $newMP->homologous_id = $MPB['homologous_id'];
            $newMP->value = $MPB['value'];
            $newMP->price_type_id = $MPB['price_type_id'];
            $newMP->save();

            if ($MPB['manual_procedure_type_id'] == 3) {
                $ProcedurePackage = ProcedurePackage::where('procedure_package_id', $MPB['id'])
                    ->get()->toArray();
                foreach ($ProcedurePackage as $element) {
                    $newPPG = new ProcedurePackage;
                    $newPPG->value = $element['value'];
                    $newPPG->procedure_package_id = $newMP->id;
                    $newPPG->procedure_id = $element['procedure_id'];
                    $newPPG->product_id = $element['product_id'];
                    $newPPG->supplies_id = $element['supplies_id'];
                    $newPPG->save();
                }
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Manual tarifario clonado exitosamente',
            'data' => ['manual' => $Manual]
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
            $ManualPricesPackagesDelete = ManualPrice::where('manual_id', $id)
                ->where('manual_procedure_type_id', 3)->get()->toArray();
            foreach ($ManualPricesPackagesDelete as $element) {
                $ProcedurePackageDelete = ProcedurePackage::where('procedure_package_id', $element['id']);
                $ProcedurePackageDelete->delete();
            }
            $ManualPricesDelete = ManualPrice::where('manual_id', $id);
            $ManualPricesDelete->delete();
            $Manual = Manual::find($id);
            $Manual->delete();

            return response()->json([
                'status' => true,
                'message' => 'Manual tarifario eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Manual tarifario esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
