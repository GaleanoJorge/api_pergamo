<?php

namespace App\Jobs;

use Exception;
use App\Models\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class LogsQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $dataQuery;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $dataQuery)
    {
        $this->dataQuery = $dataQuery;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->dataQuery) {
            $log = new Log;
            $log->user_id = $this->dataQuery['user_id'];
            $log->role_id = $this->dataQuery['role_id'];
            $log->date = $this->dataQuery['date'];
            $log->query = $this->dataQuery['query'];
            $log->time = $this->dataQuery['time'];
            $log->save();
        }
    }

    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        $dataError = [
            'msg' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'previous' => $exception->getPrevious(),
            'trace' => $exception->getTrace(),
        ];

        Log::error('Error en la queue-logs', $dataError);
    }
}
