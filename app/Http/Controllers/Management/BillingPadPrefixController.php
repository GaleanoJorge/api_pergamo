<?php

namespace App\Http\Controllers\Management;

use App\Models\BillingPadPrefix;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BillingPadPrefixRequest;
use Illuminate\Database\QueryException;

class BillingPadPrefixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $BillingPadPrefix = BillingPadPrefix::select();

        if ($request->_sort) {
            $BillingPadPrefix->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $BillingPadPrefix->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $BillingPadPrefix = $BillingPadPrefix->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $BillingPadPrefix = $BillingPadPrefix->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Prefijos de facturación obtenidos exitosamente',
            'data' => ['billing_pad_prefix' => $BillingPadPrefix]
        ]);
    }

    public function store(BillingPadPrefixRequest $request): JsonResponse
    {
        $BillingPadPrefix = new BillingPadPrefix;
        $BillingPadPrefix->name = $request->name;

        $BillingPadPrefix->save();

        return response()->json([
            'status' => true,
            'message' => 'Prefijos de facturación creados exitosamente',
            'data' => ['billing_pad_prefix' => $BillingPadPrefix->toArray()]
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
        $BillingPadPrefix = BillingPadPrefix::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Prefijos de facturación obtenidos exitosamente',
            'data' => ['billing_pad_prefix' => $BillingPadPrefix]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BillingPadPrefixRequest $request, int $id): JsonResponse
    {
        $BillingPadPrefix = BillingPadPrefix::find($id);
        $BillingPadPrefix->name = $request->name;

        $BillingPadPrefix->save();

        return response()->json([
            'status' => true,
            'message' => 'Prefijos de facturación actualizados exitosamente',
            'data' => ['billing_pad_prefix' => $BillingPadPrefix]
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
            $BillingPadPrefix = BillingPadPrefix::find($id);
            $BillingPadPrefix->delete();

            return response()->json([
                'status' => true,
                'message' => 'Prefijos de facturación eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Prefijos de facturación estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
