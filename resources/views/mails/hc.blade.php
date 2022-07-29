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
        </div>º

        <h2 style="margin-top:70px; margin-bottom:1.9pt; widows:0; orphans:0; font-size:9pt;    background: #4472c4;
                padding: 0.8em;font-family:Calibri;color: white;text-align: center;">EVOLUCIÓN HISTORIA CLINICA
        </h2>
        <hr/>
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

        <hr/>

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

        

        <!-- Medicina General-->
        
        
        @if($chrecord[0]['ch_type_id'] == 1 ) 

        <hr/>

        @if(count($chreasonconsultation) > 0 || count($chsystemexam) > 0 || count($chphysicalexam) > 0 || count($chdiagnosis) > 0 
        || count($ChOstomies) > 0 || count($ChAp) > 0 || count($ChRecommendationsEvo) > 0 || count($ChDietsEvo) > 0 ) 
        
        <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            INGRESO<br>
        </p>
        @endisset        

        @if(count($chreasonconsultation) > 0) 

        <hr/>

        <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> VALORACION TERAPEUTICA </b></span>
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

        <hr/>

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

        <hr/>

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

        <hr/>

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

        <hr/>

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

        <hr/>

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

        <hr/>

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

        

        @if(count($ChDietsEvo) > 0)

        <hr/>

        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DIETA RECOMENDADA </b> </span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        

        @foreach($ChDietsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> - ORAL: </b> {{$ch['diet_consistency']['name']}} <b> - ENTERAL : </b> {{$ch['enterally_diet']['name']}} </span>
        </p>
        @endforeach

        @foreach($ChDietsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OBSERVACIONES: </b> {{$ch['observation']}}</span>
        </p>
        @endforeach

        @endisset

        

        @if(count($chbackground) > 0) 

        <hr/>
        
        <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            ANTECEDENTES<br>
        </p>

        @endisset

        @if(count($chbackground) > 0)

        <hr/>

        <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ANTECEDENTES</span>
            <span style=display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        @foreach($chbackground as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">{{$ch['ch_type_background']['name']}} <b> - REVISIÓN: </b> {{$ch['revision']}} <b> - OBSERVACIÓN: </b> {{$ch['observation']}} </span>
        </p>
        @endforeach

        @endisset


        

        @if(count($ChEvoSoap) > 0 || count($ChPhysicalExamEvo) > 0 || count($ChVitalSignsEvo) > 0 || count($ChDiagnosisEvo) > 0 )  
        
        <hr/>

        <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            REGISTRO EVOLUCIÓN MÉDICA<br>
        </p>
        @endisset

        

        @if(count($ChEvoSoap) > 0)

        <hr/>

        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">SOAP</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChEvoSoap as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"> <b> FECHA: </b> {{$ch['created_at']}} <b> - SUBJETIVO: </b> {{$ch['subjective']}} <b> - OBJETIVO: </b> {{$ch['objective']}} </span>
        </p>
        @endforeach
        @endisset

        

        @if(count($ChPhysicalExamEvo) > 0)

        <hr/>

        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">REVISIÓN POR ESTADO FÍSICO</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChPhysicalExamEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">{{$ch['type_ch_physical_exam']['name']}} <b> - REVISIÓN: </b> {{$ch['revision']}} </span>
        </p>
        @endforeach
        @endisset

        

        @if(count($ChVitalSignsEvo) > 0)

        <hr/>

        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">SIGNOS VITALES</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> HORA: </b>{{$ch['clock']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> FRECUENCIA CARDIACA: </b>{{$ch['cardiac_frequency']}}
                                                             <b> - FRECUENCIA RESPIRATORIA: </b>{{$ch['respiratory_frequency']}}
                                                             <b> - TEMPERATURA: </b>{{$ch['temperature']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> VIA DE TOMA: </b>{{$ch['ch_vital_temperature']['name']}}
                                                             <b> - SATURACION DE OXIGENO: </b>{{$ch['oxigen_saturation']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TALLA: </b>{{$ch['size']}}
                                                             <b> - PESO: </b>{{$ch['weight']}}
                                                             <b> - I.M.C: </b>{{$ch['body_mass_index']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TENSIÓN ARTERIAL SISTÓLICA: </b>{{$ch['pressure_systolic']}}
                                                             <b> - TENSIÓN ARTERIAL DIASTÓLICA: </b>{{$ch['pressure_diastolic']}}
                                                             <b> - MEDIA: </b>{{$ch['pressure_half']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ESTADO NEUROLÓGICO: </b>{{$ch['ch_vital_neurological']['name']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> T.PUPILAR IZQUIERDO: </b>{{$ch['pupil_size_left']}}
                                                             <b> - T.PUPILAR DERECHO: </b>{{$ch['pupil_size_right']}}
                                                             <b> - R.LUZ IZQUIERDO: </b>{{$ch['left_reaction']}}
                                                             <b> - R.LUZ IZQUIERDO: </b>{{$ch['right_reaction']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ESTADO HIDRATACIÓN: </b>{{$ch['ch_vital_hydration']['name']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PUPILAS: </b></span>
        </p>

        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> T.PUPILAR IZQUIERDO: </b>{{$ch['pupil_size_left']}}</span>
        </p>
        @endforeach

        
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OTROS:</span>
        </p>

        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> PULSO: </b>{{$ch['pulse']}}
                                                         <b> PVC: </b>{{$ch['venous_pressure']}}
                                                         <b> PRESIÓN INTRACANEANA: </b>{{$ch['intracranial_pressure']}}
                                                         <b> PPC: </b>{{$ch['cerebral_perfusion_pressure']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> PRESIÓN INTRAABDOMINAL: </b>{{$ch['intra_abdominal']}}
                                                         <b> GLUCOMETRIA: </b>{{$ch['glucometry']}}
                                                         <b> OBSERVACIÓN DE GLUCOMETRIA: </b>{{$ch['observations_glucometry']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PRESIÓN ART PULMONAR:</span>
        </p>
        

        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> SISTOLICA: </b>{{$ch['pulmonary_systolic']}}
                                                         <b> DIASTOLICA: </b>{{$ch['pulmonary_diastolic']}}
                                                         <b> MEDIA: </b>{{$ch['pulmonary_half']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PEDIATRÍA - PERÍMETRO:</span>
        </p>
        

        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> CEFÁLICO: </b>{{$ch['head_circunference']}}
                                                         <b> ABDOMINAL: </b>{{$ch['abdominal_perimeter']}}
                                                         <b> TORACICO: </b>{{$ch['chest_perimeter']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ¿TIENE OXIGENO ?:</span>
        </p>
        

        @foreach($ChVitalSignsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt">
            @if($ch['ch_vital_ventilated']!=null)
            <b> MODO VENTILATORIO: </b>{{$ch['ch_vital_ventilated']['name']}}
            @endisset
            @if($ch['oxygen_type']!=null)
            <b> TIPO DE OXIGENO: </b>{{$ch['oxygen_type']['name']}}
            @endisset
            @if($ch['oxygen_type']!=null)
            <b> LITROS POR MINUTOS: </b>{{$ch['liters_per_minute']['name']}}
            @endisset
            @if($ch['oxygen_type']!=null)
            <b> LITROS POR MINUTOS: </b>{{$ch['parameters_signs']['name']}}
            @endisset
                                                         </span>
        </p>
        @endforeach 

        @endisset 

        
        

        @if(count($ChDiagnosisEvo) > 0)

        <hr/>

        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">DIAGNÓSTICO</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChDiagnosisEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">{{$ch['diagnosis']['name']}} - CLASE: {{$ch['ch_diagnosis_class']['name']}} - TIPO: {{$ch['ch_diagnosis_type']['name']}} - OBSERVACIÓN : {{$ch['diagnosis_observation']}} </span>
        </p>
        @endforeach
        @endisset 
        
        

        @if(count($ChOstomies) > 0)

        <hr/>

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

        <hr/>

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

        <hr/>

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

        

        @if(count($ChDietsEvo) > 0)

        <hr/>

        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DIETA RECOMENDADA </b> </span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        

        @foreach($ChDietsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> - ORAL: </b> {{$ch['diet_consistency']['name']}} <b> - ENTERAL : </b> {{$ch['enterally_diet']['name']}} </span>
        </p>
        @endforeach

        @foreach($ChDietsEvo as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OBSERVACIONES: </b> {{$ch['observation']}}</span>
        </p>
        @endforeach
        @endisset

        

        @if(count($ChEvoSoap) > 0 || count($ChPhysicalExamEvo) > 0 || count($ChVitalSignsEvo) > 0 || count($ChDiagnosisEvo) > 0 )  
        
        <hr/>

        <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            ESCALAS<br>
        </p>
        @endisset

        

        
        @if(count($ChScaleNorton) > 0)

        <hr/>

        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ESCALA DE NORTON </b> </span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        

        @foreach($ChScaleNorton as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ESTADO FISICO GENERAL: </b>{{$ch['physical_detail']}}
                                                             <b> - ESTADO MENTAL: </b>{{$ch['mind_detail']}}
                                                             <b> - MOVILIDAD: </b>{{$ch['mobility_detail']}}</span>
        </p>
        @endforeach

        @foreach($ChScaleNorton as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ACTIVIDAD: </b>{{$ch['activity_detail']}}
                                                             <b> - INCONTINENCIA: </b>{{$ch['incontinence_detail']}}</span>
        </p>
        @endforeach

        @foreach($ChScaleNorton as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TOTAL: </b>{{$ch['total']}}<b> / </b>{{$ch['risk']}}</span>
        </p>
        @endforeach

        @endisset

        

        @if(count($ChScaleGlasgow) > 0)

        <hr/>

        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ESCALA DE GLASGOW </b> </span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        

        @foreach($ChScaleGlasgow as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> RESPUESTA MOTORA: </b>{{$ch['motor_detail']}}
                                                             <b> - RESPUESTA VERBAL: </b>{{$ch['verbal_detail']}}
                                                             <b> - APERTURA OCULAR: </b>{{$ch['ocular_detail']}}</span>
        </p>
        @endforeach

        @foreach($ChScaleGlasgow as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TOTAL: </b>{{$ch['total']}} / 15</span>
        </p>
        @endforeach

        @endisset

        

        @if(count($ChScaleNews) > 0)

        <hr/>

        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ESCALA NEWS </b> </span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        

        @foreach($ChScaleNews as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> FRECUENCIA RESPIRATORIA: </b>{{$ch['p_one_detail']}}
                                                             <b> - SATURACIÓN DE OXIGENO (SP02): </b>{{$ch['p_two_detail']}}</span>
        </p>
        @endforeach

        @foreach($ChScaleNews as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> SP02 EN CASO DE EPOC: </b>{{$ch['p_three_detail']}}
                                                             <b> - FRECUENCIA CARDIACA: </b>{{$ch['p_four_detail']}}</span>
        </p>
        @endforeach

        @foreach($ChScaleNews as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TEMPERATURA: </b>{{$ch['p_five_detail']}}
                                                             <b> - TENSION ARTERIAL SISTOLICA: </b>{{$ch['p_six_value']}}</span>
        </p>
        @endforeach

        @foreach($ChScaleNews as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ¿OXIGENO SUPLEMENTARIO?: </b>{{$ch['p_seven_detail']}}
                                                             <b> - NIVEL DE CONCIENCIA: </b>{{$ch['p_eight_detail']}}</span>
        </p>
        @endforeach

        @foreach($ChScaleNews as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> CALIFICACION: </b>{{$ch['qualification']}}<b> / </b>{{$ch['risk']}}<b> / </b>{{$ch['response']}}</span>
        </p>
        @endforeach
        
        <hr/>

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
        @if(count($ChPosition) > 0 || count($ChHairValoration) > 0 
         || count($ChOstomies) > 0 || count($ChPhysicalExam) > 0 
         || count($ChVitalSigns) > 0 ) 

         <hr/>

        <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            INGRESO<br>
        </p>

        
        @endisset

        

        @if(count($ChPosition) > 0) 

        <hr/>

        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">NOTA DE INGRESO</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> POSICIONES:</b> </span>
        </p>

        @foreach($ChPosition as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> POSICIÓN: </b> {{$ChPosition[0]['patient_position']['name']}}</span>
        </p>
        @endforeach

        @foreach($ChPosition as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OBSERVACIONES: </b> {{$ChPosition[0]['observation']}}</span>
        </p>
        @endforeach

        @endisset

        @if(count($ChHairValoration) > 0) 

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> VALORACION CAPILAR:</b> </span>
        </p>

        @foreach($ChPosition as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> CUERO CABELLUDO: </b> {{$ChHairValoration[0]['hair_revision']}}</span>
        </p>
        @endforeach

        @foreach($ChPosition as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OBSERVACIONES: </b> {{$ChHairValoration[0]['observation']}}</span>
        </p>
        @endforeach

        @endisset

        @if(count($ChOstomies) > 0) 

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> OSTOMIAS:</b> </span>
        </p>

        @foreach($ChPosition as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OSTOMIA: </b> {{$ChOstomies[0]['ostomy']['name']}}</span>
        </p>
        @endforeach

        @foreach($ChPosition as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OBSERVACIONES: </b> {{$ChOstomies[0]['observation']}}</span>
        </p>
        @endforeach

        <hr/>

        @endisset

        @if(count($ChPhysicalExam) > 0) 
        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">EXAMEN FISICO</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        @foreach($ChPhysicalExam as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">{{$ch['type_ch_physical_exam']['name']}} <b> - REVISIÓN: </b> {{$ch['revision']}} <b> DESCRIPCION: </b> {{$ChPhysicalExam[0]['description']}}</span> </span>
        </p>
        @endforeach

        <hr/>

        @endisset

        @if(count($ChVitalSigns) > 0)
        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">SIGNOS VITALES</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChVitalSigns as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> HORA: </b>{{$ch['clock']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSigns as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> FRECUENCIA CARDIACA: </b>{{$ch['cardiac_frequency']}}
                                                             <b> - FRECUENCIA RESPIRATORIA: </b>{{$ch['respiratory_frequency']}}
                                                             <b> - TEMPERATURA: </b>{{$ch['temperature']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSigns as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> VIA DE TOMA: </b>{{$ch['ch_vital_temperature']['name']}}
                                                             <b> - SATURACION DE OXIGENO: </b>{{$ch['oxigen_saturation']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSigns as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TALLA: </b>{{$ch['size']}}
                                                             <b> - PESO: </b>{{$ch['weight']}}
                                                             <b> - I.M.C: </b>{{$ch['body_mass_index']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSigns as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TENSIÓN ARTERIAL SISTÓLICA: </b>{{$ch['pressure_systolic']}}
                                                             <b> - TENSIÓN ARTERIAL DIASTÓLICA: </b>{{$ch['pressure_diastolic']}}
                                                             <b> - MEDIA: </b>{{$ch['pressure_half']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSigns as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ESTADO NEUROLÓGICO: </b>{{$ch['ch_vital_neurological']['name']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSigns as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> T.PUPILAR IZQUIERDO: </b>{{$ch['pupil_size_left']}}
                                                             <b> - T.PUPILAR DERECHO: </b>{{$ch['pupil_size_right']}}
                                                             <b> - R.LUZ IZQUIERDO: </b>{{$ch['left_reaction']}}
                                                             <b> - R.LUZ IZQUIERDO: </b>{{$ch['right_reaction']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSigns as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ESTADO HIDRATACIÓN: </b>{{$ch['ch_vital_hydration']['name']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OTROS:</span>
        </p>

        @foreach($ChVitalSigns as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> PULSO: </b>{{$ch['pulse']}}
                                                         <b> PVC: </b>{{$ch['venous_pressure']}}
                                                         <b> PRESIÓN INTRACANEANA: </b>{{$ch['intracranial_pressure']}}
                                                         <b> PPC: </b>{{$ch['cerebral_perfusion_pressure']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSigns as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> PRESIÓN INTRAABDOMINAL: </b>{{$ch['intra_abdominal']}}
                                                         <b> GLUCOMETRIA: </b>{{$ch['glucometry']}}
                                                         <b> OBSERVACIÓN DE GLUCOMETRIA: </b>{{$ch['observations_glucometry']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PRESIÓN ART PULMONAR:</span>
        </p>
        

        @foreach($ChVitalSigns as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> SISTOLICA: </b>{{$ch['pulmonary_systolic']}}
                                                         <b> DIASTOLICA: </b>{{$ch['pulmonary_diastolic']}}
                                                         <b> MEDIA: </b>{{$ch['pulmonary_half']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PEDIATRÍA - PERÍMETRO:</span>
        </p>
        

        @foreach($ChVitalSigns as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> CEFÁLICO: </b>{{$ch['head_circunference']}}
                                                         <b> ABDOMINAL: </b>{{$ch['abdominal_perimeter']}}
                                                         <b> TORACICO: </b>{{$ch['chest_perimeter']}}</span>
        </p>
        @endforeach

        @if($ch['ch_vital_ventilated']!=null||$ch['oxygen_type']!=null||$ch['liters_per_minute']!=null||$ch['parameters_signs']!=null )
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ¿TIENE OXIGENO ?:</span>
        </p>
        @endisset
        
        @foreach($ChVitalSigns as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt">
            @if($ch['ch_vital_ventilated']!=null)
            <b> MODO VENTILATORIO: </b>{{$ch['ch_vital_ventilated']['name']}}
            @endisset
            @if($ch['oxygen_type']!=null)
            <b> TIPO DE OXIGENO: </b>{{$ch['oxygen_type']['name']}}
            @endisset
            @if($ch['oxygen_type']!=null)
            <b> LITROS POR MINUTOS: </b>{{$ch['liters_per_minute']['name']}}
            @endisset
            @if($ch['oxygen_type']!=null)
            <b> LITROS POR MINUTOS: </b>{{$ch['parameters_signs']['name']}}
            @endisset
                                                         </span>
        </p>    

        @endforeach 

        <hr/>

        @endisset

        @if(count($ChPositionNE) > 0 || count($ChHairValorationNE) > 0 || count($ChOstomiesNE) > 0
         || count($ChPhysicalExamNE) > 0 || count($ChVitalSignsNE) > 0 || count($ChNursingProcedure) > 0
         || count($ChCarePlan) > 0 || count($ChLiquidControl) > 0 ) 
        <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            NOTA DE ENFERMERIA<br>
        </p>

        
        @endisset

        <hr/>

        

        @if(count($ChPositionNE) > 0)
        <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">DESCRIPCION NOTA</span>
            <span style=display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> POSICIONES:</b> </span>
        </p>

        @foreach($ChPositionNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> POSICIÓN: </b> {{$ChPositionNE[0]['patient_position']['name']}}</span>
        </p>
        @endforeach

        @if(count($ChHairValorationNE) > 0) 

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> VALORACION CAPILAR:</b> </span>
        </p>

        @foreach($ChHairValorationNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> CUERO CABELLUDO: </b> {{$ChHairValorationNE[0]['hair_revision']}}</span>
        </p>
        @endforeach

        @foreach($ChHairValorationNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OBSERVACIONES: </b> {{$ChHairValorationNE[0]['observation']}}</span>
        </p>
        @endforeach

        
        @endisset
        @endisset

        @if(count($ChOstomiesNE) > 0) 

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> OSTOMIAS:</b> </span>
        </p>

        @foreach($ChOstomiesNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OSTOMIA: </b> {{$ChOstomiesNE[0]['ostomy']['name']}}</span>
        </p>
        @endforeach

        @foreach($ChOstomiesNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OBSERVACIONES: </b> {{$ChOstomiesNE[0]['observation']}}</span>
        </p>
        @endforeach

        <hr/>

        @endisset

        @if(count($ChPhysicalExamNE) > 0) 
        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">EXAMEN FISICO</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        @foreach($ChPhysicalExamNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">{{$ch['type_ch_physical_exam']['name']}} <b> - REVISIÓN: </b> {{$ch['revision']}} <b> DESCRIPCION: </b> {{$ChPhysicalExamNE[0]['description']}}</span> </span>
        </p>
        @endforeach

        <hr/>

        @endisset

        @if(count($ChVitalSignsNE) > 0)
        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">SIGNOS VITALES</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        @foreach($ChVitalSignsNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> HORA: </b>{{$ch['clock']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> FRECUENCIA CARDIACA: </b>{{$ch['cardiac_frequency']}}
                                                             <b> - FRECUENCIA RESPIRATORIA: </b>{{$ch['respiratory_frequency']}}
                                                             <b> - TEMPERATURA: </b>{{$ch['temperature']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> VIA DE TOMA: </b>{{$ch['ch_vital_temperature']['name']}}
                                                             <b> - SATURACION DE OXIGENO: </b>{{$ch['oxigen_saturation']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TALLA: </b>{{$ch['size']}}
                                                             <b> - PESO: </b>{{$ch['weight']}}
                                                             <b> - I.M.C: </b>{{$ch['body_mass_index']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TENSIÓN ARTERIAL SISTÓLICA: </b>{{$ch['pressure_systolic']}}
                                                             <b> - TENSIÓN ARTERIAL DIASTÓLICA: </b>{{$ch['pressure_diastolic']}}
                                                             <b> - MEDIA: </b>{{$ch['pressure_half']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ESTADO NEUROLÓGICO: </b>{{$ch['ch_vital_neurological']['name']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> T.PUPILAR IZQUIERDO: </b>{{$ch['pupil_size_left']}}
                                                             <b> - T.PUPILAR DERECHO: </b>{{$ch['pupil_size_right']}}
                                                             <b> - R.LUZ IZQUIERDO: </b>{{$ch['left_reaction']}}
                                                             <b> - R.LUZ IZQUIERDO: </b>{{$ch['right_reaction']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ESTADO HIDRATACIÓN: </b>{{$ch['ch_vital_hydration']['name']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OTROS:</span>
        </p>

        @foreach($ChVitalSignsNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> PULSO: </b>{{$ch['pulse']}}
                                                         <b> PVC: </b>{{$ch['venous_pressure']}}
                                                         <b> PRESIÓN INTRACANEANA: </b>{{$ch['intracranial_pressure']}}
                                                         <b> PPC: </b>{{$ch['cerebral_perfusion_pressure']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> PRESIÓN INTRAABDOMINAL: </b>{{$ch['intra_abdominal']}}
                                                         <b> GLUCOMETRIA: </b>{{$ch['glucometry']}}
                                                         <b> OBSERVACIÓN DE GLUCOMETRIA: </b>{{$ch['observations_glucometry']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PRESIÓN ART PULMONAR:</span>
        </p>
        

        @foreach($ChVitalSignsNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> SISTOLICA: </b>{{$ch['pulmonary_systolic']}}
                                                         <b> DIASTOLICA: </b>{{$ch['pulmonary_diastolic']}}
                                                         <b> MEDIA: </b>{{$ch['pulmonary_half']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PEDIATRÍA - PERÍMETRO:</span>
        </p>
        

        @foreach($ChVitalSignsNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> CEFÁLICO: </b>{{$ch['head_circunference']}}
                                                         <b> ABDOMINAL: </b>{{$ch['abdominal_perimeter']}}
                                                         <b> TORACICO: </b>{{$ch['chest_perimeter']}}</span>
        </p>
        @endforeach

        @if($ch['ch_vital_ventilated']!=null||$ch['oxygen_type']!=null||$ch['liters_per_minute']!=null||$ch['parameters_signs']!=null )
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ¿TIENE OXIGENO ?:</span>
        </p>
        @endisset
        
        @foreach($ChVitalSignsNE as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt">
            @if($ch['ch_vital_ventilated']!=null)
            <b> MODO VENTILATORIO: </b>{{$ch['ch_vital_ventilated']['name']}}
            @endisset
            @if($ch['oxygen_type']!=null)
            <b> TIPO DE OXIGENO: </b>{{$ch['oxygen_type']['name']}}
            @endisset
            @if($ch['oxygen_type']!=null)
            <b> LITROS POR MINUTOS: </b>{{$ch['liters_per_minute']['name']}}
            @endisset
            @if($ch['oxygen_type']!=null)
            <b> LITROS POR MINUTOS: </b>{{$ch['parameters_signs']['name']}}
            @endisset
                                                         </span>
        </p>    

        @endforeach 

        <hr/>

        @endisset

        @if(count($ChNursingProcedure) > 0) 
        <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">PROCEDIMIENTOS DE ENFERMERIA</span>
            <span style=display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        @foreach($ChNursingProcedure as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PROCEDIMIENTO: </b>{{$ChNursingProcedure[0]['nursing_procedure']['name']}}</span>
        </p>
        @endforeach

        @foreach($ChNursingProcedure as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OBSERVACIONES: </b> {{$ChNursingProcedure[0]['observation']}}</span>
        </p>
        @endforeach

        <hr/>

        @endisset

        @if(count($ChCarePlan) > 0) 
        <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">PLAN DE CUIDADOS</span>
            <span style=display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        @foreach($ChCarePlan as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PLAN DE CUIDADOS EN ENFERMERIA: </b>{{$ChCarePlan[0]['nursing_care_plan']['description']}}</span>
        </p>
        @endforeach

        <hr/>

        @endisset

        @if(count($ChLiquidControl) > 0) 
        <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">CONTROL DE LIQUIDOS</span>
            <span style=display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        <p style="text-align: center; margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> ADMINISTRADOS: </b></span>
        </p>

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> TIPO DE ADMINISTRACION: </b></span>
        </p>

        @foreach($ChLiquidControl as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TIPO: </b>{{$ChLiquidControl[0]['ch_route_fluid']['name']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> TRANSFUSIONES: </b></span>
        </p>

        @foreach($ChLiquidControl as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">
                @if($ch['clock']!=null)
                <b> HORA DE ADMINISTRACIÒN: </b>{{$ChLiquidControl[0]['clock']}}
                @endisset
                @if($ch['ch_type_fluid']!=null)
                <b> ADMINISTRACIÒN: </b>{{$ChLiquidControl[0]['ch_type_fluid']['name']}}
                @endisset
                </span>
        </p>
        @endforeach

        @foreach($ChLiquidControl as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">
                @if($ch['delivered_volume']!=null)
                <b> VOLUMEN ADMINISTRADO: </b>{{$ChLiquidControl[0]['delivered_volume']}}
                @endisset
                @if($ch['bag_number']!=null)
                <b> CODIGO DE BOLSA: </b>{{$ChLiquidControl[0]['bag_number']}}
                @endisset
                </span>
        </p>
        @endforeach

        <p style="text-align: center; margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> ELIMINADOS: </b></span>
        </p>

        @foreach($ChLiquidControl as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> VIA DE ELIMINACION: </b>{{$ChLiquidControl[1]['ch_route_fluid']['name']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> OTROS: </b></span>
        </p>

        @foreach($ChLiquidControl as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">
                @if($ch['clock']!=null)
                <b> HORA DE ADMINISTRACIÒN: </b>{{$ChLiquidControl[1]['clock']}}
                @endisset
                @if($ch['ch_type_fluid']!=null&&$ch['ch_type_fluid']['ch_route_fluid_id'] == 7 )
                <b> RUTA ELIMINACION: </b>{{$ChLiquidControl[1]['ch_type_fluid']['name']}}
                @endisset
                @if($ch['ch_type_fluid']!=null&&$ch['ch_type_fluid']['ch_route_fluid_id'] == 5)
                <b> DIURESIS: </b>{{$ChLiquidControl[1]['ch_type_fluid']['name']}}
                @endisset
                @if($ch['ch_type_fluid']!=null&&$ch['ch_type_fluid']['ch_route_fluid_id'] == 6)
                <b> CONSISTENCIA: </b>{{$ChLiquidControl[1]['ch_type_fluid']['name']}}
                @endisset
                </span>
        </p>
        @endforeach

        @foreach($ChLiquidControl as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">
                @if($ch['delivered_volume']!=null)
                <b> VOLUMEN ELIMINADO: </b>{{$ChLiquidControl[1]['delivered_volume']}}
                @endisset
                </span>
        </p>
        @endforeach

        <hr/>

        @endisset

        @if(count($ChSkinValoration) > 0) 
        <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            VALORACION DE LA PIEL<br>
        </p>

        <hr/>

        @foreach($ChSkinValoration as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">
                <b> DIAGNÓSTICO: </b>{{$ChSkinValoration[0]['diagnosis']['name']}}
            </span>
        </p>
        @endforeach

        @foreach($ChSkinValoration as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">

                                <!-- cabeza -->

                @if($ch['body_region']!=null&&$ch['body_region']['id'] == 1)
                <b> PARTE DEL CUERPO: </b>{{$ChSkinValoration[0]['body_region']['name']}}

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 1)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[0]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[0]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[0]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[0]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[0]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[0]['observation']}}
                         @endisset  

                    @endisset  

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 2)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[0]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[0]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[0]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[0]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[0]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[0]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 3)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[0]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[0]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[0]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[0]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[0]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[0]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 4)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[0]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[0]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[0]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[0]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[0]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[0]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 5)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[0]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[0]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[0]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[0]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[0]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[0]['observation']}}
                         @endisset  

                    @endisset
                    
                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 6)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[0]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[0]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[0]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[0]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[0]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[0]['observation']}}
                         @endisset  

                    @endisset 

                @endisset 
                
                                <!-- Maleolos -->

                @if($ch['body_region']!=null&&$ch['body_region']['id'] == 2)
                <b> PARTE DEL CUERPO: </b>{{$ChSkinValoration[1]['body_region']['name']}}

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 1)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[1]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[1]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[1]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[1]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[1]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[1]['observation']}}
                         @endisset  

                    @endisset  

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 2)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[1]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[1]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[1]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[1]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[1]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[1]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 3)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[1]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[1]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[1]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[1]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[1]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[1]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 4)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[1]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[1]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[1]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[1]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[1]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[1]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 5)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[1]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[1]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[1]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[1]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[1]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[1]['observation']}}
                         @endisset  

                    @endisset
                    
                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 6)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[1]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[1]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[1]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[1]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[1]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[1]['observation']}}
                         @endisset  

                    @endisset 

                @endisset

                                <!-- Miembros inferiores -->

                @if($ch['body_region']!=null&&$ch['body_region']['id'] == 3)
                <b> PARTE DEL CUERPO: </b>{{$ChSkinValoration[2]['body_region']['name']}}

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 1)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[2]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[2]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[2]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[2]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[2]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[2]['observation']}}
                         @endisset  

                    @endisset  

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 2)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[2]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[2]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[2]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[2]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[2]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[2]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 3)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[2]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[2]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[2]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[2]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[2]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[2]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 4)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[2]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[2]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[2]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[2]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[2]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[2]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 5)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[2]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[2]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[2]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[2]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[2]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[2]['observation']}}
                         @endisset  

                    @endisset
                    
                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 6)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[2]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[2]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[2]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[2]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[2]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[2]['observation']}}
                         @endisset  

                    @endisset 

                @endisset

                                <!-- Pies -->

                @if($ch['body_region']!=null&&$ch['body_region']['id'] == 4)
                <b> PARTE DEL CUERPO: </b>{{$ChSkinValoration[3]['body_region']['name']}}

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 1)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[3]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[3]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[3]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[3]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[3]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[3]['observation']}}
                         @endisset  

                    @endisset  

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 2)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[3]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[3]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[3]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[3]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[3]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[3]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 3)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[3]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[3]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[3]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[3]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[3]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[3]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 4)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[3]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[3]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[3]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[3]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[3]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[3]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 5)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[3]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[3]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[3]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[3]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[3]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[3]['observation']}}
                         @endisset  

                    @endisset
                    
                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 6)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[3]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[3]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[3]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[3]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[3]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[3]['observation']}}
                         @endisset  

                    @endisset 

                @endisset

                                <!-- Region dorsal -->

                @if($ch['body_region']!=null&&$ch['body_region']['id'] == 5)
                <b> PARTE DEL CUERPO: </b>{{$ChSkinValoration[4]['body_region']['name']}}

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 1)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[4]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[4]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[4]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[4]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[4]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[4]['observation']}}
                         @endisset  

                    @endisset  

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 2)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[4]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[4]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[4]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[4]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[4]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[4]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 3)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[4]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[4]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[4]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[4]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[4]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[4]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 4)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[4]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[4]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[4]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[4]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[4]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[4]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 5)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[4]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[4]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[4]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[4]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[4]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[4]['observation']}}
                         @endisset  

                    @endisset
                    
                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 6)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[4]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[4]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[4]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[4]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[4]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[4]['observation']}}
                         @endisset  

                    @endisset 

                @endisset

                                <!-- Region glutea -->

                @if($ch['body_region']!=null&&$ch['body_region']['id'] == 6)
                <b> PARTE DEL CUERPO: </b>{{$ChSkinValoration[5]['body_region']['name']}}

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 1)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[5]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[5]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[5]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[5]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[5]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[5]['observation']}}
                         @endisset  

                    @endisset  

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 2)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[5]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[5]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[5]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[5]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[5]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[5]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 3)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[5]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[5]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[5]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[5]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[5]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[5]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 4)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[5]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[5]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[5]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[5]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[5]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[5]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 5)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[5]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[5]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[5]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[5]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[5]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[5]['observation']}}
                         @endisset  

                    @endisset
                    
                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 6)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[5]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[5]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[5]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[5]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[5]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[5]['observation']}}
                         @endisset  

                    @endisset 

                @endisset

                                <!-- Region lumbar -->

                @if($ch['body_region']!=null&&$ch['body_region']['id'] == 7)
                <b> PARTE DEL CUERPO: </b>{{$ChSkinValoration[6]['body_region']['name']}}

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 1)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[6]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[6]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[6]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[6]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[6]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[6]['observation']}}
                         @endisset  

                    @endisset  

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 2)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[6]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[6]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[6]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[6]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[6]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[6]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 3)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[6]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[6]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[6]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[6]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[6]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[6]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 4)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[6]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[6]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[6]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[6]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[6]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[6]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 5)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[6]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[6]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[6]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[6]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[6]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[6]['observation']}}
                         @endisset  

                    @endisset
                    
                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 6)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[6]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[6]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[6]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[6]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[6]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[6]['observation']}}
                         @endisset  

                    @endisset 

                @endisset

                                <!-- Region sacra -->

                @if($ch['body_region']!=null&&$ch['body_region']['id'] == 8)
                <b> PARTE DEL CUERPO: </b>{{$ChSkinValoration[7]['body_region']['name']}}

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 1)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[7]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[7]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[7]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[7]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[7]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[7]['observation']}}
                         @endisset  

                    @endisset  

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 2)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[7]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[7]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[7]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[7]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[7]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[7]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 3)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[7]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[7]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[7]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[7]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[7]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[7]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 4)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[7]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[7]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[7]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[7]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[7]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[7]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 5)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[7]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[7]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[7]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[7]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[7]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[7]['observation']}}
                         @endisset  

                    @endisset
                    
                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 6)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[7]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[7]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[7]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[7]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[7]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[7]['observation']}}
                         @endisset  

                    @endisset 

                @endisset

                                <!-- Region troncaterica -->

                @if($ch['body_region']!=null&&$ch['body_region']['id'] == 9)
                <b> PARTE DEL CUERPO: </b>{{$ChSkinValoration[8]['body_region']['name']}}

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 1)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[8]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[8]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[8]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[8]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[8]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[8]['observation']}}
                         @endisset  

                    @endisset  

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 2)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[8]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[8]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[8]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[8]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[8]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[8]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 3)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[8]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[8]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[8]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[8]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[8]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[8]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 4)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[8]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[8]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[8]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[8]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[8]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[8]['observation']}}
                         @endisset  

                    @endisset 

                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 5)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[8]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[8]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[8]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[8]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[8]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[8]['observation']}}
                         @endisset  

                    @endisset
                    
                    @if($ch['skin_status']!=null&&$ch['skin_status']['id'] == 6)
                    <b> ESTADO DE LA PIEL: </b>{{$ChSkinValoration[8]['skin_status']['name']}}

                         @if($ch['exudate']!=null)
                         <b> EXUDADO: </b>{{$ChSkinValoration[8]['exudate']}}
                         @endisset
                         @if($ch['concentrated']!=null)
                         <b> TIPO EXUDADO: </b>{{$ChSkinValoration[8]['concentrated']}}
                         @endisset
                         @if($ch['infection_sign']!=null)
                         <b> SIGNOS DE INFECCION: </b>{{$ChSkinValoration[8]['infection_sign']}}
                         @endisset
                         @if($ch['surrounding_skin']!=null)
                         <b> PIELL CIRCUNDANTE: </b>{{$ChSkinValoration[8]['surrounding_skin']}}
                         @endisset
                         @if($ch['observation']!=null)
                         <b> OBSERVACION: </b>{{$ChSkinValoration[8]['observation']}}
                         @endisset  

                    @endisset 

                @endisset
                
                
                
               
                
                
            </span>
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