<?php

namespace App\Http\Controllers\Management;

use App\Models\ServicesBriefcase;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServicesBriefcaseRequest;
use Illuminate\Database\QueryException;

class ServicesBriefcaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ServicesBriefcase = ServicesBriefcase::with('manual_price.patient', 'manual_price.procedure' );

        if ($request->_sort) {
            $ServicesBriefcase->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ServicesBriefcase->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ServicesBriefcase = $ServicesBriefcase->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ServicesBriefcase = $ServicesBriefcase->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios obtenidos exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase]
        ]);
    }

    /**
     * Get procedure by manual.
     *
     * @param  int  $briefcaseId
     * @return JsonResponse
     */
    public function getByBriefcase(Request $request, int $briefcaseId): JsonResponse
    {
        $ServicesBriefcase = ServicesBriefcase::select(
            'services_briefcase.*',
            'services_briefcase.value',
            'services_briefcase.factor',
        )->with(
            'briefcase',
            'manual_price',
            'manual_price.procedure',
            'manual_price.procedure.procedure_category',
            'manual_price.product',
            'manual_price.product.measurement_units',
            'manual_price.product.drug_concentration',
            'manual_price.product.multidose_concentration',
            'manual_price.manual',
            'manual_price.insume.measure_supplies_measure',
            'manual_price.patient',
        )
            ->leftjoin('manual_price', 'services_briefcase.manual_price_id', 'manual_price.id')
            ->leftjoin('procedure', 'manual_price.procedure_id', 'procedure.id')
            ->leftjoin('product', 'manual_price.product_id', 'product.id')
            ->leftjoin('product_supplies', 'manual_price.supplies_id', 'product_supplies.id')
            ->where('briefcase_id', $briefcaseId);
        if ($request->type == 1) {
        } else if ($request->type == 2) {
   
                $ServicesBriefcase->where(function ($query) use ($request) {
                    $query->whereNull('manual_price.patient_id')
                        ->orWhere('manual_price.patient_id',  $request->patient);
                });         
                $ServicesBriefcase
                ->whereNotNull('manual_price.product_id');
        } else if ($request->type == 3) {
            $ServicesBriefcase
                ->whereNotNull('manual_price.supplies_id');
        
        } else {
            $ServicesBriefcase->where(function ($query) use ($request) {
                $query->whereNull('manual_price.patient_id')
                    ->orWhere('manual_price.patient_id',  $request->patient);
            });         
            $ServicesBriefcase
                ->where('manual_price.procedure_id', '!=', 'null')
                ->where('procedure.procedure_type_id', '!=', '3');

            if($request->laboratory == true){
                $ServicesBriefcase
                ->where('procedure.procedure_category_id', '=', 5);
            }
        }

        if ($request->search) {
            $ServicesBriefcase->where(function ($query) use ($request) {
                $query->where('procedure.name', 'like', '%' . $request->search . '%')
                    ->orWhere('procedure.code', 'like', '%' . $request->search . '%')
                    ->orWhere('manual_price.name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $ServicesBriefcase = $ServicesBriefcase->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ServicesBriefcase = $ServicesBriefcase->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Portafolio por contrato obtenido exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase]
        ]);
    }

    /**
     * Get procedure by manual.
     *
     * @param  int  $briefcaseId
     * @return JsonResponse
     */
    public function getPackageByBriefcase(Request $request, int $briefcaseId): JsonResponse
    {
        $ServicesBriefcase = ServicesBriefcase::select('services_briefcase.*', 'manual_price.name AS name')
            ->with('manual_price')
            ->leftjoin('manual_price', 'services_briefcase.manual_price_id', 'manual_price.id')
            ->where('services_briefcase.briefcase_id', $briefcaseId)
            ->where('manual_price.manual_procedure_type_id', 3)->get()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'Portafolio por contrato obtenido exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase]
        ]);
    }

    public function store(ServicesBriefcaseRequest $request): JsonResponse
    {
        $ServicesBriefcase = new ServicesBriefcase;
        if ($request->price_type_id == 1) {
            if ($request->sign == 0) {
                $request->factor = $request->factor + 100;
                $ServicesBriefcase->value = $request->value * $request->factor / 100;
                $factor = $request->factor - 100;
                $ServicesBriefcase->factor = '+' . $factor;
            } else {
                $tem = $request->value * $request->factor / 100;
                $ServicesBriefcase->value = $request->value - $tem;
                $ServicesBriefcase->factor = '-' . $request->factor;
            }
        } else {
            if ($request->sign == 0) {
                $request->factor = $request->factor + 100;
                $ServicesBriefcase->value = 30284 * $request->value * $request->factor / 100;
                $ServicesBriefcase->factor = '+' . $request->factor;
            } else {
                $tem = 30284 * $request->value * $request->factor / 100;
                $ServicesBriefcase->value = $request->value - $tem;
                $ServicesBriefcase->factor = '-' . $request->factor;
            }
        }
        $ServicesBriefcase->briefcase_id = $request->briefcase_id;
        $ServicesBriefcase->manual_price_id = $request->manual_price_id;
        $ServicesBriefcase->save();

        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios creada exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase->toArray()]
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
        $ServicesBriefcase = ServicesBriefcase::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios obtenido exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ServicesBriefcaseRequest $request, int $id): JsonResponse
    {
        $ServicesBriefcase = ServicesBriefcase::find($id);
        if ($request->price_type_id == 1) {
            if ($request->sign == 0) {
                $request->factor = $request->factor + 100;
                $ServicesBriefcase->value = $request->value * $request->factor / 100;
                $factor = $request->factor - 100;
                $ServicesBriefcase->factor = '+' . $factor;
            } else {
                $tem = $request->value * $request->factor / 100;
                $ServicesBriefcase->value = $request->value - $tem;
                $ServicesBriefcase->factor = '-' . $request->factor;
            }
        } else {
            if ($request->sign == 0) {
                $request->factor = $request->factor + 100;
                $ServicesBriefcase->value = 30284 * $request->value * $request->factor / 100;
                $ServicesBriefcase->factor = '+' . $request->factor;
            } else {
                $tem = 30284 * $request->value * $request->factor / 100;
                $ServicesBriefcase->value = $request->value - $tem;
                $ServicesBriefcase->factor = '-' . $request->factor;
            }
        }
        $ServicesBriefcase->briefcase_id = $request->briefcase_id;
        $ServicesBriefcase->manual_price_id = $request->manual_price_id;
        $ServicesBriefcase->save();


        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios actualizado exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase]
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
            $ServicesBriefcase = ServicesBriefcase::find($id);
            $ServicesBriefcase->delete();

            return response()->json([
                'status' => true,
                'message' => 'portafolio de servicios eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'portafolio de servicios esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
