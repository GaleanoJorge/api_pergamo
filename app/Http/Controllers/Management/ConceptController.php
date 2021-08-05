<?php

namespace App\Http\Controllers\Management;

use App\Models\Concept;
use App\Models\ConceptType;
use App\Models\Validity;
use App\Models\Unit;
use App\Models\Municipality;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConceptRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ConceptController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $concepts = Concept::select(
            'concept.*','municipality.name AS ciudad',
            'concept.unit_value', 'validity.name AS vigencia'
        )
        ->Join('municipality', 'municipality.id', 'concept.municipality_id')
        ->Join('validity', 'validity.id', 'concept.validity_id');

        if ($request->_sort) {
            $concepts->orderBy($request->_sort, $request->_order);
        }

        if ($request->municipality_id) {
            $concepts->where('concept.municipality_id', $request->municipality_id);
        }

        if ($request->validity_id) {
            $concepts->where('concept.validity_id', $request->validity_id);
        }

        if ($request->concept_base_id) {
            $concepts->where('concept.concept_base_id', $request->concept_base_id);
        }

        if ($request->search) {
            $concepts->where('municipality.name', 'like', '%' . $request->search . '%')
                    ->orWhere('validity.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $concepts = $concepts->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $concepts = $concepts->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Conceptos obtenidos exitosamente',
            'data' => ['concepts' => $concepts]
        ]);
    }

    public function copyValidity(Request $request): JsonResponse
    {

        $concepts = Concept::select(
            'concept.*','municipality.name AS ciudad',
            'concept.unit_value', 'validity.name AS vigencia',
            'unit.name AS unidad', 'concept_base.name AS concepto','concept_type.name AS tipo',
            'new_concept.id AS new_validity_concept_id',
            'new_concept.unit_value AS new_validity_unit_value'
        )
            ->Join('municipality', 'municipality.id', 'concept.municipality_id')
            ->Join('validity', 'validity.id', 'concept.validity_id')
            ->Join('concept_base', 'concept_base.id', 'concept.concept_base_id')
            ->leftJoin('unit', 'unit.id', 'concept_base.unit_id')
            ->Join('concept_type','concept_base.concept_type_id','concept_type.id')
            ->leftJoin('concept AS new_concept', function ($join) use($request) {
                $join->on('concept.concept_base_id', '=', 'new_concept.concept_base_id');
                $join->on('concept.municipality_id', '=', 'new_concept.municipality_id');
                $join->where('new_concept.validity_id', $request->new_validity_id);
            })
            ->where('concept.validity_id', $request->validity_id);

        if ($request->_sort) {
            $concepts->orderBy($request->_sort, $request->_order);
        }

        if ($request->municipality_id) {
            $concepts->where('concept.municipality_id', $request->municipality_id);
        }

        if ($request->concept_type_id) {
            $concepts->where('concept_base.concept_type_id', $request->concept_type_id);
        }

        if ($request->search) {
            $concepts->where('municipality.name', 'like', '%' . $request->search . '%')
                ->orWhere('validity.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $concepts = $concepts->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $concepts = $concepts->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Conceptos obtenidos exitosamente',
            'data' => ['concepts' => $concepts]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ConceptRequest $request
     * @return JsonResponse
     */
    public function store(ConceptRequest $request): JsonResponse
    {
        $concept = new Concept;
        $concept->concept_base_id = $request->concept_base_id;
        $concept->validity_id = $request->validity_id;
        //$concept->unit_id = $request->unit_id;
        $concept->municipality_id = $request->municipality_id;
        $concept->unit_value = $request->unit_value;
        $concept->save();

        return response()->json([
            'status' => true,
            'message' => 'Concepto creado exitosamente',
            'data' => ['concept' => $concept->toArray()]
        ]);
    }

    public function storeNewValidityConcepts(Request $request): JsonResponse
    {
        $data = (array)$request->data;

        foreach ($data as $row) {
            if (($row['new_validity_concept_id'] * 1) > 0) {
                $concept = Concept::find($row['new_validity_concept_id']);
            } else {
                $concept = new Concept;
            }
            $concept->concept_base_id = $row["concept_base_id"];
            $concept->validity_id = $request->new_validity_id;
            $concept->municipality_id = $row["municipality_id"];
            //$concept->unit_id = $row["unit_id"];
            $concept->unit_value = $row["new_validity_unit_value"];
            $concept->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Conceptos de vigencia almacenados exitosamente'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $concept = Concept::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Concepto obtenido exitosamente',
            'data' => ['concept' => $concept]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(ConceptRequest $request, int $id): JsonResponse
    {
        $concept = Concept::find($id);
        $concept->concept_base_id = $request->concept_base_id;
        $concept->validity_id = $request->validity_id;
        //$concept->unit_id = $request->unit_id;
        $concept->municipality_id = $request->municipality_id;
        $concept->unit_value = $request->unit_value;
        $concept->save();

        return response()->json([
            'status' => true,
            'message' => 'Concepto actualizado exitosamente',
            'data' => ['concept' => $concept]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $concept = Concept::find($id);
            $concept->delete();

            return response()->json([
                'status' => true,
                'message' => 'Concepto eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El Concepto está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }

    public function getAuxiliaryData(Request $request): JsonResponse
    {
        $validities = Validity::get();
        $cities = Municipality::get();
        $units = Unit::get();
        $conceptTypes = ConceptType::get();

        return response()->json([
            'status' => true,
            'message' => 'Auxiliares obtenidas exitosamente',
            'data' => [
                'cities' => $cities->toArray(),
                'validities' => $validities->toArray(),
                'units' => $units->toArray(),
                'conceptTypes' => $conceptTypes->toArray(),
            ]
        ]);
    }

    public function autocomplete(Request $request): JsonResponse
    {

        $concepts = Concept::select(
            'concept.id AS value',
            \DB::raw('CONCAT_WS(" - ",validity.name,concept_base.name,unit.name) AS label')
        )
        ->Join('concept_base', 'concept_base.id', 'concept.concept_base_id')
        ->Join('validity', 'validity.id', 'concept.validity_id')
        ->leftJoin('unit', 'unit.id', 'concept_base.unit_id');

        if ($request->_sort) {
            $concepts->orderBy($request->_sort, $request->_order);
        }

        if ($request->municipality_id) {
            $concepts->where('concept.municipality_id', $request->municipality_id);
        }

        if ($request->validity_id) {
            $concepts->where('concept.validity_id', $request->validity_id);
        }

        if ($request->concept_type_id) {
            $concepts->where('concept_base.concept_type_id', $request->concept_type_id);
        }

        if ($request->search) {
            $concepts->where('concept_base.name', 'like', '%' . $request->search . '%')
                    ->orWhere('validity.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $concepts = $concepts->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $concepts = $concepts->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Conceptos obtenidos exitosamente',
            'data' => ['concepts' => $concepts]
        ]);
    }
}
