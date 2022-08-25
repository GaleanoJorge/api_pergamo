<?php

namespace App\Http\Controllers\Management;

use App\Models\MedicalDiaryDays;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MedicalDiaryDaysRequest;
use Illuminate\Database\QueryException;

class MedicalDiaryDaysController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $MedicalDiaryDays = MedicalDiaryDays::select();

        if($request->_sort){
            $MedicalDiaryDays->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $MedicalDiaryDays->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $MedicalDiaryDays=$MedicalDiaryDays->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $MedicalDiaryDays=$MedicalDiaryDays->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Dias de agenda obtenidos exitosamente',
            'data' => ['Medical_diary_days' => $MedicalDiaryDays]
        ]);
    }
    

    public function store(MedicalDiaryDaysRequest $request): JsonResponse
    {
        $MedicalDiaryDays = new MedicalDiaryDays;
        $MedicalDiaryDays->name = $request->name;     
        $MedicalDiaryDays->save();

        return response()->json([
            'status' => true,
            'message' => 'Dias de agenda creados exitosamente',
            'data' => ['Medical_diary_days' => $MedicalDiaryDays->toArray()]
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
        $MedicalDiaryDays = MedicalDiaryDays::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Dias de agenda obtenidos exitosamente',
            'data' => ['Medical_diary_days' => $MedicalDiaryDays]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MedicalDiaryDaysRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(MedicalDiaryDaysRequest $request, int $id): JsonResponse
    {
        $MedicalDiaryDays = MedicalDiaryDays ::find($id);
        $MedicalDiaryDays->name = $request->name;      
        $MedicalDiaryDays->save();

        return response()->json([
            'status' => true,
            'message' => 'Dia de agenda actualizados exitosamente',
            'data' => ['Medical_diary_days' => $MedicalDiaryDays]
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
            $MedicalDiaryDays = MedicalDiaryDays::find($id);
            $MedicalDiaryDays->delete();

            return response()->json([
                'status' => true,
                'message' => 'Dia de agenda eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Dia de agenda esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
