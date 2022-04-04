<?php

namespace App\Http\Controllers\Management;

use App\Models\StatusBill;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StatusBillRequest;
use Illuminate\Database\QueryException;

class StatusBillController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $StatusBill = StatusBill::select();

        if($request->_sort){
            $StatusBill->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $StatusBill->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $StatusBill=$StatusBill->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $StatusBill=$StatusBill->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Estado de Cuenta de cobro con las actividades del usuario asociada exitosamente',
            'data' => ['status_bill' => $StatusBill]
        ]);
    }
    

    public function store(StatusBillRequest $request): JsonResponse
    {
        $StatusBill = new StatusBill;
        $StatusBill->name = $request->name; 
        
        $StatusBill->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado de Cuenta de cobro con las actividades del usuario creada exitosamente',
            'data' => ['status_bill' => $StatusBill->toArray()]
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
        $StatusBill = StatusBill::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estado de Cuenta de cobro con las actividades del usuario obtenido exitosamente',
            'data' => ['status_bill' => $StatusBill]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(StatusBillRequest $request, int $id): JsonResponse
    {
        $StatusBill = StatusBill::find($id);
        $StatusBill->name = $request->name;
   
   
        $StatusBill->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado de Cuenta de cobro con las actividades del usuario actualizado exitosamente',
            'data' => ['status_bill' => $StatusBill]
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
            $StatusBill = StatusBill::find($id);
            $StatusBill->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estado de Cuenta de cobro con las actividades del usuario eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estado de Cuenta de cobro esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
