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
            <p style="margin-top:0pt; margin-bottom:0pt; line-height:6%; widows:0; orphans:0; font-size:10pt">
                <span>
                    {{-- <img src="C:\Users\USUARIO\Downloads\Reportes con Estilos\LOGO-HL-COLOR.svg" width="142"
                        height="100" /> --}}
                    <img src="https://storage.googleapis.com/detecta/ajz5a-4q5bb.006.png" width="142" height="59" />
                </span>

                <span style="height:0pt; display:block; position:absolute">
                    <div style="text-align: center;  padding-right: 30%">
                        <p>HEALTH & LIFE IPS S.A.S </p>
                        <p>Nit: 900900122 - 7</p>
                        
                    </div>
                </span>
        </div>
        </p>
    </div>
    </div>
    <hr />

    <div>
        @if (count($census) > 0)
        @foreach ($xCampus as $campus)
        <div>
            <div style="text-align: center; font-size: 10px">
                <p>{{$campus['name']}} - {{$campus['address']}} - {{$campus['region']['name']}}</p>
            </div>
        </div>
        @foreach ($xPavilion as $pavilion)
        @if ($pavilion['Sede']==$campus['Sede_id'])
        <div>
            <div style="text-align: center; font-size: 10px">
                <p><b>CENSO DIARIO DE {{$flat['name']}}, {{$pavilion['name']}}</b></p>
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
            @if ($ph['Campus']==$campus['Sede_id'] && $ph['Pavilion']==$pavilion['pavilion_id'])
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
            <b>Total Camas: {{$pavilion['Total']}} - </b>
            Libres: <b>{{$pavilion['Libres']}},</b>
            Ocupadas: <b>{{$pavilion['Ocupadas']}}</b>
            En Mantenimiento: <b>{{$pavilion['Mantenimiento']}},</b>
            En Desinfección: <b>{{$pavilion['Desinfeccion']}}</b></span>
    </div>
        @endisset
        @endforeach
        @endforeach
        @endisset
        {{-- @endisset --}}
    </div>
    <footer>
        {{-- @foreach ($xPavilion as $xP)
        <div style="float:right; font-size: 10px"><span>
                <b>Total Camas: {{$xP['Total']}} - </b>
                Libres: <b>{{$xP['Libres']}},</b>
                Ocupadas: <b>{{$xP['Ocupadas']}}</b>
                En Mantenimiento: <b>{{$xP['Mantenimiento']}},</b>
                En Desinfección: <b>{{$xP['Desinfeccion']}}</b></span>
        </div>
        @endforeach --}}
        <div style="position: fixed; bottom:3%; font-size: 12px">
            <div style="font-family: 'Open Sans', 'arial', 'sans-serif'; float: right; margin-right: 10pt"><b>PERGAMO</b></div>
            @foreach ($xCampus as $xC)
            <div><b>TOTAL CAMAS EN {{$xC['Sede']}}: {{$xC['Total']}} - </b>
                Libres: <b>{{$xC['Libres']}},</b>
                Ocupadas: <b>{{$xC['Ocupadas']}},</b>
                En Mantenimiento: <b>{{$xC['Mantenimiento']}},</b>
                En Desinfección: <b>{{$xC['Desinfeccion']}}</b>
            </div>
            @endforeach

            @foreach ($General as $g)
            <div><b>TOTAL CAMAS GENERAL: {{$g['General Total']}} - </b>
                Libres: <b>{{$g['General Libres']}},</b>
                Ocupadas: <b>{{$g['General Ocupadas']}}</b>
                En Mantenimiento: <b>{{$g['General Mantenimiento']}},</b>
                En Desinfección: <b>{{$g['General Desinfeccion']}}</b>
            </div>
            <div><b>ÍNDICE OCUPACIONAL: {{$g['Indice']}}%</b></div>
            @endforeach
        </div>
    </footer>
</body>

</html>