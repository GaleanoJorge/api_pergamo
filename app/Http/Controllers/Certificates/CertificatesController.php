<?php

namespace App\Http\Controllers\Certificates;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Requests;
use Iluminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Validator;
use Dompdf\Dompdf;
use Dompdf\Options;
use Dompdf\FontMetrics;
use Certificates;
use App\Mail\CertificateMailer;
use App\Models\Base\Course;
use Mail;

class CertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $certificates = Certificate::all();
        if ($request->has('current_page') || $request->has('per_page')) {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $certificates = Certificate::paginate($per_page, '*', 'page', $page);
        }
        return response()->json(
            [
                'certificates' => $certificates,
                'status' => true,
                'message' => 'Certificados obtenidas exitosamente',
                'data' => ['certificates' => $certificates]
            ],
            200
        );
    }

    /**
     * Get certificate data by id and return pdf.
     *
     * @param int $id 
     * @return \Illuminate\Http\Response
     */
    public function get_pdf($id, $mode = 'download', $data = [])
    {

        $options = new Options();
        $options->set('isPhpEnabled', 'true');
        $pdf = new Dompdf($options);
        $certificate = Certificate::with('templates.papers_format')->findOrFail($id);
        $paper_h = Certificates::get_measure_cm_points($certificate->templates->papers_format->height);
        $paper_w = Certificates::get_measure_cm_points($certificate->templates->papers_format->width);

        $elements = json_decode($certificate->elements);

        $pdf->loadHTML(' ');
        $pdf->setPaper(array(0, 0, $paper_h, $paper_w), $certificate->templates->papers_format->landscape ? 'landscape' : 'portrait');
        $pdf->render();

        $canvas = $pdf->getCanvas();
        $canvas_height = $canvas->get_height();
        $canvas_width = $canvas->get_width();

        $fontMetrics = new FontMetrics($canvas, $options);

        $fontMetrics->getType(700);
        $font = $fontMetrics->getFont('serif', 'bold');

        for ($i = 0; $i < count($elements); $i++) {
            $value = $elements[$i];
            $x = Certificates::get_measure_px_points($value->x);
            $y = Certificates::get_measure_px_points($value->y);
            if (isset($value->font)) {
                $font = $fontMetrics->getFont($value->font, $value->bold ? 'bold' : 'normal');
            }
            if (isset($value->centerAlign) && $value->centerAlign) {
                $pointCenter = $canvas->get_width() / 2;
                $midTextWidth = $canvas->get_text_width($data[$value->value], $font, Certificates::get_measure_px_points($value->size)) / 2;
                $x = ($pointCenter - $midTextWidth);
            }
            if ($value->type == 'background') {
                $canvas->image($value->value, $x, $y, $canvas_width, $canvas_height);
            }
            if ($value->type == 'backgroundColor') {
                $canvas->filled_rectangle($x, $y, $canvas_width, $canvas_height, Certificates::get_rgb_color($value->value));
            }
            if ($value->type == 'signature') {
                $canvas->image($value->value, $x, $y, Certificates::get_measure_px_points($value->width), Certificates::get_measure_px_points($value->height));
            }
            if ($value->type == 'image') {
                $canvas->image($value->value, $x, $y, Certificates::get_measure_px_points($value->width), Certificates::get_measure_px_points($value->height));
            }
            if ($value->type == 'variable') {
                $canvas->text($x, $y, $data[$value->value], $font, Certificates::get_measure_px_points($value->size), Certificates::get_rgb_color($value->color));
            }
            if ($value->type == 'text') {
                $canvas->text($x, $y, $value->value, $font, Certificates::get_measure_px_points($value->size), Certificates::get_rgb_color($value->color));
            }
        }
        if ($mode != 'download') {
            $pdf_to_save = $pdf->output();
            $to = 'public/certificate_mailer/' . time() . '.pdf';
            \Storage::disk('local')->put($to, $pdf_to_save);
            return $to;
        } else {
            return $pdf->stream('certificate.pdf');
        }
    }

    /**
     * Generate  a certificate by id and send to email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send_certificate_email(Request $request)
    {
        $id = $request->input('id');
        $email = $request->input('email');
        $path = $this->get_pdf($id, $mode = 'send');
        $send = Mail::to([$email])->send(new CertificateMailer($path));
        return response()->json($send);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('elements')) {
            $request['elements'] = json_encode($request['elements'], True);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'templates_id' => 'required',
            'elements' => 'required|json',
            'thumbnail' => 'required|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $path_thumbnail = '';
        if ($request->hasFile('thumbnail')) {
            $path_thumbnail = \Storage::url($request->file('thumbnail')->store('public/certificates'));
        }
        if ($request->input('elements')) {
            $request['elements'] = json_decode($request['elements'], True);
        }
        $arr = [
            'name' => $request->input('name'),
            'templates_id' => $request->input('templates_id'),
            'elements' => $request->input('elements'),
            'thumbnail' => $path_thumbnail
        ];
        $certificate = Certificate::create($arr);
        return response()->json([
            'certificate' => $certificate,
            'notification' => 'Registro creado exitosamente',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $certificate = Certificate::with('templates.template_has_signature.signatures', 'templates.papers_format')->find($id);
        if (!$certificate) {
            return response()->json([
                'error' => 'certificate_does_not_exist',
                'notification' => 'No existe el elemento'
            ], 404);
        }
        return response()->json(['certificate' => $certificate], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $certificate = Certificate::findorFail($id);
        if ($request->input('elements')) {
            $request['elements'] = json_encode($request['elements'], True);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'elements' => 'required|json',
            'templates_id' => 'required',
            'thumbnail' => 'sometimes|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $path_thumbnail = '';
        if ($request->input('elements')) {
            $request['elements'] = json_decode($request['elements'], True);
        }
        $certificate->fill($request->except(['thumbnail']));
        if ($request->hasFile('thumbnail')) {
            $new_path_thumbnail = str_replace("/storage/", "/public/", $certificate->thumbnail);
            Storage::delete($new_path_thumbnail);
            $path_thumbnail = \Storage::url($request->file('thumbnail')->store('public/certificates'));
            $certificate->thumbnail = $path_thumbnail;
        }
        $certificate->update();
        return response()->json([
            'certificate' => $certificate,
            'notification' => 'Registro actualizado exitosamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certificate = Certificate::findorFail($id);
        $courses = Course::where('certificates_id', $certificate->id)->get();
        if (count($courses) > 0) {
            return response()->json([
                'certificate_delete' => False,
                'status' => False,
                'message' => 'Existen cursos relacionados con este certificado, no se puede eliminar',
            ], 423); 
        }
        $certificate->delete();
        $new_path_thumbnail = str_replace("/storage/", "/public/", $certificate->thumbnail);
        Storage::delete($new_path_thumbnail);
        return response()->json([
            'certificate_delete' => True,
            'notification' => 'Registro eliminado exitosamente',
        ], 200);
    }
}
