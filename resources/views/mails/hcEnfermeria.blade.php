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
                        <p> Folio: {{$chrecord[0]['consecutive']}}</p>
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

       
        <hr />

        <!-- {{-- Plan de Manejo Cabecero Enfermería --}} -->
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
                <p style="margin-top:0pt; margin-left:10pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
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
                    <p style="margin-top:0pt; margin-left:10pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
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
                <p style="margin-top:0pt; margin-left:10pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
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
                    <p style="margin-top:0pt; margin-left:10pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['assigned_management_plan']['management_plan']['dosage_administer']}} </span>
                    </p>
                </td>
                </tr>
                @endisset

                {{-- @if(isset($chrecord[0]['assigned_management_plan']['management_plan']['quantity'])) 
                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:8pt"><b>Cantidad:</b></span>
                </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:10pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri">{{$chrecord[0]['assigned_management_plan']['management_plan']['quantity']}} </span>
                 </p>
                </td>
                @endisset --}}
                
                {{-- @if(isset($chrecord[0]['assigned_management_plan']['management_plan']['route_administration'])) 
                <td style="width:79.75pt; vertical-align:top">
                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:8pt"><b>Vía de administración:</b></span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:10pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord[0]['assigned_management_plan']['management_plan']['route_administration']['name']}} </span>
                    </p>
                </td>
                </tr>
                @endisset --}}


                @if(isset($chrecord[0]['assigned_management_plan']['management_plan']['preparation'])) 

                <tr style="height:11.95pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:8pt"><b>Preparación:</b></span>
                </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                <p style="margin-top:0pt; margin-left:10pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
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
                    <p style="margin-top:0pt; margin-left:10pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
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
                <p style="margin-top:0pt; margin-left:10pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
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
                    <p style="margin-top:0pt; margin-left:10pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
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
            </span><span style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0 font-family:Calibri;  font-size:7pt"> &nbsp;&nbsp;{{$chrecord[0]['assigned_management_plan']['management_plan']['observation']}}</span>
            @endisset

            </p>







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
                        @if(count($ChPositionNE) > 0 || count($ChHairValorationNE) > 0
                         || count($ChPhysicalExamNE) > 0
                         || count($ChNursingNote) > 0
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
                    @if(count($ChNursingNote) > 0)

                    <hr />

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> NOTA DE ENFERMERÍA</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                    @foreach($ChNursingNote as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b> {{substr($ch['created_at'],0,10) }} @endisset <br/>
                            <b>@if(isset($ch['observation'])) OBSERVACIÓN : </b> {{$ch['observation']}} @endisset</span>
                    </p>
                    @endforeach
                    @endisset
                </div>  
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
                @endisset


            @endforeach
            @endisset

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
                        <b>@if(isset($ch['observation'])) OBSERVACION: </b> {{$ch['observation']}} @endisset
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
            </div>
       
       
            <!-- {{-- Aplicacion de Medicamentos --}} -->

                 <div>
                    @if(count($AssistanceSupplies) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">APLICACIÓN DE MEDICAMENTOS E INSUMOS</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    <table class="tablehc">
                        <tr>
                            <th><span style="font-family:Calibri; font-size:9pt">MEDICAMENTO E INSUMO</th>
                            <th><span style="font-family:Calibri; font-size:9pt">FECHA Y HORA DE APLICACIÓN</th>
                                <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIÓN</th>
                            <th><span style="font-family:Calibri; font-size:9pt">RESPONSABLE</th>
                        </tr>

                        @foreach($AssistanceSupplies as $ch)
                        <tr>                        
                  
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['pharmacy_product_request']['services_briefcase']['manual_price']['name']}}</span>
                            </td>
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10)}} {{$ch['application_hour']}}</span>
                            </td>
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">@if(isset($ch['observation'])) {{$ch['observation']}}</span>
                            </td>
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{$ch['users']['firstname']}} {{$ch['users']['middlefirstname']}} {{$ch['users']['lastname']}} {{$ch['users']['middlelastname']}}</span>
                            </td>
                                                
                        </tr>
                        @endforeach

                    </table>

                    @endisset
                </div>

        <!-- SEGUIMIENTO -->
        <div>
                
            @if(count($ChTracing) > 0 )

            <hr />

            <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                    SEGUIMIENTO<br>
            </p>

                @foreach($ChTracing as $ch)
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{mb_substr($ch['created_at'],0,10) }} @endisset<br/>
                        <b>@if(isset($ch['observation'])) SEGUIMIENTO: </b> {{$ch['observation']}} @endisset</span>
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
        <span style="font-family:Calibri;font-size: 10px;"> <b>FIRMA A SATISFACCIÓN DEL PACIENTE</b> </span>
    
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
    </div>

</td>
</tr>
</table>

</body>

</html>
