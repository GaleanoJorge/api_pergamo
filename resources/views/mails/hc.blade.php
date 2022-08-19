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

        {{-- Plan de Manejo Cabecero Enfermería --}}
        <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt"><span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">PLAN DE MANEJO</span><span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
        </p>

        <p style="margin:4.1pt 15.15pt 0pt 9.45pt; text-indent:-1.45pt; line-height:162%; widows:0; orphans:0; font-size:8pt">


            @if(isset($chrecord[0]["assigned_management_plan"]["management_plan"]["type_of_attention"]))
            
                <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                    <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:8pt"><b>Tipo de Atención:</b></span>
                </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['assigned_management_plan']['management_plan']['type_of_attention']['name']}} </span>
                 </p>
                </td>
             @endisset
             @if(isset($chrecord[0]['assigned_management_plan']['management_plan']['procedure']))
                <td style="width:79.75pt; vertical-align:top">
                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:8pt"><b> Procedimiento:</b></span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['assigned_management_plan']['management_plan']['procedure']['manual_price']['name']}} </span>
                    </p>
                </td>
                </tr>
            @endisset
            @if(isset($chrecord[0]['assigned_management_plan']['management_plan']['service_briefcase'])) 
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:8pt"><b>Medicamento:</b></span>
                </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['assigned_management_plan']['management_plan']['service_briefcase']['manual_price']['name']}} </span>
                 </p>
                </td>
            @endisset
            @if(isset($chrecord[0]['assigned_management_plan']['management_plan']['dosage_administer'])) 
                <td style="width:79.75pt; vertical-align:top">
                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:8pt"><b> Dosis a administrar:</b></span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['assigned_management_plan']['management_plan']['dosage_administer']}} </span>
                    </p>
                </td>
                </tr>
                @endisset

                @if(isset($chrecord[0]['assigned_management_plan']['management_plan']['quantity'])) 
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:8pt"><b>Cantidad:</b></span>
                </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['assigned_management_plan']['management_plan']['quantity']}} </span>
                 </p>
                </td>
                @endisset
                
                @if(isset($chrecord[0]['assigned_management_plan']['management_plan']['route_of_administration'])) 
                <td style="width:79.75pt; vertical-align:top">
                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:8pt"><b>Vía de administración:</b></span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['assigned_management_plan']['management_plan']['route_of_administration']}} </span>
                    </p>
                </td>
                </tr>
                @endisset


                @if(isset($chrecord[0]['assigned_management_plan']['management_plan']['preparation'])) 

                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:8pt"><b>Preparación:</b></span>
                </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['assigned_management_plan']['management_plan']['preparation']}} </span>
                 </p>
                </td>
                @endisset

                @if(isset($chrecord[0]['assigned_management_plan']['management_plan']['number_doses'])) 
                <td style="width:79.75pt; vertical-align:top">
                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:8pt"><b> Dosis totales del tratamiento:</b></span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['assigned_management_plan']['management_plan']['number_doses']}} </span>
                    </p>
                </td>
                </tr>
                @endisset


                @if(isset($chrecord[0]['assigned_management_plan']['management_plan']['blend'])) 
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:8pt"><b>Mezcla:</b></span>
                </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['assigned_management_plan']['management_plan']['blend']}} </span>
                 </p>
                </td>
                @endisset

                @if(isset($chrecord[0]['assigned_management_plan']['management_plan']['administration_time'])) 
                <td style="width:79.75pt; vertical-align:top">
                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:8pt"><b> Tiempo de administración:</b></span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['assigned_management_plan']['management_plan']['administration_time']}} </span>
                    </p>
                </td>
                </tr>
                @endisset

                {{-- Responsable y Hora de la Aplicación --}}
                
                @if(isset($chrecord[0]['assistance_supplies']['user_incharge_id'])) 
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:8pt"><b>Responsable de la Aplicación:</b></span>
                </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['assistance_supplies']['user_incharge_id']}} </span>
                 </p>
                </td>
                @endisset

                @if(isset($chrecord[0]['assistance_supplies']['application_hour'])) 
                <td style="width:79.75pt; vertical-align:top">
                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:8pt"><b> Tiempo de administración:</b></span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['assistance_supplies']['application_hour']}} </span>
                    </p>
                </td>
                </tr>
                @endisset



         
            </table> 



            <br/>
            @if(isset($chrecord[0]['assigned_management_plan']['management_plan']['observation'])) 
            <span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:8pt"> &nbsp;&nbsp;<b>Observación:</b> 
            </span><span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:7pt"> &nbsp;&nbsp;{{$chrecord[0]['assigned_management_plan']['management_plan']['observation']}}</span>
            @endisset 

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
                                
                                <th><span style="font-family:Calibri; font-size:9pt">FECHA </span></th>
                                <th><span style="font-family:Calibri; font-size:9pt">TIPO</span></th>
                                <th><span style="font-family:Calibri; font-size:9pt">REVISIÓN</span></th>
                                <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</span></th>
                               

                            </tr>
                            @foreach($ChSystemExam as $ch)
                            <tr>   

                                @if(isset($ch['created_at']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                                </td>
                                @endisset

                                @if(isset($ch['type_ch_system_exam']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{$ch['type_ch_system_exam']['name']}}</span>
                                </td>
                                @endisset

                                @if(isset($ch['revision']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{$ch['revision']}}</span>
                                </td>
                                @endisset

                                @if(isset($ch['observation']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{$ch['observation']}}</span>
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
                                    <th><span style="font-family:Calibri; font-size:9pt">FECHA</span></th>
                                    <th><span style="font-family:Calibri; font-size:9pt">TIPO</span></th>
                                    <th><span style="font-family:Calibri; font-size:9pt">REVISIÓN</span></th>
                                    <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</span></th>
                                </tr>

                                @foreach($ChPhysicalExam as $ch)
                                <tr>
                                
                                    @if(isset($ch['created_at']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                                    </td>
                                    @endisset

                                    @if(isset($ch['type_ch_physical_exam']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['type_ch_physical_exam']['name']}}</span>
                                    </td>
                                    @endisset

                                    @if(isset($ch['revision']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['revision']}}</span>
                                    </td>
                                    @endisset

                                    @if(isset($ch['description']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['description']}}</span>
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
                                            <span style="font-family:Calibri"><b> @if(isset($ch['clock']))HORA REGISTRO: </b>{{$ch['clock']}} @endisset</span>
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

                <!-- Diagnóstico -->
                <div>
                            @if(count($ChDiagnosis) > 0)
                           

                            <hr />

                            <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DIAGNÓSTICO </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            @foreach($ChDiagnosis as $ch)
                            <br/>
                            <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                                <tr style="height:11.95pt">                                 
                                    <td style="width:79.75pt; vertical-align:top">
                                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset</span>
                                        </p>
                                    </td>
                                    <td style="width:106pt; vertical-align:top">
                                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                            <span style="font-family:Calibri"><b>@if(isset($ch['diagnosis'])) DIAGNÓSTICO: </b>{{$ch['diagnosis']['name']}} @endisset</span>
                                        </p>
                                    </td>
                                </tr>
                                <tr style="height:11.95pt">                                 
                                    <td style="width:79.75pt; vertical-align:top">
                                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_diagnosis_class'])) CLASE: </b> {{$ch['ch_diagnosis_class'] ['name']}} @endisset</span>
                                        </p>
                                    </td>
                                    <td style="width:106pt; vertical-align:top">
                                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                            <span style="font-family:Calibri"><b>@if(isset($ch['ch_diagnosis_type'])) TIPO: </b> {{$ch['ch_diagnosis_type'] ['name']}} @endisset </span>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt">
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
                                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                                    <b>@if(isset($ch['ostomy'])) OSTOMIA: </b> {{$ch['ostomy']['name']}} @endisset<br/>
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
                                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset<br/>
                                    <b>@if(isset($ch['analisys'])) ANÁISIS: </b> {{$ch['analisys']}} @endisset<br/>
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
                                <span style="text-align: justify; font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                                    <b>@if(isset($ch['recommendations_evo'])) RECOMENDACIÓN: </b> {{$ch['recommendations_evo']['name']}} @endisset <br/>
                                    <b>@if(isset($ch['patient_family_education'])) DESCRIPCIÓN : </b> {{$ch['patient_family_education']}} @endisset <br/>
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
                    <br/>
                    @foreach($ChDiets as $ch)
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>@if(isset($ch['diet_consistency'])) ORAL: </b> {{$ch['diet_consistency']['name']}} @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>@if(isset($ch['enterally_diet'])) ENTERAL : </b> {{$ch['enterally_diet']['name']}} @endisset</span>
                                </p>
                            </td>
                        </tr>                            
                    </table>
                    @endforeach
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['observation'])) OBSERVACIONES: </b> {{$ch['observation']}} @endisset</span>
                    </p>
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

                <table class="tablehc">

                <tr>
                    <th><span style="font-family:Calibri; font-size:9pt">FECHA</span></th>
                    <th><span style="font-family:Calibri; font-size:9pt">TIPO</span></th>
                    <th><span style="font-family:Calibri; font-size:9pt">REVISIÓN</span></th>
                    <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</span></th>
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

                    @if(isset($ch['observation']))
                    <td>
                        <span style="font-family:Calibri; font-size:9pt">{{$ch['observation']}}</span>
                    </td>
                    @endisset
                
                </tr>
                @endforeach

                </table>
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
                            <table class="tablehc">

                                <tr>                                    
                                    <th><span style="font-family:Calibri; font-size:9pt">FECHA </span></th>
                                    <th><span style="font-family:Calibri; font-size:9pt">SUBJETIVO</span></th>
                                    <th><span style="font-family:Calibri; font-size:9pt">OBJETIVO</span></th>                                  
                                </tr>

                                @foreach($ChEvoSoap as $ch)
                                <tr>   
    
                                    @if(isset($ch['created_at']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                                    </td>
                                    @endisset
    
                                    @if(isset($ch['subjective']))
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['subjective']}}</span>
                                    </td>
                                    @endisset
    
                                    @if(isset($ch['subjective'])) 
                                    <td>
                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['objective']}}</span>
                                    </td>
                                    @endisset

                                </tr>
                                @endforeach
    
                            </table>
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

                                        <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                                        <th><span style="font-family:Calibri; font-size:9pt">TIPO</th>
                                        <th><span style="font-family:Calibri; font-size:9pt">REVISIÓN</th>
                                        <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</th>

                                    </tr>
                                    @foreach($ChPhysicalExamEvo as $ch)
                                    <tr>
                                    
                                        @if(isset($ch['created_at']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                                        </td>
                                        @endisset

                                        @if(isset($ch['type_ch_physical_exam']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{$ch['type_ch_physical_exam']['name']}}</span>
                                        </td>
                                        @endisset

                                        @if(isset($ch['revision']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{$ch['revision']}}</span>
                                        </td>
                                        @endisset

                                        @if(isset($ch['description']))
                                        <td>
                                            <span style="font-family:Calibri; font-size:9pt">{{$ch['description']}}</span>
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
                                <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                                <b>@if(isset($ch['diagnosis'])) DIAGNÓSTICO: </b>{{$ch['diagnosis']['name']}} @endisset <br/>
                                <b>@if(isset($ch['ch_diagnosis_class'])) CLASE: </b> {{$ch['ch_diagnosis_class'] ['name']}} @endisset <br/>
                                <b>@if(isset($ch['ch_diagnosis_type'])) TIPO: </b> {{$ch['ch_diagnosis_type'] ['name']}} @endisset <br/>
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
                                <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                                <b>@if(isset($ch['ostomy'])) OSTOMIA: </b> {{$ch['ostomy']['name']}} @endisset <br/>
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
                                <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                                <b>@if(isset($ch['analisys'])) ANÁISIS: </b> {{$ch['analisys']}} @endisset <br/>
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
                            <span style=" text-align: justify; font-family:Calibri; font-size:9pt">
                                <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                                <b>@if(isset($ch['recommendations_evo'])) RECOMENDACION: </b> {{$ch['recommendations_evo']['name']}} @endisset <br/>
                                <b>@if(isset($ch['patient_family_education'])) DESCRIPCIÓN : </b> {{$ch['patient_family_education']}} @endisset <br/>
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
                        <br/>
                        @foreach($ChDietsEvo as $ch)
                        <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri"><b>@if(isset($ch['diet_consistency'])) ORAL: </b> {{$ch['diet_consistency']['name']}} @endisset</span>
                                                    
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri"><b>@if(isset($ch['enterally_diet'])) ENTERAL : </b> {{$ch['enterally_diet']['name']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>                            
                        </table>
                        @endforeach
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['observation'])) OBSERVACIONES: </b> {{$ch['observation']}} @endisset</span>
                        </p>
                        @endisset
                    </div>

            </div>

            <!-- ESCALAS -->
            <div>
               
                <!-- Validación Escalas -->
                <div>
                    @if(count($ChScaleNorton) > 0  || count($ChScaleFac) > 0 || count($ChScaleGlasgow) > 0 || count($ChScaleBarthel) > 0  || count($ChScaleRedCross) > 0 || count($ChScaleBraden) > 0 ||
                        count($ChScaleKarnofsky) > 0 || count($ChScaleEcog) > 0 || count($ChScalePediatricNutrition) > 0  || count($ChScaleScreening) > 0  || count($ChScalePayette) > 0  || count($ChScaleFragility) > 0
                        || count($ChScaleNews) > 0  || count($ChScaleZarit) > 0 )
                    
                    <hr />
                    
                    <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                        ESCALAS<br>
                    </p>
                    @endisset
                </div>

                <!-- Norton -->
                <div>
                    @if(count($ChScaleNorton) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA NORTON</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    <table class="tablehc">
                        <tr>
                            <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                            <th><span style="font-family:Calibri; font-size:9pt">ESTADO FÍSICO GENERAL</th>
                            <th><span style="font-family:Calibri; font-size:9pt">ESTADO MENTAL </th>
                            <th><span style="font-family:Calibri; font-size:9pt">MOVILIDAD</th>
                            <th><span style="font-family:Calibri; font-size:9pt">ACTIVIDAD</th>
                            <th><span style="font-family:Calibri; font-size:9pt">INCONTINENCIA</th>
                            <th><span style="font-family:Calibri; font-size:9pt">TOTAL</th>
                            <th><span style="font-family:Calibri; font-size:9pt">RIESGO</th>
                        </tr>

                        @foreach($ChScaleNorton as $ch)
                        <tr>                        
                           @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                            </td>
                            @endisset

                           @if(isset($ch['physical_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['physical_detail']}}</span>
                            </td>
                            @endisset

                          @if(isset($ch['mind_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['mind_detail']}}</span>
                            </td>
                            @endisset

                           @if(isset($ch['mobility_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['mobility_detail']}}</span>
                            </td>
                            @endisset

                            @if(isset($ch['activity_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['activity_detail']}}</span>
                            </td>
                            @endisset

                           @if(isset($ch['incontinence_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['incontinence_detail']}}</span>
                            </td>

                            @endisset    
                             @if(isset($ch['total']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['total']}}</span>
                            </td>
                            @endisset

                           @if(isset($ch['risk']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['risk']}}</span>
                            </td>
                            @endisset
                        
                        </tr>
                        @endforeach

                    </table>

                    @endisset
                </div>

                <!-- FAC -->
                <div>
                    @if(count($ChScaleFac) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA FAC</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>


                    <table class="tablehc">
                        <tr>
                            <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                            <th><span style="font-family:Calibri; font-size:9pt">CLASIFICACIÓN</th>
                            <th><span style="font-family:Calibri; font-size:9pt">DEFINICIÓN </th>
                        </tr>

                        @foreach($ChScaleFac as $ch)
                        <tr>                        
                           @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                            </td>
                            @endisset

                          @if(isset($ch['level_title']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['level_title']}}</span>
                            </td>
                            @endisset

                         @if(isset($ch['definition']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['definition']}}</span>
                            </td>
                            @endisset                           
                        
                        </tr>
                        @endforeach

                    </table>

                    @endisset
                </div>

                 <!-- Glasgow -->
                 <div>
                    @if(count($ChScaleGlasgow) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA GLASGOW</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    <table class="tablehc">
                        <tr>
                            <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                            <th><span style="font-family:Calibri; font-size:9pt">RESPUESTA MOTORA</th>
                            <th><span style="font-family:Calibri; font-size:9pt">RESPUESTA VERBAL</th>
                            <th><span style="font-family:Calibri; font-size:9pt">APERTURA OCULAR</th>
                            <th><span style="font-family:Calibri; font-size:9pt">PUNTAJE</th>
                        </tr>

                        @foreach($ChScaleGlasgow as $ch)
                        <tr>                        
                           @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                            </td>
                            @endisset

                          @if(isset($ch['ocular_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['ocular_detail']}}</span>
                            </td>
                            @endisset

                         @if(isset($ch['verbal_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['verbal_detail']}}</span>
                            </td>
                            @endisset

                          @if(isset($ch['motor_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['motor_detail']}}</span>
                            </td>
                            @endisset

                           @if(isset($ch['total']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['total']}} </span>
                            </td>
                            @endisset
                                                
                        </tr>
                        @endforeach

                    </table>

                    @endisset
                </div>

                 <!-- Barthel -->
                 <div>
                    @if(count($ChScaleBarthel) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA BARTHEL</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChScaleBarthel as $ch)

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>
                    <br/>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">                        
                            <td style="width:130pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['eat_detail'])) COMER: </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['eat_detail'])){{$ch['eat_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:130pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['move_detail']))TRASLADARSE ENTRE LA SILLA Y LA CAMA:@endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['move_detail'])){{$ch['move_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:130pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['cleanliness_detail'])) ASEO PERSONAL: @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['cleanliness_detail'])){{$ch['cleanliness_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:130pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['toilet_detail'])) USO DEL RETRETE:</b>@endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['toilet_detail'])) {{$ch['toilet_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:130pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['shower_detail'])) BAÑARSE O DUCHARSE: @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['shower_detail'])) {{$ch['shower_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:130pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['commute_detail'])) DESPLAZARSE:@endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['commute_detail'])){{$ch['commute_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:130pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['stairs_detail'])) SUBIR Y BAJAR ESCALERAS: @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['stairs_detail'])){{$ch['stairs_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:130pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['dress_detail'])) VERTIRSE Y DESVESTIRSE: @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['dress_detail'])){{$ch['dress_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:130pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"> <b>@if(isset($ch['fecal_detail'])) CONTROL DE HECES: @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['fecal_detail'])){{$ch['fecal_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:130pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"> <b>@if(isset($ch['urine_detail'])) CONTROL DE ORINA: @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['urine_detail'])){{$ch['urine_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                    </table>

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['score'])) CLASIFICACIÓN: </b>{{$ch['score'],0,10}} @endisset 
                            <b>@if(isset($ch['classification'])) PUNTAJE: </b>{{$ch['classification']}} @endisset</span>
                    </p>

                    @endforeach

                    @endisset
                </div>

                <!-- Cruz Roja -->
                <div>
                    @if(count($ChScaleRedCross) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA CRUZ ROJA</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>


                    <table class="tablehc">
                        <tr>
                            <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                            <th><span style="font-family:Calibri; font-size:9pt">GRADO</th>
                            <th><span style="font-family:Calibri; font-size:9pt">DEFINICIÓN</th>
                        </tr>

                        @foreach($ChScaleRedCross as $ch)
                        <tr>                        
                           @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                            </td>
                            @endisset

                          @if(isset($ch['grade_title']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['grade_title']}} </span>
                            </td>
                            @endisset

                        @if(isset($ch['definition']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['definition']}}</span>
                            </td>
                            @endisset
                                                
                        </tr>
                        @endforeach

                    </table>                    

                    @endisset
                </div>

                <!-- Braden -->
                <div>
                    @if(count($ChScaleBraden) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA BRADEN</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChScaleBraden as $ch)

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>
                    <br/>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">                        
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['sensory_detail'])) PERCEPCIÓN SENSORIAL: </b>@endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['sensory_detail'])){{$ch['sensory_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['humidity_detail'])) EXPOSICIÓN A LA HUMEDAD: </b>  @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['humidity_detail'])){{$ch['humidity_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"> <b>@if(isset($ch['activity_detail'])) ACTIVIDAD: </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['activity_detail'])){{$ch['activity_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt">  <b>@if(isset($ch['mobility_detail'])) MOVILIDAD: </b> @endisset  </span>
                                                
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri"> @if(isset($ch['mobility_detail'])) {{$ch['mobility_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['nutrition_detail'])) NUTRICIÓN: </b>  @endisset   </span>
                                                
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['nutrition_detail'])) {{$ch['nutrition_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['lesion_detail'])) ROCE Y PELIGRO DE LESIONES: </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['lesion_detail'])) {{$ch['lesion_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <br/>                    
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['total'])) TOTAL: </b> {{$ch['total']}} @endisset
                            <b>@if(isset($ch['risk'])) RIESGO: </b> {{$ch['risk']}} @endisset</span>
                    </p>

                    @endforeach

                    @endisset
                </div>

                <!-- Karnofsky -->
                <div>
                    @if(count($ChScaleKarnofsky) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA KARNOFSKY</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    <table class="tablehc">
                        <tr>
                            <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                            <th><span style="font-family:Calibri; font-size:9pt">PUNTAJE</th>
                            <th><span style="font-family:Calibri; font-size:9pt">DESCRIPCIÓN</th>
                        </tr>

                        @foreach($ChScaleKarnofsky as $ch)
                        <tr>                        
                           @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                            </td>
                            @endisset

                         @if(isset($ch['score_value']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['score_value']}}  </span>
                            </td>
                            @endisset

                       @if(isset($ch['score_title'])) 
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['score_title']}}</span>
                            </td>
                            @endisset
                                                
                        </tr>
                        @endforeach

                    </table>                   

                    @endisset
                </div>

                <!-- ECOG -->
                <div>
                    @if(count($ChScaleEcog) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA ECOG</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    <table class="tablehc">
                        <tr>
                            <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                            <th><span style="font-family:Calibri; font-size:9pt">GRADO</th>
                            <th><span style="font-family:Calibri; font-size:9pt">DEFINICIÓN</th>
                        </tr>

                        @foreach($ChScaleEcog as $ch)
                        <tr>                        
                           @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                            </td>
                            @endisset

                        @if(isset($ch['grade_title']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['grade_title']}} </span>
                            </td>
                            @endisset

                      @if(isset($ch['definition']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['definition']}}</span>
                            </td>
                            @endisset
                                                
                        </tr>
                        @endforeach

                    </table>         

                    @endisset
                </div>

                <!-- Nutricional Pediátrico -->
                <div>
                    @if(count($ChScalePediatricNutrition) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">TAMIZAJE NUTRICIONAL PEDIATRICO</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChScalePediatricNutrition as $ch)

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>
                    <br/>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['score_one_detail'])) EXISTE ALGUNA ENFERMEDAD SUBYACENTE CON RIESGO DE MALNUTRICIÓN?: </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['score_one_detail'])) {{$ch['score_one_detail']}} @endisset  </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['score_two_detail'])) ESTÁ PRESENTE ALGUNA DE LAS SIGUIENTES SITUACIONES? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['score_two_detail'])) {{$ch['score_two_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['score_three_detail'])) HA PRESENTADO PÉRDIDA DE PESO O NINGÚN AUMENTO DE PESO (LACTANTES MENOS DE 1 AÑO) EN LAS ÚLTIMAS SEMANAS/MESES?: </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['score_three_detail'])) {{$ch['score_three_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['score_four_detail'])) EL PACIENTE TIENE POBRE ESTADO NUTRICIONAL SEGÚN LA EVALUACIÓN CLÍNICA SUBJETIVA DISMINUCIÓN DE LA GRASA SUBCUTÁNEA Y/O LA MASA MUSCULAR Y/O POR SU ROSTRO DEMACRADO ?:  @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['score_four_detail'])) {{$ch['score_four_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>
                   
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['total'])) TOTAL: </b> {{$ch['total']}} @endisset <br/>
                            <b>@if(isset($ch['risk'])) RIESGO: </b> {{$ch['risk']}} @endisset 
                            <b>@if(isset($ch['classification'])) INTERVENCIÓN Y SEGUIMIENTO: </b> {{$ch['classification']}} @endisset</span>
                    </p>

                    @endforeach

                    @endisset
                </div>

                 <!-- Mini-Tamizaje Nutricional -->
                 <div>
                    @if(count($ChScaleScreening) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">MINI-TAMIZAJE NUTRICIONAL ADULTOS</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChScaleScreening as $ch)

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>
                    <br/>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['v_one_detail'])) TIENE ALGUNA ENFERMEDAD O CONDICIÓN QUE LE HA HECHO CAMBIAR LA CLASE DE COMIDA O LA CANTIDAD DE ALIMENTO QUE COME: </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['v_one_detail'])){{$ch['v_one_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['v_two_detail'])) COME MENOS DE DOS COMIDAS AL DÍA: </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['v_two_detail'])) {{$ch['v_two_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['v_three_detail'])) COME POCAS FRUTAS, VEGETALES O PRODUCTOS DE LECHE: </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['v_three_detail'])) {{$ch['v_three_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['v_four_detail'])) TOMA TRES O MÁS BEBIDAS DE CERVEZA, LICORES O VINO CASI TODOS LOS DÍAS: </b>@endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['v_four_detail'])) {{$ch['v_four_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"> <b>@if(isset($ch['v_five_detail'])) TIENE PROBLEMAS CON LOS DIENTES O LA BOCA QUE LE DIFICULTAN EL COMER: </b>@endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['v_five_detail'])) {{$ch['v_five_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['v_six_detail'])) NO SIEMPRE TIENE SUFICIENTE DINERO PARA COMPRAR LOS ALIMENTOS QUE NECESITA: </b>@endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['v_six_detail'])) {{$ch['v_six_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['v_seven_detail'])) COME A SOLAS LA MAYOR PARTE DE LAS VECES: </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['v_seven_detail'])){{$ch['v_seven_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['v_eight_detail'])) TOMA AL DÍA TRES O MÁS MEDICINAS DIFERENTES, CON O SIN RECETAS: </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['v_eight_detail'])) {{$ch['v_eight_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['v_nine_detail'])) HA PERDIDO O GANADO, SIN QUERER, 4.5 KG (10 LB) EN LOS ÚLTIMOS 6 MESES: </b>@endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['v_nine_detail'])){{$ch['v_nine_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['v_ten_detail'])) FÍSICAMENTE NO PUEDE IR DE COMPRAS, COCINAR O ALIMENTARSE: </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['v_ten_detail'])) {{$ch['v_ten_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <br/>
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['total'])) PUNTAJE: </b> {{$ch['total']}} @endisset <br/>
                            <b>@if(isset($ch['risk'])) RIESGO: </b> {{$ch['risk']}} @endisset</span>
                    </p>

                    @endforeach

                    @endisset
                </div>

                 <!-- Payette -->
                 <div>
                    @if(count($ChScalePayette) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA PAYETTE</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChScalePayette as $ch)

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>
                    <br/>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_one_detail'])) ¿LA PERSONA ES MUY DELGADA? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_one_detail'])) {{$ch['q_one_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_two_detail'])) ¿LA PERSONA HA PERDIDO PESO EN EL CURSO DEL ÚLTIMO AÑO? </b>@endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_two_detail'])) {{$ch['q_two_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_three_detail'])) ¿LA PERSONA SUFRE DE ARTRITIS CON REPERCUSIÓN EN SU FUNCIONALIDAD GLOBAL? </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_three_detail'])) {{$ch['q_three_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"> <b>@if(isset($ch['q_four_detail'])) ¿LA PERSONA INCLUSO CON ANTEOJOS, SU VISIÓN ES? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_four_detail'])) {{$ch['q_four_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_five_detail'])) ¿LA PERSONA TIENE BUEN APETITO? </b>  @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_five_detail'])) {{$ch['q_five_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"> <b>@if(isset($ch['q_six_detail'])) ¿LA PERSONA HA VIVIDO RECIENTEMENTE ALGÚN ACONTECIMIENTO QUE LE HA AFECTADO PROFUNDAMENTE(ENFERMEDAD PERSONAL, PÉRDIDA DE UN FAMILIAR)? </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_six_detail'])) {{$ch['q_six_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"> <b>@if(isset($ch['q_seven_detail'])) ¿LA PERSONA COME HABITUALMENTE FRUTA O JUGO DE FRUTAS? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_seven_detail'])) {{$ch['q_seven_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"> <b>@if(isset($ch['q_eight_detail'])) ¿LA PERSONA COME HABITUALMENTE HUEVOS, QUESO, MANTEQUILLA O ACEITE VEGETAL?</b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_eight_detail'])){{$ch['q_eight_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"> <b>@if(isset($ch['q_nine_detail'])) ¿LA PERSONA COME HABITUALMENTE TORTILLA, PAN O CEREAL? </b>@endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_nine_detail'])) {{$ch['q_nine_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_ten_detail'])) ¿LA PERSONA COMEHABITUALMENTE LECHE (1 VASO O MÁS DE 1/4 DE TAZA EN EL CAFÉ) ?</b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_ten_detail'])) {{$ch['q_ten_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>
                       <br/>
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['classification'])) CLASIFICACIÓN: </b> {{$ch['classification']}} @endisset <br/>
                            <b>@if(isset($ch['risk'])) RIESGO NUTRICIONAL: </b> {{$ch['risk']}} @endisset</span> <br/>
                            <b>@if(isset($ch['recommendations'])) RECOMENDACIONES: </b> {{$ch['recommendations']}} @endisset</span>
                    </p>

                    @endforeach

                    @endisset
                </div>

                 <!-- Fragilidad -->
                 <div>
                    @if(count($ChScaleFragility) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA FRAGILIDAD</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChScaleFragility as $ch)

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>
                    <br>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_one_detail'])) ¿ESTÁ CANSADO? </b>  @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_one_detail'])) {{$ch['q_one_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_two_detail'])) ¿ES INCAPAZ DE SUBIR UN PISO DE ESCALERAS? </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_two_detail'])) {{$ch['q_two_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_three_detail'])) ¿ES INCAPAZ DE CAMINAR UNA MANZANA? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_three_detail'])) {{$ch['q_three_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_four_detail'])) ¿TIENE MÁS DE 5 ENFERMEDADES? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_four_detail'])) {{$ch['q_four_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"> <b>@if(isset($ch['q_five_detail'])) ¿HA PERDIDO MÁS DEL 5% DE SU PESO EN LOS ÚLTIMOS 6 MESES? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_five_detail'])) {{$ch['q_five_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['q_one_detail'])) ¿ESTÁ CANSADO? </b> {{$ch['q_one_detail']}} @endisset <br/>
                            <b>@if(isset($ch['q_two_detail'])) ¿ES INCAPAZ DE SUBIR UN PISO DE ESCALERAS? </b> {{$ch['q_two_detail']}} @endisset <br/>
                            <b>@if(isset($ch['q_three_detail'])) ¿ES INCAPAZ DE CAMINAR UNA MANZANA? </b> {{$ch['q_three_detail']}} @endisset <br/>
                            <b>@if(isset($ch['q_four_detail'])) ¿TIENE MÁS DE 5 ENFERMEDADES? </b> {{$ch['q_four_detail']}} @endisset <br/>
                            <b>@if(isset($ch['q_five_detail'])) ¿HA PERDIDO MÁS DEL 5% DE SU PESO EN LOS ÚLTIMOS 6 MESES? </b> {{$ch['q_five_detail']}} @endisset</span>
                    </p>

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['total'])) TOTAL: </b> {{$ch['total']}} @endisset <br/>
                            <b>@if(isset($ch['classification'])) CLASIFICACIÓN: </b> {{$ch['classification']}} @endisset</span>
                    </p>

                    @endforeach

                    @endisset
                </div>

                 <!-- News -->
                 <div>
                    @if(count($ChScaleNews) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA NEWS</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChScaleNews as $ch)

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>
                    <br/>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">                        
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['p_one_detail'])) FRECUENCIA RESPIRATORIA </b>  @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['p_one_detail'])){{$ch['p_one_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['p_two_detail'])) SATURACIÓN DE OXÍGENO (SPO2) </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['p_two_detail'])){{$ch['p_two_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['p_three_detail'])) SPO2 EN CASO DE EPOC </b>  @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['p_three_detail'])){{$ch['p_three_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['p_four_detail'])) ¿OXÍGENO SUPLEMENTARIO? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['p_four_detail'])){{$ch['p_four_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['p_five_detail'])) TENSIÓN ARTERIAL SISTÓLICA </b>  @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['p_five_detail'])) {{$ch['p_five_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['p_six_detail'])) FRECUENCIA CARDIACA </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['p_six_detail'])) {{$ch['p_six_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['p_seven_detail'])) NIVEL DE CONSCIENCIA  </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['p_seven_detail'])){{$ch['p_seven_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['p_eight_detail'])) TEMPERATURA  </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['p_eight_detail'])) {{$ch['p_eight_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <br/>
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['p_one_detail'])) FRECUENCIA RESPIRATORIA </b> {{$ch['p_one_detail']}} @endisset
                            <b>@if(isset($ch['p_two_detail'])) SATURACIÓN DE OXÍGENO (SPO2) </b> {{$ch['p_two_detail']}} @endisset
                            <b>@if(isset($ch['p_three_detail'])) SPO2 EN CASO DE EPOC </b> {{$ch['p_three_detail']}} @endisset
                            <b>@if(isset($ch['p_four_detail'])) ¿OXÍGENO SUPLEMENTARIO? </b> {{$ch['p_four_detail']}} @endisset
                            <b>@if(isset($ch['p_five_detail'])) TENSIÓN ARTERIAL SISTÓLICA </b> {{$ch['p_five_detail']}} @endisset
                            <b>@if(isset($ch['p_six_detail'])) FRECUENCIA CARDIACA  </b> {{$ch['p_six_detail']}} @endisset
                            <b>@if(isset($ch['p_seven_detail'])) NIVEL DE CONSCIENCIA  </b> {{$ch['p_seven_detail']}} @endisset
                            <b>@if(isset($ch['p_eight_detail'])) TEMPERATURA  </b> {{$ch['p_eight_detail']}} @endisset</span>
                    </p>

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['qualification'])) CLASIFICACIÓN: </b> {{$ch['qualification']}} @endisset <br/>
                            <b>@if(isset($ch['risk'])) RIESGO CLÍNICO: </b> {{$ch['risk']}} @endisset <br/>
                            <b>@if(isset($ch['response'])) RESPUESTA CLÍNICA: </b> {{$ch['response']}} @endisset</span>
                    </p>

                    @endforeach

                    @endisset
                </div>

                  <!-- Zarit -->
                  <div>
                    @if(count($ChScaleZarit) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA ZARIT</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChScaleZarit as $ch)

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>

                    <br/>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">                        
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_one_detail'])) ¿PIENSA QUE SU FAMILIAR LE PIDE MÁS AYUDA DE LA QUE REALMENTE NECESITA? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_one_detail'])) {{$ch['q_one_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_two_detail'])) ¿PIENSA QUE DEBIDO AL TIEMPO QUE DEDICA A SU FAMILIAR, NO TIENE SUFICIENTE TIEMPO PARA USTED? </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_two_detail'])){{$ch['q_two_detail']}} @endisset  </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_three_detail'])) ¿SE SIENTE AGOBIADO POR INTENTAR COMBINAR EL CUIDADO DE SU FAMILIAR CON OTRAS RESPONSABILIDADES (TRABAJO, FAMILIA)? </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_three_detail'])) {{$ch['q_three_detail']}} @endisset  </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_four_detail'])) ¿SIENTE VERGÜENZA POR LA CONDUCTA DE SU FAMILIAR? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_four_detail'])) {{$ch['q_four_detail']}} @endisset  </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_five_detail'])) ¿SE SIENTE ENFADADO CUANDO ESTÁ CERCA DE SU FAMILIAR? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_five_detail'])) {{$ch['q_five_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_six_detail'])) ¿PIENSA QUE EL CUIDAR DE SU FAMILIAR AFECTA NEGATIVAMENTE LA RELACIÓN QUE TIENE CON OTROS MIEMBROS DE SU FAMILIA?  </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_six_detail'])) {{$ch['q_six_detail']}} @endisset  </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_seven_detail'])) ¿TIENE MIEDO POR EL FUTURO DE SU FAMILIAR? </b> @endisset  </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_seven_detail'])) {{$ch['q_seven_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_eight_detail'])) ¿PIENSA QUE SU FAMILIAR DEPENDE DE USTED? </b>@endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_eight_detail'])) {{$ch['q_eight_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"> <b>@if(isset($ch['q_nine_detail'])) ¿SE SIENTE TENSO CUANDO ESTÁ CERCA DE SU FAMILIAR?  </b>  @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri"> @if(isset($ch['q_nine_detail'])) {{$ch['q_nine_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt">  <b>@if(isset($ch['q_ten_detail'])) ¿PIENSA QUE SU SALUD HA EMPEORADO DEBIDO A TENER QUE CUIDAR A SU FAMILIAR? </b> @endisset </span>
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri"> @if(isset($ch['q_ten_detail'])) {{$ch['q_ten_detail']}} @endisset  </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_eleven_detail'])) ¿PIENSA QUE NO TIENE TANTA INTIMIDAD COMO LE GUSTARÍA DEBIDO AL CUIDADO DE SU FAMILIAR?  </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_eleven_detail'])) {{$ch['q_eleven_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_twelve_detail']))¿PIENSA QUE SU VIDA SOCIAL SE HA VISTO AFECTADA DE MANERA NEGATIVA POR TENER QUE CUIDAR A SU FAMILIAR? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_twelve_detail'])) {{$ch['q_twelve_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_thirteen_detail'])) ¿SE SIENTE INCÓMODO POR DISTANCIARTE DE SUS AMISTADES DEBIDO AL CUIDADO DE SU FAMILIAR?  </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_thirteen_detail'])) {{$ch['q_thirteen_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_fourteen_detail'])) ¿PIENSA QUE SU FAMILIAR LO CONSIDERA LA ÚNICA PERSONA QUE LE PUEDE CUIDAR?  </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_fourteen_detail'])) {{$ch['q_fourteen_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_fifteen_detail'])) ¿PIENSA QUE NO TIENE SUFICIENTES INGRESOS ECONÓMICOS PARA LOS GASTOS DE SU FAMILIAR, ADEMÁS DE LOS SUYOS?  </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_fifteen_detail'])) {{$ch['q_fifteen_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_sixteen_detail'])) ¿PIENSA QUE NO SERÁ CAPAZ DE CUIDAR A SU FAMILIAR POR MUCHO MÁS TIEMPO? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_sixteen_detail'])){{$ch['q_sixteen_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_seventeen_detail']))¿SIENTE QUE HA PERDIDO EL CONTROL DE SU VIDA DESDE QUE EMPEZÓ LA ENFERMEDAD DE SU FAMILIAR? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_seventeen_detail'])) {{$ch['q_seventeen_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"> <b>@if(isset($ch['q_eighteen_detail'])) ¿DESEARÍA PODER DELEGAR EL CUIDADO DE SU FAMILIAR A OTRA PERSONA?  </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri"> @if(isset($ch['q_eighteen_detail'])) {{$ch['q_eighteen_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"> <b>@if(isset($ch['q_nineteen_detail'])) ¿SE SIENTE INDECISO SOBRE QUÉ HACER CON SU FAMILIAR?  </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri"> @if(isset($ch['q_nineteen_detail'])) {{$ch['q_nineteen_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_twenty_detail'])) ¿PIENSA QUE DEBERÍA HACER MÁS POR SU FAMILIAR?  </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_twenty_detail'])) {{$ch['q_twenty_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_twenty_one_detail'])) ¿PIENSA QUE PODRÍA CUIDAR MEJOR A SU FAMILIAR?</b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_twenty_one_detail'])) {{$ch['q_twenty_one_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt"> 
                            <td style="width:300pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['q_twenty_two_detail'])) GLOBALMENTE, ¿QUÉ GRADO DE “CARGA” EXPERIMENTAS POR EL HECHO DE CUIDAR A SU FAMILIAR? </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['q_twenty_two_detail'])) {{$ch['q_twenty_two_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['total'])) PUNTAJE: </b> {{$ch['total']}} @endisset 
                            <b>@if(isset($ch['classification'])) CLASIFICACIÓN: </b> {{$ch['classification']}} @endisset</span>
                    </p>

                    @endforeach

                    @endisset
                </div>

            </div>

             <!-- FORMULACIÓN -->
             <div>
                
                @if(count($ChFormulation) > 0 )
                <hr />

                <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                        FORMULACIÓN <br>
                </p>
                
                    @foreach($ChFormulation as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset</span>
                    </p>

                    @if(($ch['medical_formula']) == 1 )

                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b>FORMULA AMBULATORIA</b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>  
                    @endisset

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['product_generic'])) MEDICAMENTO: </b> {{$ch['product_generic']['description']}} @endisset <br/></span>
                    </p>

                    <br/>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['dose'])) DOSIS: </b> {{$ch['dose']}} {{($ch['product_generic']['product_dose_id']==1? $ch['product_generic']['measurement_units']['code'] : $ch['product_generic']['multidose_concentration']['code'] )}} @endisset  </span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b> @if(isset($ch['administration_route'])) VÍA DE ADMON: </b> {{$ch['administration_route']['name']}} @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b> @if(isset($ch['hourly_frequency'])) FRECUENCIA HORARIA: </b>{{((+($ch['treatment_days']))/(+($ch['dose'])))*24}} {{$ch['hourly_frequency']['name']}} @endisset  </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['treatment_days'])) DIAS DE TRATAMIENTO: </b> {{$ch['treatment_days']}} @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"> <b> @if(isset($ch['outpatient_formulation'])) CANTIDAD SOLICITADA: </b> {{$ch['outpatient_formulation']}} @endisset 
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>@if(isset($ch['number_mipres'])) N° DE MIPRES: </b> {{$ch['number_mipres']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <br/>

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['observation'])) OBSERVACIONES: </b> {{$ch['observation']}} @endisset</span>
                    </p>

                    @endforeach

                @endisset
             </div>

            <!-- ORDENES MÉDICAS -->
            <div>

                @if(count($ChMedicalOrders) > 0 || count($ChInterconsultation) > 0 | count($ManagementPlan) > 0 )

                <hr />

                <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                        ORDENES MÉDICAS <br>
                </p>
                
                @endisset
                    
                    <!-- Ordenes Médicas -->
                    <div>
                    
                        @if(count($ChMedicalOrders) > 0)

                        <hr />

                        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ORDENES MÉDICAS </b> </span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>

                          
                            @foreach($ChMedicalOrders as $ch)
                                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt">
                                    <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset</span>
                                </p>

                                @if(($ch['ambulatory_medical_order']) == 'Si' )

                                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                        <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b>ORDEN MÉDICA AMBULATORIA</b> </span>
                                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                                    </p>  
                                @endisset

                                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:9pt">
                                        <b>@if(isset($ch['procedure'])) PROCEDIMIENTO: </b> {{$ch['procedure']['name']}} @endisset <br/></span>
                                    </p>
                                    <br/>
                                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                                        <tr style="height:11.95pt">
                                            <td style="width:79.75pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['amount'])) CANTIDAD </b> {{$ch['amount']}} @endisset </span>
                                                                
                                                </p>
                                            </td>
                                            <td style="width:106pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri"><b> @if(isset($ch['frequency'])) FRECUENCIA HORARIA: </b>{{$ch['frequency']['name']}} @endisset  </span>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:9pt">
                                        <b>@if(isset($ch['observations'])) OBSERVACIONES: </b> {{$ch['observations']}} @endisset</span>
                                    </p>

                        @endforeach
                        @endisset
                    </div>

                    <!-- Interconsulta -->
                    <div>

                            @if(count($ChInterconsultation) > 0)

                            <hr />

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> INTERCONSULTA </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>                          
                                
                                @foreach($ChInterconsultation as $ch)

                                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:9pt">
                                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset</span>
                                    </p>

                                        
                                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:9pt">
                                        <b>@if(isset($ch['specialty'])) ESPECIALIDAD: </b> {{$ch['specialty']['name']}} @endisset <br/></span>
                                    </p>
                                    
                                    <br/>

                                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                                        <tr style="height:11.95pt">
                                            
                                            <td style="width:79.75pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['amount'])) CANTIDAD </b> {{$ch['amount']}} @endisset </span>
                                                                    
                                                </p>
                                            </td>
                                            <td style="width:106pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri"><b> @if(isset($ch['frequency_id'])) FRECUENCIA HORARIA: </b>{{$ch['frequency']['name']}} @endisset  </span>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:9pt">
                                        <b>@if(isset($ch['observations'])) OBSERVACIONES: </b> {{$ch['observations']}} @endisset</span>
                                    </p>

                                @endforeach
                            @endisset  

                    </div>

                    <!-- Plan de Manejo -->
                    <div>

                            @if(count($ManagementPlan) > 0)

                                <hr />

                                <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> PLAN DE MANEJO </b> </span>
                                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                                </p>

                                @foreach($ManagementPlan as $ch)

                                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                            <span style="font-family:Calibri; font-size:9pt">
                                                <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset</span>
                                    </p>

                                    <br/>

                                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                                        <tr style="height:11.95pt">                                    
                                            <td style="width:180pt; vertical-align:top">
                                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['type_of_attention'])) TIPO DE ATENCIÓN </b>{{$ch['type_of_attention']['name']}} @endisset</span>
                                                                    
                                                </p>
                                            </td>
                                            <td style="width:180pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri"><b> @if(isset($ch['service_briefcase'])) PROCEDIMIENTO </b>{{$ch['service_briefcase']['manual_price']['name']}} @endisset  </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="height:11.95pt">  
                                        <td style="width:180pt; vertical-align:top">
                                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                                <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['frequency'])) FRECUENCIA </b>{{$ch['frequency']['name']}} @endisset  </span>
                                                </p>
                                            </td>
                                            <td style="width:180pt; vertical-align:top">
                                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                                    <span style="font-family:Calibri"><b> @if(isset($ch['quantity'])) CANTIDAD PROYECTADA </b>{{$ch['quantity']}} @endisset  </span>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                @endforeach
                            @endisset 
                    </div>
            
            </div>

             <!-- INCAPACIDAD -->
             <div>
                
                    @if(count($ChInability) > 0 )

                    <hr />

                    <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                        INCAPACIDAD MÉDICA<br>
                    </p>

                               
                    @foreach($ChInability as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset</span>
                    </p>

                    @if(($ch['extension']) == 'Si' )

                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b>PORROGA</b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>  
                    @endisset

                    <br/>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:180pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['initial_date'])) FECHA INICIAL </b>{{substr($ch['initial_date'],0,10) }} @endisset</span>
                                </p>
                            </td>
                            <td style="width:1fr; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b> @if(isset($ch['final_date'])) FECHA FINAL </b>{{substr($ch['final_date'],0,10) }} @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:180pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b> @if(isset($ch['total_days'])) DIAS DE INCAPACIDAD </b>{{$ch['total_days']}}  @endisset  </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:200pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['diagnosis'])) DIAGNÓSTICO </b> {{$ch['diagnosis'] ['name']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:180pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b> @if(isset($ch['ch_contingency_code'])) CÓDIGO CONTIGENCIA </b> {{$ch['ch_contingency_code']['name']}} @endisset 
                                </p>
                            </td>
                            <td style="width:180pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>@if(isset($ch['ch_type_inability'])) TIPO DE INCAPACIDAD </b> {{$ch['ch_type_inability']['name']}} @endisset </span>
                                </p>
                            </td>

                            <td style="width:180px; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>@if(isset($ch['ch_type_procedure'])) TIPO DE PROCEDIMIENTO </b> {{$ch['ch_type_procedure']['name']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <br/>

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['observation'])) OBSERVACIÓN PROFESIONAL: </b> {{$ch['observation']}} @endisset</span>
                    </p>

                    @endforeach

                @endisset
                </div>
             </div>

            <!-- CERTIFICADO MÉDICO -->
            <div>
                
                @if(count($ChMedicalCertificate) > 0 )

                <hr />

                <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                        CERTIFICADO MÉDICO<br>
                </p>

                    @foreach($ChMedicalCertificate as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset</span>
                    </p>

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['description'])) CERTIFICADO MÉDICO: </b> {{$ch['description']}} @endisset <br/></span>
                    </p>

                    @endforeach

                @endisset
            </div>

            <!-- FALLIDA -->
            <div>
                @if(count($ChFailed) > 0 )

                <hr />

                <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                        FALLIDA<br>
                </p>
                                
                        @foreach($ChFailed as $ch)
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                                <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset</span>
                        </p>

                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['ch_reason'])) MOTIVO: </b> {{$ch['ch_reason']['name']}} @endisset <br/></span>
                        </p>

                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['description'])) OBSERVACIÓN: </b> {{$ch['description']}} @endisset <br/></span>
                        </p>

                        @endforeach

                @endisset
            </div>

            <!-- SALIDA -->
            <div>
                
                @if(count($ChPatientExit) > 0 )

                <hr />

                <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                    SALIDA<br>
                </p>
                
                
                    @foreach($ChPatientExit as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset</span>
                    </p>

                    <div>
                        @if(($ch['exit_status']) == 1 )

                        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b>VIVO</b> </span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>

                        <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['ch_diagnosis'])) DIAGNÓSTICO INGRESO </b>{{$ch['ch_diagnosis']['name']}} @endisset </span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri"><b> @if(isset($ch['exit_diagnosis'])) DIAGNÓSTICO SALIDA </b>{{$ch['exit_diagnosis']['name']}} @endisset </span>
                                                    
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri"><b> @if(isset($ch['relations_diagnosis'])) DIAGNÓSTICO RELACIONADO  </b>{{$ch['relations_diagnosis']['name']}}  @endisset  </span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri"><b> @if(isset($ch['reason_exit'])) MOTIVO DE SALIDA</b>{{$ch['reason_exit']['name']}}  @endisset  </span>
                                    </p>
                                </td>
                            </tr>
                        
                        </table>         

                        @endisset     
                    </div>  

                    <div>
                        @if(($ch['exit_status']) == 2 )

                        <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b>FALLECIDO</b> </span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>
                        
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['date_time'])) FECHA Y HORA DE MUERTE </b>{{$ch['date_time']}} @endisset </span>
                        </p> 
                               

                            @if(($ch['legal_medicine_transfer']) == 'Si' )

                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b>TRASLADO A MEDICINA LEGAL</b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>

                            @endisset                 
                    
                        <br/>

                        <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['death_diagnosis'])) CAUSA DE LA MUERTE </b> @endisset  </span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                        <span style="font-family:Calibri">@if(isset($ch['death_diagnosis'])){{$ch['death_diagnosis']['name']}} @endisset  </span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:9pt"><b> @if(isset($ch['medical_signature'])) MEDICO QUE FIRMA CERTIFICADO DE DEFUNSIÓN </b> @endisset  </span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                        <span style="font-family:Calibri">@if(isset($ch['medical_signature'])) {{$ch['medical_signature']}} @endisset  </span>
                                                    
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:9pt"><b> @if(isset($ch['death_certificate_number'])) NÚMERO CERTIFICADO DE DEFUNSIÓN </b> @endisset  </span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                        <span style="font-family:Calibri">@if(isset($ch['death_certificate_number'])) {{$ch['death_certificate_number']}}  @endisset  </span>
                                    </p>
                                </td>
                            </tr>
                        
                        </table>

                        @endisset
                    </div>

                @endforeach
                @endisset

            </div>

            @endisset
        </div>


        

































































































































        <!-- Terapia Respiratoria-->
 <div>
    @if($chrecord[0]['ch_type_id'] == 5)

    <!-- INGRESO -->
    <div>
        <hr />
        <!-- Validación Ingreso -->
        <div>
            @if(count($ChRespiratoryTherapy) > 0 || count($ChBackground) > 0 || count($ChVitalSigns) > 0  || count($ChOxygenTherapy) > 0 || count($ChAssSigns) > 0  )

            <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                INGRESO<br>
            </p>
            @endisset
        </div>

        <!-- Valoración -->
        <div>
            @if(count($ChRespiratoryTherapy) > 0)
         
            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> VALORACIÓN </b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            @foreach($ChRespiratoryTherapy as $ch)
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['medical_diagnosis'])) DIAGNÓSTICO MÉDICO: </b> {{$Ch[0]['medical_diagnosis']}} @endisset</span>
            </p>
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['therapeutic_diagnosis'])) DIAGNÓSTICO TERÁPEUTICO CIF: </b> {{$Ch[0]['therapeutic_diagnosis']}} @endisset</span>
            </p>
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['reason_consultation'])) MOTIVO DE CONSULTA: </b> {{$Ch[0]['reason_consultation']}} @endisset</span>
            </p>                    
            @endforeach

            @endisset

        </div>

        <!-- Antecedentes -->
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
                <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</span></th>
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

            @if(isset($ch['observation']))
            <td>
                <span style="font-family:Calibri; font-size:9pt">{{$ch['observation']}}</span>
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
                                    <span style="font-family:Calibri"><b> @if(isset($ch['clock']))HORA REGISTRO: </b>{{$ch['clock']}} @endisset</span>
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

        <!-- Destete de oxigeno -->
        <div>
            @if(count($ChOxygenTherapy) > 0)
            
                <hr />

                <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DESTETE DE OXÍGENO </b></span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>

                @foreach($ChOxygenTherapy as $ch)
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['revision'])) DESTETE DE OXÍGENO: </b> {{$Ch[0]['revision']}} @endisset</span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['observation'])) OBSERVACIÓN: </b> {{$Ch[0]['observation']}} @endisset</span>
                </p>
                                
                @endforeach

            @endisset
        </div>

          <!-- Valoración Terápeutica -->
          <div>
            @if(count($ChAssSigns) > 0)
            
                <hr />

                <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> VALORACIÓN TERÁPEUTICA</b></span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>

                @foreach($ChAssSigns as $ch)
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['revision'])) DESTETE DE OXÍGENO: </b> {{$Ch[0]['revision']}} @endisset</span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['observation'])) OBSERVACIÓN: </b> {{$Ch[0]['observation']}} @endisset</span>
                </p>
                                
                @endforeach

            @endisset
        </div>

    </div>          
    

    @endisset
</div>
















































































































































    <!-- Enfermeria -->
    <div>
        @if($chrecord[0]['ch_type_id'] == 2 )

       <!-- INGRESO -->
        <div>
                
                <!-- Validación Ingreso -->
                <hr />
                <div>
                    @if(count($ChPosition) > 0 || count($ChHairValoration) > 0 || count($ChOstomies) > 0 || count($ChPhysicalExam) > 0
                    || count($ChVitalSigns) > 0  )

                    <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9pt">
                        INGRESO<br>
                    </p>
                    @endisset
                </div>
        </div>

            <!-- Nota de Ingreso -->
                <!-- Posición -->
                <div>
                    @if(count($ChPosition) > 0)

                    <hr />

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> POSICIÓN</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                  
                    @foreach($ChPosition as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                            <b>@if(isset($ch['patient_position'])) POSICIÓN: </b> {{$ch['patient_position']['name']}} @endisset <br/>
                            <b>@if(isset($ch['observation'])) OBSERVACIÓN : </b> {{$ch['observation']}} @endisset</span>
                    </p>
                    @endforeach
                    @endisset
                </div>  
                <!-- Cuero Cabelludo -->
                <div>
                                @if(count($ChHairValoration) > 0)


                                <hr />

                                <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>VALORACIÓN CAPILAR </b> </span>
                                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                                </p>

                                @foreach($ChHairValoration as $ch)
                                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt">
                                        <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                                        <b>@if(isset($ch['hair_revision'])) CUERO CABELLUDO: </b> {{$ch['hair_revision']}} @endisset <br/>
                                        <b>@if(isset($ch['observation'])) OBSERVACIÓN: </b> {{$ch['observation']}} @endisset
                                    </span>
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
                            <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                            <b>@if(isset($ch['ostomy'])) OSTOMIA: </b> {{$ch['ostomy']['name']}} @endisset <br/>
                            <b>@if(isset($ch['observation'])) OBSERVACIÓN : </b> {{$ch['observation']}} @endisset</span> <br/>
                    </p>
                    @endforeach

                    @endisset
                </div>
                    
            <!-- Rx Físico -->
                <div>

                    @if(count($ChPhysicalExam) > 0)

                    <hr />

                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> RX FÍSICO </b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>


                            <table class="tablehc">

                                <tr>

                                    <th><span style="font-family:Calibri; font-size:9pt">FECHA</span></th>

                                    <th><span style="font-family:Calibri; font-size:9pt">TIPO  </span></th>

                                    <th><span style="font-family:Calibri; font-size:9pt">REVISIÓN</span></th>

                                    <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</span></th>

                                </tr>
                                @foreach($ChPhysicalExam as $ch)
                                <tr>

                                    @if(isset($ch['created_at']))
                                    <td>

                                        <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>

                                    </td>
                                    @endisset

                                    @if(isset($ch['type_ch_physical_exam']))
                                    <td>

                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['type_ch_physical_exam']['name']}}</span>

                                    </td>
                                    @endisset

                                    @if(isset($ch['revision']))
                                    <td>

                                    <span style="font-family:Calibri; font-size:9pt">{{$ch['revision']}}</span>

                                    </td>
                                    @endisset

                                    @if(isset($ch['description']))
                                    <td>

                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['description']}}</span>

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
    
        <!-- NOTA ENFERMERÍA -->
            <div>
                    <hr />
                    <!-- Validación Ingreso -->
                    <div>
                        @if(count($ChPositionNE) > 0 || count($ChHairValorationNE) > 0 || count($ChPhysicalExamNE) > 0
                        || count($ChVitalSignsNE) > 0  )

                        <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9pt">
                            NOTA DE ENFERMERÍA<br>
                        </p>
                        @endisset
                    </div>
            </div>

            <!-- Descripción Nota -->
                <!-- Posición -->
                <div>
                    @if(count($ChPositionNE) > 0)

                    <hr />

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> POSICIÓN</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                    @foreach($ChPositionNE as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                            <b>@if(isset($ch['patient_position'])) POSICIÓN: </b> {{$ch['patient_position']['name']}} @endisset <br/>
                            <b>@if(isset($ch['observation'])) OBSERVACIÓN : </b> {{$ch['observation']}} @endisset</span>
                    </p>
                    @endforeach
                    @endisset
                </div>  
                <!-- Cuero Cabelludo -->
                <div>
                                @if(count($ChHairValorationNE) > 0)


                                <hr />

                                <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>VALORACIÓN CAPILAR </b> </span>
                                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                                </p>

                                @foreach($ChHairValorationNE as $ch)
                                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt">
                                        <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                                        <b>@if(isset($ch['hair_revision'])) CUERO CABELLUDO: </b> {{$ch['hair_revision']}} @endisset <br/>
                                        <b>@if(isset($ch['observation'])) OBSERVACIÓN: </b> {{$ch['observation']}} @endisset
                                    </span>
                                </p>
                                @endforeach

                                @endisset
                </div>
                <!-- ¿Tiene Oxigeno?            -->
                <div>
                    @if(count($ChOxigenNE) > 0)

                    <hr />

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ¿TIENE OXIGENO?</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                    @foreach($ChOxigenNE as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                            <b>@if(isset($ch['oxygen_type'])) TIPO DE OXÍGENO: </b> {{$ch['oxygen_type']['name']}} @endisset <br/>
                            <b>@if(isset($ch['liters_per_minute'])) LITROS POR MINUTO: </b> {{$ch['liters_per_minute']['name']}} @endisset</span>
                    </p>
                    @endforeach
                    @endisset
                </div> 

                <!-- Unidad Del Paciente   -->
                <div>
                    @if(count($ChNotesDescription) > 0)

                    <hr />

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> UNIDAD DEL PACIENTE</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                    @foreach($ChNotesDescription as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                            <b>@if(isset($ch['patient_position']))POSICIÓN ACTUAL: </b> {{$ch['patient_position']['name']}} @endisset <br/>
                            <b>@if(isset($ch['patient_dry'])) UNIDAD: </b> {{$ch['patient_dry']}} @endisset <br/>
                            <b>@if(isset($ch['unit_arrangement'])) BAÑAR: </b> {{$ch['unit_arrangement']}} @endisset</span>
                    </p>
                    @endforeach
                    @endisset
                </div> 
            <!-- Rx Físico -->
            <div>

                @if(count($ChPhysicalExamNE) > 0)

                <hr />

                    <p style="text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> REVISIÓN FÍSICO </b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                        
                        <table class="tablehc">

                            <tr>
                                <th><span style="font-family:Calibri; font-size:9pt">FECHA</span></th>
                                <th><span style="font-family:Calibri; font-size:9pt">TIPO</span></th>
                                <th><span style="font-family:Calibri; font-size:9pt">REVISIÓN</span></th>
                                <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</span></th>
                            </tr>

                            @foreach($ChPhysicalExamNE as $ch)
                            <tr>
                            
                                @if(isset($ch['created_at']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                                </td>
                                @endisset

                                @if(isset($ch['type_ch_physical_exam']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{$ch['type_ch_physical_exam']['name']}}</span>
                                </td>
                                @endisset

                                @if(isset($ch['revision']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{$ch['revision']}}</span>
                                </td>
                                @endisset

                                @if(isset($ch['description']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{$ch['description']}}</span>
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
  
            
     <!-- Procedimientos de enfermeria           -->
                <div>
                        @if(count($ChNursingProcedure) > 0)

                        <hr />

                        <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>PROCEDIMIENTO DE ENFERMERÍA</b></span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>

                        <table class="tablehc">

                                    <tr>

                                        <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>

                                        <th><span style="font-family:Calibri; font-size:9pt">PROCEDIMIENTOS DE ENFERMERÍA</th>

                                        <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</th>

                                        
                                    </tr>

                                    @foreach($ChNursingProcedure as $ch)
                                    <tr>

                                        @if(isset($ch['created_at']))
                                        <td>

                                        <span style="font-family:Calibri; font-size:9pt"> {{substr($ch['created_at'],0,10) }} </span>

                                        </td>
                                        @endisset
                                        @if(isset($ch['nursing_procedure']))
                                        <td>

                                        <span style="font-family:Calibri; font-size:9pt">  {{$ch['nursing_procedure']['name']}} </span>

                                        </td>
                                        @endisset
                                        @if(isset($ch['observation']))
                                        <td>

                                        <span style="font-family:Calibri; font-size:9pt">  {{$ch['observation']}} </span>

                                        </td>
                                        @endisset
                                    @endforeach
                        </table>
                        
                        @endisset
            </div> 
             <!-- Plan de Cuidados          -->
                <div>
                        @if(count($ChCarePlan) > 0)

                        <hr />

                        <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>PLAN DE CUIDADOS</b></span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>

                        <table class="tablehc">

                                    <tr>

                                        <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>

                                        <th><span style="font-family:Calibri; font-size:9pt">PLAN DE CUIDADOS</th>

                                        
                                    </tr>

                                    @foreach($ChCarePlan as $ch)
                                    <tr>

                                        @if(isset($ch['created_at']))
                                        <td>

                                        <span style="font-family:Calibri; font-size:9pt"> {{substr($ch['created_at'],0,10) }} </span>

                                        </td>
                                        @endisset
                                        @if(isset($ch['nursing_care_plan']))
                                        <td>

                                        <span style="font-family:Calibri; font-size:9pt">{{$ch['nursing_care_plan']['description']}} </span>

                                        </td>
                                        @endisset
                                    @endforeach
                        </table>
                    @endisset
                </div> 
            <!--Control de Liquidos-->
                <div>
                        @if(count($ChLiquidControl) > 0)

                        <hr />

                        <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>CONTROL DE LIQUIDOS</b></span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>

                        <table class="tablehc">

                                    <tr>


                                        <th><span style="font-family:Calibri; font-size:9pt">HORA DEL EVENTO</th>
                                            
                                

                                        <th><span style="font-family:Calibri; font-size:9pt">ELEMENTO</th>

                                        <th><span style="font-family:Calibri; font-size:9pt">TIPO DE FLUIDO</th>

                                        <th><span style="font-family:Calibri; font-size:9pt">CANTIDAD (CC)</th>

                                        @if(isset($chrecord[0]['specific_name']))
                                        
                                        <th><span style="font-family:Calibri; font-size:9pt">ADICIONAL</th>

                                         @endisset



                                        
                                    </tr>

                                    @foreach($ChLiquidControl as $ch)
                                    <tr>

                                        @if(isset($ch['clock']))
                                        <td>

                                        <span style="font-family:Calibri; font-size:9pt">    {{$ch['clock']}} </span>

                                        </td>
                                        @endisset

                                        @if(isset($ch['ch_route_fluid']))
                                        <td>

                                        <span style="font-family:Calibri; font-size:9pt">    {{$ch['ch_route_fluid']['name']}} </span>

                                        </td>
                                        @endisset

                                        @if(isset($ch['ch_type_fluid']))
                                        <td>

                                        <span style="font-family:Calibri; font-size:9pt"> {{$ch['ch_type_fluid']['name']}} </span>

                                        </td>

                                        @endisset
                                        @if(isset($ch['delivered_volume']))
                                        <td>

                                        <span style="font-family:Calibri; font-size:9pt">    {{$ch['delivered_volume']}} </span>

                                        </td>
                                        @endisset

                                        @if(isset($chrecord[0]['specific_name']))


                                        @if(isset($ch['specific_name']))
                                        <td>

                                        <span style="font-family:Calibri; font-size:9pt"> {{$ch['specific_name'] }} </span>

                                        </td>
                                        @endisset
                                        @endisset


                                        

                                    </tr>
                                    @endforeach
                        </table>
                    @endisset
                </div> 

             <!-- VALORACIÓN DE LA PIEL -->
             <div>
                <hr />
                <!-- Validación Ingreso -->
                <div>
                    @if(count($ChSkinValoration) > 0  )

                    <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9pt">
                        VALORACIÓN DE LA PIEL<br>
                    </p>
                    @endisset
                </div>
        </div>

        <!-- Descripción Nota -->
            <!-- VALORACIÓN DE LA PIEL -->
            <div>
                @if(count($ChSkinValoration) > 0)

                <hr />

               
                @foreach($ChSkinValoration as $ch)
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>  {{substr($ch['created_at'],0,10) }} @endisset <br/>
                        
                        
                        <b>@if(isset($ch['diagnosis'])) DIAGNÓSTICO: </b> {{$ch['diagnosis']['name']}} @endisset <br/>
                        <b>@if(isset($ch['body_region'])) ZONA EXAMINADA: </b>  {{$ch['body_region']['name']}} @endisset <br/>
                        <b>@if(isset($ch['skin_status'])) ESTADO DE LA PIEL: </b>  {{$ch['skin_status'] ['name']}} @endisset <br/>


                    
                        <b>@if(isset($ch['exudate'])) EXUDADO: </b> {{$ch['exudate']}} @endisset <br/>
                        
                       
                        <b>@if(isset($ch['concentrated'])) TIPO DE EXUDADO: </b> {{$ch['concentrated']}} @endisset <br/>
                        
                        
                        <b>@if(isset($ch['infection_sign'])) SIGNOS DE INFECCIÓN: </b> {{$ch['infection_sign']}} @endisset <br/>
                        
                        <b>@if(isset($ch['surrounding_skin'])) PIEL CIRCUNDANTE: </b> {{$ch['surrounding_skin']}} @endisset
                        
                    </span>
                </p>
                @endforeach
                @endisset
            </div>  
       


            <!-- ESCALAS -->
            <div>
                        
                <!-- Validación Escalas -->
                <div>
                    @if(count($ChScaleNorton) > 0  || count($ChScaleGlasgow) > 0 || count($ChScaleBraden) > 0 || count($ChScaleJhDownton) > 0 )

                    <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                        ESCALAS<br>
                    </p>
                    @endisset
                </div>

                <!-- Norton -->
                <div>
                    @if(count($ChScaleNorton) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA NORTON</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    <table class="tablehc">
                        <tr>
                            <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                            <th><span style="font-family:Calibri; font-size:9pt">ESTADO FÍSICO GENERAL</th>
                            <th><span style="font-family:Calibri; font-size:9pt">ESTADO MENTAL </th>
                            <th><span style="font-family:Calibri; font-size:9pt">MOVILIDAD</th>
                            <th><span style="font-family:Calibri; font-size:9pt">ACTIVIDAD</th>
                            <th><span style="font-family:Calibri; font-size:9pt">INCONTINENCIA</th>
                            <th><span style="font-family:Calibri; font-size:9pt">TOTAL</th>
                            <th><span style="font-family:Calibri; font-size:9pt">RIESGO</th>
                        </tr>

                        @foreach($ChScaleNorton as $ch)
                        <tr>                        
                        @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                            </td>
                            @endisset

                        @if(isset($ch['physical_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['physical_detail']}}</span>
                            </td>
                            @endisset

                        @if(isset($ch['mind_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['mind_detail']}}</span>
                            </td>
                            @endisset

                        @if(isset($ch['mobility_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['mobility_detail']}}</span>
                            </td>
                            @endisset

                            @if(isset($ch['activity_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['activity_detail']}}</span>
                            </td>
                            @endisset

                        @if(isset($ch['incontinence_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['incontinence_detail']}}</span>
                            </td>

                            @endisset    
                            @if(isset($ch['total']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['total']}}</span>
                            </td>
                            @endisset

                        @if(isset($ch['risk']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['risk']}}</span>
                            </td>
                            @endisset
                        
                        </tr>
                        @endforeach

                    </table>

                    @endisset
                </div>

                <!-- Glasgow -->
                <div>
                    @if(count($ChScaleGlasgow) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA GLASGOW</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    <table class="tablehc">
                        <tr>
                            <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                            <th><span style="font-family:Calibri; font-size:9pt">RESPUESTA MOTORA</th>
                            <th><span style="font-family:Calibri; font-size:9pt">RESPUESTA VERBAL</th>
                            <th><span style="font-family:Calibri; font-size:9pt">APERTURA OCULAR</th>
                            <th><span style="font-family:Calibri; font-size:9pt">PUNTAJE</th>
                        </tr>

                        @foreach($ChScaleGlasgow as $ch)
                        <tr>                        
                           @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                            </td>
                            @endisset

                          @if(isset($ch['ocular_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['ocular_detail']}}</span>
                            </td>
                            @endisset

                         @if(isset($ch['verbal_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['verbal_detail']}}</span>
                            </td>
                            @endisset

                          @if(isset($ch['motor_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['motor_detail']}}</span>
                            </td>
                            @endisset

                           @if(isset($ch['total']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['total']}} </span>
                            </td>
                            @endisset
                                                
                        </tr>
                        @endforeach

                    </table>

                    @endisset
                </div>


                <!-- Jh Downton -->
                <div>
                    @if(count($ChScaleJhDownton) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA JH DOWTON</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    <table class="tablehc">
                        <tr>
                            <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                            <th><span style="font-family:Calibri; font-size:9pt">MEDICACIÓN</th>
                            <th><span style="font-family:Calibri; font-size:9pt">DÉFICIT SENSORIALES </th>
                            <th><span style="font-family:Calibri; font-size:9pt">DEAMBULACIÓN</th>
                            <th><span style="font-family:Calibri; font-size:9pt">ESTADO MENTAL</th>
                            <th><span style="font-family:Calibri; font-size:9pt">CAÍDAS PREVIAS</th>
                            <th><span style="font-family:Calibri; font-size:9pt">TOTAL</th>
                            <th><span style="font-family:Calibri; font-size:9pt">RIESGO</th>
                        </tr>

                        @foreach($ChScaleJhDownton as $ch)
                        <tr>                        
                        @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                            </td>
                            @endisset

                        @if(isset($ch['falls_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['falls_detail']}}</span>
                            </td>
                            @endisset

                        @if(isset($ch['medication_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['medication_detail']}}</span>
                            </td>
                            @endisset

                        @if(isset($ch['deficiency_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['deficiency_detail']}}</span>
                            </td>
                            @endisset

                            @if(isset($ch['mental_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['mental_detail']}}</span>
                            </td>
                            @endisset

                        @if(isset($ch['wandering_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['wandering_detail']}}</span>
                            </td>

                            @endisset    
                            @if(isset($ch['total']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['total']}}</span>
                            </td>
                            @endisset

                        @if(isset($ch['risk']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['risk']}}</span>
                            </td>
                            @endisset
                        
                        </tr>
                        @endforeach

                    </table>

                    @endisset
                </div>

                <!-- Braden -->
                <div>
                    @if(count($ChScaleBraden) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">ESCALA BRADEN</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChScaleBraden as $ch)

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>
                    <br/>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">                        
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['sensory_detail'])) PERCEPCIÓN SENSORIAL: </b>@endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['sensory_detail'])){{$ch['sensory_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['humidity_detail'])) EXPOSICIÓN A LA HUMEDAD: </b>  @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['humidity_detail'])){{$ch['humidity_detail']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"> <b>@if(isset($ch['activity_detail'])) ACTIVIDAD: </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['activity_detail'])){{$ch['activity_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt">  <b>@if(isset($ch['mobility_detail'])) MOVILIDAD: </b> @endisset  </span>
                                                
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri"> @if(isset($ch['mobility_detail'])) {{$ch['mobility_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['nutrition_detail'])) NUTRICIÓN: </b>  @endisset   </span>
                                                
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['nutrition_detail'])) {{$ch['nutrition_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:80pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['lesion_detail'])) ROCE Y PELIGRO DE LESIONES: </b> @endisset </span>
                                                
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                    <span style="font-family:Calibri">@if(isset($ch['lesion_detail'])) {{$ch['lesion_detail']}} @endisset </span>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <br/>                    
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['total'])) TOTAL: </b> {{$ch['total']}} @endisset
                            <b>@if(isset($ch['risk'])) RIESGO: </b> {{$ch['risk']}} @endisset</span>
                    </p>

                    @endforeach

                    @endisset
                </div>
    {{-- Aplicacion de Medicamentos --}}

                 <div>
                    @if(count($ChScaleGlasgow) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">APLICACIÓN DE MEDICAMENTOS</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    <table class="tablehc">
                        <tr>
                            <th><span style="font-family:Calibri; font-size:9pt">PRODUCTO</th>
                            <th><span style="font-family:Calibri; font-size:9pt">DESCRIPCIÓN</th>
                            <th><span style="font-family:Calibri; font-size:9pt">INDICACIONES</th>
                            <th><span style="font-family:Calibri; font-size:9pt">CONTRAINDICACIONES</th>
                            <th><span style="font-family:Calibri; font-size:9pt">REFRIGERACIÓN</th>
                        </tr>

                        @foreach($PharmacyProductRequest as $ch)
                        <tr>                        
                           {{-- @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['pharmacy_request_shipping']['pharmacy_lot_stock']['billing_stock']['product'] ? 
                                $ch['pharmacy_request_shipping']['pharmacy_lot_stock']['billing_stock']['product']['name'] : 
                                $ch['pharmacy_request_shipping']['pharmacy_lot_stock']['billing_stock']['product_supplies_com']['name'] }}</span>
                            </td>
                            @endisset --}}

                          @if(isset($ch['ocular_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['ocular_detail']}}</span>
                            </td>
                            @endisset

                         @if(isset($ch['verbal_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['verbal_detail']}}</span>
                            </td>
                            @endisset

                          @if(isset($ch['motor_detail']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['motor_detail']}}</span>
                            </td>
                            @endisset

                           @if(isset($ch['total']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['total']}} </span>
                            </td>
                            @endisset
                                                
                        </tr>
                        @endforeach

                    </table>

                    @endisset
                </div>

          @endisset
        </div>
                          





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
                    || count($RecommendationsEvo) > 0 || count($ChVitalSigns) > 0)

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
                    <b>@if(isset($ch['therapeutic_diagnosis'])) DIANOSTICO MÉDICO:</b> {{$ch['therapeutic_diagnosis']['name']}} @endisset <br/>
                    <b>@if(isset($ch['therapeutic_diagnosis'])) DIANOSTICO TERAPÉUTICO:</b> {{$ch['therapeutic_diagnosis']['name']}} @endisset <br/>
                    <b>@if(isset($ch['reason_consultation']))  MOTIVO DE CONSULTA:</b> {{$ch['reason_consultation']}} @endisset <br/></span>
            </p>
            @endforeach
            @endisset
        </div> 
         <!-- ANTECEDENTES -->
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
                <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</span></th>
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

                @if(isset($ch['observation']))
                <td>
                    <span style="font-family:Calibri; font-size:9pt">{{$ch['observation']}}</span>
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
                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                    <b>@if(isset($ch['jejunostomy'])) YEYUNOSTOMÍA:</b> {{$ch['jejunostomy']}} @endisset <br/>
                    <b>@if(isset($ch['colostomy']))  COLOSTOMÍA: </b> {{$ch['colostomy']}} @endisset <br/>
                    <b>@if(isset($ch['observations'])) OBSERVACIÓN: </b> {{$ch['observations']}} @endisset</span>
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
                @endisset

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
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['nasogastric_tube']) )SONDA NASOGÁSTRICA:b>@endisset</span>
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

                        @endforeach
        </table>

        
        <br/>
    
        <span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:8pt"> &nbsp;&nbsp;<b>OBSERVACIÓN:</b> 
        </span><span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:7pt"> &nbsp;&nbsp;@if(isset($ch['observations'])) {{$ch['observations']}} @endisset</span>
     
        </p>

       
    </div>


         <!-- Alteraciones En La Voz -->
         <div>
            @if(count($VoiceAlterationsTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>ALTERACIONES EN LA VOZ</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @endisset

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

                @endforeach
        </table>
        
        <br/>
    
        <span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:8pt"> &nbsp;&nbsp;<b>OBSERVACIÓN:</b> 
        </span><span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:7pt"> &nbsp;&nbsp;@if(isset($ch['observations'])) {{$ch['observations']}} @endisset</span>
     
        </p>
            
        </div> 
        <!-- Audición-->
        <div>
            @if(count($HearingTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>AUDICIÓN</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @endisset

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
                        <span style="font-family:Calibri">@if(isset($ch['intensity_alteration'])) {{$ch['intensity_alteration']}} @endisset</span>
                    </p>
                </td>
            </tr>

    @endforeach
</table>
 
        
        <br/>
    
        <span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:8pt"> &nbsp;&nbsp;<b>OBSERVACIÓN:</b> 
        </span><span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri; font-size:7pt"> &nbsp;&nbsp;@if(isset($ch['observations'])) {{$ch['observations']}} @endisset</span>
     
        </p>
            
        </div> 

        <!-- Lenguaje -->
        <div>
            @if(count($LanguageTl) > 0)

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>LINGÜÍSTICO</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            {{-- @foreach($LanguageTl as $ch)
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                        <b>@if(isset($ch['phonetic_phonological']))FONÉTICO/FONOLÓGICO:</b> {{$ch['phonetic_phonological']}} @endisset <br/>
                        <b>@if(isset($ch['syntactic']))SINTÁCTICO: </b> {{$ch['syntactic']}} @endisset <br/>
                        <b>@if(isset($ch['morphosyntactic']))MORFOSINTÁCTICO: </b> {{$ch['morphosyntactic']}} @endisset <br/>
                        <b>@if(isset($ch['semantic']))SEMÁNTICO: </b> {{$ch['semantic']}} @endisset <br/>
                        <b>@if(isset($ch['pragmatic'])) PRAGMÁTICO: </b> {{$ch['pragmatic']}} @endisset</span>
                </p>
            </p> --}}


            @foreach($LanguageTl as $ch)
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['solid_dysphagia']) )FONÉTICO/FONOLÓGICO:</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['solid_dysphagia']) ) {{$ch['solid_dysphagia']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['clear_liquid_dysphagia']) )SINTÁCTICO:</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['clear_liquid_dysphagia'])) {{$ch['clear_liquid_dysphagia']}} @endisset</span>
                                </p>
                            </td>
                        </tr>

                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['thick_liquid_dysphagia']) )MORFOSINTÁCTICO:</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['thick_liquid_dysphagia']) ) {{$ch['thick_liquid_dysphagia']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['nasogastric_tube']) )SEMÁNTICO:</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['nasogastric_tube'])) {{$ch['nasogastric_tube']}} @endisset</span>
                                </p>
                            </td>
                        </tr>








            <hr />
            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>PSICOLINGÜÍSTICO</b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                        <b>@if(isset($ch['reception'])) RECEPCIÓN:</b> {{$ch['reception']}} @endisset <br/>
                        <b>@if(isset($ch['coding']))CODIFICACIÓN: </b> {{$ch['coding']}} @endisset <br/>
                        <b>@if(isset($ch['decoding'])) DECODIFICACIÓN: </b> {{$ch['decoding']}} @endisset <br/>
                        <b>@if(isset($ch['production']))PRODUCCIÓN: </b> {{$ch['production']}} @endisset <br/>
                        <b>@if(isset($ch['observations'])) OBSERVACIÓN: </b> {{$ch['observations']}} @endisset</span>
                </p>
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
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                    <b>@if(isset($ch['eye_contact'])) CONTACTO VISUAL:</b> {{$ch['eye_contact']}} @endisset <br/>
                    <b>@if(isset($ch['courtesy_rules']))NORMAS DE CORTESÍA: </b> {{$ch['courtesy_rules']}} @endisset <br/>
                    <b>@if(isset($ch['communicative_intention']))INTENCIÓN COMUNICATIVA : </b> {{$ch['communicative_intention']}} @endisset <br/>
                    <b>@if(isset($ch['communicative_purpose'])) PROPÓSITO COMUNICATIVO : </b> {{$ch['communicative_purpose']}} @endisset <br/>
                    <b>@if(isset($ch['oral_verb_modality'])) MODALIDAD VERBAL ORAL : </b> {{$ch['oral_verb_modality']}} @endisset <br/>
                    <b>@if(isset($ch['written_verb_modality']))MODALIDAD VERBAL ESCRITA : </b> {{$ch['written_verb_modality']}} @endisset <br/>
                    <b>@if(isset($ch['nonsymbolic_nonverbal_modality']))MODALIDAD NO VERBAL- NO SIMBÓLICA : </b> {{$ch['nonsymbolic_nonverbal_modality']}} @endisset <br/>
                    <b>@if(isset($ch['symbolic_nonverbal_modality']))MODALIDAD NO VERBAL - SIMBÓLICA : </b> {{$ch['symbolic_nonverbal_modality']}} @endisset <br/>
                    <b>@if(isset($ch['observations'])) OBSERVACIÓN: </b> {{$ch['observations']}} @endisset</span>
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
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                    <b>@if(isset($ch['memory']))MEMORIA:</b> {{$ch['memory']}} @endisset <br/>
                    <b>@if(isset($ch['attention']))ATENCIÓN: </b> {{$ch['attention']}} @endisset <br/>
                    <b>@if(isset($ch['concentration']))CONCENTRACIÓN: </b> {{$ch['concentration']}} @endisset <br/>
                    <b>@if(isset($ch['observations'])) OBSERVACIÓN: </b> {{$ch['observations']}} @endisset</span>
            </p>
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
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                    <b>@if(isset($ch['breathing']))RESPIRACIÓN:</b> {{$ch['breathing']}} @endisset <br/>
                    <b>@if(isset($ch['joint']))ARTICULACIÓN: </b> {{$ch['joint']}} @endisset <br/>
                    <b>@if(isset($ch['resonance']))RESONANCIA: </b> {{$ch['resonance']}} @endisset <br/>
                    <b>@if(isset($ch['observations'])) OBSERVACIÓN: </b> {{$ch['observations']}} @endisset</span>
            </p>
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
            @foreach($TherapeuticGoalsTl as $ch)
            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style=" font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>

                    <b>@if(isset($ch['hold_phonoarticulators']))</b> {{$ch['hold_phonoarticulators']}} @endisset <br/>

                    <b>@if(isset($ch['strengthen_phonoarticulators'])) </b> {{$ch['strengthen_phonoarticulators']}} @endisset <br/>
                    <b>@if(isset($ch['strengthen_tone'])) </b> {{$ch['strengthen_tone']}} @endisset <br/>
                    <b>@if(isset($ch['favor_process'])) </b> {{$ch['favor_process']}} @endisset <br/>    
                    <b>@if(isset($ch['strengthen_thread'])) </b> {{$ch['strengthen_thread']}} @endisset <br/>
                    <b>@if(isset($ch['favor_psycholinguistic'])) </b> {{$ch['favor_psycholinguistic']}} @endisset <br/>
                    <b>@if(isset($ch['increase_processes'])) </b> {{$ch['increase_processes']}} @endisset<br/>
                    <b>@if(isset($ch['strengthen_qualities'])) </b> {{$ch['strengthen_qualities']}} @endisset<br/>
                    <b>@if(isset($ch['strengthen_communication'])) </b> {{$ch['strengthen_communication']}} @endisset<br/>
                    <b>@if(isset($ch['improve_skills'])) </b> {{$ch['improve_skills']}} @endisset
                </span>
            </p>
            @endforeach
            @endisset
        </div> 



       
         

        @endisset
    </div>
                



     <!-- Firma -->
    <div>
        <br>
        <br>
        <hr />
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

</body>

</html>
