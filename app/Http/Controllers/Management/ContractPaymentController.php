<?php

namespace App\Http\Controllers\Management;

use App\Models\ContractPayment;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContractPaymentRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ContractPaymentController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $contract_payments = ContractPayment::select('*');

        if ($request->_sort) {
            $contract_payments->orderBy($request->_sort, $request->_order);
        }

        if ($request->contract_id) {
            $contract_payments->where('contract_payments.contract_id', $request->contract_id);
        }

        if ($request->search) {
            $contract_payments->where('contract_payments.code','like','%' . $request->search. '%')
                    ->orWhere('contract_payments.code_technical_concept', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $contract_payments = $contract_payments->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $contract_payments = $contract_payments->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Pagos obtenidos exitosamente',
            'data' => ['contract_payments' => $contract_payments]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContractPaymentRequest $request
     * @return JsonResponse
     */
    public function store(ContractPaymentRequest $request): JsonResponse
    {
        $contract_payment = new ContractPayment;
        $contract_payment->code = $request->code;
        $contract_payment->date_code = $request->date_code;
        $contract_payment->date_technical_concept = $request->date_technical_concept;
        $contract_payment->code_technical_concept = $request->code_technical_concept;
        $contract_payment->value_payment = $request->value_payment;
        $contract_payment->contract_id = $request->contract_id;
        $contract_payment->save();
        

        return response()->json([
            'status' => true,
            'message' => 'Pago creado exitosamente',
            'data' => ['contract_payment' => $contract_payment->toArray()]
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
        $contract_payment = ContractPayment::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Pago obtenido exitosamente',
            'data' => ['contract_payment' => $contract_payment]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(ContractPaymentRequest $request, int $id): JsonResponse
    {
        $contract_payment = ContractPayment::find($id);
        $contract_payment->code = $request->code;
        $contract_payment->date_code = $request->date_code;
        $contract_payment->date_technical_concept = $request->date_technical_concept;
        $contract_payment->code_technical_concept = $request->code_technical_concept;
        $contract_payment->value_payment = $request->value_payment;
        $contract_payment->contract_id = $request->contract_id;
        $contract_payment->save();

        return response()->json([
            'status' => true,
            'message' => 'Pago actualizado exitosamente',
            'data' => ['contract_payment' => $contract_payment]
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
            $contract_payment = ContractPayment::find($id);
            $contract_payment->delete();

            return response()->json([
                'status' => true,
                'message' => 'Pago eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El Pago está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
