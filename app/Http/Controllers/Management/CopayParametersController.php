<?php

namespace App\Http\Controllers\Management;

use App\Models\CopayParameters;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CopayParametersRequest;
use App\Models\Contract;
use Illuminate\Database\QueryException;

class CopayParametersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $CopayParameters = CopayParameters::select('copay_parameters.*')
        ->leftJoin('type_contract', 'copay_parameters.type_contract_id', 'type_contract.id')
        ->with(
            'type_contract',
            'status'
        );

        if($request->contract_id){
            $contract = Contract::find($request->contract_id);
            $CopayParameters->where('type_contract_id', $contract->type_contract_id);
        }

        if($request->status_id){
            $CopayParameters->where('status_id', $request->status_id);
        }

        if ($request->_sort) {
            $CopayParameters->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $CopayParameters->Where(function ($query) use ($request) {
                $query->Where('category', 'like', '%' . $request->search . '%')
                ->orWhere('value', 'like', '%' . $request->search . '%')
                ->orWhere('type_contract.name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $CopayParameters = $CopayParameters->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $CopayParameters = $CopayParameters->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Parametros de copago asociados exitosamente',
            'data' => ['copay_parameters' => $CopayParameters]
        ]);
    }


    public function store(CopayParametersRequest $request): JsonResponse
    {
        $CopayParameters = new CopayParameters;
        $CopayParameters->type_contract_id = $request->type_contract_id;
        $CopayParameters->category = $request->category;
        $CopayParameters->value = $request->value;
        $CopayParameters->status_id = $request->status_id;
        $CopayParameters->save();

        return response()->json([
            'status' => true,
            'message' => 'Parametro de copago creado exitosamente',
            'data' => ['copay_parameters' => $CopayParameters->toArray()]
        ]);
    }

    
    public function changeStatus(Request $request, int $id): JsonResponse
    {
        $CopayParameters = CopayParameters::find($id);
        $CopayParameters->status_id = $request->status_id;
        $CopayParameters->save();


        return response()->json([
            'status' => true,
            'message' => 'Estado actualizado exitosamente',
            'data' => ['copay_parameters' => $CopayParameters]
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
        $CopayParameters = CopayParameters::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Parametro de copago obtenidos exitosamente',
            'data' => ['copay_parameters' => $CopayParameters]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CopayParametersRequest $request, int $id): JsonResponse
    {
        $CopayParameters = CopayParameters::find($id);
        $CopayParameters->type_contract_id = $request->type_contract_id;
        $CopayParameters->category = $request->category;
        $CopayParameters->value = $request->value;
        $CopayParameters->save();

        return response()->json([
            'status' => true,
            'message' => 'Parametro de copago actualizado exitosamente',
            'data' => ['copay_parameters' => $CopayParameters]
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
            $CopayParameters = CopayParameters::find($id);
            $CopayParameters->delete();

            return response()->json([
                'status' => true,
                'message' => 'Parametro de copago eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Parametro de copago en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
