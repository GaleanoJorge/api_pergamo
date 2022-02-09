<?php

namespace App\Http\Controllers\Management;

use App\Models\Relationship;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RelationshipRequest;
use Illuminate\Database\QueryException;

class RelationshipController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Relationship = Relationship::select();

        if($request->_sort){
            $Relationship->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Relationship->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Relationship=$Relationship->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Relationship=$Relationship->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Parentescos asociados exitosamente',
            'data' => ['relationship' => $Relationship]
        ]);
    }
    

    public function store(RelationshipRequest $request): JsonResponse
    {
        $Relationship = new Relationship;
        $Relationship->name = $request->name; 
        $Relationship->save();

        return response()->json([
            'status' => true,
            'message' => 'Parentesco creado exitosamente',
            'data' => ['relationship' => $Relationship->toArray()]
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
        $Relationship = Relationship::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Parentescos obtenidos exitosamente',
            'data' => ['relationship' => $Relationship]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(RelationshipRequest $request, int $id): JsonResponse
    {
        $Relationship = Relationship::find($id);
        $Relationship->name = $request->name; 
        $Relationship->save();

        return response()->json([
            'status' => true,
            'message' => 'Parentesco actualizado exitosamente',
            'data' => ['Relationship' => $Relationship]
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
            $Relationship = Relationship::find($id);
            $Relationship->delete();

            return response()->json([
                'status' => true,
                'message' => 'Parentesco eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Parentesco está en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
