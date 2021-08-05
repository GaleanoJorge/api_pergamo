<?php

namespace App\Http\Controllers\Management;

use App\Models\Event;
use App\Models\HistoryEventApproved;
use App\Models\ApprovedStatus;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\HistoryEventApprovedRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryEventApprovedController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $observations = HistoryEventApproved::select('history_event_approved.*',
        \DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo'))
        ->Join('users', 'users.id', 'history_event_approved.user_id')
        ->with('approved_status');

        if ($request->_sort) {
            $observations->orderBy($request->_sort, $request->_order);
        }

        if ($request->event_id) {
            $observations->where('history_event_approved.event_id', $request->event_id);
        }

        if ($request->query("pagination", true) === "false") {
            $observations = $observations->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $observations = $observations->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Observaciónes del evento obtenidas exitosamente',
            'data' => ['observations' => $observations]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HistoryEventApprovedRequest $request
     * @return JsonResponse
     */
    public function store(HistoryEventApprovedRequest $request): JsonResponse
    {
        $observation = new HistoryEventApproved;
        $observation->event_id = $request->event_id;
        $observation->approved_status_id = $request->approved_status_id;
        $observation->user_id = Auth::user()->id;
        $observation->observations = $request->observations;
        $observation->save();

        Event::where('id', $request->event_id)->update(['approved_status_id'=>$request->approved_status_id,'approved_date'=>Carbon::today()]);

        HistoryEventApproved::updatePlannedBudget($request->event_id);

        return response()->json([
            'status' => true,
            'message' => 'Observación creada exitosamente',
            'data' => ['observation' => $observation->toArray()]
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
        $observation = HistoryEventApproved::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Observación obtenida exitosamente',
            'data' => ['observation' => $observation]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(HistoryEventApprovedRequest $request, int $id): JsonResponse
    {
        $observation = HistoryEventApproved::find($id);
        $observation->event_id = $request->event_id;
        $observation->approved_status_id = $request->approved_status_id;
        $observation->observations = $request->observations;
        $observation->save();

        HistoryEventApproved::updatePlannedBudget($request->event_id);


        return response()->json([
            'status' => true,
            'message' => 'Observación actualizada exitosamente',
            'data' => ['observation' => $observation]
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
            $observation = HistoryEventApproved::find($id);
            $observation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Observación eliminada exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La observación está en uso, no es posible eliminarla.',
            ], 423);
        }
    }

    public function getAuxiliaryData(Request $request): JsonResponse
    {
        $states = ApprovedStatus::get();

        return response()->json([
            'status' => true,
            'message' => 'Auxiliares obtenidas exitosamente',
            'data' => [
                'status' => $states->toArray(),
            ]
        ]);
    }
}
