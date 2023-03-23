<html>

<head>
    <meta http-equiv="Content-Type" content="application/pdf" />
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

   <!-- Ordenes Médicas -->
    <div>
      
        <?php
            $i = 0;
        ?>

        @foreach($hcAll as $om)
       
        <?php
            $medicalOrders = array_filter($ChMedicalOrders, fn($element) => $element['ch_record_id'] == $om);
            $i++;
        ?>

        <!-- Encabezado-->
        <div>

            
            @foreach($medicalOrders as $ch)
            <div>
                <div style="-aw-headerfooter-type:header-primary">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:6%; widows:0; orphans:0; font-size:10pt">
                        <span style="height:0pt; display:block; position:absolute; z-index:-65546">
                            <img src="https://storage.googleapis.com/detecta/ajz5a-4q5bb.006.png" width="142" height="59" alt="" style="margin-top:-15.15pt; margin-left:-21pt; -aw-left-pos:15pt; -aw-rel-hpos:page; -aw-rel-vpos:page; -aw-top-pos:20.25pt; -aw-wrap-type:none; position:absolute" /></span>
                        <span style="height:0pt; display:block; position:absolute; z-index:-65543">
                            <div style="float:right;">
                                <p>No de Historia Clínica: {{$ch['ch_record']['admissions']['patients']['identification']}}</p>
                                <p>Fecha de registro: {{ (new DateTime($ch['ch_record']['updated_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format('Y-m-d H:i:s') }}</p>
                                <p>Folio: {{$ch['ch_record']['consecutive']}}</p>
                            </div>
                        </span><span style="height:0pt; display:block; position:absolute; z-index:-65545">
                            <div style="text-align: center;    margin-left: 60px;">
                                <p>HEALTH & LIFE IPS S.A.S </p>
                                <p style="font-size:9px">{{$ch['ch_record']["admissions"]["campus"]["address"]}}, {{$ch['ch_record']["admissions"]["campus"]["region"]["name"]}}, {{$ch['ch_record']["admissions"]["campus"]["name"]}}</p>
                                <p>Nit: 900900122 - 7</p>
                            </div>
        
                        </span><span style="font-family:Tahoma">&#xa0;</span>
                    </p>
                </div>
            </div>
        
        
            <div>
                    
                <h2 style="margin-top:70px; margin-bottom:1.9pt; widows:0; orphans:0; font-size:9pt;    background: #4472c4;
                        padding: 0.8em;font-family:Calibri;color: white;text-align: center;">ORDENES MÉDICAS
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['firstname'] . ' ' . '' . $ch['ch_record']['admissions']['patients']['middlefirstname'] . ($ch['ch_record']['admissions']['patients']['middlefirstname'] ? ' ' : '') . '' . $ch['ch_record']['admissions']['patients']['lastname'] . '' . ($ch['ch_record']['admissions']['patients']['middlelastname'] ? ' ' : '') . $ch['ch_record']['admissions']['patients']['middlelastname']}}</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"> <b> Identificación: </b> </span>
                            </p>
                        </td>
                        <td style="width:141.6pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['identification'] ? $ch['ch_record']['admissions']['patients']['identification'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['identification'] ? mb_substr($ch['ch_record']['admissions']['patients']['birthday'],0,10) : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['marital_status_id'] ? $ch['ch_record']['admissions']['patients']['marital_status']['name'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['age']}} Años</span>
                            </p>
                        </td>
                    
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:45.4pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"> <b>Género: </b> </span>
                            </p>
                        </td>
        
                        <td style="width:141.6pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:2.45pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri; vertical-align:1pt">{{$ch['ch_record']['admissions']['patients']['gender_id'] ? $ch['ch_record']['admissions']['patients']['gender']['name'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['residence_address'] ? $ch['ch_record']['admissions']['patients']['residence_address'] : 'No registra'}}</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"> <b> Teléfono: </b> </span>
                            </p>
                        </td>
                        <td style="width:141.6pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['phone'] ? $ch['ch_record']['admissions']['patients']['phone'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['residence_municipality_id'] ? $ch['ch_record']['admissions']['patients']['residence_municipality']['name'] : 'No registra'}}</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"> <b> Ocupación: </b> </span>
                            </p>
                        </td>
        
                        <td style="width:141.6pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['activities_id'] ? $ch['ch_record']['admissions']['patients']['activities']['name'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['ethnicity_id'] ? $ch['ch_record']['admissions']['patients']['ethnicity']['name'] : "No registra"}}</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:47.05pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"> <b> Nivel Educativo: </b> </span>
                            </p>
                        </td>
        
                        <td style="width:141.6pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['academic_level_id'] ? $ch['ch_record']['admissions']['patients']['academic_level']['name'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['consecutive'] ? $ch['ch_record']['admissions']['consecutive'] : 'No registra'}} </span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"> <b> Fecha: </b> </span>
                            </p>
                        </td>
                        <td style="width:141.6pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['entry_date'] ? $ch['ch_record']['admissions']['entry_date'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['contract']['company_id'] ? $ch['ch_record']['admissions']['contract']['company']['name'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['contract']['type_briefcase'] ? $ch['ch_record']['admissions']['contract']['type_briefcase']['name'] : 'No registra'}}</span>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            @break
            @endforeach
            
        </div>

        
        @if(count($hcAll) > 0 )
        <hr/>
        <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                ORDENES MÉDICAS <br>
        </p>
        <hr/>
        @endisset

        @foreach($medicalOrders as $ch)

            <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                <span style="font-family:Calibri; font-size:9pt">
                <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset</span>
            </p>
            @if(($ch['ambulatory_medical_order']) == 1 )
                <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b>ORDEN MÉDICA AMBULATORIA</b> </span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>  
            @endisset
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:8pt">
                    <b>@if(isset($ch['procedure'])) PROCEDIMIENTO: </b>{{$ch['procedure']['equivalent']}} - {{$ch['procedure']['name']}} <br/> @endisset 
                    <b>@if(isset($ch['services_briefcase'])) PROCEDIMIENTO: </b>{{$ch['services_briefcase']['manual_price']['procedure']['equivalent']}} - {{$ch['services_briefcase']['manual_price']['procedure']['name']}} <br/> @endisset </span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['amount'])) CANTIDAD: </b> {{$ch['amount']}} @endisset</span>
                </p>  
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['frequency'])) FRECUENCIA HORARIA: </b> {{$ch['frequency']['name']}} @endisset</span>
                </p>  
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['observations'])) OBSERVACIONES: </b> {{$ch['observations']}} @endisset</span>
                </p>    

                <br/>

        @endforeach
        

        <div>
            <br>
           
                <div>

               
                @foreach($medicalOrders as $ch)
                @php
                    if($ch['file_firm']){
                    $rutaImagen = storage_path('app/public/' . $ch['file_firm']);
                    $contenidoBinario = file_get_contents($rutaImagen);
                    $firm = base64_encode($contenidoBinario);
                    } else {
                    $firm = null;
                    }
                @endphp
            
                </div>
                
                @if($firm != null)
                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                        <span style="font-family:Calibri;font-size: 12px;"> <b>FIRMA PERSONAL ASISTENCIAL</b> <br/>
                        <img src="data:image/png;base64,{{$firm}}" width="250" height="100" alt="" style=""/></span> <br/>
                        <span style="font-family:Calibri;font-size: 10px;">
                        <b>{{$ch['ch_record']['user']['firstname']}} {{$ch['ch_record']['user']['middlefirstname']}} {{$ch['ch_record']['user']['lastname']}}  {{$ch['ch_record']['user']['middlelastname']}}<br/>
                        <b>{{$ch['ch_record']['user']['user_role'][0]['role']['name']}}<br/>
                        <b> @if(count($ch['ch_record']['user']['assistance']) > 0) RM/TP: {{$ch['ch_record']['user']['assistance'][0]['medical_record']}} @endisset <br/></span>
                    </p>                    
                @endisset
                @break
                @endforeach
        </div>

        @if( $i!=1) 
        <div class="page_break">
        @endisset
        
        {{-- @if((count($hcAll1)-1) != array_search($om, $hcAll1)) 
        <div class="page_break">
            @endisset --}}

        @endforeach
        
    </div>
            

    <!-- Interconsulta -->
    <div>

        @foreach($hcAll2 as $in)       
        <?php
            $interconsultation = array_filter($ChInterconsultation, fn($element) => $element['ch_record_id'] == $in);    
        ?>
        

       <!-- Encabezado-->
       <div>
            @foreach($interconsultation as $ch)
            <div>
                <div style="-aw-headerfooter-type:header-primary">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:6%; widows:0; orphans:0; font-size:10pt">
                        <span style="height:0pt; display:block; position:absolute; z-index:-65546">
                            <img src="https://storage.googleapis.com/detecta/ajz5a-4q5bb.006.png" width="142" height="59" alt="" style="margin-top:-15.15pt; margin-left:-21pt; -aw-left-pos:15pt; -aw-rel-hpos:page; -aw-rel-vpos:page; -aw-top-pos:20.25pt; -aw-wrap-type:none; position:absolute" /></span>
                        <span style="height:0pt; display:block; position:absolute; z-index:-65543">
                            <div style="float:right;">
                                <p>No de Historia Clínica: {{$ch['ch_record']['admissions']['patients']['identification']}}</p>
                                <p>Fecha de registro: {{ (new DateTime($ch['ch_record']['updated_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format('Y-m-d H:i:s') }}</p>
                                <p>Folio: {{$ch['ch_record']['consecutive']}}</p>
                            </div>
                        </span><span style="height:0pt; display:block; position:absolute; z-index:-65545">
                            <div style="text-align: center;    margin-left: 60px;">
                                <p>HEALTH & LIFE IPS S.A.S </p>
                                <p style="font-size:9px">{{$ch['ch_record']["admissions"]["campus"]["address"]}}, {{$ch['ch_record']["admissions"]["campus"]["region"]["name"]}}, {{$ch['ch_record']["admissions"]["campus"]["name"]}}</p>
                                <p>Nit: 900900122 - 7</p>
                            </div>

                        </span><span style="font-family:Tahoma">&#xa0;</span>
                    </p>
                </div>
            </div>
 
            <div>
                    
                <h2 style="margin-top:70px; margin-bottom:1.9pt; widows:0; orphans:0; font-size:9pt;    background: #4472c4;
                        padding: 0.8em;font-family:Calibri;color: white;text-align: center;">ORDENES MÉDICAS
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['firstname'] . ' ' . '' . $ch['ch_record']['admissions']['patients']['middlefirstname'] . ($ch['ch_record']['admissions']['patients']['middlefirstname'] ? ' ' : '') . '' . $ch['ch_record']['admissions']['patients']['lastname'] . '' . ($ch['ch_record']['admissions']['patients']['middlelastname'] ? ' ' : '') . $ch['ch_record']['admissions']['patients']['middlelastname']}}</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"> <b> Identificación: </b> </span>
                            </p>
                        </td>
                        <td style="width:141.6pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['identification'] ? $ch['ch_record']['admissions']['patients']['identification'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['identification'] ? mb_substr($ch['ch_record']['admissions']['patients']['birthday'],0,10) : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['marital_status_id'] ? $ch['ch_record']['admissions']['patients']['marital_status']['name'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['age']}} Años</span>
                            </p>
                        </td>
                    
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:45.4pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"> <b>Género: </b> </span>
                            </p>
                        </td>
        
                        <td style="width:141.6pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:2.45pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri; vertical-align:1pt">{{$ch['ch_record']['admissions']['patients']['gender_id'] ? $ch['ch_record']['admissions']['patients']['gender']['name'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['residence_address'] ? $ch['ch_record']['admissions']['patients']['residence_address'] : 'No registra'}}</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"> <b> Teléfono: </b> </span>
                            </p>
                        </td>
                        <td style="width:141.6pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['phone'] ? $ch['ch_record']['admissions']['patients']['phone'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['residence_municipality_id'] ? $ch['ch_record']['admissions']['patients']['residence_municipality']['name'] : 'No registra'}}</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"> <b> Ocupación: </b> </span>
                            </p>
                        </td>
        
                        <td style="width:141.6pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['activities_id'] ? $ch['ch_record']['admissions']['patients']['activities']['name'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['ethnicity_id'] ? $ch['ch_record']['admissions']['patients']['ethnicity']['name'] : "No registra"}}</span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:47.05pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"> <b> Nivel Educativo: </b> </span>
                            </p>
                        </td>
        
                        <td style="width:141.6pt; vertical-align:top">
                            <p style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['patients']['academic_level_id'] ? $ch['ch_record']['admissions']['patients']['academic_level']['name'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['consecutive'] ? $ch['ch_record']['admissions']['consecutive'] : 'No registra'}} </span>
                            </p>
                        </td>
                        <td style="width:106pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri"> <b> Fecha: </b> </span>
                            </p>
                        </td>
                        <td style="width:141.6pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['entry_date'] ? $ch['ch_record']['admissions']['entry_date'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['contract']['company_id'] ? $ch['ch_record']['admissions']['contract']['company']['name'] : 'No registra'}}</span>
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
                                <span style="font-family:Calibri">{{$ch['ch_record']['admissions']['contract']['type_briefcase'] ? $ch['ch_record']['admissions']['contract']['type_briefcase']['name'] : 'No registra'}}</span>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            @break
            @endforeach
       </div>

       @if(count($hcAll2) > 0 )
        <hr/>
        <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                INTERCONSULTAS <br>
        </p>
        <hr/>
        @endisset

    
                            
            @foreach($interconsultation as $ch)


                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:8pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset</span>
                </p>

                @if(($ch['ambulatory_medical_order']) == 'Sí' )

                    <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#070c0f; background-color:#ffffff"> <b>ORDEN MÉDICA AMBULATORIA</b> </span>
                    </p>  
                 @endisset
                
                 @if(isset($ch['type_of_attention'])) 
                 <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>TIPO DE ATENCIÓN: </b> {{$ch['type_of_attention']['name']}} <br/></span>
                </p>
                @endisset

                @if(isset($ch['specialty']))
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b> ESPECIALIDAD: </b> {{$ch['specialty']['name']}}<br/></span>
                </p>
                @endisset
                
                @if(isset($ch['procedure'])) 
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>PROCEDIMIENTO: </b> {{$ch['procedure']['equivalent']}} - {{$ch['procedure']['name']}}
                </p>
                @endisset

                @if( isset($ch['services_briefcase'])) 
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>PROCEDIMIENTO:</b>{{$ch['services_briefcase']['manual_price']['procedure']['equivalent']}} - {{$ch['services_briefcase']['manual_price']['procedure']['name']}}<br/></span>
                </p>
                @endisset

                @if( isset($ch['amount'])) 
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>CANTIDAD:</b> {{$ch['amount']}}<br/></span>
                </p>
                @endisset
                @if( isset($ch['frequency'])) 
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>FRECUENCIA HORARIA:</b> {{$ch['frequency']['name']}}<br/></span>
                </p>
                @endisset

                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['observations'])) OBSERVACIONES: </b> {{$ch['observations']}} @endisset</span>
                </p>

            <br/>

            @endforeach


            <div>
                <br>
               
                    <div>
    
                   
                    @foreach($interconsultation as $ch)
                    @php
                        if($ch['file_firm']){
                        $rutaImagen = storage_path('app/public/' . $ch['file_firm']);
                        $contenidoBinario = file_get_contents($rutaImagen);
                        $firm = base64_encode($contenidoBinario);
                        } else {
                        $firm = null;
                        }
                    @endphp
                
                    </div>
                    
                    @if($firm != null)
                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri;font-size: 12px;"> <b>FIRMA PERSONAL ASISTENCIAL</b> <br/>
                            <img src="data:image/png;base64,{{$firm}}" width="250" height="100" alt="" style=""/></span> <br/>
                            <span style="font-family:Calibri;font-size: 10px;">
                            <b>{{$ch['ch_record']['user']['firstname']}} {{$ch['ch_record']['user']['middlefirstname']}} {{$ch['ch_record']['user']['lastname']}}  {{$ch['ch_record']['user']['middlelastname']}}<br/>
                            <b>{{$ch['ch_record']['user']['user_role'][0]['role']['name']}}<br/>
                            <b> @if(count($ch['ch_record']['user']['assistance']) > 0) RM/TP: {{$ch['ch_record']['user']['assistance'][0]['medical_record']}} @endisset <br/></span>
                        </p>                    
                    @endisset
                    @break
                    @endforeach
            </div>

            @if((count($hcAll2)-1) != array_search($in, $hcAll2)) 
            <div class="page_break">
                @endisset
        
                @endforeach
    </div>

    
        
     <!-- Plan de Manejo -->
     {{-- <div>
        @if($chrecord[0]['ch_interconsultation_id'] == null )

            @if(count($ManagementPlan) > 0)

                <hr />

                <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> PLAN DE MANEJO </b> </span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>

                @foreach($ManagementPlan as $ch)

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                                <b>@if(isset($ch['created_at'])) FECHA: </b>{{(new DateTime($ch['created_at']))->setTimezone(new DateTimeZone('America/Bogota'))->format("Y-m-d H:i:s")}} @endisset</span>
                    </p>
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">                                    
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['assigned_management_plan']['management_plan']['type_of_attention'])) TIPO DE ATENCIÓN </b>{{$ch['assigned_management_plan']['management_plan']['type_of_attention']['name']}} @endisset</span>
                                                    
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b> @if(isset($ch['assigned_management_plan']['management_plan']['procedure']['manual_price'])) PROCEDIMIENTO </b>{{$ch['assigned_management_plan']['management_plan']['procedure']['manual_price']['name']}} @endisset  </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">  
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:8pt"><b> @if(isset($ch['assigned_management_plan']['management_plan']['frequency'])) FRECUENCIA </b>{{$ch['assigned_management_plan']['management_plan']['frequency']['name']}} @endisset  </span>
                                </p>
                            </td>
                            <td style="width:100pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b> @if(isset($ch['assigned_management_plan']['management_plan']['quantity'])) CANTIDAD PROYECTADA </b>{{$ch['assigned_management_plan']['management_plan']['quantity']}} @endisset  </span>
                                </p>
                            </td>
                        </tr>
                    </table>

                @endforeach
            @endisset 
        @endisset 
    </div> --}}


</body>

</html>
