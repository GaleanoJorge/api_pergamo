<html>
    <head>
        <style>

        /** 
            Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
            puede ser de altura y anchura completas.
            **/
        
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

        /** Definir las reglas del encabezado **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 4.7cm;

            /** Estilos extra personales **/
        }

        /** Definir las reglas del pie de página **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1cm;
        }

        footer table{
            width: 100%;  
            margin: 0cm -4cm 0cm .5cm; 
            padding-top: 10px;
        }

        thead th {
            text-align: left;
        }
        table, td, th {
            border: 1px solid black;
        }
        .firmas table td, footer table td {
            border: transparent !important;
            font-size: 12px;
        }
        th, td{
            padding: 0.15rem;
        }
        table {
            border-collapse: collapse;
        }
        .title{
            text-align: center;
            font-size: 22px;
        }
        .discentes{
            width: 100%; 
            margin-top: 10px
        }
        .cabecera, .discentes, .discentes tr td{
            font-size: 12px;
        }
        .cl-dia{
            width: 20px;
            text-align: center;
        }

        .color-title {
            color: #002775;
        }

        .bg-color {
            background-color: #eef8ff;
        }
        footer .page-number:after {
            content: counter(page);
        }
        </style>
    </head>
    <body>
        <!-- Defina bloques de encabezado y pie de página antes de su contenido -->
        <header>
            <table style="width: 100%;  border-collapse: collapse;">
                <tr>
                    <td style="padding: 0;margin: 0;">
                        <img style="width: 100%" src="{{ $header }}">
                    </td>
                </tr>
            </table>
            <table style="width: 100%; margin-top: 10px; margin: 0cm .5cm" cellspacing="0">
                <thead  class="cabecera">
                    <tr>
                        <th class="bg-color color-title">ACTIVIDAD ACADÉMICA</th>
                        <th colspan="2">{{$courses->course}}</th>
                        <th class="bg-color color-title">ID ACTIVIDAD</th>
                        <th style="text-align: left;">{{$courses->id}}</th>
                        <th class="bg-color color-title">COORDINADOR ACADÉMICO</th>
                        <th>{{$courses->firstname}} {{$courses->middlefirstname}} {{$courses->lastname}} {{$courses->middlelastname}}</th>
                    </tr>
                    <tr>
                        <th class="bg-color color-title">FECHA INICIAL</th>
                        <th>{{$courses->start_date->format('Y-m-d')}}</th>
                        <th class="bg-color color-title">FECHA FINAL</th>
                        <th colspan="2">{{$courses->finish_date->format('Y-m-d')}}</th>
                        <th class="bg-color color-title">No. ASISTENTES</th>
                        <th>{{count($discentes)}}</th>
                    </tr>
                    <tr>
                        <th class="bg-color color-title">ZONAS</th>
                        <th colspan="2">############</th>
                        <th class="bg-color color-title">SEDE</th>
                        <th colspan="3">{{$courses->campus}}</th>
                    </tr>
                    <tr>
                        <th class="bg-color color-title">PRESENCIAL/VIRTUAL</th>
                        <th colspan="2">{{$courses->methodology}}</th>
                        <th class="bg-color color-title">AREA</th>
                        <th>{{$courses->area}}</th>
                        <th class="bg-color color-title">SUB-AREA</th>
                        <th>{{$courses->subarea}}</th>
                    </tr>
                    <tr>
                        <th class="bg-color color-title">PROGRAMA</th>
                        <th colspan="3">{{$courses->programa}}</th>
                        <th class="bg-color color-title">SUB-PROGRAMA</th>
                        <th colspan="2">{{$courses->subprograma}}</th>
                    </tr>
                    <tr>
                        <th class="bg-color color-title">MODULO</th>
                        <th colspan="6">###################</th>
                    </tr>
                </thead>
            </table>
        </header>

        <!-- <footer>
            <span>
                Fecha de consulta:&nbsp;&nbsp;&nbsp; <?php echo date("Y-m-d H:i:s");?>
            </span>
        </footer> -->

        <footer>
            <table cellspacing="0">
                <tr>
                    <td style="width: 150px">Fecha de consulta:</td>
                    <td>{{ date('Y-m-d H:i:s') }}</td>
                    <td style="text-align: right">Página <span class="page-number"></span> de DOMPDF_PAGE_COUNT_PLACEHOLDER</td>
                </tr>
            </table>
        </footer>

        <!-- Envuelva el contenido de su PDF dentro de una etiqueta principal -->
        <main>
            <br>
            <table class="discentes"  style="margin-top: 20px" cellspacing="0">
                <thead>
                    <tr style="background-color: #eef8ff;">
                        <th style="text-align: center;" colspan="8">Formadores Asignados</th>
                    </tr>
                    <tr style="background-color: #eef8ff;">
                        <th>Primer apellido</th>
                        <th>Segundo apellido</th>
                        <th>Primer nombre</th>
                        <th>Segundo nombre</th>
                        <th>No. de documento</th>
                        <th>Cargo</th>
                        <th>Entidad</th>
                        <th>Especialidad</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->firstname }}</td>
                        <td>{{ $teacher->middlefirstname }}</td> 
                        <td>{{ $teacher->lastname }}</td> 
                        <td>{{ $teacher->middlelastname }}</td> 
                        <td>{{ $teacher->identification }}</td> 
                        <td>{{ $teacher->position }}</td> 
                        <td>{{ $teacher->entity }}</td> 
                        <td>{{ $teacher->specialty }}</td>     
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <table  class="discentes">
                <thead>
                    <tr style="background-color: #eef8ff">
                        <th style="text-align: center;" colspan="17">Participantes</th>
                    </tr>
                    <tr style="background-color: #eef8ff">
                        <th>No. documento</th>
                        <th>Nombres y apellidos</th>
                        <th>Género</th>
                        <th>Teléfono y/o celular</th>
                        <th>Cargo</th>
                        <th>Sala, No. despacho</th>
                        <th>Corporación, Juzgado</th>
                        <th>Especialidad</th>
                        <th>Ciudad Laboral</th>
                        <th>Circuito</th>
                        <th>Distrito</th>
                        <th>Consejo seccional</th>
                        <th class="cl-dia">Día 1</th>
                        <th class="cl-dia">Día 2</th>
                        <th class="cl-dia">Día 3</th>
                        <th class="cl-dia">Día 4</th>
                        <th class="cl-dia">Día 5</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($discentes as $discente)
                    <tr>
                        <td>{{ $discente->identification }}</td> 
                        <td>{{ $discente->firstname }} {{ $discente->middlefirstname }} {{ $discente->lastname }} {{ $discente->middlelastname }}</td>
                        <td>{{ $discente->gender }}</td> 
                        <td>{{ $discente->phone }}</td> 
                        <td>{{ $discente->position }}</td> 
                        <td>{{ $discente->office }}</td> 
                        <td>{{ $discente->entity }}</td> 
                        <td>{{ $discente->specialty }}</td>    
                        <td>{{ $discente->municipality }}</td> 
                        <td>{{ $discente->circuit }}</td> 
                        <td>{{ $discente->district }}</td>   
                        <td>{{ $discente->sectionalCouncil }}</td> 
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                @endforeach
                </tbody>
            </table> 
        </main>
        <br>
        <section class="firmas">
            <table style="width: 100%;">
                <tr>
                    <td>Coordinador académico:</td>
                    <td>Registro académico:</td>
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
        </section>
    </body>
</html>