<?php

namespace App\Http\Controllers\Management;

use App\Models\BaseAdhesionTC;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BaseAdhesionTCRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class BaseAdhesionTcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $BaseAdhesionTC = BaseAdhesionTC::select();

        if ($request->_sort) {
            $BaseAdhesionTC->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $BaseAdhesionTC->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $BaseAdhesionTC->where('status_id', $request->status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $BaseAdhesionTC = $BaseAdhesionTC->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $BaseAdhesionTC = $BaseAdhesionTC->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Base adherencia obtenidos exitosamente',
            'data' => ['base_adhesion_tc' => $BaseAdhesionTC]
        ]);
    }

    public function store(BaseAdhesionTCRequest $request): JsonResponse
    {
        $BaseAdhesionTC = new BaseAdhesionTC;
        $BaseAdhesionTC->agent = $request->agent;
        $BaseAdhesionTC->name = $request->name;
        $BaseAdhesionTC->date_init = $request->date_init;
        $BaseAdhesionTC->date_end = $request->date_end;
        $BaseAdhesionTC->total_login = $request->total_login;
        $BaseAdhesionTC->save();

        return response()->json([
            'status' => true,
            'message' => 'Base adherencia creados exitosamente',
            'data' => ['base_adhesion_tc' => $BaseAdhesionTC->toArray()]
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
        $BaseAdhesionTC = BaseAdhesionTC::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Base adherencia obtenidos exitosamente',
            'data' => ['base_adhesion_tc' => $BaseAdhesionTC]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BaseAdhesionTCRequest $request, int $id): JsonResponse
    {
        $BaseAdhesionTC = new BaseAdhesionTC;
        $BaseAdhesionTC->agent = $request->agent;
        $BaseAdhesionTC->name = $request->name;
        $BaseAdhesionTC->date_init = $request->date_init;
        $BaseAdhesionTC->date_end = $request->date_end;
        $BaseAdhesionTC->total_login = $request->total_login;
        $BaseAdhesionTC->save();

        return response()->json([
            'status' => true,
            'message' => 'Base adherencia actualizados exitosamente',
            'data' => ['base_adhesion_tc' => $BaseAdhesionTC]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function import(Request $request): JsonResponse
    {
        foreach ($request->toArray() as $key => $item) {

            $BaseAdhesionTC = new BaseAdhesionTC;
            if(isset($item['Agent'])){
                $BaseAdhesionTC->agent  = $item['Agent'];
            }
            if(isset($item['Name'])){
                $BaseAdhesionTC->name  = $item['Name'];
            }
            if(isset($item['Date Init'])){
                $BaseAdhesionTC->date_init  = $item['Date Init'];
            }
            if(isset($item['Date End'])){
                $BaseAdhesionTC->date_end  = $item['Date End'];
            }
            if(isset($item['Total Login'])){
                $BaseAdhesionTC->total_login = $item['Total Login'];
            }

            $BaseAdhesionTC->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Base adherencia actualizados exitosamente',
            'data' => ['base_adhesion_tc' => $BaseAdhesionTC]
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
            $BaseAdhesionTC = BaseAdhesionTC::find($id);
            $BaseAdhesionTC->delete();

            return response()->json([
                'status' => true,
                'message' => 'Base adherencia eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Base adherencia esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
