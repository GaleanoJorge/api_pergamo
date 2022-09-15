<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwIncome;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChSwIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwIncome = ChSwIncome::select();


        if ($request->_sort) {
            $ChSwIncome->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSwIncome->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSwIncome = $ChSwIncome->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSwIncome = $ChSwIncome->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Ingresos obtenidos exitosamente',
            'data' => ['ch_sw_income' => $ChSwIncome]
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {


        $ChSwIncome = ChSwIncome::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Ingresos obtenidos exitosamente',
            'data' => ['ch_sw_income' => $ChSwIncome]
        ]);
    }

    public function store(Request $request): JsonResponse
    {


        $ChSwIncome = new ChSwIncome;
        $ChSwIncome->salary = $request->salary;
        $ChSwIncome->pension = $request->pension;
        $ChSwIncome->donations = $request->donations;
        $ChSwIncome->rent = $request->rent;
        $ChSwIncome->familiar_help = $request->familiar_help;
        $ChSwIncome->none = $request->none;
        $ChSwIncome->total = $request->total;
        $ChSwIncome->type_record_id = $request->type_record_id;
        $ChSwIncome->ch_record_id = $request->ch_record_id;
        $ChSwIncome->save();

        return response()->json([
            'status' => true,
            'message' => 'Ingresos asociada al paciente exitosamente',
            'data' => ['ch_sw_income' => $ChSwIncome->toArray()]
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
        $ChSwIncome = ChSwIncome::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ingresos obtenida exitosamente',
            'data' => ['ch_sw_income' => $ChSwIncome]
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
        $ChSwIncome = ChSwIncome::find($id);
        $ChSwIncome->salary = $request->salary;
        $ChSwIncome->pension = $request->pension;
        $ChSwIncome->donations = $request->donations;
        $ChSwIncome->rent = $request->rent;
        $ChSwIncome->familiar_help = $request->familiar_help;
        $ChSwIncome->none = $request->none;
        $ChSwIncome->total = $request->total;
        $ChSwIncome->type_record_id = $request->type_record_id;
        $ChSwIncome->ch_record_id = $request->ch_record_id;
        $ChSwIncome->save();

        return response()->json([
            'status' => true,
            'message' => 'Ingresos  actualizada exitosamente',
            'data' => ['ch_sw_income' => $ChSwIncome]
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
            $ChSwIncome = ChSwIncome::find($id);
            $ChSwIncome->delete();

            return response()->json([
                'status' => true,
                'message' => 'Ingresos  eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ingresos  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
