<?php

namespace App\Http\Controllers\Management;

use App\Models\ConsentsInformed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf as PDF;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;



class ConsentsInformedController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $ConsentsInformed = ConsentsInformed::with('admissions', 'assigned_user', 'type_consents', 'relationship');

        if ($request->_sort) {
            $ConsentsInformed->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ConsentsInformed->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $ConsentsInformed = $ConsentsInformed->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ConsentsInformed = $ConsentsInformed->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Plan de manejo obtenidos exitosamente',
            'data' => ['consents_informed' => $ConsentsInformed]
        ]);
    }

    public function getByAdmission(Request $request, int $id): JsonResponse
    {

        $ConsentsInformed = ConsentsInformed::with('admissions', 'assigned_user', 'relationship', 'type_consents')->where('admissions_id', $id);


        if ($request->_sort) {
            $ConsentsInformed->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ConsentsInformed->where('invoice_prefix', 'like', '%' . $request->search . '%')
                ->orWhere('invoice_consecutive', 'like', '%' . $request->search . '%')
                ->orWhere('received_date', 'like', '%' . $request->search . '%')
                ->orWhere('company.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ConsentsInformed = $ConsentsInformed->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $ConsentsInformed = $ConsentsInformed->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Planes obtenidos exitosamente',
            'data' => ['consents_informed' => $ConsentsInformed]
        ]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewCI(Request $request, int $id)
    {

        $ConsentsInformed = ConsentsInformed::with(
            'type_consents',
            'relationship',
            'admissions',
            'admissions.patients',
            'admissions.patients.identification_type',
            'assigned_user',
            'assigned_user.assistance',
            'assigned_user.roles',
            // 'assigned_user.assistance.medical_record', 
            // 'user_role.role',

        )
            ->where('id', $request->id)->get()->toArray();


        $imagenComoBase64 = null;


        $today = Carbon::now();


        if (count($ConsentsInformed[0]['assigned_user']['assistance']) > 0) {
            $rutaImagen = storage_path('app/public/' . $ConsentsInformed[0]['assigned_user']['assistance'][0]['file_firm']);
            $contenidoBinario = file_get_contents($rutaImagen);
            $imagenAssistence = base64_encode($contenidoBinario);
        } else {
            $imagenAssistence = null;
        }
        if ($ConsentsInformed[0]['firm_patient']) {
            $rutaImagen2 = storage_path('app/public/' . $ConsentsInformed[0]['firm_patient']);
            $contenidoBinario2 = file_get_contents($rutaImagen2);
            $imagenPatient = base64_encode($contenidoBinario2);
        } else {
            $imagenPatient = null;
        }
        if ($ConsentsInformed[0]['firm_responsible']) {
            $rutaImagen3 = storage_path('app/public/' . $ConsentsInformed[0]['firm_responsible']);
            $contenidoBinario3 = file_get_contents($rutaImagen3);
            $imagenResponsible = base64_encode($contenidoBinario3);
        } else {
            $imagenResponsible = null;
        }

        if ($ConsentsInformed[0]['type_consents_id'] == 1) {

            $html = view('mails.ciPsicologia', [
                'consentsinformed' => $ConsentsInformed,
                'firmpatient' => $imagenPatient,
                'firmassistance' => $imagenAssistence,
                'firmresponsible' => $imagenResponsible,
                'today' => $today,
            ])->render();
        } else if ($ConsentsInformed[0]['type_consents_id'] == 2) {

            $html = view('mails.ciProcedimientosg', [
                'consentsinformed' => $ConsentsInformed,
                'firmpatient' => $imagenPatient,
                'firmassistance' => $imagenAssistence,
                'firmresponsible' => $imagenResponsible,
                'today' => $today,

            ])->render();
        } else if ($ConsentsInformed[0]['type_consents_id'] == 3) {

            $html = view('mails.ciAltavoluntaria', [
                'consentsinformed' => $ConsentsInformed,
                'firmpatient' => $imagenPatient,
                'firmassistance' => $imagenAssistence,
                'firmresponsible' => $imagenResponsible,
                'today' => $today,
            ])->render();
        } else if ($ConsentsInformed[0]['type_consents_id'] == 4) {

            $html = view('mails.ciTeleterapia', [
                'consentsinformed' => $ConsentsInformed,
                'firmpatient' => $imagenPatient,
                'firmassistance' => $imagenAssistence,
                'firmresponsible' => $imagenResponsible,
                'today' => $today,
            ])->render();
        } else if ($ConsentsInformed[0]['type_consents_id'] == 5) {

            $html = view('mails.ciTerapiaL', [
                'consentsinformed' => $ConsentsInformed,
                'firmpatient' => $imagenPatient,
                'firmassistance' => $imagenAssistence,
                'firmresponsible' => $imagenResponsible,
                'today' => $today,
            ])->render();
        } else if ($ConsentsInformed[0]['type_consents_id'] == 6) {

            $html = view('mails.ciTerapiaR', [
                'consentsinformed' => $ConsentsInformed,
                'firmpatient' => $imagenPatient,
                'firmassistance' => $imagenAssistence,
                'firmresponsible' => $imagenResponsible,
                'today' => $today,
            ])->render();
        } else if ($ConsentsInformed[0]['type_consents_id'] == 7) {

            $html = view('mails.ciTerapiaF', [
                'consentsinformed' => $ConsentsInformed,
                'firmpatient' => $imagenPatient,
                'firmassistance' => $imagenAssistence,
                'firmresponsible' => $imagenResponsible,
                'today' => $today,
            ])->render();
        } else if ($ConsentsInformed[0]['type_consents_id'] == 8) {

            $html = view('mails.ciTerapiaO', [
                'consentsinformed' => $ConsentsInformed,
                'firmpatient' => $imagenPatient,
                'firmassistance' => $imagenAssistence,
                'firmresponsible' => $imagenResponsible,
                'today' => $today,
            ])->render();
        } else if ($ConsentsInformed[0]['type_consents_id'] == 9) {

            $html = view('mails.ciDisentimientoPAD', [
                'consentsinformed' => $ConsentsInformed,
                'firmpatient' => $imagenPatient,
                'firmassistance' => $imagenAssistence,
                'firmresponsible' => $imagenResponsible,
                'today' => $today,
            ])->render();
        } else if ($ConsentsInformed[0]['type_consents_id'] == 10) {

            $html = view('mails.ciRAudiovisual', [
                'consentsinformed' => $ConsentsInformed,
                'firmpatient' => $imagenPatient,
                'firmassistance' => $imagenAssistence,
                'firmresponsible' => $imagenResponsible,
                'today' => $today,
            ])->render();
        } else if ($ConsentsInformed[0]['type_consents_id'] == 11) {

            $html = view('mails.ciCompromisoPad', [
                'consentsinformed' => $ConsentsInformed,
                'firmpatient' => $imagenPatient,
                'firmassistance' => $imagenAssistence,
                'firmresponsible' => $imagenResponsible,
                'today' => $today,
            ])->render();
        }


        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new PDF($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'vertical');
        $dompdf->render();
        //$this->injectPageCount($dompdf);
        $file = $dompdf->output();

        $name = 'prueba.pdf';

        Storage::disk('public')->put($name, $file);


        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage' .  '/' . $name),
        ]);
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param ConsentsInformedRequest $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $ConsentsInformed = new ConsentsInformed;
            $ConsentsInformed->admissions_id = $request->admissions_id;

            if ($request->firm_patient && $request->firm_patient != 'null' && $request->firm_patient != 'undefined') {
                $image = $request->get('firm_patient');  // your base64 encoded
                $image = str_replace('data:image/png;base64,', '', $image);
                $image = str_replace(' ', '+', $image);
                $random = Str::random(10);
                $imagePath = 'firmas-consentimientos/' . $random . '.png';
                Storage::disk('public')->put($imagePath, base64_decode($image));

                $ConsentsInformed->firm_patient = $imagePath;
            }

            if ($request->firm_responsible && $request->firm_responsible != 'null' && $request->firm_responsible != 'undefined') {
                $image = $request->get('firm_responsible');  // your base64 encoded
                $image = str_replace('data:image/png;base64,', '', $image);
                $image = str_replace(' ', '+', $image);
                $random = Str::random(10);
                $imagePath = 'firmas-consentimientos/' . $random . '.png';
                Storage::disk('public')->put($imagePath, base64_decode($image));

                $ConsentsInformed->firm_responsible = $imagePath;
            }
            $ConsentsInformed->assigned_user_id = $request->assigned_user_id;
            $ConsentsInformed->type_consents_id = $request->type_consents_id;
            $ConsentsInformed->name_responsible = $request->name_responsible;
            $ConsentsInformed->parent_responsible = $request->parent_responsible;
            $ConsentsInformed->identification_responsible = $request->identification_responsible;

            $ConsentsInformed->relationship_id = $request->relationship_id;
            $ConsentsInformed->observations = $request->observations;
            $ConsentsInformed->because_patient = $request->because_patient;
            $ConsentsInformed->because_carer = $request->because_carer;
            $ConsentsInformed->number_contact = $request->number_contact;
            $ConsentsInformed->confirmation = $request->confirmation;
            $ConsentsInformed->dissent = $request->dissent;
            $ConsentsInformed->save();

            if ($ConsentsInformed->firm_patient) {
                $rutaImagen2 = storage_path('app/public/' . $ConsentsInformed->firm_patient);
                $contenidoBinario2 = file_get_contents($rutaImagen2);
                $imagenPatient = base64_encode($contenidoBinario2);
            } else {
                $imagenPatient = null;
            }
            if ($ConsentsInformed->firm_responsible) {
                $rutaImagen3 = storage_path('app/public/' . $ConsentsInformed->firm_responsible);
                $contenidoBinario3 = file_get_contents($rutaImagen3);
                $imagenResponsible = base64_encode($contenidoBinario3);
            } else {
                $imagenResponsible = null;
            }

            $today = Carbon::now();

            $ConsentsInformedValidate = ConsentsInformed::with(
                'type_consents',
                'relationship',
                'admissions',
                'admissions.patients',
                'admissions.patients.identification_type',
                'assigned_user',
                'assigned_user.assistance',
                'assigned_user.roles',
                // 'assigned_user.assistance.medical_record', 
                // 'user_role.role',

            )
                ->where('id', $ConsentsInformed->id)->get()->toArray();

            if (count($ConsentsInformedValidate[0]['assigned_user']['assistance']) > 0) {
                $rutaImagen = storage_path('app/public/' . $ConsentsInformedValidate[0]['assigned_user']['assistance'][0]['file_firm']);
                $contenidoBinario = file_get_contents($rutaImagen);
                $imagenAssistence = base64_encode($contenidoBinario);
            }
            $html = view('mails.ciPsicologia', [
                'consentsinformed' => $ConsentsInformedValidate,
                'firmpatient' => $imagenPatient,
                'firmassistance' => $imagenAssistence,
                'firmresponsible' => $imagenResponsible,
                'today' => $today,
            ])->render();
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $dompdf = new PDF($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('Carta', 'vertical');
            $dompdf->render();
            $file = $dompdf->output();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Concentimiento creado exitosamente',
                'data' => ['consents_informed' => $ConsentsInformed->toArray()]
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => 'Hubo un problema al procesar la firma, por favor vuelve a intentar',
                'error' => $e->getLine() . ' - ' . $e->getMessage(),
            ], 423);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ConsentsInformed = ConsentsInformed::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Concentimiento obtenido exitosamente',
            'data' => ['consents_informed' => $ConsentsInformed]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $ConsentsInformed = ConsentsInformed::find($id);
        $ConsentsInformed->admissions_id = $request->admissions_id;
        $ConsentsInformed->firm_patient = $request->firm_patient;
        $ConsentsInformed->firm_responsible = $request->firm_responsible;
        $ConsentsInformed->assigned_user_id = $request->assigned_user_id;
        $ConsentsInformed->type_consents_id = $request->type_consents_id;
        $ConsentsInformed->name_responsible = $request->name_responsible;
        $ConsentsInformed->parent_responsible = $request->parent_responsible;
        $ConsentsInformed->identification_responsible = $request->identification_responsible;
        $ConsentsInformed->parent_responsible = $request->parent_responsible;



        $ConsentsInformed->relationship_id = $request->relationship_id;
        $ConsentsInformed->observations = $request->observations;
        $ConsentsInformed->because_patient = $request->because_patient;
        $ConsentsInformed->because_carer = $request->because_carer;
        $ConsentsInformed->number_contact = $request->number_contact;
        $ConsentsInformed->confirmation = $request->confirmation;
        $ConsentsInformed->dissent = $request->dissent;
        $ConsentsInformed->save();


        return response()->json([
            'status' => true,
            'message' => 'Concentimiento actualizado exitosamente',
            'data' => ['consents_informed' => $ConsentsInformed->toArray()]
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
            $ConsentsInformed = ConsentsInformed::find($id);
            $ConsentsInformed->delete();

            return response()->json([
                'status' => true,
                'message' => 'Concentimiento eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Concentimiento está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
