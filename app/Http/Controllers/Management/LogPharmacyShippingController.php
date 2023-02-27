<?php

namespace App\Http\Controllers\LogPharmacyShipping;

use App\Models\LogPharmacyShipping;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LogPharmacyShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $LogPharmacyShipping = LogPharmacyShipping::select('log_pharmacy_shipping.*')
        ->with( 'users',
        'pharmacy_request_shipping'          
      
    );

        if ($request->_sort) {
            $LogPharmacyShipping->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $LogPharmacyShipping->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $LogPharmacyShipping = $LogPharmacyShipping->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $LogPharmacyShipping = $LogPharmacyShipping->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Log Shipping obtenidos exitosamente',
            'data' => ['log_pharmacy_shipping' => $LogPharmacyShipping]
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {


        $LogPharmacyShipping = LogPharmacyShipping::with(
            'users',
            'management_plan'
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Log Shipping obtenida exitosamente',
            'data' => ['log_pharmacy_shipping' => $LogPharmacyShipping]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        $LogPharmacyShipping = new LogPharmacyShipping;
        $LogPharmacyShipping->user_id = $request->user_id;
        $LogPharmacyShipping->status = $request->status;
        $LogPharmacyShipping->quantity = $request->quantity;
        $LogPharmacyShipping->pharmacy_request_shipping_id = $request->pharmacy_request_shipping_id;
        $LogPharmacyShipping->save();

        // $areas = json_decode($request->areas_id);
        // foreach ($areas as $element) {
        //     $ChNutritionDietDay = new LogPharmacyShipping;
        //     $ChNutritionDietDay->name = $element;
        //     $ChNutritionDietDay->ch_nutrition_food_history_id = $LogPharmacyShipping->id;
        //     $ChNutritionDietDay->save();
        // }


        return response()->json([
            'status' => true,
            'message' => 'Log Shipping asociada al paciente exitosamente',
            'data' => ['log_pharmacy_shipping' => $LogPharmacyShipping->toArray()]
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
        $LogPharmacyShipping = LogPharmacyShipping::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Log Shipping obtenida exitosamente',
            'data' => ['log_pharmacy_shipping' => $LogPharmacyShipping]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $LogPharmacyShipping = LogPharmacyShipping::find($id);
        $LogPharmacyShipping->user_id = $request->user_id;
        $LogPharmacyShipping->status = $request->status;
        $LogPharmacyShipping->quantity = $request->quantity;
        $LogPharmacyShipping->pharmacy_request_shipping_id = $request->pharmacy_request_shipping_id;
        $LogPharmacyShipping->save();

        return response()->json([
            'status' => true,
            'message' => 'Log Shipping actualizada exitosamente',
            'data' => ['log_pharmacy_shipping' => $LogPharmacyShipping]
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
            $LogPharmacyShipping = LogPharmacyShipping::find($id);
            $LogPharmacyShipping->delete();

            return response()->json([
                'status' => true,
                'message' => 'Log Shipping eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Log Shipping en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
