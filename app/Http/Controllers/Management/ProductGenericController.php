<?php

namespace App\Http\Controllers\Management;

use App\Models\ProductGeneric;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductGenericRequest;
use Illuminate\Database\QueryException;

class ProductGenericController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ProductGeneric = ProductGeneric::select('product_generic.*')
            ->with(
                'drug_concentration',
                'measurement_units',
                'product_dose',
                'multidose_concentration',
                'administration_route',
                'product_presentation',
                'nom_product',
            )->orderBy('description', 'asc');

        if($request->_sort){
            $ProductGeneric->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ProductGeneric->where('description','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ProductGeneric=$ProductGeneric->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ProductGeneric=$ProductGeneric->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Productos genericos (Medicamentos) obtenidos exitosamente',
            'data' => ['product_generic' => $ProductGeneric]
        ]);
    }
    

    public function store(ProductGenericRequest $request): JsonResponse
    {
        $ProductGeneric = new ProductGeneric;
        $ProductGeneric->drug_concentration_id = $request->drug_concentration_id;
        $ProductGeneric->measurement_units_id = $request->measurement_units_id;
        $ProductGeneric->product_presentation_id = $request->product_presentation_id;
        $ProductGeneric->description = $request->description;       
        $ProductGeneric->pbs_type_id = $request->pbs_type_id;
        $ProductGeneric->pbs_restriction = $request->pbs_restriction;
        $ProductGeneric->nom_product_id = $request->nom_product_id;  
        $ProductGeneric->administration_route_id = $request->administration_route_id;  
        $ProductGeneric->special_controller_medicine = $request->special_controller_medicine;  
        $ProductGeneric->code_atc = $request->code_atc;  
        $ProductGeneric->minimum_stock = $request->minimum_stock;
        $ProductGeneric->maximum_stock = $request->maximum_stock;
        $ProductGeneric->dose = $request->dose;
        $ProductGeneric->product_dose_id = $request->product_dose_id;
        $ProductGeneric->multidose_concentration_id = $request->multidose_concentration_id;
        $ProductGeneric->save();

        return response()->json([
            'status' => true,
            'message' => 'Productos genericos (Medicamentos) creado exitosamente',
            'data' => ['product_generic' => $ProductGeneric->toArray()]
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
        $ProductGeneric = ProductGeneric::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Productos genericos (Medicamentos) obtenido exitosamente',
            'data' => ['product_generic' => $ProductGeneric]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductGenericRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProductGenericRequest $request, int $id): JsonResponse
    {
        $ProductGeneric = ProductGeneric ::find($id);
        $ProductGeneric->drug_concentration_id = $request->drug_concentration_id;
        $ProductGeneric->measurement_units_id = $request->measurement_units_id;
        $ProductGeneric->product_presentation_id = $request->product_presentation_id;
        $ProductGeneric->description = $request->description;       
        $ProductGeneric->pbs_type_id = $request->pbs_type_id;
        $ProductGeneric->pbs_restriction = $request->pbs_restriction;
        $ProductGeneric->nom_product_id = $request->nom_product_id;  
        $ProductGeneric->administration_route_id = $request->administration_route_id;  
        $ProductGeneric->special_controller_medicine = $request->special_controller_medicine;  
        $ProductGeneric->code_atc = $request->code_atc;  
        $ProductGeneric->minimum_stock = $request->minimum_stock;
        $ProductGeneric->maximum_stock = $request->maximum_stock;
        $ProductGeneric->dose = $request->dose;
        $ProductGeneric->product_dose_id = $request->product_dose_id;
        $ProductGeneric->multidose_concentration_id = $request->multidose_concentration_id;
        $ProductGeneric->save();

        return response()->json([
            'status' => true,
            'message' => 'Productos genericos (Medicamentos) actualizado exitosamente',
            'data' => ['product_generic' => $ProductGeneric]
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
            $ProductGeneric = ProductGeneric::find($id);
            $ProductGeneric->delete();

            return response()->json([
                'status' => true,
                'message' => 'Productos genericos (Medicamentos) eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Productos genericos (Medicamentos)esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
