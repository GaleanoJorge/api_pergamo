<?php

namespace App\Http\Controllers\Management;

use App\Models\SectionalCouncil;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\SectionalCouncilRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SectionalCouncilController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $sectionalCouncils = SectionalCouncil::with('status');

        if($request->_sort){
            $sectionalCouncils->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $sectionalCouncils->where('name','like','%' . $request->search. '%');
        }

        if ($request->status_id) {
            $sectionalCouncils->where('status_id', $request->status_id);
        }
        
        if($request->query("pagination", true)=="false"){
            $sectionalCouncils=$sectionalCouncils->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $sectionalCouncils=$sectionalCouncils->paginate($per_page,'*','page',$page);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Consejos seccional obtenidos exitosamente',
            'data' => ['sectionalCouncil' => $sectionalCouncils]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @return JsonResponse
     */
    public function store(SectionalCouncilRequest $request): JsonResponse
    {
        $SectionalCouncil = new SectionalCouncil;
        $SectionalCouncil->status_id = $request->status_id;
        $SectionalCouncil->name = $request->name;
        $SectionalCouncil->save();

        return response()->json([
            'status' => true,
            'message' => 'Consejo seccional creado exitosamente',
            'data' => ['sectionalCouncil' => $SectionalCouncil->toArray()]
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
        $SectionalCouncil = SectionalCouncil::where('id', $id)->with('status')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Consejo seccional obtenido exitosamente',
            'data' => ['sectionalCouncil' => $SectionalCouncil]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(SectionalCouncilRequest $request, int $id): JsonResponse
    {
        $SectionalCouncil = SectionalCouncil::find($id);
        $SectionalCouncil->status_id = $request->status_id;
        $SectionalCouncil->name = $request->name;
        $SectionalCouncil->save();

        return response()->json([
            'status' => true,
            'message' => 'Consejo seccional actualizado exitosamente',
            'data' => ['sectionalCouncil' => $SectionalCouncil]
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
            $SectionalCouncil = SectionalCouncil::find($id);
            $SectionalCouncil->delete();

            return response()->json([
                'status' => true,
                'message' => 'Consejo seccional eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El consejo seccional está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }

}
