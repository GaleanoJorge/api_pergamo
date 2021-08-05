<?php

namespace App\Http\Controllers\Management;

use App\Models\Contract;
use App\Models\ContractState;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContractRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $contracts = Contract::select(
            'contract.id','contract.code','contract.contract_value',
            \DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo'),
            \DB::raw('COUNT( DISTINCT event.id) AS n_events'),
            \DB::raw('COUNT( DISTINCT contract_payments.id) AS n_payments'),
            \DB::raw('SUM(contract_payments.value_payment) AS value_payments')
        )
        ->Join('users', 'users.id', 'contract.user_id')
        ->leftJoin('event','event.contract_id','contract.id')
        ->leftJoin('contract_payments', 'contract.id', 'contract_payments.contract_id')
        ->groupBy('contract.id');

        if ($request->_sort) {
            $contracts->orderBy($request->_sort, $request->_order);
        }

        if ($request->contract_state_id) {
            $contracts->where('contract.contract_state_id', $request->contract_state_id);
        }

        if ($request->search) {
            $contracts->where('contract.code','like','%' . $request->search. '%')
                    ->orWhere('users.firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.lastname', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $contracts = $contracts->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $contracts = $contracts->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Contratos obtenidos exitosamente',
            'data' => ['contracts' => $contracts]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContractRequest $request
     * @return JsonResponse
     */
    public function store(ContractRequest $request): JsonResponse
    {
        $contract = new Contract;
        $contract->code = $request->code;
        $contract->date_ini = $request->date_ini;
        $contract->date_fin = $request->date_fin;
        $contract->user_id = $request->user_id;
        $contract->allocation_resource = $request->allocation_resource;
        $contract->contract_value = $request->contract_value;
        $contract->object = $request->object;
        $contract->observations = $request->observations;
        $contract->contract_state_id = $request->contract_state_id;
        $contract->save();

        return response()->json([
            'status' => true,
            'message' => 'Contrato creado exitosamente',
            'data' => ['contract' => $contract->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $contract = Contract::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Contrato obtenido exitosamente',
            'data' => ['contract' => $contract]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(ContractRequest $request, int $id): JsonResponse
    {
        $contract = Contract::find($id);
        $contract->code = $request->code;
        $contract->date_ini = $request->date_ini;
        $contract->date_fin = $request->date_fin;
        $contract->user_id = $request->user_id;
        $contract->allocation_resource = $request->allocation_resource;
        $contract->contract_value = $request->contract_value;
        $contract->object = $request->object;
        $contract->observations = $request->observations;
        $contract->contract_state_id = $request->contract_state_id;
        $contract->save();

        return response()->json([
            'status' => true,
            'message' => 'Contrato actualizado exitosamente',
            'data' => ['contract' => $contract]
        ]);
    }
    public function updateEvents(Request $request, int $id): JsonResponse
    {
        $events = (array) $request->events;
        Event::where('contract_id', $id)->update(['contract_id' => null]);
        Event::whereIn('id', $events)->update(['contract_id' => $id]);

        return response()->json([
            'status' => true,
            'message' => 'Eventos actualizados exitosamente'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $contract = Contract::find($id);
            $contract->delete();

            return response()->json([
                'status' => true,
                'message' => 'Contrato eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El Contrato está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }

    public function getEvents(Request $request,int $id): JsonResponse
    {
        $events=Event::select('event.id',
            \DB::raw('CONCAT_WS(" ","COD:",event.id,event.name,municipality.name) AS label'),
        )->leftJoin('municipality','event.municipality_id','municipality.id')
            ->where('contract_id',$id);

        return response()->json([
            'status' => true,
            'message' => 'Eventos del contrato obtenidos exitosamente',
            'data' => [
                'events' => $events->get()->toArray()
            ]
        ]);
    }

    public function getAuxiliaryData(Request $request): JsonResponse
    {
        //$validities = Validity::get();
        $states = ContractState::get();

        return response()->json([
            'status' => true,
            'message' => 'Auxiliares obtenidas exitosamente',
            'data' => [
                'states' => $states->toArray(),
                //'validities' => $validities->toArray(),
            ]
        ]);
    }
}
