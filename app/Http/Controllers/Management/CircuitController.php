<?php

namespace App\Http\Controllers\Management;

use App\Models\Circuit;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CircuitRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CircuitController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $circuits = Circuit::with('status','district');

        if($request->_sort){
            $circuits->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $circuits->where('name','like','%' . $request->search. '%');
        }
        
        if ($request->status_id) {
            $circuits->where('status_id', $request->status_id);
        }

        if ($request->district_id) {
            $circuits->where('district_id', $request->district_id);
        }
        
        if($request->query("pagination", true)=="false"){
            $circuits=$circuits->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $circuits=$circuits->paginate($per_page,'*','page',$page); 
        }        

        return response()->json([
            'status' => true,
            'message' => 'Circuitos obtenidos exitosamente',
            'data' => ['circuits' => $circuits]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CircuitRequest $request
     * @return JsonResponse
     */
    public function store(CircuitRequest $request): JsonResponse
    {
        $Circuit = new Circuit;
        $Circuit->district_id = $request->district_id;
        $Circuit->status_id = $request->status_id;
        $Circuit->name = $request->name;
        $Circuit->save();

        return response()->json([
            'status' => true,
            'message' => 'Circuito creado exitosamente',
            'data' => ['circuit' => $Circuit->toArray()]
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
        $Circuit = Circuit::where('id', $id)->with('status','district')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Circuito obtenido exitosamente',
            'data' => ['circuit' => $Circuit]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CircuitRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(CircuitRequest $request, int $id): JsonResponse
    {
        $Circuit = Circuit::find($id);
        $Circuit->status_id = $request->status_id;
        $Circuit->district_id = $request->district_id;
        $Circuit->name = $request->name;
        $Circuit->save();

        return response()->json([
            'status' => true,
            'message' => 'Circuito actualizado exitosamente',
            'data' => ['circuit' => $Circuit]
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
            $Circuit = Circuit::find($id);
            $Circuit->delete();

            return response()->json([
                'status' => true,
                'message' => 'Circuito eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El Circuito está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
