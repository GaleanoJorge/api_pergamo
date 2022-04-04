<?php

namespace App\Http\Controllers\Management;

use App\Models\Location;
use App\Models\Bed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionsRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $Location = Location::orderBy('created_at', 'desc');

        if ($request->_sort) {
            $Location->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Location->where('Location.code','like','%' . $request->search. '%')
                    ->orWhere('Location.code_technical_concept', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $Location = $Location->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Location = $Location->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Admisión obtenidos exitosamente',
            'data' => ['location' => $Location]
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param AdmissionsRequest $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $Location = new Location;
        $Location->admission_id = $request->admission_id;
        $Location->admission_route_id = $request->admission_route_id;
        $Location->scope_of_attention_id = $request->scope_of_attention_id;
        $Location->program_id = $request->program_id;
        $Location->pavilion_id = $request->pavilion_id;
        $Location->flat_id = $request->flat_id;
        $Location->bed_id = $request->bed_id;
        $Location->user_id = Auth::user()->id;
        $Location->entry_date = Carbon::now();

        
        $Location->save();
        

        return response()->json([
            'status' => true,
            'message' => 'Ubicación creado exitosamente',
            'data' => ['location' => $Location->toArray()]
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
        $Location = Location::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ubicación obtenido exitosamente',
            'data' => ['location' => $Location]
        ]);
    }

        /**
     * Update the specified resource in storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function changeService(Request $request, int $id): JsonResponse
    {
        $Location = Location::where('admissions_id',$id)->orderBy('created_at', 'desc')->first();
        $Location->discharge_date = Carbon::now();
        $Location->save();

        $Bed= Bed::find($Location->bed_id);
        $Bed->status_bed_id=1;
        $Bed->save();

        $Location2 = new Location;
        $Location2->admissions_id = $request->admissions_id;
        $Location2->admission_route_id = $request->admission_route_id;
        $Location2->scope_of_attention_id = $request->scope_of_attention_id;
        $Location2->program_id = $request->program_id;
        $Location2->pavilion_id = $request->pavilion_id;
        $Location2->flat_id = $request->flat_id;
        $Location2->bed_id = $request->bed_id;
        $Location2->user_id = Auth::user()->id;
        $Location2->entry_date = Carbon::now();
        $Location2->save();

        $Bed= Bed::find($request->bed_id);
        $Bed->status_bed_id=2;
        $Bed->save();

        return response()->json([
            'status' => true,
            'message' => 'Ubicación actualizado exitosamente',
            'data' => ['location' => $Location2]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $Location = Location::find($id);
        $Location->admission_id = $request->admission_id;
        $Location->admission_route_id = $request->admission_route_id;
        $Location->scope_of_attention_id = $request->scope_of_attention_id;
        $Location->program_id = $request->program_id;
        $Location->pavilion_id = $request->pavilion_id;
        $Location->flat_id = $request->flat_id;
        $Location->bed_id = $request->bed_id;
        $Location->user_id = $request->user_id;
        $Location->entry_date = Carbon::now();
        $Location->save();

        return response()->json([
            'status' => true,
            'message' => 'Ubicación actualizado exitosamente',
            'data' => ['location' => $Location]
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
            $Location = Location::find($id);
            $Location->delete();

            return response()->json([
                'status' => true,
                'message' => 'Ubicación eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ubicación está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
