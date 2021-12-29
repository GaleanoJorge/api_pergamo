<?php

namespace App\Http\Controllers\Management;

use App\Models\UserChange;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserChangeRequest;
use Illuminate\Database\QueryException;

class UserChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $UserChange = UserChange::select();

        if($request->_sort){
            $UserChange->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $UserChange->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $UserChange = $UserChange->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $UserChange=$UserChange->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Cambio de usuario asociado exitosamente',
            'data' => ['user_change' => $UserChange]
        ]);
    }

 
    public function store(Request $request): JsonResponse
    {
        $UserChange = new UserChange;
        
        $UserChange->wrong_user_id = $request->wrong_user_id;
        $UserChange->right_user_id = $request->right_user_id;
        $UserChange->observation_novelty_id = $request->observation_novelty_id;
        $UserChange->save();

        return response()->json([
            'status' => true,
            'message' => 'Cambio de usuario creado exitosamente',
            'data' => ['user_change' => $UserChange->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id):  JsonResponse
    {
        $UserChange = UserChange::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cambio de usuario obtenido exitosamente',
            'data' => ['UserChange' => $UserChange]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function update(UserChangeRequest $request, int $id): JsonResponse
    {
        $UserChange = UserChange::find($id);
        
        $UserChange->wrong_user_id = $request->user_id;
        $UserChange->right_user_id = $request->user_id;
        $UserChange->observation_novelty_id = $request->observation_novelty_id;
        $UserChange->save();

        return response()->json([
            'status' => true,
            'message' => 'Cambio de usuario actualizado exitosamente',
            'data' => ['user_change' => $UserChange->toArray()]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $UserChange = UserChange::find($id);
            $UserChange->delete();

            return response()->json([
                'status' => true,
                'message' => 'Cambio de usuario eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cambio de usuario esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
