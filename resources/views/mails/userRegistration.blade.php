@extends('layouts.app')

@section('content')
                            <table width="650" border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="contentEditableContainer contentTextEditable">
                                            <div class="bodyEditable" style="text-align: justify;">
                                            <h2 style="font-size:25px;">Estimado(a) </h2>
                                                <h1 style="font-size:15px; color:#002775">{{ $name }}</h1>
                                                <br />
                                                <p style="">
                                                Usted se ha registrado satisfactoriamente a la plataforma de la “Escuela Judicial Rodrigo Lara Bonilla”.
                                                </p>
                                                <br />
                                                <p style="">
                                                    Sus datos de acceso a la plataforma son:
                                                </p>
                                                <br />
                                                <div style="display:flex">
                                                   <h2 style="font-size:20px;margin-right:5px;"> Usuario:</h2> {{ $user }}
                                                    </div>
                                                    <div style="display:flex">
                                                <h2 style="font-size:20px;margin-right:5px;"> Clave: </h2> {{ $password }}
                                                    </div>
                                                <br />
                                                <div class="bodyEditable" style="margin: 0 auto; text-align: center;">
                                                    <a href="{{ $host }}/public/register-confirmation/{{ $id }}" class="btn-a">
                                                        Verificar cuenta
                                                    </a>
                                                </div>
                                                <br />
                                                <br />
                                                <br />
                                                <p style="">
                                                    Para ingresar al sistema por favor utilice la dirección electrónica {{ $host }}
                                                </p>
                                                <br />
                                                <br />
                                                <br />
                                                <img src="https://storage.googleapis.com/ejrlb-prod-src/common/img/logo-plantilla.png" alt="Logo" style="float: right; width: 40%"/>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="24"></td>
                                </tr>
                            </table>
@endsection