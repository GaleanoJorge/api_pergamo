<?php

namespace App\Http\Controllers\Management;

use App\Models\Tariff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TariffRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class TariffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Tariff = Tariff::select(
            'tariff.*',
            DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
        )
            ->with('pad_risk', 'status', 'type_of_attention', 'program', 'admissions')
            ->leftJoin('pad_risk', 'pad_risk.id', '=', 'tariff.pad_risk_id')
            ->leftJoin('type_of_attention', 'type_of_attention.id', 'tariff.type_of_attention_id')
            ->leftJoin('status', 'status.id', 'tariff.status_id')
            ->leftJoin('admissions', 'admissions.id', 'tariff.admissions_id')
            ->Leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->leftJoin('program', 'program.id', '=', 'tariff.program_id');

        if ($request->_sort) {
            $Tariff->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Tariff->where('tariff.name', 'like', '%' . $request->search . '%')
                ->orWhere('program.name', 'like', '%' . $request->search . '%')
                ->orWhere('pad_risk.name', 'like', '%' . $request->search . '%');
        }
        if ($request->pad_risk_id) {
            $Tariff->where('pad_risk_id', $request->pad_risk_id);
        }
        if ($request->program_id) {
            $Tariff->where('program_id', $request->program_id);
        }
        if ($request->type_of_attention_id) {
            $Tariff->where('type_of_attention_id', $request->type_of_attention_id);
        }

        if ($request->status_id) {
            $Tariff->where('status.id', $request->status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $Tariff = $Tariff->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $Tariff = $Tariff->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tarifas obtenidas exitosamente',
            'data' => ['tariff' => $Tariff]
        ]);
    }

    public function store(TariffRequest $request): JsonResponse
    {
        $TariffTest = Tariff::select();
        if ($request->quantity) {
            $TariffTest->where('quantity', $request->quantity);
        } else {
            $TariffTest->whereNull('quantity');
        }
        if ($request->extra_dose) {
            $TariffTest->where('extra_dose', 1);
        } else {
            $TariffTest->where('extra_dose', 0);
        }
        if ($request->has_car) {
            $TariffTest->where('has_car', 1);
        } else {
            $TariffTest->where('has_car', 0);
        }
        if ($request->failed) {
            $TariffTest->where('failed', 1);
        } else {
            $TariffTest->where('failed', 0);
        }
        if ($request->phone_consult) {
            $TariffTest->where('phone_consult', 1);
        } else {
            $TariffTest->where('phone_consult', 0);
        }
        if ($request->pad_risk_id) {
            $TariffTest->where('pad_risk_id', $request->pad_risk_id);
        } else {
            $TariffTest->whereNull('pad_risk_id');
        }
        if ($request->program_id) {
            $TariffTest->where('program_id', $request->program_id);
        } else {
            $TariffTest->whereNull('program_id');
        }
        if ($request->type_of_attention_id) {
            $TariffTest->where('admissions_id', $request->admissions_id);
        } else {
            $TariffTest->whereNull('admissions_id');
        }
        $TariffTest->where('status_id', $request->status_id)
            ->where('type_of_attention_id', $request->type_of_attention_id);
        $TariffTest = $TariffTest->get()->toArray();
        if (count($TariffTest) > 0) {
            return response()->json([
                'status' => false,
                'message' => 'Tarifa ya existe, o se encuentra en estado actiiva',
                'data' => ['tariff' => []]
            ]);
        }
        $TariffTest2 = Tariff::select()
            ->where('name', $request->name)
            ->first();
        if ($TariffTest2) {
            return response()->json([
                'status' => false,
                'message' => 'Nombre de tarifa ya existe',
                'data' => ['tariff' => []]
            ]);
        }
        $Tariff = new Tariff;
        $Tariff->name = $request->name;
        $Tariff->amount = $request->amount;
        $Tariff->quantity = $request->quantity;
        $Tariff->has_car = $request->has_car;
        $Tariff->extra_dose = $request->extra_dose;
        $Tariff->phone_consult = $request->phone_consult;
        $Tariff->status_id = $request->status_id;
        $Tariff->pad_risk_id = $request->pad_risk_id;
        $Tariff->program_id = $request->program_id;
        $Tariff->type_of_attention_id = $request->type_of_attention_id;
        $Tariff->admissions_id = $request->admissions_id;
        $Tariff->failed = $request->failed;

        $Tariff->save();

        return response()->json([
            'status' => true,
            'message' => 'Tarifas creadas exitosamente',
            'data' => ['tariff' => $Tariff->toArray()]
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
        $Tariff = Tariff::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tarifas obtenidas exitosamente',
            'data' => ['tariff' => $Tariff]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(TariffRequest $request, int $id): JsonResponse
    {
        $Tariff = Tariff::find($id);
        $Tariff->name = $request->name;
        $Tariff->amount = $request->amount;
        $Tariff->quantity = $request->quantity;
        $Tariff->has_car = $request->has_car;
        $Tariff->extra_dose = $request->extra_dose;
        $Tariff->phone_consult = $request->phone_consult;
        $Tariff->status_id = $request->status_id;
        $Tariff->pad_risk_id = $request->pad_risk_id;
        $Tariff->program_id = $request->program_id;
        $Tariff->type_of_attention_id = $request->type_of_attention_id;
        $Tariff->admissions_id = $request->admissions_id;
        $Tariff->failed = $request->failed;

        $Tariff->save();

        return response()->json([
            'status' => true,
            'message' => 'Tarifas actualizadas exitosamente',
            'data' => ['tariff' => $Tariff]
        ]);
    }

    public function changeStatus(Request $request, int $id): JsonResponse
    {
        $Tariff = Tariff::find($id);
        $status_id = Tariff::where('id', $id)->get()->first()->status_id;
        if ($status_id == 1) {
            $Tariff->status_id = 2;
        } else {
            $Tariff->status_id = 1;
        }
        $Tariff->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado actualizado exitosamente',
            'data' => ['tariff' => $Tariff]
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
            $Tariff = Tariff::find($id);
            $Tariff->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tarifas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tarifas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
