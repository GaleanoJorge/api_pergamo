<?php

namespace App\Http\Controllers\Management;

use App\Models\UserActivity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserActivityRequest;
use Illuminate\Database\QueryException;

class UserActivityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $UserActivity = UserActivity::select();

        if($request->_sort){
            $UserActivity->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $UserActivity->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $UserActivity=$UserActivity->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $UserActivity=$UserActivity->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario asociada exitosamente',
            'data' => ['user_activity' => $UserActivity]
        ]);
    }
    

    public function store(UserActivityRequest $request): JsonResponse
    {
        $UserActivity = new UserActivity;
        $UserActivity->file_payment = $request->file_payment;
        $UserActivity->user_id = $request->user_id;
        $UserActivity->gloss_ambit = $request->gloss_ambit;
        $UserActivity->status_bill = $request->status_bill; 
        $UserActivity->observation = $request->observation;
        $UserActivity->save();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario creada exitosamente',
            'data' => ['user_activity' => $UserActivity->toArray()]
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
        $UserActivity = UserActivity::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario obtenido exitosamente',
            'data' => ['user_activity' => $UserActivity]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(UserActivityRequest $request, int $id): JsonResponse
    {
        $UserActivity = UserActivity::find($id);
        $UserActivity->file_payment = $request->file_payment;
        $UserActivity->user_id = $request->user_id;
        $UserActivity->gloss_ambit = $request->gloss_ambit;
        $UserActivity->status_bill = $request->status_bill; 
        $UserActivity->observation = $request->observation;
        $UserActivity->save();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro con las actividades del usuario actualizado exitosamente',
            'data' => ['user_activity' => $UserActivity]
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
            $UserActivity = UserActivity::find($id);
            $UserActivity->delete();

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
