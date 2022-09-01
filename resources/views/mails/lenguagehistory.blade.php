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
            background-color: #eeecec;
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

       
        <hr />


        


























































      


        


            





        <!-- Terapia Leguaje-->
        <div>
            @if($chrecord[0]['ch_type_id'] == 4)

            <!-- INGRESO -->
            <div>
                <hr />
                <!-- Validación Ingreso -->
                <div>
                    @if(count($TlTherapyLanguage) > 0 || count($OstomiesTl) > 0 || count($SwallowingDisordersTL) > 0  || count($VoiceAlterationsTl) > 0 || count($HearingTl) > 0   || count($LanguageTl) > 0  
                    || count($CommunicationTl) > 0  || count($CognitiveTl) > 0 || count($OrofacialTl) > 0   || count($SpeechTl) > 0   || count($SpecificTestsTl) > 0   || count($TherapeuticGoalsTl) > 0  || count($CifDiagnosisTl) > 0 
                    || count($ChVitalSigns) > 0)

                    <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                        INGRESO<br>
                    </p>
             @endisset
        </div>

        <!-- Ingreso TL          -->
        <div>
            @if(count($TlTherapyLanguage) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> VALORACIÓN TERAPIA DE LENGUAJE INGRESO</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @foreach($TlTherapyLanguage as $ch)
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                    <b>@if(isset($ch['medical_diagnostic'])) DIANOSTICO MÉDICO:</b> {{$ch['medical_diagnostic']['name']}} @endisset <br/>
                    <b>@if(isset($ch['therapeutic_diagnosis'])) DIANOSTICO TERAPÉUTICO:</b> {{$ch['therapeutic_diagnosis']['name']}} @endisset <br/>
                    <b>@if(isset($ch['reason_consultation']))  MOTIVO DE CONSULTA:</b> {{$ch['reason_consultation']}} @endisset <br/></span>
            </p>
            @endforeach
            @endisset
        </div> 
         <!-- ANTECEDENTES -->
    <div>
        <!-- Generales -->
        <div>
            @if(count($ChBackground) > 0)

            <hr />

            <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ANTECEDENTES</span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            <table class="tablehc">

            <tr>
                <th><span style="font-family:Calibri; font-size:9pt">FECHA</span></th>
                <th><span style="font-family:Calibri; font-size:9pt">TIPO</span></th>

                <th><span style="font-family:Calibri; font-size:9pt">REVISIÓN</span></th>
                @if(isset($chrecord[0]['observation']))
                <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</span></th>
                @endisset
            </tr>

            @foreach($ChBackground as $ch)
            <tr>
            
                @if(isset($ch['created_at']))
                <td>
                    <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                </td>
                @endisset

                @if(isset($ch['ch_type_background']))
                <td>
                    <span style="font-family:Calibri; font-size:9pt">{{$ch['ch_type_background']['name']}}</span>
                </td>
                @endisset

                @if(isset($ch['revision']))
                <td>
                    <span style="font-family:Calibri; font-size:9pt"> {{$ch['revision']}}</span>
                </td>
                @endisset

                @if(isset($chrecord[0]['observation']))

                @if(isset($ch['observation']))
                <td>
                    <span style="font-family:Calibri; font-size:9pt">{{$ch['observation']}}</span>
                </td>
                @endisset
                @endisset
            
            </tr>
            @endforeach

            </table>
            @endisset
        </div>

        <!-- Gineco -->
        <div>
            @if(count($ChGynecologists) > 0)

            <hr />

            <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ANTECEDENTES GINECOOBSTÉTRICOS</span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            @foreach($ChGynecologists as $ch)
                
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                </p>

                @if(($ch['pregnancy_status']) == 'EMBARAZADA' )
                    <p style=" text-align: left; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"><b>EN ESTADO DE EMBARAZO</b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>  
                    <br/>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">                               
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['gestational_age'])) EDAD GESTACIONAL (EN SEMANAS)</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['gestational_age'])) {{$ch['gestational_age']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['date_childbirth'])) FECHA PROB. PARTO </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['date_childbirth'])) {{$ch['date_childbirth']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <br/>    
                @endisset

                <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                    <tr style="height:11.95pt">
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:1pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['menarche_years'])) MENARQUIA (AÑOS)</b> @endisset</span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:1pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['menarche_years'])){{$ch['menarche_years']}} @endisset</span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:1pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['last_menstruation'])) FUR </b>@endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:1pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['last_menstruation'])){{$ch['last_menstruation']}} @endisset</span>
                                                
                            </p>
                        </td> 
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:1pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['ch_type_gynecologists'])) TIPO</b> @endisset</span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:1pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['ch_type_gynecologists'])){{$ch['ch_type_gynecologists']['name']}} @endisset</span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:1pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['time_menstruation'])) CADA </b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:1pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['time_menstruation'])) {{$ch['time_menstruation']}} @endisset </span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:1pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['duration_menstruation'])) DURACIÓN </b> @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['duration_menstruation'])){{$ch['duration_menstruation']}} @endisset </span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['date_last_cytology'])) FUC </b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['date_last_cytology'])) {{$ch['date_last_cytology']}} @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['ch_rst_cytology_gyneco'])) RESULTADO CITOLOGÍA </b> @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['ch_rst_cytology_gyneco'])){{$ch['ch_rst_cytology_gyneco']['name']}} @endisset </span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['date_biopsy'])) BIOPSIA</b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['date_biopsy'])) {{$ch['date_biopsy']}} @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['ch_rst_biopsy_gyneco'])) RESULTADO BIOPSIA </b> @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['ch_rst_biopsy_gyneco'])){{$ch['ch_rst_biopsy_gyneco']['name']}} @endisset </span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['date_mammography'])) MAMOGRAFÍA </b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['date_mammography'])) {{$ch['date_mammography']}} @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_rst_mammography_gyneco'])) RESULTADO MAMOGRAFÍA </b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['ch_rst_mammography_gyneco'])) {{$ch['ch_rst_mammography_gyneco']['name']}} @endisset </span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['date_colposcipia'])) COLPOSCOPIA </b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['date_colposcipia'])) {{$ch['date_colposcipia']}} @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_rst_colposcipia_gyneco'])) RESULTADO COLPOSCOPIA</b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['ch_rst_colposcipia_gyneco'])) {{$ch['ch_rst_colposcipia_gyneco']['name']}} @endisset </span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['total_feats'])) TOTAL GESTAS PREVIAS </b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['total_feats'])) {{$ch['total_feats']}} @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['childbirth_number'])) PARTOS</b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['childbirth_number'])) {{$ch['childbirth_number']}} @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['caesarean_operation'])) CESÁREA </b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['caesarean_operation'])) {{$ch['caesarean_operation']}} @endisset </span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['misbirth'])) ABORTOS</b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['misbirth'])) {{$ch['misbirth']}} @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['molar_pregnancy'])) MOLAS</b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['molar_pregnancy'])) {{$ch['molar_pregnancy']}} @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ectopic'])) ECTÓPICOS </b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['ectopic'])) {{$ch['ectopic']}} @endisset </span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['dead_sons'])) HIJOS NACIDOS FALLECIDOS</b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['dead_sons'])) {{$ch['dead_sons']}} @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['living_sons'])) HIJOS VIVEN</b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['living_sons'])) {{$ch['living_sons']}} @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['sons_dead_first_week'])) HIJOS FALLECIDOS 1ERA SEMANA </b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['sons_dead_first_week'])) {{$ch['sons_dead_first_week']}} @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['children_died_after_the_first_week'])) HIJOS FALLECIDOS DESPUES 1ERA SEMANA </b> @endisset</span>
                                                
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['children_died_after_the_first_week'])) {{$ch['children_died_after_the_first_week']}} @endisset </span>
                            </p>
                        </td>
                    </tr>
                </table>  

                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:8pt">
                    <b> @if(($ch['misbirth_unstudied']) == 1 ) ABORTOS ESPONTÁNEOS  -</b> @endisset 
                    <b> @if(($ch['background_twins']) == 1 ) ANTECEDENTES GEMELARES  -</b> @endisset 
                    <b> @if(($ch['last_planned_pregnancy']) == 1 ) ULTIMO EMBARAZO PLANEADO </b> @endisset 
                    <b> @if(($ch['misbirth_unstudied']) == 0 ) NO ABORTOS ESPONTÁNEOS -</b>{{$ch['misbirth_unstudied']}} @endisset 
                    <b> @if(($ch['background_twins']) == 0 ) SIN ANTECEDENTES GEMELARES -</b>{{$ch['background_twins']}} @endisset 
                    <b> @if(($ch['last_planned_pregnancy']) == 0) ULTIMO EMBARAZO NO PLANEADO </b>{{$ch['last_planned_pregnancy']}} @endisset </span>
                </p>

                <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                    <tr style="height:11.95pt">                               
                        <td style="width:80pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['date_of_last_childbirth'])) FECHA ÚLTIMO PARTO</b>@endisset</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['date_of_last_childbirth'])) {{$ch['date_of_last_childbirth']}} @endisset</span>
                            </p>
                        </td>
                        <td style="width:80pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['last_weight'])) ÚLTIMO PESO </b>@endisset</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['last_weight'])) {{$ch['last_weight']}} @endisset</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">                               
                        <td style="width:80pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_failure_method_gyneco'])) MÉTODO FRACASO</b>@endisset</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['ch_failure_method_gyneco'])) {{$ch['ch_failure_method_gyneco']['name']}} @endisset</span>
                            </p>
                        </td>
                        <td style="width:80pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_planning_gynecologists'])) PLANIFICA </b>@endisset</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['ch_planning_gynecologists'])) {{$ch['ch_planning_gynecologists']['name']}} @endisset</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt"> 
                        <td style="width:80pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_method_planning_gyneco'])) MÉTODO DE PLANIFICACIÓN </b>@endisset</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['ch_method_planning_gyneco'])) {{$ch['ch_method_planning_gyneco']['name']}} @endisset</span>
                            </p>
                        </td>
                        <td style="width:80pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['since_planning'])) DESDE </b>@endisset</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['since_planning'])) {{$ch['since_planning']}} @endisset</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">                               
                        <td style="width:80pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['sexual_partners'])) NRO COMPAÑEROS SEXUALES</b>@endisset</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['sexual_partners'])) {{$ch['sexual_partners']}} @endisset</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">  
                        <td style="width:80pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_exam_gynecologists'])) AUTO ÉXAMEN SENO</b>@endisset</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['ch_exam_gynecologists'])) {{$ch['ch_exam_gynecologists']['name']}} @endisset</span>
                            </p>
                        </td>
                        <td style="width:80pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['time_exam_breast_self'])) CADA </b>@endisset</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['time_exam_breast_self'])) {{$ch['time_exam_breast_self']}} @endisset</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">  
                        <td style="width:80pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['observation_breast_self_exam'])) OBSERVACIONES </b> {{$ch['observation_breast_self_exam']}} </b>@endisset</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">  
                        <td style="width:80pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_flow_gynecologists'])) FLUJO</b>@endisset</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['ch_flow_gynecologists'])) {{$ch['ch_flow_gynecologists']['name']}} @endisset</span>
                            </p>
                        </td>                        
                        <td style="width:80pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['observation_flow'])) OBSERVACIONES </b>{{$ch['observation_flow']}} </b>@endisset</span>
                            </p>
                        </td>
                    </tr>
                </table>
                <br/> 

            @endforeach
            @endisset
        </div> 

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
            <br>
        
            <!-- Requeridos-->
            <div>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['created_at'])) FECHA REGISTRO: </b>{{substr($ch['created_at'],0,10) }} @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b> @if(isset($ch['clock']))HORA REGISTRO: </b>{{substr($ch['clock'],0,10) }} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br/>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b> @if(isset($ch['cardiac_frequency'])) FRECUENCIA CARDIACA: </b>{{$ch['cardiac_frequency']}} @endisset
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b> @if(isset($ch['respiratory_frequency'])) FRECUENCIA RESPIRATORIA: </b>{{$ch['respiratory_frequency']}} @endisset</span>
                                                
                                </p>
                            </td>
                        </tr>

                    <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['temperature'])) TEMPERATURA: </b>{{$ch['temperature']}} @endisset
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>@if(isset($ch['ch_vital_temperature'])) VIA DE TOMA: </b>{{$ch['ch_vital_temperature']['name']}} @endisset</span>
                                    <span style="font-family:Calibri; letter-spacing:4.45pt"> </span>                                    
                                </p>
                            </td>
                        </tr>
                    
                        <tr style="height:11.95pt">
                            <td>
                                <br/>
                            </td>
                        </tr>

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['oxigen_saturation'])) SATURACIÓN DE OXIGENO: </b>{{$ch['oxigen_saturation']}} @endisset</span>
                                </p>
                            </td>
                        </tr>

                        <tr style="height:11.95pt">
                            <td>
                                <br/>
                            </td>
                        </tr>

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">  <b>@if(isset($ch['size'])) TALLA: </b>{{$ch['size']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['weight'])) PESO: </b>{{$ch['weight']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['body_mass_index'])) I.M.C: </b>{{$ch['body_mass_index']}} @endisset</span>
                                </p>
                            </td>
                        </tr>

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['pressure_systolic'])) TENSIÓN ARTERIAL SISTÓLICA: </b>{{$ch['pressure_systolic']}} @endisset
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>@if(isset($ch['pressure_diastolic'])) TENSIÓN ARTERIAL DIASTÓLICA: </b>{{$ch['pressure_diastolic']}} @endisset
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['pressure_half'])) MEDIA: </b>{{$ch['pressure_half']}} @endisset</span>
                                </p>
                            </td>
                        </tr>

                    </table> 
            </div>                         
            
            <!-- Otros-->
            <div>
                    @if (isset($ch['ch_vital_neurological']) || isset($ch['ch_vital_hydration']) || 
                    isset($ch['pupil_size_left']) || isset($ch['pupil_size_right']) || isset($ch['left_reaction']) || isset($ch['right_reaction']) ||
                    isset($ch['mydriatic']) || isset($ch['normal']) || isset($ch['lazy_reaction_light']) || isset($ch['fixed_lazy_reaction']) || isset($ch['miotic_size']) ||
                    isset($ch['pulse']) || isset($ch['venous_pressure']) || isset($ch['intracranial_pressure']) || isset($ch['cerebral_perfusion_pressure']) ||
                    isset($ch['intra_abdominal']) || isset($ch['pulmonary_systolic']) || isset($ch['pulmonary_diastolic']) || isset($ch['pulmonary_half']) ||
                    isset($ch['head_circunference']) || isset($ch['abdominal_perimeter']) || isset($ch['chest_perimeter']) )

                    <br/>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_vital_neurological'])) ESTADO NEUROLÓGICO: </b>{{$ch['ch_vital_neurological']['name']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                            <tr style="height:11.95pt">
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_vital_hydration'])) ESTADO DE HIDRATACIÓN: </b>{{$ch['ch_vital_hydration']['name']}} @endisset</span>
                                </p>
                            </td>
                        </tr>   
                    </table>

                    @if(isset($ch['pupil_size_left']) || isset($ch['pupil_size_right']) || isset($ch['left_reaction']) || isset($ch['right_reaction']) ||
                    isset($ch['mydriatic']) || isset($ch['normal']) || isset($ch['lazy_reaction_light']) || isset($ch['fixed_lazy_reaction']) || isset($ch['miotic_size']) )
                    <br/>
                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> PUPILAS </b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['pupil_size_left'])) T.PUPILAR IZQUIERDO: </b>{{$ch['pupil_size_left']}} @endisset </span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">  <b>@if(isset($ch['pupil_size_right'])) T.PUPILAR DERECHO: </b>{{$ch['pupil_size_right']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['left_reaction'])) R.LUZ IZQUIERDO: </b>{{$ch['left_reaction']}} @endisset </span>  
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>@if(isset($ch['right_reaction'])) R.LUZ IZQUIERDO: </b>{{$ch['right_reaction']}} @endisset</span>
                                                
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <br/>
                            </td>
                        </tr>

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> 
                                        <b>@if(isset($ch['mydriatic'])) </b> {{$ch['mydriatic']}} @endisset
                                        <b>@if(isset($ch['normal'])) </b> {{$ch['normal']}} @endisset
                                        <b>@if(isset($ch['lazy_reaction_light'])) </b> {{$ch['lazy_reaction_light']}} @endisset
                                        <b>@if(isset($ch['fixed_lazy_reaction'])) </b> {{$ch['fixed_lazy_reaction']}} @endisset
                                        <b>@if(isset($ch['miotic_size'])) </b> {{$ch['miotic_size']}} @endisset</span>
                            </td>
                        </tr>
                    </table> 
                    @endisset

                
                    @if(isset($ch['pulse']) || isset($ch['venous_pressure']) || isset($ch['intracranial_pressure']) || isset($ch['cerebral_perfusion_pressure']) ||
                    isset($ch['intra_abdominal']))

                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> OTROS  SIGNOS VIALES</b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    <br/>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">  <b>@if(isset($ch['pulse'])) PULSO: </b>{{$ch['pulse']}} @endisset </span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['venous_pressure'])) PVC: </b>{{$ch['venous_pressure']}} @endisset </span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>@if(isset($ch['cerebral_perfusion_pressure'])) PPC: </b>{{$ch['cerebral_perfusion_pressure']}} @endisset </span> 
                                </p>
                            </td>
                        </tr>
                                                    
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['intracranial_pressure'])) PRESIÓN INTRACANEANA: </b>{{$ch['intracranial_pressure']}} @endisset </span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['intra_abdominal'])) PRESIÓN INTRAABDOMINAL: </b>{{$ch['intra_abdominal']}} @endisset </span>
                                                
                                </p>
                            </td>
                        </tr>
                    
                    </table> 

                    @endisset

                    @if(isset($ch['pulmonary_systolic']) || isset($ch['pulmonary_diastolic']) || isset($ch['pulmonary_half']))


                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> PRESIÓN ART PULMONAR </b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                    <br/>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['pulmonary_systolic'])) SISTÓLICA: </b>{{$ch['pulmonary_systolic']}} @endisset 
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['pulmonary_diastolic'])) DIASTÓLICA: </b>{{$ch['pulmonary_diastolic']}} @endisset
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['pulmonary_half'])) MEDIA: </b>{{$ch['pulmonary_half']}} @endisset</span></span>
                                </p>
                            </td>
                        </tr>

                    </table>
                    @endisset

                    @if(isset($ch['head_circunference']) || isset($ch['abdominal_perimeter']) || isset($ch['chest_perimeter']))

                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> PEDIATRÍA - PERÍMETRO </b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>         

                    <br/>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['head_circunference'])) CEFÁLICO: </b>{{$ch['head_circunference']}} @endisset
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['abdominal_perimeter'])) ABDOMINAL: </b>{{$ch['abdominal_perimeter']}} @endisset
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">  <b>@if(isset($ch['chest_perimeter'])) TORÁCICO: </b>{{$ch['chest_perimeter']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    @endisset

                    @endisset

        
                    @if(($ch['has_oxigen']) == 1 )

                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>TIENE OXÍGENO </b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>                         
                    <br/>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['ch_vital_ventilated'])) MODO VENTILATORIO: </b>{{$ch['ch_vital_ventilated'] ['name']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['oxygen_type'])) TIPO DE OXÍGENO: </b>{{$ch['oxygen_type'] ['name']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">  <b>@if(isset($ch['liters_per_minute'])) LITROS POR MINUTO: </b>{{$ch['liters_per_minute'] ['name']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['parameters_signs'])) PARAMETROS: </b>{{$ch['parameters_signs'] ['name']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>                           
                    @endisset


                    @endforeach
                    @endisset

            </div>
        </div>
       
        <!-- Ostomías -->
        <div>
        @if(count($OstomiesTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> VALORACIÓN TERAPIA DE LENGUAJE INGRESO</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @foreach($OstomiesTl as $ch)
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                    @if(isset($chrecord[0]['created_at']))
                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                    @endisset
                    @if(isset($chrecord[0]['jejunostomy']))
                    <b>@if(isset($ch['jejunostomy'])) YEYUNOSTOMÍA:</b> {{$ch['jejunostomy']}} @endisset <br/>
                    @endisset
                    @if(isset($chrecord[0]['colostomy']))
                    <b>@if(isset($ch['colostomy']))  COLOSTOMÍA: </b> {{$ch['colostomy']}} @endisset <br/>
                    @endisset
                    @if(isset($chrecord[0]['observations']))
                    <b>@if(isset($ch['observations'])) OBSERVACIÓN: </b> {{$ch['observations']}} @endisset</span>
                    @endisset
            </p>
            @endforeach
        @endisset
        </div> 
        <!-- Alteraciones En La Deglución -->

            <div>
                @if(count($SwallowingDisordersTL) > 0)
                    <hr />
                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>ALTERACIONES EN LA DEGLUCIÓN</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
               

                    @foreach($SwallowingDisordersTL as $ch)
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>FECHA: </b></span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">{{substr($ch['created_at'],0,10) }}</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['solid_dysphagia']) )DISFAGIA PARA SOLIDOS:</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['solid_dysphagia'])) {{$ch['solid_dysphagia']}} @endisset</span>
                                </p>
                            </td>
                        </tr>

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['clear_liquid_dysphagia']) )DISFAGIA PARA LÍQUIDOS CLAROS:</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['clear_liquid_dysphagia']) ) {{$ch['clear_liquid_dysphagia']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['thick_liquid_dysphagia']) )DISFAGIA PARA LÍQUIDOS ESPESOS:</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['thick_liquid_dysphagia'])) {{$ch['thick_liquid_dysphagia']}} @endisset</span>
                                </p>
                            </td>
                        </tr>


                        
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['nasogastric_tube']) )SONDA NASOGÁSTRICA:<b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['nasogastric_tube']) ) {{$ch['nasogastric_tube']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['gastrostomy']) )GASTROSTOMÍA</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['gastrostomy'])) {{$ch['gastrostomy']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['nothing_orally']) )NADA VÍA ORAL:</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['nothing_orally']) ) {{$ch['nothing_orally']}} @endisset</span>
                                </p>
                            </td>
                        
               </table>

        
                <br/>
                @if(isset($chrecord[0]['observations']))
            
                <span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:8pt"> &nbsp;&nbsp;<b>OBSERVACIÓN:</b> 
                </span><span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:7pt"> &nbsp;&nbsp;@if(isset($ch['observations'])) {{$ch['observations']}} @endisset</span>
                @endisset
                </p>
                @endforeach
                @endisset
            
            </div>


         <!-- Alteraciones En La Voz -->
         <div>
            @if(count($VoiceAlterationsTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>ALTERACIONES EN LA VOZ</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
          

            @foreach($VoiceAlterationsTl as $ch)


                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>FECHA: </b></span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">{{substr($ch['created_at'],0,10) }}</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['bell_alteration']) )ALTERACIÓN EN TIMBRE:</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['bell_alteration'])) {{$ch['bell_alteration']}} @endisset</span>
                                </p>
                            </td>
                        </tr>

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['tone_alteration']) )ALTERACIÓN EN TONO:</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['tone_alteration']) ) {{$ch['tone_alteration']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['intensity_alteration']) )ALTERACIÓN EN INTENSIDAD:</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['intensity_alteration'])) {{$ch['intensity_alteration']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                </table>
        
        
            <br/>
            @if(isset($chrecord[0]['observations']))
        
            <span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:8pt"> &nbsp;&nbsp;<b>OBSERVACIÓN:</b> 
            </span><span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:7pt"> &nbsp;&nbsp;@if(isset($ch['observations'])) {{$ch['observations']}} @endisset</span>
            @endisset
            </p>
            @endforeach
            @endisset
        </div> 
        <!-- Audición-->
        <div>
            @if(count($HearingTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>AUDICIÓN</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
           

         @foreach($HearingTl as $ch)


                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>FECHA: </b></span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">{{substr($ch['created_at'],0,10) }}</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['external_ear']) )OÍDO EXTERNO:</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['external_ear'])) {{$ch['external_ear']}} @endisset</span>
                                </p>
                            </td>
                        </tr>

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['middle_ear']) )OÍDO MEDIO:</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['middle_ear']) ) {{$ch['middle_ear']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['inner_ear']) )OÍDO INTERNO:</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['inner_ear'])) {{$ch['inner_ear']}} @endisset</span>
                                </p>
                            </td>
                        </tr>

            
            </table>
            
                    
                    <br/>
                    @if(isset($chrecord[0]['observations']))
                
                    <span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:8pt"> &nbsp;&nbsp;<b>OBSERVACIÓN:</b> 
                    </span><span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:7pt"> &nbsp;&nbsp;@if(isset($ch['observations'])) {{$ch['observations']}} @endisset</span>
                    @endisset
                    </p>
                    @endforeach
                    @endisset
                        
        </div> 

            <!-- Lenguaje -->
            <div>
                @if(count($LanguageTl) > 0)

                <hr />

                <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>LINGÜÍSTICO</b></span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>


                @foreach($LanguageTl as $ch)
                        <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>FECHA: </b></span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">{{substr($ch['created_at'],0,10) }}</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['phonetic_phonological']) )FONÉTICO/FONOLÓGICO:</b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['phonetic_phonological'])) {{$ch['phonetic_phonological']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>

                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['syntactic']) )SINTÁCTICO:</b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['syntactic']) ) {{$ch['syntactic']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['morphosyntactic']) )MORFOSINTÁCTICO:</b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['morphosyntactic'])) {{$ch['morphosyntactic']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['semantic']) )SEMÁNTICO:</b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['semantic']) ) {{$ch['semantic']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['pragmatic']) )PRAGMATICO:</b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['pragmatic'])) {{$ch['pragmatic']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                        </table>


                <hr />
                
                <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>PSICOLINGÜÍSTICO</b></span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>

                @foreach($LanguageTl as $ch)
                <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>FECHA: </b></span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">{{substr($ch['created_at'],0,10) }}</span>
                        </p>
                    </td>
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['reception']) )RECEPCIÓN:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['reception'])) {{$ch['reception']}} @endisset</span>
                        </p>
                    </td>
                </tr>
        
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['coding']) )CODIFICACIÓN:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['coding']) ) {{$ch['coding']}} @endisset</span>
                        </p>
                    </td>
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['decoding']) )DECODIFICACIÓN:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['decoding'])) {{$ch['decoding']}} @endisset</span>
                        </p>
                    </td>
                </tr>
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['production']) )PRODUCCIÓN:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['production']) ) {{$ch['production']}} @endisset</span>
                        </p>
                    </td>
                
                </tr>
        
        
               
                </table>
                <br/>
                @if(isset($chrecord[0]['observations']))
        
                <span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:8pt"> &nbsp;&nbsp;<b>OBSERVACIÓN:</b> 
                </span><span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:7pt"> &nbsp;&nbsp;@if(isset($ch['observations'])) {{$ch['observations']}} @endisset</span>
                @endisset 
                </p>
                @endforeach
                @endisset 
            </div> 
    

         <!-- Comunicación-->
         <div>
            @if(count($CommunicationTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>COMUNICACIÓN</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @foreach($CommunicationTl as $ch)


            <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>FECHA: </b></span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">{{substr($ch['created_at'],0,10) }}</span>
                        </p>
                    </td>
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['eye_contact']) )CONTACTO VISUAL:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['eye_contact'])) {{$ch['eye_contact']}} @endisset</span>
                        </p>
                    </td>
                </tr>
    
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['communicative_intention']) )NORMAS DE CORTESÍA:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['communicative_intention']) ) {{$ch['communicative_intention']}} @endisset</span>
                        </p>
                    </td>
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['communicative_purpose']) )INTENCIÓN COMUNICATIVA:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['communicative_purpose'])) {{$ch['communicative_purpose']}} @endisset</span>
                        </p>
                    </td>
                </tr>
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['communicative_purpose']) )PROPÓSITO COMUNICATIVO:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['communicative_purpose']) ) {{$ch['communicative_purpose']}} @endisset</span>
                        </p>
                    </td>
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['oral_verb_modality']) )MODALIDAD VERBAL ORAL:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['oral_verb_modality'])) {{$ch['oral_verb_modality']}} @endisset</span>
                        </p>
                    </td>
                </tr>
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['written_verb_modality']) )MODALIDAD VERBAL ESCRITA:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['written_verb_modality']) ) {{$ch['written_verb_modality']}} @endisset</span>
                        </p>
                    </td>
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['nonsymbolic_nonverbal_modality']) )MODALIDAD NO VERBAL- NO SIMBOLICA:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['nonsymbolic_nonverbal_modality'])) {{$ch['nonsymbolic_nonverbal_modality']}} @endisset</span>
                        </p>
                    </td>
                </tr>
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['symbolic_nonverbal_modality']) )MODALIDAD NO VERBAL - SIMBOLICA:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['symbolic_nonverbal_modality']) ) {{$ch['symbolic_nonverbal_modality']}} @endisset</span>
                        </p>
                    </td>
                </tr>
    

          </table>
     
            
            <br/>
            @if(isset($chrecord[0]['observations']))
        
            <span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:8pt"> &nbsp;&nbsp;<b>OBSERVACIÓN:</b> 
            </span><span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:7pt"> &nbsp;&nbsp;@if(isset($ch['observations'])) {{$ch['observations']}} @endisset</span>
            @endisset
            </p>
                
            
            @endforeach
            @endisset
        </div>   
        
        <!-- Cognitivo-->
        <div>
            @if(count($CognitiveTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>COGNITIVO</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @foreach($CognitiveTl as $ch)
            <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>FECHA: </b></span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">{{substr($ch['created_at'],0,10) }}</span>
                        </p>
                    </td>
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['memory']) )MEMORIA:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['memory'])) {{$ch['memory']}} @endisset</span>
                        </p>
                    </td>
                </tr>
    
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['attention']) )ATENCIÓN :</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['attention']) ) {{$ch['attention']}} @endisset</span>
                        </p>
                    </td>
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['concentration']) )CONCENTRACIÓN:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['concentration'])) {{$ch['concentration']}} @endisset</span>
                        </p>
                    </td>
                </tr>
          
         </table>
     
            
            <br/>
            @if(isset($chrecord[0]['observations']))
        
            <span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:8pt"> &nbsp;&nbsp;<b>OBSERVACIÓN:</b> 
            </span><span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:7pt"> &nbsp;&nbsp;@if(isset($ch['observations'])) {{$ch['observations']}} @endisset</span>
            @endisset
            </p>
                
            </div> 
            @endforeach

            @endisset
        </div> 

        <!-- Orofacial -->
        <div>
            @if(count($OrofacialTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>HEMICARA DERECHA</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @foreach($OrofacialTl as $ch)
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                        <b>@if(isset($ch['right_hermiface_symmetry']))SIMETRÍA:</b> {{$ch['right_hermiface_symmetry']}} @endisset <br/>
                        <b>@if(isset($ch['right_hermiface_tone']))TONO: </b> {{$ch['right_hermiface_tone']}} @endisset <br/>
                        <b>@if(isset($ch['right_hermiface_sensitivity']))SENSIBILIDAD: </b> {{$ch['right_hermiface_sensitivity']}} @endisset <br/>
                     </span>
                </p>
            </p>
            <hr />
            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>HEMICARA IZQUIERDA</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                        <b>@if(isset($ch['left_hermiface_symmetry'])) SIMETRÍA:</b> {{$ch['left_hermiface_symmetry']}} @endisset <br/>
                        <b>@if(isset($ch['left_hermiface_tone']))TONO: </b> {{$ch['left_hermiface_tone']}} @endisset <br/>
                        <b>@if(isset($ch['left_hermiface_sensitivity'])) SENSIBILIDAD: </b> {{$ch['left_hermiface_sensitivity']}} @endisset <br/>
                    </span>
                </p>
            </p>
            @endforeach
            @endisset
        </div>

         <!-- Habla-->
         <div>
            @if(count($SpeechTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>HABLA</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @foreach($SpeechTl as $ch)

            <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>FECHA: </b></span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">{{substr($ch['created_at'],0,10) }}</span>
                        </p>
                    </td>
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['breathing']) )RESPIRACIÓN:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['breathing'])) {{$ch['breathing']}} @endisset</span>
                        </p>
                    </td>
                </tr>
    
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['joint']) )ARTICULACIÓN :</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['joint']) ) {{$ch['joint']}} @endisset</span>
                        </p>
                    </td>
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['resonance']) )RESONANCIA:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['resonance'])) {{$ch['resonance']}} @endisset</span>
                        </p>
                    </td>
                </tr>

                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['fluency']) )FLUIDEZ:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['fluency']) ) {{$ch['fluency']}} @endisset</span>
                        </p>
                    </td>
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['prosody']) )PROSODIA:</b>@endisset</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['prosody'])) {{$ch['prosody']}} @endisset</span>
                        </p>
                    </td>
                </tr>
    
       
          </table>
     
            
            <br/>
            @if(isset($chrecord[0]['observations']))
            <span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:8pt"> &nbsp;&nbsp;<b>OBSERVACIÓN:</b> 
            </span><span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:7pt"> &nbsp;&nbsp;@if(isset($ch['observations'])) {{$ch['observations']}} @endisset</span>
            @endisset
            </p>
                
            </div> 
            @endforeach
            @endisset
        </div> 
           

        <!-- Pruebas Especificas-->
        <div>
            @if(count($SpecificTestsTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>PRUEBAS ESPECIFICAS</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @foreach($SpecificTestsTl as $ch)
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                    <b>@if(isset($ch['hamilton_scale']))ESCALA DE HAMILTON/ FAST/PRUEBA DE LOS 7 MINUTOS (COGNICION):</b> {{$ch['hamilton_scale']}} @endisset <br/>
                    <b>@if(isset($ch['boston_test']))PRUEBA DE BOSTON / MINI BOSTON (LENGUAJE ADULTOS): </b> {{$ch['boston_test']}} @endisset <br/>
                    <b>@if(isset($ch['termal_merril']))TERMAN Y MERRIL/ BENHALE (LENGUAJE INFANTIL): </b> {{$ch['termal_merril']}} @endisset <br/>
                    <b>@if(isset($ch['prolec_plon'])) PROLEC / PLON-R (LECTURA Y ESCRITURA): </b> {{$ch['prolec_plon']}} @endisset <br/>    
                    <b>@if(isset($ch['ped_guss']))PED /GUSS (DEGLUCIÓN): </b> {{$ch['ped_guss']}} @endisset <br/>
                    <b>@if(isset($ch['vhi_grbas']))VHI /GRBAS/RASAT (VOZ): </b> {{$ch['vhi_grbas']}} @endisset <br/>
                    <b>@if(isset($ch['pemo_speech'])) PEMO (HABLA): </b> {{$ch['pemo_speech']}} @endisset
                </span>
            </p>
            @endforeach
            @endisset
        </div> 

        <!-- Objetivos Terapeuticos-->
        <div>
            @if(count($TherapeuticGoalsTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>OBJETIVOS TERAPEUTICOS </b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
        

            <table class="tablehc">
                <tr>
                    <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                    <th><span style="font-family:Calibri; font-size:9pt">OBJETIVOS</th>
                </tr>

                @foreach($TherapeuticGoalsTl as $ch)
                <tr>                        
                @if(isset($ch['created_at']))
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                    </td>
                    @endisset

                @if(isset($ch['strengthen_phonoarticulators']) || isset($ch['strengthen_tone']) || isset($ch['favor_process']) || isset($ch['strengthen_thread']) || isset($ch['favor_psycholinguistic']) ||
                isset($ch['increase_processes']) || isset($ch['strengthen_qualities']) || isset($ch['strengthen_communication']) || isset($ch['improve_skills'])  )
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">

                          
                            @if(isset($ch['strengthen_phonoarticulators'])) {{$ch['strengthen_phonoarticulators']}} @endisset 
                            
                           
                            @if(isset($ch['strengthen_tone']))<br/>  {{$ch['strengthen_tone']}} @endisset 
                           
                           
                            @if(isset($ch['favor_process']))  <br/>{{$ch['favor_process']}} @endisset 
                          
                            @if(isset($ch['strengthen_thread'])) <br/> {{$ch['strengthen_thread']}} @endisset 
                            
                            @if(isset($ch['favor_psycholinguistic'])) <br/> {{$ch['favor_psycholinguistic']}} @endisset 
                           
                            @if(isset($ch['increase_processes'])) <br/> {{$ch['increase_processes']}} @endisset 
                            
                            @if(isset($ch['strengthen_qualities'])) <br/> {{$ch['strengthen_qualities']}}@endisset  
                            
                            @if(isset($ch['strengthen_communication']))  <br/>{{$ch['strengthen_communication']}} @endisset 
                           
                            @if(isset($ch['improve_skills']))  {{$ch['improve_skills']}} @endisset 
                             
                       </span> 
                    @endisset                
                                        
                </tr>
                @endforeach

            </table>
           
            @endisset
        </div> 








        <!-- Diagnostico CIF-->
        <div>
            @if(count($CifDiagnosisTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DIAGNÓSTICO CIF</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            <table class="tablehc">
                <tr>
                    <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                    <th><span style="font-family:Calibri; font-size:9pt">DIAGNÓSTICO CIF</th>
                </tr>

                @foreach($CifDiagnosisTl as $ch)
                <tr>                        
                @if(isset($ch['created_at']))
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                    </td>
                    @endisset

                @if(isset($ch['text'])  )
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">
                            @if(isset($ch['text'])) {{$ch['text']}} @endisset 
                         </span> 
                    @endisset                
                                        
                </tr>
                @endforeach

            </table>


           
            @endisset
        </div> 

        
         <!-- NÚMERO DE SESIONES MENSUALES E INTENSIDAD SEMANA-->
         <div>
            @if(count($NumberMonthlySessionsTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>NÚMERO DE SESIONES MENSUALES E INTENSIDAD SEMANA</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
        

                    <table class="tablehc">

                    
                    <tr>
                        <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                        <th><span style="font-family:Calibri; font-size:9pt">SESIONES MENSUALES:</th>
                        <th><span style="font-family:Calibri; font-size:9pt">INTENSIDAD SEMANAL:</th>
                            @if(isset($chrecord[0]['recomendations']))
                        <th><span style="font-family:Calibri; font-size:9pt">RECOMENDACIONES</th>
                            @endisset



                
                     </tr>

                        @foreach($NumberMonthlySessionsTl as $ch)
                        <tr>

                           
                            <td>

                            <span style="font-family:Calibri; font-size:9pt">  {{substr($ch['created_at'],0,10) }} </span>

                            </td>
                            

                            @if(isset($ch['monthly_sessions']))
                            <td>

                            <span style="font-family:Calibri; font-size:9pt">    {{$ch['monthly_sessions']}} </span>

                            </td>
                            @endisset

                            @if(isset($ch['weekly_intensity']))
                            <td>

                            <span style="font-family:Calibri; font-size:9pt"> {{$ch['weekly_intensity']}} </span>

                            </td>

                            @endisset
                            @if(isset($chrecord[0]['recomendations']))
                            @if(isset($ch['recomendations']))
                            <td>

                            <span style="font-family:Calibri; font-size:9pt">    {{$ch['recomendations']}} </span>

                            </td>
                            @endisset
                            @endisset

            


                            

                        </tr>
                        @endforeach
            </table>
            @endisset
</div> 

        {{-- Regular --}}

        <div>

            <!-- INGRESO -->
            <div>
                <hr />
                <!-- Validación Ingreso -->
                <div>
                    @if(count($TlTherapyLanguageRegular) > 0  || count($ChVitalSignsEvotl) > 0  || count($TherapeuticGoalsTlEvo) > 0 || count($InterventionTl) > 0 || count($CifDiagnosisTlEvo) > 0 || count($TherapyConceptTl) > 0|| count($NumberMonthlySessionsTlEvo) > 0|| count($InputMaterialsUsedTl) > 0 )

                    <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                        REGULAR <br>
                    </p>
                    @endisset
             
        </div>

        <!-- Ingreso TL          -->
        <div>
            @if(count($TlTherapyLanguageRegular) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> VALORACIÓN TERAPIA DE LENGUAJE REGULAR</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @foreach($TlTherapyLanguageRegular as $ch)
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                    <b>@if(isset($ch['diagnosis'])) DIANOSTICO MÉDICO:</b> {{$ch['diagnosis']['name']}} @endisset <br/>
                    <b>@if(isset($ch['status_patient']))  ESTADO DEL PACIENTE:</b> {{$ch['status_patient']}} @endisset <br/></span>
            </p>
            @endforeach
            @endisset
        </div> 


        <!-- Rx Signos Vitales-->
        <div>
            @if(count($ChVitalSignsEvotl) > 0)
            @foreach($ChVitalSignsEvotl as $ch)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> SIGNOS VITALES </b> </span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            <br>
        
            <!-- Requeridos-->
            <div>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['created_at'])) FECHA REGISTRO: </b>{{substr($ch['created_at'],0,10) }} @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b> @if(isset($ch['created_at']))HORA REGISTRO: </b>{{substr($ch['created_at'],0,10) }} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br/>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b> @if(isset($ch['cardiac_frequency'])) FRECUENCIA CARDIACA: </b>{{$ch['cardiac_frequency']}} @endisset
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b> @if(isset($ch['respiratory_frequency'])) FRECUENCIA RESPIRATORIA: </b>{{$ch['respiratory_frequency']}} @endisset</span>
                                                
                                </p>
                            </td>
                        </tr>

                    <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['temperature'])) TEMPERATURA: </b>{{$ch['temperature']}} @endisset
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>@if(isset($ch['ch_vital_temperature'])) VIA DE TOMA: </b>{{$ch['ch_vital_temperature']['name']}} @endisset</span>
                                    <span style="font-family:Calibri; letter-spacing:4.45pt"> </span>                                    
                                </p>
                            </td>
                        </tr>
                    
                        <tr style="height:11.95pt">
                            <td>
                                <br/>
                            </td>
                        </tr>

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['oxigen_saturation'])) SATURACIÓN DE OXIGENO: </b>{{$ch['oxigen_saturation']}} @endisset</span>
                                </p>
                            </td>
                        </tr>

                        <tr style="height:11.95pt">
                            <td>
                                <br/>
                            </td>
                        </tr>

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">  <b>@if(isset($ch['size'])) TALLA: </b>{{$ch['size']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['weight'])) PESO: </b>{{$ch['weight']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['body_mass_index'])) I.M.C: </b>{{$ch['body_mass_index']}} @endisset</span>
                                </p>
                            </td>
                        </tr>

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['pressure_systolic'])) TENSIÓN ARTERIAL SISTÓLICA: </b>{{$ch['pressure_systolic']}} @endisset
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>@if(isset($ch['pressure_diastolic'])) TENSIÓN ARTERIAL DIASTÓLICA: </b>{{$ch['pressure_diastolic']}} @endisset
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['pressure_half'])) MEDIA: </b>{{$ch['pressure_half']}} @endisset</span>
                                </p>
                            </td>
                        </tr>

                    </table> 
            </div>                         
            
            <!-- Otros-->
            <div>
                    @if (isset($ch['ch_vital_neurological']) || isset($ch['ch_vital_hydration']) || 
                    isset($ch['pupil_size_left']) || isset($ch['pupil_size_right']) || isset($ch['left_reaction']) || isset($ch['right_reaction']) ||
                    isset($ch['mydriatic']) || isset($ch['normal']) || isset($ch['lazy_reaction_light']) || isset($ch['fixed_lazy_reaction']) || isset($ch['miotic_size']) ||
                    isset($ch['pulse']) || isset($ch['venous_pressure']) || isset($ch['intracranial_pressure']) || isset($ch['cerebral_perfusion_pressure']) ||
                    isset($ch['intra_abdominal']) || isset($ch['pulmonary_systolic']) || isset($ch['pulmonary_diastolic']) || isset($ch['pulmonary_half']) ||
                    isset($ch['head_circunference']) || isset($ch['abdominal_perimeter']) || isset($ch['chest_perimeter']) )

                    <br/>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_vital_neurological'])) ESTADO NEUROLÓGICO: </b>{{$ch['ch_vital_neurological']['name']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                            <tr style="height:11.95pt">
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_vital_hydration'])) ESTADO DE HIDRATACIÓN: </b>{{$ch['ch_vital_hydration']['name']}} @endisset</span>
                                </p>
                            </td>
                        </tr>   
                    </table>

                    @if(isset($ch['pupil_size_left']) || isset($ch['pupil_size_right']) || isset($ch['left_reaction']) || isset($ch['right_reaction']) ||
                    isset($ch['mydriatic']) || isset($ch['normal']) || isset($ch['lazy_reaction_light']) || isset($ch['fixed_lazy_reaction']) || isset($ch['miotic_size']) )
                    <br/>
                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> PUPILAS </b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['pupil_size_left'])) T.PUPILAR IZQUIERDO: </b>{{$ch['pupil_size_left']}} @endisset </span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">  <b>@if(isset($ch['pupil_size_right'])) T.PUPILAR DERECHO: </b>{{$ch['pupil_size_right']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['left_reaction'])) R.LUZ IZQUIERDO: </b>{{$ch['left_reaction']}} @endisset </span>  
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>@if(isset($ch['right_reaction'])) R.LUZ IZQUIERDO: </b>{{$ch['right_reaction']}} @endisset</span>
                                                
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <br/>
                            </td>
                        </tr>

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> 
                                        <b>@if(isset($ch['mydriatic'])) </b> {{$ch['mydriatic']}} @endisset
                                        <b>@if(isset($ch['normal'])) </b> {{$ch['normal']}} @endisset
                                        <b>@if(isset($ch['lazy_reaction_light'])) </b> {{$ch['lazy_reaction_light']}} @endisset
                                        <b>@if(isset($ch['fixed_lazy_reaction'])) </b> {{$ch['fixed_lazy_reaction']}} @endisset
                                        <b>@if(isset($ch['miotic_size'])) </b> {{$ch['miotic_size']}} @endisset</span>
                            </td>
                        </tr>
                    </table> 
                    @endisset

                
                    @if(isset($ch['pulse']) || isset($ch['venous_pressure']) || isset($ch['intracranial_pressure']) || isset($ch['cerebral_perfusion_pressure']) ||
                    isset($ch['intra_abdominal']))

                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> OTROS  SIGNOS VIALES</b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    <br/>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">  <b>@if(isset($ch['pulse'])) PULSO: </b>{{$ch['pulse']}} @endisset </span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['venous_pressure'])) PVC: </b>{{$ch['venous_pressure']}} @endisset </span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>@if(isset($ch['cerebral_perfusion_pressure'])) PPC: </b>{{$ch['cerebral_perfusion_pressure']}} @endisset </span> 
                                </p>
                            </td>
                        </tr>
                                                    
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['intracranial_pressure'])) PRESIÓN INTRACANEANA: </b>{{$ch['intracranial_pressure']}} @endisset </span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['intra_abdominal'])) PRESIÓN INTRAABDOMINAL: </b>{{$ch['intra_abdominal']}} @endisset </span>
                                                
                                </p>
                            </td>
                        </tr>
                    
                    </table> 

                    @endisset

                    @if(isset($ch['pulmonary_systolic']) || isset($ch['pulmonary_diastolic']) || isset($ch['pulmonary_half']))


                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> PRESIÓN ART PULMONAR </b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                    <br/>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['pulmonary_systolic'])) SISTÓLICA: </b>{{$ch['pulmonary_systolic']}} @endisset 
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['pulmonary_diastolic'])) DIASTÓLICA: </b>{{$ch['pulmonary_diastolic']}} @endisset
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['pulmonary_half'])) MEDIA: </b>{{$ch['pulmonary_half']}} @endisset</span></span>
                                </p>
                            </td>
                        </tr>

                    </table>
                    @endisset

                    @if(isset($ch['head_circunference']) || isset($ch['abdominal_perimeter']) || isset($ch['chest_perimeter']))

                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> PEDIATRÍA - PERÍMETRO </b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>         

                    <br/>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['head_circunference'])) CEFÁLICO: </b>{{$ch['head_circunference']}} @endisset
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['abdominal_perimeter'])) ABDOMINAL: </b>{{$ch['abdominal_perimeter']}} @endisset
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">  <b>@if(isset($ch['chest_perimeter'])) TORÁCICO: </b>{{$ch['chest_perimeter']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    @endisset

                    @endisset

        
                    @if(($ch['has_oxigen']) == 1 )

                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>TIENE OXÍGENO </b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>                         
                    <br/>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['ch_vital_ventilated'])) MODO VENTILATORIO: </b>{{$ch['ch_vital_ventilated'] ['name']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['oxygen_type'])) TIPO DE OXÍGENO: </b>{{$ch['oxygen_type'] ['name']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">  <b>@if(isset($ch['liters_per_minute'])) LITROS POR MINUTO: </b>{{$ch['liters_per_minute'] ['name']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b>@if(isset($ch['parameters_signs'])) PARAMETROS: </b>{{$ch['parameters_signs'] ['name']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>                           
                    @endisset


                    @endforeach
                    @endisset

            </div>
        </div>
        <!-- Objetivos Terapeuticos-->
        <div>
            @if(count($TherapeuticGoalsTlEvo) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>OBJETIVOS TERAPEUTICOS </b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
        

            <table class="tablehc">

                <tr>
                    
                    @if(isset($chrecord[0]['created_at']))
                    <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                    <th><span style="font-family:Calibri; font-size:9pt">OBJETIVOS</th>
                        @endisset
                </tr>

                @foreach($TherapeuticGoalsTlEvo as $ch)
                <tr>                        
                @if(isset($ch['created_at']))
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                    </td>
                    @endisset

                @if(isset($ch['strengthen_phonoarticulators']) || isset($ch['strengthen_tone']) || isset($ch['favor_process']) || isset($ch['strengthen_thread']) || isset($ch['favor_psycholinguistic']) ||
                isset($ch['increase_processes']) || isset($ch['strengthen_qualities']) || isset($ch['strengthen_communication']) || isset($ch['improve_skills'])  )
                <td>
                        <span style="font-family:Calibri; font-size:9pt">
                           
                            
                            @if(isset($ch['strengthen_phonoarticulators'])) {{$ch['strengthen_phonoarticulators']}} @endisset 
                           
                            
                            @if(isset($ch['strengthen_tone']))<br/>  {{$ch['strengthen_tone']}} @endisset 
                            
                            
                            @if(isset($ch['favor_process']))  <br/>{{$ch['favor_process']}} @endisset 
                       
                            
                            @if(isset($ch['strengthen_thread'])) <br/> {{$ch['strengthen_thread']}} @endisset 
                            
                            
                            @if(isset($ch['favor_psycholinguistic'])) <br/> {{$ch['favor_psycholinguistic']}} @endisset 
               
                         
                            @if(isset($ch['increase_processes'])) <br/> {{$ch['increase_processes']}} @endisset 
                           
                        
                            @if(isset($ch['strengthen_qualities'])) <br/> {{$ch['strengthen_qualities']}}@endisset  
                        
                            @if(isset($ch['strengthen_communication']))  <br/>{{$ch['strengthen_communication']}} @endisset 
                          
                            @if(isset($ch['improve_skills'])) {{$ch['improve_skills']}} @endisset 
                           
                       </span> 
                    @endisset  
                </td>              
                                        
                </tr>
                @endforeach

            </table>
           
            @endisset
        </div> 







        <!-- Intervención -->
        <div>
            @if(count($InterventionTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>INTERVENCIÓN</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            <table class="tablehc">
                <tr>
                    <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                    <th><span style="font-family:Calibri; font-size:9pt">INTERVENCIÓN</th>
                </tr>

                @foreach($InterventionTl as $ch)
                <tr>                        
                @if(isset($ch['created_at']))
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                    </td>
                    @endisset

                @if(isset($ch['text'])  )
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">
                            @if(isset($ch['text'])) {{$ch['text']}} @endisset 
                         </span> 
                    @endisset                
                                        
                </tr>
                @endforeach

            </table>


           
            @endisset
        </div> 




         <!-- Materiales Utilizados-->
         <div>
            @if(count($InputMaterialsUsedTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> MATERIALES E INSUMOS UTILIZADOS</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>


        <table class="tablehc">
            <tr>
                <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                <th><span style="font-family:Calibri; font-size:9pt">MATERIALES E INSUMOS UTILIZADOS</th>
            </tr>

            @foreach($InputMaterialsUsedTl as $ch)
            <tr>                        
            @if(isset($ch['created_at']))
                <td>
                    <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                </td>
                @endisset

            @if(isset($ch['biosecurity_elements']) || isset($ch['didactic_materials']) || isset($ch['liquid_food']) || isset($ch['stationery'])   )
                <td>
                    <span style="font-family:Calibri; font-size:9pt">
                        @if(isset($ch['biosecurity_elements'])) {{$ch['biosecurity_elements']}} @endisset 
                        @if(isset($ch['didactic_materials']))<br/>  {{$ch['didactic_materials']}} @endisset 
                        @if(isset($ch['liquid_food']))  <br/>{{$ch['liquid_food']}} @endisset 
                        @if(isset($ch['stationery'])) <br/> {{$ch['stationery']}} @endisset 
                      
                </span> 
                @endisset                
                                    
            </tr>
            @endforeach

        </table>

        @endisset
        </div> 


       
               
    
         <!-- Concepto Fonoaudiologia  -->
         <div>
            @if(count($TherapyConceptTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>CONCEPTO FONOAUDIOLOGÍA</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            
            <table class="tablehc">
                <tr>
                    <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                    <th><span style="font-family:Calibri; font-size:9pt">CONCEPTO FONOAUDIOLOGÍA</th>
                </tr>

                @foreach($TherapyConceptTl as $ch)
                <tr>                        
                @if(isset($ch['created_at']))
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                    </td>
                    @endisset

                @if(isset($ch['text'])  )
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">
                            @if(isset($ch['text'])) {{$ch['text']}} @endisset 
                         </span> 
                    @endisset                
                                        
                </tr>
                @endforeach

            </table>


           
            @endisset
        </div> 


        <!-- Diagnostico CIF-->
        <div>
            @if(count($CifDiagnosisTlEvo) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DIAGNÓSTICO CIF</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            <table class="tablehc">
                <tr>
                    <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                    <th><span style="font-family:Calibri; font-size:9pt">DIAGNÓSTICO CIF</th>
                </tr>

                @foreach($CifDiagnosisTlEvo as $ch)
                <tr>                        
                @if(isset($ch['created_at']))
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                    </td>
                    @endisset

                @if(isset($ch['text'])  )
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">
                            @if(isset($ch['text'])) {{$ch['text']}} @endisset 
                         </span> 
                    @endisset                
                                        
                </tr>
                @endforeach

            </table>


           
            @endisset
        </div> 
        
         <!-- NÚMERO DE SESIONES MENSUALES E INTENSIDAD SEMANA-->
         <div>
            @if(count($NumberMonthlySessionsTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>NÚMERO DE SESIONES MENSUALES E INTENSIDAD SEMANA</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
        

                    <table class="tablehc">

                    
                    <tr>
                        <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                        <th><span style="font-family:Calibri; font-size:9pt">SESIONES MENSUALES:</th>
                        <th><span style="font-family:Calibri; font-size:9pt">INTENSIDAD SEMANAL:</th>

                        @if(isset($chrecord[0]['recomendations']))
                        <th><span style="font-family:Calibri; font-size:9pt">RECOMENDACIONES</th>
                            @endisset



                
                     </tr>

                        @foreach($NumberMonthlySessionsTl as $ch)
                        <tr>

                           
                            <td>

                            <span style="font-family:Calibri; font-size:9pt">  {{substr($ch['created_at'],0,10) }} </span>

                            </td>
                            

                            @if(isset($ch['monthly_sessions']))
                            <td>

                            <span style="font-family:Calibri; font-size:9pt">    {{$ch['monthly_sessions']}} </span>

                            </td>
                            @endisset

                            @if(isset($ch['weekly_intensity']))
                            <td>

                            <span style="font-family:Calibri; font-size:9pt"> {{$ch['weekly_intensity']}} </span>

                            </td>

                            @endisset

                            @if(isset($chrecord[0]['recomendations']))
                            @if(isset($ch['recomendations']))
                            <td>

                            <span style="font-family:Calibri; font-size:9pt">    {{$ch['recomendations']}} </span>

                            </td>
                            @endisset
                            @endisset
    

                        </tr>
                        @endforeach
            </table>
            @endisset
        </div> 

        @endisset
    </div>


     <!-- Firma -->
<div style="display: flex">
    <div style="width: 100%">
        <br>
        <br>
        <hr />
        <span style="font-family:Calibri;font-size: 10px;"> <b>FIRMA MEDICO </b> </span>
    
        @if($firm != null)
        <p style="margin-top:15pt; margin-left:8pt; margin-bottom:0pt;">
            <span style="height:0pt;">
            
                <img src="data:image/png;base64,{{$firm}}" width="250" height="100" alt="" style=""/></span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @endisset
            <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">{{$chrecord[0]['user']['firstname']}} {{$chrecord[0]['user']['middlefirstname']}} {{$chrecord[0]['user']['lastname']}}  {{$chrecord[0]['user']['middlelastname']}}</span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">{{$chrecord[0]['user']['user_role'][0]['role']['name']}}</span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @if(count($chrecord[0]['user']['assistance']) > 0)
            <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">RM/TP: {{$chrecord[0]['user']['assistance'][0]['medical_record']}}</span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            
            
    
            @endisset   
    </div>
    
    <div style="margin-left:250pt">
        <br>
        <br>
        <hr />
        <span style="font-family:Calibri;font-size: 10px;"> <b>FIRMA A SATISFACCIÓN </b> </span>
    
        @if($firmPatient != null)
        <p style="margin-top:15pt; margin-left:30pt; margin-bottom:0pt;">
            <span style="height:0pt;">
            
                <img src="data:image/png;base64,{{$firmPatient}}" width="250" height="100" alt="" style=""/></span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @endisset
            <p style="margin-top:8.95pt; margin-left:30pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">{{$chrecord[0]['admissions']['patients']['firstname']}} {{$chrecord[0]['admissions']['patients']['middlefirstname']}} {{$chrecord[0]['admissions']['patients']['lastname']}} {{$chrecord[0]['admissions']['patients']['middlelastname']}}</span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
    </div>
    </div>
</body>

</html>
