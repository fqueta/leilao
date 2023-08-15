<div class="container">
    <div class="mx-auto col-md-5">
        <div class="card mt-5 mb-5">
            <div class="card-header">
                {{__('Complete seu cadastro')}}
            </div>
            <div class="card-body">
                {{-- {{ __('adminlte::adminlte.verify_check_your_email') }}
                {{ __('adminlte::adminlte.verify_if_not_recieved') }}, --}}
                <p>{{__('Antes de continuar, por favor verifique seu email com o link de confirmação. caso não tenha recebido o email,')}}</p>

                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                        {{ __('adminlte::adminlte.verify_request_another') }}
                    </button>.
                </form>

            </div>
            <div class="card-footer text-muted">
                <a href="{{route('index')}}" class="btn btn-outline-primary"> <i class="fas fa-chevron-left"></i> Voltar</a>
            </div>
        </div>
    </div>

</div>
{{-- @extends('adminlte::auth.auth-page', ['auth_type' => 'login']) --}}

{{-- @section('auth_header', __('adminlte::adminlte.verify_message'))

@section('auth_body')

    @if(session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('adminlte::adminlte.verify_email_sent') }}
        </div>
    @endif

    {{ __('adminlte::adminlte.verify_check_your_email') }}
    {{ __('adminlte::adminlte.verify_if_not_recieved') }},

    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
            {{ __('adminlte::adminlte.verify_request_another') }}
        </button>.
    </form>

@stop --}}
