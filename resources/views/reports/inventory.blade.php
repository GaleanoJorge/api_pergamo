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
            <div>
                <p style="margin-top:0pt; margin-bottom:0pt; line-height:6%; widows:0; orphans:0; font-size:10pt">
                    <span>
                        <img src="https://storage.googleapis.com/detecta/ajz5a-4q5bb.006.png" width="142" height="59"
                            alt="" />
                    </span>

                    <span style="height:0pt; display:block; position:absolute;">
                        <div style="text-align: center;  margin-left: 100px;">
                            <p>HEALTH & LIFE IPS S.A.S </p>
                            <p>Avenida Cra 68 No 13-61, Bogotá. Sede Montevideo </p>
                            <p>Nit: 900900122 - 7</p>
                        </div>
                    </span>
                </p>
            </div>
        </div>

        <hr />


        <div>

             
            @if ($type == 1)

            @if (count($pharmacy) > 0)

                <div>
                    <div style="text-align: center; font-size: 10px">
                        <p><b>INVENTARIO MEDICAMENTOS </b></p>
                    </div>
                </div>

                <table>
                    <tr>
                        <td>
                            <div><span style="font-size: 9px"><b>Cód. Comercial</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Cód. Génerico</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Producto - Producto Genérico</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Fabricante</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Invima</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Cód. consecutivo</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Cant. inicial</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Cant. actual</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Valor</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Valor IVA</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Lote</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Fecha vencimiento</b></span></div>
                        </td>
                    </tr>

                    @foreach ($pharmacy as $ph)
                        <tr>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['billing_stock'])) {{$ph['billing_stock']['product']['id']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['billing_stock'])) {{$ph['billing_stock']['product']['product_generic']['id']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['billing_stock'])) {{$ph['billing_stock']['product']['name']}} - {{$ph['billing_stock']['product']['product_generic']['description']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['billing_stock'])) {{$ph['billing_stock']['product']['factory']['name']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['billing_stock'])) {{$ph['billing_stock']['product']['invima_registration']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['billing_stock'])) {{$ph['billing_stock']['product']['code_cum']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['amount_total'])) {{$ph['amount_total']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['actual_amount'])) {{$ph['actual_amount']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['actual_amount'])) {{$ph['billing_stock']['amount_unit']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['actual_amount'])) {{$ph['billing_stock']['iva']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['lot'])) {{$ph['lot']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['expiration_date'])) {{$ph['expiration_date']}} @endisset </span></div>
                            </td>
                        </tr>
                    @endforeach

                </table>

                <hr />
            @endisset
            @endisset
        </div>



        <div>
            @if ($type != 1)

            @if (count($pharmacy) > 0)

                <div>
                    <div style="text-align: center; font-size: 8px">
                        <p><b>INVENTARIO INSUMOS </b></p>
                    </div>
                </div>

                <table>
                    <tr>
                        <td>
                            <div><span style="font-size: 9px"><b>Cód. Comercial</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Cód. Génerico</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Insumo - Insumo Genérico</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Fabricante</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Invima</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Cant. inicial</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Cant. actual</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Valor</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Valor IVA</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Lote</b></span></div>
                        </td>
                        <td>
                            <div><span style="font-size: 9px"><b>Fecha vencimiento</b></span></div>
                        </td>
                    </tr>

                    @foreach ($pharmacy as $ph)
                        <tr>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['billing_stock'])) {{$ph['billing_stock']['product_supplies_com']['id']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['billing_stock'])) {{$ph['billing_stock']['product_supplies_com']['product_supplies_id']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['billing_stock'])) {{$ph['billing_stock']['product_supplies_com']['name']}} - {{$ph['billing_stock']['product_supplies_com']['product_supplies']['description']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['billing_stock'])) {{$ph['billing_stock']['product_supplies_com']['factory']['name']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['billing_stock'])) {{$ph['billing_stock']['product_supplies_com']['invima_registration']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['amount_total'])) {{$ph['amount_total']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['actual_amount'])) {{$ph['actual_amount']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['actual_amount'])) {{$ph['billing_stock']['amount_unit']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['actual_amount'])) {{$ph['billing_stock']['iva']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['lot'])) {{$ph['lot']}} @endisset </span></div>
                            </td>
                            <td>
                                <div><span style="font-size: 8px">@if(isset($ph['expiration_date'])) {{$ph['expiration_date']}} @endisset </span></div>
                            </td>
                        </tr>
                    @endforeach

                </table>

                <hr />
            @endisset
            @endisset
        </div>




</body>

</html>
