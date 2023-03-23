<?php

namespace App\Http\Controllers\Management;

use App\Models\HumanTalent2Tc;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HumanTalent2TcRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class HumanTalent2TcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $HumanTalent2Tc = HumanTalent2Tc::select();

        if ($request->_sort) {
            $HumanTalent2Tc->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $HumanTalent2Tc->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $HumanTalent2Tc->where('status_id', $request->status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $HumanTalent2Tc = $HumanTalent2Tc->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $HumanTalent2Tc = $HumanTalent2Tc->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Talento humano obtenido exitosamente',
            'data' => ['human_talent_2_tc' => $HumanTalent2Tc]
        ]);
    }

    public function store(HumanTalent2TcRequest $request): JsonResponse
    {
        $HumanTalent2Tc = new HumanTalent2Tc;
        $HumanTalent2Tc->full_name = $request->full_name;
        $HumanTalent2Tc->identification = $request->identification;
        $HumanTalent2Tc->document_type = $request->document_type;
        $HumanTalent2Tc->gender = $request->gender;
        $HumanTalent2Tc->age = $request->age;
        $HumanTalent2Tc->honorary = $request->honorary;
        $HumanTalent2Tc->type_of_contract = $request->type_of_contract;
        $HumanTalent2Tc->type_of_job = $request->type_of_job;
        $HumanTalent2Tc->ambit = $request->ambit;
        $HumanTalent2Tc->cost_center = $request->cost_center;
        $HumanTalent2Tc->cost_center_code = $request->cost_center_code;
        $HumanTalent2Tc->position = $request->position;
        $HumanTalent2Tc->area = $request->area;
        $HumanTalent2Tc->month = $request->month;
        $HumanTalent2Tc->year = $request->year;
        $HumanTalent2Tc->save();

        return response()->json([
            'status' => true,
            'message' => 'Abandonados creados exitosamente',
            'data' => ['human_talent_2_tc' => $HumanTalent2Tc->toArray()]
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
        $HumanTalent2Tc = HumanTalent2Tc::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Talento humano obtenido exitosamente',
            'data' => ['human_talent_2_tc' => $HumanTalent2Tc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(HumanTalent2TcRequest $request, int $id): JsonResponse
    {
        $HumanTalent2Tc = new HumanTalent2Tc;
        $HumanTalent2Tc->full_name = $request->full_name;
        $HumanTalent2Tc->identification = $request->identification;
        $HumanTalent2Tc->document_type = $request->document_type;
        $HumanTalent2Tc->gender = $request->gender;
        $HumanTalent2Tc->age = $request->age;
        $HumanTalent2Tc->honorary = $request->honorary;
        $HumanTalent2Tc->type_of_contract = $request->type_of_contract;
        $HumanTalent2Tc->type_of_job = $request->type_of_job;
        $HumanTalent2Tc->ambit = $request->ambit;
        $HumanTalent2Tc->cost_center = $request->cost_center;
        $HumanTalent2Tc->cost_center_code = $request->cost_center_code;
        $HumanTalent2Tc->position = $request->position;
        $HumanTalent2Tc->area = $request->area;
        $HumanTalent2Tc->month = $request->month;
        $HumanTalent2Tc->year = $request->year;
        $HumanTalent2Tc->save();

        return response()->json([
            'status' => true,
            'message' => 'Talento humano actualizado exitosamente',
            'data' => ['human_talent_2_tc' => $HumanTalent2Tc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function import(Request $request): JsonResponse
    {
        foreach ($request->toArray() as $key => $item) {

            $HumanTalent2Tc = new HumanTalent2Tc;
            if (isset($item['nombre completo'])) {
                $HumanTalent2Tc->full_name  = $item['nombre completo'];
            }
            if (isset($item['identificacion'])) {
                $HumanTalent2Tc->identification  = $item['identificacion'];
            }
            if (isset($item['tipo documento'])) {
                $HumanTalent2Tc->document_type  = $item['tipo documento'];
            }
            if (isset($item['sexo'])) {
                $HumanTalent2Tc->gender = $item['sexo'];
            }
            if (isset($item['edad'])) {
                $HumanTalent2Tc->age = $item['edad'];
            }
            if (isset($item['honorarios'])) {
                $HumanTalent2Tc->honorary = $item['honorarios'];
            }
            if (isset($item['tipo de contrato'])) {
                $HumanTalent2Tc->type_of_contract = $item['tipo de contrato'];
            }
            if (isset($item['tipo de trabajo'])) {
                $HumanTalent2Tc->type_of_job = $item['tipo de trabajo'];
            }
            if (isset($item['ambito'])) {
                $HumanTalent2Tc->ambit = $item['ambito'];
            }
            if (isset($item['centro de costo'])) {
                $HumanTalent2Tc->cost_center = $item['centro de costo'];
            }
            if (isset($item['codigo centro de costo'])) {
                $HumanTalent2Tc->cost_center_code = $item['codigo centro de costo'];
            }
            if (isset($item['cargo'])) {
                $HumanTalent2Tc->position = $item['cargo'];
            }
            if (isset($item['regional'])) {
                $HumanTalent2Tc->area = $item['regional'];
            }
            if (isset($item['mes'])) {
                $HumanTalent2Tc->month = $item['mes'];
            }

            if (isset($item['año'])) {
                $HumanTalent2Tc->year = $item['año'];
            }

            $HumanTalent2Tc->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Talento humano actualizados exitosamente',
            'data' => ['human_talent_2_tc' => $HumanTalent2Tc]
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
            $HumanTalent2Tc = HumanTalent2Tc::find($id);
            $HumanTalent2Tc->delete();

            return response()->json([
                'status' => true,
                'message' => 'Talento humano eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Talento humano esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
