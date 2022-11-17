<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReasonCancelRequest;
use App\Models\ReasonCancel;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ReasonCancelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $reason_cancel = ReasonCancel::select('reason_cancel.*')
        ->with(
            'status'
        )->orderBy('name', 'ASC');

        if($request->status){
            $reason_cancel->where('status_id', $request->status);
        }


        if ($request->_sort) {
            $reason_cancel->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $reason_cancel->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $reason_cancel = $reason_cancel->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $reason_cancel = $reason_cancel->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Motivo de cancelación obtenidos exitosamente',
            'data' => ['reason_cancel' => $reason_cancel]
        ]);
    }

    public function changeStatus(Request $request, int $id): JsonResponse
    {
        $reason_cancel = ReasonCancel::find($id);
        $reason_cancel->status_id = $request->status_id;
        $reason_cancel->save();


        return response()->json([
            'status' => true,
            'message' => 'Estado actualizado exitosamente',
            'data' => ['reason_cancel' => $reason_cancel]
        ]);
    }


    public function store(ReasonCancelRequest $request): JsonResponse
    {
        $reason_cancel = new ReasonCancel;
        $reason_cancel->name = $request->name;


        $reason_cancel->save();

        return response()->json([
            'status' => true,
            'message' => 'Motivo de cancelación asociado al paciente exitosamente',
            'data' => ['reason_cancel' => $reason_cancel->toArray()]
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
        $reason_cancel = ReasonCancel::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Motivo de cancelación obtenido exitosamente',
            'data' => ['reason_cancel' => $reason_cancel]
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
        $reason_cancel = ReasonCancel::find($id);
        $reason_cancel->name = $request->name; 
        $reason_cancel->save();

        return response()->json([
            'status' => true,
            'message' => 'Motivo de cancelación actualizado exitosamente',
            'data' => ['reason_cancel' => $reason_cancel]
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
            $reason_cancel = ReasonCancel::find($id);
            $reason_cancel->delete();

            return response()->json([
                'status' => true,
                'message' => 'Motivo de cancelación eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Motivo de cancelación en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
