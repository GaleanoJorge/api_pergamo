<?php

namespace App\Http\Controllers\Management;

use App\Models\Office;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfficeRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $offices = Office::with('status');

        if($request->_sort){
            $offices->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $offices->where('name','like','%' . $request->search. '%');
        }
        
        if ($request->status_id) {
            $offices->where('status_id', $request->status_id);
        }
        
        if($request->query("pagination", true)=="false"){
            $offices=$offices->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $offices=$offices->paginate($per_page,'*','page',$page); 
        }

        return response()->json([
            'status' => true,
            'message' => 'Despachos obtenidos exitosamente',
            'data' => ['offices' => $offices]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OfficeRequest $request
     * @return JsonResponse
     */
    public function store(OfficeRequest $request): JsonResponse
    {
        $Office = new Office;
        $Office->status_id = $request->status_id;
        $Office->name = $request->name;
        $Office->save();

        return response()->json([
            'status' => true,
            'message' => 'Despacho creado exitosamente',
            'data' => ['office' => $Office->toArray()]
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
        $Office = Office::where('id', $id)->with('status')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Despacho obtenido exitosamente',
            'data' => ['office' => $Office]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OfficeRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(OfficeRequest $request, int $id): JsonResponse
    {
        $Office = Office::find($id);
        $Office->status_id = $request->status_id;
        $Office->name = $request->name;
        $Office->save();

        return response()->json([
            'status' => true,
            'message' => 'Despacho actualizado exitosamente',
            'data' => ['office' => $Office]
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
            $Office = Office::find($id);
            $Office->delete();

            return response()->json([
                'status' => true,
                'message' => 'Despacho eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El Despacho está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
