<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedLoan;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use App\Models\Base\FixedStockAccessories;
use Illuminate\Database\QueryException;

class FixedLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedLoan = FixedLoan::select();

        if ($request->_sort) {
            $FixedLoan->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedLoan->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedLoan = $FixedLoan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedLoan = $FixedLoan->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Envio de activo obtenidos exitosamente',
            'data' => ['fixed_loan' => $FixedLoan]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedLoan = new FixedLoan;
        $FixedLoan->amount = $request->amount;
        $FixedLoan->amount_damaged = $request->amount_damaged;
        $FixedLoan->amount_provition = $request->amount_provition;
        $FixedLoan->fixed_request_id = $request->fixed_request_id;
        $FixedLoan->responsible_user_id = $request->responsible_user_id;
        $FixedLoan->observation = $request->observation;
        $FixedLoan->save();

        return response()->json([
            'status' => true,
            'message' => 'Envio de activo asociado exitosamente',
            'data' => ['fixed_loan' => $FixedLoan->toArray()]
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
        $FixedLoan = FixedLoan::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Envio de activo obtenido exitosamente',
            'data' => ['fixed_loan' => $FixedLoan]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $FixedLoan = FixedLoan::find($id);
        $FixedLoan->amount = $request->amount;
        $FixedLoan->amount_damaged = $request->amount_damaged;
        $FixedLoan->amount_provition = $request->amount_provition;
        $FixedLoan->fixed_request_id = $request->fixed_request_id;
        $FixedLoan->responsible_user_id = $request->responsible_user_id;
        $FixedLoan->observation = $request->observation;
        $FixedLoan->save();

        return response()->json([
            'status' => true,
            'message' => 'Envio de activo actualizado exitosamente',
            'data' => ['fixed_loan' => $FixedLoan]
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
            $FixedLoan = FixedLoan::find($id);
            $FixedLoan->delete();

            return response()->json([
                'status' => true,
                'message' => 'Envio de activo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Envio de activo en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
