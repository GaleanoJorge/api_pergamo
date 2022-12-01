<?php

namespace App\Http\Controllers\Management;

use App\Models\AssistanceSpecial;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssistanceSpecialRequest;
use Illuminate\Database\QueryException;

class AssistanceSpecialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $A_special = AssistanceSpecial::select('assistance_special.*')
            ->leftJoin('assistance', 'assistance.id', 'assistance_special.assistance_id')
            ->with(
                'specialty',
            )
            ->groupBy('assistance_special.id');

        if ($request->_sort) {
            $A_special->orderBy($request->_sort, $request->_order);
        }


        if ($request->user_id) {
            $A_special->where('assistance.user_id', $request->user_id);
        }

        if ($request->search) {
            $A_special->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $A_special = $A_special->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $A_special = $A_special->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Personal Asistencial Especial obtenido exitosamente',
            'data' => ['assistance_special' => $A_special]
        ]);
    }

    public function store(AssistanceSpecialRequest $request): JsonResponse
    {
        $A_special = new AssistanceSpecial;
        $A_special->specialty_id = $request->specialty_id;
        $A_special->assistance_id = $request->assistance_id;
        $A_special->save();

        return response()->json([
            'status' => true,
            'message' => 'Especialización del Personal Asistencial creada exitosamente',
            'data' => ['assistance_special' => $A_special->toArray()]
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
        $A_special = AssistanceSpecial::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Especialización del Personal Asistencial obtenida exitosamente',
            'data' => ['assistance_special' => $A_special]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AssistanceSpecialRequest $request, int $id): JsonResponse
    {
        $A_special = AssistanceSpecial::find($id);
        $A_special->specialty_id = $request->specialty_id;
        $A_special->assistance_id = $request->assistance_id;
        $A_special->save();

        return response()->json([
            'status' => true,
            'message' => 'Especialización del Personal Asistencial creada exitosamente',
            'data' => ['assistance_special' => $A_special]
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
            $A_special = AssistanceSpecial::find($id);
            $A_special->delete();

            return response()->json([
                'status' => true,
                'message' => 'Especialización del Personal Asistencial eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Especialización del Personal Asistencial esta en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
