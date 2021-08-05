<?php

namespace App\Http\Controllers\Management;

use App\Models\Delivery;
use Illuminate\Http\JsonResponse;
use App\Actions\Sync\SyncDelivery;
use App\Http\Controllers\Controller;
use App\Actions\Sync\SyncFileDelivery;
use App\Http\Requests\DeliverySyncRequest;
use App\Http\Requests\FilesDeliverySyncRequest;

class DeliveryController extends Controller
{
    /**
     * Get the Delivery by activity id
     *
     * @param integer $activityId
     * @return JsonResponse
     */
    public function getByActivity(int $activityId): JsonResponse
    {
        $deliveries = Delivery::where('activity_id', $activityId)
            ->with(
                'user',
                'group_activity.user_group_activities.user_role_course.user_role.user'
            )
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Entregas por actividad obtenidos exitosamente.',
            'data' => ['deliveries' => $deliveries]
        ]);
    }

    /**
     * Get the group activity by delivery activity id
     *
     * @param integer $deliveryId
     * @return JsonResponse
     */
    public function getGroupActivity(int $deliveryId): JsonResponse
    {
        $deliverieGroupActivities = Delivery::where('id', $deliveryId)
            ->with(
                'activity',
                'group_activity.user_group_activities.user_role_course.user_role.user'
            )->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Grupo de actividades por entrega obtenidos exitosamente.',
            'data' => ['deliverieGroupActivities' => $deliverieGroupActivities]
        ]);
    }

    /**
     * Sync delivery of connect
     *
     * @param DeliverySyncRequest $request
     * @param SyncDelivery $sync
     * @return JsonResponse
     */
    public function syncOfConnect(
        DeliverySyncRequest $request,
        SyncDelivery $sync
    ): JsonResponse {
        $sync->handle($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Entrega sincronizada exitosamente.',
        ]);
    }

    /**
     * Sync files delivery of connect
     *
     * @param FilesDeliverySyncRequest $request
     * @param SyncFileDelivery $sync
     * @return JsonResponse
     */
    public function fileSyncOfConnect(
        FilesDeliverySyncRequest $request,
        SyncFileDelivery $sync
    ): JsonResponse {
        $sync->handle($request);

        return response()->json([
            'status' => true,
            'message' => 'Archivos de la entrega sincronizada exitosamente.',
        ]);
    }
}
