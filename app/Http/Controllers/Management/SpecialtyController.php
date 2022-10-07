<?php

namespace App\Http\Controllers\Management;

use App\Models\Specialty;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialtyRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $specialtys = Specialty::select('specialty.*')
            ->with('status');

        if($request->_sort){
            $specialtys->orderBy($request->_sort, $request->_order);
        }           
        
        if ($request->type_professional) {
            $specialtys->where('type_professional_id', $request->type_professional);
        }

        if ($request->search) {
            $specialtys->where('name','like','%' . $request->search. '%');
        }
        
        if ($request->status_id) {
            $specialtys->where('status_id', $request->status_id);
        }

        if($request->assistance){
            $specialtys->leftJoin('assistance_special', 'specialty.id', 'assistance_special.specialty_id')
                ->WhereNotNull('assistance_special.assistance_id')
                ->groupBy('name');
        }
        
        if($request->query("pagination", true)=="false"){
            $specialtys=$specialtys->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $specialtys=$specialtys->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Especialidades obtenidas exitosamente',
            'data' => ['specialtys' => $specialtys]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SpecialtyRequest $request
     * @return JsonResponse
     */
    public function store(SpecialtyRequest $request): JsonResponse
    {
        $Specialty = new Specialty;
        $Specialty->status_id = $request->status_id;
        $Specialty->name = $request->name;
        $Specialty->type_professional_id = $request->type_professional_id;
        $Specialty->save();

        return response()->json([
            'status' => true,
            'message' => 'Especialidad creada exitosamente',
            'data' => ['specialty' => $Specialty->toArray()]
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
        $Specialty = Specialty::where('id', $id)->with('status')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Especialidad obtenida exitosamente',
            'data' => ['specialty' => $Specialty]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SpecialtyRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(SpecialtyRequest $request, int $id): JsonResponse
    {
        $Specialty = Specialty::find($id);
        $Specialty->status_id = $request->status_id;
        $Specialty->name = $request->name;
        $Specialty->type_professional_id = $request->type_professional_id;

        $Specialty->save();

        return response()->json([
            'status' => true,
            'message' => 'Especialidad actualizada exitosamente',
            'data' => ['specialty' => $Specialty]
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
            $Specialty = Specialty::find($id);
            $Specialty->delete();

            return response()->json([
                'status' => true,
                'message' => 'Especialidad eliminada exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La Especialidad está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
