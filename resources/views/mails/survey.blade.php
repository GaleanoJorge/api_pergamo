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
                                                <h1 style="font-size:15px; color:#002775">{{ $nombre }}</h1>
                                                <br />
                                                <p style="">
                                                Si recibió este email es porque se le ha asignado la siguiente encuesta:
                                                </p>
                                                <hr class="line-survey">
                                                <p class="p-title-bottom">Fecha: {{$fecha}}</p>
                                                <br />
                                                <div class="bodyEditable" style="margin: 0 auto; text-align: center;">
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