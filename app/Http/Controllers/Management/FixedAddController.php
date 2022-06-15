<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedAdd;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class FixedAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedAdd = FixedAdd::with('fixed_assets', 'fixed_assets.fixed_clasification', 'fixed_location_campus','fixed_location_campus.campus', 'fixed_location_campus.flat', 'responsible_user', 'responsible_user.user', 'fixed_accessories');

        if ($request->_sort) {
            $FixedAdd->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedAdd->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedAdd = $FixedAdd->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedAdd = $FixedAdd->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Asociados act.fijos obtenidos exitosamente',
            'data' => ['fixed_add' => $FixedAdd]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedAdd = new FixedAdd;
        $FixedAdd->fixed_assets_id = $request->fixed_assets_id;
        $FixedAdd->fixed_accessories_id = $request->fixed_accessories_id;
        $FixedAdd->fixed_location_campus_id = $request->fixed_location_campus_id;
        $FixedAdd->responsible_user_id = $request->responsible_user_id;
        $FixedAdd->observation = $request->observation;
        $FixedAdd->amount_ship = $request->amount_ship;
        $FixedAdd->status = $request->status;

        $FixedAdd->save();

        return response()->json([
            'status' => true,
            'message' => 'Asociados act. fijos asociado al paciente exitosamente',
            'data' => ['fixed_add' => $FixedAdd->toArray()]
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
        $FixedAdd = FixedAdd::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Asociados act. fijos obtenido exitosamente',
            'data' => ['fixed_add' => $FixedAdd]
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
        $FixedAdd = FixedAdd::find($id);
        $FixedAdd->fixed_assets_id = $request->fixed_assets_id;
        $FixedAdd->fixed_accessories_id = $request->fixed_accessories_id;
        $FixedAdd->fixed_location_campus_id = $request->fixed_location_campus_id;
        $FixedAdd->responsible_user_id = $request->responsible_user_id;
        $FixedAdd->observation = $request->observation;
        $FixedAdd->amount_ship = $request->amount_ship;
        $FixedAdd->status = $request->status;
        $FixedAdd->save();

        return response()->json([
            'status' => true,
            'message' => 'Asociados act. fijos actualizado exitosamente',
            'data' => ['fixed_add' => $FixedAdd]
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
            $FixedAdd = FixedAdd::find($id);
            $FixedAdd->delete();

            return response()->json([
                'status' => true,
                'message' => 'Asociados act. fijos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Asociados act. fijos en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
