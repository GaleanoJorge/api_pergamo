<?php

namespace App\Http\Controllers\Management;

use App\Models\Campus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CampusRequest;
use Illuminate\Database\QueryException;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $campus = Campus::select('campus.*')->with('region', 'municipality', 'billing_pad_prefix')
            ->LeftJoin('region', 'region.id', 'campus.region_id')
            ->LeftJoin('municipality', 'municipality.id', 'campus.municipality_id')
            ->LeftJoin('billing_pad_prefix', 'billing_pad_prefix.id', 'campus.billing_pad_prefix_id')
            ->LeftJoin('billing_pad_prefix as bpp', 'bpp.id', 'campus.billing_pad_credit_note_prefix_id')
            ->groupBy('campus.id')
            ;

        if($request->_sort){
            $campus->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $campus->where(function ($query) use ($request) {
                $query->where('campus.name','like','%' . $request->search. '%')
                ->orWhere('campus.address','like','%' . $request->search. '%')
                ->orWhere('campus.enable_code','like','%' . $request->search. '%')
                ->orWhere('region.name','like','%' . $request->search. '%')
                ->orWhere('municipality.name','like','%' . $request->search. '%')
                ->orWhere('billing_pad_prefix.name','like','%' . $request->search. '%')
                ->orWhere('bpp.name','like','%' . $request->search. '%')
                ;
            });
        }
        
        if($request->query("pagination", true)=="false"){
            $campus=$campus->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $campus=$campus->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'campus obtenidas exitosamente',
            'data' => ['campus' => $campus]
        ]);
    }

    public function store(CampusRequest $request): JsonResponse
    {
        $Campus = new Campus;
        $Campus->name = $request->name;
        $Campus->address = $request->address;
        $Campus->enable_code = $request->enable_code;
        $Campus->billing_pad_prefix_id = $request->billing_pad_prefix_id;
        $Campus->billing_pad_credit_note_prefix_id = $request->billing_pad_credit_note_prefix_id;
        $Campus->region_id = $request->region_id;
        $Campus->municipality_id = $request->municipality_id;
        $Campus->save();

        return response()->json([
            'status' => true,
            'message' => 'Sede creado exitosamente',
            'data' => ['campus' => $Campus->toArray()]
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
        $Campus = Campus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Sedes obtenido exitosamente',
            'data' => ['campus' => $Campus]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CampusRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CampusRequest $request, int $id): JsonResponse
    {
        $Campus = Campus::find($id);
        $Campus->name = $request->name;
        $Campus->address = $request->address;
        $Campus->billing_pad_prefix_id = $request->billing_pad_prefix_id;
        $Campus->billing_pad_credit_note_prefix_id = $request->billing_pad_credit_note_prefix_id;
        $Campus->enable_code = $request->enable_code;
        $Campus->region_id = $request->region_id;
        $Campus->municipality_id = $request->municipality_id;
        $Campus->save();

        return response()->json([
            'status' => true,
            'message' => 'Campus actualizado exitosamente',
            'data' => ['campus' => $Campus]
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
            $Campus = Campus::find($id);
            $Campus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Campus eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El campus esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
