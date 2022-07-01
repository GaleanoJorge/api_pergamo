<?php

namespace App\Http\Controllers\Management;

use App\Models\InputMaterialsUsedTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class InputMaterialsUsedTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $InputMaterialsUsedTl = InputMaterialsUsedTl::with('input_materials_used_tl');

        if ($request->_sort) {
            $InputMaterialsUsedTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $InputMaterialsUsedTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $InputMaterialsUsedTl = $InputMaterialsUsedTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $InputMaterialsUsedTl = $InputMaterialsUsedTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Materiales e Insumos Utilizados obtenidos exitosamente',
            'data' => ['input_materials_used_tl' => $InputMaterialsUsedTl]
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


        $InputMaterialsUsedTl = InputMaterialsUsedTl::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Materiales e Insumos Utilizados asociado al paciente exitosamente',
            'data' => ['input_materials_used_tl' => $InputMaterialsUsedTl]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $InputMaterialsUsedTl = new InputMaterialsUsedTl;

        if (isset($request->materialused)) {

            $validator = array_search('ELEMENTOS DE BIOSEGURIDAD (BATA, GUANTES, GORRO, POLAINAS)', $request->materialused);
            if (isset($validator)) {
                $InputMaterialsUsedTl->biosecurity_elements = $request->materialused[$validator];
            };

            $validator = array_search('MATERIALES DIDÁCTICOS', $request->materialused);
            if ($validator) {
                $InputMaterialsUsedTl->didactic_materials = $request->materialused[$validator];
            };

            $validator = array_search('ALIMENTOS Y LÍQUIDOS', $request->materialused);
            if ($validator) {
                $InputMaterialsUsedTl->liquid_food = $request->materialused[$validator];
            };

            $validator = array_search('MATERIAL DE PAPELERÍA', $request->materialused);
            if ($validator) {
                $InputMaterialsUsedTl->stationery = $request->materialused[$validator];
            };
        }

        $InputMaterialsUsedTl->type_record_id = $request->type_record_id;
        $InputMaterialsUsedTl->ch_record_id = $request->ch_record_id;
        $InputMaterialsUsedTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Materiales e Insumos Utilizados asociado al paciente exitosamente',
            'data' => ['input_materials_used_tl' => $InputMaterialsUsedTl->toArray()]
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
        $InputMaterialsUsedTl = InputMaterialsUsedTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Materiales e Insumos Utilizados obtenido exitosamente',
            'data' => ['input_materials_used_tl' => $InputMaterialsUsedTl]
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
        $InputMaterialsUsedTl = InputMaterialsUsedTl::find($id);
        $InputMaterialsUsedTl->biosecurity_elements = $request->biosecurity_elements;
        $InputMaterialsUsedTl->didactic_materials = $request->didactic_materials;
        $InputMaterialsUsedTl->liquid_food = $request->liquid_food;
        $InputMaterialsUsedTl->stationery = $request->stationery;
        $InputMaterialsUsedTl->type_record_id = $request->type_record_id;
        $InputMaterialsUsedTl->ch_record_id = $request->ch_record_id;
        $InputMaterialsUsedTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Materiales e Insumos Utilizados actualizado exitosamente',
            'data' => ['input_materials_used_tl' => $InputMaterialsUsedTl]
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
            $InputMaterialsUsedTl = InputMaterialsUsedTl::find($id);
            $InputMaterialsUsedTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Materiales e Insumos Utilizados eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Materiales e Insumos Utilizados en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
