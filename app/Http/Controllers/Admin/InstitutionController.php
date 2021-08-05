<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\EducationalInstitution;
use Illuminate\Database\QueryException;
use App\Http\Requests\InstitutionRequest;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $institutions = EducationalInstitution::with('municipality')
            ->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Instituciones obtenidos exitosamente',
            'data' => ['Institutions' => $institutions]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InstitutionRequest $request
     * @return JsonResponse
     */
    public function store(InstitutionRequest $request): JsonResponse
    {
        $institution = new EducationalInstitution;
        $institution->municipality_id = $request->municipio;
        $institution->name = $request->nombre;
        $institution->save();

        return response()->json([
            'status' => true,
            'message' => 'Institución creado exitosamente',
            'data' => ['institution' => $institution->toArray()]
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
        $institution = EducationalInstitution::where('id', $id)
            ->with('municipality')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Institución obtenido exitosamente',
            'data' => ['institution' => $institution]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InstitutionRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(InstitutionRequest $request, int $id): JsonResponse
    {
        $institution = EducationalInstitution::find($id);
        $institution->municipality_id = $request->municipio;
        $institution->name = $request->nombre;
        $institution->save();

        return response()->json([
            'status' => true,
            'message' => 'Institución actualizado exitosamente',
            'data' => ['institution' => $institution]
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
            $institution = EducationalInstitution::find($id);
            $institution->delete();

            return response()->json([

                'status' => true,
                'message' => 'Institución eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La institución está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }

    /**
     * Display a listing of the resource
     *
     * @param integer $municipalityId
     * @return JsonResponse
     */
    public function getInstitutionsByMunicipality(int $municipalityId): JsonResponse
    {
        $institutions = EducationalInstitution::where('municipality_id', $municipalityId)
            ->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Instituciones por municipio obtenidas exitosamente',
            'data' => ['institutions' => $institutions]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param integer $parentId
     * @return JsonResponse
     */
    public function getInstitutionsByParent(int $parentId): JsonResponse
    {
        $institutions = EducationalInstitution::where('parent_id', $parentId)
            ->with(
                'educational_institution',
                'municipality',
                'municipality.region'
            )->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Instituciones por centro obtenidas exitosamente',
            'data' => ['institutions' => $institutions]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function getInstitutionById(int $id): JsonResponse
    {
        $institutions = EducationalInstitution::where('id', $id)
            ->with(
                'educational_institution',
                'municipality',
                'municipality.region',
                'course_educational_institution',
                'course_educational_institution.course',
                'course_educational_institution.course.category',
                'course_educational_institution.course_institution_cohorts'
            )->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Institución por id obtenida exitosamente',
            'data' => ['institution' => $institutions]
        ]);
    }
}
