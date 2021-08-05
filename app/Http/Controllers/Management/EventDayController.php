<?php

namespace App\Http\Controllers\Management;

use App\Models\EventDay;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventDayRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EventDayController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $event_days = EventDay::select('*');

        if ($request->_sort) {
            $event_days->orderBy($request->_sort, $request->_order);
        }

        if ($request->event_id) {
            $event_days->where('event_day.event_id', $request->event_id);
        }

        if ($request->search) {
            $event_days->where('event_day.day_number','like','%' . $request->search. '%')
                    ->orWhere('event_day.description', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $event_days = $event_days->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $event_days = $event_days->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Días obtenidos exitosamente',
            'data' => ['event_days' => $event_days]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventDayRequest $request
     * @return JsonResponse
     */
    public function store(EventDayRequest $request): JsonResponse
    {
        $event_day = new EventDay;
        $event_day->day_number = $request->day_number;
        $event_day->date_planned = $request->date_planned;
        $event_day->description = $request->description;
        $event_day->event_id = $request->event_id;
        $event_day->save();


        return response()->json([
            'status' => true,
            'message' => 'Día creado exitosamente',
            'data' => ['event_day' => $event_day->toArray()]
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
        $event_day = EventDay::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Día obtenido exitosamente',
            'data' => ['event_day' => $event_day]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(EventDayRequest $request, int $id): JsonResponse
    {
        $event_day = EventDay::find($id);
        $event_day->day_number = $request->day_number;
        $event_day->date_planned = $request->date_planned;
        $event_day->description = $request->description;
        $event_day->event_id = $request->event_id;
        $event_day->save();

        return response()->json([
            'status' => true,
            'message' => 'Día actualizado exitosamente',
            'data' => ['event_day' => $event_day]
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
            $event_day = EventDay::find($id);
            $event_day->delete();

            return response()->json([
                'status' => true,
                'message' => 'Día eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El Día está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
