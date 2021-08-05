<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style type="text/css">
    /* Desktop*/
    @media only screen and (max-width: 768px) {
        .table-mail2{
            width: 100% !important;
        }
        .img-logo2{
                width: 35%;
                height: 23px;
                margin-top: 1em;
    margin-left: 7em !important;
            }
    }
            body {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
                padding-top: 0 !important;
                padding-bottom: 0 !important;
                margin: 0 !important;
                width: 100% !important;
                -webkit-text-size-adjust: 100% !important;
                -ms-text-size-adjust: 100% !important;
                -webkit-font-smoothing: antialiased !important;
            }
            .bodyEditable{
                padding: 3em;
                margin-top: 0;
            }
            .table-mail{
            width: 80%;
        }
        .table-mail2{
            width: 80%;
        }
            .p-title-bottom{
                font-weight: 700;
                color: #002775;
                font-family: 'Montserrat', sans-serif;
            }
            .tableContent img {
                border: 0 !important;
                display: block !important;
                outline: none !important;
            }
    .btn-a{ 
                color: #ffffff !important;
    font-weight: 700;
    padding: 0.5em;
    border-radius: 5px;
    background-color: #f40012;
    font-family: 'Montserrat', sans-serif;
    }
            
            .bodyEditable{
                margin-top: 3em;
            }
            p,
            h1,
            h2,
            ul,
            ol,
            li,
            div {
                color: #616160;
                margin: 0;
                padding: 0;
                font-family: 'Montserrat', sans-serif;
            }
            h1,
            h2 {
                margin-bottom: 1em;
                font-weight: bold;
                font-family: 'Montserrat', sans-serif;
                background: transparent !important;
                border: none !important;
            }
                
            .contentEditable{
                background-color: #002775;
                padding-top: 2em;
                padding-left: 2em;
                padding-right: 2em;
                padding-bottom: 2em;
                border-bottom: 8px solid #ffc900;
                display: flex;
    align-items: center !important;
    justify-content: space-between !important;
            }
            .img-logo1 {
                width: 35%;
            }
            .img-logo2{
                width: 35%;
                height: 30px;
                margin-top: 1.5em;
    margin-left: 13em;
            }
            .contentEditable h2.big,
            .contentEditable h1.big {
                font-size: 26px !important;
            }
            .contentEditable h2.bigger,
            .contentEditable h1.bigger {
                font-size: 37px !important;
            }
            td,
            table {
                vertical-align: top;
            }
            td.middle {
                vertical-align: middle;
            }
            a.link1 {
                font-size: 13px;
                color: #27a1e5;
                line-height: 24px;
                text-decoration: none;
            }
            a {
                text-decoration: none;
            }
            .link2 {
                color: #ffffff;
                border-top: 10px solid #27a1e5;
                border-bottom: 10px solid #27a1e5;
                border-left: 18px solid #27a1e5;
                border-right: 18px solid #27a1e5;
                border-radius: 3px;
                -moz-border-radius: 3px;
                -webkit-border-radius: 3px;
                background: #27a1e5;
            }
            .link3 {
                color: #555555;
                border: 1px solid #cccccc;
                padding: 10px 18px;
                border-radius: 3px;
                -moz-border-radius: 3px;
                -webkit-border-radius: 3px;
                background: #ffffff;
            }
            .link4 {
                color: #27a1e5;
                line-height: 24px;
            }
            h2,
            h1 {
                line-height: 20px;
            }
            p {
                font-size: 16px;
                line-height: 21px;
                color: #616160;
            }
            .contentEditable li {
            }
            .appart p {
            }
            .bgItem {
                background: #ffffff;
            }
            .bgBody {
                background: #ffffff;
            }
            img {
                outline: none;
                text-decoration: none;
                -ms-interpolation-mode: bicubic;
                width: auto;
                max-width: 100%;
                clear: both;
                display: block;
                float: none;
            }
        </style>
   <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
   <script type="colorScheme" class="swatch active"> 
      {    "name":"Default",    "bgBody":"ffffff",    "link":"27A1E5",    "color":"AAAAAA",    "bgItem":"ffffff",    "title":"444444"} 
    </script> 
</head>
<body
        paddingwidth="0"
        paddingheight="0"
        bgcolor="#FFF"
        style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;"
        offset="0"
        toppadding="0"
        leftpadding="0"
    >
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableContent bgBody" align="center" style="font-family: Helvetica, sans-serif;">
            <!-- =============== START BODY =============== -->
            <div class="movableContent">
                <table width="650" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td height="40"></td>
                    </tr>
                    <tr>
                        <td>
                        <div class="contentEditableContainer contentImageEditable">
                                <div class="contentEditable" style="justify-content: space-between; align-items: center;">
                                    <img src="https://storage.googleapis.com/ejrlb-prod-src/common/img/logo.png" alt="Logo" class="img-logo1"/>
                                    <img src="https://storage.googleapis.com/ejrlb-prod-src/common/img/logo-escuela.png" alt="Logo" class="img-logo2"/>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="movableContent">
            <table width="650" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #616160;">
                            @yield('content')
                        </td>
                    </tr>
            </table>
            </div>
        </table>
    </body>
</html>
