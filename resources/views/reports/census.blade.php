<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta name="generator" content="Aspose.Words for .NET 17.1.0.0" />
    <title>
    </title>

    <STYLE>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td {
            height: 2px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            border: 1px solid #ccc;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            /* background-color: #dddddd; */
        }
    </STYLE>
</head>

<body>
    <div>
        <div>
            <div style="float: right; font-size: 10px"><i>{{$date}}</i></div>
            {{-- <script>
                if (isset($dompdf)) {
                    $x = 250;
                    $y = 10;
                    $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
                    $font = null;
                    $size = 14;
                    $color = array(255,0,0);
                    $word_space = 0.0;  //  default
                    $char_space = 0.0;  //  default
                    $angle = 0.0;   //  default
                    $dompdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
                }
            </script> --}}
            <p style="margin-top:0pt; margin-bottom:0pt; line-height:6%; widows:0; orphans:0; font-size:10pt">
                <span>
                    <img src="https://storage.googleapis.com/detecta/ajz5a-4q5bb.006.png" width="142" height="59" />
                </span>

                <span style="height:0pt; display:block; position:absolute">
                    <h3>
                        <div style="text-align: center;  padding-right: 30%">
                            <p>HEALTH & LIFE IPS S.A.S </p>
                            <p>Nit: 900900122 - 7</p>
                        </div>
                    </h3>
                </span>
        </div>
        </p>
    </div>
    </div>
    <hr />

    <div>
        @if (count($census) >= 0)
        @foreach ($xCampus as $Sede)
        <div style="text-align: center">
            <div style="font-size: 14px"><b>CENSO DIARIO</b></div>
            <div style="font-size: 12px">
                <b>{{$Sede['sedeName']}} / {{$Sede['sedeAddress']}} de {{$Sede['region']['name']}}</b>
            </div>
        </div>
        @foreach ($xPavilion as $pabellon)
        @if ($pabellon['sedeId']==$Sede['sedeId'])
        <div>
            <div style="text-align: center; font-size: 10px">
                <p><b>{{$pabellon['pisoName']}} - {{$pabellon['pabellonName']}}</b></p>
            </div>
        </div>

        <table>
            <tr>
                <td>
                    <div style="text-align: center"><span style="font-size: 9px"><b>Prio</b></span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 9px"><b>Cama</b></span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 9px"><b>Documento</b></span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 9px"><b>Paciente</b></span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 9px"><b>Edad</b></span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 9px"><b>Cód.</b></span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 9px"><b>Diagnóstico</b></span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 9px"><b>Fecha de Ingreso</b></span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 9px"><b>Estancia: Días</b></span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 9px"><b>ARS - EPS</b></span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 9px"><b>Contrato</b></span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 9px"><b>Especialidad Tratada</b></span>
                    </div>
                </td>
            </tr>

            @foreach ($census as $ph)
            @if ($ph['sedeId']==$Sede['sedeId'] && $ph['pabellonId']==$pabellon['pabellonId'])
            <tr>
                <td>
                    <div style="text-align: center"><span style="font-size: 8px"></span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 8px">
                            @if (isset($ph['Cama']))
                            {{ $ph['Cama'] }} @endisset
                        </span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 8px">
                            @if (isset($ph['Documento']))
                            {{ $ph['Documento'] }} @endisset
                        </span></div>
                </td>
                <td>
                    <div><span style="font-size: 8px">
                            @if (isset($ph['Paciente']))
                            {{$ph['Paciente']}} @endisset
                        </span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 8px">
                            @if (isset($ph['Edad']))
                            {{ $ph['Edad'] }} @endisset
                        </span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 8px">
                            @if (isset($ph['Cod.']))
                            {{ $ph['Cod.'] }} @endisset
                        </span></div>
                </td>
                <td>
                    <div><span style="font-size: 8px">
                            @if (isset($ph['Diagnóstico']))
                            {{ $ph['Diagnóstico'] }} @endisset
                        </span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 8px">
                            @if (isset($ph['Fecha de Ingreso']))
                            {{ $ph['Fecha de Ingreso'] }} @endisset
                        </span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 8px">
                            @if (isset($ph['Estancia-(Días)']))
                            {{ $ph['Estancia-(Días)'] }} @endisset
                        </span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 8px">
                            @if (isset($ph['ARS-EPS']))
                            {{ $ph['ARS-EPS'] }} @endisset
                        </span></div>
                </td>
                <td>
                    <div style="text-align: center"><span style="font-size: 8px">
                            @if (isset($ph['Contrato']))
                            {{ $ph['Contrato'] }} @endisset
                        </span></div>
                </td>
                <td>
                    <div><span style="font-size: 8px">
                            @if (isset($ph['Especialidad Tratante']))
                            {{ $ph['Especialidad Tratante'] }} @endisset
                        </span></div>
                </td>
            </tr>
            @endisset
            @endforeach
        </table>
        <hr />
        <div style="float:right; font-size: 10px"><span>
                <b>Total Camas: {{$pabellon['camasTotalPabellon']}} - </b>
                | Libres: <b>{{$pabellon['camasLibresPabellon']}} </b>
                | Ocupadas: <b>{{$pabellon['camasOcupadasPabellon']}} </b>
                | En Mantenimiento: <b>{{$pabellon['camasMantenimientoPabellon']}} </b>
                | En Desinfección: <b>{{$pabellon['camasDesinfeccionPabellon']}} |</b></span>
        </div>
        <br>
        @endisset
        @endforeach
        @endforeach
        @endisset
    </div>
    <div style="float:right; font-size: 10px">@foreach ($xCampus as $xC)
        <div><b>TOTAL CAMAS EN {{$xC['sedeName']}}: {{$xC['camasTotalSede']}} - </b>
            | Libres: <b>{{$xC['camasLibresSede']}}</b>
            | Ocupadas: <b>{{$xC['camasOcupadasSede']}}</b>
            | En Mantenimiento: <b>{{$xC['camasEnMantenimientoSede']}}</b>
            | En Desinfección: <b>{{$xC['CamasEnDesinfeccionSede']}} |</b>
        </div>
        @endforeach
    </div>
    <footer style="display:block">
        <div style="position: fixed; bottom:3%; font-size: 12px">
            <div style="font-family: 'Open Sans', 'arial', 'sans-serif'; float: right; margin-right: 10pt">
                <b>PERGAMO</b>
            </div>
            @foreach ($xCampus as $xC)
            <div><b>TOTAL CAMAS EN {{$xC['sedeName']}}: {{$xC['camasTotalSede']}} - </b>
                | Libres: <b>{{$xC['camasLibresSede']}}</b>
                | Ocupadas: <b>{{$xC['camasOcupadasSede']}}</b>
                | En Mantenimiento: <b>{{$xC['camasEnMantenimientoSede']}}</b>
                | En Desinfección: <b>{{$xC['CamasEnDesinfeccionSede']}} |</b>
            </div>
            <div><b>ÍNDICE OCUPACIONAL EN {{$xC['sedeName']}}: {{$xC['IndiceSede']}}%</b></div>
            @endforeach

            @foreach ($General as $g)
            <div><b>TOTAL CAMAS GENERAL: {{$g['camasGeneralTotal']}} - </b>
                | Libres: <b>{{$g['camasGeneralLibres']}}</b>
                | Ocupadas: <b>{{$g['camasGeneralOcupadas']}}</b>
                | En Mantenimiento: <b>{{$g['camasGeneralMantenimiento']}}</b>
                | En Desinfección: <b>{{$g['camasGeneralDesinfeccion']}} |</b>
            </div>
            <div><b>ÍNDICE OCUPACIONAL GENERAL: {{$g['IndiceGeneral']}}%</b></div>
            @endforeach
        </div>
    </footer>
</body>

</html>