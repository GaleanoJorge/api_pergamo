<?php

namespace App\Http\Controllers\Management;

use App\Models\ChBackground;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use App\Models\ChTypeBackground;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChBackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChBackground = ChBackground::with('ch_type_background');

        if ($request->ch_record_id) {
            $ChBackground->where('ch_record_id', $request->ch_record_id);
        }

        if ($request->type_record_id) {
            $ChBackground->where('type_record_id', $request->type_record_id);
        }

        if ($request->_sort) {
            $ChBackground->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChBackground->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChBackground = $ChBackground->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChBackground = $ChBackground->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Antecedentes obtenidos exitosamente',
            'data' => ['ch_background' => $ChBackground]
        ]);
    }

    /**
     *Get alergics by patient.
     * 
     * @param  int  $patient_id
     * @return JsonResponse
     */
    public function getAlergicsByPatient(Request $request, int $patient_id): JsonResponse
    {
        $ChRecord = ChRecord::select('ch_background.observation')
            ->leftJoin('ch_background', 'ch_background.ch_record_id', 'ch_record.id')
            ->leftJoin('admissions', 'admissions.id', 'ch_record.admissions_id')
            ->where('admissions.patient_id', $patient_id)
            ->where('ch_background.ch_type_background_id', 1)
            ->whereNotNull('ch_background.observation');

        if ($request->query("pagination", true) == "false") {
            $ChRecord = $ChRecord->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChRecord = $ChRecord->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Antecedentes al??rgicos obtenidos exitosamente',
            'data' => ['ch_background' => $ChRecord]
        ]);
    }

    /**
     *Get by patient.
     * 
     * @param  int  $patient_id
     * @return JsonResponse
     */
    public function getByPatient(Request $request, int $patient_id): JsonResponse
    {
        $ChBackground = ChBackground::select('ch_background.*', 'ch_type_background.name AS ch_type_background')
            ->leftJoin('ch_record', 'ch_record.id', 'ch_background.ch_record_id')
            ->leftJoin('ch_type_background', 'ch_type_background.id', 'ch_background.ch_type_background_id')
            ->leftJoin('admissions', 'admissions.id', 'ch_record.admissions_id')
            ->where('admissions.patient_id', $patient_id)
            ->groupBy('ch_background.id')
            ->orderBy('ch_background.id', 'desc');

        if ($request->query("pagination", true) == "false") {
            $ChBackground = $ChBackground->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChBackground = $ChBackground->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Antecedentes al??rgicos obtenidos exitosamente',
            'data' => ['ch_background' => $ChBackground]
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

        $chrecord = ChRecord::find($id);

        $ChBackground = ChBackground::select('ch_background.*')
        ->leftJoin('ch_record', 'ch_record.id', 'ch_background.ch_record_id')
            ->where('ch_record.admissions_id', $chrecord->admissions_id)
            ->with('ch_type_background')->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
    
                $ChBackground = ChBackground::select('ch_background.*')
                    ->with('ch_type_background')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->where('ch_background.type_record_id', 1)
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_background.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }


        return response()->json([
            'status' => true,
            'message' => 'Antecedentes obtenidos exitosamente',
            'data' => ['ch_background' => $ChBackground]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ch_type_background = json_decode($request->ch_type_background_id);
        // $validate = ChBackground::where('ch_record_id', $request->ch_record_id)->where('ch_type_background_id', $request->ch_type_background_id)->first();
        // if (!$validate) {
        foreach ($ch_type_background as $element) {
            $ChBackground = new ChBackground;
            $ChBackground->ch_type_background_id = $element->id;
            $ChBackground->revision = $element->revision;
            $ChBackground->observation = $element->description;
            $ChBackground->type_record_id = $request->type_record_id;
            $ChBackground->ch_record_id = $request->ch_record_id;
            $ChBackground->save();
        }

        // } else {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Ya tiene observaci??n'
        //     ], 423);
        // }
        return response()->json([
            'status' => true,
            'message' => 'Antecedentes guardados exitosamente',
            'data' => ['ch_background' => $ChBackground]
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
        $ChBackground = ChBackground::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Antecedentes obtenido exitosamente',
            'data' => ['ch_background' => $ChBackground]
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
        $ChBackground = ChBackground::find($id);
        $ChBackground->revision = $request->revision;
        $ChBackground->observation = $request->observation;
        $ChBackground->ch_type_background_id = $request->ch_type_background_id;
        $ChBackground->type_record_id = $request->type_record_id;
        $ChBackground->ch_record_id = $request->ch_record_id;
        $ChBackground->save();

        return response()->json([
            'status' => true,
            'message' => 'Antecedentes actualizados exitosamente',
            'data' => ['ch_background' => $ChBackground]
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
            $ChBackground = ChBackground::find($id);
            $ChBackground->delete();

            return response()->json([
                'status' => true,
                'message' => 'Antecedente eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Antecedente en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
