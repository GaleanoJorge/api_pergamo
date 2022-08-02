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
            <span style="font-family:Calibri; letter-spacing:-3pt"> </span><span style="font-family:Calibri"> <b> Tipo de régimen: </b> </span><span style="font-family:Calibri"></span><span 
                  style="font-family:Calibri">{{$chrecord[0]['admissions']['contract']['type_briefcase']['name']}}</span><span style="font-family:Calibri">
        
            
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

        <hr/>

        @endisset


        @if(count($ChScaleNorton) > 0) 
        <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            ESCALAS<br>
        </p>

        <hr/>

        <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA NORTON</span>
            <span style=display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
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


        @if(count($ChScaleJhDownton) > 0)

        <hr/>

        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ESCALA J.H.DOWNTON </b> </span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        

        @foreach($ChScaleJhDownton as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> MEDICACION: </b>{{$ch['medication_detail']}}
                                                             <b> - DEFICIT SENSORIALES: </b>{{$ch['deficiency_detail']}}
                                                             <b> - DEAMBULACION: </b>{{$ch['falls_detail']}}</span>
        </p>
        @endforeach

        @foreach($ChScaleJhDownton as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ESTADO MENTAL: </b>{{$ch['mental_detail']}}
                                                             <b> - CAIDAS PREVIAS: </b>{{$ch['wandering_detail']}}</span>
        </p>
        @endforeach

        @foreach($ChScaleJhDownton as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TOTAL: </b>{{$ch['total']}}<b> / </b>{{$ch['risk']}}</span>
        </p>
        @endforeach

        @endisset

        @if(count($ChScaleBraden) > 0)

        <hr/>

        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ESCALA BRADEN </b> </span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        

        @foreach($ChScaleBraden as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PERSEPCIÓN SENSORIAL: </b>{{$ch['sensory_detail']}}
                                                             <b> - EXPOSICIÓN A LA HUMEDAD: </b>{{$ch['humidity_detail']}}</span>
        </p>
        @endforeach

        @foreach($ChScaleBraden as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ACTIVIDAD: </b>{{$ch['activity_detail']}}
                                                             <b> - MOVILIDAD: </b>{{$ch['mobility_detail']}}</span>
        </p>
        @endforeach

        @foreach($ChScaleBraden as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> NUTRICION: </b>{{$ch['nutrition_detail']}}
                                                             <b> - ROCE Y PELIGRO DE LESIONES: </b>{{$ch['lesion_detail']}}</span>
        </p>
        @endforeach

        @foreach($ChScaleBraden as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TOTAL: </b>{{$ch['total']}}<b> / </b>{{$ch['risk']}}</span>
        </p>
        @endforeach

        <hr/>

        @endisset

        @if(count($ChScaleNorton) > 0) 
        <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            APLICACIÓN DE MEDICAMENTOS<br>
        </p>

        <hr/>

        <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">APLICACIÓN</span>
            <span style=display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>


        @endisset


        @endisset


        <!-- TERAPIUA OCUPACIONAL -->
        @if($chrecord[0]['ch_type_id'] == 6 ) 

        <hr/>

        @if(count($chevalorationot) > 0) 
        <p style="text-align: center;margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            INGRESO<br>
        </p>

        

        @endisset
        @if(count($chevalorationot) > 0) 

        <hr/>

        <p style="text-align: center;margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">VALORACION TERAPEUTICA</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
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

        @if(count($ChVitalSigns) > 0) 
        
        <hr/>

        <p style="text-align: center;margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
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
        
        @if(count($ChEOccHistoryOT) > 0) 
        
        <hr/>

        <p style="text-align: center;margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">HISTORIA OCUPACIONAL</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        @foreach($ChEOccHistoryOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OCUPACIÓN: </b>{{$ch['ocupation']}}
                                                             @if($ch['enterprice_employee']!=null)
                                                             <b> ANTIGÛEDAD EN LA EMPRESA: </b>{{$ch['enterprice_employee']}}
                                                             @endisset
                                                             @if($ch['work_employee']!=null)
                                                             <b> HORARIO DE TRABAJO: </b>{{$ch['work_employee']}}
                                                             @endisset
                                                             @if($ch['work_independent']!=null)
                                                             <b> HORARIO DE TRABAJO: </b>{{$ch['work_independent']}}
                                                             @endisset
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEOccHistoryOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt">@if($ch['shift_employee']!=null)
                                                             <b> REALIZA TURNOS:: </b>{{$ch['shift_employee']}}
                                                             @endisset
                                                             @if($ch['observation_employee']!=null)
                                                             <b> OBSERVACIONES: </b>{{$ch['observation_employee']}}
                                                             @endisset
                                                             @if($ch['shift_independent']!=null)
                                                             <b> REALIZA TURNOS:: </b>{{$ch['shift_independent']}}
                                                             @endisset
                                                             @if($ch['observation_independent']!=null)
                                                             <b> OBSERVACIONES: </b>{{$ch['observation_independent']}}
                                                             @endisset
                                                             @if($ch['observation_home']!=null)
                                                             <b> OBSERVACIONES: </b>{{$ch['observation_home']}}
                                                             @endisset
                                                            </span>
        </p>
        @endforeach

        @endisset

        @if(count($ChEPastOT) > 0) 
        
        <hr/>

        <p style="text-align: center;margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ANTECEDENTES OCUPACIONALES</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        @foreach($ChEPastOT as $ch)
        <p style="text-align: center; margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> NUCLEO FAMILIAR </b>
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEPastOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b></b>
                                                             @if($ch['mother']!=null)
                                                             <b> </b>{{$ch['mother']}}
                                                             @endisset
                                                             @if($ch['dad']!=null)
                                                             <b>-</b>{{$ch['dad']}}
                                                             @endisset
                                                             @if($ch['spouse']!=null)
                                                             <b>-</b>{{$ch['spouse']}}
                                                             @endisset
                                                             @if($ch['sons']!=null)
                                                             <b>-</b>{{$ch['sons']}}
                                                             @endisset
                                                             @if($ch['uncles']!=null)
                                                             <b>-</b>{{$ch['uncles']}}
                                                             @endisset
                                                             @if($ch['grandparents']!=null)
                                                             <b>-</b>{{$ch['grandparents']}}
                                                             @endisset
                                                             @if($ch['others']!=null)
                                                             <b>-</b>{{$ch['others']}}
                                                             @endisset
                                                             <b> NUMERO DE HIJOS: </b>{{$ch['number_childrens']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEPastOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OBSERVACION SOBRE GRUPO FAMILIAR : </b>
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEPastOT as $ch)
        <p style="text-align: center; margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:pt"><b> NIVEL DE ESCOLARIDAD Y CAPACITACION </b>
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEPastOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> NIVEL ACADEMICO : </b>{{$ch['academy']}}
                                                             <b> ESTADO ACADEMICO : </b>{{$ch['level_academy']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEPastOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OBSERVACIONES: </b>{{$ch['observation_schooling_training']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEPastOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TRATAMIENTO TERAPEUTICO?: </b>{{$ch['terapy']}}
                                                             <b> OBSERVACIONES?: </b>{{$ch['observation_terapy']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEPastOT as $ch)
        <p style="text-align: center; margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> HABITOS </b>
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEPastOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> FUMAS?: </b>{{$ch['smoke']}}
                                                             @if($ch['f_smoke']!=null)
                                                             <b> CON QUE FRECUENCIA?: </b>{{$ch['f_smoke']}}
                                                             @endisset
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEPastOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> BEBES?: </b>{{$ch['alcohol']}}
                                                             @if($ch['f_alcohol']!=null)
                                                             <b> CON QUE FRECUENCIA?: </b>{{$ch['f_alcohol']}}
                                                             @endisset
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEPastOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PRACTICA DEPORTE?: </b>{{$ch['sport']}}
                                                             @if($ch['f_sport']!=null)
                                                             <b> CON QUE FRECUENCIA?: </b>{{$ch['f_sport']}}
                                                             @endisset
                                                             @if($ch['sport_practice_observation']!=null)
                                                             <b> OBSERVACION DEPORTIVA: </b>{{$ch['sport_practice_observation']}}
                                                             @endisset
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEPastOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OBSERVACIONES: </b>{{$ch['observation']}}
                                                            </span>
        </p>
        @endforeach


        @if(count($ChEDailyActivitiesOT) > 0) 

        <hr/>
        
        <p style="text-align: center;margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ACTIVIDADES VIDA DIARIA</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        @foreach($ChEDailyActivitiesOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> COCINAR: </b>{{$ch['cook']}}
                                                             <b> CUIDAR NIÑOS: </b>{{$ch['kids']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEDailyActivitiesOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> LAVAR: </b>{{$ch['wash']}}
                                                             <b> JUGAR JUEGOS DE AZAR: </b>{{$ch['game']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEDailyActivitiesOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PLANCHAR: </b>{{$ch['ironing']}}
                                                             <b> CAMINAR: </b>{{$ch['walk']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEDailyActivitiesOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ASEAR: </b>{{$ch['clean']}}
                                                             <b> PRACTICAR DEPORTE: </b>{{$ch['sport']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEDailyActivitiesOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DECORAR: </b>{{$ch['decorate']}}
                                                             <b> REUNIONES SOCIALES: </b>{{$ch['social']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEDailyActivitiesOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> REALIZAR ACTIVIDADES DE FLORISTERIA: </b>{{$ch['act_floristry']}}
                                                             <b> VISITAR AMIGOS: </b>{{$ch['friends']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEDailyActivitiesOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> LEER: </b>{{$ch['read']}}
                                                             <b> PRACTICAR GRUPOS POLITICOS: </b>{{$ch['politic']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEDailyActivitiesOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> VER TELEVISION: </b>{{$ch['view_tv']}}
                                                             <b> PRACTICAR GRUPOS RELIGIOSOS: </b>{{$ch['religion']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEDailyActivitiesOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ESCRIBIR: </b>{{$ch['write']}}
                                                             <b> CUIDAR Y JUGAR CON HIJOS O NIETOS: </b>{{$ch['look']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEDailyActivitiesOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ARREGLAR ELECTRODOMESTICOS: </b>{{$ch['arrange']}}
                                                             <b> IR DE PASEO CO LA FAMILIA: </b>{{$ch['travel']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEDailyActivitiesOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OBSERVACION ACTIVIDADES: </b>{{$ch['observation_activity']}}
                                                            </span>
        </p>
        @endforeach
        
        @foreach($ChEDailyActivitiesOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> EXAMEN MUSCULAR: </b>{{$ch['test']}}
                                                             <b> OBSERVACION MUSCULAR: </b>{{$ch['observation_test']}}
                                                            </span>
        </p>
        @endforeach



        @endisset

        @endisset

        @if(count($ChEMSFunPatOT) > 0) 

        <hr/>

        <p style="text-align: center;margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">HABILIDADES MOTORAS</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        <p style="text-align: center;margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b>PATRONES FUNCIONALES</b></span>
        </p>

        @foreach($ChEMSFunPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> MANO-CABEZA: </b>{{$ch['head_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> MANO-CABEZA:  </b>{{$ch['head_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSFunPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> MANO-BOCA: </b>{{$ch['mouth_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> MANO-BOCA:  </b>{{$ch['mouth_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSFunPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> MANO-HOMBRO: </b>{{$ch['shoulder_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> MANO-HOMBRO:  </b>{{$ch['shoulder_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSFunPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> MANO-ESPALDA: </b>{{$ch['back_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> MANO-ESPALDA:  </b>{{$ch['shoulder_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSFunPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> MANO-CINTURA: </b>{{$ch['waist_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> MANO-CINTURA:  </b>{{$ch['waist_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSFunPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> MANO-RODILLA: </b>{{$ch['knee_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> MANO-RODILLA:  </b>{{$ch['knee_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSFunPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> MANO-PIE: </b>{{$ch['foot_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> MANO-PIE:  </b>{{$ch['foot_left']}}
                                                            </span>
        </p>
        @endforeach

        <p style="text-align: center;margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b>PATRONES INTEGRALES</b></span>
        </p>

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b>ALCANCES</b></span>
        </p>

        @foreach($ChEMSIntPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> ALCANCE ARRIBA: </b>{{$ch['up_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> ALCANCE ARRIBA:  </b>{{$ch['up_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSIntPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> ALCANCE AL LADO: </b>{{$ch['side_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> ALCANCE AL LADO:  </b>{{$ch['side_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSIntPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> ALCANCE ATRAS: </b>{{$ch['backend_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> ALCANCE ATRAS:  </b>{{$ch['backend_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSIntPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> ALCANCE AL FRENTE: </b>{{$ch['frontend_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> ALCANCE AL FRENTE:  </b>{{$ch['frontend_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSIntPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> ALCANCE ABAJO: </b>{{$ch['down_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> ALCANCE ABAJO:  </b>{{$ch['down_left']}}
                                                            </span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b>AGARRES</b></span>
        </p>

        @foreach($ChEMSIntPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> AGARRE A MANO LLENA: </b>{{$ch['full_hand_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> AGARRE A MANO LLENA:  </b>{{$ch['full_hand_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSIntPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> AGARRE CILINDRICO: </b>{{$ch['cylindric_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> AGARRE CILINDRICO:  </b>{{$ch['cylindric_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSIntPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> AGARRE ENGANCHE: </b>{{$ch['hooking_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> AGARRE ENGANCHE:  </b>{{$ch['hooking_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSIntPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> PINZA FINA: </b>{{$ch['fine_clamp_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> PINZA FINA:  </b>{{$ch['fine_clamp_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSIntPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> PINZA TRIPODE: </b>{{$ch['tripod_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> PINZA TRIPODE:  </b>{{$ch['tripod_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSIntPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> OPOSICION: </b>{{$ch['full_hand_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> OPOSICION:  </b>{{$ch['full_hand_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSIntPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> ENRROSCAR: </b>{{$ch['coil_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> ENRROSCAR:  </b>{{$ch['coil_left']}}
                                                            </span>
        </p>
        @endforeach

        <p style="text-align: center;margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b>PATRONES DE MOVIMIENTO</b></span>
        </p>

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> DESPLAZARSE: </b>{{$ch['scroll_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> DESPLAZARSE:  </b>{{$ch['scroll_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> LEVANTAR: </b>{{$ch['get_up_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> LEVANTAR:  </b>{{$ch['get_up_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> EMPUJAR: </b>{{$ch['push_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> EMPUJAR:  </b>{{$ch['push_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> HALAR: </b>{{$ch['pull_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> HALAR:  </b>{{$ch['pull_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> TRANSPORTAR: </b>{{$ch['transport_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> TRANSPORTAR:  </b>{{$ch['transport_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> ALCANZAR: </b>{{$ch['attain_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> ALCANZAR:  </b>{{$ch['attain_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> POSTURA BIPEDA: </b>{{$ch['bipedal_posture_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> POSTURA BIPEDA:  </b>{{$ch['bipedal_posture_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> POSTURA SEDENTE: </b>{{$ch['sitting_posture_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> POSTURA SEDENTE:  </b>{{$ch['sitting_posture_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> POSTURA CUNCLILLAS: </b>{{$ch['squat_posture_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> POSTURA CUNCLILLAS:  </b>{{$ch['squat_posture_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> USO DE AMBAS MANOS: </b>{{$ch['use_both_hands_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> USO DE AMBAS MANOS:  </b>{{$ch['use_both_hands_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> MOVIMIENTOS ALTERNOS: </b>{{$ch['alternating_movements_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> MOVIMIENTOS ALTERNOS:  </b>{{$ch['alternating_movements_left']}}
                                                            </span>
        </p>
        @endforeach

       @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> MOVIMIENTOS DISASOCIADOS: </b>{{$ch['dissociated_movements_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> MOVIMIENTOS DISASOCIADOS:  </b>{{$ch['dissociated_movements_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> MOVIMIENTOS SIMULTANEOS: </b>{{$ch['Simultaneous_movements_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> MOVIMIENTOS SIMULTANEOS:  </b>{{$ch['Simultaneous_movements_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> COORDINACION BIMANUAL: </b>{{$ch['bimanual_coordination_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> COORDINACION BIMANUAL:  </b>{{$ch['bimanual_coordination_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> COORDINACION MANO-OJO: </b>{{$ch['hand_eye_coordination_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> COORDINACION MANO-OJO:  </b>{{$ch['hand_eye_coordination_left']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSMovPatOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>
                                                             <b> COORDINACION CABEZA-PIE: </b>{{$ch['hand_foot_coordination_right']}}
                                                             <b> IZQUIERDA: </b>
                                                             <b> COORDINACION CABEZA-PIE:  </b>{{$ch['hand_foot_coordination_left']}}
                                                            </span>
        </p>
        @endforeach

        <p style="text-align: center;margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b>COINCIDENCIA TERMICA</b></span>
        </p>

        @foreach($ChEMSThermalOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> CALOR: </b>{{$ch['heat']}}
                                                             <b> FRIO: </b>{{$ch['cold']}}
                                                            </span>
        </p>
        @endforeach

        <p style="text-align: center;margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b>DISCRIMINACION AUDITIVA</b></span>
        </p>

        @foreach($ChEMSDisAuditoryOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> REALIZA BUSQUEDA DE FUENTES SONORAS: </b>{{$ch['sound_sources']}}
                                                             <b> PRESENTA HIPERSENSIBILIDAD AUDITIVA: </b>{{$ch['auditory_hyposensitivity']}}
                                                            </span>
        </p>
        @endforeach
 
        @foreach($ChEMSDisAuditoryOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PRESENTA HIPOSENSIBILIDAD AUDITIVA: </b>{{$ch['auditory_hypersensitivity']}}
                                                             <b> PRESENTA RESPUESTA ADAPTATIVA FRENTE A lOS DIFERENTES ESTIMULOS AUDITIVOS: </b>{{$ch['auditory_stimuli']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSDisAuditoryOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> LOGRA DISCRIMINACION AUDITIVA: </b>{{$ch['auditive_discrimination']}}
                                                            </span>
        </p>
        @endforeach

        <p style="text-align: center;margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b>DISCRIMINACION TACTIL</b></span>
        </p>

        @foreach($ChEMSDisTactileOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> DERECHA: </b>{{$ch['right']}}
                                                             <b> IZQUIERDA: </b>{{$ch['left']}}
                                                            </span>
        </p>
        @endforeach

        <p style="text-align: center;margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b>AGUDEZA</b></span>
        </p>

        @foreach($ChEMSAcuityOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> LOGRA CONTACTO Y SEGUIMIENTO VISUAL: </b>{{$ch['follow_up']}}
                                                             <b> IDENTIFICACION DE OBJETOS: </b>{{$ch['object_identify']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSAcuityOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> FIGURAS SUPUESTAS: </b>{{$ch['figures']}}
                                                             <b> DISEÑO DE BLOQUES DE COLORES: </b>{{$ch['color_design']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSAcuityOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> CATEGOPRIZACIÓN: </b>{{$ch['categorization']}}
                                                             <b> RELACIÓN ESPECIAL ENTRE EL PACIENTE Y LOS OBJETOS DEL ESPACIO: </b>{{$ch['special_relation']}}
                                                            </span>
        </p>
        @endforeach

        <p style="text-align: center;margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> COMPONENTE VESTIBULAR </b></span>
        </p>

        @foreach($ChEMSComponentOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PRESENTA ALTERACIÓN EN EL EQUILIBRIO DINÁMICO: </b>{{$ch['dynamic_balance']}}
                                                             <b> PRESENTA ALTERACIÓN EN EL EQUILIBRIO ESTÁTICO: </b>{{$ch['static_balance']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSComponentOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OBSERVACIONES: </b>{{$ch['observation_component']}}
                                                            </span>
        </p>
        @endforeach

        <p style="text-align: center;margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> COMPONENTE VESTIBULAR </b></span>
        </p>

        @foreach($ChEMSTestOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> APARIENCIA: </b>{{$ch['appearance']}}
                                                             <b> CONCIENCIA: </b>{{$ch['consent']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSTestOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ATENCION: </b>{{$ch['Attention']}}
                                                             <b> ESTADO DE HUMOR: </b>{{$ch['humor']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSTestOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> LENGUAJE: </b>{{$ch['language']}}
                                                             <b> SENSOPERCEPCION: </b>{{$ch['sensory_perception']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSTestOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PENSAMIENTO: </b>
                                                             <b> CURSO: </b>{{$ch['grade']}}
                                                             <b> CONTENIDO: </b>{{$ch['contents']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSTestOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ORIENTACION: </b>{{$ch['orientation']}}
                                                             <b> SUEÑO: </b>{{$ch['sleep']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSTestOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> MEMORIA: </b>{{$ch['memory']}}
                                                            </span>
        </p>
        @endforeach

        <p style="text-align: center;margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> HABILIDADES DE COMUNICACION E INTERACCION </b></span>
        </p>

        <p style="text-align: center;margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> Presenta dificultad para participar de actividades </b></span>
        </p>

        @foreach($ChEMSCommunicationOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> COMUNIDAD: </b>{{$ch['community']}}
                                                             <b> FAMILIARES: </b>{{$ch['relatives']}}
                                                            </span>
        </p>
        @endforeach  
        
        @foreach($ChEMSCommunicationOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> COMPAÑEROS Y AMIGOS: </b>{{$ch['friends']}}
                                                             <b> CUIDADO DE LA PROPIA SALUD: </b>{{$ch['health']}}
                                                            </span>
        </p>
        @endforeach  

        @foreach($ChEMSCommunicationOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> COMPRAS: </b>{{$ch['shopping']}}
                                                             <b> PREPARACION DE ALIMENTOS: </b>{{$ch['foods']}}
                                                            </span>
        </p>
        @endforeach 

        @foreach($ChEMSCommunicationOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> BAÑARSE: </b>{{$ch['bathe']}}
                                                             <b> VESTIRSE: </b>{{$ch['dress']}}
                                                            </span>
        </p>
        @endforeach 

        @foreach($ChEMSCommunicationOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> CIUDADO DE ANIMALES: </b>{{$ch['animals']}}
                                                            </span>
        </p>
        @endforeach

        <p style="text-align: center;margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> VALORACIÓN DIARIA </b></span>
        </p>

        @foreach($ChEMSAssessmentOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> CONCEPTO: </b>{{$ch['occupational_con']}}
                                                            </span>
        </p>
        @endforeach
        
        @foreach($ChEMSAssessmentOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> O0BJETIVOS: </b>
                                                             @if($ch['check1_hold']!=null)
                                                             {{$ch['check1_hold']}}
                                                             @endisset
                                                             @if($ch['check2_improve']!=null)
                                                             <b> / </b>
                                                             {{$ch['check2_improve']}}
                                                             @endisset
                                                             @if($ch['check3_structure']!=null)
                                                             <b> / </b>
                                                             {{$ch['check3_structure']}}
                                                             @endisset
                                                             @if($ch['check4_promote']!=null)
                                                             <b> / </b>
                                                             {{$ch['check4_promote']}}
                                                             @endisset
                                                             @if($ch['check5_strengthen']!=null)
                                                             <b> / </b>
                                                             {{$ch['check5_strengthen']}}
                                                             @endisset
                                                             @if($ch['check6_promote_2']!=null)
                                                             <b> / </b>
                                                             {{$ch['check6_promote_2']}}
                                                             @endisset
                                                             @if($ch['check7_develop']!=null)
                                                             <b> / </b>
                                                             {{$ch['check7_develop']}}
                                                             @endisset
                                                             @if($ch['check8_strengthen_2']!=null)
                                                             <b> / </b>
                                                             {{$ch['check8_strengthen_2']}}
                                                             @endisset
                                                             @if($ch['check9_favor']!=null)
                                                             <b> / </b>
                                                             {{$ch['check9_favor']}}
                                                             @endisset
                                                             @if($ch['check10_functionality']!=null)
                                                             <b> / </b>
                                                             {{$ch['check10_functionality']}}
                                                             @endisset
                                                            </span>
        </p>
        @endforeach

        <p style="text-align: center;margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:10pt"><b> NUMERO DE SESIONES MENSUALES E INTENSIDAD SEMANAL </b></span>
        </p>

        @foreach($ChEMSWeeklyOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> SESIONES MENSUALES: </b>{{$ch['monthly_sessions']}}
                                                             <b> INTENSIDAD SEMANAL: </b>{{$ch['weekly_intensity']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSWeeklyOT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> RECOMENDACIONES/EDUCACION: </b>{{$ch['recommendations']}}
                                                            </span>
        </p>
        @endforeach

        @endisset

        <hr/>

        @endisset

        @if(count($ChEValorationOTNT) > 0) 
        <p style="text-align: center;margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
            NOTA REGULAR<br>
        </p>    

        @endisset

        @if(count($ChEValorationOTNT) > 0) 

        <hr/>

        <p style="text-align: center;margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">VALORACION TERAPEUTICA</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        </p>
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b>DIAGNOSTICO:</b> {{$chevalorationot[0]['ch_diagnosis']['name']}}</span>
        </p>
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b>MOTIVO DE CONSULTA:</b> {{$chevalorationot[0]['recomendations']}}</span>
        </p>
        @endisset

        @if(count($ChVitalSignsNT) > 0) 
        
        <hr/>

        <p style="text-align: center;margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">SIGNOS VITALES</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        @foreach($ChVitalSignsNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> HORA: </b>{{$ch['clock']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> FRECUENCIA CARDIACA: </b>{{$ch['cardiac_frequency']}}
                                                             <b> - FRECUENCIA RESPIRATORIA: </b>{{$ch['respiratory_frequency']}}
                                                             <b> - TEMPERATURA: </b>{{$ch['temperature']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> VIA DE TOMA: </b>{{$ch['ch_vital_temperature']['name']}}
                                                             <b> - SATURACION DE OXIGENO: </b>{{$ch['oxigen_saturation']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TALLA: </b>{{$ch['size']}}
                                                             <b> - PESO: </b>{{$ch['weight']}}
                                                             <b> - I.M.C: </b>{{$ch['body_mass_index']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> TENSIÓN ARTERIAL SISTÓLICA: </b>{{$ch['pressure_systolic']}}
                                                             <b> - TENSIÓN ARTERIAL DIASTÓLICA: </b>{{$ch['pressure_diastolic']}}
                                                             <b> - MEDIA: </b>{{$ch['pressure_half']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ESTADO NEUROLÓGICO: </b>{{$ch['ch_vital_neurological']['name']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> T.PUPILAR IZQUIERDO: </b>{{$ch['pupil_size_left']}}
                                                             <b> - T.PUPILAR DERECHO: </b>{{$ch['pupil_size_right']}}
                                                             <b> - R.LUZ IZQUIERDO: </b>{{$ch['left_reaction']}}
                                                             <b> - R.LUZ IZQUIERDO: </b>{{$ch['right_reaction']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> ESTADO HIDRATACIÓN: </b>{{$ch['ch_vital_hydration']['name']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> OTROS:</span>
        </p>

        @foreach($ChVitalSignsNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> PULSO: </b>{{$ch['pulse']}}
                                                         <b> PVC: </b>{{$ch['venous_pressure']}}
                                                         <b> PRESIÓN INTRACANEANA: </b>{{$ch['intracranial_pressure']}}
                                                         <b> PPC: </b>{{$ch['cerebral_perfusion_pressure']}}</span>
        </p>
        @endforeach

        @foreach($ChVitalSignsNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> PRESIÓN INTRAABDOMINAL: </b>{{$ch['intra_abdominal']}}
                                                         <b> GLUCOMETRIA: </b>{{$ch['glucometry']}}
                                                         <b> OBSERVACIÓN DE GLUCOMETRIA: </b>{{$ch['observations_glucometry']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PRESIÓN ART PULMONAR:</span>
        </p>
        

        @foreach($ChVitalSignsNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:9pt"><b> SISTOLICA: </b>{{$ch['pulmonary_systolic']}}
                                                         <b> DIASTOLICA: </b>{{$ch['pulmonary_diastolic']}}
                                                         <b> MEDIA: </b>{{$ch['pulmonary_half']}}</span>
        </p>
        @endforeach

        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> PEDIATRÍA - PERÍMETRO:</span>
        </p>
        

        @foreach($ChVitalSignsNT as $ch)
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
        
        @foreach($ChVitalSignsNT as $ch)
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
        
        @if(count($ChEMSAssessmentOTNT) > 0) 
        
        <hr/>

        <p style="text-align: center;margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">OBJETIVOS TERAPEUTICOS</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        @foreach($ChEMSAssessmentOTNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> CONCEPTO: </b>{{$ch['occupational_con']}}
                                                            </span>
        </p>
        @endforeach
        
        @foreach($ChEMSAssessmentOTNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> O0BJETIVOS: </b>
                                                             @if($ch['check1_hold']!=null)
                                                             {{$ch['check1_hold']}}
                                                             @endisset
                                                             @if($ch['check2_improve']!=null)
                                                             <b> / </b>
                                                             {{$ch['check2_improve']}}
                                                             @endisset
                                                             @if($ch['check3_structure']!=null)
                                                             <b> / </b>
                                                             {{$ch['check3_structure']}}
                                                             @endisset
                                                             @if($ch['check4_promote']!=null)
                                                             <b> / </b>
                                                             {{$ch['check4_promote']}}
                                                             @endisset
                                                             @if($ch['check5_strengthen']!=null)
                                                             <b> / </b>
                                                             {{$ch['check5_strengthen']}}
                                                             @endisset
                                                             @if($ch['check6_promote_2']!=null)
                                                             <b> / </b>
                                                             {{$ch['check6_promote_2']}}
                                                             @endisset
                                                             @if($ch['check7_develop']!=null)
                                                             <b> / </b>
                                                             {{$ch['check7_develop']}}
                                                             @endisset
                                                             @if($ch['check8_strengthen_2']!=null)
                                                             <b> / </b>
                                                             {{$ch['check8_strengthen_2']}}
                                                             @endisset
                                                             @if($ch['check9_favor']!=null)
                                                             <b> / </b>
                                                             {{$ch['check9_favor']}}
                                                             @endisset
                                                             @if($ch['check10_functionality']!=null)
                                                             <b> / </b>
                                                             {{$ch['check10_functionality']}}
                                                             @endisset
                                                            </span>
        </p>
        @endforeach

        @endisset

        @if(count($ChRNMaterialsOTNT) > 0) 
        
        <hr/>

        <p style="text-align: center;margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">MATERIALES E INSUMOS UTILIZADOS</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>
        
        @foreach($ChRNMaterialsOTNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> O0BJETIVOS: </b>
                                                             @if($ch['check1_cognitive']!=null)
                                                             {{$ch['check1_cognitive']}}
                                                             @endisset
                                                             @if($ch['check2_colors']!=null)
                                                             <b> / </b>
                                                             {{$ch['check2_colors']}}
                                                             @endisset
                                                             @if($ch['check3_elements']!=null)
                                                             <b> / </b>
                                                             {{$ch['check3_elements']}}
                                                             @endisset
                                                             @if($ch['check4_balls']!=null)
                                                             <b> / </b>
                                                             {{$ch['check4_balls']}}
                                                             @endisset
                                                             @if($ch['check5_material_paper']!=null)
                                                             <b> / </b>
                                                             {{$ch['check5_material_paper']}}
                                                             @endisset
                                                             @if($ch['check6_material_didactic']!=null)
                                                             <b> / </b>
                                                             {{$ch['check6_material_didactic']}}
                                                             @endisset
                                                             @if($ch['check7_computer']!=null)
                                                             <b> / </b>
                                                             {{$ch['check7_computer']}}
                                                             @endisset
                                                             @if($ch['check8_clay']!=null)
                                                             <b> / </b>
                                                             {{$ch['check8_clay']}}
                                                             @endisset
                                                             @if($ch['check9_colbon']!=null)
                                                             <b> / </b>
                                                             {{$ch['check9_colbon']}}
                                                             @endisset
                                                             @if($ch['check10_pug']!=null)
                                                             <b> / </b>
                                                             {{$ch['check10_pug']}}
                                                             @endisset
                                                            </span>
        </p>
        @endforeach

        @endisset
        

        @if(count($ChEMSWeeklyOTNT) > 0) 
        
        <hr/>

        <p style="text-align: center;margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">NUMERO DE SESIONES MENSUALES E INTENSIDAD SEMANAL</span>
            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        @foreach($ChEMSWeeklyOTNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> SESIONES MENSUALES: </b>{{$ch['monthly_sessions']}}
                                                             <b> INTENSIDAD SEMANAL: </b>{{$ch['weekly_intensity']}}
                                                            </span>
        </p>
        @endforeach

        @foreach($ChEMSWeeklyOTNT as $ch)
        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
            <span style="font-family:Calibri; font-size:9pt"><b> RECOMENDACIONES/EDUCACION: </b>{{$ch['recommendations']}}
                                                            </span>
        </p>
        @endforeach

        @endisset


        
        




        




    </div>
</body>

</html>