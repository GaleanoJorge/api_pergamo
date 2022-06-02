<?php

namespace App\Http\Controllers\Admin;

use App\Models\Region;
use App\Models\Country;
use App\Models\Municipality;
use App\Models\NeighborhoodOrResidence;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Locality;

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

    /**
     * Display a listing of the resource
     *
     * @param integer $municipalityId
     * @return JsonResponse
     */

    public function GetLocalityByMunicipality(Request $request, int $municipalityId): JsonResponse
    {
        $locality = Locality::where('municipality_id', $municipalityId)
            ->orderBy('name', 'asc');

        if ($request->search) {
            $locality->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $locality = $locality->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $locality = $locality->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Comunas, Localidades o Veredas por municipio obtenidos exitosamente',
            'data' => ['locality' => $locality]
        ]);
    }
    /**
     * Display a listing of the resource
     *
     * @param integer $LocalityId
     * @return JsonResponse
     */

    public function getNeighborhoodResidenceByLocality(int $LocalityId): JsonResponse
    {
        $neighborhoodorresidence = NeighborhoodOrResidence::where('locality_id', $LocalityId)
            ->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Barrios por Comunas, Localidades o Veredas obtenidos exitosamente',
            'data' => ['neighborhood_or_residence' => $neighborhoodorresidence]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param integer $municipalityId
     * @return JsonResponse
     */

    public function getNeighborhoodResidenceByMunicipality(int $municipalityId): JsonResponse
    {
        $neighborhoodorresidence = NeighborhoodOrResidence::where('municipality_id', $municipalityId)
            ->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Barrios por municipio obtenidos exitosamente',
            'data' => ['neighborhood_or_residence' => $neighborhoodorresidence]
        ]);
    }
}
