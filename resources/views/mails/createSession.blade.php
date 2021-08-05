@extends('layouts.app')

@section('content')
<table width="650" border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="contentEditableContainer contentTextEditable">
                                            <div class="bodyEditable">
                                            <h2 style="font-size:25px;text-align: center;">Estimado(a) </h2>
                                            <h1 style="font-size:15px; color:#002775;text-align: center;">{{ $name }}</h1>
                                                <br />
                                                <p style="">
                                                Se ha programado una sesión remota:
                                                </p>
                                                <p class="p-title-bottom">Hora: {{$hora}} Fecha: {{$fecha}}</p>
                                                <hr class="line-survey">
                                                <br />
                                                <p style="color:#616160">En el siguiente enlace encontrará la reunión: <p>
                                                <div class="bodyEditable" style="margin: 0 auto;">
                                                    <a href="{{$url}}">{{$url}}</a>
                                                </div>
                                                <br />
                                                <img src="https://storage.googleapis.com/ejrlb-prod-src/common/img/logo-plantilla.png" alt="Logo" style="width: 40%;float:right"/>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="24"></td>
                                </tr>
                            </table>
@endsection