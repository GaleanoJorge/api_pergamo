<html>
<head>
    <style>
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin-top: 7cm;
            margin-left: .5cm;
            margin-right: .5cm;
            margin-bottom: .5cm;
            font-family: "Helvetica";
        }

        .color-title {
            color: #002775;
        }

        .bg-color {
            background-color: #f2f2f2;
        }

        .bold {
            font-weight: bold;
        }

        .w-100 {
            width: 100%
        }

        .text-base {
            font-size: 12px;
        }

        .table-border td {
            border: 1px solid #000000;
        }

        .text-center {
            text-align: center;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 4.7cm;

            /** Estilos extra personales **/
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1cm;
            /** Estilos extra personales **/
            /*background-color: #03a9f4;
            color: white;

            line-height: 1.5cm;*/
        }

        .firmas {

        }

        footer .page-number:after {
            content: counter(page);
        }

    </style>

</head>
<body>
<footer>
    <table class="w-100 text-base" style="margin: 0cm -4cm 0cm .5cm; padding-top: 10px">
        <tr>
            <td style="width: 150px">Fecha de consulta:</td>
            <td>{{ date('Y-m-d H:i:s') }}</td>
            <td style="text-align: right">Página <span class="page-number"></span> de DOMPDF_PAGE_COUNT_PLACEHOLDER</td>
        </tr>
    </table>
</footer>

<header>
    <table class="w-100" style="border-collapse: collapse;">
        <tr>
            <td style="padding: 0;margin: 0;">
                <img style="width: 100%" src="{{ $images['header'] }}">
            </td>
        </tr>
    </table>

    <table class="w-100 text-base table-border" style="margin-top: 10px; margin: 0cm .5cm" cellspacing="0">
        <tr style="height: 40px">
            <td class="bg-color color-title bold">ACTIVIDAD ACADÉMICA:</td>
            <td>{{ $curso->nomCurso }}</td>
            <td class="bg-color color-title bold">ID ACTIVIDAD:</td>
            <td>{{ $curso->IDcurso  }}</td>
            <td class="bg-color color-title bold">COORDINADOR ACADÉMICO:</td>
            <td>{{ $curso->Coordinador }}</td>
        </tr>
        <tr>
            <td class="bg-color color-title bold">FECHA INICIAL:</td>
            <td>{{ $curso->fechaInicio }}</td>
            <td class="bg-color color-title bold">FECHA FINAL:</td>
            <td>{{ $curso->fechaFinal }}</td>
            <td class="bg-color color-title bold">No. ASISTENTES:</td>
            <td>{{ count((array) $asistentes) }}</td>
        </tr>
        <tr>
            <td class="bg-color color-title bold">ZONAS:</td>
            <td colspan="2">{{ $curso->nomZona  }}</td>
            <td class="bg-color color-title bold">SEDE:</td>
            <td colspan="2">{{ $curso->nomSede  }}</td>
        </tr>
        <tr>
            <td class="bg-color color-title bold">PRESENCIAL/VIRTUAL</td>
            <td>{{ $curso->presencial_virtual }}</td>
            <td class="bg-color color-title bold">ÁREA</td>
            <td>{{ $curso->Area }}</td>
            <td class="bg-color color-title bold">SUB-ÁREA</td>
            <td>{{ $curso->nomSubArea }}</td>
        </tr>
        <tr>
            <td class="bg-color color-title bold">PROGRAMA</td>
            <td colspan="2">{{ $curso->Programa }}</td>
            <td class="bg-color color-title bold">SUBPROGRAMA</td>
            <td colspan="2">{{ $curso->subPrograma }}</td>
        </tr>
        <tr>
            <td class="bg-color color-title bold">MÓDULO</td>
            <td colspan="5">{{ $curso->Modulo }}</td>
        </tr>
    </table>

</header>


<table class="w-100 text-base table-border" style="margin-top: 10px" cellspacing="0">
    <tr class="text-center bold" style="height: 30px; background-color: #808080; color: white">
        <td colspan="8"> Formadores asignados</td>
    </tr>

    <tr class="text-center bg-color">
        <td>Primer apellido</td>
        <td>Segundo apellido</td>
        <td>Primer nombre</td>
        <td>Segundo nombre</td>
        <td>No. de documento</td>
        <td>Cargo</td>
        <td>Entidad</td>
        <td>Especialidad</td>
    </tr>

    @foreach($formadores as $formador)
        <tr style="height: 40px">
            <td>{{ $formador->primerApellido }}</td>
            <td>{{ $formador->segundoApellido }}</td>
            <td>{{ $formador->primerNombre }}</td>
            <td>{{ $formador->segundoNombre }}</td>
            <td>{{ $formador->numIdentificacion }}</td>
            <td>{{ $formador->nomCargo }}</td>
            <td>{{ $formador->nomEntidad }}</td>
            <td>{{ $formador->e_nombreespecialidad }}</td>
        </tr>
    @endforeach
</table>

<table class="w-100 text-base table-border" style="margin-top: 10px; max-width: 100%" cellspacing="0">
    <tr class="text-center bold" style="height: 30px; background-color: #3d79d9; color: white">
        <td colspan="17"><b>Participantes</b></td>
    </tr>

    <tr class="text-center" style="background-color: #eef8ff">
        <td>No. documento</td>
        <td>Nombres y apellidos</td>
        <td>Género</td>
        <td>Teléfono y/o celular</td>
        <td>Cargo</td>
        <td>Sala o No.despacho</td>
        <td>Corporación o Juzgado</td>
        <td>Especialidad</td>
        <td>Ciudad laboral</td>
        <td>Circuito</td>
        <td>Distrito</td>
        <td>Consejo seccional</td>
        <td>Día 1</td>
        <td>Día 2</td>
        <td>Día 3</td>
        <td>Día 4</td>
        <td>Día 5</td>
    </tr>

    @foreach($asistentes as $asistente)
        <tr style="font-size: 10px">
            <td>{{ $asistente->cedula }}</td>
            <td>{{ $asistente->primerNombre }} {{ $asistente->segundoNombre }} {{ $asistente->primerApellido }} {{ $asistente->segundoApellido }}</td>
            <td>{{ $asistente->genero }}</td>
            <td>{{ $asistente->telefonoMovil }}</td>
            <td>{{ $asistente->cargo }}</td>
            <td>{{ $asistente->despachoDependencia }}</td>
            <td>{{ $asistente->corporacionJuzgado }}</td>
            <td>{{ $asistente->especialidad }}</td>
            <td>{{ $asistente->Ciudad }}</td>
            <td>{{ $asistente-> circuito}}</td>
            <td>{{ $asistente->nomDistrito }}</td>
            <td>{{ $asistente->nomConcejoSeccional }}</td>
            <td>{{ $asistente->dia1 }}</td>
            <td>{{ $asistente->dia2 }}</td>
            <td>{{ $asistente->dia3 }}</td>
            <td>{{ $asistente->dia4 }}</td>
            <td>{{ $asistente->dia5 }}</td>
        </tr>
    @endforeach
</table>

<table class="w-100 firmas text-base" style="margin-top: 200px; max-width: 100%" cellspacing="0">
    <tr>
        <td>Coordinador académico:</td>
        <td>Coordinador académico:</td>
        <td>Asistente de zona:</td>
    </tr>
    <tr>
        <td>Nombre:</td>
        <td>Nombre:</td>
        <td>Nombre:</td>
    </tr>
    <tr>
        <td>Cédula:</td>
        <td>Cédula:</td>
        <td>Cédula:</td>
    </tr>
    <tr>
        <td>Cargo:</td>
        <td>Cargo:</td>
        <td>Cargo:</td>
    </tr>
    <tr>
        <td>Firma:</td>
        <td>Firma:</td>
        <td>Firma:</td>
    </tr>
</table>

</body>
</html>
