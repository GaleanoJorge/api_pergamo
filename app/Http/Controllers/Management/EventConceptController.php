<?php

namespace App\Http\Controllers\Management;

use App\Models\EventConcept;
use App\Models\EventTicket;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventConceptRequest;
use App\Http\Requests\ProjectEventConceptRequest;
use App\Http\Requests\SpecialEventConceptRequest;
use App\Http\Requests\ExecuteEventConceptRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EventConceptController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $event_concepts = EventConcept::select('event_concept.*',
        \DB::raw('(event_concept.planned_quantity * planned_unit_value) AS total_planned'),
        \DB::raw('(event_concept.real_quantity * real_unit_value) AS total_real')
        )->with('concept.concept_base.concept_type','event_tickets.user')
        ->join('concept','concept.id','event_concept.concept_id')
        ->join('concept_base','concept_base.id','concept.concept_base_id');

        if ($request->_sort) {
            $event_concepts->orderBy($request->_sort, $request->_order);
        }

        if ($request->event_id) {
            $event_concepts->where('event_concept.event_id', $request->event_id);
        }

        if ($request->event_day_id) {
            $event_concepts->where('event_concept.event_day_id', $request->event_day_id);
        }

        if ($request->concept_type_id) {
            if ($request->stage=="extra" && $request->concept_type_id <> 2) {
                $event_concepts->whereIn('concept_base.concept_type_id',[1,3]);
            }else{
                $event_concepts->where('concept_base.concept_type_id', $request->concept_type_id);
            }
        }

        if ($request->stage=="project") {
            $event_concepts->whereNotNull('event_concept.planned_unit_value');
        }

        if ($request->stage=="extra") {
            $event_concepts->whereNull('event_concept.planned_unit_value');
        }

        if ($request->query("pagination", true) === "false") {
            $event_concepts = $event_concepts->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $event_concepts = $event_concepts->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Conceptos del evento obtenidos exitosamente',
            'data' => ['event_concepts' => $event_concepts]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventConceptRequest $request
     * @return JsonResponse
     */
    public function store(EventConceptRequest $request): JsonResponse
    {
        $event_concept = new EventConcept;
        $event_concept->concept_id = $request->concept_id;
        $event_concept->event_id = $request->event_id;
        $event_concept->real_date = $request->real_date;
        $event_concept->real_quantity = $request->real_quantity;
        $event_concept->real_unit_value = $request->real_unit_value;
        $event_concept->observations = $request->observations;
        if($request->file('evidence_path')){
            $path = \Storage::disk('public')->put('budget_attachments', $request->file('evidence_path'));
            $event_concept->evidence_path = $path;
        }
        $event_concept->save();


        return response()->json([
            'status' => true,
            'message' => 'Concepto agregado exitosamente',
            'data' => ['event_concept' => $event_concept->toArray()]
        ]);
    }

    public function storeTicketExtra(Request $request): JsonResponse
    {
        $eventConcept = (array) $request->eventConcept;
        $eventTicket = (array) $request->eventTicket;

        $event_concept = new EventConcept;
        $event_concept->concept_id = $eventConcept["concept_id"];
        $event_concept->event_id = $eventConcept["event_id"];
        $event_concept->real_date = $eventConcept["real_date"];
        $event_concept->save();

        $event_ticket = new EventTicket;
        $event_ticket->event_concept_id = $event_concept->id;
        $event_ticket->passenger_user_id = $eventTicket["passenger_user_id"];
        $event_ticket->origin = $eventTicket["origin"];
        $event_ticket->destination = $eventTicket["destination"];
        $event_ticket->back = $eventTicket["back"];
        $event_ticket->departure_date = $eventTicket["departure_date"];
        $event_ticket->return_date = $eventTicket["return_date"];
        $event_ticket->departure_observations = $eventTicket["departure_observations"];
        $event_ticket->return_observations = $eventTicket["return_observations"];
        $event_ticket->save();


        return response()->json([
            'status' => true,
            'message' => 'Concepto Transporte Extra agregado exitosamente',
            'data' => ['event_concept' => $event_concept->toArray()]
        ]);
    }

    public function storeProjectEventConcept(ProjectEventConceptRequest $request): JsonResponse
    {
        $event_concept = EventConcept::standarStore($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Concepto agregado exitosamente',
            'data' => ['event_concept' => $event_concept->toArray()]
        ]);
    }

    public function storeSpecialEventConcept(SpecialEventConceptRequest $request): JsonResponse
    {
        $data=$request->validated();
        $data['planned_quantity']=1;
        $event_concept = EventConcept::standarStore($data);

        return response()->json([
            'status' => true,
            'message' => 'Concepto agregado exitosamente',
            'data' => ['event_concept' => $event_concept->toArray()]
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
        $event_concept = EventConcept::select('event_concept.*','concept_base.concept_type_id')->with('event_tickets')
        ->join('concept','concept.id','event_concept.concept_id')
        ->join('concept_base','concept_base.id','concept.concept_base_id')
        ->where('event_concept.id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Concepto obtenido exitosamente',
            'data' => ['event_concept' => $event_concept]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(EventConceptRequest $request, int $id): JsonResponse
    {
        $event_concept = EventConcept::find($id);
        $event_concept->concept_id = $request->concept_id;
        $event_concept->event_id = $request->event_id;
        $event_concept->real_date = $request->real_date;
        $event_concept->real_quantity = $request->real_quantity;
        $event_concept->real_unit_value = $request->real_unit_value;
        $event_concept->observations = $request->observations;
        if($request->file('evidence_path')){
            $path = \Storage::disk('public')->put('budget_attachments', $request->file('evidence_path'));
            $event_concept->evidence_path = $path;
        }
        $event_concept->save();

        return response()->json([
            'status' => true,
            'message' => 'Concepto actualizado exitosamente',
            'data' => ['event_concept' => $event_concept]
        ]);
    }

    public function updateTicketExtra(Request $request): JsonResponse
    {
        $eventConcept = (array) $request->eventConcept;
        $eventTicket = (array) $request->eventTicket;

        $event_concept = EventConcept::find($eventConcept["id"]);
        $event_concept->concept_id = $eventConcept["concept_id"];
        $event_concept->event_id = $eventConcept["event_id"];
        $event_concept->real_date = $eventConcept["real_date"];
        $event_concept->save();

        $event_ticket = EventTicket::find($eventTicket["id"]);
        $event_ticket->event_concept_id = $event_concept->id;
        $event_ticket->passenger_user_id = $eventTicket["passenger_user_id"];
        $event_ticket->origin = $eventTicket["origin"];
        $event_ticket->destination = $eventTicket["destination"];
        $event_ticket->back = $eventTicket["back"];
        $event_ticket->departure_date = $eventTicket["departure_date"];
        $event_ticket->return_date = $eventTicket["return_date"];
        $event_ticket->departure_observations = $eventTicket["departure_observations"];
        $event_ticket->return_observations = $eventTicket["return_observations"];
        $event_ticket->save();

        return response()->json([
            'status' => true,
            'message' => 'Concepto Transporte Extra actualizado exitosamente',
            'data' => ['event_concept' => $event_concept->toArray()]
        ]);
    }

    public function updateProjectEventConcept(ProjectEventConceptRequest $request, int $id): JsonResponse
    {
        $event_concept = EventConcept::standarUpdate($request->validated(),$id);

        return response()->json([
            'status' => true,
            'message' => 'Concepto actualizado exitosamente',
            'data' => ['event_concept' => $event_concept->toArray()]
        ]);
    }

    public function updateSpecialEventConcept(SpecialEventConceptRequest $request, int $id): JsonResponse
    {
        $event_concept = EventConcept::standarUpdate($request->validated(),$id);

        return response()->json([
            'status' => true,
            'message' => 'Concepto actualizado exitosamente',
            'data' => ['event_concept' => $event_concept->toArray()]
        ]);
    }

    public function updateExecuteSpecialArray(Request $request): JsonResponse
    {
        $data = (array)$request->data;

        foreach ($data as $key=>$row) {
            $event_concept = EventConcept::find($row['id']);
            $event_concept->real_quantity = $event_concept->planned_quantity;
            $event_concept->real_unit_value = $row['real_unit_value'];
            $event_concept->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Presupuesto actualizado exitosamente'
        ]);
    }

    public function updateExecuteArray(Request $request): JsonResponse
    {
        $data = (array) json_decode($request->data);

        if($request->file('evidence_path')){
            $files = $request->file('evidence_path');
        }

        foreach ($data as $key=>$row) {
            $event_concept = EventConcept::find($row->id);
            $event_concept->real_date = $row->real_date;
            $event_concept->real_quantity = $row->real_quantity;
            $event_concept->real_unit_value = $row->real_unit_value;

            if(@$files[$key]){
                $path = \Storage::disk('public')->put('budget_attachments',$files[$key]);
                $event_concept->evidence_path = $path;
            }

            $event_concept->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Presupuesto actualizado exitosamente'
        ]);
    }
    /*
    public function updateExecuteEventConcept(ExecuteEventConceptRequest $request, int $id): JsonResponse
    {
        $event_concept = EventConcept::standarUpdate($request->validated(),$id);

        return response()->json([
            'status' => true,
            'message' => 'Concepto actualizado exitosamente',
            'data' => ['event_concept' => $event_concept->toArray()]
        ]);
    } */

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $event_concept = EventConcept::find($id);
            $event_concept->delete();

            return response()->json([
                'status' => true,
                'message' => 'Concepto eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El concepto está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
