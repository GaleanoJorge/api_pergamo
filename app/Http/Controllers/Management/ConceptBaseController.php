<?php

namespace App\Http\Controllers\Management;

use App\Models\Concept;
use App\Models\ConceptBase;
use App\Models\ConceptType;
use App\Models\TransportType;
use App\Models\Unit;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConceptBaseRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ConceptBaseController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $concepts = ConceptBase::select( 'concept.id AS concept_id',
            'concept_base.id',
            'concept_type.name AS tipo','concept_base.name AS concepto',
            'municipality.name AS ciudad', 'concept.municipality_id',
            'concept.unit_value', 'validity.name AS vigencia'
        )
        ->Join('concept_type', 'concept_type.id', 'concept_base.concept_type_id')
        ->leftJoin('concept', 'concept_base.id', 'concept.concept_base_id')
        ->leftJoin('municipality', 'municipality.id', 'concept.municipality_id')
        ->leftJoin('validity', 'validity.id', 'concept.validity_id')
        ->leftJoin('concept AS UltConcept', function ($join) {
            $join->on('concept.municipality_id', '=', 'UltConcept.municipality_id');
            $join->on('concept.concept_base_id', '=', 'UltConcept.concept_base_id');
            $join->on('concept.validity_id', '<', 'UltConcept.validity_id');
        })
        ->whereNull('UltConcept.validity_id');

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

        if ($request->concept_type_id) {
            $concepts->where('concept_base.concept_type_id', $request->concept_type_id);
        }

        if ($request->search) {
            $concepts->where('concept_base.name','like','%' . $request->search. '%')
                    ->orWhere('municipality.name', 'like', '%' . $request->search . '%')
                    ->orWhere('validity.name', 'like', '%' . $request->search . '%')
                    ->orWhere('concept_type.name', 'like', '%' . $request->search . '%');
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
     * @param ConceptBaseRequest $request
     * @return JsonResponse
     */
    public function store(ConceptBaseRequest $request): JsonResponse
    {
        $concept = new ConceptBase;
        $concept->name = $request->name;
        $concept->description = $request->description;
        $concept->unit_id = $request->unit_id;
        $concept->concept_type_id = $request->concept_type_id;
        $concept->transport_type_id = $request->transport_type_id;
        $concept->origin = $request->origin;
        $concept->destination = $request->destination;
        $concept->back = $request->back;
        $concept->save();

        return response()->json([
            'status' => true,
            'message' => 'Concepto creado exitosamente',
            'data' => ['concept' => $concept->toArray()]
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
        $concept = ConceptBase::where('id', $id)->get()->toArray();

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
    public function update(ConceptBaseRequest $request, int $id): JsonResponse
    {
        $concept = ConceptBase::find($id);
        $concept->name = $request->name;
        $concept->description = $request->description;
        $concept->unit_id = $request->unit_id;
        $concept->concept_type_id = $request->concept_type_id;
        $concept->transport_type_id = $request->transport_type_id;
        $concept->origin = $request->origin;
        $concept->destination = $request->destination;
        $concept->back = $request->back;
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
            $concept = ConceptBase::find($id);
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
        $conceptType = ConceptType::get();
        $transportType = TransportType::get();
        $units = Unit::get();

        return response()->json([
            'status' => true,
            'message' => 'Auxiliares obtenidas exitosamente',
            'data' => [
                'conceptType' => $conceptType->toArray(),
                'transportType' => $transportType->toArray(),
                'units' => $units->toArray(),
            ]
        ]);
    }
}
