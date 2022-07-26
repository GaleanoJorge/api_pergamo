<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta name="generator" content="Aspose.Words for .NET 17.1.0.0" />
    <title></title>
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
                        <p>Fecha de registro: {{$today}}</p>
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
                <td style="width:141.6pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:2.45pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['admissions']['patients']['marital_status']['name']}}</span>
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
            <span style="font-family:Calibri; letter-spacing:-2.35pt"> </span><span style="font-family:Calibri"> <b> Tipo de régimen: </b> </span><span style="font-family:Calibri"></span><span 
                  style="font-family:Calibri">{{$chrecord[0]['admissions']['contract']['type_briefcase']['name']}}</span><span style="font-family:Calibri">
            </span><span style="font-family:Calibri"> <b> Nivel estrato: </b> </span><span style="font-family:Calibri"></span><span style="font-family:Calibri"> <b> ESTRATO 2 </b> (10 % )
                <b> SUBSIDIADO SISBEN </b> </span><span style="font-family:Calibri"></span><span style="font-family:Calibri"> <b> Cama: </b> </span><span style="font-family:Calibri"></span><span style="font-family:Calibri"> <b> OUA77 </b> </span>
            
        </p>
        <br/>

        
        
        @if($chrecord[0]['ch_type_id'] == 1 ) 
        @if(count($chreasonconsultation) > 0 || count($chsystemexam) > 0 || count($chphysicalexam) > 0 || count($chdiagnosis) > 0 || count($ChOstomies) > 0) 
        
        <p style="margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            INGRESO<br>
        </p>
        @endisset
        @if(count($chreasonconsultation) > 0) 
        <p style=" text-align:center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff font-family: sans-serif;"> <b> VALORACION TERAPEUTICA </b></span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"> <b> MOTIVO DE CONSULTA: </b> {{$chreasonconsultation[0]['reason_consultation']}}</span>
        </p>
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"> <b> ENFERMEDAD ACTUAL: </b> {{$chreasonconsultation[0]['current_illness']}}</span>
        </p>
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"> <b> CAUSA EXTERNA: </b> {{$chreasonconsultation[0]['ch_external_cause_id']}}</span>
        </p>
        @endisset
        @if(count($chsystemexam) > 0)
        <p style="text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> REVISIÓN POR SISTEMA </b> </span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($chsystemexam as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">{{$ch['type_ch_system_exam']['name']}} <b> - REVISIÓN: </b> {{$ch['revision']}} <b> - OBSERVACIÓN: </b> {{$ch['observation']}}</span>
        </p>
        @endforeach
        @endisset
        @if(count($chphysicalexam) > 0)
        <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> REVISIÓN POR ESTADO FÍSICO </b> </span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($chphysicalexam as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">{{$ch['type_ch_physical_exam']['name']}} <b> - REVISIÓN: </b> {{$ch['revision']}} </span>
        </p>
        @endforeach
        @endisset
        @if(count($chdiagnosis) > 0)
        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DIAGNÓSTICOS </b> </span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($chdiagnosis as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">{{$ch['diagnosis']['name']}} <b> - CLASE: </b> {{$ch['ch_diagnosis_class']['name']}} <b> - TIPO: </b> {{$ch['ch_diagnosis_type']['name']}} <b> - OBSERVACIÓN : </b> {{$ch['diagnosis_observation']}} </span>
        </p>
        @endforeach
        @endisset

        @if(count($ChOstomies) > 0)
        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> OSTOMIAS </b> </span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChOstomies as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> - OSTOMIA: </b> {{$ch['ostomy']['name']}} <b> - OBSERVACIÓN : </b> {{$ch['observation']}} </span>
        </p>
        @endforeach
        @endisset

        @if(count($ChAp) > 0)
        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> AP </b> </span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChAp as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> - ANALISIS: </b> {{$ch['analisys']}} <b> - PLAN : </b> {{$ch['plan']}} </span>
        </p>
        @endforeach
        @endisset

        @if(count($ChRecommendationsEvo) > 0)
        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> RECOMENDACIONES </b> </span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChRecommendationsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> - RECOMENDACION: </b> {{$ch['recommendations_evo']['name']}} <b> - DESCRIPCION : </b> {{$ch['patient_family_education']}} </span>
        </p>
        @endforeach
        @endisset

        @if(count($ChInability) > 0)
        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> INCAPACIDAD MEDICA </b> </span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChInability as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> - ¿PRORROGA?: </b> {{$ch['extension']}}</span>
        </p>
        @endforeach

        @foreach($ChInability as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> - FECHA INICIO DE INCAPACIDAD: </b> {{$ch['initial_date']}} <b> - DIAS DE INCAPACIDAD : </b> {{$ch['total_days']}}</span>
        </p>
        @endforeach

        @foreach($ChInability as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> - DIAGNOSTICO MEDICO: </b> {{$ch['diagnosis']['name']}}</span>
        </p>
        @endforeach

        @foreach($ChInability as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> - CODIGO CONTINGENCIA: </b> {{$ch['ch_contingency_code']['name']}}</span>
        </p>
        @endforeach

        @foreach($ChInability as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> - TIPO DE INCACAICDAD: </b> {{$ch['ch_type_inability']['name']}}</span>
        </p>
        @endforeach

        @foreach($ChInability as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> - TIPO DE PROCEDIMIENTO: </b> {{$ch['ch_type_procedure']['name']}}</span>
        </p>
        @endforeach

        @foreach($ChInability as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> - OBSERVACIÓN DEL POROFESIONAL: </b> {{$ch['observation']}}</span>
        </p>
        @endforeach
        @endisset




        @if(count($chbackground) > 0) 
        
        <p style="margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            ANTECEDENTES<br>
        </p>

        @endisset

        @if(count($chbackground) > 0)
        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">GENERALES</span>
            <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($chbackground as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">{{$ch['ch_type_background']['name']}} <b> - REVISIÓN: </b> {{$ch['revision']}} <b> - OBSERVACIÓN: </b> {{$ch['observation']}} </span>
        </p>
        @endforeach
        @endisset

        @if(count($ChEvoSoap) > 0 || count($ChPhysicalExamEvo) > 0 || count($ChVitalSignsEvo) > 0 || count($ChDiagnosisEvo) > 0 ) 
        
        <p style="margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            REGISTRO EVOLUCIÓN MÉDICA<br>
        </p>

        @endisset



        @if(count($ChEvoSoap) > 0)
        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">SOAP</span>
            <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChEvoSoap as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">FECHA: {{$ch['created_at']}} - SUBJETIVO: {{$ch['subjective']}} - OBJETIVO: {{$ch['objective']}} </span>
        </p>
        @endforeach
        @endisset

        @if(count($ChEvoSoap) > 0)
        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">SOAP</span>
            <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChEvoSoap as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">FECHA: {{$ch['created_at']}} - SUBJETIVO: {{$ch['subjective']}} - OBJETIVO: {{$ch['objective']}} </span>
        </p>
        @endforeach
        @endisset

        @if(count($ChPhysicalExamEvo) > 0)
        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">REVISIÓN POR ESTADO FÍSICO</span>
            <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChPhysicalExamEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">{{$ch['type_ch_physical_exam']['name']}} - REVISIÓN: {{$ch['revision']}} </span>
        </p>
        @endforeach
        @endisset
        @if(count($ChVitalSignsEvo) > 0)
        <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">SIGNOS VITALES</span>
            <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">{{$ch['type_ch_physical_exam']['name']}} - REVISIÓN: {{$ch['revision']}} </span>
        </p>
        @endforeach
        @endisset

        @if(count($ChDiagnosisEvo) > 0)
        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">DIAGNÓSTICOS</span>
            <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChDiagnosisEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">{{$ch['diagnosis']['name']}} - CLASE: {{$ch['ch_diagnosis_class']['name']}} - TIPO: {{$ch['ch_diagnosis_type']['name']}} - OBSERVACIÓN : {{$ch['diagnosis_observation']}} </span>
        </p>
        @endforeach
        @endisset   

        
                    
        @if($firm != null)
        <p style="margin-top:15pt; margin-left:8pt; margin-bottom:0pt;">
        <span style="height:0pt;">
        
            <img src="data:image/png;base64,{{$firm}}" width="250" height="100" alt="" style=""/></span>
            <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @endisset
        <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">{{$chrecord[0]['user']['firstname']}} {{$chrecord[0]['user']['middlefirstname']}} {{$chrecord[0]['user']['lastname']}}  {{$chrecord[0]['user']['middlelastname']}}</span>
            <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">{{$chrecord[0]['user']['user_role'][0]['role']['name']}}</span>
            <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @if(count($chrecord[0]['user']['assistance']) > 0)
        <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">RM/TP: {{$chrecord[0]['user']['assistance'][0]['medical_record']}}</span>
            <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        
        

        @endisset      
        @endisset

        <!-- Enfermeria -->
        @if($chrecord[0]['ch_type_id'] == 2 ) 
        @if(count($chnursingentry) > 0 || count($chphysicalexam) > 0) 
        <p style="margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            INGRESO<br>
        </p>
        @endisset
        @if(count($chnursingentry) > 0) 
        <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">NOTA DE INGRESO</span>
            <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">DIAGNOSTICO CUTANEO:</span>
        </p>
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">POSICIÓN: {{$chnursingentry[0]['patient_position']['name']}}</span>
        </p>
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">CUERO CABELLUDO: {{$chnursingentry[0]['hair_revision']}}</span>
        </p>
        @endisset
        @if(count($chphysicalexam) > 0) 
        <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">REVISIÓN POR ESTADO FÍSICO</span>
            <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        @foreach($chphysicalexam as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b>{{$ch['type_ch_physical_exam']['name']}}</b> - <b>REVISIÓN:</b> {{$ch['revision']}} - <b>OBSERVACIÓN:</b> {{$ch['description']}}  </span>
        </p>
        @endforeach

        @endisset
        @endisset

        <!-- TERAPIUA OCUPACIONAL -->
        @if($chrecord[0]['ch_type_id'] == 6 ) 
        @if(count($chevalorationot) > 0) 
        <p style="margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            INGRESO<br>
        </p>
        @endisset
        @if(count($chevalorationot) > 0) 
        <p style="margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">VALORACION TERAPEUTICA</span>
            <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        </p>
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b>DIAGNOSTICO:</b> {{$chevalorationot[0]['ch_diagnosis']['name']}}</span>
        </p>
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b>MOTIVO DE CONSULTA:</b> {{$chevalorationot[0]['recomendations']}}</span>
        </p>
        @endisset

        @endisset


    </div>
</body>

</html>