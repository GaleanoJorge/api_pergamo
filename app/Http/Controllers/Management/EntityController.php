<?php

namespace App\Http\Controllers\Management;

use App\Models\Entity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\EntityRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $entitys = Entity::with('status','entity');

        if($request->_sort){
            $entitys->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $entitys->where('name','like','%' . $request->search. '%');
            
        }
        
        if ($request->status_id) {
            $entitys->where('status_id', $request->status_id);
        }
        if ($request->entity_parent_id) {
            $entitys->where('entity_parent_id', $request->entity_parent_id);
        }
        if($request->query("pagination", true)=="false"){
            $entitys=$entitys->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $entitys=$entitys->paginate($per_page,'*','page',$page); 
        }  

        return response()->json([
            'status' => true,
            'message' => 'Entidades obtenidas exitosamente',
            'data' => ['entitys' => $entitys]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EntityRequest $request
     * @return JsonResponse
     */
    public function store(EntityRequest $request): JsonResponse
    {
        $Entity = new Entity;
        $Entity->status_id = $request->status_id;
        $Entity->entity_parent_id = $request->entity_parent_id;
        $Entity->is_judicial = $request->is_judicial;
        $Entity->name = $request->name;
        $Entity->save();

        return response()->json([
            'status' => true,
            'message' => 'Entidad creada exitosamente',
            'data' => ['entity' => $Entity->toArray()]
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
        $Entity = Entity::where('id', $id)->with('status','entity')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Entidad obtenida exitosamente',
            'data' => ['entity' => $Entity]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EntityRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(EntityRequest $request, int $id): JsonResponse
    {
        $Entity = Entity::find($id);
        $Entity->status_id = $request->status_id;
        $Entity->entity_parent_id = $request->entity_parent_id;
        $Entity->is_judicial = $request->is_judicial;
        $Entity->name = $request->name;
        $Entity->save();

        return response()->json([
            'status' => true,
            'message' => 'Entidad actualizada exitosamente',
            'data' => ['entity' => $Entity]
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
            $Entity = Entity::find($id);
            $Entity->delete();

            return response()->json([
                'status' => true,
                'message' => 'Entidad eliminada exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La Entidad está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}

