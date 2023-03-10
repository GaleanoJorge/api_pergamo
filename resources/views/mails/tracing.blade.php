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
                    <img src="https://storage.googleapis.com/detecta/ajz5a-4q5bb.006.png" width="142" height="59"
                        alt=""
                        style="margin-top:-15.15pt; margin-left:-21pt; -aw-left-pos:15pt; -aw-rel-hpos:page; -aw-rel-vpos:page; -aw-top-pos:20.25pt; -aw-wrap-type:none; position:absolute" /></span>
                <span style="height:0pt; display:block; position:absolute; z-index:-65543">
                    <div style="float:right;">
                        <p>No de Historia Clínica: {{ $chrecord[0]['admissions']['patients']['identification'] }}</p>
                        <p>Fecha de registro: @if(isset ($fecharecord)) {{$fecharecord }}  @endisset</p>
                        <p>Folio: {{ $chrecord[0]['consecutive'] }}</p>
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
                SEGUIMIENTO HISTORIA CLINICA
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
                                style="font-family:Calibri">{{ $chrecord[0]['admissions']['patients']['firstname'] . ' ' . '' . $chrecord[0]['admissions']['patients']['middlefirstname'] . ($chrecord[0]['admissions']['patients']['middlefirstname'] ? ' ' : '') . '' . $chrecord[0]['admissions']['patients']['lastname'] . '' . ($chrecord[0]['admissions']['patients']['middlelastname'] ? ' ' : '') . $chrecord[0]['admissions']['patients']['middlelastname'] }}</span>
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
                                style="font-family:Calibri">{{ $chrecord[0]['admissions']['patients']['identification'] ? $chrecord[0]['admissions']['patients']['identification'] : 'No registra' }}</span>
                            <span
                                style="width:40pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:80.35pt">&#xa0;</span>
                        </p>
                    </td>
                </tr>
                <tr style="height:12.7pt">
                    <td style="width:79.75pt; vertical-align:top">
                        <p
                            style="margin-top:2.3pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"> <b> Fecha Nacimiento: </b> </span>
                        </p>
                    </td>
                    <td style="width:203pt; vertical-align:top">
                        <p
                            style="margin-top:0.3pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $chrecord[0]['admissions']['patients']['identification'] ? substr($chrecord[0]['admissions']['patients']['birthday'], 0, 10) : 'No registra' }}</span>
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
                                style="font-family:Calibri">{{ $chrecord[0]['admissions']['patients']['marital_status_id'] ? $chrecord[0]['admissions']['patients']['marital_status']['name'] : 'No registra' }}</span>
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
                            <span style="font-family:Calibri">{{ $chrecord[0]['admissions']['patients']['age'] }}
                                Años</span>
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
                                style="font-family:Calibri; vertical-align:1pt">{{ $chrecord[0]['admissions']['patients']['gender_id'] ? $chrecord[0]['admissions']['patients']['gender']['name'] : 'No registra' }}</span>
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
                                style="font-family:Calibri">{{ $chrecord[0]['admissions']['patients']['residence_address'] ? $chrecord[0]['admissions']['patients']['residence_address'] : 'No registra' }}</span>
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
                                style="font-family:Calibri">{{ $chrecord[0]['admissions']['patients']['phone'] ? $chrecord[0]['admissions']['patients']['phone'] : 'No registra' }}</span>
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
                                style="font-family:Calibri">{{ $chrecord[0]['admissions']['patients']['residence_municipality_id'] ? $chrecord[0]['admissions']['patients']['residence_municipality']['name'] : 'No registra' }}</span>
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
                                style="font-family:Calibri">{{ $chrecord[0]['admissions']['patients']['activities_id'] ? $chrecord[0]['admissions']['patients']['activities']['name'] : 'No registra' }}</span>
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
                                style="font-family:Calibri">{{ $chrecord[0]['admissions']['patients']['ethnicity_id'] ? $chrecord[0]['admissions']['patients']['ethnicity']['name'] : 'No registra' }}</span>
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
                                style="font-family:Calibri">{{ $chrecord[0]['admissions']['patients']['academic_level_id'] ? $chrecord[0]['admissions']['patients']['academic_level']['name'] : 'No registra' }}</span>
                        </p>
                    </td>

                </tr>
            </table>

            <hr />

            <p
                style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">DATOS DEL
                    INGRESO</span><span
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
                                style="font-family:Calibri">{{ $chrecord[0]['admissions']['consecutive'] ? $chrecord[0]['admissions']['consecutive'] : 'No registra' }}
                            </span>
                        </p>
                    </td>
                    <td style="width:106pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span style="font-family:Calibri"> <b> Fecha: </b> </span>
                        </p>
                    </td>
                    <td style="width:141.6pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                            <span
                                style="font-family:Calibri">{{ $chrecord[0]['admissions']['entry_date'] ? $chrecord[0]['admissions']['entry_date'] : 'No registra' }}</span>
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
                                style="font-family:Calibri">{{ $chrecord[0]['admissions']['contract']['company_id'] ? $chrecord[0]['admissions']['contract']['company']['name'] : 'No registra' }}</span>
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
                                style="font-family:Calibri">{{ $chrecord[0]['admissions']['contract']['type_briefcase'] ? $chrecord[0]['admissions']['contract']['type_briefcase']['name'] : 'No registra' }}</span>
                        </p>
                    </td>
                </tr>
            </table>
        </div>

        <!-- SEGUIMIENTO -->
        <div>

            @if (count($ChTracing) > 0)

                <hr />
                <p
                    style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                    SEGUIMIENTO<br>
                </p>
                
                <hr />

                @foreach ($ChTracing as $ch)
                    <p
                        style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                            <b>
                                @if (isset($ch['created_at'])) FECHA:
                        </b>{{ mb_substr($ch['created_at'], 0, 10) }} @endisset
                        <br />
                        <b>
                            @if (isset($ch['observation'])) SEGUIMIENTO:
                        </b> {{ $ch['observation'] }} @endisset
                        </span>
                    </p>
                @endforeach

            @endisset
        </div>


        <!-- Responsable -->
        <br>
        <hr/>
        <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
            <tr style="height:11.95pt">                        
                <td style="width:100pt; vertical-align:top">
                    <div>
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size: 10px; font-weight:bold; color:#000000; background-color:#ffffff"> <b>RESPONSABLE DE SEGUIMIENTO</b><br>  
                            {{$chrecord[0]['user']['firstname']}} {{$chrecord[0]['user']['middlefirstname']}} {{$chrecord[0]['user']['lastname']}} {{$chrecord[0]['user']['middlelastname']}}<br>
                            {{$chrecord[0]['user']['identification_type']['name']}}:  {{$chrecord[0]['user']['identification']}}
                            </span>
                        </p> 
                    </div>
                </td>
            </tr>
        </table>

    </body>

</html>
