<?php

namespace App\Http\Controllers\Management;

use App\Models\HumanTalentRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class HumanTalentRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $HumanTalentRequest = HumanTalentRequest::select('human_talent_request.*', 'role.name', 'role.id as role_id')->with('admissions.patients.locality', 'admissions.patients.residence', 'management_plan','management_plan.type_of_attention')
            ->leftJoin('management_plan', 'management_plan.id', 'human_talent_request.management_plan_id')
            ->leftJoin('role_attention', 'role_attention.type_of_attention_id', 'management_plan.type_of_attention_id')
            ->leftJoin('role', 'role.id', 'role_attention.role_id')
            ->orderBy('human_talent_request.id', 'DESC')
            ;


        if ($request->_sort) {
            $HumanTalentRequest->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $HumanTalentRequest->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->role_id) {
            if ($request->role_id == 23) { // pad
                $HumanTalentRequest->where(function ($query) use ($request) {
                    $query->where('status', 'Creada')
                        ->orWhere('status', 'Rechazada PAD')
                        ->orWhere('status', 'Aprobada PAD')
                        ->orWhere('status', 'Rechazada TH')
                        ->orWhere('status', 'Aprobada TH');
                });
            } else if ($request->role_id == 24) { // th
                $HumanTalentRequest->where(function ($query) use ($request) {
                    $query->where('status', 'Aprobada PAD')
                        ->orWhere('status', 'Aprobada TH')
                        ->orWhere('status', 'Rechazada TH');
                });
            }
        }

        if ($request->query("pagination", true) == "false") {
            $HumanTalentRequest = $HumanTalentRequest->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $HumanTalentRequest = $HumanTalentRequest->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Personal obtenidos exitosamente',
            'data' => ['human_talent_request' => $HumanTalentRequest]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $HumanTalentRequest = new HumanTalentRequest;
        $HumanTalentRequest->name = $request->name;
        $HumanTalentRequest->code = $request->code;

        $HumanTalentRequest->save();

        return response()->json([
            'status' => true,
            'message' => 'Personal creada exitosamente',
            'data' => ['human_talent_request' => $HumanTalentRequest->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $HumanTalentRequest = HumanTalentRequest::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Personal obtenido exitosamente',
            'data' => ['human_talent_request' => $HumanTalentRequest]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $HumanTalentRequest = HumanTalentRequest::find($id);
        $HumanTalentRequest->observation = $request->observation;
        $HumanTalentRequest->status = $request->status;

        $HumanTalentRequest->save();

        return response()->json([
            'status' => true,
            'message' => 'Petición actualizada exitosamente',
            'data' => ['human_talent_request' => $HumanTalentRequest]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $HumanTalentRequest = HumanTalentRequest::find($id);
            $HumanTalentRequest->delete();

            return response()->json([
                'status' => true,
                'message' => 'Personal eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Personal esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
