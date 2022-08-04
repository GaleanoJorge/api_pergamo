<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwExpenses;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChSwExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwExpenses = ChSwExpenses::select();


        if ($request->_sort) {
            $ChSwExpenses->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSwExpenses->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSwExpenses = $ChSwExpenses->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSwExpenses = $ChSwExpenses->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Egresos obtenidos exitosamente',
            'data' => ['ch_sw_expenses' => $ChSwExpenses]
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


        $ChSwExpenses = ChSwExpenses::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Egresos obtenidos exitosamente',
            'data' => ['ch_sw_expenses' => $ChSwExpenses]
        ]);
    }

    public function store(Request $request): JsonResponse
    {


        $ChSwExpenses = new ChSwExpenses;
        $ChSwExpenses->feeding = $request->feeding;
        $ChSwExpenses->gas = $request->gas;
        $ChSwExpenses->light = $request->light;
        $ChSwExpenses->aqueduct = $request->aqueduct;
        $ChSwExpenses->rent = $request->rent;
        $ChSwExpenses->transportation = $request->transportation;
        $ChSwExpenses->recreation = $request->recreation;
        $ChSwExpenses->education = $request->education;
        $ChSwExpenses->medical = $request->medical;
        $ChSwExpenses->cell_phone = $request->cell_phone;
        $ChSwExpenses->landline = $request->landline;
        $ChSwExpenses->total = $request->total;
        $ChSwExpenses->type_record_id = $request->type_record_id;
        $ChSwExpenses->ch_record_id = $request->ch_record_id;
        $ChSwExpenses->save();

        return response()->json([
            'status' => true,
            'message' => 'Egresos asociada al paciente exitosamente',
            'data' => ['ch_sw_expenses' => $ChSwExpenses->toArray()]
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
        $ChSwExpenses = ChSwExpenses::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Egresos obtenida exitosamente',
            'data' => ['ch_sw_expenses' => $ChSwExpenses]
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
        $ChSwExpenses = ChSwExpenses::find($id);
        $ChSwExpenses->feeding = $request->feeding;
        $ChSwExpenses->gas = $request->gas;
        $ChSwExpenses->light = $request->light;
        $ChSwExpenses->aqueduct = $request->aqueduct;
        $ChSwExpenses->rent = $request->rent;
        $ChSwExpenses->transportation = $request->transportation;
        $ChSwExpenses->recreation = $request->recreation;
        $ChSwExpenses->education = $request->education;
        $ChSwExpenses->medical = $request->medical;
        $ChSwExpenses->cell_phone = $request->cell_phone;
        $ChSwExpenses->landline = $request->landline;
        $ChSwExpenses->total = $request->total;
        $ChSwExpenses->type_record_id = $request->type_record_id;
        $ChSwExpenses->ch_record_id = $request->ch_record_id;
        $ChSwExpenses->save();

        return response()->json([
            'status' => true,
            'message' => 'Egresos  actualizada exitosamente',
            'data' => ['ch_sw_expenses' => $ChSwExpenses]
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
            $ChSwExpenses = ChSwExpenses::find($id);
            $ChSwExpenses->delete();

            return response()->json([
                'status' => true,
                'message' => 'Egresos  eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Egresos  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
