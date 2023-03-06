<?php

namespace App\Http\Controllers\Management;

use App\Models\BaseAdhesionTc;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BaseAdhesionTcRequest;
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
        $BaseAdhesionTc = BaseAdhesionTc::select();

        if ($request->_sort) {
            $BaseAdhesionTc->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $BaseAdhesionTc->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $BaseAdhesionTc->where('status_id', $request->status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $BaseAdhesionTc = $BaseAdhesionTc->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $BaseAdhesionTc = $BaseAdhesionTc->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Base adherencia obtenidos exitosamente',
            'data' => ['base_adhesion_tc' => $BaseAdhesionTc]
        ]);
    }

    public function store(BaseAdhesionTcRequest $request): JsonResponse
    {
        $BaseAdhesionTc = new BaseAdhesionTc;
        $BaseAdhesionTc->agent = $request->agent;
        $BaseAdhesionTc->name = $request->name;
        $BaseAdhesionTc->date_init = $request->date_init;
        $BaseAdhesionTc->date_end = $request->date_end;
        $BaseAdhesionTc->total_login = $request->total_login;
        $BaseAdhesionTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Base adherencia creados exitosamente',
            'data' => ['base_adhesion_tc' => $BaseAdhesionTc->toArray()]
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
        $BaseAdhesionTc = BaseAdhesionTc::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Base adherencia obtenidos exitosamente',
            'data' => ['base_adhesion_tc' => $BaseAdhesionTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BaseAdhesionTcRequest $request, int $id): JsonResponse
    {
        $BaseAdhesionTc = new BaseAdhesionTc;
        $BaseAdhesionTc->agent = $request->agent;
        $BaseAdhesionTc->name = $request->name;
        $BaseAdhesionTc->date_init = $request->date_init;
        $BaseAdhesionTc->date_end = $request->date_end;
        $BaseAdhesionTc->total_login = $request->total_login;
        $BaseAdhesionTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Base adherencia actualizados exitosamente',
            'data' => ['base_adhesion_tc' => $BaseAdhesionTc]
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

            $BaseAdhesionTc = new BaseAdhesionTc;
            if(isset($item['Agent'])){
                $BaseAdhesionTc->agent  = $item['Agent'];
            }
            if(isset($item['Name'])){
                $BaseAdhesionTc->name  = $item['Name'];
            }
            if(isset($item['Date Init'])){
                $BaseAdhesionTc->date_init  = $item['Date Init'];
            }
            if(isset($item['Date End'])){
                $BaseAdhesionTc->date_end  = $item['Date End'];
            }
            if(isset($item['Total Login'])){
                $BaseAdhesionTc->total_login = $item['Total Login'];
            }

            $BaseAdhesionTc->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Base adherencia actualizados exitosamente',
            'data' => ['base_adhesion_tc' => $BaseAdhesionTc]
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
            $BaseAdhesionTc = BaseAdhesionTc::find($id);
            $BaseAdhesionTc->delete();

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
