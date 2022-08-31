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

td, th {
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
                    <div><span>{{ $billing_type }} &nbsp;</span></div>

                    @if ($consecutive != null)
                        <div><span>CONSECUTIVO: {{ $consecutive }} &nbsp;</span>
                        </div>
                        <div><span>RESOLUCIÓN: {{ $billing_resolution }} &nbsp;</span>
                        </div>
                    @endisset
            </td>

        </tr>
    </table>

    <hr />
    <table>
        <tr>
            <td><span>HEALTH &amp; LIFE IPS S.A.S. &nbsp;</span></td>
            <td style="text-aling:" rowspan="2"><span>Doctor: {{ $assistance_name }} &nbsp;</span></td>
        </tr>

        <tr>

            <td><span>NIT: 900900122-7 &nbsp;</span></td>

        </tr>
        <tr>

            <td><span>Av. Cr 68 N° 13-61 &nbsp;</span></td>
            <td rowspan="2"><span>Fecha inicial: {{ $first_date }} &nbsp;</span></td>
        </tr>
        <tr>

            <td><span>http://healthlifeips.com/ &nbsp;</span></td>
        </tr>
        <tr>
            <td><span>Bogotá D.C. &nbsp;</span></td>
            <td rowspan="2"><span>Fecha final: {{ $last_date }}&nbsp;</span></td>
        </tr>
        <tr>
            <td><span>Teléfonos: 300-9121102 Ext. 1030 &nbsp;</span></td>
        </tr>
        <tr>
            <td><a href="mailto:contabilidad@hlips.com.co" target="_blank"><span>contabilidad@hlips.com.co
                        &nbsp;</span></a>
                        <td><span> </span></td>
            </td>
        </tr>
    </table>

    <hr />


    <!-- ---------------------------------------- -->








    <!-- ---------------------------------------- -->







    <div><span>Plan: {{ $program_name }} &nbsp;</span></div>

    <div><span>Contrato: {{ $contract_name }} &nbsp;</span></div>


    <hr />


    <!-- ---------------------------------------- -->


    <div><span>Nombres y Apellidos: {{ $patient_name }} &nbsp;</span></div>


    <div><span>Identificación: {{ $identification }} &nbsp;</span></div>

    <div><span>Dirección: {{ $patient_address }} &nbsp;</span></div>

    <div><span>Teléfono: {{ $patient_phone }} &nbsp;</span></div>


    <hr />


    <!-- ---------------------------------------- -->



    <table>
        <tr>
            <td><span>CODIGO &nbsp;</span></td>

            <td><span>CONCEPTO &nbsp;</span></td>

            <td><span>UND. &nbsp;</span></td>

            <td><span>VAL. UND. &nbsp;</span></td>

            <td><span>PRECIO &nbsp;</span></td>

        </tr>
        @if ($selected_procedures != null)
            @for ($i = 0; $i < count($selected_procedures); $i++)
                <tr>
                    <td><span>{{ $selected_procedures[$i]['code'] }} &nbsp;</span></td>

                    <td><span>{{ $selected_procedures[$i]['service'] }} &nbsp;</span></td>

                    <td><span>{{ $selected_procedures[$i]['amount'] }} &nbsp;</span></td>

                    <td><span>{{ $selected_procedures[$i]['val_und'] }} &nbsp;</span></td>

                    <td><span>{{ $selected_procedures[$i]['value'] }} &nbsp;</span></td>
                </tr>
            @endfor
        @endisset
</table>










<hr />

<table class="default">

    <tr>

        <td rowspan="3"><span>Son: &nbsp;{{ $letter_value }} &nbsp;</span></td>
        <td>
            <div style="text-align: left"><span>TOTAL &nbsp;</span></div>
        </td>
        <td>
            <div style="text-align: right"><span>{{ $currency_value }}</span></div>
        </td>

    </tr>
    <tr>
        <td>
            <div style="text-align: left"><span>DESCUENTO &nbsp;</span></div>
        </td>
        <td>
            <div style="text-align: right"><span>$0.00</span></div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align: left"><span>TOTAL A PAGAR &nbsp;</span></div>
        </td>
        <td>
            <div style="text-align: right"><span>{{ $currency_value }}</span></div>
        </td>
    </tr>
    {{-- <tr>
        <!-- ---------------------------------------- -->

        <td><span>TOTAL &nbsp;</span></td>

        <td><span>{{ $currency_value }}</span></td>

    </tr>
    <tr>
        <!-- ---------------------------------------- -->


        <td><span>TOTAL A PAGAR &nbsp;</span></td>

        <td><span>{{ $currency_value }}</span></td>

        <!-- ---------------------------------------- -->
    </tr>
    <tr>

        <td><span>Son: &nbsp;</span></td>

        <td><span>{{ $letter_value }} &nbsp;</span></td>

    </tr> --}}

    <!-- ---------------------------------------- -->

</table>

<hr />

<div><span>Documento generado {{ $generate_date }} por Pérgamo &nbsp;</span></div>

</div>
</body>

</html>
