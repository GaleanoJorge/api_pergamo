<?php

namespace App\Http\Controllers\Management;

use App\Models\SwEducation;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class SwEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $SwEducation = SwEducation::select('sw_education.*');


        if ($request->record_id) {
            $SwEducation->where('ch_record_id', $request->record_id);
        }

        if ($request->_sort) {
            $SwEducation->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $SwEducation->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $SwEducation = $SwEducation->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $SwEducation = $SwEducation->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Educación obtenidos exitosamente',
            'data' => ['sw_education' => $SwEducation]
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {


        $SwEducation = SwEducation::where('ch_record_id', $id)
        ->with('sw_rights_duties')->where('type_record_id', $type_record_id)->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Educación obtenida exitosamente',
            'data' => ['sw_education' => $SwEducation]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $education = json_decode($request->sw_rights_duties_id);
            foreach ($education as $element) {
                $SwEducation = new SwEducation;
                $SwEducation->sw_rights_duties_id = $element->id; 
                $SwEducation->type_record_id = $request->type_record_id;
                $SwEducation->ch_record_id = $request->ch_record_id;
                $SwEducation->save();                        
        
            }

           
       

        return response()->json([
            'status' => true,
            'message' => 'Educación asociada al paciente exitosamente',
            'data' => ['sw_education' => $SwEducation->toArray()]
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
        $SwEducation = SwEducation::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Educación obtenida exitosamente',
            'data' => ['sw_education' => $SwEducation]
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
        $SwEducation = SwEducation::find($id);
        $education = json_decode($request->sw_rights_duties_id);
            foreach ($education as $element) {
                $SwEducation = new SwEducation;
                $SwEducation->sw_rights_duties_id = $element->id;    
                $SwEducation->type_record_id = $request->type_record_id;
                $SwEducation->ch_record_id = $request->ch_record_id;
                $SwEducation->save();           
        
            }
       
       

        return response()->json([
            'status' => true,
            'message' => 'Educación actualizada exitosamente',
            'data' => ['sw_education' => $SwEducation]
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
            $SwEducation = SwEducation::find($id);
            $SwEducation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Educación eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Educación en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
