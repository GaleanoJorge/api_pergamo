@component('mail::message')

                            <table width="480" border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="contentEditableContainer contentTextEditable">
                                            <div class="bodyEditable" style="text-align: justify;">
                                            <h2 style="font-size:25px;text-align: center;">SGA - EJRLB </h2>
                                                <h1 style="font-size:15px;text-align: center; color:#002775"></h1>
                                                <br />
                                                <p style="">
                                                Usted ha recibido este email porque se solicitó un restablecimiento de contraseña para su cuenta.
                                                </p>
                                                <br />
                                                <div class="bodyEditable" style="margin: 0 auto; text-align: center;">
                                                {{-- Action Button --}}
@isset($actionText)
@component('mail::button', ['url' => $actionUrl])
{{ $actionText }}
@endcomponent
@endisset
                                                </div>
                                                <br />
                                                <p style="">
                                                Si no realizó esta petición, puede ignorar este correo.
                                                </p>
                                                <p style="color:#002775;">
                                                ¡Saludos!
                                                </p>
                                                <br />
                                                <hr class="line-survey">
                                                <br>
                                                <p style="">
                                                Si tiene problemas abriendo este enlace, por favor copie y pegue este link en su navegador:
                                                </p>
                                                <br>
                                                <p style="">
                                                {{$actionUrl}}
                                                </p>
                                                <br />
                                                <br />
                                                <br />
                                                <img src="{{asset('images/logo-plantilla.png')}}" alt="Logo" style="float: right; width: 40%"/>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="24"></td>
                                </tr>
                            </table>
@endcomponent
