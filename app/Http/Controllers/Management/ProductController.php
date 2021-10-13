<?php

namespace App\Http\Controllers\Management;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Products = Product::select();

        if($request->_sort){
            $Products->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Products->where('name','like','%' . $request->search. '%')
            ->orWhere('code', 'like', '%' . $request->search . '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Products=$Products->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Products=$Products->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Productos obtenidos exitosamente',
            'data' => ['product' => $Products]
        ]);
    }
    

    public function store(ProductRequest $request): JsonResponse
    {
        $Product = new Product;
        $Product->code = $request->code;
        $Product->name = $request->name;
        $Product->factory_id = $request->factory_id;
        $Product->product_generic_id = $request->product_generic_id;
        $Product->invima_registration = $request->invima_registration;
        $Product->invima_status_id = $request->invima_status_id;
        $Product->sanitary_registration_id = $request->sanitary_registration_id;
        $Product->storage_conditions_id = $request->storage_conditions_id;
        $Product->risk_id = $request->risk_id;
        $Product->code_cum_file = $request->code_cum_file;
        $Product->code_cum_consecutive = $request->code_cum_consecutive;
        $Product->regulated_drug = $request->regulated_drug;
        $Product->high_price = $request->high_price;
        $Product->maximum_dose = $request->maximum_dose;
        $Product->indications = $request->indications;
        $Product->contraindications = $request->contraindications;
        $Product->applications = $request->applications;
        $Product->minimum_stock = $request->minimum_stock;
        $Product->maximum_stock = $request->maximum_stock;
        $Product->generate_iva = $request->generate_iva;
        
        $Product->save();

        return response()->json([
            'status' => true,
            'message' => 'Productos creado exitosamente',
            'data' => ['product' => $Product->toArray()]
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
        $Product = Product::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Productos obtenido exitosamente',
            'data' => ['product' => $Product]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProductRequest $request, int $id): JsonResponse
    {
        $Product = Product::find($id);
        $Product->code = $request->code;
        $Product->name = $request->name;
        $Product->factory_id = $request->factory_id;
        $Product->product_generic_id = $request->product_generic_id;
        $Product->invima_registration = $request->invima_registration;
        $Product->invima_status_id = $request->invima_status_id;
        $Product->sanitary_registration_id = $request->sanitary_registration_id;
        $Product->storage_conditions_id = $request->storage_conditions_id;
        $Product->risk_id = $request->risk_id;
        $Product->code_cum_file = $request->code_cum_file;
        $Product->code_cum_consecutive = $request->code_cum_consecutive;
        $Product->regulated_drug = $request->regulated_drug;
        $Product->high_price = $request->high_price;
        $Product->maximum_dose = $request->maximum_dose;
        $Product->indications = $request->indications;
        $Product->contraindications = $request->contraindications;
        $Product->applications = $request->applications;
        $Product->minimum_stock = $request->minimum_stock;
        $Product->maximum_stock = $request->maximum_stock;
        $Product->generate_iva = $request->generate_iva;
        
        $Product->save();

        return response()->json([
            'status' => true,
            'message' => 'Productos actualizado exitosamente',
            'data' => ['product' => $Product]
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
            $Product = Product::find($id);
            $Product->delete();

            return response()->json([
                'status' => true,
                'message' => 'Productos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Productos esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
