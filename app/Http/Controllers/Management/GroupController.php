<?php

namespace App\Http\Controllers\Management;

use App\Models\Group;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $groups = Group::select('*');

        if($request->_sort){
            $groups->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $groups->where('name','like','%' . $request->search. '%');
            $groups->orWhere('code','like','%' . $request->search. '%');
        }
        
        if ($request->course_id) {
            $groups->where('course_id', $request->course_id);
        }
        
        if($request->query("pagination", true)=="false"){
            $groups=$groups->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $groups=$groups->paginate($per_page,'*','page',$page); 
        }  

        return response()->json([
            'status' => true,
            'message' => 'Grupos obtenidos exitosamente',
            'data' => ['groups' => $groups]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GroupRequest $request
     * @return JsonResponse
     */
    public function store(GroupRequest $request): JsonResponse
    {
        $Group = new Group;
        $Group->course_id = $request->course_id;
        $Group->code = $request->code;
        $Group->name = $request->name;
        $Group->description = $request->description;
        $Group->save();

        return response()->json([
            'status' => true,
            'message' => 'Grupo creado exitosamente',
            'data' => ['group' => $Group->toArray()]
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
        $Group = Group::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Grupo obtenido exitosamente',
            'data' => ['group' => $Group]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GroupRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(GroupRequest $request, int $id): JsonResponse
    {
        $Group = Group::find($id);
        $Group->course_id = $request->course_id;
        $Group->code = $request->code;
        $Group->name = $request->name;
        $Group->description = $request->description;
        $Group->save();

        return response()->json([
            'status' => true,
            'message' => 'Grupo actualizado exitosamente',
            'data' => ['group' => $Group]
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
            $Group = Group::find($id);
            $Group->delete();

            return response()->json([
                'status' => true,
                'message' => 'Grupo eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El grupo está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}

