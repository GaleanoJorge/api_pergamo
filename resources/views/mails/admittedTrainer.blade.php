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
                        Usted ha sido admitido(a) en la Red de Formadores de la “Escuela Judicial Rodrigo Lara Bonilla”, para el {{$category}}, le damos la bienvenida como formador(a).
                        </p>
                        <br />
                        <p class="p-title-bottom">Reciba un cordial saludo del equipo de la comunidad educativa EJRLB.</p>
                        <br />
                        <br />
                    </div>
                    <img src="https://storage.googleapis.com/ejrlb-prod-src/common/img/logo-plantilla.png" alt="Logo" style="width: 40%;float:right;margin-bottom: 2em;"/>
                </div>
            </td>
        </tr>                    
    </table>
@endsection
                   