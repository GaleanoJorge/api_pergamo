<?php

namespace App\Http\Controllers\Management;

use App\Models\Dependence;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\DependenceRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DependenceController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $dependences = Dependence::with('status');

        if($request->_sort){
            $dependences->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $dependences->where('name','like','%' . $request->search. '%');
        }

        if ($request->status_id) {
            $dependences->where('status_id', $request->status_id);
        }
        
        if($request->query("pagination", true)=="false"){
            $dependences=$dependences->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $dependences=$dependences->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Dependencias obtenidas exitosamente',
            'data' => ['dependences' => $dependences]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DependenceRequest $request
     * @return JsonResponse
     */
    public function store(DependenceRequest $request): JsonResponse
    {
        $Dependence = new Dependence;
        $Dependence->status_id = $request->status_id;
        $Dependence->name = $request->name;
        $Dependence->save();

        return response()->json([
            'status' => true,
            'message' => 'Dependencia creada exitosamente',
            'data' => ['dependence' => $Dependence->toArray()]
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
        $Dependence = Dependence::where('id', $id)->with('status')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Dependencia obtenida exitosamente',
            'data' => ['dependence' => $Dependence]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DependenceRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(DependenceRequest $request, int $id): JsonResponse
    {
        $Dependence = Dependence::find($id);
        $Dependence->status_id = $request->status_id;
        $Dependence->name = $request->name;
        $Dependence->save();

        return response()->json([
            'status' => true,
            'message' => 'Dependencia actualizada exitosamente',
            'data' => ['dependence' => $Dependence]
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
            $Dependence = Dependence::find($id);
            $Dependence->delete();

            return response()->json([
                'status' => true,
                'message' => 'Dependencia eliminada exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La Dependencia está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
