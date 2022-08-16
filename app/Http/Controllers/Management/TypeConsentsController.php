<?php

namespace App\Http\Controllers\Management;

use App\Models\TypeConsents;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TypeConsentsController extends Controller
{
    public function index(Request $request): JsonResponse
    {
      
        $TypeConsents = TypeConsents::select();

        if ($request->_sort) {
            $TypeConsents->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $TypeConsents->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $TypeConsents = $TypeConsents->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $TypeConsents = $TypeConsents->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Tipos de concentimiento obtenidos exitosamente',
            'data' => ['type_consents' => $TypeConsents]
        ]);
    }


   
    /**
     * Store a newly created resource in storage.
     *
     * @param TypeConsentsRequest $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {

        $TypeConsents = new TypeConsents;
        $TypeConsents->name = $request->admissions_id;
        $TypeConsents->file = $request->firm_patient;

      
        $TypeConsents->save();

     
                return response()->json([
                    'status' => true,
                    'message' => 'Tipos de concentimiento creado exitosamente',
                    'data' => ['type_consents' => $TypeConsents->toArray()]
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
        $TypeConsents = TypeConsents::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de concentimiento obtenido exitosamente',
            'data' => ['consents_informed' => $TypeConsents]
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
        $TypeConsents = TypeConsents::find($id);
        $TypeConsents->name = $request->admissions_id;
        $TypeConsents->file = $request->firm_patient;
        $TypeConsents->save();

       
            return response()->json([
                'status' => true,
                'message' => 'Tipos de concentimiento actualizado exitosamente',
                'data' => ['consents_informed' => $TypeConsents->toArray()]
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
            $TypeConsents = TypeConsents::find($id);
            $TypeConsents->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipos de concentimiento eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipos de concentimiento está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
