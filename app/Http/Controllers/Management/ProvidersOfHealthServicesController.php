<?php

namespace App\Http\Controllers\Management;

use App\Models\ProvidersOfHealthServices;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProvidersOfHealthServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ProvidersOfHealthServices = ProvidersOfHealthServices::select();

        if ($request->_sort) {
            $ProvidersOfHealthServices->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ProvidersOfHealthServices->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->country_id) {
            $ProvidersOfHealthServices->where('country_id', $request->country_id);
        }

        if ($request->region_id) {
            $ProvidersOfHealthServices->where('region_id', $request->region_id);
        }

        if ($request->municipality_id) {
            $ProvidersOfHealthServices->where('municipality_id', $request->municipality_id);
        }

        if ($request->query("pagination", true) == "false") {
            $ProvidersOfHealthServices = $ProvidersOfHealthServices->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ProvidersOfHealthServices = $ProvidersOfHealthServices->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta obtenidos exitosamente',
            'data' => ['providers_of_health_services' => $ProvidersOfHealthServices]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ProvidersOfHealthServices = new ProvidersOfHealthServices;
        $ProvidersOfHealthServices->name = $request->name;
        $ProvidersOfHealthServices->country_id  = $request->country_id;
        $ProvidersOfHealthServices->region_id  = $request->region_id;
        $ProvidersOfHealthServices->municipality_id  = $request->municipality_id;
        $ProvidersOfHealthServices->save();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta creados exitosamente',
            'data' => ['providers_of_health_services' => $ProvidersOfHealthServices->toArray()]
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
        $ProvidersOfHealthServices = ProvidersOfHealthServices::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta obtenidos exitosamente',
            'data' => ['providers_of_health_services' => $ProvidersOfHealthServices]
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
        $ProvidersOfHealthServices = ProvidersOfHealthServices::find($id);
        $ProvidersOfHealthServices->name = $request->name;
        $ProvidersOfHealthServices->country_id  = $request->country_id;
        $ProvidersOfHealthServices->region_id  = $request->region_id;
        $ProvidersOfHealthServices->municipality_id  = $request->municipality_id;
        $ProvidersOfHealthServices->save();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta actualizados exitosamente',
            'data' => ['providers_of_health_services' => $ProvidersOfHealthServices]
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
            $ProvidersOfHealthServices = ProvidersOfHealthServices::find($id);
            $ProvidersOfHealthServices->delete();

            return response()->json([
                'status' => true,
                'message' => 'Días de dieta eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Días de dieta estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
