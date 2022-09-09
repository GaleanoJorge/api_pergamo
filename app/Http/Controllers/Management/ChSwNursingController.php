<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwNursing;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;


class ChSwNursingController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwNursing = ChSwNursing::select();

        if($request->_sort){
            $ChSwNursing->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwNursing->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwNursing=$ChSwNursing->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwNursing=$ChSwNursing->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Información servicio de enfermería obtenido exitosamente',
            'data' => ['ch_sw_nursing' => $ChSwNursing]
        ]);
    }
  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id, int $type_record_id): JsonResponse
    {


        $ChSwNursing = ChSwNursing::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChSwNursing = ChSwNursing::select('ch_sw_nursing.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_sw_nursing.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_sw_nursing' => $ChSwNursing]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChSwNursing = new ChSwNursing;
        $ChSwNursing->firstname = $request->firstname; 
        $ChSwNursing->middlefirstname = $request->middlefirstname; 
        $ChSwNursing->lastname = $request->lastname; 
        $ChSwNursing->middlelastname = $request->middlelastname; 
        $ChSwNursing->service = $request->service; 
        $ChSwNursing->phone = $request->phone; 
        $ChSwNursing->type_record_id = $request->type_record_id; 
        $ChSwNursing->ch_record_id = $request->ch_record_id; 
        $ChSwNursing->save();

        return response()->json([
            'status' => true,
            'message' => 'Información servicio de enfermería asociada al paciente exitosamente',
            'data' => ['ch_sw_nursing' => $ChSwNursing->toArray()]
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
        $ChSwNursing = ChSwNursing::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Información servicio de enfermería obtenida exitosamente',
            'data' => ['ch_sw_nursing' => $ChSwNursing]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $ChSwNursing = ChSwNursing::find($id);  
        $ChSwNursing->firstname = $request->firstname; 
        $ChSwNursing->middlefirstname = $request->middlefirstname; 
        $ChSwNursing->lastname = $request->lastname; 
        $ChSwNursing->middlelastname = $request->middlelastname; 
        $ChSwNursing->service = $request->service; 
        $ChSwNursing->phone = $request->phone; 
        $ChSwNursing->type_record_id = $request->type_record_id; 
        $ChSwNursing->ch_record_id = $request->ch_record_id; 
        $ChSwNursing->save();

        return response()->json([
            'status' => true,
            'message' => 'Información servicio de enfermería  actualizada exitosamente',
            'data' => ['ch_sw_nursing' => $ChSwNursing]
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
            $ChSwNursing = ChSwNursing::find($id);
            $ChSwNursing->delete();

            return response()->json([
                'status' => true,
                'message' => 'Información servicio de enfermería  eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Información servicio de enfermería  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
