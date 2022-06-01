<?php

namespace App\Http\Controllers\Management;

use App\Models\MinimumSalary;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MinimumSalaryRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class MinimumSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $MinimumSalary = MinimumSalary::select()
            ->orderBy('id', 'desc');

        if ($request->_sort) {
            $MinimumSalary->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $MinimumSalary->where('year', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $MinimumSalary = $MinimumSalary->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $MinimumSalary = $MinimumSalary->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Salario mínimo mensual obtenidos exitosamente',
            'data' => ['minimum_salary' => $MinimumSalary]
        ]);
    }

    public function getLatestMinimumSalary(): JsonResponse
    {
        $MinimumSalary = MinimumSalary::select()->orderBy('year', 'desc')->first();

        return response()->json([
            'status' => true,
            'message' => 'Salario mínimo mensual obtenidos exitosamente',
            'data' => ['minimum_salary' => $MinimumSalary]
        ]);
    }

    public function store(MinimumSalaryRequest $request): JsonResponse
    {
        $ChackMinimumSalary = MinimumSalary::where('year', $request->year)->first();

        if ($ChackMinimumSalary) {
            return response()->json([
                'status' => false,
                'message' => 'El salario mínimo mensual ya existe',
                'data' => ['minimum_salary' => $ChackMinimumSalary]
            ]);
        }

        if ($request->year < Carbon::now()->year) {
            return response()->json([
                'status' => false,
                'message' => 'El año del salario mínimo mensual no puede ser menor al año actual',
                'data' => ['minimum_salary' => $ChackMinimumSalary]
            ]);
        }


        $MinimumSalary = new MinimumSalary;
        $MinimumSalary->value = $request->value;
        $MinimumSalary->year = $request->year;

        $MinimumSalary->save();

        return response()->json([
            'status' => true,
            'message' => 'Salario mínimo mensual creados exitosamente',
            'data' => ['minimum_salary' => $MinimumSalary->toArray()]
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
        $MinimumSalary = MinimumSalary::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Salario mínimo mensual obtenidos exitosamente',
            'data' => ['minimum_salary' => $MinimumSalary]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(MinimumSalaryRequest $request, int $id): JsonResponse
    {
        $MinimumSalary = MinimumSalary::find($id);
        $MinimumSalary->value = $request->value;
        $MinimumSalary->year = $request->year;

        $MinimumSalary->save();

        return response()->json([
            'status' => true,
            'message' => 'Salario mínimo mensual actualizados exitosamente',
            'data' => ['minimum_salary' => $MinimumSalary]
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
            $MinimumSalary = MinimumSalary::find($id);
            $MinimumSalary->delete();

            return response()->json([
                'status' => true,
                'message' => 'Salario mínimo mensual eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Salario mínimo mensual estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
