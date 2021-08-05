<?php

namespace App\Http\Controllers\Management;

use App\Models\Subarea;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubareaRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SubareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $subareas = Subarea::with('status');

        if($request->_sort){
            $subareas->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $subareas->where('name','like','%' . $request->search. '%');
        }

        if ($request->status_id) {
            $subareas->where('status_id', $request->status_id);
        }
        
        if($request->query("pagination", true)=="false"){
            $subareas=$subareas->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $subareas = $subareas->paginate($per_page,'*','page',$page);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Subareas obtenidas exitosamente',
            'data' => ['subareas' => $subareas]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SubareaRequest  $request
     * @return JsonResponse
     */
    public function store(SubareaRequest $request): JsonResponse
    {
        $subarea = new Subarea;
        $subarea->status_id = $request->status_id;
        $subarea->name = $request->name;
        $subarea->description = $request->description;
        $subarea->save();

        return response()->json([
            'status' => true,
            'message' => 'Subárea creada exitosamente',
            'data' => ['subarea' => $subarea->toArray()]
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
        $subarea = Subarea::where('id', $id)->with('status')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Subárea obtenida exitosamente',
            'data' => ['subarea' => $subarea]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SubareaRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(SubareaRequest $request, $id): JsonResponse
    {
        $subarea = Subarea::find($id);
        $subarea->status_id = $request->status_id;
        $subarea->name = $request->name;
        $subarea->description = $request->description;
        $subarea->save();

        return response()->json([
            'status' => true,
            'message' => 'Subárea actualizada exitosamente',
            'data' => ['subarea' => $subarea]
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        try {
            $subarea = Subarea::find($id);
            $subarea->delete();

            return response()->json([
                'status' => true,
                'message' => 'Subárea eliminada exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Subárea está en uso, no es posible eliminarla.',
            ], 423);
        }
    }
}
