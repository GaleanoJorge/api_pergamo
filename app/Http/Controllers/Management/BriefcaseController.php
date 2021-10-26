<?php

namespace App\Http\Controllers\Management;

use App\Models\Briefcase;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BriefcaseRequest;
use Illuminate\Database\QueryException;

class BriefcaseController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Briefcase = Briefcase::with('type_briefcase','coverage','modality','campus','status');

        if($request->_sort){
            $Briefcase->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Briefcase->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Briefcase=$Briefcase->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Briefcase=$Briefcase->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios obtenidos exitosamente',
            'data' => ['briefcase' => $Briefcase]
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
        $Briefcase = Briefcase::where('contract_id', $contractId)->with('type_briefcase','coverage','modality','campus','status');
        if ($request->search) {
            $Briefcase->where('name', 'like', '%' . $request->search . '%')
            ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $Briefcase = $Briefcase->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Briefcase = $Briefcase->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Portafolio por contrato obtenido exitosamente',
            'data' => ['briefcase' => $Briefcase]
        ]);
    }


    public function store(BriefcaseRequest $request): JsonResponse
    {
        $Briefcase = new Briefcase;
        $Briefcase->name = $request->name;
        $Briefcase->contract_id = $request->contract_id;
        $Briefcase->type_briefcase_id = $request->type_briefcase_id;
        $Briefcase->coverage_id = $request->coverage_id;
        $Briefcase->modality_id = $request->modality_id;
        $Briefcase->campus_id = $request->campus_id;
        $Briefcase->status_id = $request->status_id;
        $Briefcase->save();

        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios creada exitosamente',
            'data' => ['briefcase' => $Briefcase->toArray()]
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
        $Briefcase = Briefcase::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios obtenido exitosamente',
            'data' => ['briefcase' => $Briefcase]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BriefcaseRequest $request, int $id): JsonResponse
    {
        $Briefcase = Briefcase::find($id);
        $Briefcase->name = $request->name;
        $Briefcase->contract_id = $request->contract_id;
        $Briefcase->type_briefcase_id = $request->type_briefcase_id;
        $Briefcase->coverage_id = $request->coverage_id;
        $Briefcase->modality_id = $request->modality_id;
        $Briefcase->campus_id = $request->campus_id;
        $Briefcase->status_id = $request->status_id;
        
        $Briefcase->save();

        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios actualizado exitosamente',
            'data' => ['briefcase' => $Briefcase]
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
            $Briefcase = Briefcase::find($id);
            $Briefcase->delete();

            return response()->json([
                'status' => true,
                'message' => 'portafolio de servicios eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'portafolio de servicios esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
