<?php

namespace App\Http\Controllers\Management;

use App\Models\Retentions;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RetentionsRequest;
use Illuminate\Database\QueryException;

class RetentionsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $Retentions = Retentions::with('accoun_receivable');

        if($request->_sort){
            $Retentions->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Retentions->where('name','like','%' . $request->search. '%');
        }

        if ($request->status_bill_id) {
            $AccountReceivable->where('account_receivble_id', $request->account_receivble_id);
        }
        
        if($request->query("pagination", true)=="false"){
            $Retentions=$Retentions->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Retentions=$Retentions->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Retenciones asociadas exitosamente',
            'data' => ['retentions' => $Retentions]
        ]);
    }
    

    public function store(RetentionsRequest $request): JsonResponse
    {
        $Retentions = new Retentions;
        $Retentions->account_receivable_id = $request->account_receivable_id;
        $Retentions->rrt_salary = $request->rrt_salary;
        $Retentions->rrt_comprehensive_salary = $request->rrt_comprehensive_salary;
        $Retentions->rrt_means_transport = $request->rrt_means_transport;
        $Retentions->rrt_holidays = $request->rrt_holidays;
        $Retentions->incr_mandatory_pension_contributions = $request->incr_mandatory_pension_contributions;
        $Retentions->incr_mandatory_fund_contributions = $request->incr_mandatory_fund_contributions;
        $Retentions->incr_voluntary_contributions_funds= $request->incr_voluntary_contributions_funds;
        $Retentions->incr_non_rental_income= $request->incr_non_rental_income;
        $Retentions->d_home_interest_payment = $request->d_home_interest_payment;
        $Retentions->d_dependent_payments = $request->d_dependent_payments;
        $Retentions->d_health_payments = $request->d_health_payments;
        $Retentions->re_contributions_voluntary_pension_fund = $request->re_contributions_voluntary_pension_fund;
        $Retentions->re_contributions_accounts_AFC = $request->re_contributions_accounts_AFC;
        $Retentions->re_other_extensive_income = $request->re_other_extensive_income;
        $Retentions->save();


        return response()->json([
            'status' => true,
            'message' => 'Retenciones creadas exitosamente',
            'data' => ['retentions' => $Retentions->toArray()]
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
        $Retentions = Retentions::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Retenciones obtenidas exitosamente',
            'data' => ['retentions' => $Retentions]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(RetentionsRequest $request, int $id): JsonResponse
    {
        $Retentions = Retentions::find($id);
        $Retentions->account_receivable_id = $request->account_receivable_id;
        $Retentions->rrt_salary = $request->rrt_salary;
        $Retentions->rrt_comprehensive_salary = $request->rrt_comprehensive_salary;
        $Retentions->rrt_means_transport = $request->rrt_means_transport;
        $Retentions->rrt_holidays = $request->rrt_holidays;
        $Retentions->incr_mandatory_pension_contributions = $request->incr_mandatory_pension_contributions;
        $Retentions->incr_mandatory_fund_contributions = $request->incr_mandatory_fund_contributions;
        $Retentions->incr_voluntary_contributions_funds= $request->incr_voluntary_contributions_funds;
        $Retentions->incr_non_rental_income= $request->incr_non_rental_income;
        $Retentions->d_home_interest_payment = $request->d_home_interest_payment;
        $Retentions->d_dependent_payments = $request->d_dependent_payments;
        $Retentions->d_health_payments = $request->d_health_payments;
        $Retentions->re_contributions_voluntary_pension_fund = $request->re_contributions_voluntary_pension_fund;
        $Retentions->re_contributions_accounts_AFC = $request->re_contributions_accounts_AFC;
        $Retentions->re_other_extensive_income = $request->re_other_extensive_income;
        $Retentions->save();

        return response()->json([
            'status' => true,
            'message' => 'Retenciones actualizadas exitosamente',
            'data' => ['retentions' => $Retentions]
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
            $Retentions = Retentions::find($id);
            $Retentions->delete();

            return response()->json([
                'status' => true,
                'message' => 'Retenciones eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Retención esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
