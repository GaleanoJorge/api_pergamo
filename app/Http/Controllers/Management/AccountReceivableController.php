<?php

namespace App\Http\Controllers\Management;

use App\Models\AccountReceivable;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AccountReceivableRequest;
use App\Models\MinimumSalary;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class AccountReceivableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $AccountReceivable = AccountReceivable::with('user', 'status_bill', 'minimum_salary');

        if ($request->_sort) {
            $AccountReceivable->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $AccountReceivable->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->gloss_ambit_id) {
            $AccountReceivable->where('gloss_ambit_id', $request->gloss_ambit_id);
        }
        if ($request->status_bill_id) {
            $AccountReceivable->where('status_bill_id', $request->status_bill_id);
        }
        if ($request->campus_id) {
            $AccountReceivable->where('campus_id', $request->campus_id);
        }

        if ($request->query("pagination", true) == "false") {
            $AccountReceivable = $AccountReceivable->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $AccountReceivable = $AccountReceivable->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro asociada exitosamente',
            'data' => ['account_receivable' => $AccountReceivable]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getByUser(Request $request, int $user_id): JsonResponse

    {
        $AccountReceivable = AccountReceivable::with('user', 'status_bill', 'minimum_salary')
            ->select('account_receivable.*', DB::raw('IF(source_retention.id,1,0) as has_retention'))
            ->LeftJoin('source_retention', 'source_retention.account_receivable_id', '=', 'account_receivable.id')
            ->groupBy('account_receivable.id');

        if ($user_id != 0) {
            $AccountReceivable->where('user_id', $user_id);
        }

        if ($request->_sort) {
            $AccountReceivable->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $AccountReceivable->where('name', 'like', '%' . $request->search . '%');
        }


        if ($request->query("pagination", true) == "false") {
            $AccountReceivable = $AccountReceivable->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $AccountReceivable = $AccountReceivable->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro asociada exitosamente',
            'data' => ['account_receivable' => $AccountReceivable]
        ]);
    }



    public function store(AccountReceivableRequest $request): JsonResponse
    {
        $AccountReceivable = new AccountReceivable;
        $AccountReceivable->file_payment = $request->file_payment;
        $AccountReceivable->gross_value_activities = $request->gross_value_activities;
        $AccountReceivable->net_value_activities = $request->net_value_activities;
        $AccountReceivable->user_id = $request->user_id;
        $AccountReceivable->status_bill_id = $request->status_bill_id;
        $AccountReceivable->minimum_salary_id = MinimumSalary::select()->orderBy('year', 'desc')->first();
        $AccountReceivable->save();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro creada exitosamente',
            'data' => ['account_receivable' => $AccountReceivable->toArray()]
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
        $AccountReceivable = AccountReceivable::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro obtenido exitosamente',
            'data' => ['account_receivable' => $AccountReceivable]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AccountReceivableRequest $request, int $id): JsonResponse
    {
        $AccountReceivable = AccountReceivable::find($id);
        $AccountReceivable->file_payment = $request->file_payment;
        $AccountReceivable->gross_value_activities = $request->gross_value_activities;
        $AccountReceivable->net_value_activities = $request->net_value_activities;
        $AccountReceivable->user_id = $request->user_id;
        $AccountReceivable->status_bill_id = $request->status_bill_id;
        $AccountReceivable->minimum_salary_id = $request->minimum_salary_id;
        $AccountReceivable->save();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro actualizado exitosamente',
            'data' => ['account_receivable' => $AccountReceivable]
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function saveFile(Request $request, int $id): JsonResponse
    {
        $AccountReceivable = AccountReceivable::find($id);

        if ($request->file('file')) {
            $path = Storage::disk('public')->put('account_receivable', $request->file('file'));
            $AccountReceivable->file_payment = $path;
        }
        $AccountReceivable->save();

        return response()->json([
            'status' => true,
            'message' => 'Planilla cargada exitosamente',
            'data' => ['account_receivable' => $AccountReceivable]
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
            $AccountReceivable = AccountReceivable::find($id);
            $AccountReceivable->delete();

            return response()->json([
                'status' => true,
                'message' => 'Cuenta de cobro eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cuenta de cobro esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
