<?php

namespace App\Actions\Sync;

use Exception;
use Carbon\Carbon;
use App\Models\LogsSync;
use App\Models\InstitutionMac;
use App\Actions\File\RegisterInFileAction;

class Sync
{
    /**
     * Get institution id by mac
     *
     * @param string $mac
     * @return integer
     */
    public function institutionIdByMac(string $mac): int
    {
        $institution = InstitutionMac::where('mac', $mac)->get();

        if (!$institution->count()) {
            throw new Exception("No existe ninguna institución con la MAC enviada", 423);
        }

        return $institution->first()->educational_institution_id;
    }

    /**
     * Convert string utf8
     *
     * @param string $text
     * @return string
     */
    public function convertUtf8(string $text): string
    {
        $str = str_replace(['\r', '\n', '\t'], ' ', $text);
        $str = str_replace('\u', 'u', $str);
        $strReplaced = preg_replace('/u([\da-fA-F]{4})/', '&#x\1;', $str);

        return html_entity_decode($strReplaced);
    }

    /**
     * Register log when sync of connect
     *
     * @param integer $institutionId
     * @param string $service
     * @param array $data
     * @return void
     */
    public function registerLog(int $institutionId, string $service, array $data): void
    {
        $log = new LogsSync;
        $log->educational_institution_id = $institutionId;
        $log->service = $service;
        $log->save();

        $dataFile = $log->id . ';' . $institutionId . ';' . $service . ';' .
            json_encode($data) . ';' . Carbon::now();
        $nameFile = $service . '.log';

        RegisterInFileAction::handle($dataFile, $nameFile, 'logs_sync');
    }
}
