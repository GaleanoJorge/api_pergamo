<?php

namespace App\Http\Controllers\Management;

use App\Models\District;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $districts = District::with('status','sectional_council');

        if($request->_sort){
            $districts->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $districts->where('name','like','%' . $request->search. '%');
            /* $districts->where('sectional_council.name','like','%' . $request->search. '%'); */
        }

        if ($request->status_id) {
            $districts->where('status_id', $request->status_id);
        }

        if ($request->sectional_council_id) {
            $districts->where('sectional_council_id', $request->sectional_council_id);
        }
        
        if($request->query("pagination", true)=="false"){
            $districts=$districts->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $districts=$districts->paginate($per_page,'*','page',$page); 
        }

        return response()->json([
            'status' => true,
            'message' => 'Distritos obtenidos exitosamente',
            'data' => ['districts' => $districts]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DistrictRequest $request
     * @return JsonResponse
     */
    public function store(DistrictRequest $request): JsonResponse
    {
        $District = new District;
        $District->sectional_council_id = $request->sectional_council_id;
        $District->status_id = $request->status_id;
        $District->name = $request->name;
        $District->save();

        return response()->json([
            'status' => true,
            'message' => 'Distrito creado exitosamente',
            'data' => ['district' => $District->toArray()]
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
        $District = District::where('id', $id)->with('status','sectional_council')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Distrito obtenido exitosamente',
            'data' => ['district' => $District]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DistrictRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(DistrictRequest $request, int $id): JsonResponse
    {
        $District = District::find($id);
        $District->status_id = $request->status_id;
        $District->sectional_council_id = $request->sectional_council_id;
        $District->name = $request->name;
        $District->save();

        return response()->json([
            'status' => true,
            'message' => 'Distrito actualizado exitosamente',
            'data' => ['district' => $District]
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
            $District = District::find($id);
            $District->delete();

            return response()->json([
                'status' => true,
                'message' => 'Distrito eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El Distrito está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
