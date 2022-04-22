<?php

namespace App\Http\Controllers\Management;

use App\Models\PreBillingPad;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PreBillingPadRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class PreBillingPadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PreBillingPad = PreBillingPad::with('procedure', 'admissions')
            ->with('procedure', 'admissions', 'admissions.patients', 'admissions.contract')
            ->leftJoin('admissions', 'pre_billing_pad.admissions_id', 'admissions.id')
            ->leftJoin('contract', 'admissions.contract_id', 'contract.id')
            ->leftJoin('patients', 'admissions.patients_id', 'patients.id')
            ->leftJoin('procedure', 'pre_billing_pad.procedure_id', 'procedure.id');

        if ($request->_sort) {
            $PreBillingPad->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $PreBillingPad->where('procedure.name', 'like', '%' . $request->search . '%');
        }
        if ($request->procedure_id) {
            $PreBillingPad->where('procedure_id', $request->procedure_id);
        }
        if ($request->admissions_id) {
            $PreBillingPad->where('admissions_id', $request->admissions_id);
        }

        if ($request->query("pagination", true) == "false") {
            $PreBillingPad = $PreBillingPad->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $PreBillingPad = $PreBillingPad->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Prefacturas obtenidas exitosamente',
            'data' => ['pre_billing_pad' => $PreBillingPad]
        ]);
    }

    public function getGroupByAdmission(Request $request): JsonResponse
    {
        $PreBillingPad = PreBillingPad::select('pre_billing_pad.*', DB::raw('count(*) as total'))
            ->with('procedure', 'admissions', 'admissions.patients', 'admissions.contract')
            ->leftJoin('admissions', 'pre_billing_pad.admissions_id', 'admissions.id')
            ->leftJoin('contract', 'admissions.contract_id', 'contract.id')
            ->leftJoin('patients', 'admissions.patients_id', 'patients.id')
            ->leftJoin('procedure', 'pre_billing_pad.procedure_id', 'procedure.id')
            ->groupBy('admissions_id');

        if ($request->_sort) {
            $PreBillingPad->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PreBillingPad->where('patients.firstname', 'like', '%' . $request->search . '%')
                ->orWhere('patients.lastname', 'like', '%' . $request->search . '%')
                ->orWhere('patients.identification', 'like', '%' . $request->search . '%')
                ->orWhere('contract.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $PreBillingPad = $PreBillingPad->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $PreBillingPad = $PreBillingPad->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Prefacturas obtenidas exitosamente',
            'data' => ['pre_billing_pad' => $PreBillingPad]
        ]);
    }

    public function store(PreBillingPadRequest $request): JsonResponse
    {
        $PreBillingPad = new PreBillingPad;
        $PreBillingPad->procedure_id = $request->procedure_id;
        $PreBillingPad->admissions_id = $request->admissions_id;
        $PreBillingPad->save();

        return response()->json([
            'status' => true,
            'message' => 'Prefacturas creadas exitosamente',
            'data' => ['pre_billing_pad' => $PreBillingPad]
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
        $PreBillingPad = PreBillingPad::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Prefacturas obtenidas exitosamente',
            'data' => ['pre_billing_pad' => $PreBillingPad]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PreBillingPadRequest $request, int $id): JsonResponse
    {

        $PreBillingPadDelete = PreBillingPad::where('procedure_id', $id);
        $PreBillingPadDelete->delete();
        $components = json_decode($request->admissions_id);

        foreach ($components as $conponent) {
            $PreBillingPad = new PreBillingPad;
            $PreBillingPad->procedure_id = $id;
            $PreBillingPad->admissions_id = $conponent->admissions_id;

            $PreBillingPad->save();
        }


        return response()->json([
            'status' => true,
            'message' => 'Prefacturas actualizadas exitosamente',
            'data' => ['pre_billing_pad' => $PreBillingPad]
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
            $PreBillingPadDelete = PreBillingPad::where('procedure_id', $id);
            $PreBillingPadDelete->delete();

            return response()->json([
                'status' => true,
                'message' => 'Prefacturas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Prefacturas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
