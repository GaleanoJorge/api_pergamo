<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta name="generator" content="Aspose.Words for .NET 17.1.0.0" />
    <title></title>

    <STYLE>
        .tablehc {
            margin-top: 5px;
            border-collapse: collapse;
            width: 100%;
        }

        .tablehc td,
        th {
            border: 1px solid #ccc;
            text-align: left;
            padding: 1px;
        }

        .tablehc tr:nth-child(even) {
            background-color: #dddddd;
        }
    </STYLE>
</head>

<body>
    <div>
        <div style="-aw-headerfooter-type:header-primary">
            <p style="margin-top:0pt; margin-bottom:0pt; line-height:6%; widows:0; orphans:0; font-size:10pt">
                <span style="height:0pt; display:block; position:absolute; z-index:-65546">
                    <img src="https://storage.googleapis.com/detecta/ajz5a-4q5bb.006.png" width="142" height="59" alt="" style="margin-top:-15.15pt; margin-left:-21pt; -aw-left-pos:15pt; -aw-rel-hpos:page; -aw-rel-vpos:page; -aw-top-pos:20.25pt; -aw-wrap-type:none; position:absolute" /></span>
                <span style="height:0pt; display:block; position:absolute; z-index:-65543">
                    <div style="float:right;">
                        <p>No de Historia Clínica: {{$chrecord[0]['admissions']['patients']['identification']}}</p>
                        <p>Fecha de registro: {{$chrecord[0]['date_attention']}}</p>
                        <p> Folio: {{$chrecord[0]['id']}}</p>
                    </div>
                </span><span style="height:0pt; display:block; position:absolute; z-index:-65545">
                    <div style="text-align: center;    margin-left: 60px;">
                        <p>HEATLTH & LIFE IPS S.A.S </p>
                        <p> Avenida Cra 68 No 13-61, Bogotá. Sede Montevideo </p>
                        <p> Nit: 900900122 - 7</p>
                    </div>

                </span><span style="font-family:Tahoma">&#xa0;</span>
            </p>
        </div>

        <h2 style="margin-top:70px; margin-bottom:1.9pt; widows:0; orphans:0; font-size:9pt;    background: #4472c4;
                padding: 0.8em;font-family:Calibri;color: white;text-align: center;">EVOLUCIÓN HISTORIA CLINICA
        </h2>
        <hr />
        <h2 style=" text-align: center; margin-top:7.25pt; margin-bottom:1.9pt; widows:0; orphans:0; font-size:9pt"><span style="font-family:Calibri; color:#057591; background-color:#ffffff"> DATOS PERSONALES</span></h2>
        <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
            <tr style="height:11.95pt">
                <td style="width:79.75pt; vertical-align:top">
                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:8pt"><b> Nombre Paciente: </b></span>
                    </p>
                </td>
                <td style="width:203pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['firstname']}} {{$chrecord[0]['admissions']['patients']['middlefirstname']}} {{$chrecord[0]['admissions']['patients']['lastname']}} </span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri"> <b> Identificación: </b> </span>
                    </p>
                </td>
                <td style="width:141.6pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['identification']}}</span>
                        <span style="width:40pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:80.35pt">&#xa0;</span>
                        <span style="font-family:Calibri; font-weight:bold">Sexo:</span>
                        <span style="font-family:Calibri; font-weight:bold; letter-spacing:-0.55pt"> </span>
                        <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['gender']['name']}}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:12.7pt">
                <td style="width:79.75pt; vertical-align:top">
                    <p style="margin-top:2.3pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:8pt"> <b> Fecha Nacimiento: </b> </span>
                    </p>
                </td>
                <td style="width:203pt; vertical-align:top">
                    <p style="margin-top:0.3pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['birthday']}}</span>
                        <span style="font-family:Calibri; letter-spacing:4.45pt"> </span>
                        <span style="font-family:Calibri"> <b> Edad Actual: </b> </span>
                        <span style="font-family:Calibri; letter-spacing:-0.35pt"> </span>
                        <span style="font-family:Calibri; vertical-align:1pt">{{$chrecord[0]['admissions']['patients']['age']}}</span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:45.4pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri"> <b> Estado Civil: </b> </span>
                    </p>
                </td>
                @if($chrecord[0]['admissions']['patients']['marital_status'])
                <td style="width:141.6pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:2.45pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['marital_status']['name']}}</span>
                    </p>
                </td>
                @endisset

            </tr>
            <tr style="height:12.7pt">
                <td style="width:79.75pt; vertical-align:top">
                    <p style="margin-top:2.3pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:8pt"> <b> Dirección: </b> </span>
                    </p>
                </td>
                <td style="width:203pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['residence_address']}}</span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri"> <b> Teléfono: </b> </span>
                    </p>
                </td>
                <td style="width:141.6pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['phone']}}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:12.7pt">
                <td style="width:79.75pt; vertical-align:top">
                    <p style="margin-top:2.3pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:8pt"> <b> Municipio: </b> </span>
                    </p>
                </td>
                <td style="width:203pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['residence_municipality']['name']}}</span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri"> <b> Ocupación: </b> </span>
                    </p>
                </td>
                <td style="width:141.6pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['activities']['name']}}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:11.95pt">
                <td style="width:79.75pt; vertical-align:top">
                    <p style="margin-top:2.3pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:8pt"> <b> Pertenencia etnica: </b> </span>
                    </p>
                </td>
                <td style="width:203pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['ethnicity']['name']}}</span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:47.05pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri"> <b> Nivel Educativo: </b> </span>
                    </p>
                </td>
                <td style="width:141.6pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['academic_level']['name']}}</span>
                    </p>
                </td>
            </tr>
        </table>

        <hr />

        <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt"><span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">DATOS DEL
                INGRESO</span><span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>



        <p style="margin:4.1pt 15.15pt 0pt 9.45pt; text-indent:-1.45pt; line-height:162%; widows:0; orphans:0; font-size:8pt">
            <span style="font-family:Calibri"> <b> Nº Ingreso: </b> </span><span style="font-family:Calibri; letter-spacing:4.4pt">
            </span><span style="font-family:Calibri; font-weight:bold">{{$chrecord[0]['admissions']['consecutive']}}</span>
            <span style="font-family:Calibri; font-weight:bold; letter-spacing:-1pt"> </span>
            <span style="font-family:Calibri"> <b> Fecha: </b> </span><span style="font-family:Calibri; letter-spacing:-0.9pt">
            </span><span style="font-family:Calibri">{{$chrecord[0]['admissions']['entry_date']}}</span>
            <span style="width:38.13pt; text-indent:0pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:216.55pt">&#xa0;</span>
            <span style="width:40.5pt; text-indent:0pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            <span style="font-family:Calibri"> <b> Datos </b> </span><span style="font-family:Calibri; letter-spacing:-0.1pt">
            </span><span style="font-family:Calibri"> <b> de </b> </span><span style="font-family:Calibri; letter-spacing:-0.05pt">
            </span><span style="font-family:Calibri"> <b> Afiliación: </b> </span><span style="font-family:Calibri; letter-spacing:0.9pt"> </span>
            <span style="font-family:Calibri"> <b> Entidad: </b> </span>
            <span style="font-family:Calibri; letter-spacing:1pt">
            </span><span style="font-family:Calibri">{{$chrecord[0]['admissions']['contract']['company']['name']}}</span><span style="font-family:Calibri; letter-spacing:-0.05pt"> </span><span style="font-family:Calibri; letter-spacing:-0.05pt">
                <span style="font-family:Calibri; letter-spacing:-3pt"> </span><span style="font-family:Calibri"> <b> Tipo de régimen: </b> </span><span style="font-family:Calibri"></span><span style="font-family:Calibri">{{$chrecord[0]['admissions']['contract']['type_briefcase']['name']}}</span><span style="font-family:Calibri">
        </p>

        <!-- Medicina General-->
        <div>
            @if($chrecord[0]['ch_type_id'] == 1 )

            <!-- INGRESO -->
            <div>
                <hr />
                <!-- Validación Ingreso -->
                <div>
                    @if(count($ChReasonConsultation) > 0 || count($ChSystemExam) > 0 || count($ChPhysicalExam) > 0 || count($ChVitalSigns) > 0
                    || count($ChDiagnosis) > 0 || count($ChOstomies) > 0 || count($ChAp) > 0 || count($ChRecommendations) > 0 || count($ChDiets) > 0 )

                    <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                        INGRESO<br>
                    </p>
                    @endisset
                </div>

                <!-- Valoración -->
                <div>
                    @if(count($ChReasonConsultation) > 0)
                 
                  
                    <hr />

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> VALORACIÓN </b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChReasonConsultation as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['reason_consultation'])) MOTIVO DE CONSULTA: </b> {{$ChReasonConsultation[0]['reason_consultation']}} @endisset</span>
                    </p>
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['current_illness'])) ENFERMEDAD ACTUAL: </b> {{$ChReasonConsultation[0]['current_illness']}} @endisset</span>
                    </p>
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['ch_external_cause'])) CAUSA EXTERNA: </b> {{$ChReasonConsultation[0]['ch_external_cause']['name']}} @endisset</span>
                    </p>                    
                    @endforeach

                    @endisset

                </div>

                <!-- Rx Sistema -->
                <div>
                 
                    @if(count($ChSystemExam) > 0)

                    <hr />

                        <p style="text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> REVISIÓN POR SISTEMA </b> </span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>
                    
                   
                    <table class="tablehc">

                            <tr>
                                <th>FECHA</th>
                                <th>TIPO</th>
                                <th>REVISIÓN</th>
                                <th>OBSERVACIÓN</th>

                            </tr>
                            @foreach($ChSystemExam as $ch)
                            <tr>   

                                @if(isset($ch['created_at']))
                                <td>
                                    {{substr($ch['created_at'],0,10) }}
                                </td>
                                @endisset

                                @if(isset($ch['type_ch_system_exam']))
                                <td>
                                    {{$ch['type_ch_system_exam']['name']}}
                                </td>
                                @endisset

                                @if(isset($ch['revision']))
                                <td>
                                {{$ch['revision']}}
                                </td>
                                @endisset

                                @if(isset($ch['observation']))
                                <td>
                                    {{$ch['observation']}}
                                </td>
                                @endisset
                            
                            </tr>
                            @endforeach

                        </table>
                    @endisset

                </div>

                <!-- Rx Físico -->
                <div>

                    @if(count($ChPhysicalExam) > 0)

                    <hr />

                        <p style="text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> REVISIÓN FÍSICO </b> </span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>

                            
                            <table class="tablehc">

                                <tr>

                                    <th>FECHA</th>

                                    <th>TIPO</th>

                                    <th>REVISIÓN</th>

                                    <th>OBSERVACIÓN</th>

                                </tr>
                                @foreach($ChPhysicalExam as $ch)
                                <tr>
                                
                                    @if(isset($ch['created_at']))
                                    <td>

                                        {{substr($ch['created_at'],0,10) }}

                                    </td>
                                    @endisset

                                    @if(isset($ch['type_ch_physical_exam']))
                                    <td>

                                        {{$ch['type_ch_physical_exam']['name']}}

                                    </td>
                                    @endisset

                                    @if(isset($ch['revision']))
                                    <td>

                                    {{$ch['revision']}}

                                    </td>
                                    @endisset

                                    @if(isset($ch['description']))
                                    <td>

                                        {{$ch['description']}}

                                    </td>
                                    @endisset
                                
                                </tr>
                                @endforeach

                            </table>
                    @endisset

                </div>

                <!-- Rx Signos Vitales-->
                <div>
                            @if(count($ChVitalSigns) > 0)
                            @foreach($ChVitalSigns as $ch)

                            <hr />

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> SIGNOS VITALES </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                          
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['created_at']))FECHA REGISTRO: </b>{{substr($ch['created_at'],0,10) }} @endisset</span>
                            </p>

                          
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b> @if(isset($ch['clock'])) HORA REGISTRO: </b>{{$ch['clock']}} @endisset</span>
                            </p>
                         
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b> @if(isset($ch['cardiac_frequency'])) FRECUENCIA CARDIACA: </b>{{$ch['cardiac_frequency']}} @endisset
                                    <b> @if(isset($ch['respiratory_frequency'])) FRECUENCIA RESPIRATORIA: </b>{{$ch['respiratory_frequency']}} @endisset</span>
                            </p>
                         
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['temperature'])) TEMPERATURA: </b>{{$ch['temperature']}} @endisset
                                    <b>@if(isset($ch['ch_vital_temperature'])) VIA DE TOMA: </b>{{$ch['ch_vital_temperature']['name']}} @endisset</span>
                            </p>
                           
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['oxigen_saturation'])) SATURACIÓN DE OXIGENO: </b>{{$ch['oxigen_saturation']}} @endisset</span>
                            </p>
                        
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['size'])) TALLA: </b>{{$ch['size']}} @endisset
                                    <b>@if(isset($ch['weight'])) PESO: </b>{{$ch['weight']}} @endisset
                                    <b>@if(isset($ch['body_mass_index'])) I.M.C: </b>{{$ch['body_mass_index']}} @endisset</span>
                            </p>
                           
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['pressure_systolic'])) TENSIÓN ARTERIAL SISTÓLICA: </b>{{$ch['pressure_systolic']}} @endisset
                                    <b>@if(isset($ch['pressure_diastolic'])) TENSIÓN ARTERIAL DIASTÓLICA: </b>{{$ch['pressure_diastolic']}} @endisset
                                    <b>@if(isset($ch['pressure_half'])) MEDIA: </b>{{$ch['pressure_half']}} @endisset</span>
                            </p>
                       
                            @if (isset($ch['ch_vital_neurological']) || isset($ch['ch_vital_hydration']) || 
                            isset($ch['pupil_size_left']) || isset($ch['pupil_size_right']) || isset($ch['left_reaction']) || isset($ch['right_reaction']) ||
                            isset($ch['mydriatic']) || isset($ch['normal']) || isset($ch['lazy_reaction_light']) || isset($ch['fixed_lazy_reaction']) || isset($ch['miotic_size']) ||
                            isset($ch['pulse']) || isset($ch['venous_pressure']) || isset($ch['intracranial_pressure']) || isset($ch['cerebral_perfusion_pressure']) ||
                            isset($ch['intra_abdominal']) || isset($ch['pulmonary_systolic']) || isset($ch['pulmonary_diastolic']) || isset($ch['pulmonary_half']) ||
                            isset($ch['head_circunference']) || isset($ch['abdominal_perimeter']) || isset($ch['chest_perimeter']) )

                            <hr />
                        
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['ch_vital_neurological'])) ESTADO NEUROLÓGICO: </b>{{$ch['ch_vital_neurological']['name']}} @endisset</span>
                            </p>
                        
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['ch_vital_hydration'])) ESTADO DE HIDRATACIÓN: </b>{{$ch['ch_vital_hydration']['name']}} @endisset</span>
                            </p>

                            @if(isset($ch['pupil_size_left']) || isset($ch['pupil_size_right']) || isset($ch['left_reaction']) || isset($ch['right_reaction']) ||
                            isset($ch['mydriatic']) || isset($ch['normal']) || isset($ch['lazy_reaction_light']) || isset($ch['fixed_lazy_reaction']) || isset($ch['miotic_size']) )
        
                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b> PUPILAS </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['pupil_size_left'])) T.PUPILAR IZQUIERDO: </b>{{$ch['pupil_size_left']}} @endisset
                                    <b>@if(isset($ch['pupil_size_right'])) T.PUPILAR DERECHO: </b>{{$ch['pupil_size_right']}} @endisset
                                    <b>@if(isset($ch['left_reaction'])) R.LUZ IZQUIERDO: </b>{{$ch['left_reaction']}} @endisset
                                    <b>@if(isset($ch['right_reaction'])) R.LUZ IZQUIERDO: </b>{{$ch['right_reaction']}} @endisset</span>
                            </p>
                         
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['mydriatic'])) </b> {{$ch['mydriatic']}} @endisset
                                    <b>@if(isset($ch['normal'])) </b> {{$ch['normal']}} @endisset
                                    <b>@if(isset($ch['lazy_reaction_light'])) </b> {{$ch['lazy_reaction_light']}} @endisset
                                    <b>@if(isset($ch['fixed_lazy_reaction'])) </b> {{$ch['fixed_lazy_reaction']}} @endisset
                                    <b>@if(isset($ch['miotic_size'])) </b> {{$ch['miotic_size']}} @endisset</span>
                            </p>
                            @endisset

                            @if(isset($ch['pulse']) || isset($ch['venous_pressure']) || isset($ch['intracranial_pressure']) || isset($ch['cerebral_perfusion_pressure']) ||
                            isset($ch['intra_abdominal']))
        
                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b> OTROS </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['pulse'])) PULSO: </b>{{$ch['pulse']}} @endisset
                                    <b>@if(isset($ch['venous_pressure'])) PVC: </b>{{$ch['venous_pressure']}} @endisset
                                    <b>@if(isset($ch['intracranial_pressure'])) PRESIÓN INTRACANEANA: </b>{{$ch['intracranial_pressure']}} @endisset
                                    <b>@if(isset($ch['cerebral_perfusion_pressure'])) PPC: </b>{{$ch['cerebral_perfusion_pressure']}} @endisset
                                    <b>@if(isset($ch['intra_abdominal'])) PRESIÓN INTRAABDOMINAL: </b>{{$ch['intra_abdominal']}} @endisset </span>
                                </span>
                            </p>
                            @endisset

                            @if(isset($ch['pulmonary_systolic']) || isset($ch['pulmonary_diastolic']) || isset($ch['pulmonary_half']))

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b> PRESIÓN ART PULMONAR </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['pulmonary_systolic'])) SISTÓLICA: </b>{{$ch['pulmonary_systolic']}} @endisset
                                    <b>@if(isset($ch['pulmonary_diastolic'])) DIASTÓLICA: </b>{{$ch['pulmonary_diastolic']}} @endisset
                                    <b>@if(isset($ch['pulmonary_half'])) MEDIA: </b>{{$ch['pulmonary_half']}} @endisset</span>
                            </p>
                            @endisset

                            @if(isset($ch['head_circunference']) || isset($ch['abdominal_perimeter']) || isset($ch['chest_perimeter']))

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b> PEDIATRÍA - PERÍMETRO </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['head_circunference'])) CEFÁLICO: </b>{{$ch['head_circunference']}} @endisset
                                    <b>@if(isset($ch['abdominal_perimeter'])) ABDOMINAL: </b>{{$ch['abdominal_perimeter']}} @endisset
                                    <b>@if(isset($ch['chest_perimeter'])) TORÁCICO: </b>{{$ch['chest_perimeter']}} @endisset</span>
                            </p>
                            @endisset

                            @endisset

                  
                            @if(($ch['has_oxigen']) == 1 )

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b>TIENE OXIGENO</b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>                          
                    

                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['ch_vital_ventilated'])) MODO VENTILATORIO: </b>{{$ch['ch_vital_ventilated'] ['name']}} @endisset
                                    <b>@if(isset($ch['oxygen_type'])) TIPO DE OXÍGENO: </b>{{$ch['oxygen_type'] ['name']}} @endisset</span>
                            </p>

                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['liters_per_minute'])) LITROS POR MINUTO: </b>{{$ch['liters_per_minute'] ['name']}} @endisset
                                    <b>@if(isset($ch['parameters_signs'])) PARAMETROS: </b>{{$ch['parameters_signs'] ['name']}} @endisset</span>

                            </p>
                            @endisset


                            @endforeach
                            @endisset

                </div>

                <!-- Diagnóstico -->
                <div>
                            @if(count($ChDiagnosis) > 0)
                           

                            <hr />

                            <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DIAGNÓSTICO </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            @foreach($ChDiagnosis as $ch)
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset
                                    <b>@if(isset($ch['diagnosis'])) DIAGNÓSTICO: </b>{{$ch['diagnosis']['name']}} @endisset
                                    <b>@if(isset($ch['ch_diagnosis_class'])) CLASE: </b> {{$ch['ch_diagnosis_class'] ['name']}} @endisset
                                    <b>@if(isset($ch['ch_diagnosis_type'])) TIPO: </b> {{$ch['ch_diagnosis_type'] ['name']}} @endisset
                                    <b>@if(isset($ch['diagnosis_observation'])) OBSERVACIÓN: </b> {{$ch['diagnosis_observation']}} @endisset</span>
                            </p>
                            @endforeach

                            @endisset

                </div>

                <!-- Ostomias -->
                <div>
                            @if(count($ChOstomies) > 0)
                           

                            <hr />

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> OSTOMIAS </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            @foreach($ChOstomies as $ch)
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset
                                    <b>@if(isset($ch['ostomy'])) OSTOMIA: </b> {{$ch['ostomy']['name']}} @endisset
                                    <b>@if(isset($ch['observation'])) OBSERVACIÓN : </b> {{$ch['observation']}} @endisset</span>
                            </p>
                            @endforeach

                            @endisset
                </div>

                <!-- AP -->
                <div>
                            @if(count($ChAp) > 0)                            
                       

                            <hr />

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>ANÁLISIS - PLAN (diagnóstico, terapeutico, de seguimiento) </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            @foreach($ChAp as $ch)
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset
                                    <b>@if(isset($ch['analisys'])) ANÁISIS: </b> {{$ch['analisys']}} @endisset
                                    <b>@if(isset($ch['plan'])) PLAN : </b> {{$ch['plan']}} @endisset</span>
                            </p>
                            @endforeach

                            @endisset

                </div>

                <!-- Recomendaciones -->
                <div>
                            @if(count($ChRecommendations) > 0)
                  

                            <hr />

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> RECOMENDACIONES </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            @foreach($ChRecommendations as $ch)
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset
                                    <b>@if(isset($ch['recommendations_evo'])) RECOMENDACION: </b> {{$ch['recommendations_evo']['name']}} @endisset
                                    <b>@if(isset($ch['patient_family_education'])) DESCRIPCIÓN : </b> {{$ch['patient_family_education']}} @endisset
                                    <b>@if(isset($ch['observations'])) OBSERVACIÓN : </b> {{$ch['observations']}} @endisset</span>
                            </p>
                            @endforeach
                            
                            @endisset

                </div>

                <!-- Dietas -->
                <div>
                            @if(count($ChDiets) > 0)
                           
                            <hr />

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DIETA RECOMENDADA </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            @foreach($ChDiets as $ch)
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset
                                    <b>@if(isset($ch['diet_consistency'])) ORAL: </b> {{$ch['diet_consistency']['name']}} @endisset
                                    <b>@if(isset($ch['enterally_diet'])) ENTERAL : </b> {{$ch['enterally_diet']['name']}} @endisset
                                    <b>@if(isset($ch['observation'])) OBSERVACIONES: </b> {{$ch['observation']}} @endisset</span>
                            </p>
                            @endforeach

                            @endisset
                </div>
                    
            </div>

            <!-- ANTECEDENTES -->
            <div>
                @if(count($ChBackground) > 0)

                <hr />

                <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ANTECEDENTES</span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>

                @foreach($ChBackground as $ch)
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset
                        <b>@if(isset($ch['ch_type_background'])) TIPO: </b> {{$ch['ch_type_background']['name']}} @endisset
                        <b>@if(isset($ch['revision'])) REVISIÓN: </b> {{$ch['revision']}} @endisset
                        <b>@if(isset($ch['observation'])) OBSERVACIÓN: </b> {{$ch['observation']}} @endisset</span>
                </p>
                @endforeach

                @endisset
            </div>

            <!-- EVOLUCIÓN -->
            <div>

                <!-- Validación EVO -->
                    <div>
                        @if(count($ChEvoSoap) > 0 || count($ChPhysicalExamEvo) > 0 || count($ChVitalSignsEvo) > 0 || count($ChDiagnosisEvo) > 0
                        || count($ChOstomiesEvo) > 0 || count($ChApEvo) > 0 || count($ChRecommendationsEvo) > 0 || count($ChDietsEvo) > 0 )

                        <hr />

                        <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                            REGISTRO EVOLUCIÓN MÉDICA<br>
                        </p>
                        @endisset

                    </div>

                <!-- EvoSoap -->
                    <div>
                            @if(count($ChEvoSoap) > 0)

                            <hr />

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">SUBJETIVO - OBJETIVO</span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>
                            @foreach($ChEvoSoap as $ch)
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"> 
                                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset
                                    <b>@if(isset($ch['subjective'])) SUBJETIVO: </b> {{$ch['subjective']}} @endisset
                                    <b>@if(isset($ch['subjective'])) OBJETIVO: </b> {{$ch['objective']}} @endisset </span>
                            </p>
                            @endforeach
                            @endisset

                    </div>

                <!-- Rx Físico -->
                    <div>

                        @if(count($ChPhysicalExamEvo) > 0)

                        <hr />

                            <p style="text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> REVISIÓN FÍSICO </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                                
                                <table class="tablehc">

                                    <tr>

                                        <th>FECHA</th>
                                        <th>TIPO</th>
                                        <th>REVISIÓN</th>
                                        <th>OBSERVACIÓN</th>

                                    </tr>
                                    @foreach($ChPhysicalExamEvo as $ch)
                                    <tr>
                                    
                                        @if(isset($ch['created_at']))
                                        <td>
                                            {{substr($ch['created_at'],0,10) }}
                                        </td>
                                        @endisset

                                        @if(isset($ch['type_ch_physical_exam']))
                                        <td>
                                            {{$ch['type_ch_physical_exam']['name']}}
                                        </td>
                                        @endisset

                                        @if(isset($ch['revision']))
                                        <td>
                                            {{$ch['revision']}}
                                        </td>
                                        @endisset

                                        @if(isset($ch['description']))
                                        <td>
                                            {{$ch['description']}}
                                        </td>
                                        @endisset
                                    
                                    </tr>
                                    @endforeach

                                </table>
                        @endisset
                    </div>

                <!-- Rx Signos Vitales-->
                    <div>
                            @if(count($ChVitalSignsEvo) > 0)
                            @foreach($ChVitalSignsEvo as $ch)

                            <hr />

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> SIGNOS VITALES </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                        
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['created_at']))FECHA REGISTRO: </b>{{substr($ch['created_at'],0,10) }} @endisset</span>
                            </p>

                        
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b> @if(isset($ch['clock'])) HORA REGISTRO: </b>{{$ch['clock']}} @endisset</span>
                            </p>
                        
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b> @if(isset($ch['cardiac_frequency'])) FRECUENCIA CARDIACA: </b>{{$ch['cardiac_frequency']}} @endisset
                                    <b> @if(isset($ch['respiratory_frequency'])) FRECUENCIA RESPIRATORIA: </b>{{$ch['respiratory_frequency']}} @endisset</span>
                            </p>
                        
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['temperature'])) TEMPERATURA: </b>{{$ch['temperature']}} @endisset
                                    <b>@if(isset($ch['ch_vital_temperature'])) VIA DE TOMA: </b>{{$ch['ch_vital_temperature']['name']}} @endisset</span>
                            </p>
                        
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['oxigen_saturation'])) SATURACIÓN DE OXIGENO: </b>{{$ch['oxigen_saturation']}} @endisset</span>
                            </p>
                        
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['size'])) TALLA: </b>{{$ch['size']}} @endisset
                                    <b>@if(isset($ch['weight'])) PESO: </b>{{$ch['weight']}} @endisset
                                    <b>@if(isset($ch['body_mass_index'])) I.M.C: </b>{{$ch['body_mass_index']}} @endisset</span>
                            </p>
                        
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['pressure_systolic'])) TENSIÓN ARTERIAL SISTÓLICA: </b>{{$ch['pressure_systolic']}} @endisset
                                    <b>@if(isset($ch['pressure_diastolic'])) TENSIÓN ARTERIAL DIASTÓLICA: </b>{{$ch['pressure_diastolic']}} @endisset
                                    <b>@if(isset($ch['pressure_half'])) MEDIA: </b>{{$ch['pressure_half']}} @endisset</span>
                            </p>
                    
                            @if (isset($ch['ch_vital_neurological']) || isset($ch['ch_vital_hydration']) || 
                            isset($ch['pupil_size_left']) || isset($ch['pupil_size_right']) || isset($ch['left_reaction']) || isset($ch['right_reaction']) ||
                            isset($ch['mydriatic']) || isset($ch['normal']) || isset($ch['lazy_reaction_light']) || isset($ch['fixed_lazy_reaction']) || isset($ch['miotic_size']) ||
                            isset($ch['pulse']) || isset($ch['venous_pressure']) || isset($ch['intracranial_pressure']) || isset($ch['cerebral_perfusion_pressure']) ||
                            isset($ch['intra_abdominal']) || isset($ch['pulmonary_systolic']) || isset($ch['pulmonary_diastolic']) || isset($ch['pulmonary_half']) ||
                            isset($ch['head_circunference']) || isset($ch['abdominal_perimeter']) || isset($ch['chest_perimeter']) )

                            <hr />
                        
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['ch_vital_neurological'])) ESTADO NEUROLÓGICO: </b>{{$ch['ch_vital_neurological']['name']}} @endisset</span>
                            </p>
                        
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['ch_vital_hydration'])) ESTADO DE HIDRATACIÓN: </b>{{$ch['ch_vital_hydration']['name']}} @endisset</span>
                            </p>

                            @if(isset($ch['pupil_size_left']) || isset($ch['pupil_size_right']) || isset($ch['left_reaction']) || isset($ch['right_reaction']) ||
                            isset($ch['mydriatic']) || isset($ch['normal']) || isset($ch['lazy_reaction_light']) || isset($ch['fixed_lazy_reaction']) || isset($ch['miotic_size']) )

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b> PUPILAS </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['pupil_size_left'])) T.PUPILAR IZQUIERDO: </b>{{$ch['pupil_size_left']}} @endisset
                                    <b>@if(isset($ch['pupil_size_right'])) T.PUPILAR DERECHO: </b>{{$ch['pupil_size_right']}} @endisset
                                    <b>@if(isset($ch['left_reaction'])) R.LUZ IZQUIERDO: </b>{{$ch['left_reaction']}} @endisset
                                    <b>@if(isset($ch['right_reaction'])) R.LUZ IZQUIERDO: </b>{{$ch['right_reaction']}} @endisset</span>
                            </p>
                        
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['mydriatic'])) </b> {{$ch['mydriatic']}} @endisset
                                    <b>@if(isset($ch['normal'])) </b> {{$ch['normal']}} @endisset
                                    <b>@if(isset($ch['lazy_reaction_light'])) </b> {{$ch['lazy_reaction_light']}} @endisset
                                    <b>@if(isset($ch['fixed_lazy_reaction'])) </b> {{$ch['fixed_lazy_reaction']}} @endisset
                                    <b>@if(isset($ch['miotic_size'])) </b> {{$ch['miotic_size']}} @endisset</span>
                            </p>
                            @endisset

                            @if(isset($ch['pulse']) || isset($ch['venous_pressure']) || isset($ch['intracranial_pressure']) || isset($ch['cerebral_perfusion_pressure']) ||
                            isset($ch['intra_abdominal']))

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b> OTROS </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['pulse'])) PULSO: </b>{{$ch['pulse']}} @endisset
                                    <b>@if(isset($ch['venous_pressure'])) PVC: </b>{{$ch['venous_pressure']}} @endisset
                                    <b>@if(isset($ch['intracranial_pressure'])) PRESIÓN INTRACANEANA: </b>{{$ch['intracranial_pressure']}} @endisset
                                    <b>@if(isset($ch['cerebral_perfusion_pressure'])) PPC: </b>{{$ch['cerebral_perfusion_pressure']}} @endisset
                                    <b>@if(isset($ch['intra_abdominal'])) PRESIÓN INTRAABDOMINAL: </b>{{$ch['intra_abdominal']}} @endisset </span>
                                </span>
                            </p>
                            @endisset

                            @if(isset($ch['pulmonary_systolic']) || isset($ch['pulmonary_diastolic']) || isset($ch['pulmonary_half']))

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b> PRESIÓN ART PULMONAR </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['pulmonary_systolic'])) SISTÓLICA: </b>{{$ch['pulmonary_systolic']}} @endisset
                                    <b>@if(isset($ch['pulmonary_diastolic'])) DIASTÓLICA: </b>{{$ch['pulmonary_diastolic']}} @endisset
                                    <b>@if(isset($ch['pulmonary_half'])) MEDIA: </b>{{$ch['pulmonary_half']}} @endisset</span>
                            </p>
                            @endisset

                            @if(isset($ch['head_circunference']) || isset($ch['abdominal_perimeter']) || isset($ch['chest_perimeter']))

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b> PEDIATRÍA - PERÍMETRO </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['head_circunference'])) CEFÁLICO: </b>{{$ch['head_circunference']}} @endisset
                                    <b>@if(isset($ch['abdominal_perimeter'])) ABDOMINAL: </b>{{$ch['abdominal_perimeter']}} @endisset
                                    <b>@if(isset($ch['chest_perimeter'])) TORÁCICO: </b>{{$ch['chest_perimeter']}} @endisset</span>
                            </p>
                            @endisset

                            @endisset

                
                            @if(($ch['has_oxigen']) == 1 )

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b>TIENE OXIGENO</b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>                          
                    

                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['ch_vital_ventilated'])) MODO VENTILATORIO: </b>{{$ch['ch_vital_ventilated'] ['name']}} @endisset
                                    <b>@if(isset($ch['oxygen_type'])) TIPO DE OXÍGENO: </b>{{$ch['oxygen_type'] ['name']}} @endisset</span>
                            </p>

                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['liters_per_minute'])) LITROS POR MINUTO: </b>{{$ch['liters_per_minute'] ['name']}} @endisset
                                    <b>@if(isset($ch['parameters_signs'])) PARAMETROS: </b>{{$ch['parameters_signs'] ['name']}} @endisset</span>

                            </p>
                            @endisset


                            @endforeach
                            @endisset
                
                    </div>

                <!-- Diagnóstico -->
                    <div>
                        @if(count($ChDiagnosisEvo) > 0)
                    
                        <hr />

                        <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DIAGNÓSTICO </b> </span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>

                        @foreach($ChDiagnosisEvo as $ch)
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                                <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset
                                <b>@if(isset($ch['diagnosis'])) DIAGNÓSTICO: </b>{{$ch['diagnosis']['name']}} @endisset
                                <b>@if(isset($ch['ch_diagnosis_class'])) CLASE: </b> {{$ch['ch_diagnosis_class'] ['name']}} @endisset
                                <b>@if(isset($ch['ch_diagnosis_type'])) TIPO: </b> {{$ch['ch_diagnosis_type'] ['name']}} @endisset
                                <b>@if(isset($ch['diagnosis_observation'])) OBSERVACIÓN: </b> {{$ch['diagnosis_observation']}} @endisset</span>
                        </p>
                        @endforeach

                        @endisset

                    </div>

                <!-- Ostomias -->
                    <div>
                        @if(count($ChOstomiesEvo) > 0)
                    

                        <hr />

                        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> OSTOMIAS </b> </span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>

                        @foreach($ChOstomiesEvo as $ch)
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                                <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset
                                <b>@if(isset($ch['ostomy'])) OSTOMIA: </b> {{$ch['ostomy']['name']}} @endisset
                                <b>@if(isset($ch['observation'])) OBSERVACIÓN : </b> {{$ch['observation']}} @endisset</span>
                        </p>
                        @endforeach

                        @endisset
                    </div>
                
                <!-- AP -->
                    <div>
                        @if(count($ChApEvo) > 0)                            
                

                        <hr />

                        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>ANÁLISIS - PLAN (diagnóstico, terapeutico, de seguimiento) </b> </span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>

                        @foreach($ChApEvo as $ch)
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                                <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset
                                <b>@if(isset($ch['analisys'])) ANÁISIS: </b> {{$ch['analisys']}} @endisset
                                <b>@if(isset($ch['plan'])) PLAN : </b> {{$ch['plan']}} @endisset</span>
                        </p>
                        @endforeach

                        @endisset

                    </div>

                <!-- Recomendaciones -->
                    <div>
                        @if(count($ChRecommendationsEvo) > 0)
            

                        <hr />

                        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> RECOMENDACIONES </b> </span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>

                        @foreach($ChRecommendationsEvo as $ch)
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                                <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset
                                <b>@if(isset($ch['recommendations_evo'])) RECOMENDACION: </b> {{$ch['recommendations_evo']['name']}} @endisset
                                <b>@if(isset($ch['patient_family_education'])) DESCRIPCIÓN : </b> {{$ch['patient_family_education']}} @endisset
                                <b>@if(isset($ch['observations'])) OBSERVACIÓN : </b> {{$ch['observations']}} @endisset</span>
                        </p>
                        @endforeach
                        
                        @endisset

                    </div>

                <!-- Dietas -->
                    <div>
                        @if(count($ChDietsEvo) > 0)
                    
                        <hr />

                        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DIETA RECOMENDADA </b> </span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>

                        @foreach($ChDietsEvo as $ch)
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                                <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset
                                <b>@if(isset($ch['diet_consistency'])) ORAL: </b> {{$ch['diet_consistency']['name']}} @endisset
                                <b>@if(isset($ch['enterally_diet'])) ENTERAL : </b> {{$ch['enterally_diet']['name']}} @endisset
                                <b>@if(isset($ch['observation'])) OBSERVACIONES: </b> {{$ch['observation']}} @endisset</span>
                        </p>
                        @endforeach

                        @endisset
                    </div>


            </div>


            @endisset
        </div>

</body>

</html>