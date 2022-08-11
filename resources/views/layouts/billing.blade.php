<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <!-- {{-- cabecera --}} -->
    <div>
        <img src="https://storage.googleapis.com/detecta/ajz5a-4q5bb.006.png" width="142" height="59"
            alt="" /></span>
        <h3>
            {{ $billing_type }}
        </h3>
    </div>

    <!-- {{-- INFO --}} -->
    <div>
        <div>
            Health & Life IPS S.A.S.
        </div>
        <div>
            NIT 900900122-7
        </div>
        <div>
            Av. Cra. 30 No. 77 - 40
        </div>
        <div>
            https://healthlifeips.com/
        </div>
        <div>
            contabilidad@hlips.com.co
        </div>
        <div>
            Teléfono(s) 3218292003 - 3115942 BOGOTÁ, D.C
        </div>
    </div>


    <!-- {{-- cliente --}} -->
    <div>
        <div>
            CLIENTE
        </div>
        <div>
            {{ $patient_name }}
        </div>
        <div>
            {{ $identification }}
        </div>
        <div>
            {{ $patient_address }}
        </div>
        <div>
            BOGOTÁ, D.C. ,COLOMBIA
        </div>
        <div>
            Teléfono {{ $patient_phone }}
        </div>
    </div>

    <!-- {{-- paciente --}} -->
    <div>
        <div>
            paciente: {{ $patient_name }}
        </div>
        <div>
            Identificación: {{ $identification }}
        </div>
        <div>
            Doctor: DANIEL TRIANA CASTRO
        </div>
        <div>
            Fecha inicial:
        </div>
        <div>
            Fecha fina:
        </div>
        <div>
            Plan {{ $program_name }}
        </div>
        <div>
            Contrato {{ $contract_name }}
        </div>
    </div>

    <!-- {{-- procedimientos --}} -->
    <div>
        <div>
            CODIGO
        </div>
        <div>
            CONCEPTO
        </div>
        <div>
            UND
        </div>
        <div>
            UM
        </div>
        <div>
            2,300.00
        </div>
        <div>
            % DTO.
        </div>
        <div>
            DESCUENTO
        </div>
        <div>
            BASE
        </div>
        <div>
            %IVA
        </div>
        <div>
            IVA
        </div>
    </div>

    <!-- {{-- resultados --}} -->
    <div>
        <div>
            SON DOS MIL PESOS
        </div>
        <div>
            SUBTOTAL
        </div>
        <div>
            IVA
        </div>
        <div>
            TOTAL
        </div>
    </div>



</body>

</html>
