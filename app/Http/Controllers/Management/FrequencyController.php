<?php

namespace App\Http\Controllers\Management;

use App\Models\Frequency;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\FrequencyRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FrequencyController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $Frequency = Frequency::select();

        if ($request->_sort) {
            $Frequency->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Frequency->where('name','like','%' . $request->search. '%');
        }

        if ($request->query("pagination", true) === "false") {
            $Frequency = $Frequency->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Frequency = $Frequency->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia obtenidos exitosamente',
            'data' => ['frequency' => $Frequency]
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
        $Frequency = new Frequency;
        $Frequency->name = $request->name;
        $Frequency->save();
        

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia creado exitosamente',
            'data' => ['frequency' => $Frequency->toArray()]
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
        $Frequency = Frequency::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia obtenido exitosamente',
            'data' => ['frequency' => $Frequency]
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
        $Frequency = Frequency::find($id);
        $Frequency->name = $request->name;
        $Frequency->save();
        

        return response()->json([
            'status' => true,
            'message' => 'Frecuencia actualizado exitosamente',
            'data' => ['frequency' => $Frequency]
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
            $Frequency = Frequency::find($id);
            $Frequency->delete();

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
