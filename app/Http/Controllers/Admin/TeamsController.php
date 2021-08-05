<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Session;
use App\Models\Group;
use App\Models\UserRoleGroup;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jumbojett\OpenIDConnectClient;
use GuzzleHttp\Client;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use Carbon\Carbon;
use Notifications;

class TeamsController extends Controller
{
    public $accessToken;
    public $clientId;
    public $tenantId; // id inquilino
    public $clientSecret;
    public $redirectUri;
    public $urlAuthorize;
    public $urlAccessToken;
    public $urlResource;
    public $grantType;
    public $scope;
    public $organizerId;
    public $addScope;
    public $organizer;

    public function __construct()
    {
        //Datos de julianO@etraining.co
        $this->clientId = (env('TEAMS_CLIENT_ID')=="")? "7e7ea510-a848-49ea-a397-6b90d01767a4" : env('TEAMS_CLIENT_ID');
        $this->clientSecret = (env('TEAMS_CLIENT_SECRET_KEY')=="") ? "O-rk13Gf8Pu0n804E2q-_wB1SHDt.b8WZu" : env('TEAMS_CLIENT_SECRET_KEY');
        $this->tenantId = (env('TEAMS_TENANT_ID')=="") ? "3646e2ff-d462-4f2a-a41b-a6e9757af04b" : env('TEAMS_TENANT_ID');
        $this->redirectUri = 'http://localhost:8000/api/crearRoomTeams';
        $this->urlAuthorize = 'https://login.microsoftonline.com/'.$this->tenantId.'/oauth2/v2.0/authorize';
        $this->urlAccessToken = 'https://login.microsoftonline.com/'.$this->tenantId.'/oauth2/v2.0/token';
        $this->urlResource = 'https://graph.microsoft.com/v1.0/groups/';
        $this->grantType = 'client_credentials';
        $this->scope = 'https://graph.microsoft.com/.default';
        $this->addScope = 'OnlineMeetings.ReadWrite.All';
        $this->organizerId = 'be50135b-fa88-478f-b0eb-8a3e16231f8d'; //id usuario juan cuervo

        /*
        $this->clientId = '3b742e2f-beb1-4c18-9d39-f46215b39d3e';
        $this->clientSecret = '99:.GAO34zqe]g/fpBCyUKH-D5=Ukn0F';
        $this->tenantId = 'ee35e62c-bbb5-4dfa-b4db-85d76d879b6e';
        $this->redirectUri = 'http://localhost:8000/api/crearSalaTeams';
        $this->urlAuthorize = 'https://login.microsoftonline.com/'.$this->tenantId.'/oauth2/v2.0/authorize';
        $this->urlAccessToken = 'https://login.microsoftonline.com/'.$this->tenantId.'/oauth2/v2.0/token';
        $this->urlResource = 'https://graph.microsoft.com/v1.0/groups/';
        $this->grantType = 'client_credentials';
        $this->scope = 'https://graph.microsoft.com/.default';
        $this->addScope = 'OnlineMeetings.ReadWrite.All';
        $this->organizerId = 'd87b72d5-3a1a-480d-abe9-885adbe2c74d';
        */

    }

    /*
    * getToken
    */
    public function getToken(){
        $url = $this->urlAccessToken;

        $guzzle = new Client();

        $token = json_decode($guzzle->post($url, [
          'form_params' => [
            'client_id' => $this->clientId, ///$clientId,
            'client_secret' => $this->clientSecret,  // $clientSecret,
            'redirectUri' => $this->redirectUri,
            'urlAuthorize' => $this->urlAuthorize,
            'urlAccessToken' => $this->urlAccessToken,
            'urlResourceOwnerDetails' => $this->urlResource,
            'grant_type' => $this->grantType,
            'scope' => $this->scope, $this->addScope
           ],
        ])->getBody()->getContents());

        $this->accessToken = $token->access_token;
    }

    /**
     * createRoomTeams
     * Esta funcion no se usa, solo es usada como referencia del desarrollador inicial
     */
    public function createRoomTeams(Request $request)
    {
        //------VALIDATION
        $error = false;
        $msg = '';
        if($request->subject == ''){
          $error = true;
          $msg .= 'Empty Subject. \n';
        }
        //dateStart
        if(!$this->checkDate($request->dateStart))
        {
          $error = true;
          $msg .= 'Empty dateStart or wrong format. must be YYYY-MM-DD HH:II:SS \n';
        }
        //dateEnd
        if(!$this->checkDate($request->dateEnd))
        {
          $error = true;
          $msg .= 'Empty dateEnd or wrong format. must be YYYY-MM-DD HH:II:SS \n';
        }
        //organizerEmail
        if (!filter_var($request->organizerEmail, FILTER_VALIDATE_EMAIL)) {
          $error = true;
          $msg .= 'Empty organizerEmail or wrong format. \n';
        }
        $this->organizer = $this->getUserMicrosoft($request->organizerEmail);
        if($this->organizer == ''){
          $error = true;
          $msg .= 'The organizerEmail was not found in the organization. \n';
        }
        //assistantsEmail
        if($request->assistantsEmail != '' && is_array($request->assistantsEmail)){
          $attendees = '';
          $temp = array();
          foreach($request->assistantsEmail as $mail){
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
              $error = true;
              $msg .= 'Empty assistantsEmail ('.$mail.') or wrong format. \n';
              break;
            }
            $temp[] = json_encode(array('upn' => $mail), JSON_FORCE_OBJECT);
          }
          $attendees = implode(",", $temp);

          $attendees_serialize = ', "attendees": [
              '.$attendees.'
            ]';
        }

        if($error){
          $arr_temp = array();
          $arr_temp['status'] = 'error';
          $arr_temp['msg'] = $msg;
          echo json_encode( $arr_temp, JSON_FORCE_OBJECT);
          die();
        }

        //date
        $dateStart = $request->dateStart; //YYYY-MM-DD HH:II:SS //H24
        $dateEnd = $request->dateEnd; //YYYY-MM-DD HH:II:SS //H24

        $utcDateStart = str_replace(" ","T", $dateStart.'-05:00');
				$utcDateEnd = str_replace(" ","T", $dateEnd.'-05:00');

        $attendees_serialize = '';
        if($request->assistantsEmail != '' && is_array($request->assistantsEmail)){
          $attendees = '';
          $temp = array();
          foreach($request->assistantsEmail as $mail){
            $temp[] = json_encode(array('upn' => $mail), JSON_FORCE_OBJECT);
          }
          $attendees = implode(",", $temp);

          $attendees_serialize = ', "attendees": [
              '.$attendees.'
            ]';
        }


        $data = '
        {
            "isBroadcast": "false",
            "startDateTime":"'.$utcDateStart.'",
            "endDateTime":"'.$utcDateEnd.'",
            "subject":"'.$request->subject.'",
            "onlineMeetingUrl":"",
            "outerMeetingAutoAdmittedUsers":"EveryoneInCompany",
            "participants": {
                "organizer": {
                  "identity": {
                    "user": {
                      "id": "'.$this->organizer->id.'"
                    }
                  }
                } '.$attendees_serialize.'
              }
        }
        ';


        $guzzle = new Client();

        $options['body'] = $data;
        $options['headers']['Content-Type'] = 'application/json;charset=UTF-8';
        $options['headers']['access_token'] = $this->accessToken;
        $options['headers']['Authorization'] = 'Bearer '.$this->accessToken;

        $response = $guzzle->post('https://graph.microsoft.com/beta/communications/onlineMeetings', $options);

        $response_serialize = $response->getBody()->getContents();

        echo $this->cleanResponseRoom(json_decode($response_serialize));

    }

    /* CREA UNA ROOM A PARTIR DE UNA SESSION */
    public function updateRoomSession(int $id)
    {
      $session = Session::find($id);

      $subject_aux= Group::select('group.id','group.name','coursebase.name AS curso')
      ->join('course','course.id','group.course_id')
      ->join('coursebase','coursebase.id','course.coursebase_id')
      ->where('group.id',$session->group_id)->get()->first();

      $dia = Carbon::parse($session->session_date)->toDateString();
      $hi = Carbon::parse($session->start_time)->format('h:i:s');
      $hf = Carbon::parse($session->closing_time)->format('h:i:s');
      $subject= "[".$session->id."] ".$subject_aux->curso." - ".$subject_aux->name." - ".$session->name;
      $utcDateStart = $dia."T".$hi."-05:00";
      $utcDateEnd = $dia."T".$hf."-05:00";

      $organizer_mail=Session::select('users.email')
      ->join('users','session.organizer_id','users.id')
      ->Where('session.id',$id)
      ->first();
      $error_mail=false;
      $msg="";
      if (!filter_var(@$organizer_mail["email"], FILTER_VALIDATE_EMAIL)) {
        if (!filter_var(Auth::user()->email, FILTER_VALIDATE_EMAIL)) {
          $error_mail = true;
          $msg .= 'Correo del organizador vacio o mal escrito.';
        }else{
          $teams_email=Auth::user()->email;
        }
      }else{
        $teams_email=$organizer_mail["email"];
      }

      $this->organizer = $this->getUserMicrosoft($teams_email);
      if ($this->organizer == '') {
        $this->organizer = $this->getUserMicrosoft(env('TEAMS_DEFAULT_EMAIL'));
      }

      if($this->organizer=='' || $error_mail){
          $msg .= ($this->organizer=='') ? "El Email {$teams_email} no fue encontrado en la organización.":'';
          return response()->json([
          'status' => false,
          'message' => $msg
        ]);
      }else{
        $cr_invited= UserRoleGroup::select('users.email','users.firstname','users.middlefirstname','users.lastname','users.middlelastname')
        ->join('user_role','user_role.id','user_role_group.user_role_id')
        ->join('users','users.id','user_role.user_id')
        ->where('user_role_group.group_id',$session->group_id)->get()->toArray();

        $temp = array();
        foreach($cr_invited as $mail){
          if (filter_var($mail["email"], FILTER_VALIDATE_EMAIL)) {
            $temp[] = json_encode(array('upn' => $mail["email"]), JSON_FORCE_OBJECT);
          }
        }

        $attendees_serialize = '';
        if(count($temp)>0){
          $attendees = implode(",", $temp);
            $attendees_serialize = ', "attendees": [
              '.$attendees.'
            ]';
        }

        $data = '
        {
            "isBroadcast": "false",
            "startDateTime":"'.$utcDateStart.'",
            "endDateTime":"'.$utcDateEnd.'",
            "subject":"'.$subject.'",
            "onlineMeetingUrl":"",
            "outerMeetingAutoAdmittedUsers":"EveryoneInCompany",
            "participants": {
                "organizer": {
                  "identity": {
                    "user": {
                      "id": "'.$this->organizer->id.'"
                    }
                  }
                } '.$attendees_serialize.'
              }
        }
        ';

        $guzzle = new Client();

        $options['body'] = $data;
        $options['headers']['Content-Type'] = 'application/json;charset=UTF-8';
        $options['headers']['access_token'] = $this->accessToken;
        $options['headers']['Authorization'] = 'Bearer '.$this->accessToken;

        $response = $guzzle->post('https://graph.microsoft.com/beta/communications/onlineMeetings', $options);

        $response_serialize = json_decode($response->getBody()->getContents());

        $session->teams_key = $response_serialize->id;
        $session->teams_url = $response_serialize->joinUrl;
        $session->organizer_id = $this->organizer->id;
        $session->tenant_id = $this->tenantId;
        $session->save();

        // Notificación:
        try {
          $cr_size = sizeof($cr_invited);
          for($i=0;$i<$cr_size;$i++){
          Notifications::sendNotification(
              $cr_invited[$i]['email'],
              'mails.createSession',
              'Se ha generado una nueva sesión en teams',
              [
                  'fecha'=> $dia,
                  'hora'=>$hi,
                  'name'=> $cr_invited[$i]['firstname'].' '.$cr_invited[$i]['middlefirstname'].' '.$cr_invited[$i]['lastname'].' '.$cr_invited[$i]['middlelastname'],
                  'url' => $session->teams_url
              ]
          );
        }
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
          'status' => true,
          'message' => 'Session actualizada exitosamente',
          'data' => ['session' => $session]
        ]);
      }
    }

    /**
     * obtiene la información de un usuario microsoft principalmente para el id
     */
    public function getUserMicrosoft($email){

        if($this->accessToken == ''){
            $this->getToken();
        }

        $filter = '?$filter=mail%20eq%20\''.$email.'\'';
        //$filter = 'c69d03ee-450a-4fb8-9374-95156926a1e3';

        $guzzle = new Client();

        $data = '
        {
          "@odata.id":"https://graph.microsoft.com/beta/users'.$filter.'"
        }
        ';

        $options['body'] = $data;
        $options['headers']['Content-Type'] = 'application/json;charset=UTF-8';
        $options['headers']['access_token'] = $this->accessToken;
        $options['headers']['Authorization'] = 'Bearer '.$this->accessToken;

        $response = $guzzle->get('https://graph.microsoft.com/beta/users'.$filter, $options);

        $raw_response = $response->getBody()->getContents();
        $serialize_response = json_decode($raw_response);
        if(empty($serialize_response->value)){
          return null;
        }
        $user = $serialize_response->value[0];

        return $user;
    }


    public function checkDate($x) {
        if (date('Y-m-d H:i:s', strtotime($x)) == $x) {
          return true;
        } else {
          return false;
        }
    }

    /*
    funcion para responder lo que se necesita unicamente
    */
    public function cleanResponseRoom($response_serialize){
      //devolver unicamente lo que necesitamos del objeto
      $arr_temp = array();
      $arr_temp['status'] = 'ok';
      $arr_temp['teams_key'] = $response_serialize->id;
      $arr_temp['room_url'] = $response_serialize->joinUrl;
      $arr_temp['organizer_key'] = $this->organizer->id;
      $arr_temp['tenant_key'] = $this->tenantId;

      return json_encode( $arr_temp, JSON_FORCE_OBJECT);
    }

    //
    public function test()
    {

        $this->getToken();

        //$this->getUserIdMicrosoft('Estidiante1@etraining.co');
        //EXIT();
        //dd($this->accessToken);
        /*
        $graph = new Graph();
        $graph->setBaseUrl("https://graph.microsoft.com/")
               ->setApiVersion("v1.0")
               ->setAccessToken($this->accessToken);
        dd($graph);
        */

        //dd($this->accessToken);
        $subject = 'Sala JulianO prueba';
        $dateStart = '2020-11-07T21:25:00-05:00';
        $dateEnd = '2020-11-07T22:25:00-05:00';
        //$userId = 'c69d03ee-450a-4fb8-9374-95156926a1e3'; //julian o
        //$userId = 'be50135b-fa88-478f-b0eb-8a3e16231f8d'; //juan cuervo
        //$userId = 'd87b72d5-3a1a-480d-abe9-885adbe2c74d'; //prueba funcional
        //$userId = 'dd5ee6ef-f180-4525-87d3-93ba4e05fdf4'; //docente prueba iti

        $data = '
        {
            "isBroadcast": "false",
            "startDateTime":"'.$dateStart.'",
            "endDateTime":"'.$dateEnd.'",
            "subject":"'.$subject.'",
            "onlineMeetingUrl":"",
            "outerMeetingAutoAdmittedUsers":"Everyone",
            "participants": {
                "organizer": {
                  "identity": {
                    "user": {
                      "id": "'.$userId.'"
                    }
                  }
                }
              }
        }
        ';

        $guzzle = new Client();

        $options['body'] = $data;
        $options['headers']['Content-Type'] = 'application/json;charset=UTF-8';
        $options['headers']['access_token'] = $this->accessToken;
        $options['headers']['Authorization'] = 'Bearer '.$this->accessToken;

        $response = $guzzle->post('https://graph.microsoft.com/beta/communications/onlineMeetings', $options);
        //https://graph.microsoft.com/beta/communications/onlineMeetings
        //https://graph.microsoft.com/v1.0/me/onlineMeetings

		dd($response->getBody()->getContents());

    }
}
