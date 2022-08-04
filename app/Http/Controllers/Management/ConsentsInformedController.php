<?php

namespace App\Http\Controllers\Management;

use App\Models\ConsentsInformed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConsentsInformedController extends Controller
{
    public function index(Request $request): JsonResponse
    {
      
        $ConsentsInformed = ConsentsInformed::with('admissions','assigned_user','type_consents');

        if ($request->_sort) {
            $ConsentsInformed->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ConsentsInformed->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $ConsentsInformed = $ConsentsInformed->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ConsentsInformed = $ConsentsInformed->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Plan de manejo obtenidos exitosamente',
            'data' => ['consents_informed' => $ConsentsInformed]
        ]);
    }

    public function getByAdmission(Request $request, int $id): JsonResponse
    {

        $ConsentsInformed = ConsentsInformed::with('admissions','assigned_user','type_consents')->where('admissions_id',$id);


        if ($request->_sort) {
            $ConsentsInformed->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ConsentsInformed->where('invoice_prefix', 'like', '%' . $request->search . '%')
                ->orWhere('invoice_consecutive', 'like', '%' . $request->search . '%')
                ->orWhere('received_date', 'like', '%' . $request->search . '%')
                ->orWhere('company.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ConsentsInformed = $ConsentsInformed->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $ConsentsInformed = $ConsentsInformed->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Planes obtenidos exitosamente',
            'data' => ['consents_informed' => $ConsentsInformed]
        ]);
    }


   
    /**
     * Store a newly created resource in storage.
     *
     * @param ConsentsInformedRequest $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {

        $ConsentsInformed = new ConsentsInformed;
        $ConsentsInformed->admissions_id = $request->admissions_id;
        $ConsentsInformed->firm_patiend = $request->firm_patiend;
        $ConsentsInformed->firm_responsible = $request->firm_responsible;
        $ConsentsInformed->assigned_user_id = $request->assigned_user_id;
        $ConsentsInformed->type_consents_id = $request->type_consents_id;
        $ConsentsInformed->name_responsible = $request->name_responsible;
        $ConsentsInformed->parent_responsible = $request->parent_responsible;
        $ConsentsInformed->identification_responsible = $request->identification_responsible;

      
        $ConsentsInformed->save();

     
                return response()->json([
                    'status' => true,
                    'message' => 'Concentimiento creado exitosamente',
                    'data' => ['consents_informed' => $ConsentsInformed->toArray()]
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
        $ConsentsInformed = ConsentsInformed::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Concentimiento obtenido exitosamente',
            'data' => ['consents_informed' => $ConsentsInformed]
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
        $ConsentsInformed = ConsentsInformed::find($id);
        $ConsentsInformed->admissions_id = $request->admissions_id;
        $ConsentsInformed->firm_patiend = $request->firm_patiend;
        $ConsentsInformed->firm_responsible = $request->firm_responsible;
        $ConsentsInformed->assigned_user_id = $request->assigned_user_id;
        $ConsentsInformed->type_consents_id = $request->type_consents_id;
        $ConsentsInformed->save();

       
            return response()->json([
                'status' => true,
                'message' => 'Concentimiento actualizado exitosamente',
                'data' => ['consents_informed' => $ConsentsInformed->toArray()]
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
            $ConsentsInformed = ConsentsInformed::find($id);
            $ConsentsInformed->delete();

            return response()->json([
                'status' => true,
                'message' => 'Concentimiento eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Concentimiento está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
