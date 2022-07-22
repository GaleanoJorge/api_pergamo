<?php

namespace App\Http\Controllers\Management;

use App\Models\ProcedurePackage;
use App\Models\CampusBriefcase;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProcedurePackageRequest;
use Illuminate\Database\QueryException;

class ProcedurePackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ProcedurePackage = ProcedurePackage::with('procedure');

        if ($request->_sort) {
            $ProcedurePackage->orderBy($request->_sort, $request->_order);
        }

        if ($request->procedure_package_id) {
            $ProcedurePackage->where('procedure_package_id', $request->procedure_package_id);
        }

        if ($request->search) {
            $ProcedurePackage->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ProcedurePackage = $ProcedurePackage->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ProcedurePackage = $ProcedurePackage->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos obtenidos exitosamente',
            'data' => ['procedure_package' => $ProcedurePackage]
        ]);
    }


    /**
     * Get procedure by manual.
     *
     * @param  int  $packageId
     * @return JsonResponse
     */
    public function getByPackage(Request $request, int $packageId): JsonResponse
    {
        $ProcedurePackage = ProcedurePackage::where('procedure_package_id', $packageId)
            ->with(
                'procedure',
                'product',
                'supplies',
            );
        if ($request->search) {
            $ProcedurePackage->where('name', 'like', '%' . $request->search . '%')
                ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $ProcedurePackage = $ProcedurePackage->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ProcedurePackage = $ProcedurePackage->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos obtenido exitosamente',
            'data' => ['procedure_package' => $ProcedurePackage]
        ]);
    }

    public function store(ProcedurePackageRequest $request): JsonResponse
    {

        // if ($request->procedure_id != null) {
        // $ProcedurePackageFilter = ProcedurePackage::where([
        //     ['procedure_package_id', $request->procedure_package_id],
        //     ['procedure_id', $request->procedure_id]
        // ])->get();
        // }else if ($request->supplies_id){
        //     $ProcedurePackageFilter = ProcedurePackage::where([
        //         ['procedure_package_id', $request->procedure_package_id],
        //         ['supplies_id', $request->supplies_id]
        //     ])->get();
        // } else if($request->product_id){
        //     $ProcedurePackageFilter = ProcedurePackage::where([
        //         ['procedure_package_id', $request->procedure_package_id],
        //         ['product_id', $request->product_id]
        //     ])->get();
        // }
        $product = 0;
        $insume = 0;
        $procedure = 0;
        $err = 0;

        if ($request->procedures_id) {
            $components = json_decode($request->procedure_id);
            foreach ($components as $item) {
                $ProcedurePackage = new ProcedurePackage;
                $ProcedurePackage->value = $request->value;
                $ProcedurePackage->procedure_package_id = $request->procedure_package_id;
                $ProcedurePackage->procedure_id = $item->procedure_id;
                $ProcedurePackage->max_quantity = $item->max_quantity;
                $ProcedurePackage->min_quantity = $item->min_quantity;
                $ProcedurePackage->dynamic_charge = $item->dynamic_charge;
                $ProcedurePackage->save();
                $procedure++;
            }
        }

        if ($request->product_id) {
            $components = json_decode($request->product_id);
            
            foreach ($components as $item) {
                
                $ProcedurePackage = new ProcedurePackage;
                $ProcedurePackage->value = $request->value;
                $ProcedurePackage->procedure_package_id = $request->procedure_package_id;
                $ProcedurePackage->product_id = $item->product_id;
                $ProcedurePackage->max_quantity = $item->max_quantity;
                $ProcedurePackage->min_quantity = $item->min_quantity;
                $ProcedurePackage->dynamic_charge = $item->dynamic_charge;
                $ProcedurePackage->save();
                $product++;
            }
        }

        if ($request->supplies_id) {
            $components = json_decode($request->supplies_id);
            
            foreach ($components as $item) {
                
                $ProcedurePackage = new ProcedurePackage;
                $ProcedurePackage->value = $request->value;
                $ProcedurePackage->procedure_package_id = $request->procedure_package_id;
                $ProcedurePackage->supplies_id = $item->supplies_id;
                $ProcedurePackage->max_quantity = $item->max_quantity;
                $ProcedurePackage->min_quantity = $item->min_quantity;
                $ProcedurePackage->dynamic_charge = $item->dynamic_charge;
                $ProcedurePackage->save();
                $insume++;
            }
        }


        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos creado exitosamente',
            'data' => ['procedure_package' => $ProcedurePackage]
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
        $ProcedurePackage = ProcedurePackage::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos obtenido exitosamente',
            'data' => ['procedure_package' => $ProcedurePackage]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProcedurePackageRequest $request, int $id): JsonResponse
    {
        $ProcedurePackageDelete = ProcedurePackage::where('procedure_package_id', $id);
        $ProcedurePackageDelete->delete();

        if ($request->procedure_id) {
            $components = json_decode($request->procedure_id);

            foreach ($components as $conponent) {
                $ProcedurePackage = new ProcedurePackage;
                $ProcedurePackage->procedure_package_id = $id;
                $ProcedurePackage->procedure_id = $conponent->procedure_id;
                $ProcedurePackage->dynamic_charge = $conponent->dynamic_charge;
                $ProcedurePackage->max_quantity = $conponent->max_quantity;
                $ProcedurePackage->min_quantity = $conponent->min_quantity;
                $ProcedurePackage->save();
            }
        }

        if ($request->supplies_id) {
            $components = json_decode($request->supplies_id);

            foreach ($components as $conponent) {
                $ProcedurePackage = new ProcedurePackage;
                $ProcedurePackage->procedure_package_id = $id;
                $ProcedurePackage->supplies_id = $conponent->supplies_id;
                $ProcedurePackage->dynamic_charge = $conponent->dynamic_charge;
                $ProcedurePackage->max_quantity = $conponent->max_quantity;
                $ProcedurePackage->min_quantity = $conponent->min_quantity;
                $ProcedurePackage->save();
            }
        }

        if ($request->product_id) {
            $components = json_decode($request->product_id);

            foreach ($components as $conponent) {
                $ProcedurePackage = new ProcedurePackage;
                $ProcedurePackage->procedure_package_id = $id;
                $ProcedurePackage->product_id = $conponent->product_id;
                $ProcedurePackage->dynamic_charge = $conponent->dynamic_charge;
                $ProcedurePackage->max_quantity = $conponent->max_quantity;
                $ProcedurePackage->min_quantity = $conponent->min_quantity;
                $ProcedurePackage->save();
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos actualizado exitosamente',
            'data' => ['procedure_package' => $ProcedurePackage]
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
            $ProcedurePackage = ProcedurePackage::find($id);
            $ProcedurePackage->delete();

            return response()->json([
                'status' => true,
                'message' => 'Paquete de procedimientos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Paquete de procedimientos esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
