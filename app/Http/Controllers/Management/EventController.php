<?php

namespace App\Http\Controllers\Management;

use App\Models\Event;
use App\Models\Category;
use App\Models\Origin;
use App\Models\ConceptType;
use App\Models\EntityType;
use App\Models\ApprovedStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $events = Event::select(
            'event.id','event.name','event.approved_date','municipality.name AS city',
            \DB::raw('CONCAT_WS(" ",users.lastname,users.firstname) AS nombre_completo'),
            'approved_status.name AS status', 'event.is_close',
            'program.name AS program','category.name AS subprogram',
            \DB::raw('SUM(event_concept.planned_quantity*event_concept.planned_unit_value) AS total')
        )
        ->Join('users', 'users.id', 'event.user_coordinate_id')
        ->Join('municipality', 'municipality.id', 'event.municipality_id')
        ->leftJoin('approved_status', 'approved_status.id', 'event.approved_status_id')
        ->join('categories_origin', 'categories_origin.id', 'event.categories_origin_id')
        ->join('category', 'categories_origin.category_id', 'category.id')
        ->join('category AS program', 'category.category_parent_id', 'program.id')
        ->leftJoin('event_concept', 'event.id', 'event_concept.event_id')
        ->groupBy('event.id');

        if ($request->_sort) {
            $events->orderBy($request->_sort, $request->_order);
        }

        if ($request->approved_status_id) {
            $events->where('event.approved_status_id', $request->approved_status_id);
        }

        if ($request->search) {
            $events->where('event.name','like','%' . $request->search. '%')
                    ->orWhere('users.firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('municipality.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $events = $events->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $events = $events->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Eventos obtenidos exitosamente',
            'data' => ['events' => $events]
        ]);
    }

    public function indexExecute(Request $request): JsonResponse
    {

        $events = Event::select(
            'event.id','event.name','municipality.name AS city', 'event.is_close',
            \DB::raw('CONCAT_WS(" ",users.lastname,users.firstname) AS nombre_completo'),
            'approved_status.name AS status',
            'program.name AS program','category.name AS subprogram',
            \DB::raw('CONCAT_WS(" / ",SUM(IF(event_concept.planned_unit_value>0 AND event_concept.real_unit_value>0 AND concept_base.concept_type_id=1,1,0)), SUM(IF(event_concept.planned_unit_value>0 AND concept_base.concept_type_id=1,1,0))) AS n_logistic'),
            \DB::raw('CONCAT_WS(" / ",SUM(IF(event_concept.planned_unit_value>0 AND event_concept.real_unit_value>0 AND concept_base.concept_type_id=2,1,0)), SUM(IF(event_concept.planned_unit_value>0 AND concept_base.concept_type_id=2,1,0))) AS n_transport'),
            \DB::raw('SUM(IF(event_concept.planned_unit_value IS NULL AND event_concept.real_unit_value>0, 1,0)) AS n_extras')
        )
            ->Join('users', 'users.id', 'event.user_coordinate_id')
            ->Join('municipality', 'municipality.id', 'event.municipality_id')
            ->join('categories_origin', 'categories_origin.id', 'event.categories_origin_id')
            ->join('category', 'categories_origin.category_id', 'category.id')
            ->join('category AS program', 'category.category_parent_id', 'program.id')
            ->Join('event_concept', 'event.id', 'event_concept.event_id')
            ->Join('approved_status', 'approved_status.id', 'event.approved_status_id')
            ->join('concept','concept.id','event_concept.concept_id')
            ->join('concept_base','concept_base.id','concept.concept_base_id')
        ->where('event.approved_status_id',4)
        ->groupBy('event.id');

        if ($request->_sort) {
            $events->orderBy($request->_sort, $request->_order);
        }

        if ($request->subprogram_id) {
            $events->where('categories_origin.category_id', $request->subprogram_id);
        }

        if ($request->search) {
            $events->where('event.name','like','%' . $request->search. '%')
                    ->orWhere('users.firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('municipality.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $events = $events->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $events = $events->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Eventos obtenidos exitosamente',
            'data' => ['events' => $events]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @return JsonResponse
     */
    public function store(EventRequest $request): JsonResponse
    {
        $event = new Event;
        $event->course_id = $request->course_id;
        $event->origin_id = $request->origin_id;
        $event->categories_origin_id = $request->categories_origin_id;
        $event->entity_type_id = $request->entity_type_id;
        $event->name = $request->name;
        $event->municipality_id = $request->municipality_id;
        $event->place = $request->place;
        $event->user_coordinate_id = $request->user_coordinate_id;
        $event->initial_date = $request->initial_date;
        $event->final_date = $request->final_date;
        $event->user_id = Auth::user()->id;
        $event->number_trainers = $request->number_trainers;
        $event->summoned_participants = $request->summoned_participants;
        $event->contract_id = $request->contract_id;
        //$event->approved_status_id = $request->approved_status_id;
        //$event->approved_date = $request->approved_date;
        $event->save();

        return response()->json([
            'status' => true,
            'message' => 'Evento creado exitosamente',
            'data' => ['event' => $event->toArray()]
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
        $event = Event::select('event.*','category.category_parent_id AS category_id',
            'program.name AS program','category.name AS subprogram')
            ->with('municipality','entity_type','origin', 'user_coordinate', 'approved_status')
            ->join('categories_origin', 'categories_origin.id', 'event.categories_origin_id')
            ->join('category', 'categories_origin.category_id', 'category.id')
            ->join('category AS program', 'category.category_parent_id', 'program.id')
            ->where('event.id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Evento obtenido exitosamente',
            'data' => ['event' => $event]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(EventRequest $request, int $id): JsonResponse
    {
        $event = Event::find($id);
        $event->course_id = $request->course_id;
        $event->origin_id = $request->origin_id;
        $event->categories_origin_id = $request->categories_origin_id;
        $event->entity_type_id = $request->entity_type_id;
        $event->name = $request->name;
        $event->municipality_id = $request->municipality_id;
        $event->place = $request->place;
        $event->user_coordinate_id = $request->user_coordinate_id;
        $event->initial_date = $request->initial_date;
        $event->final_date = $request->final_date;
        //$event->user_id = $request->user_id;
        $event->number_trainers = $request->number_trainers;
        $event->summoned_participants = $request->summoned_participants;
        $event->contract_id = $request->contract_id;
        //$event->approved_status_id = $request->approved_status_id;
        //$event->approved_date = $request->approved_date;
        $event->save();

        return response()->json([
            'status' => true,
            'message' => 'Evento actualizado exitosamente',
            'data' => ['event' => $event]
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
            $event = Event::find($id);
            $event->delete();

            return response()->json([
                'status' => true,
                'message' => 'Evento eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El Evento está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }

    public function getAuxiliaryData(Request $request): JsonResponse
    {
        $origins = Origin::getWithValidity();
        $states = ApprovedStatus::get();
        $conceptTypes = ConceptType::get();
        $entityTypes = EntityType::get();
        $categories = Category::whereNull('category.category_parent_id')->get();

        return response()->json([
            'status' => true,
            'message' => 'Auxiliares obtenidas exitosamente',
            'data' => [
                'status' => $states->toArray(),
                'origins' => $origins->toArray(),
                'conceptTypes' => $conceptTypes->toArray(),
                'entityTypes' => $entityTypes->toArray(),
                'categories' => $categories->toArray()
            ]
        ]);
    }

    public function reportLogisticSummary(Request $request): JsonResponse
    {
        $events = Event::select(
            'event.id','event.name','event.initial_date','event.final_date','municipality.name AS city',
            \DB::raw('CONCAT_WS(" ",users.lastname,users.firstname) AS nombre_completo'),
            'event.summoned_participants','program.name AS program','category.name AS subprogram',
            \DB::raw('SUM(event_concept.real_quantity * event_concept.real_unit_value) AS executed_budget')
            )
            ->Join('users', 'users.id', 'event.user_coordinate_id')
            ->Join('municipality', 'municipality.id', 'event.municipality_id')
            ->join('categories_origin', 'categories_origin.id', 'event.categories_origin_id')
            ->join('category', 'categories_origin.category_id', 'category.id')
            ->join('category AS program', 'category.category_parent_id', 'program.id')
            ->Join('event_concept', 'event.id', 'event_concept.event_id')
            ->Join('approved_status', 'approved_status.id', 'event.approved_status_id')
            ->join('concept','concept.id','event_concept.concept_id')
            ->join('concept_base','concept_base.id','concept.concept_base_id')
            ->where('event.approved_status_id',4)
            ->where('concept_base.concept_type_id','<>',2)
            ->groupBy('event.id');

        if ($request->_sort) {
            $events->orderBy($request->_sort, $request->_order);
        }

        if ($request->subprogram_id) {
            $events->where('categories_origin.category_id', $request->subprogram_id);
        }

        if ($request->search) {
            $events->where('event.name','like','%' . $request->search. '%')
                ->orWhere('users.firstname', 'like', '%' . $request->search . '%')
                ->orWhere('users.lastname', 'like', '%' . $request->search . '%')
                ->orWhere('municipality.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $events = $events->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $events = $events->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Eventos obtenidos exitosamente',
            'data' => ['events' => $events]
        ]);
    }

    public function reportTransportSummary(Request $request): JsonResponse
    {
        $events = Event::select(
            'event.id','event.name','event.initial_date','event.final_date','municipality.name AS city',
            \DB::raw('CONCAT_WS(" ",users.lastname,users.firstname) AS nombre_completo'),
            'event.summoned_participants','program.name AS program','category.name AS subprogram',
            \DB::raw('SUM(event_concept.real_quantity * event_concept.real_unit_value) AS executed_budget')
        )
            ->Join('users', 'users.id', 'event.user_coordinate_id')
            ->Join('municipality', 'municipality.id', 'event.municipality_id')
            ->join('categories_origin', 'categories_origin.id', 'event.categories_origin_id')
            ->join('category', 'categories_origin.category_id', 'category.id')
            ->join('category AS program', 'category.category_parent_id', 'program.id')
            ->Join('event_concept', 'event.id', 'event_concept.event_id')
            ->Join('approved_status', 'approved_status.id', 'event.approved_status_id')
            ->join('concept','concept.id','event_concept.concept_id')
            ->join('concept_base','concept_base.id','concept.concept_base_id')
            ->where('event.approved_status_id',4)
            ->where('concept_base.concept_type_id',2)
            ->groupBy('event.id');

        if ($request->_sort) {
            $events->orderBy($request->_sort, $request->_order);
        }

        if ($request->subprogram_id) {
            $events->where('categories_origin.category_id', $request->subprogram_id);
        }

        if ($request->search) {
            $events->where('event.name','like','%' . $request->search. '%')
                ->orWhere('users.firstname', 'like', '%' . $request->search . '%')
                ->orWhere('users.lastname', 'like', '%' . $request->search . '%')
                ->orWhere('municipality.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $events = $events->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $events = $events->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Eventos obtenidos exitosamente',
            'data' => ['events' => $events]
        ]);
    }

    public function closeEvent(int $id): JsonResponse
    {
        $event = Event::find($id);
        $event->is_close = 1;
        $event->save();

        return response()->json([
            'status' => true,
            'message' => 'Evento cerrado exitosamente',
            'data' => ['event' => $event]
        ]);
    }
}
