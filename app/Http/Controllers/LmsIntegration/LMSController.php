<?php

namespace App\Http\Controllers\LmsIntegration;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\CompetitionActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use App\Models\Process;
use App\Models\ProcessDetail;
use App\Models\ActivityLms;
use App\Models\ProcessDetailActivity;
use App\Models\ProcessDetailActivityRubric;
use App\Models\ProcessDetailActivityCompetences;
use App\Models\Base\Rubric;
use App\Models\Base\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Array_;

class LMSController extends Controller
{

    public function enrollment(Request $request): JsonResponse
    {
        $TYPE_DETAIL = ['Grupos' => '1', 'Enrolamientos' => '2', 'Usuarios' => '3'];
        $STATE_DETAIL = ['created' => '1', 'updated' => '2', 'error' => '3'];
        $GET_NAME = ['Grupos' => 'groups', 'Enrolamientos' => 'enrolls', 'Usuarios' => 'users'];
        $result = new Client();
        $result = json_decode($result->get(env('ENROLLMENT'))->getBody()->getContents());
        //$result = json_decode($result->get('https://lms-test.eduredejrlb.co/blocks/sga_integrations/controller.php?method=processSgaIntegration&debug=false')->getBody()->getContents());
            $process = new Process;
            $process->process_type_id = 1;
            $process->user_id = Auth::user()->id;
            $process->message = $result->msg;
            $process->state = $result->state;
            $process->save();
            foreach ($result->result as $name_group => $groups) {
                $type_detail = $TYPE_DETAIL[$name_group];
                $get_name = $GET_NAME[$name_group];
                foreach ($groups->details as $name_detail => $details) {
                    $state_detail = $STATE_DETAIL[$name_detail];
                    if ($details->count > 0) {
                        foreach ($details->$get_name as $item) {
                            $process_detail = new ProcessDetail;
                            $process_detail->process_detail_type_id = $type_detail;
                            $process_detail->process_detail_state_id = $state_detail;
                            $process_detail->process_id = $process->id;
                            $process_detail->group_id = $get_name != 'users' ? $item->id_externo_grupo : null;
                            $process_detail->user_id = $get_name == 'enrolls' ? $item->id_externo_usuario : null;
                            $process_detail->user_id = $get_name == 'users' ? $item->usuario_id_externo : $process_detail->user_id;
                            $process_detail->save();
                        }
                    }
                }
            }
        return response()->json(['status' => true, 'message' => 'Proceso ejecutado con éxito']);
    }

    public function enrollment_old(Request $request): JsonResponse
    {

        $user_id = 1;
        try {
            $lms = new Client();
            $lms = json_decode($lms->get(env('ENROLLMENT'))->getBody()->getContents());
            $process = new Process;
            $process->process_type_id = 1;
            $process->user_id = $user_id;
            $process->message = $lms->msg;
            $process->state = 'Procesando';
            $process->save();
            $result = $lms->result;
            foreach ($result as $key => $value) {
                $type_detail = 0;
                switch ($key) {
                    case 'Grupos':
                        $type_detail = 1;
                        break;
                    case 'Enrolamientos':
                        $type_detail = 2;
                        break;
                    case 'Usuarios':
                        $type_detail = 3;
                        break;


                }
                $details = $result->$key->details;

                foreach ($details as $key2 => $value2) {
                    $state_detail = 0;
                    switch ($key2) {
                        case 'created':
                            $state_detail = 1;
                            break;
                        case 'updated':
                            $state_detail = 2;
                            break;
                        case 'error':
                            $state_detail = 3;
                            break;


                    }

                    $count = $details->$key2->count;
                    if ($count > 0) {

                        switch ($type_detail) {
                            case 1:
                                $data = $details->$key2->groups;

                                foreach ($data as $key3 => $value3) {

                                    $process_detail = new ProcessDetail;
                                    $process_detail->process_detail_type_id = $type_detail;
                                    $process_detail->process_detail_state_id = $state_detail;
                                    $process_detail->process_id = $process->id;
                                    $process_detail->group_id = $data[$key3]->id_externo_grupo;

                                    $process_detail->save();

                                }
                                break;
                            case 2:
                                $data = $details->$key2->enrolls;
                                foreach ($data as $key3 => $value3) {

                                    $process_detail = new ProcessDetail;
                                    $process_detail->process_detail_type_id = $type_detail;
                                    $process_detail->process_detail_state_id = $state_detail;
                                    $process_detail->process_id = $process->id;
                                    $process_detail->group_id = $data[$key3]->id_externo_grupo;
                                    $process_detail->user_id = $data[$key3]->userid;;
                                    $process_detail->save();

                                }
                                break;
                            case 3:
                                $data = $details->$key2->users;
                                foreach ($data as $key3 => $value3) {

                                    $process_detail = new ProcessDetail;
                                    $process_detail->process_detail_type_id = $type_detail;
                                    $process_detail->process_detail_state_id = $state_detail;
                                    $process_detail->process_id = $process->id;
                                    $process_detail->user_id = $data[$key3]->usuario_id_externo;;
                                    $process_detail->save();

                                }
                                break;

                        }


                    }
                }

            }

            $process = Process::where('id', $process->id)
                ->get()->toArray();


        } catch (\Throwable $th) {
            throw $th;
        }
        return response()->json($process);
    }

    public function ratings(Request $request): JsonResponse
    {
        $user_id = $request->input('user_id');
        try {
            $lms = new Client();
            $lms = json_decode($lms->get(env('RATINGS'))->getBody()->getContents());
            //return response()->json($lms);

            $process = new Process;
            $process->process_type_id = 2;
            $process->user_id = $user_id;
            $process->message = $lms->msg;
            $process->state = 'Procesando';
            $process->save();

            $courses = $lms->result->courses;
            foreach ($courses as $key => $value) {
                $groups = $courses->$key->groups;
                foreach ($groups as $key2 => $value2) {
                    $users = $groups->$key2->users;
                    foreach ($users as $key3 => $value3) {
                        $process_detail = new ProcessDetail;
                        $process_detail->process_detail_type_id = 4;
                        $process_detail->process_detail_state_id = 1;
                        $process_detail->process_id = $process->id;
                        $group = Group::where('id', $groups->$key2->id_externo_grupo)->get()->first();
                        if (!$group) {
                            $group = new Group;
                            $group->id = $groups->$key2->id_externo_grupo;
                            $group->name = '';
                            $group->course_id = $courses->$key->courseid;
                            $group->save();
                        }
                        $process_detail->group_id = $group->id;
                        $user = User::where('id', $users[$key3]->userid)->get()->first();
                        if (!$user) {
                            $user = new User;
                            $user->id = $users[$key3]->userid;
                            $user->email = $users[$key3]->email;
                            $user->username = $users[$key3]->username;
                            $user->status_id = 1;
                            $user->gender_id = 1;
                            $user->is_disability = 0;
                            $user->firstname = $users[$key3]->firstname;
                            $user->lastname = $users[$key3]->lastname;
                            $user->save();
                        }
                        $process_detail->user_id = $user->id;
                        $process_detail->save();
                        $grades = $users[$key3]->grades;
                        foreach ($grades as $key4 => $value4) {
                            $activity_lms = ActivityLms::where('name', $grades->$key4->ColumnName)->get()->first();
                            if (!$activity_lms) {
                                $activity_lms = new ActivityLms;
                                $activity_lms->name = $grades->$key4->ColumnName;
                                $activity_lms->course_id = $courses->$key->courseid;
                                $activity_lms->save();
                            }
                            $process_detail_activity = new ProcessDetailActivity;
                            $process_detail_activity->process_detail_id = $process_detail->id;
                            $process_detail_activity->grade = $grades->$key4->grade != '-' ? $grades->$key4->grade : 0;
                            $process_detail_activity->observation = '';
                            $process_detail_activity->activity_lms_id = $activity_lms->id;
                            $process_detail_activity->save();
                            if (isset($grades->$key4->rubricas)) {
                                $rubricas = $grades->$key4->rubricas;
                                foreach ($rubricas as $key5 => $value5) {
                                    $process_detail_activity_rubric = new ProcessDetailActivityRubric;
                                    $process_detail_activity_rubric->process_d_a_id = $process_detail_activity->id;
                                    $rubric = Rubric::where('name', $rubricas[$key5]->Nombre)->get()->first();
                                    if (!$rubric) {
                                        $rubric = new Rubric;
                                        $rubric->name = $rubricas[$key5]->Nombre;
                                        $rubric->activity_id = $activity_lms->id;
                                        $rubric->save();
                                    }
                                    $process_detail_activity_rubric->rubric_id = $rubric->id;
                                    $process_detail_activity_rubric->grade = $rubricas[$key5]->Puntos;
                                    $process_detail_activity_rubric->observation = $rubricas[$key5]->Comentario;
                                    $process_detail_activity_rubric->save();
                                }
                            }
                        }
                        $competences = $users[$key3]->competences;
                        foreach ($competences as $competence) {
                            //competition
                            $competition = Competition::where('name', $competence->shortname)->get()->first();
                            if (!$competition) {
                                $competition = new Competition;
                                $competition->name = $competence->shortname;
                                $competition->description = $competence->description;
                                $competition->save();
                            }
                            $process_detail_activity_competences = new ProcessDetailActivityCompetences;
                            $process_detail_activity_competences->process_d_a_id = $process_detail_activity->id;
                            $process_detail_activity_competences->rate = $competence->rate ? $competence->rate : 0;
                            $process_detail_activity_competences->rate_desc = $competence->rate_desc;
                            $process_detail_activity_competences->shortname = $competence->shortname;
                            $process_detail_activity_competences->proficiency = $competence->proficiency;
                            $process_detail_activity_competences->proficiency_desc = $competence->proficiency_desc;
                            $process_detail_activity_competences->save();
                            //activities
                            foreach ($competence->activities as $activity) {
                                $activity_competence = ActivityLms::where('name', $competence->shortname)->get()->first();
                                if (!$activity_competence) {
                                    $activity_competence = new ActivityLms;
                                    $activity_competence->name = $activity->description;
                                    $activity_competence->course_id = $courses->$key->courseid;
                                    $activity_competence->save();
                                }
                                //competition_activity
                                $competition_activity = new CompetitionActivity;
                                $competition_activity->activity_id = $activity_competence->id;
                                $competition_activity->competition_id = $competition->id;
                                $competition_activity->process_d_a_c_id = $process_detail_activity_competences->id;
                                $competition_activity->save();
                            }
                        }
                    }
                }
            }
            $process = Process::with('process_type', 'user')
                ->orderBy('id', 'desc')->get()->toArray();

        } catch (\Throwable $th) {
            throw $th;
        }
        return response()->json($process);
    }
}
