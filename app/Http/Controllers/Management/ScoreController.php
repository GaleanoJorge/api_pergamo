<?php

namespace App\Http\Controllers\Management;

use App\Actions\Sync\SyncScore;
use App\Models\Score;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScoreSyncRequest;

class ScoreController extends Controller
{
    /**
     * Get the Score by delivery id
     *
     * @param integer $deliveryId
     * @return JsonResponse
     */
    public function getByDelivery(int $deliveryId): JsonResponse
    {
        $scores = Score::where('delivery_id', $deliveryId)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Calificaciones por entregas obtenidas exitosamente.',
            'data' => ['scores' => $scores]
        ]);
    }

    /**
     * Sync score of connect
     *
     * @param ScoreSyncRequest $request
     * @param SyncScore $sync
     * @return JsonResponse
     */
    public function syncOfConnect(
        ScoreSyncRequest $request,
        SyncScore $sync
    ): JsonResponse {

        $sync->handle($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Calificación por rubrica sincronizada exitosamente.'
        ]);
    }
}
