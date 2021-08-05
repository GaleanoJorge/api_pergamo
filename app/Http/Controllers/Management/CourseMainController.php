<?php

namespace App\Http\Controllers\Management;

use App\Models\SectionalCouncil;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseMainRequest;
use App\Models\Course;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseMainController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $courses = Course::with(
            'campus',
            'coursebase',
            'category',
            'category.category',
            'category.categories',
            'themes',
            'competitions',
            'course_type',
            'entity_type'
        );

        if ($request->_sort) {
            $courses->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $courses = Course::select('*', 'course.id as id')
                ->Join('campus', 'campus.id', 'course.campus_id')
                ->Join('coursebase', 'coursebase.id', 'course.coursebase_id')
                ->Join('entity_type', 'entity_type.id', 'course.entity_type_id')
                ->with(
                    'campus',
                    'coursebase',
                    'entity_type'
                )->where('campus.name', 'like', '%' . $request->search . '%')
                ->orWhere('coursebase.name', 'like', '%' . $request->search . '%')
                ->orWhere('entity_type.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $courses = $courses->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $courses = $courses->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Cursos obtenidos exitosamente',
            'data' => ['courses' => $courses]
        ]);
    }
    /**
     * Display a listing of the resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index2(Request $request, int $validityId = null,int $originId = null,int $categoryId = null): JsonResponse
    {
        $courses = Course::with('origin', 'campus', 'coursebase', 'category', 'category.categories', 'themes', 'course_type');

        if ($validityId > 0 && $validityId!=null) {
            $courses->Join('origin', 'origin.id', 'origin_id');
            $courses = $courses->where('origin.validity_id', $validityId);    
        }
        if ($originId > 0 && $originId!=null) {
            $courses = $courses->where('origin_id', $originId);
        }
        if ($categoryId > 0 && $categoryId!=null) {
            $courses = $courses->where('category_id', $categoryId);
        }
        if ($request->_sort) {
            $courses->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $courses = Course::select('*', 'course.id as id')
                ->Join('campus', 'campus.id', 'course.campus_id')
                ->Join('coursebase', 'coursebase.id', 'course.coursebase_id')
                ->with(
                    'campus',
                    'coursebase'
                )->where('campus.name', 'like', '%' . $request->search . '%')
                ->orWhere('coursebase.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $courses = $courses->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $courses = $courses->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Cursos obtenidos exitosamente',
            'data' => ['courses' => $courses]
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param CourseMainRequest $request
     * @return JsonResponse
     */
    public function store(CourseMainRequest $request): JsonResponse
    {
        $course = new Course;
        $course->origin_id = $request->origin_id;
        $course->category_id = $request->category_id;
        $course->campus_id = $request->campus_id;
        $course->entity_type_id = $request->entity_type_id;
        $course->user_id = Auth::user()->id;
        $course->coursebase_id = $request->coursebase_id;
        $course->certificates_id = $request->certificates_id ? $request->certificates_id : null;
        $course->course_type_id = $request->course_type_id ? $request->course_type_id : null;
        $course->course_states_id = $request->course_states_id ? $request->course_states_id : null;
        $course->quota = $request->quota;
        $course->course_template = $request->course_template;
        $course->start_date = $request->start_date;
        $course->finish_date = $request->finish_date;
        $course->save();

        return response()->json([
            'status' => true,
            'message' => 'Curso creado exitosamente',
            'data' => ['course' => $course->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $course = Course::where('id', $id)->with(
            'campus',
            'coursebase',
            'coursebase.category',
            'coursebase.category.categories_origin',
            'coursebase.category.categories_origin.origin.validity',
            'course_type'
        )->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Curso obtenido exitosamente',
            'data' => ['course' => $course]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(CourseMainRequest $request, int $id): JsonResponse
    {
        $course = Course::find($id);
        $course->origin_id = $request->origin_id;
        $course->category_id = $request->category_id;
        $course->campus_id = $request->campus_id;
        $course->entity_type_id = $request->entity_type_id;
        $course->coursebase_id = $request->coursebase_id;
        $course->certificates_id = $request->certificates_id ? $request->certificates_id : null;
        $course->course_type_id = $request->course_type_id ? $request->course_type_id : null;
        $course->course_states_id = $request->course_states_id ? $request->course_states_id : null;
        $course->quota = $request->quota;
        $course->course_template = $request->course_template;
        $course->start_date = $request->start_date;
        $course->finish_date = $request->finish_date;
        $course->save();

        return response()->json([
            'status' => true,
            'message' => 'Curso actualizado exitosamente',
            'data' => ['course' => $course]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $course = Course::find($id);
            $course->delete();

            return response()->json([
                'status' => true,
                'message' => 'Curso eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El Curso está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
