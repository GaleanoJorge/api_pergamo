<?php

namespace App\Http\Controllers\Management;

use App\Models\NursingTypePhysical;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NursingTypePhysicalRequest;
use Illuminate\Database\QueryException;

class NursingTypePhysicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $NursingTypePhysical = NursingTypePhysical::select();

        if ($request->ch_record_id) {
            $NursingTypePhysical->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if($request->_sort){
            $NursingTypePhysical->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $NursingTypePhysical->where('name','like','%' . $request->search. '%');
        }
   
        if($request->query("pagination", true)=="false"){
            $NursingTypePhysical=$NursingTypePhysical->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $NursingTypePhysical=$NursingTypePhysical->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'examen fisico de enfermeria asociado exitosamente',
            'data' => ['nursing_type_physical' => $NursingTypePhysical]
        ]);
    }

    
    public function store(NursingTypePhysicalRequest $request)
    {
        $NursingTypePhysical = new NursingTypePhysical;
        $NursingTypePhysical->name = $request->name; 
        $NursingTypePhysical->save();

        return response()->json([
            'status' => true,
            'message' => 'examen fisico de enfermeria creadas exitosamente',
            'data' => ['nursing_type_physical' => $NursingTypePhysical->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $NursingTypePhysical = NursingTypePhysical::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'examen fisico de enfermeria obtenidas exitosamente',
            'data' => ['nursing_type_physical' => $NursingTypePhysical]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(NursingTypePhysicalRequest $request, int $id): JsonResponse
    {
        $NursingTypePhysical = NursingTypePhysical::find($id);
        $NursingTypePhysical->name = $request->name; 
        $NursingTypePhysical->save();

        return response()->json([
            'status' => true,
            'message' => 'examen fisico de enfermeria actualizadas exitosamente',
            'data' => ['nursing_type_physical' => $NursingTypePhysical]
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
            $NursingTypePhysical = NursingTypePhysical::find($id);
            $NursingTypePhysical->delete();

            return response()->json([
                'status' => true,
                'message' => 'examen fisico de enfermeria eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'examen fisico de enfermeria estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
