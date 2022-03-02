<?php

namespace App\Http\Controllers\Management;

use App\Models\ManualPrice;
use App\Models\ServicesBriefcase;
use App\Models\Manual;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ManualPriceRequest;
use Illuminate\Database\QueryException;
use PhpParser\Node\Stmt\TryCatch;

class ManualPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ManualPrice = ManualPrice::with('procedure', 'product', 'price_type', 'manual');

        if ($request->_sort) {
            $ManualPrice->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ManualPrice->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ManualPrice = $ManualPrice->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ManualPrice = $ManualPrice->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Asociación de los manuales con los procedimientos y las tarifas exitosamente',
            'data' => ['manual_price' => $ManualPrice]
        ]);
    }


    /**
     * @param  int  $briefcaseId
     * Get procedure by briefcase.
     *
     * @return JsonResponse
     */
    public function getByBriefcase(Request $request, int $briefcaseId): JsonResponse
    {
        $ServicesBriefcase = ServicesBriefcase::where('briefcase_id', '=', $briefcaseId)->pluck('manual_price_id')->toArray();
        $ManualPrice = ManualPrice::whereNotIn('id', $ServicesBriefcase)->with('procedure', 'product', 'price_type', 'manual');
        if ($request->search) {
            $ManualPrice->where('name', 'like', '%' . $request->search . '%')
                ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $ManualPrice = $ManualPrice->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ManualPrice = $ManualPrice->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Asociación de los manuales con los procedimientos y las tarifas exitoso',
            'data' => ['manual_price' => $ManualPrice]
        ]);
    }

    /**
     * @param  int  $briefcaseId
     * @param  int  $manualId
     * Get procedure by briefcase.
     *
     * @return JsonResponse
     */
    public function getByFilterManual(Request $request, int $briefcaseId, int $manualId): JsonResponse
    {
        $ServicesBriefcase = ServicesBriefcase::where('briefcase_id', '=', $briefcaseId)->pluck('manual_price_id')->toArray();
        $ManualPrice = ManualPrice::whereNotIn('id', $ServicesBriefcase)->with('procedure', 'product', 'price_type', 'manual')
            ->where('manual_id', $manualId);
        if ($request->search) {
            $ManualPrice->where('name', 'like', '%' . $request->search . '%')
                ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $ManualPrice = $ManualPrice->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ManualPrice = $ManualPrice->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Asociación de los manuales con los procedimientos y las tarifas exitoso',
            'data' => ['manual_price' => $ManualPrice]
        ]);
    }


    /**
     * Get procedure by manual.
     *
     * @param  int  $manualId
     * @return JsonResponse
     */
    public function getByManual(Request $request, int $manualId): JsonResponse
    {
        $ManualPrice = ManualPrice::where('manual_id', $manualId)->with('procedure', 'price_type');
        if ($request->search) {
            $ManualPrice->where('value', 'like', '%' . $request->search . '%')
                ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $ManualPrice = $ManualPrice->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ManualPrice = $ManualPrice->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Procedimientos por Manual tarifario obtenido exitosamente',
            'data' => ['manual_price' => $ManualPrice]
        ]);
    }

    /**
     * Get procedure by manual.
     *
     * @param  int  $manualId
     * @return JsonResponse
     */
    public function getByManual2(Request $request, int $manualId): JsonResponse
    {
        $ManualPrice = ManualPrice::where('manual_id', $manualId)->with('product', 'price_type');
        if ($request->search) {
            $ManualPrice->where('value', 'like', '%' . $request->search . '%')
                ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $ManualPrice = $ManualPrice->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ManualPrice = $ManualPrice->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Medicamentos
             por Manual tarifario obtenido exitosamente',
            'data' => ['manual_price' => $ManualPrice]
        ]);
    }


    public function store(ManualPriceRequest $request): JsonResponse
    {
        $Manual = Manual::select('type_manual')->where('id', $request->manual_id)->get();
        if ($Manual[0]->type_manual == 0) {
            $ManualPriceFilter = ManualPrice::where([])->get();
            if ($request->manual_procedure_type_id == 3) {
                $ManualPrice = new ManualPrice;
                $ManualPrice->name = $request->name;
                $ManualPrice->own_code = $request->own_code;
                $ManualPrice->manual_id = $request->manual_id;
                $ManualPrice->procedure_id = $request->procedure_id;
                $ManualPrice->product_id = null;
                $ManualPrice->value = $request->value;
                $ManualPrice->price_type_id = $request->price_type_id;
                $ManualPrice->manual_procedure_type_id = $request->manual_procedure_type_id;
                $ManualPrice->homologous_id = $request->homologous_id;
                $ManualPrice->save();
                return response()->json([
                    'status' => true,
                    'message' => 'Asociación de los manuales con los procedimientos y las tarifas creada exitosamente',
                    'data' => ['manual_price' => $ManualPrice->toArray()]
                ]);
            } else {

                $ManualPrice = new ManualPrice;
                $ManualPrice->name = $request->name;
                $ManualPrice->own_code = $request->own_code;
                $ManualPrice->manual_id = $request->manual_id;
                $ManualPrice->procedure_id = $request->procedure_id;
                $ManualPrice->product_id = null;
                $ManualPrice->value = $request->value;
                $ManualPrice->price_type_id = $request->price_type_id;
                $ManualPrice->manual_procedure_type_id = $request->manual_procedure_type_id;
                $ManualPrice->homologous_id = $request->homologous_id;
                $ManualPrice->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Asociación de los manuales con los procedimientos y las tarifas creada exitosamente',
                    'data' => ['manual_price' => $ManualPrice->toArray()]
                ]);
            }
        } else {
            $ManualPrice = new ManualPrice;
            $ManualPrice->manual_id = $request->manual_id;
            $ManualPrice->product_id = $request->product_id;
            $ManualPrice->procedure_id = null;
            $ManualPrice->value = $request->value;
            $ManualPrice->price_type_id = $request->price_type_id;
            $ManualPrice->name = $request->name;
            $ManualPrice->own_code = null;
            $ManualPrice->manual_procedure_type_id = $request->manual_procedure_type_id;
            $ManualPrice->homologous_id = null;
            $ManualPrice->save();


            return response()->json([
                'status' => true,
                'message' => 'Asociación de los manuales con los medicamentos y las tarifas creada exitosamente',
                'data' => ['manual_price' => $ManualPrice->toArray()]
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CourseBaseRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function import(Request $request, int $id)
    {
        $cont = 2;
        $errors = array();
        foreach ($request->toArray() as $key => $item) {

            if ($item["name"] != "") {
                try {
                    $ManualPrice = new ManualPrice;
                    $ManualPrice->name = $item['name'];
                    if ($item['own_code'] != "") {
                        $ManualPrice->own_code = $item['own_code'];
                    }
                        $ManualPrice->manual_procedure_type_id = $item['manual_procedure_type_id'];
                    if ($item['homologous_id'] != "") {
                        $ManualPrice->homologous_id = $item['homologous_id'];
                    }
                    if ($item['manual_id']) {
                        $ManualPrice->manual_id = $item['manual_id'];
                    } else {
                        $ManualPrice->manual_id = $id;
                    }
                    if ($item['procedure_id'] != "") {
                        $ManualPrice->procedure_id = $item['procedure_id'];
                    }
                    if ($item['product_id'] != "") {
                        $ManualPrice->product_id = $item['product_id'];
                    }
                    $ManualPrice->value = $item['value'];
                    $ManualPrice->price_type_id = $item['price_type_id'];
                    $ManualPrice->save();
                } catch (\Exception $e) {
                    array_push($errors, $cont);
                }
                $cont++;
            } else {
                break;
            }
        }
        return response()->json([
            'status' => true,
            'message' => 'Asociación de los manuales con los procedimientos y las tarifas creada exitosamente',
            'data' => ['manual_price' => $request->toArray()],
            'data_error' => [$errors],
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
        $ManualPrice = ManualPrice::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Asociación de los manuales con los procedimientos y las tarifas obtenidos exitosamente',
            'data' => ['manual_price' => $ManualPrice]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ManualPriceRequest $request, int $id): JsonResponse
    {
        $ManualPrice = ManualPrice::find($id);
        $ManualPrice->manual_id = $request->manual_id;
        $ManualPrice->procedure_id = $request->procedure_id;
        $ManualPrice->value = $request->value;
        $ManualPrice->price_type_id = $request->price_type_id;
        $ManualPrice->name = $request->name;
        $ManualPrice->own_code = $request->own_code;
        $ManualPrice->manual_procedure_type_id = $request->manual_procedure_type_id;
        $ManualPrice->homologous_id = $request->homologous_id;
        $ManualPrice->save();

        return response()->json([
            'status' => true,
            'message' => 'Asociación de los manuales con los procedimientos y las tarifas actualizado exitosamente',
            'data' => ['manual_price' => $ManualPrice]
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
            $ManualPrice = ManualPrice::find($id);
            $ManualPrice->delete();

            return response()->json([
                'status' => true,
                'message' => 'Asociación de los manuales con los procedimientos y las tarifas eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Asociación de los manuales con los procedimientos y las tarifas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
