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

        <div>
            <div >
                <p style="margin-top:0pt; margin-bottom:0pt; line-height:6%; widows:0; orphans:0; font-size:10pt">
                    <span>
                        <img src="https://storage.googleapis.com/detecta/ajz5a-4q5bb.006.png" width="142" height="59" alt="" /></span>
                        
                        <span style="height:0pt; display:block; position:absolute; z-index:-55545">
                            <div style="text-align: center;    margin-left: -350px;">
                                <p>RECIBO DE CAJA</p>
                            </div>
    
                        </span>
                    <span style="height:0pt; display:block; position:absolute; z-index:-65545">
                        <div style="text-align: center;    margin-left: 60px;">
                            <p>HEALTH & LIFE IPS S.A.S </p>
                            <p style="font-size:7px">{{$medical_date["medical_diary"]["campus"]["address"]}}, {{$medical_date["medical_diary"]["campus"]["region"]["name"]}}, {{$medical_date["medical_diary"]["campus"]["name"]}}</p>
                            <p>Nit: 900900122 - 7</p>
                        </div>

                    </span>
                </p>
            </div>
        </div>





        <hr />

        <div>
            <table>

                <tr>
                    <td><span style="font-size: 10px">Consecutivo N°: &nbsp;{{ $medical_date->id }} &nbsp;</span>
                    </td>
                    <td><span style="font-size: 10px">Hora de inicio:
                            &nbsp;{{ $medical_date->start_hour }} &nbsp;</span></td>
                    <td><span style="font-size: 10px">Hora de fin:
                            &nbsp;{{ $medical_date->finish_hour }} &nbsp;</span></td>
                </tr>
            </table>
        </div>

        <hr />


        <!-- ---------------------------------------- -->



        <table>
            <tr>
                <td colspan="2">
                    <div><span style="font-size: 10px">Nombres y Apellidos: &nbsp;{{ $medical_date->patient->nombre_completo }} &nbsp;</span></div>
                </td>
                <td colspan="2">
                    <div><span style="font-size: 10px">Identificación: &nbsp;{{ $medical_date->patient->identification_type->name }} {{ $medical_date->patient->identification }} &nbsp;</span></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div><span style="font-size: 10px">Dirección: &nbsp;{{ $medical_date->patient->residence_address ? $medical_date->patient->residence_address : "--" }} &nbsp;</span></div>
                </td>
                <td>
                    <div><span style="font-size: 10px">Teléfono: &nbsp;{{ $medical_date->patient->phone }} &nbsp;</span></div>
                </td>
                <td>
                    <div><span style="font-size: 10px">Correo: &nbsp;{{ $medical_date->patient->email }} &nbsp;</span></div>
                </td>
                <td>
                    <div><span style="font-size: 10px">Régimen: &nbsp;@if(count($authorization) > 0){{ $authorization[0]['admissions']['regime']['name']}}@endisset &nbsp;</span></div>
                </td>
            </tr>
        </table>
        <hr />

        <!-- ---------------------------------------- -->




        <table>
            <tr>

                <td><span style="font-size: 10px">Código&nbsp;</span></td>

                <td><span style="font-size: 10px">Nombre&nbsp;</span></td>

                <td><span style="font-size: 10px">Concepto&nbsp;</span></td>

                <td><span style="font-size: 10px">Valor Total&nbsp;</span></td>

            </tr>
            <tr>
                <td><span style="font-size: 10px">{{ $medical_date->services_briefcase->manual_price->procedure->code }} - {{ $medical_date->services_briefcase->manual_price->procedure->equivalent }} &nbsp;</span></td>

                <td><span style="font-size: 10px">{{ $medical_date->services_briefcase->manual_price->procedure->name }} &nbsp;</span></td>

                <td><span style="font-size: 10px">{{ $pay_name }} &nbsp;</span></td>

                <td><span style="font-size: 10px">{{ $pay_value }} &nbsp;</span></td>
            </tr>
        </table>
        <hr />



        <table class="default">

            <tr>

                <td rowspan="2"><span style="font-size: 10px">Son: &nbsp;{{ $letter_value }} &nbsp;</span></td>
                <td>
                    <div style="text-align: left"><span style="font-size: 10px">TOTAL &nbsp;</span></div>
                </td>
                <td>
                    <div style="text-align: right"><span style="font-size: 10px">{{ $pay_value }}</span></div>
                </td>

            </tr>
            <tr>
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
                <td colspan="2">
                    <div style="text-align: right"><span style="font-size: 10px">{{ $pay_value }}</span></div>
                </td>
            </tr>

        </table>


        <hr />


        <!-- ---------------------------------------- -->


        <div><span style="font-size: 10px">Documento generado {{ $generate_date }} por Pérgamo, Usuario: {{ $user_name_complete }} &nbsp;</span>
        </div>


    </div>
</body>

</html>