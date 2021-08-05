@extends('layouts.app')

@section('content')
                            <table width="650" border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="contentEditableContainer contentTextEditable">
                                            <div class="bodyEditable" style="text-align: center;">
                                            <h2 style="font-size:25px;">Estimado(a) </h2>
                                                <h1 style="font-size:15px; color:#002775">{{ $name }}</h1>
                                                <br />
                                                <p style="">
                                                La “Escuela Judicial Rodrigo Lara Bonilla”, le informa que, por motivo de disponibilidad de cupos, usted no ha sido asignado(a) como formador(a) para el {{$category}}.
                                                </p>
                                                <br />
                                                <br />
                                                <img src="https://storage.googleapis.com/ejrlb-prod-src/common/img/logo-plantilla.png" alt="Logo" style="width: 40%;margin:auto"/>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="24"></td>
                                </tr>
                            </table>
@endsection