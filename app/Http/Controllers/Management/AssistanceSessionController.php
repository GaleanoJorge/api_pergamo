<?php

namespace App\Http\Controllers\Management;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssistanceSessionRequest;
use App\Models\AssistanceSession;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AssistanceSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Asistencias obtenidas exitosamente',
            'data' => ['assistanceSession' => []]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  AssistanceSessionRequest $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assistanceSession = AssistanceSession::where([
            ['session_id', $request->session_id],
            ['user_role_group_id', $request->user_role_group_id]
        ])->get();

        if (!$assistanceSession->count()) {
            $assistanceSession = new AssistanceSession();
            $assistanceSession->session_id = $request->session_id;
            $assistanceSession->user_role_group_id = $request->user_role_group_id;
            $assistanceSession->start_time = $request->start_time;
            $assistanceSession->closing_time = $request->closing_time;
            $assistanceSession->start_time_night = $request->start_time_night;
            $assistanceSession->closing_time_night = $request->closing_time_night;
            $assistanceSession->save();
        } else {
            $assistanceSession = $assistanceSession->first();
            $assistanceSession->session_id = $request->session_id;
            $assistanceSession->user_role_group_id = $request->user_role_group_id;
            $assistanceSession->start_time = $request->start_time;
            $assistanceSession->closing_time = $request->closing_time;
            $assistanceSession->start_time_night = $request->start_time_night;
            $assistanceSession->closing_time_night = $request->closing_time_night;
            $assistanceSession->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Asistencia creada exitosamente',
            'data' => ['assistanceSession' => $assistanceSession->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assistanceSession = AssistanceSession::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Asistencia obtenida exitosamente',
            'data' => ['assistance_session' => $assistanceSession]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByUserRoleGroup($idSession, $idURG)
    {
        $assistanceSession = AssistanceSession::where([
            ['session_id', $idSession],
            ['user_role_group_id', $idURG],
        ])->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Asistencia obtenida exitosamente',
            'data' => ['assistance_session' => $assistanceSession]
        ]);
    }
}
