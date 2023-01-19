<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta name="generator" content="Aspose.Words for .NET 17.1.0.0" />
    <title></title>

    <STYLE>
        .page_break {
            page-break-before: always;
        }

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
        @php
        $i = 0;
        @endphp

    @foreach ($chrecord as $tr)

        @php
        $i++;
        @endphp

        @if ($i == 1)
            <div>                
        @else
            <div class="page_break">
        @endif
    
        <div style="-aw-headerfooter-type:header-primary">
            <p style="margin-top:0pt; margin-bottom:0pt; line-height:6%; widows:0; orphans:0; font-size:10pt">
                <span style="height:0pt; display:block; position:absolute; z-index:-65546">
                    <img src="https://storage.googleapis.com/detecta/ajz5a-4q5bb.006.png" width="142" height="59"
                        alt=""
                        style="margin-top:-15.15pt; margin-left:-21pt; -aw-left-pos:15pt; -aw-rel-hpos:page; -aw-rel-vpos:page; -aw-top-pos:20.25pt; -aw-wrap-type:none; position:absolute" /></span>
                <span style="height:0pt; display:block; position:absolute; z-index:-65543">
                    <div style="float:right;">
                        <p>No de Historia Clínica: {{ $tr['admissions']['patients']['identification'] }}</p>
                        {{-- <p>Fecha de registro: {{$fecharecord}}</p> --}}
                        <p>Folio: {{ $tr['consecutive'] }}</p>
                    </div>
                </span><span style="height:0pt; display:block; position:absolute; z-index:-65545">
                    <div style="text-align: center;    margin-left: 60px;">
                        <p>HEALTH & LIFE IPS S.A.S </p>
                        <p>Avenida Cra 68 No 13-61, Bogotá. Sede Montevideo </p>
                        <p>Nit: 900900122 - 7</p>
                    </div>

                </span><span style="font-family:Tahoma">&#xa0;</span>
            </p>
        </div>

        <!-- Encabezado-->
        <div>

            <h2
                style="margin-top:70px; margin-bottom:1.9pt; widows:0; orphans:0; font-size:9pt;    background: #4472c4;
                    padding: 0.8em;font-family:Calibri;color: white;text-align: center;">
                EVOLUCIÓN HISTORIA CLINICA
            </h2>
            <hr />
            <h2 style=" text-align: center; margin-top:7.25pt; margin-bottom:1.9pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; color:#057591; background-color:#ffffff"> DATOS PERSONALES</span>
            </h2>
            <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p
                            style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> Nombre Paciente: </b></span>
                        </p>
                    </td>
                    <td style="width:203pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $tr['admissions']['patients']['firstname'] . ' ' . '' . $tr['admissions']['patients']['middlefirstname'] . ($tr['admissions']['patients']['middlefirstname'] ? ' ' : '') . '' . $tr['admissions']['patients']['lastname'] . '' . ($tr['admissions']['patients']['middlelastname'] ? ' ' : '') . $tr['admissions']['patients']['middlelastname'] }}</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri"> <b> Identificación: </b> </span>
                        </p>
                    </td>
                    <td style="width:141.6pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $tr['admissions']['patients']['identification'] ? $tr['admissions']['patients']['identification'] : 'No registra' }}</span>
                            <span
                                style="width:40pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:80.35pt">&#xa0;</span>
                        </p>
                    </td>
                </tr>
                <tr style="height:12.7pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p
                            style="margin-top:2.3pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"> <b> Fetra Nacimiento: </b> </span>
                        </p>
                    </td>
                    <td style="width:203pt; vertical-align:top">
                        <p
                            style="margin-top:0.3pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $tr['admissions']['patients']['identification'] ? substr($tr['admissions']['patients']['birthday'], 0, 10) : 'No registra' }}</span>
                            <span style="font-family:Calibri; letter-spacing:4.45pt"> </span>

                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p
                            style="margin-top:0.75pt; margin-left:45.4pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri"> <b> Estado Civil: </b> </span>
                        </p>
                    </td>
                    <td style="width:141.6pt; vertical-align:top">
                        <p
                            style="margin-top:0.75pt; margin-left:2.45pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $tr['admissions']['patients']['marital_status_id'] ? $tr['admissions']['patients']['marital_status']['name'] : 'No registra' }}</span>
                        </p>
                    </td>

                </tr>
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p
                            style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>Edad: </b></span>
                        </p>
                    </td>
                    <td style="width:203pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">{{ $tr['admissions']['patients']['age'] }} Años</span>
                        </p>
                    </td>

                    <td style="width:106pt; vertical-align:top">
                        <p
                            style="margin-top:0.75pt; margin-left:45.4pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri"> <b>Género: </b> </span>
                        </p>
                    </td>

                    <td style="width:141.6pt; vertical-align:top">
                        <p
                            style="margin-top:0.75pt; margin-left:2.45pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri; vertical-align:1pt">{{ $tr['admissions']['patients']['gender_id'] ? $tr['admissions']['patients']['gender']['name'] : 'No registra' }}</span>
                        </p>
                    </td>

                </tr>

                <tr style="height:12.7pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p
                            style="margin-top:2.3pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"> <b> Dirección: </b> </span>
                        </p>
                    </td>
                    <td style="width:203pt; vertical-align:top">
                        <p
                            style="margin-top:0.75pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $tr['admissions']['patients']['residence_address'] ? $tr['admissions']['patients']['residence_address'] : 'No registra' }}</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p
                            style="margin-top:0.75pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri"> <b> Teléfono: </b> </span>
                        </p>
                    </td>
                    <td style="width:141.6pt; vertical-align:top">
                        <p
                            style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $tr['admissions']['patients']['phone'] ? $tr['admissions']['patients']['phone'] : 'No registra' }}</span>
                        </p>
                    </td>
                </tr>
                <tr style="height:12.7pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p
                            style="margin-top:2.3pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"> <b> Municipio: </b> </span>
                        </p>
                    </td>
                    <td style="width:203pt; vertical-align:top">
                        <p
                            style="margin-top:0.75pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $tr['admissions']['patients']['residence_municipality_id'] ? $tr['admissions']['patients']['residence_municipality']['name'] : 'No registra' }}</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p
                            style="margin-top:0.75pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri"> <b> Ocupación: </b> </span>
                        </p>
                    </td>

                    <td style="width:141.6pt; vertical-align:top">
                        <p
                            style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $tr['admissions']['patients']['activities_id'] ? $tr['admissions']['patients']['activities']['name'] : 'No registra' }}</span>
                        </p>
                    </td>

                </tr>
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p
                            style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b>Pertenencia étnica: </b></span>
                        </p>
                    </td>

                    <td style="width:203pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $tr['admissions']['patients']['ethnicity_id'] ? $tr['admissions']['patients']['ethnicity']['name'] : 'No registra' }}</span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p
                            style="margin-top:0.75pt; margin-left:47.05pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri"> <b> Nivel Educativo: </b> </span>
                        </p>
                    </td>

                    <td style="width:141.6pt; vertical-align:top">
                        <p
                            style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $tr['admissions']['patients']['academic_level_id'] ? $tr['admissions']['patients']['academic_level']['name'] : 'No registra' }}</span>
                        </p>
                    </td>

                </tr>
            </table>

            <hr />

            <p
                style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">DATOS DEL INGRESO</span><span
                    style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p
                            style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> Nº Ingreso:</b></span>
                        </p>
                    </td>
                    <td style="width:203pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $tr['admissions']['consecutive'] ? $tr['admissions']['consecutive'] : 'No registra' }}
                            </span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri"> <b> Fetra: </b> </span>
                        </p>
                    </td>
                    <td style="width:141.6pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $tr['admissions']['entry_date'] ? $tr['admissions']['entry_date'] : 'No registra' }}</span>
                            <span
                                style="width:40pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:80.35pt">&#xa0;</span>
                        </p>
                    </td>
                </tr>
                <tr style="height:12.7pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p
                            style="margin-top:2.3pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"> <b>Entidad: </b> </span>
                        </p>
                    </td>
                    <td style="width:203pt; vertical-align:top">
                        <p
                            style="margin-top:0.3pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $tr['admissions']['contract']['company_id'] ? $tr['admissions']['contract']['company']['name'] : 'No registra' }}</span>
                            <span style="font-family:Calibri; letter-spacing:4.45pt"> </span>

                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p
                            style="margin-top:0.75pt; margin-left:45.4pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri"> <b> Tipo de régimen: </b> </span>
                        </p>
                    </td>
                    <td style="width:141.6pt; vertical-align:top">
                        <p
                            style="margin-top:0.75pt; margin-left:2.45pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $tr['admissions']['contract']['type_briefcase'] ? $tr['admissions']['contract']['type_briefcase']['name'] : 'No registra' }}</span>
                        </p>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Terapia Respiratoria-->
        <div>
            @if ($tr['ch_type_id'] == 5)

                <!-- INGRESO -->
                <div>
                    <hr />
                    <!-- Validación Ingreso -->
                    <div>                    
                                                   
                        @if (count($tr['ch_respiratory_therapy']) > 0  || count($tr['ch_background']) >  0 || count($tr['ch_gynecologists']) > 0  || count($tr['ch_vital_signs']) > 0 
                        || count($tr['ch_oxygen_therapy']) > 0 || count($tr['ch_therapeutic_ass']) > 0 || count($tr['ch_scale_pain']) > 0 || count($tr['ch_scale_wong_baker']) > 0 
                        || count($tr['ch_rt_inspection']) > 0 || count ($tr['ch_auscultation']) > 0)
                            <p
                                style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                                INGRESO<br>
                            </p>
                        @endisset
                    </div>

                        <!-- Valoración -->
                        <div>
                            @if (count($tr['ch_respiratory_therapy']) > 0)
                            <hr />
                            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                                <span
                                    style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">
                                    <b> VALORACIÓN </b></span>
                                <span
                                    style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>
                            @endisset

                            @foreach ($tr['ch_respiratory_therapy'] as $ch)
                        
                            @if($ch['type_record_id'] == 1)     
                              
                                <p
                                    style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt">
                                        <b>
                                            @if (isset($ch['created_at']))FECHA:</b>{{ (new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format('Y-m-d H:i:s') }} @endisset 
                                    </span>
                                </p>
                                <p
                                    style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt">
                                        <b>
                                            @if (isset($ch['medical_diagnosis']))DIAGNÓSTICO MÉDICO:</b> {{ $ch['medical_diagnosis']['code'] }} - {{ $ch['medical_diagnosis']['name'] }} @endisset
                                    </span>
                                </p>
                                
                                <p
                                    style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if (isset($ch['therapeutic_diagnosis']))DIAGNÓSTICO TERÁPEUTICO CIF:</b> {{ $ch['therapeutic_diagnosis'] }} @endisset
                                    </span>
                                </p>
                        
                                <p
                                    style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if (isset($ch['reason_consultation']))MOTIVO DE CONSULTA:</b> {{ $ch['reason_consultation'] }} @endisset
                                    </span>
                                </p>
       
                            
                            @endisset
                            @endforeach
                        </div>

                        <!-- Antecedentes -->
                        <div>
                            <!-- Generales -->
                            <div>

                                @php
                                $a = 0;
                                @endphp
                               
                                @if(count($tr['ch_background']) > 0 )
                                                       
                                @foreach($tr['ch_background'] as $ch)
                                @if($ch['type_record_id'] == 1)

                                @php
                                $a++;
                                @endphp
                        
                                @if ($a == 1)
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
                                    <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</span></th>
                                </tr>                                       
                                @endif                               
                        
                                <tr>
                                
                                    @if(isset($ch['created_at']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}}</span>
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
                
                                    @if(isset($ch['observation']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['observation']}}</span>
                                    </td>
                                    @endisset
                                
                                </tr>
                                @endisset
                                @endforeach
                
                                </table>
                                @endisset
                            </div>
                
                            <!-- Gineco -->
                            <div>
                                @php
                                $g = 0;
                                @endphp

                                @if(count($tr['ch_gynecologists']) > 0)

                                @foreach($tr['ch_gynecologists'] as $ch)
                                @if($ch['type_record_id'] == 1)

                                @php
                                $g++;
                                @endphp
                        
                                @if ($g == 1)
                
                                <hr />
                
                                <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ANTECEDENTES GINECOOBSTÉTRICOS</span>
                                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                                </p>
                                @endif 

                                <p style="margin-top:10pt; margin-left:8pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
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
                
                                @endisset
                                @endforeach
                                @endisset
                            </div>
                
                        </div>

                        <!-- Rx Signos Vitales-->
                        <div>

                            @php
                            $s = 0;
                            @endphp

                            @if(count($tr['ch_vital_signs']) > 0)
                            @foreach($tr['ch_vital_signs'] as $ch)
                            @if($ch['type_record_id'] == 1)

                            @php
                            $s++;
                            @endphp

                            @if ($s == 1)

                            <hr />

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> SIGNOS VITALES </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>
                            <br>

                            @endif  

                            <!-- Requeridos-->
                            <div>
                                <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                                    <tr style="height:11.95pt">
                                        <td style="width:79.75pt; vertical-align:top">
                                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['created_at'])) FECHA REGISTRO: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset</span>
                                            </p>
                                        </td>
                                        <td style="width:106pt; vertical-align:top">
                                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                <span style="font-family:Calibri"><b> @if(isset($ch['clock']))HORA REGISTRO: </b>{{$ch['clock']}} @endisset</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="height:11.95pt">
                                        <td style="width:79.75pt; vertical-align:top">
                                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['cardiac_frequency'])) FRECUENCIA CARDIACA: </b>{{$ch['cardiac_frequency']}} @endisset
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
                                                <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['temperature'])) TEMPERATURA: </b>{{$ch['temperature']}} °C @endisset </span>
                                            </p>
                                        </td>
                                        <td style="width:106pt; vertical-align:top">
                                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                <span style="font-family:Calibri"><b>@if(isset($ch['ch_vital_temperature'])) VIA DE TOMA: </b>{{$ch['ch_vital_temperature']['name']}} @endisset</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="height:11.95pt">
                                        <td style="width:79.75pt; vertical-align:top">
                                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['oxigen_saturation'])) SATURACIÓN DE OXIGENO: </b>{{$ch['oxigen_saturation']}} % @endisset</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="height:11.95pt">
                                        <td style="width:79.75pt; vertical-align:top">
                                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['size'])) TALLA: </b>{{$ch['size']}} cm @endisset</span>
                                            </p>
                                        </td>
                                        <td style="width:106pt; vertical-align:top">
                                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                <span style="font-family:Calibri"> <b>@if(isset($ch['weight'])) PESO: </b>{{$ch['weight']}} Kg @endisset</span>
                                            </p>
                                        </td>
                                        <td style="width:106pt; vertical-align:top">
                                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                <span style="font-family:Calibri"> <b>@if(isset($ch['body_mass_index'])) I.M.C: </b>{{$ch['body_mass_index']}} Kg/m2 @endisset</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="height:11.95pt">
                                        <td style="width:79.75pt; vertical-align:top">
                                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['pressure_systolic']) && isset($ch['pressure_diastolic'])) TENSIÓN ARTERIAL </b>{{$ch['pressure_systolic']}} / {{$ch['pressure_diastolic']}} mmHg @endisset
                                            </p>
                                        </td>
                                        <td style="width:106pt; vertical-align:top">
                                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                <span style="font-family:Calibri"> <b>@if(isset($ch['pressure_half'])) MEDIA: </b>{{$ch['pressure_half']}} mmHg @endisset</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="height:11.95pt">
                                        <td style="width:79.75pt; vertical-align:top">
                                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_vital_neurological'])) ESTADO NEUROLÓGICO: </b>{{$ch['ch_vital_neurological']['name']}} @endisset</span>
                                            </p>
                                        </td> 
                                        <td style="width:106pt; vertical-align:top">
                                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                <span style="font-family:Calibri"><b>@if(isset($ch['ch_vital_hydration'])) ESTADO DE HIDRATACIÓN: </b>{{$ch['ch_vital_hydration']['name']}} @endisset</span>
                                            </p>
                                        </td>
                                    </tr>   
                                </table> 
                            </div>                         

                            <!-- Otros-->
                            <div>
                                    @if (isset($ch['pupil_size_left']) || isset($ch['pupil_size_right']) || isset($ch['left_reaction']) || isset($ch['right_reaction']) ||
                                    isset($ch['mydriatic']) || isset($ch['normal']) || isset($ch['lazy_reaction_light']) || isset($ch['fixed_lazy_reaction']) || isset($ch['miotic_size']) ||
                                    isset($ch['pulse']) || isset($ch['venous_pressure']) || isset($ch['intracranial_pressure']) || isset($ch['cerebral_perfusion_pressure']) ||
                                    isset($ch['intra_abdominal']) || isset($ch['pulmonary_systolic']) || isset($ch['pulmonary_diastolic']) || isset($ch['pulmonary_half']) ||
                                    isset($ch['head_circunference']) || isset($ch['abdominal_perimeter']) || isset($ch['chest_perimeter']) )

                                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                                    
                                    </table>

                                    @if(isset($ch['pupil_size_left']) || isset($ch['pupil_size_right']) || isset($ch['left_reaction']) || isset($ch['right_reaction']) ||
                                    isset($ch['mydriatic']) || isset($ch['normal']) || isset($ch['lazy_reaction_light']) || isset($ch['fixed_lazy_reaction']) || isset($ch['miotic_size']) )
                                
                                    <p style=" text-align: left; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
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
                                                        @if(isset($ch['mydriatic']))  {{$ch['mydriatic']}} @endisset
                                                        @if(isset($ch['normal']))  {{$ch['normal']}} @endisset
                                                        @if(isset($ch['lazy_reaction_light'])) {{$ch['lazy_reaction_light']}} @endisset
                                                        @if(isset($ch['fixed_lazy_reaction'])){{$ch['fixed_lazy_reaction']}} @endisset
                                                        @if(isset($ch['miotic_size'])) {{$ch['miotic_size']}} @endisset</span>
                                                </p>
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

                                    <p style=" text-align: left; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> PRESIÓN ART PULMONAR </b> </span>
                                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                                    </p>
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

                                    <p style=" text-align: left; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> PEDIATRÍA - PERÍMETRO </b> </span>
                                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                                    </p>       
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
                                    
                                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt">
                                            <b>@if(isset($ch['observations_vital_ventilated'])) OBSERVACIÓN MODO VENTILATORIO: </b> {{$ch['observations_vital_ventilated']}} @endisset</span>
                                    </p>
                                    
                                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt">
                                            <b>@if(isset($ch['observations_parameters_signs'])) OBSERVACIÓN PARAMETROS: </b> {{$ch['observations_parameters_signs']}} @endisset</span>
                                    </p>
                                    @endisset


                                @endisset
                                @endforeach
                                @endisset

                            </div>

                        </div>

                        <!-- Destete de oxigeno -->
                        <div>
                            @php
                            $d = 0;
                            @endphp

                            @if(count($tr['ch_oxygen_therapy']) > 0)
                            @foreach($tr['ch_oxygen_therapy'] as $ch)
                            @if($ch['type_record_id'] == 1)

                            @php
                            $d++;
                            @endphp

                            @if ($d == 1)
                        
                                <hr />

                                <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DESTETE DE OXÍGENO </b></span>
                                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                                </p>

                                <table class="tablehc">
                                    <tr>
                                        <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                                        <th><span style="font-family:Calibri; font-size:9pt">DESTETE DE OXIGENO</th>
                                        <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</th>
                                    </tr>
                            
                            @endif   
                                                       
                                    <tr>                        
                                        @if(isset($ch['created_at']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}}</span>
                                        </td>
                                        @endisset
                    
                                        @if(isset($ch['revision']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{$ch['revision']}} </span>
                                        </td>
                                        @endisset
                    
                                        @if(isset($ch['observation']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{$ch['observation']}}</span>
                                        </td>
                                        @endisset       
                                    </tr>                                 
                    
                                    @endisset
                                    @endforeach
                                </table>                   

                         
                            @endisset
                        </div>

                        <!-- Valoración Terápeutica -->
                        <div>
                            @if(count($tr['ch_therapeutic_ass']) > 0)
                            
                                <hr />

                                <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> VALORACIÓN TERÁPEUTICA</b></span>
                                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                                </p>
                                @endisset

                            
                                @foreach($tr['ch_therapeutic_ass'] as $ch)
                                @if($ch['type_record_id'] == 1)  
                                
                                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:9pt">
                                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                                    </p>                    
                                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:9pt"><b> @if(isset($ch['ch_ass_signs'])) SIGNOS DE DIFICULTAD RESPIRATORIA </b> @endisset </span>
                                        <br/>
                                        @if(isset($ch['ch_ass_signs']))
                                        <span style="font-family:Calibri; font-size:8pt">
                                            {{$ch['ch_ass_signs'] ['fluter']}}    {{$ch['ch_ass_signs'] ['distal']}}   {{$ch['ch_ass_signs'] ['widespread']}}
                                            {{$ch['ch_ass_signs'] ['peribucal']}}   {{$ch['ch_ass_signs'] ['periorbitary']}}   {{$ch['ch_ass_signs'] ['none']}}
                                            {{$ch['ch_ass_signs'] ['intercostal']}}   {{$ch['ch_ass_signs'] ['aupraclavicular']}} 
                                        </span>
                                        @endisset
                                        </span>
                                    </p>
                                    <br/>
                                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                                        <tr style="height:11.95pt">
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['ch_ass_pattern'])) PATRÓN RESPIRATORIO </b> @endisset</span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri">@if(isset($ch['ch_ass_pattern'])){{$ch['ch_ass_pattern'] ['name']}} @endisset</span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['ch_ass_swing'])) RITMO RESPIRACIÓN (Inspiración/Expiración)</b>@endisset</span>
                                                                    
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri">@if(isset($ch['ch_ass_swing'])){{$ch['ch_ass_swing']['name']}} @endisset</span>            
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="height:11.95pt">
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['ch_ass_frequency'])) FRECUENCIA RESPIRATORIA </b> @endisset</span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri">@if(isset($ch['ch_ass_frequency'])){{$ch['ch_ass_frequency']['name']}} @endisset</span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_ass_mode'])) MODO VENTILATORIO </b> @endisset</span>
                                                                    
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri">@if(isset($ch['ch_ass_mode'])) {{$ch['ch_ass_mode']['name']}} @endisset </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="height:11.95pt">
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['ch_ass_cough'])) TOS </b> @endisset </span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri">@if(isset($ch['ch_ass_cough'])){{$ch['ch_ass_cough']['name']}} @endisset </span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['ch_ass_chest_type'])) TIPO DE TORAX </b> @endisset </span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri">@if(isset($ch['ch_ass_chest_type'])){{$ch['ch_ass_chest_type']['name']}}  @endisset</span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="height:11.95pt">
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['ch_ass_chest_symmetry'])) SIMETRIA TORAX </b> @endisset</span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri">@if(isset($ch['ch_ass_chest_symmetry'])) {{$ch['ch_ass_chest_symmetry']['name']}} @endisset</span>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>  
                                @endisset
                                @endforeach
                                
                        </div>

                        <!-- Inspección -->
                        <div>   

                            <!-- Escala de Dolor Adulto-->
                            <div>

                                @if(count($tr['ch_scale_pain']) > 0 )
                                
                                <hr />
                                
                                <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA DE DOLOR</span>
                                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                                </p>

                                <table class="tablehc">
                                    <tr>
                                        <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                                        <th><span style="font-family:Calibri; font-size:9pt">PUNTAJE</th>
                                        <th><span style="font-family:Calibri; font-size:9pt">DETALLE</th>
                                    </tr>

                                    @foreach($tr['ch_scale_pain'] as $ch)
                                    <tr>                        
                                    @if(isset($ch['created_at']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}}</span>
                                        </td>
                                        @endisset

                                    @if(isset($ch['range_value']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{$ch['range_value']}} </span>
                                        </td>
                                        @endisset

                                    @if(isset($ch['range_title']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{$ch['range_title']}}</span>
                                        </td>
                                        @endisset
                                                            
                                    </tr>
                                    @endforeach

                                </table>         

                                @endisset
                            </div>

                            <!-- Escala de Dolor Pediatrico-->
                            <div>
                                    @if(count($tr['ch_scale_wong_baker']) > 0 )
                                    
                                    <hr />
                                    
                                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA DE DOLOR PEDIATRICO</span>
                                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                                    </p>

                                    <table class="tablehc">
                                        <tr>
                                            <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                                            <th><span style="font-family:Calibri; font-size:9pt">PUNTAJE</th>
                                            <th><span style="font-family:Calibri; font-size:9pt">DETALLE</th>
                                        </tr>

                                        @foreach($tr['ch_scale_wong_baker'] as $ch)
                                        <tr>                        
                                        @if(isset($ch['created_at']))
                                            <td>
                                                <span style="font-family:Calibri; font-size:9pt">{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}}</span>
                                            </td>
                                            @endisset

                                        @if(isset($ch['pain_value']))
                                            <td>
                                                <span style="font-family:Calibri; font-size:9pt">{{$ch['pain_value']}} </span>
                                            </td>
                                            @endisset

                                        @if(isset($ch['pain_title']))
                                            <td>
                                                <span style="font-family:Calibri; font-size:9pt">{{$ch['pain_title']}}</span>
                                            </td>
                                            @endisset
                                                                
                                        </tr>
                                        @endforeach

                                    </table>         

                                @endisset
                            </div>

                            <!-- Inspección-->
                            <div>
                                @if(count($tr['ch_rt_inspection']) > 0)
                                    <hr />

                                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> INSPECCIÓN </b></span>
                                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                                    </p>
                                @endisset

                                @foreach($tr['ch_rt_inspection'] as $ch)
                                @if($ch['type_record_id'] == 1)  

                                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:9pt">
                                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                                    </p>
                                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                                        <tr style="height:11.95pt">
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['expansion'])) EXPANSIÓN TORÁXICA </b> @endisset</span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri">@if(isset($ch['expansion'])){{$ch['expansion']}} @endisset</span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['crepitations'])) CREPITACIONES</b> @endisset</span>
                                                                    
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri">@if(isset($ch['crepitations'])){{$ch['crepitations']}} @endisset</span>
                                                                    
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="height:11.95pt">
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['airway'])) VIA AEREA ARTIFICAL </b> @endisset</span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri">@if(isset($ch['airway'])) {{$ch['airway']}} @endisset</span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="height:11.95pt">
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['masses'])) MASAS</b>@endisset</span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri">@if(isset($ch['masses'])) {{$ch['masses']}} @endisset</span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['detail_masses'])) OBSERVACIÓN MASAS</b> @endisset</span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri"> @if(isset($ch['detail_masses'])) {{$ch['detail_masses']}} @endisset</span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="height:11.95pt">
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['fracturues'])) FRACTURAS</b> @endisset</span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri"> @if(isset($ch['fracturues'])) {{$ch['fracturues']}} @endisset</span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['detail_fracturues'])) OBSERVACIÓN FRACTURAS</b> @endisset</span>
                                                </p>
                                            </td>
                                            <td style="width:100pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri">@if(isset($ch['detail_fracturues'])) {{$ch['detail_fracturues']}} @endisset</span>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>  
                                    <br/>
                                @endisset
                                @endforeach


                
                            </div>

                            <!-- Auscultación -->
                            <div>
                                @php
                                $aus = 0;
                                @endphp

                                @if(count($tr['ch_auscultation']) > 0)
                                @foreach($tr['ch_auscultation'] as $ch)
                                @if($ch['type_record_id'] == 1)

                                @php
                                $aus++;
                                @endphp

                                
                                @if ($aus == 1)

                                <hr />

                                <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">AUSCULTACIÓN</span>
                                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                                </p>

                                <table class="tablehc">
                                    <tr>
                                        <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                                        <th><span style="font-family:Calibri; font-size:9pt">AUSCULTACIÓN</th>
                                        <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</th>
                                    </tr>
                                
                                @endif   
                                   
                                    <tr>                        
                                    @if(isset($ch['created_at']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}}</span>
                                        </td>
                                        @endisset

                                    @if(isset($ch['auscultation']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{$ch['auscultation']}} </span>
                                        </td>
                                        @endisset

                                    @if(isset($ch['observation']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{$ch['observation']}}</span>
                                        </td>
                                        @endisset
                                                            
                                    </tr>
                                    @endisset
                                    @endforeach

                                </table>         

                                @endisset
                            </div>

                            <!-- Ayudas diagnósticas -->
                            <div>
                                @php
                                $ad = 0;
                                @endphp

                                @if(count($tr['ch_diagnostic_aids']) > 0)
                                @foreach($tr['ch_diagnostic_aids'] as $ch)
                                @if($ch['type_record_id'] == 1)

                                @php
                                $ad++;
                                @endphp

                                @if ($ad == 1)

                                <hr />

                                <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">AYUDAS DIAGNÓSTICAS</span>
                                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                                </p>

                                <table class="tablehc">
                                    <tr>
                                        <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                                        <th><span style="font-family:Calibri; font-size:9pt">PARACLÍNICOS</th>
                                        <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</th>
                                    </tr>
                                
                                @endif   
                                
                                <tr>                        
                                    @if(isset($ch['created_at']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}}</span>
                                        </td>
                                        @endisset

                                    @if(isset($ch['paraclinical']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{$ch['paraclinical']}} </span>
                                        </td>
                                        @endisset

                                    @if(isset($ch['observation']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{$ch['observation']}}</span>
                                        </td>
                                        @endisset
                                                            
                                    </tr>
                                    @endisset
                                    @endforeach

                                </table>         

                                @endisset
                            </div>

                        </div>

                        <!-- Objetivos -->
                        <div>
                            @php
                            $ob = 0;
                            @endphp

                            @if(count($tr['ch_objectives_therapy']) > 0)
                            @foreach($tr['ch_objectives_therapy'] as $ch)
                            @if($ch['type_record_id'] == 1)

                            @php
                            $ob++;
                            @endphp

                            @if ($ob == 1)

                            <hr />

                            <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">OBJETIVOS TERÁPEUTICOS</span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            <table class="tablehc">
                                <tr>
                                    <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                                    <th><span style="font-family:Calibri; font-size:9pt">OBJETIVOS</th>
                                </tr>

                            @endif
                                <tr>                        
                                @if(isset($ch['created_at']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}}</span>
                                    </td>
                                    @endisset

                                @if(isset($ch['strengthen']) || isset($ch['promote']) || isset($ch['title']) || isset($ch['improve']) || isset($ch['re_education']) ||
                                isset($ch['hold']) || isset($ch['check']) || isset($ch['train']) || isset($ch['headline']) || isset($ch['look_out']) )
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">
                                            @if(isset($ch['strengthen'])) {{$ch['strengthen']}} @endisset 
                                            @if(isset($ch['promote']))<br/>  {{$ch['promote']}} @endisset 
                                            @if(isset($ch['title']))  <br/>{{$ch['title']}} @endisset 
                                            @if(isset($ch['improve'])) <br/> {{$ch['improve']}} @endisset 
                                            @if(isset($ch['re_education'])) <br/> {{$ch['re_education']}} @endisset 
                                            @if(isset($ch['hold'])) <br/> {{$ch['hold']}} @endisset 
                                            @if(isset($ch['check'])) <br/> {{$ch['check']}}@endisset  
                                            @if(isset($ch['train']))  <br/>{{$ch['train']}} @endisset 
                                            @if(isset($ch['headline'])) <br/> {{$ch['headline']}} @endisset 
                                            @if(isset($ch['look_out'])) <br/>  {{$ch['look_out']}} @endisset <br/></span> 
                                    @endisset                
                                                        
                                </tr>
                                @endisset
                                @endforeach

                            </table>         

                            @endisset
                        </div>

                        <!-- Sesiones -->
                        <div>
                            @php
                            $se = 0;
                            @endphp

                            @if(count($tr['ch_rt_sessions']) > 0)
                            @foreach($tr['ch_rt_sessions'] as $ch)
                            @if($ch['type_record_id'] == 1)

                            @php
                            $se++;
                            @endphp

                            @if ($se == 1)

                            <hr />

                            <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">SESIONES</span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            <table class="tablehc">
                                <tr>
                                    <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                                    <th><span style="font-family:Calibri; font-size:9pt">SESIONES MENSUALES</th>
                                    <th><span style="font-family:Calibri; font-size:9pt">INTENSIDAD SEMANAL</th>
                                    <th><span style="font-family:Calibri; font-size:9pt">FRECUENCIA</th>
                                    <th><span style="font-family:Calibri; font-size:9pt">RECOMENDACIONES</th>
                                </tr>
                            
                            @endif 
                               
                                <tr>                        
                                @if(isset($ch['created_at']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}}</span>
                                    </td>
                                    @endisset

                                @if(isset($ch['month']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['month']}} </span>
                                    </td>
                                    @endisset

                                @if(isset($ch['week']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['week']}}</span>
                                    </td>
                                    @endisset

                                @if(isset($ch['frequency_id']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['frequency']['name']}}</span>
                                    </td>
                                    @endisset

                                @if(isset($ch['recommendations']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['recommendations']}}</span>
                                    </td>
                                    @endisset
                                                        
                                </tr>
                                @endisset
                                @endforeach

                            </table>         

                            @endisset
                        </div>
                </div> 

                <!-- REGULAR -->
                <div>
                    <!-- Validación Regular -->
                    <div>
                        @if(count($tr['ch_respiratory_therapy']) > 0 || count($tr['ch_background']) > 0 || count($tr['ch_gynecologists']) > 0 || count($tr['ch_vital_signs']) > 0
                        || count($tr['ch_oxygen_therapy']) > 0 || count($tr['ch_rt_sessions']) > 0 || count($tr['ch_ps_intervention']) > 0 || count($tr['ch_recommendations_evo']) > 0
                        || count($tr['disclaimer']) > 0 )
                        
                        <hr/>
                        <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                            REGULAR<br>
                        </p>
                        @endisset
                    </div>

                    <!-- Valoración -->
                    <div>
                        @if (count($tr['ch_respiratory_therapy']) > 0)
                        <hr />
                        <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                            <span
                                style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">
                                <b> VALORACIÓN </b></span>
                            <span
                                style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>
                        @endisset

                        @foreach ($tr['ch_respiratory_therapy'] as $ch)
                    
                        @if($ch['type_record_id'] == 3)     
                          
                            <p
                                style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>
                                        @if (isset($ch['created_at']))FECHA:</b>{{ (new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format('Y-m-d H:i:s') }} @endisset 
                                </span>
                            </p>
                            <p
                                style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                    <b>
                                        @if (isset($ch['medical_diagnosis']))DIAGNÓSTICO MÉDICO:</b> {{ $ch['medical_diagnosis']['code'] }} - {{ $ch['medical_diagnosis']['name'] }} @endisset
                                </span>
                            </p>
                            
                            <p
                                style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b>@if (isset($ch['therapeutic_diagnosis']))DIAGNÓSTICO TERÁPEUTICO CIF:</b> {{ $ch['therapeutic_diagnosis'] }} @endisset
                                </span>
                            </p>
                    
                            <p
                                style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b>@if (isset($ch['reason_consultation']))MOTIVO DE CONSULTA:</b> {{ $ch['reason_consultation'] }} @endisset
                                </span>
                            </p>
   
                        
                        @endisset
                        @endforeach
                    </div>

                    <!-- Antecedentes -->
                    <div>
                        <!-- Generales -->
                        <div>

                            @php
                            $a = 0;
                            @endphp
                           
                            @if(count($tr['ch_background']) > 0 )
                                                   
                            @foreach($tr['ch_background'] as $ch)
                            @if($ch['type_record_id'] == 3)

                            @php
                            $a++;
                            @endphp
                    
                            @if ($a == 1)
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
                                <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</span></th>
                            </tr>                                       
                            @endif                               
                    
                            <tr>
                            
                                @if(isset($ch['created_at']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}}</span>
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
            
                                @if(isset($ch['observation']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{$ch['observation']}}</span>
                                </td>
                                @endisset
                            
                            </tr>
                            @endisset
                            @endforeach
            
                            </table>
                            @endisset
                        </div>
            
                        <!-- Gineco -->
                        <div>
                            @php
                            $g = 0;
                            @endphp

                            @if(count($tr['ch_gynecologists']) > 0)

                            @foreach($tr['ch_gynecologists'] as $ch)
                            @if($ch['type_record_id'] == 3)

                            @php
                            $g++;
                            @endphp
                    
                            @if ($g == 1)
            
                            <hr />
            
                            <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ANTECEDENTES GINECOOBSTÉTRICOS</span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>
                            @endif 

                            <p style="margin-top:10pt; margin-left:8pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
                                <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
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
            
                            @endisset
                            @endforeach
                            @endisset
                        </div>
            
                    </div>

                    <!-- Destete de oxigeno -->
                    <div>
                        @php
                        $d = 0;
                        @endphp

                        @if(count($tr['ch_oxygen_therapy']) > 0)
                        @foreach($tr['ch_oxygen_therapy'] as $ch)
                        @if($ch['type_record_id'] == 3)

                        @php
                        $d++;
                        @endphp

                        @if ($d == 1)
                    
                            <hr />

                            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DESTETE DE OXÍGENO </b></span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            <table class="tablehc">
                                <tr>
                                    <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                                    <th><span style="font-family:Calibri; font-size:9pt">DESTETE DE OXIGENO</th>
                                    <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</th>
                                </tr>
                        
                        @endif   
                                                   
                                <tr>                        
                                    @if(isset($ch['created_at']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}}</span>
                                    </td>
                                    @endisset
                
                                    @if(isset($ch['revision']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['revision']}} </span>
                                    </td>
                                    @endisset
                
                                    @if(isset($ch['observation']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['observation']}}</span>
                                    </td>
                                    @endisset       
                                </tr>                                 
                
                                @endisset
                                @endforeach
                            </table>                   

                     
                        @endisset
                    </div>

                    <!-- Sesiones -->
                    <div>
                        @php
                        $se = 0;
                        @endphp

                        @if(count($tr['ch_rt_sessions']) > 0)
                        @foreach($tr['ch_rt_sessions'] as $ch)
                        @if($ch['type_record_id'] == 3)

                        @php
                        $se++;
                        @endphp

                        @if ($se == 1)

                        <hr />

                        <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">SESIONES</span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>

                        <table class="tablehc">
                            <tr>
                                <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                                <th><span style="font-family:Calibri; font-size:9pt">SESIONES MENSUALES</th>
                                <th><span style="font-family:Calibri; font-size:9pt">INTENSIDAD SEMANAL</th>
                                <th><span style="font-family:Calibri; font-size:9pt">FRECUENCIA</th>
                                <th><span style="font-family:Calibri; font-size:9pt">RECOMENDACIONES</th>
                            </tr>
                        
                        @endif 
                           
                            <tr>                        
                            @if(isset($ch['created_at']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}}</span>
                                </td>
                                @endisset

                            @if(isset($ch['month']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{$ch['month']}} </span>
                                </td>
                                @endisset

                            @if(isset($ch['week']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{$ch['week']}}</span>
                                </td>
                                @endisset

                            @if(isset($ch['frequency_id']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{$ch['frequency']['name']}}</span>
                                </td>
                                @endisset

                            @if(isset($ch['recommendations']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{$ch['recommendations']}}</span>
                                </td>
                                @endisset
                                                    
                            </tr>
                            @endisset
                            @endforeach

                        </table>         

                        @endisset
                    </div>

                    <!-- Intervención -->
                    <div>

                        @if(count($tr['ch_ps_intervention']) > 0)

                        <hr />

                        <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">INTERVENCIÓN</span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>


                        @foreach($tr['ch_ps_intervention'] as $ch)

                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset <br/>
                            <b>@if(isset($ch['assessment'])) ANÁLISIS Y PLAN DE TRATAMIENTO: </b>{{$ch['assessment']}} @endisset </span> 
                        </p>

                                    
                        @endforeach
                        @endisset
                        
                    </div> 

                    <!-- Recomendaciones -->
                    <div>
                        @if(count($tr['ch_recommendations_evo']) > 0)


                        <hr />

                        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> RECOMENDACIONES </b> </span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>

                        @foreach($tr['ch_recommendations_evo'] as $ch)
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style=" text-align: justify; font-family:Calibri; font-size:9pt">
                                <b>@if(isset($ch['created_at'])) FECHA: </b> {{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset <br/>
                                <b>@if(isset($ch['recommendations_evo'])) RECOMENDACION: </b> {{$ch['recommendations_evo']['name']}} @endisset <br/>
                                <b>@if(isset($ch['patient_family_education'])) DESCRIPCIÓN : </b> {{$ch['patient_family_education']}} @endisset <br/>
                                <b>@if(isset($ch['observations'])) OBSERVACIÓN : </b> {{$ch['observations']}} @endisset</span>
                        </p>
                        @endforeach
                        
                        @endisset

                    </div>

                    <!-- NOTA ACLARATORIA -->
                    <div>

                        @if (count($tr['disclaimer']) > 0)

                            <hr />
                            <p
                                style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                                NOTA ACLARATORIA<br>
                            </p>
                            
                            <hr />

                            @foreach ($tr['disclaimer'] as $ch)
                                <p
                                    style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt">
                                    <b> @if (isset($ch['created_at'])) FECHA:</b>{{ mb_substr($ch['created_at'], 0, 10) }} @endisset
                                    <br />
                                    <b> @if (isset($ch['observation'])) NOTA ACLARATORIA:</b> {{ $ch['observation'] }} @endisset
                                    </span>
                                </p>
                            @endforeach

                        @endisset
                    </div>
                </div>

            @endisset
        </div>

<!-- Firma -->
<div>
            <hr />
        <br>
        <br>
        <table>

            <tr style="height:11.95pt">
                <td style="width:130pt; vertical-align:top">
            <div>
                <span style="font-family:Calibri;font-size: 10px;"> <b>FIRMA PERSONAL ASISTENCIAL</b> </span>
    @php
                        if(count($tr['user']['assistance'])>0){
                $rutaImagen = storage_path('app/public/' . $tr['user']['assistance'][0]['file_firm']);

            $contenidoBinario = file_get_contents($rutaImagen);
            $firm = base64_encode($contenidoBinario);
        
    } else {
        $firm = null;
    }
    @endphp
                @if($firm != null)
                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                    <span style="height:0pt;">
                    
                        <img src="data:image/png;base64,{{$firm}}" width="250" height="100" alt="" style=""/></span>
                        <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                    @endisset
                    <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">{{$tr['user']['firstname']}} {{$tr['user']['middlefirstname']}} {{$tr['user']['lastname']}}  {{$tr['user']['middlelastname']}}</span>
                        <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                    <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">{{$tr['user']['user_role'][0]['role']['name']}}</span>
                        <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                    @if(count($tr['user']['assistance']) > 0)
                    <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">RM/TP: {{$tr['user']['assistance'][0]['medical_record']}}</span>
                        <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                    
                    
            
                    @endisset   
            </div>
        </td>

    @php
            if($tr['firm_file']){
                $rutaImagen = storage_path('app/public/' . $tr['firm_file']);

            $contenidoBinario = file_get_contents($rutaImagen);
            $firmPatient = base64_encode($contenidoBinario);
        
    } else {
        $firmPatient = null;
    }
    @endphp

        <td style="margin-left:50px;width:130pt; vertical-align:top">
            <div style="">
                @if($tr['ch_interconsultation_id'] == null )
                <span style="font-family:Calibri;font-size: 10px;"> <b>FIRMA A SATISFACCIÓN DEL PACIENTE / RESPONSABLE / ACUDIENTE / CUIDADOR</b> </span>
            
                @if($firmPatient != null)
                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                    <span style="height:0pt;">
                    
                        <img src="data:image/png;base64,{{$firmPatient}}" width="250" height="100" alt="" style=""/></span>
                        <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                    @endisset
                    <p style="margin-top:8.95pt; margin-left:30pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">{{$tr['admissions']['patients']['firstname']}} {{$tr['admissions']['patients']['middlefirstname']}} {{$tr['admissions']['patients']['lastname']}} {{$tr['admissions']['patients']['middlelastname']}}</span>
                        <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>
                @endisset
            </div>

        </td>
        </tr>
        </table>
            
</div>

        
    </div>
    @endforeach

</body>

</html>
