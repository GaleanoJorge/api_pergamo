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



    <!-- Trabajo Social-->
    <div>
        @if($chrecord['ch_type_id'] == 8)

        <!-- INGRESO -->
        <div>
            <hr />
            <!-- Validación Ingreso -->
            <div>
                @if(count($ChSwFamily) > 0 || count($ChSwNursing) > 0 || count($ChSwFamilyDynamics) > 0  || count($ChSwOccupationalHistory) > 0 || count($ChSwRiskFactors) > 0  ||  
                    count($ChSwHousingAspect) > 0 || count($ChSwConditionHousing) > 0 || count($ChSwHygieneHousing) > 0 || count($ChSwIncome) > 0  ||
                    count($ChSwExpenses) > 0 || count($ChSwEconomicAspects) > 0  || count($ChSwArmedConflict) > 0  || count($ChSwSupportNetwork) > 0 )

                <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                    INGRESO<br>
                </p>
                @endisset
            </div>
        
            <!-- Composición Familiar -->
            <div>
                @if(count($ChSwFamily) > 0)

                <hr />

                <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">COMPOSICIÓN E INFORMACIÓN FAMILIAR</span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>

                @endisset

                @foreach($ChSwFamily as $ch)

                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                </p>
                <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                    <tr style="height:11.95pt">                        
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['relationship'])) PARENTESCO </b> @endisset </span>
                                            
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri">@if(isset($ch['relationship'])) {{$ch['relationship']['name']}} @endisset </span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">                        
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['firstname']) || isset($ch['middlefirstname'])) NOMBRES </b> @endisset</span>
                                            
                            </p>
                        </td>
                        <td style="width:80pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri">@if(isset($ch['firstname']) || isset($ch['middlefirstname'])) {{$ch['firstname'] }} {{$ch['middlefirstname'] }} @endisset </span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">                        
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['lastname']) || isset($ch['middlelastname'])) APELLIDOS </b> @endisset</span>
                                            
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri">@if(isset($ch['lastname']) || isset($ch['middlelastname']))  {{$ch['lastname'] }} {{$ch['middlelastname'] }} @endisset</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">                        
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['identification_type']) || isset($ch['identification'])) NÚMERO DE IDENTIFICACIÓN  @endisset</span>
                                            
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri">@if(isset($ch['identification_type']) || isset($ch['identification'])) {{$ch['identification_type']['code'] }} {{$ch['identification'] }} @endisset</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">                        
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['range_age'])) RANGO DE EDAD @endisset</span>
                                            
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri">@if(isset($ch['range_age'])) {{$ch['range_age']}} @endisset</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">                        
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['marital_status'])) ESTADO CIVIL @endisset</span>
                                            
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri">@if(isset($ch['marital_status'])) {{$ch['marital_status'] ['name']}} @endisset</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">                        
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['academic_level'])) NIVEL ACADÉMICO @endisset</span>
                                            
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri">@if(isset($ch['academic_level'])) {{$ch['academic_level'] ['name']}} @endisset</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">                        
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['activities'])) PROFESIÓN @endisset</span>
                                            
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri">@if(isset($ch['activities'])) {{$ch['activities']['name']}} @endisset</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">                        
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['phone']) || isset($ch['landline'])) NÚMEROS DE CONTACTO @endisset</span>
                                            
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri">@if(isset($ch['phone']) || isset($ch['landline'])) {{$ch['phone']}} {{$ch['landline']}} @endisset</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:11.95pt">                        
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['email'])) CORREO ELECTRÓNICO @endisset</span>
                                            
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri">@if(isset($ch['email'])) {{$ch['email']}} @endisset</span>
                            </p>
                        </td>
                    </tr>
                </table>

                @if(($ch['is_disability']) == 1 )
                <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                    <tr style="height:11.95pt">
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt; font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>CONDICIÓN DE DISCAPACIDAD</b> </span>
                                </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri"><b>@if(isset($ch['inability_id'])) TIPO DE DISCAPACIAD</b>{{$ch['inability_id'] ['name']}}@endisset</span>
                            </p>
                        </td>     
                    </tr>          
                </table>                           
                @endisset

                @if(($ch['carer']) == 1 )
                <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                    <tr style="height:11.95pt">                        
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                <span style="font-family:Calibri; font-size:9pt; font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>CUIDADOR PRINCIPAL</b> </span>
                            </p>
                        </td>
                        <td style="width:100pt; vertical-align:top">
                            <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri"><b>@if(isset($ch['residence_address'])) DIRECCIÓN </b>{{$ch['residence_address']}}@endisset </span>
                            </p>
                        </td>                   
                    </tr>          
                </table>                           
                @endisset
                <br/>

                @endforeach
            </div>       
        
            <!-- Servicio enfermeria -->
            <div>
                @if(count($ChSwNursing) > 0)
            
                <hr />

                <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> SERVICIO DE ENFERMERIA </b></span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>


                @foreach($ChSwNursing as $ch)
                    @if(($ch['service'])==1)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>
                    <p style=" text-align: left; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b>TIENE SERVICIO DE ENFERMERIA</b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>   
                        <table class="tablehc">
                            <tr>
                                <th><span style="font-family:Calibri; font-size:9pt">NOMBRES</th>
                                <th><span style="font-family:Calibri; font-size:9pt">APELLIDOS</th>
                                <th><span style="font-family:Calibri; font-size:9pt">TELEFONO DE CONTACTO</th>
                            </tr>
                            <tr>       
                                @if(isset($ch['firstname']) || isset($ch['middlefirstname']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">
                                    @if(isset($ch['firstname']) || isset($ch['middlefirstname'])) {{$ch['firstname']}} {{$ch['middlefirstname']}}@endisset</span> 
                                </td>
                                @endisset  

                                @if(isset($ch['lastname']) || isset($ch['middlelastname']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">
                                    @if(isset($ch['lastname']) || isset($ch['middlelastname'])) {{$ch['lastname']}} {{$ch['middlelastname']}}@endisset</span> 
                                </td>
                                @endisset     

                                @if(isset($ch['phone']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">
                                    @if(isset($ch['phone'])) {{$ch['phone']}} @endisset</span> 
                                </td>
                                @endisset              
                            </tr>
                        </table>   
                    @endisset   

                    @if(($ch['service'])== 0)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>
                    <p style=" text-align: left; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> NO TIENE SERVICIO DE ENFERMERIA</b> </span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                    <br/>
                    @endisset

                @endforeach 

                @endisset

            </div>

            <!-- Historial Ocupacional -->
            <div>
                @if(count($ChSwOccupationalHistory) > 0)
                    <hr />
                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> HISTORIAL OCUPACIONAL</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                @endisset

                    @foreach($ChSwOccupationalHistory as $ch)
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['worked']) || isset($ch['study']) || isset($ch['home']) || isset($ch['none'])) ACTIVIDADES QUE DESEMPEÑABA EL PACIENTE</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['worked']) || isset($ch['study']) || isset($ch['home']) || isset($ch['none'])) {{$ch['worked']}} {{$ch['study']}} {{$ch['home']}} {{$ch['none']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_sw_occupation']) ) OCUPACIÓN</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['ch_sw_occupation'])) {{$ch['ch_sw_occupation']['name']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_sw_seniority']) ) ANTIGÜEDAD EN LA EMPRESA</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['ch_sw_seniority'])) {{$ch['ch_sw_seniority']['name']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_sw_hours']) ) HORARIO DE TRABAJO</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['ch_sw_hours'])) {{$ch['ch_sw_hours']['name']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_sw_turn']) ) REALIZA TURNOS</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['ch_sw_turn'])) {{$ch['ch_sw_turn']['name']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['observations']) ) OBSERVACIONES</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['observations'])) {{$ch['observations']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>   
                    <br/>                       
                    @endforeach          
            </div>

            <!-- Dinámica familiar -->
            <div>
                @if(count($ChSwFamilyDynamics) > 0)
                
                    <hr />

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> DINÁMICA FAMILIAR</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChSwFamilyDynamics as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>

                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_sw_communications'])) COMUNICACIÓN PACIENTE: </b> {{$ch['ch_sw_communications']['name']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"><b>@if(isset($ch['observations']))OBSERVACIÓN: </b> {{$ch['observations']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"></span>                                            
                                </p>
                            </td>   
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['decisions'])) TOMA LAS DECISIONES EN EL HOGAR </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['decisions'])) {{$ch['decisions']['firstname']}} {{$ch['decisions']['middlefirstname']}}  {{$ch['decisions']['lastname']}} {{$ch['decisions']['middlelastname']}}@endisset</span>
                                    
                                </p>
                            </td>                       
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['decisions'])) {{$ch['decisions']['relationship']['name']}}@endisset</span>                                            
                                </p>
                            </td>                        
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['authority'])) AUTORIDAD DEL PACIENTE </b> @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['authority'])) {{$ch['authority']['firstname']}} {{$ch['authority']['middlefirstname']}}  {{$ch['authority']['lastname']}} {{$ch['authority']['middlelastname']}}@endisset</span>
                                    
                                </p>
                            </td>                       
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['authority'])) {{$ch['authority']['relationship']['name']}}@endisset</span>                                            
                                </p>
                            </td>                        
                        </tr>
                        <tr style="height:11.95pt">                        
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_sw_expression'])) EXPRESIÓN DEL PACIENTE: </b>{{$ch['ch_sw_expression']['name']}} @endisset</span>
                                                
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"></span>
                                    
                                </p>
                            </td>                       
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri"></span>                                            
                                </p>
                            </td>               
                        </tr>
                    </table>  
                    <br/>  
                                    
                    @endforeach

                @endisset
            </div>

            <!-- Factores de Riesgo -->
            <div>
                    @if(count($ChSwRiskFactors) > 0)

                    <hr />

                    <p style="text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff">FACTORES DE RIESGO</span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    <table class="tablehc">
                        <tr>
                            <th><span style="font-family:Calibri; font-size:9pt">FECHA</th>
                            <th><span style="font-family:Calibri; font-size:9pt">FACTORES DE RIESGO</th>
                            <th><span style="font-family:Calibri; font-size:9pt">OBSERVACIONES</th>
                        </tr>

                        @foreach($ChSwRiskFactors as $ch)
                        <tr>                        
                        @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
                            </td>
                            @endisset

                        @if(isset($ch['net']) || isset($ch['spa']) || isset($ch['violence']) || isset($ch['victim']) || isset($ch['economic']) ||
                        isset($ch['living']) || isset($ch['attention']) || isset($ch['stigmatization']) || isset($ch['interference']) || isset($ch['spaces']) )
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">
                                    @if(isset($ch['net'])) {{$ch['net']}} @endisset 
                                    @if(isset($ch['spa']))<br/>  {{$ch['spa']}} @endisset 
                                    @if(isset($ch['violence']))  <br/>{{$ch['violence']}} @endisset 
                                    @if(isset($ch['victim'])) <br/> {{$ch['victim']}} @endisset 
                                    @if(isset($ch['economic'])) <br/> {{$ch['economic']}} @endisset 
                                    @if(isset($ch['living'])) <br/> {{$ch['living']}} @endisset 
                                    @if(isset($ch['attention'])) <br/> {{$ch['attention']}}@endisset  
                                    @if(isset($ch['stigmatization']))  <br/>{{$ch['stigmatization']}} @endisset 
                                    @if(isset($ch['interference'])) <br/> {{$ch['interference']}} @endisset 
                                    @if(isset($ch['spaces'])) <br/>  {{$ch['spaces']}} @endisset <br/></span> 
                            @endisset   

                        @if(isset($ch['observations'])  )
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">
                                    @if(isset($ch['observations'])) {{$ch['observations']}} @endisset </span> 
                            @endisset                
                                                
                        </tr>
                        @endforeach

                    </table>         

                    @endisset
            </div>

            <!-- Vivienda -->
            <div>

                <!-- Aspectos Vivienda -->
                <div>
                    @if(count($ChSwHousingAspect) > 0)
                        <hr />
                        <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ASPECTOS VIVIENDA</b></span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>
                    @endisset

                        @foreach($ChSwHousingAspect as $ch)
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                        </p>
                        <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_sw_housing']) ) TENENCIA DE VIVIENDA</b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['ch_sw_housing']) ) {{$ch['ch_sw_housing']['name']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_sw_housing_type']) ) TIPO DE VIVIENDA</b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['ch_sw_housing_type'])) {{$ch['ch_sw_housing_type']['name']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['flat']) ) NÚMERO DE PISO </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['flat'])) {{$ch['flat']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['lift']) ) CUENTA CON ASCENSOR</b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['lift'])) {{$ch['lift']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['location']) ) UBICACIÓN EN ZONA CRITICA</b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['location'])) {{$ch['location']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['vehicle_access']) ) ACCESO VEHICULAR </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['vehicle_access'])) {{$ch['vehicle_access']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                        </table>   
                        <br/>                       
                        @endforeach          
                </div>

                <!-- Condiciones Vivienda -->
                <div>
                    @if(count($ChSwConditionHousing) > 0)
                        <hr />
                        <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> CONDICIONES DE LA VIVIENDA</b></span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>
                    @endisset

                        @foreach($ChSwConditionHousing as $ch)
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                        </p>
                        <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['water']) || isset($ch['light']) || isset($ch['telephone']) || isset($ch['sewerage']) || isset($ch['gas']) ) SERVICIOS DE LA VIVIENDA</b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['water']) || isset($ch['light']) || isset($ch['telephone']) || isset($ch['sewerage']) || isset($ch['gas']) ) {{$ch['water']}} {{$ch['light']}} {{$ch['telephone']}} {{$ch['sewerage']}} {{$ch['gas']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['num_rooms']) ) NÚMERO DE HABITACIONES</b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['num_rooms'])) {{$ch['num_rooms']}} @endisset</span>
                                    </p>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['persons_rooms']) ) PERSONAS POR HABITACIÓN </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['persons_rooms'])) {{$ch['persons_rooms']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['rooms']) || isset($ch['living_room']) || isset($ch['dinning_room']) || isset($ch['kitchen']) || isset($ch['bath']) )  ESPACIOS</b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri"> @if(($ch['rooms']) == 1 )Habitaciones @endisset </span>
                                        <span style="font-family:Calibri"> @if(($ch['living_room']) == 1 )Sala @endisset </span>
                                        <span style="font-family:Calibri"> @if(($ch['dinning_room']) == 1 )Comedor @endisset </span>
                                        <span style="font-family:Calibri"> @if(($ch['kitchen']) == 1 )Cocina @endisset </span>
                                        <span style="font-family:Calibri"> @if(($ch['bath']) == 1 )Baño @endisset </span>
                                    </p>
                                </td>
                            </tr>                        
                        </table>   
                        <br/>                       
                        @endforeach          
                </div>

                <!-- Condiciones Higiene -->
                <div>
                    @if(count($ChSwHygieneHousing) > 0)
                        <hr />
                        <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> CONDICIONES DE HIGIENE DE LA VIVIENDA</b></span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>
                    @endisset

                        @foreach($ChSwHygieneHousing as $ch)
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                        </p>
                        <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['cleanliness'])) ASEO </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['cleanliness'])) {{$ch['cleanliness']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['obs_cleanliness'])) OBSERVACIONES </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['obs_cleanliness'])) {{$ch['obs_cleanliness']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['illumination'])) ILUMINACIÓN </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['illumination'])) {{$ch['illumination']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['obs_illumination'])) OBSERVACIONES </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['obs_illumination'])) {{$ch['obs_illumination']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ventilation'])) VENTILACIÓN </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['ventilation'])) {{$ch['ventilation']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['obs_ventilation'])) OBSERVACIONES </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['obs_ventilation'])) {{$ch['obs_ventilation']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['pests'])) PLAGAS </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['pests'])) {{$ch['pests']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['obs_pests'])) OBSERVACIONES </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['obs_pests'])) {{$ch['obs_pests']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['sanitary'])) SANITARIO </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['sanitary'])) {{$ch['sanitary']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['obs_sanitary'])) OBSERVACIONES </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['obs_sanitary'])) {{$ch['obs_sanitary']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['trash'])) LUGAR DE BASURAS </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['trash'])) {{$ch['trash']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['obs_trash'])) OBSERVACIONES </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['obs_trash'])) {{$ch['obs_trash']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                        </table>   
                        <br/>                       
                        @endforeach          
                </div>

            </div>
        
            <!-- Económia -->
            <div>

                <div>
                    @if(count($ChSwIncome) > 0 || count($ChSwExpenses) > 0 || count($ChSwEconomicAspects) > 0 )
                    <hr />
                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> ASPECTOS ECONÓMICOS</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                    @endisset
                </div>

                <!-- Ingresos -->
                <div>
                    @if(count($ChSwIncome) > 0)
                        <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> INGRESOS</b></span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>
                    @endisset

                        @foreach($ChSwIncome as $ch)
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                        </p>
                        <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['salary'])) SALARIO </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['salary'])) {{$ch['salary']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['pension'])) PENSIÓN </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['pension'])) {{$ch['pension']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['donations'])) DONACIONES </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['donations'])) {{$ch['donations']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['rent'])) RENTA </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['rent'])) {{$ch['rent']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['familiar_help'])) AYUDA FAMILIAR </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['familiar_help'])) {{$ch['familiar_help']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['none'])) NINGUNO </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['none'])) {{$ch['none']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                        </table>
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['total'])) TOTAL DE INGRESOS: </b> {{$ch['total']}}@endisset</span>
                        </p>   
                        <br/>       

                        @endforeach          
                </div>

                <!-- Egresos -->
                <div>
                    @if(count($ChSwExpenses) > 0)
                        <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> EGRESOS</b></span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>
                    @endisset

                        @foreach($ChSwExpenses as $ch)
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                        </p>
                        <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['feeding'])) ALIMENTACIÓN </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['feeding'])) {{$ch['feeding']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['gas'])) GAS </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['gas'])) {{$ch['gas']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['light'])) LUZ </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['light'])) {{$ch['light']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['aqueduct'])) ACUEDUCTO/AGUA </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['aqueduct'])) {{$ch['aqueduct']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['rent'])) RENTA/ARRIENDO </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['rent'])) {{$ch['rent']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['transportation'])) TRANSPORTE </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['transportation'])) {{$ch['transportation']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['recreation'])) RECREACIÓN </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['recreation'])) {{$ch['recreation']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['education'])) EDUCACIÓN </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['education'])) {{$ch['education']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['medical'])) GASTOS MÉDICOS </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['medical'])) {{$ch['medical']}} @endisset</span>
                                    </p>
                                </td>
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['cell_phone'])) TELEFONO CELULAR </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['cell_phone'])) {{$ch['cell_phone']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['landline'])) TELÉFONO FIJO </b>@endisset</span>
                                    </p>
                                </td>
                                <td style="width:106pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri">@if(isset($ch['landline'])) {{$ch['landline']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                        </table>
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['total'])) TOTAL DE EGRESOS: </b> {{$ch['total']}}@endisset</span>
                        </p>      
                        <br/>       

                        @endforeach          
                </div>

                <!-- Capacidad Copago -->
                <div>
                    @if(count($ChSwEconomicAspects) > 0)
                        <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> CAPACIDAD COPAGO</b></span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>
                    @endisset

                        @foreach($ChSwEconomicAspects as $ch)
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span> <br/> 
                            <span style="font-family:Calibri; font-size:9pt"><b>@if(isset($ch['copay'])) TIENE CAPACIDAD DE COPAGO: </b> {{$ch['copay']}}</b>@endisset</span>
                        </p>          
                        <br/>
                        @endforeach          
                </div>

            </div>

            <!-- Conflicto Armado -->
            <div>
                @if(count($ChSwArmedConflict) > 0)
                <hr />
                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> CONFLICTO ARMADO</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>

                    @foreach($ChSwArmedConflict as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>
                    
                        @if(($ch['victim']) == 'Si' )
                            <p style=" text-align: center; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"><b>ES VICTIMA DE CONFLICTO ARMADO</b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>  
                            <br/>
                            <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                                <tr style="height:11.95pt">                               
                                    <td style="width:79.75pt; vertical-align:top">
                                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['victim_time'])) HACE CUÁNTO TIEMPO </b>@endisset</span>
                                        </p>
                                    </td>
                                    <td style="width:106pt; vertical-align:top">
                                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                            <span style="font-family:Calibri">@if(isset($ch['victim_time'])) {{$ch['victim_time']}} @endisset</span>
                                        </p>
                                    </td>
                                    <td style="width:79.75pt; vertical-align:top">
                                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['municipality'])) CIUDAD </b>@endisset</span>
                                        </p>
                                    </td>
                                    <td style="width:106pt; vertical-align:top">
                                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                            <span style="font-family:Calibri">@if(isset($ch['municipality'])) {{$ch['municipality']}} @endisset</span>
                                        </p>
                                    </td>
                                    </tr>
                                <tr style="height:11.95pt">
                                    <td style="width:79.75pt; vertical-align:top">
                                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['population_group'])) GRUPO POBLACIONAL </b>@endisset</span>
                                        </p>
                                    </td>
                                    <td style="width:106pt; vertical-align:top">
                                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                            <span style="font-family:Calibri">@if(isset($ch['population_group'])) {{$ch['population_group']}} @endisset</span>
                                        </p>
                                    </td>
                                    <td style="width:79.75pt; vertical-align:top">
                                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ethnicity'])) GRUPO ÉTNICO </b>@endisset</span>
                                        </p>
                                    </td>
                                    <td style="width:106pt; vertical-align:top">
                                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                            <span style="font-family:Calibri">@if(isset($ch['ethnicity'])) {{$ch['ethnicity']}} @endisset</span>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <br/>    
                        @endisset

                        @if(($ch['victim']) == 'No' )
                            <p style=" text-align: left; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"><b>NO ES VICTIMA DE CONFLICTO ARMADO</b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>    
                        @endisset

                        @if(($ch['subsidies'] =='Si'))
                            <p style=" text-align: left; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> RECIBE SUBSIDIOS</b></span>
                                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>
                            <br/>
                            <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                                <tr style="height:11.95pt">
                                    <td style="width:79.75pt; vertical-align:top">
                                        <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                            <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['detail_subsidies'])) SUBSIDIOS </b>@endisset</span>
                                        </p>
                                    </td>
                                    <td style="width:106pt; vertical-align:top">
                                        <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                            <span style="font-family:Calibri">@if(isset($ch['detail_subsidies'])) {{$ch['detail_subsidies']}} @endisset</span>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <br/>   
                        @endisset 

                        @if(($ch['subsidies']) == 'No' )
                            <p style=" text-align: left; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"><b>NO RECIBE SUBSIDIOS</b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>    
                        @endisset
                    <br/>   
                    @endforeach   
                            

                @endisset  
            

            </div>

            <!-- Red de apoyo -->
            <div>
                @if(count($ChSwSupportNetwork) > 0)
                    <hr />
                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> RED DE APOYO</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                @endisset

                    @foreach($ChSwSupportNetwork as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>
                    
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_sw_network']) ) RED DE APOYO</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['ch_sw_network']) ) {{$ch['ch_sw_network']['name']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['provided']) ) BRINDADA POR</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['provided'])) {{$ch['provided']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>   

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['sw_note'])) NOTA TRABAJO SOCIAL </b> {{$ch['sw_note']}}</b>@endisset</span>
                    </p>
                    <br/>                       
                    @endforeach          
            </div>

        </div>

        <!-- REGULAR -->
        <div>
        
            <!-- Validación Regular -->
            <div>
                @if(count($ChSwSupportNetworkEvo) > 0 )
                <hr />
                <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                    REGULAR<br>
                </p>
                @endisset
            </div>

            <!-- Red de apoyo -->
            <div>
                @if(count($ChSwSupportNetworkEvo) > 0)
                    <hr />
                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> RED DE APOYO</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                @endisset

                    @foreach($ChSwSupportNetworkEvo as $ch)
                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                    </p>
                    
                    <table cellspacing="0" cellpadding="0" style="margin-left:5.9pt; border-collapse:collapse">
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['ch_sw_network']) ) RED DE APOYO</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['ch_sw_network']) ) {{$ch['ch_sw_network']['name']}} @endisset</span>
                                </p>
                            </td>
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"><b>@if(isset($ch['provided']) ) BRINDADA POR</b>@endisset</span>
                                </p>
                            </td>
                            <td style="width:106pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                    <span style="font-family:Calibri">@if(isset($ch['provided'])) {{$ch['provided']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                    </table>   

                    <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['sw_note'])) NOTA TRABAJO SOCIAL </b> {{$ch['sw_note']}}</b>@endisset</span>
                    </p>
                    <br/>                       
                    @endforeach          
            </div>


        </div>
        
        @endisset
    </div>








    <!-- Terapia Ocupacional-->
    <div>
        @if($chrecord['ch_type_id'] == 6)

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
                    <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['ch_diagnosis'])) DIAGNÓSTICO MÉDICO: </b> {{$ch['ch_diagnosis']['name']}} @endisset</span>
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
                                        <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['temperature'])) TEMPERATURA: </b>{{$ch['temperature']}} @endisset
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
                                        <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['oxigen_saturation'])) SATURACIÓN DE OXIGENO: </b>{{$ch['oxigen_saturation']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['size'])) TALLA: </b>{{$ch['size']}} @endisset</span>
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
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                        <b>@if(isset($ch['created_at']))FECHA : </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                                    <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
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
                    count($ChRNMaterialsOTNT) > 0 )

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
                    <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['ch_diagnosis'])) DIAGNÓSTICO MÉDICO: </b> {{$ch['ch_diagnosis']['name']}} @endisset</span>
                </p>
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
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['temperature'])) TEMPERATURA: </b>{{$ch['temperature']}} @endisset
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
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['oxigen_saturation'])) SATURACIÓN DE OXIGENO: </b>{{$ch['oxigen_saturation']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['size'])) TALLA: </b>{{$ch['size']}} @endisset</span>
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
                    <b>@if(isset($ch['created_at']))FECHA : </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                        <b>@if(isset($ch['created_at']))FECHA : </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                            <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
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
        
        @endisset
    </div>












    <!-- Terapia Respiratoria-->
    <div>
        @if($chrecord['ch_type_id'] == 5)

        <!-- INGRESO -->
        <div>
            <hr />
            <!-- Validación Ingreso -->
            <div>
                @if(count($ChRespiratoryTherapy) > 0 || count($ChBackground) > 0 || count($ChVitalSigns) > 0  || count($ChOxygenTherapy) > 0 || count($ChAssSigns) > 0  ||  
                    count($ChTherapeuticAss) > 0 || count($ChScalePain) > 0 || count($ChScaleWongBaker) > 0 || count($ChRtInspection) > 0  ||
                    count($ChAuscultation) > 0 || count($ChDiagnosticAids) > 0  || count($ChObjectivesTherapy) > 0  || count($ChRtSessions) > 0 )

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
                    <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['medical_diagnosis'])) DIAGNÓSTICO MÉDICO: </b> {{$ch['medical_diagnosis']['name']}} @endisset</span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['therapeutic_diagnosis'])) DIAGNÓSTICO TERÁPEUTICO CIF: </b> {{$ch['therapeutic_diagnosis']}} @endisset</span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['reason_consultation'])) MOTIVO DE CONSULTA: </b> {{$ch['reason_consultation']}} @endisset</span>
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
                                        <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['temperature'])) TEMPERATURA: </b>{{$ch['temperature']}} @endisset
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
                                        <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['oxigen_saturation'])) SATURACIÓN DE OXIGENO: </b>{{$ch['oxigen_saturation']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['size'])) TALLA: </b>{{$ch['size']}} @endisset</span>
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

            <!-- Destete de oxigeno -->
            <div>
                @if(count($ChOxygenTherapy) > 0)
                
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
        
                        @foreach($ChOxygenTherapy as $ch)
                        <tr>                        
                            @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
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
                        @endforeach
        
                    </table>                   

                @endisset
            </div>

            <!-- Valoración Terápeutica -->
            <div>
                @if(count($ChAssSigns) > 0 || count($ChTherapeuticAss) > 0)
                
                    <hr />

                    <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                        <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> VALORACIÓN TERÁPEUTICA</b></span>
                        <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                    </p>
                    @endisset

                
                    @foreach($ChTherapeuticAss as $ch)
                    
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                        </p>
                            
                            @if(isset($ch['fluter']) || isset($ch['distal']) || isset($ch['widespread']) || isset($ch['peribucal']) ||
                            isset($ch['periorbitary']) || isset($ch['none']) || isset($ch['intercostal']) || isset($ch['aupraclavicular']) )
                        
                            <p style=" text-align: left ; margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; widows:0; orphans:0; font-size:9pt">
                                <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> SIGNOS DE DIFICULTAD RESPIRATORIA </b> </span>
                                <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                            </p>
                            @endisset
                    
                        <p style= "margin-top:8.95pt; margin-left:8pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:8pt"> 
                                @if(isset($ch['fluter']))   {{$ch['fluter']}} @endisset
                                @if(isset($ch['distal']))   {{$ch['distal']}} @endisset
                                @if(isset($ch['widespread']))  {{$ch['widespread']}} @endisset
                                @if(isset($ch['peribucal']))  {{$ch['peribucal']}} @endisset
                                @if(isset($ch['periorbitary']))   {{$ch['periorbitary']}} @endisset
                                @if(isset($ch['none']))   {{$ch['none']}} @endisset
                                @if(isset($ch['intercostal']))   {{$ch['intercostal']}} @endisset
                                @if(isset($ch['aupraclavicular']))   {{$ch['aupraclavicular']}} @endisset</span>
                        </p>                         
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
                                        <span style="font-family:Calibri; font-size:8pt"> </span>
                                    </p>
                                </td>
                                <td style="width:100pt; vertical-align:top">
                                    <p style="margin-top:0pt; margin-left:2.5pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                                        <span style="font-family:Calibri"> </span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
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
                        <br/>
                           
                    @endforeach
                    
            </div>

            <!-- Inspección -->
            <div>   
                <!-- Escala de Dolor Adulto-->
                <div>
                        @if(count($ChScalePain) > 0 )
                        
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

                            @foreach($ChScalePain as $ch)
                            <tr>                        
                            @if(isset($ch['created_at']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
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
                        @if(count($ChScaleWongBaker) > 0 )
                        
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

                            @foreach($ChScaleWongBaker as $ch)
                            <tr>                        
                            @if(isset($ch['created_at']))
                                <td>
                                    <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
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
                    @if(count($ChRtInspection) > 0)
                        <hr />

                        <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                            <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> INSPECCIÓN </b></span>
                            <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                        </p>
                    @endisset

                    @foreach($ChRtInspection as $ch)
                        <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                            <span style="font-family:Calibri; font-size:9pt">
                            <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
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
                    @endforeach

       
                </div>

                <!-- Auscultación -->
                <div>
                    @if(count($ChAuscultation) > 0)

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

                        @foreach($ChAuscultation as $ch)
                        <tr>                        
                        @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
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
                        @endforeach

                    </table>         

                    @endisset
                </div>

                <!-- Ayudas diagnósticas -->
                <div>
                    @if(count($ChDiagnosticAids) > 0)

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

                        @foreach($ChDiagnosticAids as $ch)
                        <tr>                        
                        @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
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
                        @endforeach

                    </table>         

                    @endisset
                </div>

            </div>

            <!-- Objetivos -->
            <div>
                    @if(count($ChObjectivesTherapy) > 0)

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

                        @foreach($ChObjectivesTherapy as $ch)
                        <tr>                        
                        @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
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
                        @endforeach

                    </table>         

                    @endisset
            </div>

            <!-- Sesiones -->
            <div>
                    @if(count($ChRtSessions) > 0)

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

                        @foreach($ChRtSessions as $ch)
                        <tr>                        
                        @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
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
        
        <!-- REGULAR -->
        <div>
            <hr />
            <!-- Validación Regular -->
            <div>
                @if(count($ChRespiratoryTherapyEvo) > 0 || count($ChBackground) > 0 || count($ChVitalSignsEvo) > 0  || count($ChOxygenTherapyEvo) > 0 || count($ChRtSessionsEvo) > 0 )

                <p style="text-align: center; margin-top:0.4pt; margin-bottom:0pt; PADDING: 0.3EM;COLOR: WHITE;BACKGROUND-COLOR: #70ad47;widows:0; orphans:0; font-size:9.5pt">
                    REGULAR<br>
                </p>
                @endisset
            </div>

            <!-- Valoración Evo -->
            <div>
                @if(count($ChRespiratoryTherapyEvo) > 0)
            
                <hr />

                <p style=" text-align: center; margin-top:8.95pt; widows:0; orphans:0; font-size:9pt">
                    <span style="font-family:Calibri; font-weight:bold; color:#057591; background-color:#ffffff"> <b> VALORACIÓN </b></span>
                    <span style="display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
                </p>

                @foreach($ChRespiratoryTherapyEvo as $ch)
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                    <b>@if(isset($ch['created_at'])) FECHA: </b>{{substr($ch['created_at'],0,10) }} @endisset </span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['medical_diagnosis'])) DIAGNÓSTICO MÉDICO: </b> {{$ch['medical_diagnosis']['name']}} @endisset</span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['therapeutic_diagnosis'])) DIAGNÓSTICO TERÁPEUTICO CIF: </b> {{$ch['therapeutic_diagnosis']}} @endisset</span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['reason_consultation'])) MOTIVO DE CONSULTA: </b> {{$ch['reason_consultation']}} @endisset</span>
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
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['temperature'])) TEMPERATURA: </b>{{$ch['temperature']}} @endisset
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
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['oxigen_saturation'])) SATURACIÓN DE OXIGENO: </b>{{$ch['oxigen_saturation']}} @endisset</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:11.95pt">
                            <td style="width:79.75pt; vertical-align:top">
                                <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                    <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['size'])) TALLA: </b>{{$ch['size']}} @endisset</span>
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

            <!-- Destete de oxigeno Evo -->
            <div>
                @if(count($ChOxygenTherapyEvo) > 0)
                
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
        
                        @foreach($ChOxygenTherapy as $ch)
                        <tr>                        
                        @if(isset($ch['created_at']))
                            <td>
                                <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
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
                        @endforeach
        
                    </table>                

                @endisset
            </div>

            <!-- Sesiones Evo-->
            <div>
                @if(count($ChRtSessionsEvo) > 0)

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

                    @foreach($ChRtSessionsEvo as $ch)
                    <tr>                        
                    @if(isset($ch['created_at']))
                        <td>
                            <span style="font-family:Calibri; font-size:9pt">{{substr($ch['created_at'],0,10) }}</span>
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
        
        @endisset
    </div>









    <!-- Medicina General-->
    <div>
        @if($chrecord['ch_type_id'] == 1 )

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
                        <b>@if(isset($ch['reason_consultation'])) MOTIVO DE CONSULTA: </b> {{$ChReasonConsultation['reason_consultation']}} @endisset</span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['current_illness'])) ENFERMEDAD ACTUAL: </b> {{$ChReasonConsultation['current_illness']}} @endisset</span>
                </p>
                <p style="margin-top:10pt; margin-left:9.45pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
                    <span style="font-family:Calibri; font-size:9pt">
                        <b>@if(isset($ch['ch_external_cause'])) CAUSA EXTERNA: </b> {{$ChReasonConsultation['ch_external_cause']['name']}} @endisset</span>
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
                                        <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['temperature'])) TEMPERATURA: </b>{{$ch['temperature']}} @endisset
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
                                        <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['oxigen_saturation'])) SATURACIÓN DE OXIGENO: </b>{{$ch['oxigen_saturation']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['size'])) TALLA: </b>{{$ch['size']}} @endisset</span>
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
                                        <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['temperature'])) TEMPERATURA: </b>{{$ch['temperature']}} @endisset
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
                                        <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['oxigen_saturation'])) SATURACIÓN DE OXIGENO: </b>{{$ch['oxigen_saturation']}} @endisset</span>
                                    </p>
                                </td>
                            </tr>
                            <tr style="height:11.95pt">
                                <td style="width:79.75pt; vertical-align:top">
                                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                                        <span style="font-family:Calibri; font-size:8pt"> <b>@if(isset($ch['size'])) TALLA: </b>{{$ch['size']}} @endisset</span>
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
                        <span style="font-family:Calibri">{{$chrecord['admissions']['patients']['firstname']}} {{$chrecord['admissions']['patients']['middlefirstname']}} {{$chrecord['admissions']['patients']['lastname']}} {{$chrecord['admissions']['patients']['middlelastname']}}</span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri"> <b> Identificación: </b> </span>
                    </p>
                </td>
                <td style="width:141.6pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord['admissions']['patients']['identification']}}</span>
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
                        <span style="font-family:Calibri">{{substr($chrecord['admissions']['patients']['birthday'],0,10)}}</span>
                        <span style="font-family:Calibri; letter-spacing:4.45pt"> </span>
                
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:45.4pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri"> <b> Estado Civil: </b> </span>
                    </p>
                </td>      
                {{-- <td style="width:141.6pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:2.45pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord['admissions']['patients']['marital_status']['name']}}</span>
                    </p>
                </td> --}}

            </tr>
            <tr style="height:11.95pt">
                <td style="width:79.75pt; vertical-align:top">
                    <p style="margin-top:1.5pt; margin-left:2.5pt; margin-bottom:0pt; line-height:9.4pt; widows:0; orphans:0">
                        <span style="font-family:Calibri; font-size:8pt"><b>Edad: </b></span>
                    </p>
                </td>
                <td style="width:203pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:8.2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord['admissions']['patients']['age']}}</span>
                    </p>
                </td>
            
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:45.4pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri"> <b>Género: </b> </span>
                    </p>
                </td>

                <td style="width:141.6pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:2.45pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri; vertical-align:1pt">{{$chrecord['admissions']['patients']['gender']['name']}}</span>
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
                        <span style="font-family:Calibri">{{$chrecord['admissions']['patients']['residence_address']}}</span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri"> <b> Teléfono: </b> </span>
                    </p>
                </td>
                <td style="width:141.6pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord['admissions']['patients']['phone']}}</span>
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
                        <span style="font-family:Calibri">{{$chrecord['admissions']['patients']['residence_municipality']['name']}}</span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri"> <b> Ocupación: </b> </span>
                    </p>
                </td>

                <td style="width:141.6pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord['admissions']['patients']['activities']['name']}}</span>
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
                        <span style="font-family:Calibri">{{$chrecord['admissions']['patients']['ethnicity']['name']}}</span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:47.05pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri"> <b> Nivel Educativo: </b> </span>
                    </p>
                </td>

                <td style="width:141.6pt; vertical-align:top">
                    <p style="margin-top:0.75pt; margin-left:2.9pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord['admissions']['patients']['academic_level']['name']}}</span>
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
                        <span style="font-family:Calibri">{{$chrecord['admissions']['consecutive']}} </span>
                    </p>
                </td>
                <td style="width:106pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:45.6pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri"> <b> Fecha: </b> </span>
                    </p>
                </td>
                <td style="width:141.6pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:2pt; margin-bottom:0pt; widows:0; orphans:0; font-size:8pt">
                        <span style="font-family:Calibri">{{$chrecord['admissions']['entry_date']}}</span>
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
                        <span style="font-family:Calibri">{{$chrecord['admissions']['contract']['company']['name']}}</span>
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
                        <span style="font-family:Calibri">{{$chrecord['admissions']['contract']['type_briefcase']['name']}}</span>
                    </p>
                </td>
            </tr>
        </table>
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
