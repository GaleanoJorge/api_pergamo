<?php

namespace App\Http\Controllers\Admin;

use App\Models\Region;
use App\Models\Country;
use App\Models\Municipality;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function getCountry(): JsonResponse
    {
        $countrys = Country::orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Países obtenidos exitosamente',
            'data' => ['countrys' => $countrys]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param integer $countryId
     * @return JsonResponse
     */
    public function getRegionByCountry(int $countryId): JsonResponse
    {
        $regions = Region::where('country_id', $countryId)
            ->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Departamentos por país obtenidos exitosamente',
            'data' => ['regions' => $regions]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param integer $regionId
     * @return JsonResponse
     */
    public function getMunicipalityByRegion(int $regionId): JsonResponse
    {
        $municipalitys = Municipality::where('region_id', $regionId)
            ->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Municipios por departamento obtenidos exitosamente',
            'data' => ['municipalitys' => $municipalitys]
        ]);
    }
}
