<?php

namespace App\Http\Controllers\Management;

use App\Models\UserPharmacyStock;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class UserPharmacyStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $UserPharmacyStock = UserPharmacyStock::select();

        if ($request->_sort) {
            $UserPharmacyStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $UserPharmacyStock->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $UserPharmacyStock = $UserPharmacyStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $UserPharmacyStock = $UserPharmacyStock->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Permiso en farmacia obtenidos exitosamente',
            'data' => ['user_pharmacy_stock' => $UserPharmacyStock]
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byadmission(Request $request, int $id): JsonResponse
    {
        $UserPharmacyStock = UserPharmacyStock::where('admissions_id', $id);

        if ($request->_sort) {
            $UserPharmacyStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $UserPharmacyStock->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $UserPharmacyStock = $UserPharmacyStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $UserPharmacyStock = $UserPharmacyStock->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Permiso en farmacia obtenidos exitosamente',
            'data' => ['user_pharmacy_stock' => $UserPharmacyStock]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $deleteUserAgreement = UserPharmacyStock::select('user_pharmacy_stock.*')->where('user_id', $request->user_id)->get()->toArray();


        // $UserPharmacyStockDelete = UserPharmacyStock::where('pharmacy_stock_id', $request->pharmacy_stock_id)->get();
        // // $UserPharmacyStockDelete->delete();
        // if (sizeof($deleteUserAgreement) > 0) {
        //     foreach ($deleteUserAgreement as $item) {
        //         $UserAgreement = UserAgreement::find($item['id']);
        //         $UserAgreement->delete();
        //     }
        $UserPharmacyStockDel = UserPharmacyStock::where('pharmacy_stock_id',$request->pharmacy_stock_id);
        $UserPharmacyStockDel->delete();

        $users = json_decode($request->users);
        foreach ($users as $user) {
            $UserPharmacyStock = new UserPharmacyStock;
            $UserPharmacyStock->pharmacy_stock_id = $request->pharmacy_stock_id;
            $UserPharmacyStock->user_id = $user;
            $UserPharmacyStock->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Permiso en farmacia asociado al en farmacia exitosamente',
            'data' => ['user_pharmacy_stock' => $UserPharmacyStock->toArray()]
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
        $UserPharmacyStock = UserPharmacyStock::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Permiso en farmacia obtenido exitosamente',
            'data' => ['user_pharmacy_stock' => $UserPharmacyStock]
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function getByUser(int $id): JsonResponse
    {
        $UserPharmacyStock = UserPharmacyStock::select('user_pharmacy_stock.*')
            ->where('user_id', $id)->with('pharmacy')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Permisos en farmacia obtenido exitosamente',
            'data' => ['user_pharmacy_stock' => $UserPharmacyStock]
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
        $UserPharmacyStock = UserPharmacyStock::find($id);
        $UserPharmacyStock->pharmacy_stock_id = $request->pharmacy_stock_id;
        $UserPharmacyStock->user_id = $request->user_id;



        $UserPharmacyStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Permiso en farmacia actualizado exitosamente',
            'data' => ['user_pharmacy_stock' => $UserPharmacyStock]
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
            $UserPharmacyStock = UserPharmacyStock::find($id);
            $UserPharmacyStock->delete();

            return response()->json([
                'status' => true,
                'message' => 'Permiso en farmacia eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Permiso en farmacia en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
