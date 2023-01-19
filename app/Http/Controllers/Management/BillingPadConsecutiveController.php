<?php

namespace App\Http\Controllers\Management;

use App\Models\BillingPadConsecutive;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BillingPadConsecutiveRequest;
use Illuminate\Database\QueryException;

class BillingPadConsecutiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $BillingPadConsecutive = BillingPadConsecutive::select('billing_pad_consecutive.*')
            ->with('status', 'billing_pad_prefix')
            ->leftJoin('status', 'status.id', 'billing_pad_consecutive.status_id')
            ->leftJoin('billing_pad_prefix', 'billing_pad_prefix.id', 'billing_pad_consecutive.billing_pad_prefix_id')
            ->groupBy('billing_pad_consecutive.id')
            ;

        if ($request->_sort) {
            $BillingPadConsecutive->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $BillingPadConsecutive->where(function ($query) use ($request) {
                $query->where('billing_pad_consecutive.expiracy_date', 'like', '%' . $request->search . '%')
                    ->orWhere('billing_pad_consecutive.resolution', 'like', '%' . $request->search . '%')
                    ->orWhere('status.name', 'like', '%' . $request->search . '%')
                    ->orWhere('billing_pad_prefix.name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->resolution) {
            $BillingPadConsecutive->where('billing_pad_consecutive.resolution', $request->resolution);
        }

        if ($request->initial_consecutive) {
            $BillingPadConsecutive->where('billing_pad_consecutive.initial_consecutive', $request->initial_consecutive);
        }

        if ($request->final_consecutive) {
            $BillingPadConsecutive->where('billing_pad_consecutive.final_consecutive', $request->final_consecutive);
        }

        if ($request->actual_consecutive) {
            $BillingPadConsecutive->where('billing_pad_consecutive.actual_consecutive', $request->actual_consecutive);
        }

        if ($request->expiracy_date) {
            $BillingPadConsecutive->where('billing_pad_consecutive.expiracy_date', $request->expiracy_date);
        }

        if ($request->status_id) {
            $BillingPadConsecutive->where('billing_pad_consecutive.status_id', $request->status_id);
        }

        if ($request->billing_pad_prefix_id) {
            $BillingPadConsecutive->where('billing_pad_consecutive.billing_pad_prefix_id', $request->billing_pad_prefix_id);
        }

        if ($request->query("pagination", true) == "false") {
            $BillingPadConsecutive = $BillingPadConsecutive->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $BillingPadConsecutive = $BillingPadConsecutive->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Consecutivos de facturación obtenidos exitosamente',
            'data' => ['billing_pad_consecutive' => $BillingPadConsecutive]
        ]);
    }

    public function store(BillingPadConsecutiveRequest $request): JsonResponse
    {
        $validate = BillingPadConsecutive::where('billing_pad_prefix_id', $request->billing_pad_prefix_id)
            ->where('status_id', 1)
            ->get()->first();

        if ($validate) {
            return response()->json([
                'status' => false,
                'message' => 'Ya existe una resolución activa para este prefijo de facturación',
                'data' => ['billing_pad_consecutive' => []]
            ]);
        }

        $BillingPadConsecutive = new BillingPadConsecutive;
        $BillingPadConsecutive->resolution = $request->resolution;
        $BillingPadConsecutive->initial_consecutive = $request->initial_consecutive;
        $BillingPadConsecutive->final_consecutive = $request->final_consecutive;
        $BillingPadConsecutive->actual_consecutive = 0;
        $BillingPadConsecutive->expiracy_date = $request->expiracy_date;
        $BillingPadConsecutive->status_id = $request->status_id;
        $BillingPadConsecutive->billing_pad_prefix_id = $request->billing_pad_prefix_id;

        $BillingPadConsecutive->save();

        return response()->json([
            'status' => true,
            'message' => 'Consecutivos de facturación creados exitosamente',
            'data' => ['billing_pad_consecutive' => $BillingPadConsecutive->toArray()]
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
        $BillingPadConsecutive = BillingPadConsecutive::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Consecutivos de facturación obtenidos exitosamente',
            'data' => ['billing_pad_consecutive' => $BillingPadConsecutive]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BillingPadConsecutiveRequest $request, int $id): JsonResponse
    {
        $BillingPadConsecutive = BillingPadConsecutive::find($id);
        $BillingPadConsecutive->resolution = $request->resolution;
        $BillingPadConsecutive->initial_consecutive = $request->initial_consecutive;
        $BillingPadConsecutive->final_consecutive = $request->final_consecutive;
        $BillingPadConsecutive->expiracy_date = $request->expiracy_date;
        $BillingPadConsecutive->status_id = $request->status_id;
        $BillingPadConsecutive->billing_pad_prefix_id = $request->billing_pad_prefix_id;

        $BillingPadConsecutive->save();

        return response()->json([
            'status' => true,
            'message' => 'Consecutivos de facturación actualizados exitosamente',
            'data' => ['billing_pad_consecutive' => $BillingPadConsecutive]
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
            $BillingPadConsecutive = BillingPadConsecutive::find($id);
            $BillingPadConsecutive->delete();

            return response()->json([
                'status' => true,
                'message' => 'Consecutivos de facturación eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Consecutivos de facturación estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
