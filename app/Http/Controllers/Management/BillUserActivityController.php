<?php

namespace App\Http\Controllers\Management;

use App\Models\BillUserActivity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BillUserActivityRequest;
use Illuminate\Database\QueryException;

class BillUserActivityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $BillUserActivity = BillUserActivity::select();

        if($request->_sort){
            $BillUserActivity->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $BillUserActivity->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $BillUserActivity=$BillUserActivity->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $BillUserActivity=$BillUserActivity->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario asociada exitosamente',
            'data' => ['bill_user_activity' => $BillUserActivity]
        ]);
    }
    

    public function store(BillUserActivityRequest $request): JsonResponse
    {
        $BillUserActivity = new BillUserActivity;
        $BillUserActivity->num_activity = $request->num_activity;
        $BillUserActivity->user_id = $request->user_id;
        $BillUserActivity->full_value = $request->full_value;
        $BillUserActivity->account_receivable_id = $request->account_receivable_id; 
        $BillUserActivity->observation = $request->observation;
        $BillUserActivity->save();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario creada exitosamente',
            'data' => ['bill_user_activity' => $BillUserActivity->toArray()]
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
        $BillUserActivity = BillUserActivity::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario obtenido exitosamente',
            'data' => ['bill_user_activity' => $BillUserActivity]
        ]);
    }


        /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function getByAccountReceivable(Request $request, int $id): JsonResponse
    {
        $BillUserActivity = BillUserActivity::where('account_receivable_id', $id)->with('procedure','procedure.manual_price');
        if($request->_sort){
            $BillUserActivity->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $BillUserActivity->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $BillUserActivity=$BillUserActivity->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $BillUserActivity=$BillUserActivity->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario actualizado exitosamente',
            'data' => ['bill_user_activity' => $BillUserActivity]
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BillUserActivityRequest $request, int $id): JsonResponse
    {
        $BillUserActivity = BillUserActivity::find($id);
        $BillUserActivity->file_payment = $request->file_payment;
        $BillUserActivity->user_id = $request->user_id;
        $BillUserActivity->gloss_ambit = $request->gloss_ambit;
        $BillUserActivity->status_bill = $request->status_bill; 
        $BillUserActivity->observation = $request->observation;
        $BillUserActivity->save();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario actualizado exitosamente',
            'data' => ['bill_user_activity' => $BillUserActivity]
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
            $BillUserActivity = BillUserActivity::find($id);
            $BillUserActivity->delete();

            return response()->json([
                'status' => true,
                'message' => 'Cuenta de cobro con las actividades del usuario eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cuenta de cobro con las actividades del usuario esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
