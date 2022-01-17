<?php

namespace App\Http\Controllers\Management;

use App\Models\Policy;
use App\Models\CampusPolicy;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PolicyRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class PolicyController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Policy = Policy::with('type_policy_id','insurance_carrier_id','start_date','finish_date','policy_file');

        if($request->_sort){
            $Policy->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Policy->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Policy=$Policy->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Policy=$Policy->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Pólizas obtenidos exitosamente',
            'data' => ['policy' => $Policy]
        ]);
    }

               /**
     * Get procedure by manual.
     *
     * @param  int  $contractId
     * @return JsonResponse
     */
    public function getByContract(Request $request, int $contractId): JsonResponse
    {
        $Policy = Policy::where('contract_id', $contractId)->with('policy_type','insurance_carrier');
        if ($request->search) {
            $Policy->where('name', 'like', '%' . $request->search . '%')
            ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $Policy = $Policy->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Policy = $Policy->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Pólizas por contrato obtenido exitosamente',
            'data' => ['policy' => $Policy]
        ]);
    }


    public function store(PolicyRequest $request): JsonResponse
    {
        $Policy = new Policy;
        $Policy->contract_id = $request->contract_id;
        $Policy->policy_value = $request->policy_value;
        $Policy->policy_type_id = $request->policy_type_id;
        $Policy->insurance_carrier_id = $request->insurance_carrier_id;
        if ($request->file('policy_file')) {
            $path = Storage::disk('public')->put('policy_file', $request->file('policy_file'));
            $Policy->policy_file = $path;
        }   
        // $Policy->policy_file = $request->policy_file;
        $Policy->start_date = $request->start_date;
        $Policy->finish_date = $request->finish_date;
        $Policy->save();


        return response()->json([
            'status' => true,
            'message' => 'Póliza creada exitosamente',
            'data' => ['policy' => $Policy->toArray()]
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
        $Policy = Policy::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Poliza obtenido exitosamente',
            'data' => ['policy' => $Policy]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PolicyRequest $request, int $id): JsonResponse
    {
        $Policy = new Policy;
        // $Policy->contract_id = $request->contract_id;
        $Policy->policy_type_id = $request->policy_type_id;
        $Policy->policy_value = $request->policy_value;
        $Policy->insurance_carrier_id = $request->insurance_carrier_id;
        if ($request->file('policy_file')) {
            $path = Storage::disk('public')->put('policy_file', $request->file('policy_file'));
            $Policy->policy_file = $path;
        }   
        $Policy->start_date = $request->start_date;
        $Policy->finish_date = $request->finish_date;
        $Policy->status_id = $request->status_id;
        $Policy->save();

        return response()->json([
            'status' => true,
            'message' => 'Poliza actualizada exitosamente',
            'data' => ['policy' => $Policy]
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
            $Policy = Policy::find($id);
            $Policy->delete();

            return response()->json([
                'status' => true,
                'message' => 'Póliza eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Póliza esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
