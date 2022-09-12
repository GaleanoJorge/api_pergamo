<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta name="generator" content="Aspose.Words for .NET 17.1.0.0" />
    <title></title>

    <STYLE>
        .tablehc {
            margin-top: 5px;
            border-collapse: collapse;
            width: 100%;
        }

        .tablehc td,
        th {
            border: 1px solid #ccc;
            text-align: left;
            padding: 1px;
        }

        .tablehc tr:nth-child(even) {
            background-color: #eeecec;
        }
    </STYLE>
</head>

<body>

    <div>
        <div style="-aw-headerfooter-type:header-primary">
            <p style="margin-top:0pt; margin-bottom:0pt; line-height:6%; widows:0; orphans:0; font-size:10pt">
                <span style="height:0pt; display:block; position:absolute; z-index:-65546">
                    <img src="https://storage.googleapis.com/detecta/ajz5a-4q5bb.006.png" width="142" height="59" alt="" style="margin-top:-15.15pt; margin-left:-21pt; -aw-left-pos:15pt; -aw-rel-hpos:page; -aw-rel-vpos:page; -aw-top-pos:20.25pt; -aw-wrap-type:none; position:absolute" /></span>
                <span style="height:0pt; display:block; position:absolute; z-index:-65543">
                    <div style="float:right;">
                        <p>No de Historia Clínica: {{$chrecord[0]['admissions']['patients']['identification']}}</p>
                        <p>Fecha de registro: {{$chrecord[0]['date_attention']}}</p>
                        <p>Folio: {{$chrecord[0]['id']}}</p>
                    </div>
                </span><span style="height:0pt; display:block; position:absolute; z-index:-65545">
                    <div style="text-align: center;    margin-left: 60px;">
                        <p>HEALTH & LIFE IPS S.A.S </p>
                        <p>Avenida Cra 68 No 13-61, Bogotá. Sede Montevideo </p>
                        <p>Nit: 900900122 - 7</p>
                    </div>

                </span><span style="font-family:Tahoma">&#xa0;</span>
            </p>
        </div>
    </div>

<!-- Encabezado-->
<div>
        
    <h2 style="margin-top:130px; margin-bottom:1.9pt; widows:0; orphans:0; font-size:12pt; ;
            padding: 0.8em;font-family:Calibri;color: rgb(0, 0, 0);text-align: center;">CERTIFICACIÓN PACIENTE EN CONDICIÓN DE ABANDONO SOCIAL 
    </h2>

    <p style="margin-top:40pt; margin-left:14pt; margin-right:14pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:10pt">
        <b>@if(isset($ChSwSupportNetwork[0]['created_at'])) FECHA DE DILIGENCIAMIENTO: </b>{{substr($ChSwSupportNetwork[0]['created_at'],0,10) }} @endisset </span>
    </p>
    <p style="margin-top:40pt; margin-left:14pt; margin-right:14pt; margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0">
        <span style="font-family:Calibri; font-size:10pt">
        <b> HEALTH & LIFE IPS INFORMA</span>
    </p>

    @if(isset($chrecord[0]['admissions']['patients']['firstname'])  &&
    isset($chrecord[0]['admissions']['patients']['lastname'])  &&
    isset($chrecord[0]['admissions']['patients']['identification_type']['name']) && isset($chrecord[0]['admissions']['patients']['identification']) && isset($chrecord[0]['admissions']['patients']['age']) && 
    isset($ChSwSupportNetwork[0]['created_at']) && isset($ChSwSupportNetwork[0]['ch_sw_entity']['name']) &&  isset($ChSwSupportNetwork[0]['observation']))


    <p style="margin-top:40pt; margin-left:14pt; margin-right:14pt;margin-bottom:0pt; line-height:9.6pt; widows:0; orphans:0; text-align: justify">
        <span style="font-family:Calibri; font-size:10pt; line-height:20pt">
            Que el paciente <b>{{$chrecord[0]['admissions']['patients']['firstname']}} {{$chrecord[0]['admissions']['patients']['middlefirstname']}} </b>
            <b>{{$chrecord[0]['admissions']['patients']['lastname']}} {{$chrecord[0]['admissions']['patients']['middlelastname']}} </b> identificado con {{$chrecord[0]['admissions']['patients']['identification_type']['name']}}:
            <b>{{$chrecord[0]['admissions']['patients']['identification']}} </b> de {{$chrecord[0]['admissions']['patients']['municipality']['name']}}, quien actualmente cuenta con <b> {{substr($chrecord[0]['admissions']['patients']['age'],0,8)}}</b>
            de edad. Se encuentra en condición de abandono socio familiar, dicha información es
            corroborada por el equipo de trabajo social quienes realizaron seguimiento desde la
            fecha <b>{{substr($chrecord[0]['created_at'],0,10)}}</b>, y se reporta ante <b>{{$ChSwSupportNetwork[0]['ch_sw_entity']['name']}}</b>
            se evidencia la siguiente condición social: <br/>
            {{$ChSwSupportNetwork[0]['observation']}}
        </span>
    </p>
    @endisset
    <br/>
</div>

<!-- Firma -->
<div style="display: flex">
    <div style="width: 100%">
        <hr/>
        <span style="font-family:Calibri; margin-left:14pt; margin-right:14pt; font-size:12px"> <b>FIRMA PROFESIONAL TRABAJO SOCIAL </b> </span>
    
        @if($firm != null)
            <p style="margin-top:15pt; margin-left:14pt; margin-right:14pt; margin-bottom:0pt;">
                <span style="height:0pt;">
            
            @if(isset($firm))
                <img src="data:image/png;base64,{{$firm}}" width="250" height="100" alt="" style=""/></span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>

            @endisset
            </p>
            @endisset
            <p style="margin-top:8.95pt; margin-left:14pt; margin-right:14pt; margin-bottom:0pt; widows:0; orphans:0; font-size:10pt">
                <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">{{$chrecord[0]['user']['firstname']}} {{$chrecord[0]['user']['middlefirstname']}} {{$chrecord[0]['user']['lastname']}}  {{$chrecord[0]['user']['middlelastname']}}</span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            <p style="margin-top:8.95pt; margin-left:14pt; margin-right:14pt; margin-bottom:0pt; widows:0; orphans:0; font-size:10pt">
                <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">{{$chrecord[0]['user']['user_role'][0]['role']['name']}}</span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>
            @if(count($chrecord[0]['user']['assistance']) > 0)
            <p style="margin-top:8.95pt; margin-left:14pt; margin-right:14pt; margin-bottom:0pt; widows:0; orphans:0; font-size:10pt">
                <span style="font-family:Calibri; font-weight:bold; color:#000000; background-color:#ffffff">RM/TP: {{$chrecord[0]['user']['assistance'][0]['medical_record']}}</span>
                <span style="width:171.33pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:257.05pt">&#xa0;</span>
            </p>            
        @endisset   
    </div>
    
    
</div>

</body>

</html>
