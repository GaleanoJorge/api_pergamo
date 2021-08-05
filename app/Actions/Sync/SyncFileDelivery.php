<?php

namespace App\Actions\Sync;

use Exception;
use App\Models\Delivery;

class SyncFileDelivery extends Sync
{
    /**
     * Sync compress file delivery of connect
     *
     * @param mixed $data
     * @return void
     */
    public function handle($data): void
    {
        $institutionId = $this->institutionIdByMac($data->mac);
        $student = GetStudentBySyncId::handle($data->userid, $institutionId);

        if (!$student) {
            throw new Exception("El estudiante por asociar a la entrega no existe", 423);
        }

        $userId = $student->id;

        $delivery = Delivery::where([
            ['activity_id', $data->idActivity],
            ['user_id', $userId],
            ['sync_id', $data->id],
        ])->get();

        if (!$delivery->count()) {
            throw new Exception("La entrega (" . $data->id . "), de la actividad (" .
                $data->idActivity . ") y el usuario ($userId) no existe", 423);
        } else {
            $delivery = $delivery->first();
            $nameFileZip = $data->nameCompressFile;
            $filePath = 'storage/delivery/' . $nameFileZip;

            $data->compress_file->storeAs('public/delivery', $nameFileZip);

            if ($delivery->file_name != "EN COLA") {
                $pathFileOld = config('filesystems.disks.files_delivery.root')
                    . '/' . $delivery->file_name;
                if (is_file($pathFileOld)) {
                    unlink($pathFileOld);
                }
            }

            $delivery->file_name = $nameFileZip;
            $delivery->file_path = $filePath;
            $delivery->save();

            $this->registerLog($institutionId, 'files', [
                'mac' => $data->mac,
                'activity_id' => $data->idActivity,
                'user_id' => $userId,
                'sync_id' => $data->id,
                'file_name' => $nameFileZip,
                'file_path' => $filePath,
            ]);
        }
    }
}
