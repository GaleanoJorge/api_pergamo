<html>
<head>
    <style>
        @page {
            margin: 0cm 0cm;
        }

        .color-title {
            color: #002775;
        }

        .bold {
            font-weight: bold;
        }

        body {
            margin-top: 1.5cm;
            margin-left: 1cm;
            margin-right: 1cm;
            margin-bottom: .5cm;
            font-family: 'Helvetica';
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
            height: 2cm;

            /** Estilos extra personales **/
        }

        footer {
            position: fixed;
            bottom: 1cm;
            left: 0cm;
            right: 0cm;
            height: 1.5cm;
            /** Estilos extra personales **/
            /*background-color: #03a9f4;
            color: white;

            line-height: 1.5cm;*/
        }

        /*footer .page-number:after { content: counter(page); }*/

    </style>

</head>
<body>
<footer>
    <table class="w-100" style="padding-bottom: 30px">
        <tr>
            <td>
                <img style="width: 100%;" src="{{ $images['footer'] }}">
            </td>
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
</header>
<table class="w-100" style="margin-top: 45px">
    <tr>
        <td align="justify" colspan="2">
            <br><br>
            <center><h4 class="color-title bold">CERTIFICACIÓN ACADÉMICA</h4></center>
            <br><br>
            La suscrita Directora de la Escuela Judicial "Rodrigo Lara Bonilla" hace constar que revisadas
            las bases de datos correspondientes al Registro Académico,
            se estableció que {{$discente[0]->nombres}} {{$discente[0]->apellidos}},
            identificado con {{$discente[0]->ti_nombre}}
            No. {{$discente[0]->Pe_IDENTIFICACION}}, participó en {{$desc_cursos}} de formación que se relaciona a
            continuación:
            <br><br>
            <table class="w-100 text-base table-border" cellspacing="0">
                <thead>
                <tr class="text-center color-title bold">
                    <td rowspan="2">Curso</td>
                    <td rowspan="2">Sede</td>
                    <td rowspan="2">Modulos</td>
                    <td colspan="2">Fecha</td>
                    <td rowspan="2">Intensidad horaria</td>
                </tr>
                <tr class="text-center">
                    <td>Inicial</td>
                    <td>Final</td>
                </tr>
                </thead>
                <tbody>
                @foreach($cursos as $row)
                    <tr>
                        <td>{{ $row->nomCurso }}</td>
                        <td>{{ $row->nombreSede }}</td>
                        <td>{{ $row->nomModulo }}</td>
                        <td class="text-center">{{ $row->fecInicial }}</td>
                        <td class="text-center">{{ $row->fecFinal }}</td>
                        <td class="text-center">{{ $row->totalHoras }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td class="text-base">
            MARY LUCERO NOVOA MORENO<br>
            Directora
        </td>
        <td>
        </td>
    </tr>
    <tr class="text-base">
        <td style="padding-top: 35px;">
            Verificación<br>
            Profesional especializada
        </td>
        <td style="padding-top: 35px;">
            <span class="color-title">Nombre:</span> LIDA CONSUELO HINCAPIE GUTIERREZ
        </td>
    </tr>
    <tr class="text-base">
        <td style="padding-top: 35px;">
            Responsable<br>
            Coordinador(a) académico(a)
        </td>
        <td style="padding-top: 35px;">
            <span class="color-title">Nombre:</span> JUAN FERNANDO BARRERA PENARANDA
        </td>
    </tr>
    <tr class="text-base">
        <td style="padding-top: 35px;">
            Elaboración<br>
            Responsable Registro Académico
        </td>
        <td style="padding-top: 35px;">
            <span class="color-title">Nombre:</span> KITSON RICARDO CASTAÑO ESPINOSA
        </td>
    </tr>
    <tr class="text-base">
        <td style="padding-top: 30px;" class="bold">
            EJRLB
        </td>
        <td>
        </td>
    </tr>
</table>
</body>
</html>
