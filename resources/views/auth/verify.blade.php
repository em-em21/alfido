@extends('layouts.auth')

@section('auth-title', 'Подтверждение почты')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white verify-cont">
                <div class="card-header">{{ __('Подтвердите ваш e-mail адрес') }}</div><br>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Ссылка на подтверждение была отправлена на вашу почту.') }}
                        </div>
                    @endif

                    {{ __('Прежде чем продолжить, пожалуйста, перейдите по ссылке и подтвердите ваш e-mail.') }}<br><br>
                    {{ __('Если вы не получили сообщение') }},<br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="verify-link p-0 m-0 align-baseline">{{ __('кликните по этой ссылке, чтобы отправить заново') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
