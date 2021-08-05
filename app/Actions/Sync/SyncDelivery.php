<?php

namespace App\Actions\Sync;

use Exception;
use App\Models\Activity;
use App\Models\Delivery;

class SyncDelivery extends Sync
{
    /**
     * Sync delivery of connect
     *
     * @param array $data
     * @return void
     */
    public function handle(array $data): void
    {
        $institutionId = $this->institutionIdByMac($data['mac']);
        $student = GetStudentBySyncId::handle($data['userid'], $institutionId);

        if (!$student) {
            throw new Exception("El estudiante por asociar a la entrega no existe", 423);
        }

        $userId = $student->id;

        $delivery = Delivery::where([
            ['activity_id', $data['idActivity']],
            ['user_id', $userId],
            ['sync_id', $data['id']],
        ])->get();

        if (!$delivery->count()) {
            $activityId = $data['idActivity'];
            $activity = Activity::find($activityId);

            if (!$activity) {
                throw new Exception("La actividad ($activityId) no existe", 423);
            }

            $newDelivery = new Delivery;
            $newDelivery->activity_id = $activityId;
            $newDelivery->user_id = $userId;
            $newDelivery->sync_id = $data['id'];

            if (isset($data['filesExist']) && $data['filesExist']) {
                $newDelivery->file_name = "EN COLA";
                $newDelivery->file_path = "EN COLA";
            }

            $newDelivery->save();
        } else {
            $delivery = $delivery->first();

            if (isset($data['filesExist']) && $data['filesExist']) {
                $delivery->file_path = "EN COLA";
                $delivery->save();
            }
        }

        $this->registerLog($institutionId, 'delivery', $data);
    }
}
