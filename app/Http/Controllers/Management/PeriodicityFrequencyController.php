<?php

namespace App\Http\Controllers\Management;

use App\Models\PeriodicityFrequency;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\FrequencyRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeriodicityFrequencyController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $PeriodicityFrequency = PeriodicityFrequency::select();

        if ($request->_sort) {
            $PeriodicityFrequency->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PeriodicityFrequency->where('name','like','%' . $request->search. '%');
        }

        if ($request->query("pagination", true) === "false") {
            $PeriodicityFrequency = $PeriodicityFrequency->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PeriodicityFrequency = $PeriodicityFrequency->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia obtenidos exitosamente',
            'data' => ['periodicity_frequency' => $PeriodicityFrequency]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FrequencyRequest $request
     * @return JsonResponse
     */
    public function store(FrequencyRequest $request): JsonResponse
    {
        $PeriodicityFrequency = new PeriodicityFrequency;
        $PeriodicityFrequency->name = $request->name;
        $PeriodicityFrequency->save();
        

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia creado exitosamente',
            'data' => ['periodicity_frequency' => $PeriodicityFrequency->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $PeriodicityFrequency = PeriodicityFrequency::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia obtenido exitosamente',
            'data' => ['periodicity_frequency' => $PeriodicityFrequency]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $PeriodicityFrequency = PeriodicityFrequency::find($id);
        $PeriodicityFrequency->name = $request->name;
        $PeriodicityFrequency->save();
        

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia actualizado exitosamente',
            'data' => ['periodicity_frequency' => $PeriodicityFrequency]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $PeriodicityFrequency = PeriodicityFrequency::find($id);
            $PeriodicityFrequency->delete();

            return response()->json([
                'status' => true,
                'message' => 'Frecuencia eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Frecuencia está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
