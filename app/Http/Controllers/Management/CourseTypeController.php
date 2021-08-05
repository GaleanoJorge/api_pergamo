<?php

namespace App\Http\Controllers\Management;

use App\Models\CourseType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CourseTypeRequest;
use Illuminate\Database\QueryException;

class CourseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $types = CourseType::orderBy('name');

        if ($request->search) {
            $types->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $types = $types->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $types = $types->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipos de cursos obtenidos exitosamente',
            'data' => ['course_type' => $types]
        ]);
    }

    public function store(CourseTypeRequest $request): JsonResponse
    {
        $course_type = new CourseType;
        $course_type->name = $request->name;
        $course_type->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de curso creado exitosamente',
            'data' => ['course_type' => $course_type->toArray()]
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
        $course_type = CourseType::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de curso obtenido exitosamente',
            'data' => ['course_type' => $course_type]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CampusRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CourseTypeRequest $request, int $id): JsonResponse
    {
        $course_type = CourseType::find($id);
        $course_type->name = $request->name;
        $course_type->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de curso actualizado exitosamente',
            'data' => ['course_type' => $course_type]
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
            $course_type = CourseType::find($id);
            $course_type->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de curso eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El tipo de curso esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
