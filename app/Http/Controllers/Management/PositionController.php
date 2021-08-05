<?php

namespace App\Http\Controllers\Management;

use App\Models\Position;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\PositionRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $positions = Position::with('status');

        if($request->_sort){
            $positions->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $positions->where('name','like','%' . $request->search. '%');
        }

        if ($request->status_id) {
            $positions->where('status_id', $request->status_id);
        }
        
        if($request->query("pagination", true)=="false"){
            $positions=$positions->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $positions=$positions->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Cargos obtenidos exitosamente',
            'data' => ['positions' => $positions]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PositionRequest $request
     * @return JsonResponse
     */
    public function store(PositionRequest $request): JsonResponse
    {
        $Position = new Position;
        $Position->status_id = $request->status_id;
        $Position->is_judicial=$request->is_judicial;
        $Position->name = $request->name;
        $Position->save();

        return response()->json([
            'status' => true,
            'message' => 'Cargo creado exitosamente',
            'data' => ['position' => $Position->toArray()]
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
        $Position = Position::where('id', $id)->with('status')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cargo obtenido exitosamente',
            'data' => ['position' => $Position]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PositionRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(PositionRequest $request, int $id): JsonResponse
    {
        $Position = Position::find($id);
        $Position->status_id = $request->status_id;
        $Position->is_judicial = $request->is_judicial;
        $Position->name = $request->name;
        $Position->save();

        return response()->json([
            'status' => true,
            'message' => 'Cargo actualizado exitosamente',
            'data' => ['position' => $Position]
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
            $Position = Position::find($id);
            $Position->delete();

            return response()->json([
                'status' => true,
                'message' => 'Cargo eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El Cargo está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
