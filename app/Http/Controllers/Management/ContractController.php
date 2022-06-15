<?php

namespace App\Http\Controllers\Management;

use App\Models\Contract;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContractRequest;
use Illuminate\Database\QueryException;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Contract = Contract::with('contract_status');

        if ($request->_sort) {
            $Contract->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Contract->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->id) {
            $Contract->where('id', $request->id);
        }

        if ($request->query("pagination", true) == "false") {
            $Contract = $Contract->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Contract = $Contract->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Contratos de la compañía obtenidas exitosamente',
            'data' => ['contract' => $Contract]
        ]);
    }


    public function store(ContractRequest $request): JsonResponse
    {
        $Contract = new Contract;
        $Contract->number_contract = $request->number_contract;
        $Contract->name = $request->name;
        $Contract->company_id = $request->company_id;
        $Contract->type_contract_id = $request->type_contract_id;
        $Contract->occasional = $request->occasional;
        $Contract->amount = $request->amount;
        $Contract->start_date = $request->start_date;
        $Contract->finish_date = $request->finish_date;
        $Contract->contract_status_id = $request->contract_status_id;
        $Contract->regime_id = $request->regime_id;
        $Contract->firms_contractor_id = $request->firms_contractor_id;
        $Contract->firms_contracting_id = $request->firms_contracting_id;
        $Contract->start_date_invoice = $request->start_date_invoice;
        $Contract->finish_date_invoice = $request->finish_date_invoice;
        $Contract->expiration_days_portafolio = $request->expiration_days_portafolio;
        $Contract->discount = $request->discount;
        $Contract->observations = $request->observations;
        $Contract->objective = $request->objective;
        $Contract->save();

        return response()->json([
            'status' => true,
            'message' => 'Contratos de la compañía creada exitosamente',
            'data' => ['contract' => $Contract->toArray()]
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
        $Contract = Contract::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Contratos de la compañía obtenido exitosamente',
            'data' => ['contract' => $Contract]
        ]);
    }
    /**
     * Brings contracts by company
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function byCompany(int $id)
    {
        $Contract = Contract::where('company_id', $id)->get()->toArray();
            
        return response()->json([
            'status' => true,
            'message' => 'Contratos de la compañía obtenido exitosamente',
            'data' => ['contract' => $Contract]
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ContractRequest $request, int $id): JsonResponse
    {
        $Contract = Contract::find($id);
        $Contract->number_contract = $request->number_contract;
        $Contract->name = $request->name;
        $Contract->company_id = $request->company_id;
        $Contract->type_contract_id = $request->type_contract_id;
        $Contract->occasional = $request->occasional;
        $Contract->amount = $request->amount;
        $Contract->start_date = $request->start_date;
        $Contract->finish_date = $request->finish_date;
        $Contract->regime_id = $request->regime_id;
        $Contract->contract_status_id = $request->contract_status_id;
        $Contract->firms_contractor_id = $request->firms_contractor_id;
        $Contract->firms_contracting_id = $request->firms_contracting_id;
        $Contract->start_date_invoice = $request->start_date_invoice;
        $Contract->finish_date_invoice = $request->finish_date_invoice;
        $Contract->expiration_days_portafolio = $request->expiration_days_portafolio;
        $Contract->discount = $request->discount;
        $Contract->observations = $request->observations;
        $Contract->objective = $request->objective;
        $Contract->save();

        return response()->json([
            'status' => true,
            'message' => 'Contratos de la compañía actualizado exitosamente',
            'data' => ['contract' => $Contract]
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
            $Contract = Contract::find($id);
            $Contract->delete();

            return response()->json([
                'status' => true,
                'message' => 'Contratos de la compañía eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Contratos de la compañía esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
