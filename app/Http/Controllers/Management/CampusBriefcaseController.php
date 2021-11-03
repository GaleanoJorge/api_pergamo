<?php

namespace App\Http\Controllers\Management;

use App\Models\CampusBriefcase;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CampusBriefcaseRequest;
use Illuminate\Database\QueryException;

class CampusBriefcaseController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $CampusBriefcase = CampusBriefcase::with('campus');

        if($request->_sort){
            $CampusBriefcase->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $CampusBriefcase->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $CampusBriefcase=$CampusBriefcase->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $CampusBriefcase=$CampusBriefcase->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Sedes del portafolio obtenidos exitosamente',
            'data' => ['campus_briefcase' => $CampusBriefcase]
        ]);
    }

                 /**
     * Get campus by portafolio.
     *
     * @param  int  $briefcaseId
     * @return JsonResponse
     */
    public function getByBriefcase(Request $request, int $briefcaseId): JsonResponse
    {
        $CampusBriefcase = CampusBriefcase::where('briefcase_id', $briefcaseId)->with('campus');
        if ($request->search) {
            $CampusBriefcase->where('name', 'like', '%' . $request->search . '%')
            ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $CampusBriefcase = $CampusBriefcase->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $CampusBriefcase = $CampusBriefcase->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Portafolio por contrato obtenido exitosamente',
            'data' => ['campus_briefcase' => $CampusBriefcase]
        ]);
    }

    public function store(CampusBriefcaseRequest $request): JsonResponse
    {
        $CampusBriefcase = new CampusBriefcase;
        $CampusBriefcase->briefcase_id = $request->briefcase_id;
        $CampusBriefcase->campus_id = $request->campus_id;
        $CampusBriefcase->save();

        return response()->json([
            'status' => true,
            'message' => 'Sedes del portafolio creada exitosamente',
            'data' => ['CampusBriefcase' => $CampusBriefcase->toArray()]
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
        $CampusBriefcase = CampusBriefcase::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Sedes del portafolio obtenido exitosamente',
            'data' => ['CampusBriefcase' => $CampusBriefcase]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CampusBriefcaseRequest $request, int $id): JsonResponse
    {
        $CampusBriefcase = CampusBriefcase::find($id);
        $CampusBriefcase->briefcase_id = $request->briefcase_id;
        $CampusBriefcase->campus_id = $request->campus_id;
        
        $CampusBriefcase->save();

        return response()->json([
            'status' => true,
            'message' => 'Sedes del portafolio actualizado exitosamente',
            'data' => ['CampusBriefcase' => $CampusBriefcase]
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
            $CampusBriefcase = CampusBriefcase::find($id);
            $CampusBriefcase->delete();

            return response()->json([
                'status' => true,
                'message' => 'Sedes del portafolio eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Sedes del portafolio esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
