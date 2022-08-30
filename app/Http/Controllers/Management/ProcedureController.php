<?php

namespace App\Http\Controllers\Management;

use App\Models\Procedure;
use App\Models\ProcedurePackage;
use App\Models\ManualPrice;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProcedureRequest;
use App\Models\ProductGeneric;
use App\Models\ProductSupplies;
use Illuminate\Database\QueryException;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Procedures = Procedure::select('procedure.*');

        if ($request->_sort) {
            $Procedures->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Procedures->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('code', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Procedures = $Procedures->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Procedures = $Procedures->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Procedimientos obtenidos exitosamente',
            'data' => ['procedure' => $Procedures]
        ]);
    }

    /**
     * @param  int  $packageId
     * Get procedure by manual.
     *
     * @return JsonResponse
     */
    public function getByProcedure(Request $request): JsonResponse
    {
        $ProcedurePackage = ProcedurePackage::pluck('procedure_id')->toArray();
        if ($request->procedure) {
            $elementsPackage = Procedure::where('procedure_type_id', '!=', 3)
            ;
            if ($request->search) {
                $elementsPackage->where(function ($query) use ($request) {
                    $query->where('code', 'like', '%' . $request->search . '%')
                        ->Orwhere('name', 'like', '%' . $request->search . '%')
                        ->Orwhere('equivalent', 'like', '%' . $request->search . '%')
                        ->orWhere('id', 'like', '%' . $request->search . '%');
                });
            }
            if ($request->query("pagination", true) === "false") {
                $elementsPackage = $elementsPackage->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $elementsPackage = $elementsPackage->paginate($per_page, '*', 'page', $page);
            }
        } else if ($request->insume) {

            $elementsPackage = ProductSupplies::select('product_supplies.*')
                ->with('size_supplies_measure', 'measure_supplies_measure')
            // ->orderBy('name','asc')
            ;
            if ($request->search) {
                $elementsPackage->where('description', 'like', '%' . $request->search . '%')
                    ->Orwhere('id', 'like', '%' . $request->search . '%');
            }
            if ($request->query("pagination", true) === "false") {
                $elementsPackage = $elementsPackage->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $elementsPackage = $elementsPackage->paginate($per_page, '*', 'page', $page);
            }
        } else if ($request->product) {

            $elementsPackage = ProductGeneric::select('product_generic.*')
                ->with(
                    'administration_route',
                    'drug_concentration',
                    'product_dose',
                )
            // ->orderBy('name','asc')
            ;
            if ($request->search) {
                $elementsPackage->where(function ($query) use ($request) {
                    $query->where('description', 'like', '%' . $request->search . '%')
                        ->orWhere('id', 'like', '%' . $request->search . '%');
                });
            }
            if ($request->query("pagination", true) === "false") {
                $elementsPackage = $elementsPackage->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $elementsPackage = $elementsPackage->paginate($per_page, '*', 'page', $page);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos obtenido exitosamente',
            'data' => ['procedure_package' => $elementsPackage]
        ]);
    }


    /**
     * @param  int  $manualId
     * Get procedure by manual.
     *
     * @return JsonResponse
     */
    public function getByManual(Request $request, int $manualId): JsonResponse
    {
        $ManualPrice = ManualPrice::where('manual_id', '=', $manualId)->pluck('procedure_id')->toArray();
        $Procedure = Procedure::whereNotIn('id', $ManualPrice);
        if ($request->search) {
            $Procedure->where('name', 'like', '%' . $request->search . '%')
                ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $Procedure = $Procedure->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Procedure = $Procedure->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos obtenido exitosamente',
            'data' => ['procedure' => $Procedure]
        ]);
    }



    public function store(ProcedureRequest $request): JsonResponse
    {
        $Procedure = new Procedure;
        $Procedure->code = $request->code;
        $Procedure->equivalent = $request->equivalent;
        $Procedure->name = $request->name;
        $Procedure->procedure_category_id = $request->procedure_category_id;
        $Procedure->pbs_type_id = $request->pbs_type_id;
        $Procedure->procedure_age_id = $request->procedure_age_id;
        $Procedure->gender_id = $request->gender_id;
        $Procedure->status_id = $request->status_id;
        $Procedure->procedure_purpose_id = $request->procedure_purpose_id;
        $Procedure->purpose_service_id = $request->purpose_service_id;
        $Procedure->procedure_type_id = $request->procedure_type_id;
        $Procedure->time = $request->time;

        $Procedure->save();

        return response()->json([
            'status' => true,
            'message' => 'Procedimiento creado exitosamente',
            'data' => ['procedure' => $Procedure->toArray()]
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
        $Procedure = Procedure::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Procedimiento obtenido exitosamente',
            'data' => ['procedure' => $Procedure]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProcedureRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProcedureRequest $request, int $id): JsonResponse
    {
        $Procedure = Procedure::find($id);
        $Procedure->code = $request->code;
        $Procedure->equivalent = $request->equivalent;
        $Procedure->name = $request->name;
        $Procedure->procedure_category_id = $request->procedure_category_id;
        $Procedure->pbs_type_id = $request->pbs_type_id;
        $Procedure->procedure_age_id = $request->procedure_age_id;
        $Procedure->gender_id = $request->gender_id;
        $Procedure->status_id = $request->status_id;
        $Procedure->procedure_purpose_id = $request->procedure_purpose_id;
        $Procedure->purpose_service_id = $request->purpose_service_id;
        $Procedure->procedure_type_id = $request->procedure_type_id;
        $Procedure->time = $request->time;
        $Procedure->save();

        return response()->json([
            'status' => true,
            'message' => 'Procedimiento actualizado exitosamente',
            'data' => ['procedure' => $Procedure]
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
            $Procedure = Procedure::find($id);
            $Procedure->delete();

            return response()->json([
                'status' => true,
                'message' => 'Procedimiento eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Procedimiento esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
