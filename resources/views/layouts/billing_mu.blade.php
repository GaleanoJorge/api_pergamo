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
                <td><span style="font-size: 10px">HEALTH &amp; LIFE IPS S.A.S. &nbsp;</span></td>
                {{-- <td style="text-aling:" rowspan="2"><span style="font-size: 10px">Doctor: {{ $assistance_name }}
                    &nbsp;</span></td> --}}
            {{-- </tr>

            <tr> --}}

                <td><span style="font-size: 10px">NIT: 900900122-7 &nbsp;</span></td>

            </tr>
            <tr>

                <td><span style="font-size: 10px">Av. Cr 68 N° 13-61 &nbsp;</span></td>
                {{-- <td rowspan="2"><span style="font-size: 10px">Fecha inicial: {{ $first_date }} &nbsp;</span></td> --}}
            {{-- </tr>
            <tr> --}}

                <td><span style="font-size: 10px">http://healthlifeips.com/ &nbsp;</span></td>
            </tr>
            <tr>
                <td><span style="font-size: 10px">Bogotá D.C. &nbsp;</span></td>
                {{-- <td rowspan="2"><span style="font-size: 10px">Fecha final: {{ $last_date }}&nbsp;</span></td> --}}
            {{-- </tr>
            <tr> --}}
                <td><span style="font-size: 10px">Teléfonos: 300-9121102 Ext. 1030 &nbsp;</span></td>
            </tr>
            <tr>
                <td><a href="mailto:contabilidad@hlips.com.co" target="_blank"><span
                            style="font-size: 10px">contabilidad@hlips.com.co
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
                    <div><span style="font-size: 10px">Contrato: {{ $contract_name }} &nbsp;</span></div>
                </td>
            </tr>
        </table>


        <hr />

        <!-- ---------------------------------------- -->

        @if ($patients != null)
            @for ($i = 0; $i < count($patients); $i++)
                

                <table>
                    <tr>
                        <td>
                            <div><span style="font-size: 10px">Nombres y Apellidos: {{ $patients[$i]['nombre_completo'] }} &nbsp;</span>
                            </div>
                        </td>
                    {{-- </tr>
                    <tr> --}}
                        <td>
                            <div><span style="font-size: 10px">Identificación: {{ $patients[$i]['document'] }} &nbsp;</span></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div><span style="font-size: 10px">Dirección: {{ $patients[$i]['residence_address'] }} &nbsp;</span></div>
                        </td>
                    {{-- </tr>
                    <tr> --}}
                        <td>
                            <div><span style="font-size: 10px">Teléfono: {{ $patients[$i]['phone'] }} &nbsp;</span></div>
                        </td>
                    </tr>
                </table>


                {{-- <hr /> --}}
                <p> </p>

                <!-- ---------------------------------------- -->


                <table>
                    <tr>
                        <td>
                            <div><span style="font-size: 10px">Plan: {{ $patients[$i]['program'] }} &nbsp;</span></div>
                        </td>
                    </tr>
                </table>


                {{-- <hr /> --}}
                <p> </p>


                <!-- ---------------------------------------- -->

                <table>
                    <tr>
                        <td>
                            <div><span>AUTORIZACIONES&nbsp;</span></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div><span>{{ array_key_exists($patients[$i]['document'], $auths_numbers) ? $auths_numbers[$patients[$i]['document']] : "" }}&nbsp;</span></div>
                        </td>
                    </tr>
                </table>




                {{-- <hr /> --}}
                <p> </p>


                <!-- ---------------------------------------- -->



                <table>
                    <tr>
                        <td><span style="font-size: 10px">CODIGO &nbsp;</span></td>

                        <td><span style="font-size: 10px">CONCEPTO &nbsp;</span></td>

                        <td><span style="font-size: 10px">UND. &nbsp;</span></td>

                        <td><span style="font-size: 10px">VAL. UND. &nbsp;</span></td>

                        <td><span style="font-size: 10px">PRECIO &nbsp;</span></td>

                    </tr>
                    @if ($procedures != null)
                        @for ($j = 0; $j < count($procedures); $j++)
                            @if ($procedures[$j]['document'] == $patients[$i]['document'])
                                <tr>
                                    <td><span style="font-size: 10px">{{ $procedures[$j]['code'] }} &nbsp;</span>
                                    </td>

                                    <td><span style="font-size: 10px">{{ $procedures[$j]['service'] }}
                                            &nbsp;</span></td>

                                    <td><span style="font-size: 10px">{{ $procedures[$j]['quantity'] }}
                                            &nbsp;</span></td>

                                    <td><span style="font-size: 10px; text-align: right">{{ $procedures[$j]['value_und'] }}
                                            &nbsp;</span></td>

                                    <td><span style="font-size: 10px; text-align: right">{{ $procedures[$j]['value_tot'] }} &nbsp;</span>
                                    </td>
                                </tr>
                            @endisset
                        @endfor
                    @endisset
            </table>










            <hr />
        @endfor
    @endisset




    <table class="default">

        <tr>

            <td rowspan="4"><span style="font-size: 10px">Son: &nbsp;{{ $totalin_letters }} &nbsp;</span>
            </td>
            <td>
                <div style="text-align: left"><span style="font-size: 10px">TOTAL &nbsp;</span></div>
            </td>
            <td>
                <div style="text-align: right"><span style="font-size: 10px">{{ $total_value_letters }}</span>
                </div>
            </td>

        </tr>
        <tr>
            <td>
                <div style="text-align: left"><span style="font-size: 10px">COPAGOS &nbsp;</span></div>
            </td>
            <td>
                <div style="text-align: right"><span style="font-size: 10px">{{ $copay_value_letters }}</span>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div style="text-align: left"><span style="font-size: 10px">CUOTAS MODERADORAS &nbsp;</span>
                </div>
            </td>
            <td>
                <div style="text-align: right"><span style="font-size: 10px">{{ $mod_value_letters }}</span>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div style="text-align: left"><span style="font-size: 10px">TOTAL A PAGAR &nbsp;</span></div>
            </td>
            <td>
                <div style="text-align: right"><span style="font-size: 10px">{{ $total_letters }}</span></div>
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

    <div><span style="font-size: 10px">Documento generado {{ $generate_date }} por Pérgamo &nbsp;</span></div>

</div>
</body>

</html>
