<?php

namespace App\Http\Controllers\Management;

use App\Models\DietAdmission;
use App\Models\DietAdmissionComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietAdmissionRequest;
use Illuminate\Database\QueryException;

class DietAdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietAdmission = DietAdmission::with('admissions', 'diet_consistency');

        if ($request->_sort) {
            $DietAdmission->orderBy($request->_sort, $request->_order);
        }

        if ($request->admissions_id) {
            $DietAdmission->where('admissions_id', $request->admissions_id);
        }
        if ($request->diet_consistency_id) {
            $DietAdmission->where('diet_consistency_id', $request->diet_consistency_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DietAdmission = $DietAdmission->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietAdmission = $DietAdmission->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas obtenidas exitosamente',
            'data' => ['diet_admission' => $DietAdmission]
        ]);
    }

    public function store(DietAdmissionRequest $request): JsonResponse
    {
        $DietAdmissionDelete = DietAdmission::where('admissions_id', $request->admissions_id);
        $DietAdmissionDelete->delete();

        $DietAdmission =new DietAdmission;
        $DietAdmission->admissions_id =  $request->admissions_id;
        $DietAdmission->diet_consistency_id = $request->diet_consistency_id;

        $DietAdmission->save();

     
        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas creadas exitosamente',
            'data' => ['diet_admission' => $DietAdmission->toArray()]
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
        $DietAdmission = DietAdmission::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas obtenidas exitosamente',
            'data' => ['diet_admission' => $DietAdmission]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietAdmissionRequest $request, int $id): JsonResponse
    {
        $DietAdmissionComponentDelete = DietAdmissionComponent::where('diet_admission_id', $id);
        $DietAdmissionComponentDelete->delete();

        $DietAdmissionDelete = DietAdmission::where('admissions_id', $request->admissions_id);
        $DietAdmissionDelete->delete();

        $DietAdmission =new DietAdmission;
        $DietAdmission->admissions_id = $request->admissions_id;
        $DietAdmission->diet_consistency_id = $request->diet_consistency_id;

        $DietAdmission->save();
        

        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas actualizadas exitosamente',
            'data' => ['diet_admission' => $DietAdmission]
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
            $DietAdmission = DietAdmission::find($id);
            $DietAdmission->delete();

            return response()->json([
                'status' => true,
                'message' => 'Plato de menú de dietas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Plato de menú de dietas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
