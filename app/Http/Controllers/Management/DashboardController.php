<?php

namespace App\Http\Controllers\Management;

use App\Models\Dashboard;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Dashboard = Dashboard::select();

        if ($request->_sort) {
            $Dashboard->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Dashboard->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('link', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $Dashboard = $Dashboard->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Dashboard = $Dashboard->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Tableros obtenidos exitosamente',
            'data' => ['dashboard' => $Dashboard]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $Dashboard = new Dashboard;
        $Dashboard->name = $request->name;
        $Dashboard->link = $request->link;
        $Dashboard->save();

        return response()->json([
            'status' => true,
            'message' => 'Tableros creados exitosamente',
            'data' => ['dashboard' => $Dashboard->toArray()]
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
        $Dashboard = Dashboard::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tableros obtenidos exitosamente',
            'data' => ['dashboard' => $Dashboard]
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
        $Dashboard = Dashboard::find($id);
        $Dashboard->name = $request->name;
        $Dashboard->link = $request->link;
        $Dashboard->save();

        return response()->json([
            'status' => true,
            'message' => 'Tableros actualizados exitosamente',
            'data' => ['dashboard' => $Dashboard]
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
            $Dashboard = Dashboard::find($id);
            $Dashboard->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tableros eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tableros estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
