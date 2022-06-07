<?php

namespace App\Http\Controllers\Management;

use App\Models\BillingPadLog;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BillingPadLogRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class BillingPadLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $BillingPadLog = BillingPadLog::select();

        if ($request->_sort) {
            $BillingPadLog->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $BillingPadLog->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->procedure_id) {
            $BillingPadLog->where('procedure_id', $request->procedure_id);
        }
        if ($request->admissions_id) {
            $BillingPadLog->where('admissions_id', $request->admissions_id);
        }

        if ($request->query("pagination", true) == "false") {
            $BillingPadLog = $BillingPadLog->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $BillingPadLog = $BillingPadLog->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['billing_pad_log' => $BillingPadLog]
        ]);
    }

    public function store(BillingPadLogRequest $request): JsonResponse
    {
        $BillingPadLog = new BillingPadLog;
        $BillingPadLog->billing_pad_id = $request->billing_pad_id;
        $BillingPadLog->billing_pad_status_id = $request->billing_pad_status_id;
        $BillingPadLog->user_id = $request->user_id;
        $BillingPadLog->save();

        return response()->json([
            'status' => true,
            'message' => 'facturas creadas exitosamente',
            'data' => ['billing_pad_log' => $BillingPadLog]
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
        $BillingPadLog = BillingPadLog::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['billing_pad_log' => $BillingPadLog]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BillingPadLogRequest $request, int $id): JsonResponse
    {

        $BillingPadLog = BillingPadLog::find($id);
        $BillingPadLog->billing_pad_id = $request->billing_pad_id;
        $BillingPadLog->billing_pad_status_id = $request->billing_pad_status_id;
        $BillingPadLog->user_id = $request->user_id;
        $BillingPadLog->save();


        return response()->json([
            'status' => true,
            'message' => 'facturas actualizadas exitosamente',
            'data' => ['billing_pad_log' => $BillingPadLog]
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
            $BillingPadLogDelete = BillingPadLog::where('procedure_id', $id);
            $BillingPadLogDelete->delete();

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
