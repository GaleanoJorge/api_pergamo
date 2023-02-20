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
                        <p>Fecha de registro: {{$fecharecord}}</p>
                        <p>Folio: {{$chrecord[0]['consecutive']}}</p>
                    </div>
                </span><span style="height:0pt; display:block; position:absolute; z-index:-65545">
                    <div style="text-align: center;    margin-left: 60px;">
                        <p>HEALTH & LIFE IPS S.A.S </p>
                        <p style="font-size:9px">{{$chrecord[0]["admissions"]["campus"]["address"]}}, {{$chrecord[0]["admissions"]["campus"]["region"]["name"]}}, {{$chrecord[0]["admissions"]["campus"]["name"]}}</p>
                        <p>Nit: 900900122 - 7</p>
                    </div>

                </span><span style="font-family:Tahoma">&#xa0;</span>
            </p>
        </div>

<!-- Encabezado-->
<div>
        
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
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['firstname'] . ' ' . '' . $chrecord[0]['admissions']['patients']['middlefirstname'] . ($chrecord[0]['admissions']['patients']['middlefirstname'] ? ' ' : '') . '' . $chrecord[0]['admissions']['patients']['lastname'] . '' . ($chrecord[0]['admissions']['patients']['middlelastname'] ? ' ' : '') . $chrecord[0]['admissions']['patients']['middlelastname']}}</span>
                </p>
            </td>
            <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri"> <b> Identificación: </b> </span>
                </p>
            </td>
            <td style="width:141.6pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['identification'] ? $chrecord[0]['admissions']['patients']['identification'] : 'No registra'}}</span>
                    <span style="width:40pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:80.35pt">&#xa0;</span>
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
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['identification'] ? substr($chrecord[0]['admissions']['patients']['birthday'],0,10) : 'No registra'}}</span>
                    <span style="font-family:Calibri; letter-spacing:4.45pt"> </span>
            
                </p>
            </td>
            <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0.75pt; margin-left:45.4pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri"> <b> Estado Civil: </b> </span>
                </p>
            </td>      
            <td style="width:141.6pt; vertical-align:top">
                <p style="margin-top:0.75pt; margin-left:2.45pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['marital_status_id'] ? $chrecord[0]['admissions']['patients']['marital_status']['name'] : 'No registra'}}</span>
                </p>
            </td>

        </tr>
        <tr style="height:11.95pt">
            <td style="width:79.75pt; vertical-align:top">
                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:8pt"><b>Edad: </b></span>
                </p>
            </td>
            <td style="width:203pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['age']}} Años</span>
                </p>
            </td>
        
            <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0.75pt; margin-left:45.4pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri"> <b>Género: </b> </span>
                </p>
            </td>

            <td style="width:141.6pt; vertical-align:top">
                <p style="margin-top:0.75pt; margin-left:2.45pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri; vertical-align:1pt">{{$chrecord[0]['admissions']['patients']['gender_id'] ? $chrecord[0]['admissions']['patients']['gender']['name'] : 'No registra'}}</span>
                </p>
            </td>
        
        </tr>

        <tr style="height:12.7pt">
            <td style="width:79.75pt; vertical-align:top">
                <p style="margin-top:2.3pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:8pt"> <b> Dirección: </b> </span>
                </p>
            </td>
            <td style="width:203pt; vertical-align:top">
                <p style="margin-top:0.75pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['residence_address'] ? $chrecord[0]['admissions']['patients']['residence_address'] : 'No registra'}}</span>
                </p>
            </td>
            <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0.75pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri"> <b> Teléfono: </b> </span>
                </p>
            </td>
            <td style="width:141.6pt; vertical-align:top">
                <p style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['phone'] ? $chrecord[0]['admissions']['patients']['phone'] : 'No registra'}}</span>
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
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['residence_municipality_id'] ? $chrecord[0]['admissions']['patients']['residence_municipality']['name'] : 'No registra'}}</span>
                </p>
            </td>
            <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0.75pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri"> <b> Ocupación: </b> </span>
                </p>
            </td>

            <td style="width:141.6pt; vertical-align:top">
                <p style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['activities_id'] ? $chrecord[0]['admissions']['patients']['activities']['name'] : 'No registra'}}</span>
                </p>
            </td>
           
        </tr>
        <tr style="height:11.95pt">
            <td style="width:79.75pt; vertical-align:top">
                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:8pt"><b>Pertenencia étnica: </b></span>
                </p>
            </td>
    
            <td style="width:203pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['ethnicity_id'] ? $chrecord[0]['admissions']['patients']['ethnicity']['name'] : "No registra"}}</span>
                </p>
            </td>
            <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0.75pt; margin-left:47.05pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri"> <b> Nivel Educativo: </b> </span>
                </p>
            </td>

            <td style="width:141.6pt; vertical-align:top">
                <p style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['academic_level_id'] ? $chrecord[0]['admissions']['patients']['academic_level']['name'] : 'No registra'}}</span>
                </p>
            </td>
            
        </tr>
    </table>

    <hr />

    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">DATOS DEL
            INGRESO</span><span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
    </p>

    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
        <tr style="height:11.95pt">
            <td style="width:79.75pt; vertical-align:top">
                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:8pt"><b>  Nº Ingreso:</b></span>
                </p>
            </td>
            <td style="width:203pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['consecutive'] ? $chrecord[0]['admissions']['consecutive'] : 'No registra'}} </span>
                </p>
            </td>
            <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri"> <b> Fecha: </b> </span>
                </p>
            </td>
            <td style="width:141.6pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['entry_date'] ? $chrecord[0]['admissions']['entry_date'] : 'No registra'}}</span>
                    <span style="width:40pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:80.35pt">&#xa0;</span>
                </p>
            </td>
        </tr>
        <tr style="height:12.7pt">
            <td style="width:79.75pt; vertical-align:top">
                <p style="margin-top:2.3pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:8pt"> <b>Entidad: </b> </span>
                </p>
            </td>
            <td style="width:203pt; vertical-align:top">
                <p style="margin-top:0.3pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['contract']['company_id'] ? $chrecord[0]['admissions']['contract']['company']['name'] : 'No registra'}}</span>
                    <span style="font-family:Calibri; letter-spacing:4.45pt"> </span>
            
                </p>
            </td>
            <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0.75pt; margin-left:45.4pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri"> <b> Tipo de régimen: </b> </span>
                </p>
            </td>      
            <td style="width:141.6pt; vertical-align:top">
                <p style="margin-top:0.75pt; margin-left:2.45pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['admissions']['contract']['type_briefcase'] ? $chrecord[0]['admissions']['contract']['type_briefcase']['name'] : 'No registra'}}</span>
                </p>
            </td>
        </tr>
    </table>
</div>

<!-- Terapia Ocupacional-->
<div>
    @if($chrecord[0]['ch_type_id'] == 6)

    <!-- INGRESO -->
    <div>
        <hr />
        <!-- Validación Ingreso -->
        <div>
            @if(count($ChEValorationOT) > 0  || count($ChVitalSigns) > 0 || count($ChEOccHistoryOT) > 0   || count($ChEPastOT) > 0  || count($ChEDailyActivitiesOT) > 0 || 
                count($ChEMSFunPatOT) > 0 ||  count($ChEMSIntPatOT) > 0 || count($ChEMSMovPatOT) > 0 || count($ChEMSThermalOT) > 0 ||
                count($ChEMSDisAuditoryOT) > 0  || count($ChEMSDisTactileOT) > 0  || count($ChEMSAcuityOT) > 0 || count($ChEMSTestOT) > 0 || 
                count($ChEMSComponentOT) > 0 ||  count($ChEMSCommunicationOT) > 0 || count($ChEMSAssessmentOT) > 0 || count($ChEMSWeeklyOT) > 0 )

            <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                INGRESO<br>
            </p>
            @endisset
        </div>

        <!-- Valoración -->
        <div>
            @if(count($ChEValorationOT) > 0)
        
            <hr />
            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>VALORACIÓN</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            @foreach($ChEValorationOT as $ch)
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
            </p>
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                <b>@if(isset($ch['ch_diagnosis'])) DIAGNÓSTICO MÉDICO: </b> {{$ch['ch_diagnosis']['code']}} - {{$ch['ch_diagnosis']['name']}} @endisset</span>
            </p>
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['recomendations'])) MOTIVO DE CONSULTA: </b> {{$ch['recomendations']}} @endisset</span>
            </p>                    
            @endforeach

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
            <br>
                    
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


                @endforeach
                @endisset

            </div>
            
        </div>

        <!-- Historial Ocupacional -->
        <div>
            @if(count($ChEOccHistoryOT) > 0)
            <hr />
            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> HISTORIAL OCUPACIONAL </b> </span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @endisset

                @foreach($ChEOccHistoryOT as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                    </p>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ocupation']) ) OCUPACIÓN</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['ocupation'])) {{$ch['ocupation']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['enterprice_employee']) ) ANTIGÜEDAD EN LA EMPRESA</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['enterprice_employee'])) {{$ch['enterprice_employee']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['work_employee']) || ($ch['work_independent'])) HORARIO DE TRABAJO</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['work_employee']) || ($ch['work_independent'])) {{$ch['work_employee']}} {{$ch['work_independent']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['shift_employee']) || ($ch['shift_independent'])) REALIZA TURNOS</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['shift_employee']) || ($ch['shift_independent'])) {{$ch['shift_employee']}} {{$ch['shift_independent']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['observation_employee']) || ($ch['observation_independent']) || ($ch['observation_home']) ) OBSERVACIÓN</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['observation_employee']) || ($ch['observation_independent']) || ($ch['observation_home'])) {{$ch['observation_employee']}} {{$ch['observation_independent']}} {{$ch['observation_home']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>   
                <br/>                       
                @endforeach          
        </div>

        <!-- Antecedentes Ocupacionales -->
        <div>
            @if(count($ChEPastOT) > 0)
                <hr />
                <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ANTECEDENTES OCUPACIONALES </b> </span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>
            @endisset

                @foreach($ChEPastOT as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                    </p>

                    <p style=" text-align: left; margin-left:9.45pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">
                        <b>@if(isset($ch['mother']) || isset($ch['dad']) || isset($ch['spouse']) || isset($ch['sons']) ||
                              isset($ch['uncles']) || isset($ch['grandparents']) || isset($ch['others']) || isset($ch['number_childrens']) || 
                              isset($ch['observation_family_struct']))  ESTRUCTURA FAMILIAR </b> @endisset </span>
                    </p>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['mother']) || isset($ch['dad']) || isset($ch['spouse']) || isset($ch['sons']) ||
                                        isset($ch['uncles']) || isset($ch['grandparents']) || isset($ch['others'])) NÚCLEO FAMILIAR BASE</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['fluter']) || isset($ch['mother']) || isset($ch['dad']) || isset($ch['spouse']) ||
                                        isset($ch['sons']) || isset($ch['uncles']) || isset($ch['grandparents'])) {{$ch['others']}} {{$ch['mother']}} {{$ch['dad']}} {{$ch['spouse']}} {{$ch['sons']}} {{$ch['uncles']}} {{$ch['grandparents']}} {{$ch['others']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['number_childrens']) )NÚMERO DE HIJOS</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['number_childrens'])) {{$ch['number_childrens']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['observation_family_struct'])) OBSERVACIONES: </b>{{$ch['observation_family_struct']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <br/>    
                    <p style=" text-align: left; margin-left:9.45pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">
                        <b>@if(isset($ch['academy']) || isset($ch['level_academy']) || isset($ch['observation_schooling_training']) || isset($ch['terapy']) ||
                              isset($ch['observation_terapy'])) NIVEL DE ESCOLARIDAD Y CAPACITACÓN </b> @endisset </span>
                    </p>                       
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['academy'])) NIVEL ACADÉMICO</b>@endisset</span>
                                    </p>
                                </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['academy'])) {{$ch['academy']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['level_academy'])) ESTADO NIVEL ACADÉMICO</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['level_academy'])) {{$ch['level_academy']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['observation_schooling_training'])) OBSERVACIONES: </b> {{$ch['observation_schooling_training']}}@endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['terapy'])) TRATAMIENTO TERAPEUTICO </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['terapy'])) {{$ch['terapy']}}@endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['observation_terapy'])) OBSERVACIONES </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['observation_terapy'])) {{$ch['observation_terapy']}}@endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <br/>   
                    <p style=" text-align: left; margin-left:9.45pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">
                        <b>@if(isset($ch['smoke']) || isset($ch['f_smoke']) || isset($ch['alcohol']) || isset($ch['f_alcohol']) ||
                              isset($ch['sport']) | isset($ch['f_sport']) || isset($ch['sport_practice_observation'])) NIVEL DE ESCOLARIDAD Y CAPACITACÓN </b> @endisset </span>
                    </p>   
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['smoke'])) FUMA</b>@endisset</span>
                                    </p>
                                </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['smoke'])) {{$ch['smoke']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['f_smoke']))FRECUENCIA</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['f_smoke'])) {{$ch['f_smoke']}} @endisset</span>
                                </p>
                            </td>
                        </tr>   
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['alcohol'])) CONSUME ALCOHOL </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['alcohol'])) {{$ch['alcohol']}}@endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['f_alcohol'])) FRECUENCIA </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['f_alcohol'])) {{$ch['f_alcohol']}}@endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['sport'])) PRACTICA DEPORTE </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['sport'])) {{$ch['sport']}}@endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['f_sport'])) FRECUENCIA </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['f_sport'])) {{$ch['f_sport']}}@endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['sport_practice_observation'])) OBSERVACIÓN: </b> {{$ch['sport_practice_observation']}}@endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <br/>     
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['observation'])) OBSERVACIONES: </b>{{$ch['observation']}} @endisset </span>
                    </p>
          
                @endforeach          
        </div>

        <!-- Actividades -->
        <div>
            @if(count($ChEDailyActivitiesOT) > 0)
                <hr />
                <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ACTIVIDADES VIDA DIARIA </b> </span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>
            @endisset

                @foreach($ChEDailyActivitiesOT as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                    </p>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['cook'])) COCINAR</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['cook'])) {{$ch['cook']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['kids']) )CIUDAR NIÑOS</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['kids'])) {{$ch['kids']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['wash'])) LAVAR</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['wash'])) {{$ch['wash']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['game']) )JUGAR JUEGOS DE AZAR</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['game'])) {{$ch['game']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ironing'])) PLANCHAR</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['ironing'])) {{$ch['ironing']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['walk'])) CAMINAR</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['walk'])) {{$ch['walk']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['clean'])) ASEAR</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['clean'])) {{$ch['clean']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['sport'])) PRACTICAR DEPORTE</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['sport'])) {{$ch['sport']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['decorate'])) DECORAR </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['decorate'])) {{$ch['decorate']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['social'])) REUNIONES SOCIALES</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['social'])) {{$ch['social']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['act_floristry'])) REALIZAR ACTIVIDADES DE FLORISTERIA </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['act_floristry'])) {{$ch['act_floristry']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['friends'])) VISITAR AMIGOS</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['friends'])) {{$ch['friends']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['read'])) LEER </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['read'])) {{$ch['read']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['politic'])) PRACTICAR GRUPOS POLÍTICOS</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['politic'])) {{$ch['politic']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['view_tv'])) VER TELEVISIÓN  </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['view_tv'])) {{$ch['view_tv']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['religion'])) PRACTICAR GRUPOS RELIGIOSOS</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['religion'])) {{$ch['religion']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['write'])) ESCRIBIR  </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['write'])) {{$ch['write']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['look'])) CUIDAR Y JUGAR CON SUS HIJOS Y/O NIETOS </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['look'])) {{$ch['look']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['arrange'])) ARREGLAR ELECTRODOMÉSTICOS  </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['arrange'])) {{$ch['arrange']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['travel'])) IR DE PASEO CON LA FAMILIA </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['travel'])) {{$ch['travel']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <br/>          
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['test'])) EXÁMEN MUSCULAR</b>@endisset</span>
                                    </p>
                                </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['test'])) {{$ch['test']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['observation_test'])) OBSERVACIONES: </b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['observation_test'])) {{$ch['observation_test']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <br/>   
                @endforeach          
        </div>

        <!-- Habilidades motoras -->
        <div>

            <!-- Validación -->
            <div>
                @if(count($ChEMSFunPatOT) > 0 ||  count($ChEMSIntPatOT) > 0 || count($ChEMSMovPatOT) > 0 || count($ChEMSThermalOT) > 0 ||
                count($ChEMSDisAuditoryOT) > 0   || count($ChEMSDisTactileOT) > 0  || count($ChEMSAcuityOT) > 0 || count($ChEMSTestOT) > 0 || 
                count($ChEMSComponentOT) > 0  || count($ChEMSCommunicationOT) > 0 || count($ChEMSAssessmentOT) > 0 || count($ChEMSWeeklyOT) > 0 )

                <hr />

                <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #0e97b9;widows:0; orphans:0; font-size:9.5pt">
                    HABILIDADES MOTORAS<br>
                </p>
                               
                @endisset
            </div>

            <!-- Patrones funcionales -->
            <div>
                @if(count($ChEMSFunPatOT) > 0)

                <hr/>
                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> PATRONES FUNCIONALES </b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChEMSFunPatOT as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                    </p>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>PATRONES</b></span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>DERECHA</b></span>
                                </p>
                            </th>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>IZQUIERDA</b></span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['head_right'])) MANO - CABEZA @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['head_right'])) {{$ch['head_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['head_left'])) {{$ch['head_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['mouth_right'])|| isset($ch['mouth_left'])) MANO - BOCA @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['mouth_right'])) {{$ch['mouth_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['mouth_left'])) {{$ch['mouth_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['shoulder_right']) || isset($ch['shoulder_left'])) MANO - HOMBRO @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['shoulder_right'])) {{$ch['shoulder_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['shoulder_left'])) {{$ch['shoulder_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['back_right']) || isset($ch['back_left'])) MANO - ESPALDA @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['back_right'])) {{$ch['back_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['back_left'])) {{$ch['back_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['waist_right'])|| isset($ch['waist_left'])) MANO - CINTURA @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['waist_right'])) {{$ch['waist_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['waist_left'])) {{$ch['waist_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['knee_right']) || isset($ch['knee_left'])) MANO - RODILLA @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['knee_right'])) {{$ch['knee_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['knee_left'])) {{$ch['knee_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['foot_right'])|| isset($ch['foot_left'])) MANO - PIE @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['foot_right'])) {{$ch['foot_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['foot_left'])) {{$ch['foot_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>     
                    @endforeach
                    
                @endisset
            </div>

            <!-- Patrones integrales -->
            <div>
                @if(count($ChEMSIntPatOT) > 0)
                <hr/>

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> PATRONES INTEGRALES </b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChEMSIntPatOT as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                    </p>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>ALCANCES</b></span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>DERECHA</b></span>
                                </p>
                            </th>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>IZQUIERDA</b></span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['up_right']) || isset($ch['up_left'])) ALCANCE ARRIBA @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['up_right'])) {{$ch['up_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['up_left'])) {{$ch['up_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['side_right'])|| isset($ch['side_left'])) ALCANCE AL LADO @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['side_right'])) {{$ch['side_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['side_left'])) {{$ch['side_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['backend_right']) || isset($ch['backend_left'])) ALCANCE ATRAS @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['backend_right'])) {{$ch['backend_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['backend_left'])) {{$ch['backend_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['frontend_right']) || isset($ch['frontend_left'])) ALCANCE AL FRENTE @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['frontend_right'])) {{$ch['frontend_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['frontend_left'])) {{$ch['frontend_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['down_right'])|| isset($ch['down_left'])) ALCANCE ABAJO @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['down_right'])) {{$ch['down_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['down_left'])) {{$ch['down_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        
                    </table>     
                    @endforeach
                    
                @endisset
            </div>

            <!-- Patrones movimiento -->
            <div>
                @if(count($ChEMSMovPatOT) > 0)
                <hr/>

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> PATRONES DE MOVIMIENTO </b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChEMSMovPatOT as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                    </p>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>PATRONES</b></span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>DERECHA</b></span>
                                </p>
                            </th>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>IZQUIERDA</b></span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['scroll_right']) || isset($ch['scroll_left'])) DESPLAZARSE @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['scroll_right'])) {{$ch['scroll_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['scroll_left'])) {{$ch['scroll_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['get_up_right'])|| isset($ch['get_up_left'])) LEVANTAR @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['get_up_right'])) {{$ch['get_up_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['get_up_left'])) {{$ch['get_up_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['push_right']) || isset($ch['push_left'])) EMPUJAR @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['push_right'])) {{$ch['push_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['push_left'])) {{$ch['push_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['pull_right']) || isset($ch['pull_left'])) HALAR @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['pull_right'])) {{$ch['pull_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['pull_left'])) {{$ch['pull_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['transport_right'])|| isset($ch['transport_left'])) TRANSPORTAR @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['transport_right'])) {{$ch['transport_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['transport_left'])) {{$ch['transport_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['attain_right'])|| isset($ch['attain_left'])) ALCANZAR @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['attain_right'])) {{$ch['attain_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['attain_left'])) {{$ch['attain_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['bipedal_posture_right'])|| isset($ch['bipedal_posture_left'])) POSTURA BIPEDA @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['bipedal_posture_right'])) {{$ch['bipedal_posture_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['bipedal_posture_left'])) {{$ch['bipedal_posture_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['sitting_posture_right'])|| isset($ch['sitting_posture_left'])) POSTURA SEDENTE @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['sitting_posture_right'])) {{$ch['sitting_posture_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['sitting_posture_left'])) {{$ch['sitting_posture_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['squat_posture_right'])|| isset($ch['squat_posture_left'])) POSTURA CUNCLILLAS @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['squat_posture_right'])) {{$ch['squat_posture_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['squat_posture_left'])) {{$ch['squat_posture_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['use_both_hands_right'])|| isset($ch['use_both_hands_left'])) USO AMBAS MANOS @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['use_both_hands_right'])) {{$ch['use_both_hands_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['use_both_hands_left'])) {{$ch['use_both_hands_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['alternating_movements_right'])|| isset($ch['alternating_movements_left'])) MOVIMIENTOS ALTERNOS @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['alternating_movements_right'])) {{$ch['alternating_movements_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['alternating_movements_left'])) {{$ch['alternating_movements_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['dissociated_movements_right'])|| isset($ch['dissociated_movements_left'])) MOVIMIENTOS DISOCIADOS @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['dissociated_movements_right'])) {{$ch['dissociated_movements_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['dissociated_movements_left'])) {{$ch['dissociated_movements_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['Simultaneous_movements_right'])|| isset($ch['Simultaneous_movements_left'])) MOVIMIENTOS SIMULTANEOS @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['Simultaneous_movements_right'])) {{$ch['Simultaneous_movements_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['Simultaneous_movements_left'])) {{$ch['Simultaneous_movements_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['bimanual_coordination_right'])|| isset($ch['bimanual_coordination_left'])) COORDINACIÓN BIMANUAL @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['bimanual_coordination_right'])) {{$ch['bimanual_coordination_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['bimanual_coordination_left'])) {{$ch['bimanual_coordination_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['hand_eye_coordination_right'])|| isset($ch['hand_eye_coordination_left'])) COORDINACIÓN MANO - OJO @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['hand_eye_coordination_right'])) {{$ch['hand_eye_coordination_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['hand_eye_coordination_left'])) {{$ch['hand_eye_coordination_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['hand_foot_coordination_right'])|| isset($ch['hand_foot_coordination_left'])) COORDINACIÓN CABEZA - PIES @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['hand_foot_coordination_right'])) {{$ch['hand_foot_coordination_right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['hand_foot_coordination_left'])) {{$ch['hand_foot_coordination_left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>     
                    @endforeach
                    
                @endisset
            </div>

             <!-- Coincidencia termica -->
             <div>
                @if(count($ChEMSThermalOT) > 0)
                <hr/>

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> COINCIDENCIA TERMICA</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChEMSThermalOT as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                    </p>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['heat'])) CALOR @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['heat'])) {{$ch['heat']}}  @endisset</span>
                                </p>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['cold'])) FRIO @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['cold'])) {{$ch['cold']}}  @endisset</span>
                                </p>
                        </tr>                                
                    </table>     
                    @endforeach
                    
                @endisset
            </div>

            <!-- Discriminación auditiva -->
            <div>
                @if(count($ChEMSDisAuditoryOT) > 0)
                <hr/>

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DISCRIMINACIÓN AUDITIVA</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChEMSDisAuditoryOT as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                    </p>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['sound_sources'])) REALIZA BUSQUEDA DE FUENTES SONORAS @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['sound_sources'])) {{$ch['sound_sources']}}  @endisset</span>
                                </p>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['auditory_hyposensitivity'])) PRESENTA HIPERSENSIBILIDAD AUDITIVA @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['auditory_hyposensitivity'])) {{$ch['auditory_hyposensitivity']}}  @endisset</span>
                                </p>
                        </tr>                                
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['auditory_hypersensitivity'])) PRESENTA HIPOSENSIBILIDAD AUDITIVA @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['auditory_hypersensitivity'])) {{$ch['auditory_hypersensitivity']}}  @endisset</span>
                                </p>
                        </tr>                                
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['auditory_stimuli'])) PRESENTA RESPUESTA ADAPTATIVA FRENTE A LOS DIFERENTES ESTÍMULOS AUDITIVOS @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['auditory_stimuli'])) {{$ch['auditory_stimuli']}}  @endisset</span>
                                </p>
                        </tr>                                
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['auditive_discrimination'])) LOGRA DISCRIMINACIÓN AUDITIVA @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['auditive_discrimination'])) {{$ch['auditive_discrimination']}}  @endisset</span>
                                </p>
                        </tr>                                
                    </table>     
                    @endforeach
                    
                @endisset
            </div>

            <!-- Discriminación tactil -->
            <div>
                @if(count($ChEMSDisTactileOT) > 0)
                <hr/>

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DISCRIMINACIÓN TACTIL</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChEMSDisTactileOT as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                    </p>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['right'])) DERECHA @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['right'])) {{$ch['right']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['left'])) IZQUIERDA @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['left'])) {{$ch['left']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                     
                    </table>     
                    @endforeach
                    
                @endisset
            </div>

            <!-- Agudeza -->
            <div>
                @if(count($ChEMSAcuityOT) > 0)
                <hr/>

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> AGUDEZA </b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChEMSAcuityOT as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                    </p>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['follow_up'])) LOGRA CONTACTO Y SEGUMIENTO VISUAL @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['follow_up'])) {{$ch['follow_up']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['object_identify'])) IDENTIFICACIÓN DE OBJETOS @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['object_identify'])) {{$ch['object_identify']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                     
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['figures'])) FIGURAS SUPERPUESTAS @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['figures'])) {{$ch['figures']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                     
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['color_design'])) DISEÑO DE BLOQUES DE COLORES @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['color_design'])) {{$ch['color_design']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                     
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['categorization'])) CATEGORIZACIÓN @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['categorization'])) {{$ch['categorization']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                     
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['special_relation'])) RELACIÓN ESPACIAL ENTRE EL PACIENTE Y LOS OBJETOS DEL ESPACIO
                                        @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['special_relation'])) {{$ch['special_relation']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                     
                    </table>     
                    @endforeach
                    
                @endisset
            </div>

             <!-- Componente Vestibular -->
             <div>
                @if(count($ChEMSComponentOT) > 0)
                <hr/>

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> COMPONENTE VESTIBULAR </b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChEMSComponentOT as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                    </p>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['dynamic_balance'])) PRESENTA ALTERACIÓN EN EL EQUILIBRIO DINÁMICO @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['dynamic_balance'])) {{$ch['dynamic_balance']}}  @endisset</span>
                                </p>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['static_balance'])) PRESENTA ALTERACIÓN EN EL EQUILIBRIO ESTÁTICO @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['static_balance'])) {{$ch['static_balance']}}  @endisset</span>
                                </p>
                        </tr>                  
                    </table>     

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['observation_component'])) OBSERVACIONES: </b>{{$ch['observation_component']}} @endisset </span>
                    </p>

                    @endforeach
                    
                @endisset
            </div>

            <!-- Examen mental -->
            <div>
                @if(count($ChEMSTestOT) > 0)
                <hr/>

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> EXAMEN MENTAL</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChEMSTestOT as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                    </p>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['appearance'])) APARIENCIA @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['appearance'])) {{$ch['appearance']}}  @endisset</span>
                                </p>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['consent'])) CONCIENCIA @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['consent'])) {{$ch['consent']}}  @endisset</span>
                                </p>
                        </tr>                  
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['Attention'])) ATENCIÓN @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['Attention'])) {{$ch['Attention']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                  
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['humor'])) ESTADO DE HUMOR @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['humor'])) {{$ch['humor']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                  
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['language'])) LENGUAJE @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['language'])) {{$ch['language']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                  
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['sensory_perception'])) SENSOPERCEPCIÓN @endisset</span>
                                </p>                                    
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['sensory_perception'])) {{$ch['sensory_perception']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                  
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['grade'])) PROCEDIMIENTO @endisset</span>
                                </p>                                    
                            </td>
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['grade'])) CURSO: </b>{{$ch['grade']}} @endisset</span>
                                </p>                                    
                            </td>
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['contents'])) CONTENIDO: </b>{{$ch['contents']}}  @endisset</span>
                                </p>                                    
                            </td>
                        </tr>  
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['orientation'])) ORIENTACIÓN @endisset</span>
                                </p>                                    
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['orientation'])) {{$ch['orientation']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                    
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['sleep'])) SUEÑO @endisset</span>
                                </p>                                    
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['sleep'])) {{$ch['sleep']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                    
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['memory'])) MEMORIA @endisset</span>
                                </p>                                    
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['memory'])) {{$ch['memory']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                    
                    </table>     
                    @endforeach
                    
                @endisset
            </div>
        
            <!-- Habilidades comunicación -->
            <div>
                @if(count($ChEMSCommunicationOT) > 0)
                <hr/>

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> HABILIDADES DE COMUNICACION E INTERACCION </b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChEMSCommunicationOT as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                    </p>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['community'])) COMUNIDAD @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['community'])) {{$ch['community']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['relatives'])) FAMILIARES @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['relatives'])) {{$ch['relatives']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                     
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['friends'])) COMPAÑEROS Y AMIGOS @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['friends'])) {{$ch['friends']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['health'])) CUIDADO DE LA PROPIA SALUD @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['health'])) {{$ch['health']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                     
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['shopping'])) COMPRAS @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['shopping'])) {{$ch['shopping']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['foods'])) PREPARACIÓN DE ALIMENTOS
                                        @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['foods'])) {{$ch['foods']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                     
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['bathe'])) BAÑARSE
                                        @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['bathe'])) {{$ch['bathe']}}  @endisset</span>
                                </p>
                            </td>
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['dress'])) VESTIRSE
                                        @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['dress'])) {{$ch['dress']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                     
                        <tr style="height:11.95pt">
                            <td style="width:150pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['animals'])) CUIDADO DE ANIMALES
                                        @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['animals'])) {{$ch['animals']}}  @endisset</span>
                                </p>
                            </td>
                        </tr>                     
                    </table>     
                    @endforeach
                    
                @endisset
            </div>

            <!-- Valoración diaria -->
            <div>
                @if(count($ChEMSAssessmentOT) > 0)

                <hr />

                <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">VALORACIÓN DIARIA</span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>

                
                @foreach($ChEMSAssessmentOT as $ch)
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at']))FECHA : </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['occupational_con'])) CONCEPTO OCUPACIONAL : </b>{{$ch['occupational_con']}} @endisset </span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['check1_hold']) || isset($ch['check2_improve']) || isset($ch['check3_structure']) || isset($ch['check4_promote']) || isset($ch['check5_strengthen']) ||
                            isset($ch['check6_promote_2']) || isset($ch['check7_develop']) || isset($ch['check8_strengthen_2']) || isset($ch['check9_favor']) || isset($ch['check10_functionality']) )
                            VALORACIÓN </b> @endisset 
                    </span>
                    <br/>
                    <span style="font-family:Calibri; font-size:9pt">
                        @if(isset($ch['check1_hold'])) {{$ch['check1_hold']}} @endisset 
                        @if(isset($ch['check2_improve']))<br/>  {{$ch['check2_improve']}} @endisset 
                        @if(isset($ch['check3_structure']))  <br/>{{$ch['check3_structure']}} @endisset 
                        @if(isset($ch['check4_promote'])) <br/> {{$ch['check4_promote']}} @endisset 
                        @if(isset($ch['check5_strengthen'])) <br/> {{$ch['check5_strengthen']}} @endisset 
                        @if(isset($ch['check6_promote_2'])) <br/> {{$ch['check6_promote_2']}} @endisset 
                        @if(isset($ch['check7_develop'])) <br/> {{$ch['check7_develop']}}@endisset  
                        @if(isset($ch['check8_strengthen_2']))  <br/>{{$ch['check8_strengthen_2']}} @endisset 
                        @if(isset($ch['check9_favor'])) <br/> {{$ch['check9_favor']}} @endisset 
                        @if(isset($ch['check10_functionality'])) <br/>  {{$ch['check10_functionality']}} @endisset<br/>
                    </span> 
                </p>
                @endforeach  

                @endisset
            </div>

            <!-- Sesiones -->
            <div>
                    @if(count($ChEMSWeeklyOT) > 0)

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
                            <th><span style="font-family:Calibri; font-size:9pt">RECOMENDACIONES</th>
                        </tr>

                        @foreach($ChEMSWeeklyOT as $ch)
                        <tr>                        
                        @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}}</span>
                            </td>
                            @endisset

                        @if(isset($ch['monthly_sessions']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['monthly_sessions']}} </span>
                            </td>
                            @endisset

                    @if(isset($ch['weekly_intensity']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['weekly_intensity']}}</span>
                            </td>
                            @endisset

                    @if(isset($ch['recommendations']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['recommendations']}}</span>
                            </td>
                            @endisset
                                                
                        </tr>
                        @endforeach

                    </table>         

                    @endisset
            </div>
            
        </div>

    </div>
    
    <!-- REGULAR -->
    <div>
        <!-- Validación Regular -->
        <div>
            @if(count($ChRNValorationOT) > 0 || count($ChVitalSignsNT) > 0 || count($ChEMSAssessmentOTNT) > 0  || 
                count($ChRNMaterialsOTNT) > 0  || count($ChRecommendationsEvo) > 0)

            <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                REGULAR<br>
            </p>
            @endisset
        </div>

         <!-- Valoración -->
         <div>
            @if(count($ChRNValorationOT) > 0)
        
            <hr />
            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>VALORACIÓN</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            @foreach($ChRNValorationOT as $ch)
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
            </p>
            {{-- <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                <b>@if(isset($ch['ch_diagnosis'])) DIAGNÓSTICO MÉDICO: </b> {{$ch['ch_diagnosis']['name']}} @endisset</span>
            </p> --}}
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['patient_state'])) MOTIVO DE CONSULTA: </b> {{$ch['patient_state']}} @endisset</span>
            </p>                    
            @endforeach

            @endisset

        </div>

        <!-- Rx Signos Vitales-->
        <div>
                    @if(count($ChVitalSignsNT) > 0)
                    @foreach($ChVitalSignsNT as $ch)

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


                @endforeach
                @endisset

            </div>
            
        </div>

         <!-- Valoración diaria -->
         <div>
            @if(count($ChEMSAssessmentOTNT) > 0)

            <hr />

            <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">VALORACIÓN DIARIA</span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            
            @foreach($ChEMSAssessmentOTNT as $ch)
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                <b>@if(isset($ch['created_at']))FECHA : </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
            </p>
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                <b>@if(isset($ch['occupational_con'])) CONCEPTO OCUPACIONAL : </b>{{$ch['occupational_con']}} @endisset </span>
            </p>
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['check1_hold']) || isset($ch['check2_improve']) || isset($ch['check3_structure']) || isset($ch['check4_promote']) || isset($ch['check5_strengthen']) ||
                        isset($ch['check6_promote_2']) || isset($ch['check7_develop']) || isset($ch['check8_strengthen_2']) || isset($ch['check9_favor']) || isset($ch['check10_functionality']) )
                        VALORACIÓN </b> @endisset 
                </span>
                <br/>
                <span style="font-family:Calibri; font-size:9pt">
                    @if(isset($ch['check1_hold'])) {{$ch['check1_hold']}} @endisset 
                    @if(isset($ch['check2_improve']))<br/>  {{$ch['check2_improve']}} @endisset 
                    @if(isset($ch['check3_structure']))  <br/>{{$ch['check3_structure']}} @endisset 
                    @if(isset($ch['check4_promote'])) <br/> {{$ch['check4_promote']}} @endisset 
                    @if(isset($ch['check5_strengthen'])) <br/> {{$ch['check5_strengthen']}} @endisset 
                    @if(isset($ch['check6_promote_2'])) <br/> {{$ch['check6_promote_2']}} @endisset 
                    @if(isset($ch['check7_develop'])) <br/> {{$ch['check7_develop']}}@endisset  
                    @if(isset($ch['check8_strengthen_2']))  <br/>{{$ch['check8_strengthen_2']}} @endisset 
                    @if(isset($ch['check9_favor'])) <br/> {{$ch['check9_favor']}} @endisset 
                    @if(isset($ch['check10_functionality'])) <br/>  {{$ch['check10_functionality']}} @endisset<br/>
                </span> 
            </p>
            @endforeach  

            @endisset
        </div>

        <!-- Materiales e Insumos Utilizados -->
        <div>
                @if(count($ChRNMaterialsOTNT) > 0)

                <hr />

                <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">MATERIALES E INSUMOS UTILIZADOS</span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>

                
                @foreach($ChRNMaterialsOTNT as $ch)
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at']))FECHA : </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset </span>
                </p>
                
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['check1_cognitive']) || isset($ch['check2_colors']) || isset($ch['check3_elements']) || isset($ch['check4_balls']) || isset($ch['check5_material_paper']) ||
                            isset($ch['check6_material_didactic']) || isset($ch['check7_computer']) || isset($ch['check8_clay']) || isset($ch['check9_colbon']) || isset($ch['check10_pug']) )MATERIALES E INSUMOS
                        </b> @endisset 
                    </span>
                    <br/>
                    <span style="font-family:Calibri; font-size:9pt">
                        @if(isset($ch['check1_cognitive'])) {{$ch['check1_cognitive']}} @endisset 
                        @if(isset($ch['check2_colors']))<br/>  {{$ch['check2_colors']}} @endisset 
                        @if(isset($ch['check3_elements']))  <br/>{{$ch['check3_elements']}} @endisset 
                        @if(isset($ch['check4_balls'])) <br/> {{$ch['check4_balls']}} @endisset 
                        @if(isset($ch['check5_material_paper'])) <br/> {{$ch['check5_material_paper']}} @endisset 
                        @if(isset($ch['check6_material_didactic'])) <br/> {{$ch['check6_material_didactic']}} @endisset 
                        @if(isset($ch['check7_computer'])) <br/> {{$ch['check7_computer']}}@endisset  
                        @if(isset($ch['check8_clay']))  <br/>{{$ch['check8_clay']}} @endisset 
                        @if(isset($ch['check9_colbon'])) <br/> {{$ch['check9_colbon']}} @endisset 
                        @if(isset($ch['check10_pug'])) <br/>  {{$ch['check10_pug']}} @endisset<br/>
                    </span> 
                </p>
                @endforeach  

                @endisset
        </div>

        <!-- Sesiones Evo-->
        <div>
            @if(count($ChEMSWeeklyOTNT) > 0)

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
                    <th><span style="font-family:Calibri; font-size:9pt">RECOMENDACIONES</th>
                </tr>

                @foreach($ChEMSWeeklyOTNT as $ch)
                <tr>                        
                @if(isset($ch['created_at']))
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}}</span>
                    </td>
                    @endisset

                @if(isset($ch['monthly_sessions']))
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">{{$ch['monthly_sessions']}} </span>
                    </td>
                    @endisset

            @if(isset($ch['weekly_intensity']))
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">{{$ch['weekly_intensity']}}</span>
                    </td>
                    @endisset

            @if(isset($ch['recommendations']))
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">{{$ch['recommendations']}}</span>
                    </td>
                    @endisset
                                        
                </tr>
                @endforeach

            </table>         

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
                <span style=" text-align: justify; font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset <br/>
                    <b>@if(isset($ch['recommendations_evo'])) RECOMENDACION: </b> {{$ch['recommendations_evo']['name']}} @endisset <br/>
                    <b>@if(isset($ch['patient_family_education'])) DESCRIPCIÓN : </b> {{$ch['patient_family_education']}} @endisset <br/>
                    <b>@if(isset($ch['observations'])) OBSERVACIÓN : </b> {{$ch['observations']}} @endisset</span>
            </p>
            @endforeach
            
            @endisset

        </div>

    </div>

    <!-- NOTA ACLARATORIA -->
    <div>

        @if (count($Disclaimer) > 0)

            <hr />
            <p
                style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                NOTA ACLARATORIA<br>
            </p>
            
            <hr />

            @foreach ($Disclaimer as $ch)
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
    
    @endisset
</div>

<!-- Firma -->
<hr />
<br>
<br>
<table>

    <tr style="height:11.95pt">
        <td style="width:130pt; vertical-align:top">
    <div>
        <span style="font-family:Calibri;font-size: 10px;"> <b>FIRMA PERSONAL ASISTENCIAL</b> </span>
    
        @if($firm != null)
        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
            <span style="height:0pt;">
            
                <img src="data:image/png;base64,{{$firm}}" width="250" height="100" alt="" style=""/></span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @endisset
            <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">{{$chrecord2['user']['firstname']}} {{$chrecord2['user']['middlefirstname']}} {{$chrecord2['user']['lastname']}}  {{$chrecord2['user']['middlelastname']}}</span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">{{$chrecord2['user']['user_role'][0]['role']['name']}}</span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @if(count($chrecord[0]['user']['assistance']) > 0)
            <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">RM/TP: {{$chrecord2['user']['assistance'][0]['medical_record']}}</span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            
            
    
            @endisset   
    </div>
</td>
<td style="margin-left:50px;width:130pt; vertical-align:top">
    <div style="">
        @if($chrecord[0]['ch_interconsultation_id'] == null || $chrecord[0]['medical_diary_days_id'] == null) 
        <span style="font-family:Calibri;font-size: 10px;"> <b>FIRMA A SATISFACCIÓN DEL PACIENTE / RESPONSABLE / ACUDIENTE / CUIDADOR</b> </span>
    
        @if($firmPatient != null)
        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
            <span style="height:0pt;">
            
                <img src="data:image/png;base64,{{$firmPatient}}" width="250" height="100" alt="" style=""/></span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @endisset
            <p style="margin-top:8.95pt; margin-left:30pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">{{$chrecord[0]['admissions']['patients']['firstname']}} {{$chrecord[0]['admissions']['patients']['middlefirstname']}} {{$chrecord[0]['admissions']['patients']['lastname']}} {{$chrecord[0]['admissions']['patients']['middlelastname']}}</span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @endisset
    </div>

</td>
</tr>
</table>

</body>

</html>
