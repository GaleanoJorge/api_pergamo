<?php

namespace App\Http\Controllers\Management;

use App\Models\AuthBillingPad;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthBillingPadRequest;
use Illuminate\Database\QueryException;

class AuthBillingPadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $AuthBillingPad = AuthBillingPad::select();

        if ($request->_sort) {
            $AuthBillingPad->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $AuthBillingPad->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $AuthBillingPad = $AuthBillingPad->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $AuthBillingPad = $AuthBillingPad->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['auth_billing_pad' => $AuthBillingPad]
        ]);
    }

    public function store(AuthBillingPadRequest $request): JsonResponse
    {
        $AuthBillingPad = new AuthBillingPad;
        $AuthBillingPad->value = $request->value;
        $AuthBillingPad->billing_pad_id = $request->billing_pad_id;
        $AuthBillingPad->authorization_id = $request->authorization_id;
        $AuthBillingPad->save();

        return response()->json([
            'status' => true,
            'message' => 'facturas creadas exitosamente',
            'data' => ['auth_billing_pad' => $AuthBillingPad]
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
        $AuthBillingPad = AuthBillingPad::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['auth_billing_pad' => $AuthBillingPad]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AuthBillingPadRequest $request, int $id): JsonResponse
    {
        $AuthBillingPad = AuthBillingPad::find($id);
        $AuthBillingPad->value = $request->value;
        $AuthBillingPad->billing_pad_id = $request->billing_pad_id;
        $AuthBillingPad->authorization_id = $request->authorization_id;
        $AuthBillingPad->save();

        return response()->json([
            'status' => true,
            'message' => 'facturas actualizadas exitosamente',
            'data' => ['auth_billing_pad' => $AuthBillingPad]
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
            $AuthBillingPadDelete = AuthBillingPad::where('procedure_id', $id);
            $AuthBillingPadDelete->delete();

            return response()->json([
                'status' => true,
                'message' => 'facturas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'facturas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
