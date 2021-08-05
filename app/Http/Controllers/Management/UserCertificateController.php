<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\UserCertificate;
use App\Models\Base\UserRoleCourse;
use App\Http\Controllers\Certificates\CertificatesController;
use Illuminate\Http\JsonResponse;
use Validator;
use Notifications;

class UserCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_certificate = UserCertificate::with('user_role_course.user_group_activities', 'user_employee', 'user')->get();
        return response()->json([
            'status' => true,
            'message' => 'Listado extraido exitosamente',
            'data' => $user_certificate
        ], 200);
    }

    /**
     * Get students by course_id on table user_role_course
     * 
     * @param int $id
     * @return object
     */
    public function get_students($id)
    {
        $course_students = UserRoleCourse::select('user_role_course.*')
            ->with('user_role.user', 'user_certificates')
            ->join('user_role', 'user_role.id', 'user_role_id')
            ->whereIn('user_role.role_id', [5, 9])
            ->where('course_id', $id)
            ->where('inscription_status_id', '!=' , 2)->get();
        return response()->json([
            'status' => true,
            'message' => 'Listado extraido exitosamente',
            'data' => $course_students
        ], 200);
    }

    /**
     * Get courses by user
     * 
     * @param int $id
     * @return object
     */
    public function get_courses_user($id)
    {
        $courses = UserCertificate::with('user_role_course', 'user_employee', 'user')->where('user_id', $id)->get();
        return response()->json([
            'status' => true,
            'message' => 'Listado extraido exitosamente',
            'data' => $courses
        ], 200);
    }

    /**
     * Certificate students list
     * 
     * @param array $selections_ids
     * @param string $employee_id
     * @return object
     */
    public function certificate_students(Request $request)
    {
        $selections_ids = $request->input('selections_ids');
        $employee_id = $request->input('employee_id');
        $users_certificates = array();
        $certificateController = new CertificatesController();
        if (count($selections_ids) > 0) {
            foreach ($selections_ids as $key => $item) {
                $urc = UserRoleCourse::where('id', $item)->with('user_role.user', 'course.coursebase')->find($item);
                $name = $urc->user_role->user->firstname;
                if ($urc->user_role->user->middlefirstname != null) {
                    $name = $name . ' ' . $urc->user_role->user->middlefirstname;
                }
                $name = $name . ' ' . $urc->user_role->user->lastname;
                if ($urc->user_role->user->middlelastname != null) {
                    $name = $name . ' ' . $urc->user_role->user->middlelastname;
                }
                $data = [
                    "<NOMBREESTUDIANTE>" => $name,
                    "<IDENTIFICADOR>" => $urc->user_role->user->identification,
                    "<NOMBRECURSO>" => $urc->course->coursebase->name
                ];
                // generando certificado
                if($urc->course->certificates_id){
                $path = $certificateController->get_pdf($urc->course->certificates_id, 'path', $data);
                $e = [
                    'user_role_course_id' => $urc->id,
                    'user_employee_id' => $employee_id,
                    'user_id' => $urc->course->user->id,
                    'url_certificate' => $path
                ];
                $qry = UserCertificate::where('user_role_course_id', $urc->id)->where('user_id', $urc->course->user->id)->get();
                if (count($qry) == 0) {
                    $j = UserCertificate::create($e);
                    array_push($users_certificates, $e);
                }
                $inscription = UserRoleCourse::find($urc->id);
                $inscription->inscription_status_id = 3;
                $inscription->save();

                $shippingConfirmation = Notifications::sendNotification(
                    $urc->course->user->email,
                    'mails.certificate',
                    'Certificado Escuela Judicial Rodrigo Lara Bonilla',
                    [
                        'nombre'=>$name,
                        'curso'=> $urc->course->coursebase->name,
                        'url'=>$path
                
                    ]
                ); 
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Se debe asignar un certificado al curso seleccionado.'
                ],404);
            }
        }
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Certificado generado exitosamente',
            'data' => $users_certificates
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_role_course_id' => 'integer|required',
            'user_employee_id' => 'integer|required',
            'user_id' => 'integer|required',
            'url_certificate' => 'string|required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Ocurrio un error al validar los datos',
                'error' => $validator->errors()
            ], 400);
        }
        $arr = $request->all();
        $user_certificate = UserCertificate::create($arr);
        return response()->json([
            'status' => true,
            'message' => 'Registro almacenado exitosamente',
            'data' => $user_certificate
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
        $user_certificate = UserCertificate::with('user_role_course.user_group_activities', 'user_employee', 'user')->find(id);
        if (!$user_certificate) {
            return response()->json([
                'status' => false,
                'message' => 'No se encontro el elemento'
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Registro encontrado exitosamente',
            'data' => $user_certificate
        ], 200);
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
        $user_certificate = UserCertificate::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'user_role_course_id' => 'integer|required',
            'user_employee_id' => 'integer|required',
            'user_id' => 'integer|required',
            'url_certificate' => 'string|required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Ocurrio un error al validar los datos',
                'error' => $validator->errors()
            ], 400);
        }
        $user_certificate->fill($request->all());
        $user_certificate->update();
        return response()->json([
            'status' => true,
            'message' => 'Registro actualizado exitosamente',
            'data' => $user_certificate
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
        $user_certificate = UserCertificate::findOrFail($id);
        $user_certificate->delete();
        return response()->json([
            'status' => true,
            'message' => 'Registro eliminado exitosamente',
        ], 200);
    }
}
