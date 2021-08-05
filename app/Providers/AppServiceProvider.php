<?php

namespace App\Providers;

use App\Jobs\LogsQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* SE DESHABILITA COMPLETAMENTE PARA INSERCION DE USUARIOS DESDE EL API PUBLICA
        Schema::defaultStringLength(191);

        $request = app(Request::class);
        $roleId = $request->role_id;

        //Register LOGS CRUD only Insert, Update and Delete
        if ($roleId) {
            DB::listen(function ($query) use ($roleId) {

                if (((strpos($query->sql, 'insert') !== false) ||
                        (strpos($query->sql, 'update') !== false) ||
                        (strpos($query->sql, 'delete') !== false)) &&
                    (strpos($query->sql, 'logs') === false) &&
                    (strpos($query->sql, 'telescope_entries') === false) &&
                    (strpos($query->sql, 'telescope_entries_tags') === false)
                ) {
                    $querySql = str_replace(['?'], ['\'%s\''], $query->sql);
                    $queryRawSql = vsprintf($querySql, $query->bindings);
                    $date = Carbon::now();

                    $dataQuery = [
                        'user_id' => Auth::user()->id,
                        'role_id' => $roleId,
                        'date' => $date,
                        'query' => $queryRawSql,
                        'time' => $query->time,
                    ];

                    //LogsQueue::dispatch($dataQuery);
                }
            });
        } */
    }
}
