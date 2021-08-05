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
                                                Ha sido admitido(a) en el curso
                                                </p>
                                                <p style="">
                                                {{$curso}}
                                                </p>
                                                <p style="">
                                                como discente de la “Escuela Judicial Rodrigo Lara Bonilla”. Bienvenido(a).
                                                </p>
                                                <br />
                                                <p style="">
                                                Para acceder a sus cursos por favor utilice el siguiente enlace: <a href="{{$host}}">{{$host}}</a>
                                                </p>
                                                <br />
                                                <p class="p-title-bottom">Reciba un cordial saludo del equipo de la comunidad educativa EJRLB.</p>
                                                <br />
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