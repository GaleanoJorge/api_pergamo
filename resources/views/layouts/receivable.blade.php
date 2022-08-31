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

        td,
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

        <table>
            <tr>
                <td>

                    <img src="https://storage.googleapis.com/detecta/ajz5a-4q5bb.006.png" width="142" height="59"
                        alt="" /></span>
                </td>

                <td>
                    <div><span>DOCUMENTO SOPORTE EN ADQUISICIONES EFECTUADAS A NO OBLIGADOS A FACTURAR &nbsp;</span>
                    </div>
                </td>

            </tr>
        </table>




        <hr />
        <table>
            <tr>
                <td><span style="font-size: 10px">HEALTH &amp; LIFE IPS S.A.S. &nbsp;</span></td>
                <td style="text-aling:" rowspan="2"><span style="font-size: 10px">Consecutivo N°: &nbsp;{{ $consecutive }} &nbsp;</span>
                </td>
            </tr>

            <tr>

                <td><span style="font-size: 10px">NIT: 900900122-7 &nbsp;</span></td>

            </tr>
            <tr>

                <td><span style="font-size: 10px">Av. Cr 68 N° 13-61 &nbsp;</span></td>
                <td rowspan="2"><span style="font-size: 10px">Fecha de documento:
                        &nbsp;{{ $day }}-{{ $month }}-{{ $year }} &nbsp;</span></td>
            </tr>
            <tr>

                <td><span style="font-size: 10px">http://healthlifeips.com/ &nbsp;</span></td>
            </tr>
            <tr>
                <td><span style="font-size: 10px">Bogotá D.C. &nbsp;</span></td>
                <td rowspan="2"><span style="font-size: 10px">Fecha de Vencimiento:
                        &nbsp;{{ $ExpiracyDay }}-{{ $ExpiracyDateMonth }}-{{ $ExpiracyDateYear }} &nbsp;</span></td>
            </tr>
            <tr>
                <td><span style="font-size: 10px">Teléfonos: 300-9121102 Ext. 1030 &nbsp;</span></td>
            </tr>
            <tr>
                <td><a href="mailto:contabilidad@hlips.com.co" target="_blank"><span style="font-size: 10px">contabilidad@hlips.com.co
                            &nbsp;</span></a>
                <td><span> </span></td>
                </td>
            </tr>
        </table>

        <hr />


        <!-- ---------------------------------------- -->



        <table>
            <tr>
                <td>
                    <div><span style="font-size: 10px">Nombres y Apellidos: &nbsp;{{ $full_name }} &nbsp;</span></div>
                </td>
                <td rowspan="3">
                    <div><span style="font-size: 10px">Informacion Bancaria &nbsp;</span></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div><span style="font-size: 10px">Profesión: &nbsp;{{ $role }} &nbsp;</span></div>
                </td>

            </tr>
            <tr>
                <td>
                    <div><span style="font-size: 10px">Identificación: &nbsp;{{ $doc_type }} {{ $doc_number }} &nbsp;</span></div>
                </td>

            </tr>
            <tr>
                <td>
                    <div><span style="font-size: 10px">Dirección: &nbsp;{{ $address }} &nbsp;</span></div>
                </td>
                <td>
                    <div><span style="font-size: 10px">Entidad Bancaria: &nbsp;{{ $bank }} &nbsp;</span></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div><span style="font-size: 10px">Teléfono: &nbsp;{{ $phone }} &nbsp;</span></div>
                </td>
                <td>
                    <div><span style="font-size: 10px">Tipo de Cuenta: &nbsp;{{ $account_type }} &nbsp;</span></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div><span style="font-size: 10px">Correo: &nbsp;{{ $email }} &nbsp;</span></div>
                </td>
                <td>
                    <div><span style="font-size: 10px">Número de Cuenta: &nbsp;{{ $account_number }} &nbsp;</span></div>
                </td>
            </tr>
        </table>
        <hr />

        <!-- ---------------------------------------- -->




        <table>
            <tr>
                <td><span style="font-size: 10px">N° Actividades &nbsp;</span></td>

                <td><span style="font-size: 10px">Detalle &nbsp;</span></td>

                <td><span style="font-size: 10px">Valor Total &nbsp;</span></td>

            </tr>
            @if ($Activities != null)
                @for ($i = 0; $i < count($Activities); $i++)
                    <tr>
                        <td><span style="font-size: 10px">{{ $Activities[$i]['quantity'] }} &nbsp;</span></td>

                        <td><span style="font-size: 10px">{{ $Activities[$i]['name'] }} &nbsp;</span></td>

                        <td><span style="font-size: 10px">{{ $Activities[$i]['amount'] }} &nbsp;</span></td>
                    </tr>
                @endfor
            @endisset
    </table>
    <hr />



    <table class="default">

        <tr>

            <td rowspan="2"><span style="font-size: 10px">Son: &nbsp;{{ $letter_value }} &nbsp;</span></td>
            <td>
                <div style="text-align: left"><span style="font-size: 10px">TOTAL &nbsp;</span></div>
            </td>
            <td>
                <div style="text-align: right"><span style="font-size: 10px">{{ $gross_value }}</span></div>
            </td>

        </tr>
        <tr>
            <td>
                <div style="text-align: left"><span style="font-size: 10px">DTO RETE FTE &nbsp;</span></div>
            </td>
            <td>
                <div style="text-align: right"><span style="font-size: 10px">{{ $source_value }}</span></div>
            </td>
        </tr>
        <tr>
            <td>
                <div style="text-align: left"><span style="font-size: 10px">FIRMA: &nbsp;</span></div>
            </td>
            <td>
                <div style="text-align: left"><span style="font-size: 10px">DTO RETE ICA &nbsp;</span></div>
            </td>
            <td>
                <div style="text-align: right"><span style="font-size: 10px">{{ $ica_value }}</span></div>
            </td>
        </tr>
        <tr>
            <td rowspan="2">
                <div>
                    <img src="data:image/png;base64,{{ $sign }}" width="142" height="59"
                        alt="" /></span>
                </div>
            </td>
            <td>
                <div style="text-align: left"><span style="font-size: 10px">OTROS DTOS &nbsp;</span></div>
            </td>
            <td>
                <div style="text-align: right"><span style="font-size: 10px">$0.00</span></div>
            </td>
        </tr>
        <tr>
            <td>
                <div style="text-align: left"><span style="font-size: 10px">TOTAL A PAGAR &nbsp;</span></div>
            </td>
            <td>
                <div style="text-align: right"><span style="font-size: 10px">{{ $net_value }}</span></div>
            </td>
        </tr>

    </table>


    <hr />


    <!-- ---------------------------------------- -->


    <div><span style="font-size: 10px">Para efectos de la aplicación de la tabla de retención en la fuente establecida en el artículo 383
            del Estatuto Tributario, la
            cual se le aplica a los pagos o abonos en cuenta por concepto de ingresos por honorarios y por
            compensación por servicios personales, “NO he contratado o vinculado más de un trabajador asociado a mi
            actividad económica por al
            menos noventa (90) días continuos o discontinuos”. (Parágrafo 2 art.383 E.T.) &nbsp;</span></div>
    <hr />
    <div><span style="font-size: 10px">Documento generado {{ $generate_date }} por Pérgamo, Usuario: {{ $nombre_completo }} &nbsp;</span>
    </div>


</div>
</body>

</html>
