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
                        <p>Folio: {{$chrecord[0]['consecutive']}}</p>
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

<!-- Nutrición-->
<div>
    @if($chrecord[0]['ch_type_id'] == 3)

    <!-- INGRESO -->
    <div>
        <hr />
        <!-- Validación Ingreso -->
        <div>
            @if(count($ChNutritionAnthropometry) > 0 || count($ChNutritionGastrointestinal) > 0  ||  count($ChNutritionFoodHistory) > 0 || count($ChNutritionParenteral) > 0 ||
             count($ChBackground) > 0 || count($ChGynecologists) > 0 || count($ChNutritionInterpretation) > 0 || count($ChRecommendations) > 0)

            <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                INGRESO<br>
            </p>
            @endisset
        </div>

        <!-- Antropometria -->
        <div>
            @if(count($ChNutritionAnthropometry) > 0)
        
            <hr />
            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ANTROPOMETRIA </b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            @foreach($ChNutritionAnthropometry as $ch)

            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:8pt">
                <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
            </p>

            @if(($ch['is_functional']) == 1 )
                <p style=" text-align: left; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>PACIENTE FUNCIONAL</b> </span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>  
            @endisset
           
            @if(($ch['is_functional']) == 0 )
                <p style=" text-align: left; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591;background-color:#ffffff"> <b>PACIENTE NO FUNCIONAL</b> </span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>  
            @endisset

            <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                <tr style="height:11.95pt">
                    <td style="width:100pt; vertical-align:top">
                         <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['weight'])) PESO </b> @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['weight'])){{$ch['weight']}} Kg @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['size'])) TALLA </b>@endisset</span>
                                            
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['size'])){{$ch['size']}} cm @endisset</span>            
                        </p>
                    </td>
                </tr>
                <tr style="height:11.95pt">
                    <td style="width:100pt; vertical-align:top">
                         <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['geteratedIMC'])) IMC </b> @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['geteratedIMC'])){{$ch['geteratedIMC']}} @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['classification'])) CLASIFICACIÓN </b>@endisset</span>
                                            
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['classification'])){{$ch['classification']}} @endisset</span>            
                        </p>
                    </td>
                </tr>
                <tr style="height:11.95pt">
                    <td style="width:100pt; vertical-align:top">
                         <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['arm_circunferency'])) CIRCUNFERENCIA DE BRAZO </b> @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['arm_circunferency'])){{$ch['arm_circunferency']}} cm @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['calf_circumference'])) CIRCUNFERENCIA DE PANTORRILLA </b>@endisset</span>
                                            
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['calf_circumference'])){{$ch['calf_circumference']}} cm @endisset</span>            
                        </p>
                    </td>
                </tr>
                <tr style="height:11.95pt">
                    <td style="width:100pt; vertical-align:top">
                         <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['knee_height'])) ALTURA DE RODILLA </b> @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['knee_height'])){{$ch['knee_height']}} cm @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['abdominal_perimeter'])) PERIMETRO ABDOMINAL </b>@endisset</span>
                                            
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['abdominal_perimeter'])){{$ch['abdominal_perimeter']}} cm @endisset</span>            
                        </p>
                    </td>
                </tr>
                <tr style="height:11.95pt">
                    <td style="width:100pt; vertical-align:top">
                         <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['hip_perimeter'])) PERIMETRO DE CADERA </b> @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['hip_perimeter'])){{$ch['hip_perimeter']}} cm @endisset</span>
                        </p>
                    </td>                    
                </tr>
                <tr style="height:11.95pt">
                    <td style="width:100pt; vertical-align:top">
                         <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['estimated_weight'])) PESO ESTIMADO</b> @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['estimated_weight'])){{$ch['estimated_weight']}} Kg @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['estimated_size'])) TALLA ESTIMADA </b>@endisset</span>
                                            
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['estimated_size'])){{$ch['estimated_size']}} cm @endisset</span>            
                        </p>
                    </td>
                </tr>
            </table>

            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:8pt">
                <b>@if(isset($ch['total_energy_expenditure']))CÁLCULO DE GASTO ENERGÉTICO TOTAL: </b> {{$ch['total_energy_expenditure']}} Cal @endisset</span>
            </p>
                     
            @endforeach

            @endisset

        </div>

        <!-- Gastrointestinal -->
        <div>
            @if(count($ChNutritionGastrointestinal) > 0)
        
            <hr />
            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> GASTROINTESTINAL </b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            @foreach($ChNutritionGastrointestinal as $ch)

                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset <br/>
                    <b>@if(isset($ch['bowel_habit'])) HÁBITO INTESTINAL </b>{{$ch['bowel_habit']}} @endisset 
                    </span>
                </p>

                @if(($ch['vomit']) != null)
                    @if(($ch['vomit']) == 1 )

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>HA PRESENTADO VÓMITO</b> </span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt">  </span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b> @if(isset($ch['amount_of_vomit'])) CANTIDAD DE EPISODIOS EMÉTICOS </b> @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['amount_of_vomit'])) {{$ch['amount_of_vomit']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table> 
                    
                    @endisset

                    @if(($ch['vomit']) == 0 )
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="text-align: left; font-family:Calibri; font-size:9pt">
                            <b>NO HA PRESENTADO VÓMITO</b> </span>
                        </p>  
                    @endisset

                @endisset

                @if(($ch['nausea']) == 1 )
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>HA PRESENTADO NAUSEAS</b> <br/>
                    <b>@if(isset($ch['observations']))OBSERVACIONES </b>{{$ch['observations']}} @endisset</span>
                </p>
                
                @endisset

                @if(($ch['nausea']) == 0 )
                <p style=" text-align: left; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff"> <b>NO HA PRESENTADO VÓMITO</b> </span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>  
                @endisset

            @endforeach

            @endisset

        </div>

        <!-- Anamnesis Alimentaria  -->
        <div>
            @if(count($ChNutritionFoodHistory) > 0)
        
            <hr />
            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ANAMNESIS ALIMENTARIA </b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            @foreach($ChNutritionFoodHistory as $ch)

                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset <br/>
                    <b>@if(isset($ch['description'])) DESCRIPCIÓN </b>{{$ch['description']}} @endisset 
                    </span>
                </p>

                @if(($ch['is_allergic']) == 1 )
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>ES ALÉRGICO E INTOLERANTE A ALGÚN ALIMENTO<br/>
                    <b>@if(isset($ch['allergy'])) OBSERVACIÓN </b> {{$ch['allergy']}} @endisset 
                    </span>
                </p>
                @endisset

                @if(($ch['is_allergic']) == 0 )
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>NO ES ALÉRGICO E INTOLERANTE A ALGÚN ALIMENTO
                    </span>
                </p>
                @endisset

                <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                    <tr style="height:11.95pt">
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['appetite']))APETITO</b> @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['appetite'])){{$ch['appetite']}}@endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"><b> @if(isset($ch['intake'])) INGESTA </b> @endisset</span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['intake'])) {{$ch['intake']}} @endisset</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"><b> @if(isset($ch['swallowing'])) DEGLUCIÓN </b> @endisset</span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['swallowing'])) {{$ch['swallowing']}} @endisset</span>
                            </p>
                        </td>
                    </tr>
                </table> 
                
                <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                    <tr style="height:11.95pt">
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['diet_type']))TIPO DE DIETA</b> @endisset </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt">@if(isset($ch['diet_type'])){{$ch['diet_type']}}@endisset </span>
                            </p>
                        </td>       
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"><b> @if(isset($ch['parenteral_nutrition'])) NUTRICIÓN PARENTERAL </b> @endisset</span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">@if(isset($ch['parenteral_nutrition'])) {{$ch['parenteral_nutrition']}} @endisset</span>
                            </p>
                        </td>
                    </tr>
                </table> 

                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['observations']))CONTROL DE INGESTA</b>{{$ch['observations']}} @endisset</span><
                    </span>
                </p>
                
            @endforeach

            @endisset

        </div>

        <!-- Calculos Nutrición -->
        <div>
            @if(count($ChNutritionParenteral) > 0)
        
                    <hr />
                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> CÁLCULOS DE NUTRICIÓN PARENTERAL  </b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
        
                    @foreach($ChNutritionParenteral as $ch)
                            
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['protein_contributions'])) APORTES DE PROTEINA </b> @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['protein_contributions'])){{$ch['protein_contributions']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['total_grams_of_protein'])) GRAMOS TOTALES DE PROTEINA </b>@endisset</span>
                                                    
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['total_grams_of_protein'])){{$ch['total_grams_of_protein']}} g/día @endisset</span>            
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['grams_of_nitrogen'])) GRAMOS DE NITROGENO </b> @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['grams_of_nitrogen'])){{$ch['grams_of_nitrogen']}} g @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:100pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['carbohydrate_contribution'])) APORTE DE CARBOHIDRATOS </b> @endisset</span>
                                    </p>
                                </td>
                                <td style="width:100pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['carbohydrate_contribution'])){{$ch['carbohydrate_contribution']}} g @endisset</span>
                                    </p>
                                </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['total_carbohydrates'])) CARBOHIDRATOS TOTALES </b>@endisset</span>
                                                    
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['total_carbohydrates'])){{$ch['total_carbohydrates']}} g/día @endisset</span>            
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['lipid_contribution'])) APORTE DE LÍPIDOS</b> @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['lipid_contribution'])){{$ch['lipid_contribution']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['total_grams_of_lipids'])) GRAMOS TOTALES DE LÍPIDOS</b>@endisset</span>
                                                    
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['total_grams_of_lipids'])){{$ch['total_grams_of_lipids']}} g/día @endisset</span>            
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['amino_acid_volume'])) VOLUMEN DE AMINOÁCIDOS </b> @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['amino_acid_volume'])){{$ch['amino_acid_volume']}}% {{$ch['ce_se']}} - {{$ch['total_amino_acid_volume']}} ml @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['dextrose_volume'])) VOLUMEN DE DEXTROSA </b>@endisset</span>
                                                    
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['dextrose_volume'])){{$ch['dextrose_volume']}}% - {{$ch['total_dextrose_volume']}} ml @endisset</span>            
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['lipid_volume'])) VOLUMEN DE LÍPIDOS </b> @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['lipid_volume'])){{$ch['lipid_volume']}} - {{$ch['total_lipid_volume']}} ml  @endisset</span>
                                </p>
                            </td>                    
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['total_calories'])) CALORIAS TOTALES</b> @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['total_calories'])){{$ch['total_calories']}} cal @endisset</span>
                                </p>
                        </tr>
                    </table>
                            
                    @endforeach
        
                    @endisset

        </div>
    
        <!-- Antecedentes -->
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

        <!-- Análisis e Interpretación  -->
        <div>
            @if(count($ChNutritionInterpretation) > 0)
        
            <hr />
            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ANÁLISIS E INTERPRETACIÓN </b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            @foreach($ChNutritionInterpretation as $ch)

                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset <br/>
                    <b>@if(isset($ch['description'])) OBSERVACIÓN </b>{{$ch['description']}} @endisset 
                    </span>
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

    </div>
           
    <!-- NOTA REGULAR -->
    <div>
        <!-- Validación Regular -->
        <div>
            @if(count($ChNutritionAnthropometryNR) > 0 || count($ChNutritionParenteralNR) > 0  || count($ChNutritionInterpretationNR) > 0
            || count($ChRecommendationsNR) > 0)
            <hr/>
            <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
               NOTA REGULAR<br>
            </p>
            @endisset
        </div>

        <!-- Antropometria -->
        <div>
            @if(count($ChNutritionAnthropometryNR) > 0)
        
            <hr />
            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ANTROPOMETRIA </b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            @foreach($ChNutritionAnthropometryNR as $ch)

            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:8pt">
                <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
            </p>

            @if(($ch['is_functional']) == 1 )
                <p style=" text-align: left; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>PACIENTE FUNCIONAL</b> </span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>  
            @endisset
        
            @if(($ch['is_functional']) == 0 )
                <p style=" text-align: left; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri; font-weight:bold; color:##057591; background-color:#ffffff"> <b>PACIENTE NO FUNCIONAL</b> </span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>  
            @endisset

            <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                <tr style="height:11.95pt">
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['weight'])) PESO </b> @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['weight'])){{$ch['weight']}} Kg @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['size'])) TALLA </b>@endisset</span>
                                            
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['size'])){{$ch['size']}} cm @endisset</span>            
                        </p>
                    </td>
                </tr>
                <tr style="height:11.95pt">
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['geteratedIMC'])) IMC </b> @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['geteratedIMC'])){{$ch['geteratedIMC']}} @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['classification'])) CLASIFICACIÓN </b>@endisset</span>
                                            
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['classification'])){{$ch['classification']}} @endisset</span>            
                        </p>
                    </td>
                </tr>
                <tr style="height:11.95pt">
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['arm_circunferency'])) CIRCUNFERENCIA DE BRAZO </b> @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['arm_circunferency'])){{$ch['arm_circunferency']}} cm @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['calf_circumference'])) CIRCUNFERENCIA DE PANTORRILLA </b>@endisset</span>
                                            
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['calf_circumference'])){{$ch['calf_circumference']}} cm @endisset</span>            
                        </p>
                    </td>
                </tr>
                <tr style="height:11.95pt">
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['knee_height'])) ALTURA DE RODILLA </b> @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['knee_height'])){{$ch['knee_height']}} cm @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['abdominal_perimeter'])) PERIMETRO ABDOMINAL </b>@endisset</span>
                                            
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['abdominal_perimeter'])){{$ch['abdominal_perimeter']}} cm @endisset</span>            
                        </p>
                    </td>
                </tr>
                <tr style="height:11.95pt">
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['hip_perimeter'])) PERIMETRO DE CADERA </b> @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['hip_perimeter'])){{$ch['hip_perimeter']}} cm @endisset</span>
                        </p>
                    </td>                    
                </tr>
                <tr style="height:11.95pt">
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['estimated_weight'])) PESO ESTIMADO</b> @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['estimated_weight'])){{$ch['estimated_weight']}} Kg @endisset</span>
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['estimated_size'])) TALLA ESTIMADA </b>@endisset</span>
                                            
                        </p>
                    </td>
                    <td style="width:100pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri">@if(isset($ch['estimated_size'])){{$ch['estimated_size']}} cm @endisset</span>            
                        </p>
                    </td>
                </tr>
            </table>

            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:8pt">
                <b>@if(isset($ch['total_energy_expenditure']))CÁLCULO DE GASTO ENERGÉTICO TOTAL: </b> {{$ch['total_energy_expenditure']}} Cal @endisset</span>
            </p>
                    
            @endforeach

            @endisset

        </div>

        <!-- Calculos Nutrición -->
        <div>
            @if(count($ChNutritionParenteralNR) > 0)
        
                    <hr />
                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> CÁLCULOS DE NUTRICIÓN PARENTERAL  </b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
        
                    @foreach($ChNutritionParenteralNR as $ch)
                            
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['protein_contributions'])) APORTES DE PROTEINA </b> @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['protein_contributions'])){{$ch['protein_contributions']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['total_grams_of_protein'])) GRAMOS TOTALES DE PROTEINA </b>@endisset</span>
                                                    
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['total_grams_of_protein'])){{$ch['total_grams_of_protein']}} g/día @endisset</span>            
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['grams_of_nitrogen'])) GRAMOS DE NITROGENO </b> @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['grams_of_nitrogen'])){{$ch['grams_of_nitrogen']}} g @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:100pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['carbohydrate_contribution'])) APORTE DE CARBOHIDRATOS </b> @endisset</span>
                                    </p>
                                </td>
                                <td style="width:100pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['carbohydrate_contribution'])){{$ch['carbohydrate_contribution']}} g @endisset</span>
                                    </p>
                                </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['total_carbohydrates'])) CARBOHIDRATOS TOTALES </b>@endisset</span>
                                                    
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['total_carbohydrates'])){{$ch['total_carbohydrates']}} g/día @endisset</span>            
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['carbohydrate_contribution'])) APORTE DE LÍPIDOS</b> @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['carbohydrate_contribution'])){{$ch['carbohydrate_contribution']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['total_carbohydrates'])) GRAMOS TOTALES DE LÍPIDOS</b>@endisset</span>
                                                    
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['total_carbohydrates'])){{$ch['total_carbohydrates']}} g/día @endisset</span>            
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['amino_acid_volume'])) VOLUMEN DE AMINOÁCIDOS </b> @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['amino_acid_volume'])){{$ch['amino_acid_volume']}} {{$ch['ce_se']}} - {{$ch['total_amino_acid_volume']}} ml @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['dextrose_volume'])) VOLUMEN DE DEXTROSA </b>@endisset</span>
                                                    
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['dextrose_volume'])){{$ch['dextrose_volume']}} - {{$ch['total_dextrose_volume']}} ml @endisset</span>            
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['lipid_volume'])) VOLUMEN DE LÍPIDOS </b> @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['lipid_volume'])){{$ch['lipid_volume']}} - {{$ch['total_lipid_volume']}} ml  @endisset</span>
                                </p>
                            </td>                    
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['total_calories'])) CALORIAS TOTALES</b> @endisset</span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['total_calories'])){{$ch['total_calories']}} cal @endisset</span>
                                </p>
                        </tr>
                    </table>
                            
                    @endforeach
        
                    @endisset

        </div>
    
         <!-- Análisis e Interpretación  -->
         <div>
            @if(count($ChNutritionInterpretationNR) > 0)
        
            <hr />
            <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ANÁLISIS E INTERPRETACIÓN </b></span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            @foreach($ChNutritionInterpretationNR as $ch)

                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset <br/>
                    <b>@if(isset($ch['description'])) OBSERVACIÓN </b>{{$ch['description']}} @endisset 
                    </span>
                </p>
                
            @endforeach

            @endisset

        </div>

         <!-- Recomendaciones -->
         <div>
            @if(count($ChRecommendationsNR) > 0)  

            <hr />

            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> RECOMENDACIONES </b> </span>
                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>

            @foreach($ChRecommendationsNR as $ch)
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

       </div>

     <!-- ESCALAS -->
     <div>
       
        <!-- Validación Escalas -->
        <div>
            @if(count($ChScalePayette) > 0  || count($ChScaleFragility) > 0 || count($ChScalePediatricNutrition) > 0 || count($ChScaleScreening) > 0  )
            
            <hr />
            
            <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                ESCALAS<br>
            </p>
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
                    <b>@if(isset($ch['total'])) TOTAL: </b> {{$ch['total']}} @endisset <br/>
                    <b>@if(isset($ch['classification'])) CLASIFICACIÓN: </b> {{$ch['classification']}} @endisset</span>
            </p>

            @endforeach

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
