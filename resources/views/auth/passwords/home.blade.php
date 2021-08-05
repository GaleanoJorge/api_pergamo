@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Restablecer Contraseña') }}</div>

                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        Se actualizó su contraseña exitosamente, vuelve a la app
                        para iniciar sesión nuevamente.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection