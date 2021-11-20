@extends('layouts.admin')
@section('page-title', 'Настройки | '.config('app.name'))
@section('title', 'Настройки')

@section('admin-content')
<div class="container-fluid">
    <div class="col-md-4 p-3">
        @include('includes.global.alerts')

        <div class="d-flex flex-column p-0">
            <div class="card card-outline card-info">
                <div class="card-body">
                   
					@if(isset($settings))
                        <form method="POST" action="{{ route('settings.update', $settings->id) }}" class="col-md-12 settingsForm">
                            @method('PATCH')
                    @else
                        <form method="POST" action="{{ route('settings.store') }}" class="col-md-12 settingsForm">
                            @method('POST')
                    @endif
                        @csrf

                        <div class="form-group">
                            <label for="wallet">BTC кошелёк</label>
                            <input class="form-control" id="wallet" name="btc_wallet">

                            @if(!empty($settings->btc_wallet))
                                <small class="form-text text-muted">
									Сейчас:
									<span class="ml-1 text-info spanVal">
										{{$settings->btc_wallet}}
									</span>
								</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone">Номер телефона</label>
                            <input class="form-control" id="phone" name="phone">

                            @if(!empty($settings->phone))
                                <small class="form-text text-muted">
									Сейчас:
									<span class="ml-1 text-info spanVal">
										{{$settings->phone}}
									</span>
								</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input class="form-control" id="email" name="email">

                            <small class="form-text text-muted">
								Сейчас:
								<span class="ml-1 text-info spanVal">
									{{ $settings->email ?? config('app.email') }}
								</span>
							</small>
                        </div>

                        <div class="form-group">
                            <label for="whatsapp">Whatsapp</label>
                            <input class="form-control" id="whatsapp" name="whatsapp">

                            @if(!empty($settings->whatsapp))
                                <small class="form-text text-muted">
									Сейчас:
									<span class="ml-1 text-info spanVal">
										{{$settings->whatsapp}}
									</span>
								</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="qiwi">Qiwi ссылка</label>
                            <input class="form-control" id="qiwi" name="qiwi_link">

                            @if(!empty($settings->qiwi_link))
                                <small class="form-text text-muted">
									Сейчас:
									<span class="ml-1 text-info spanVal">
										{{$settings->qiwi_link}}
									</span>
								</small>
                            @endif
                        </div>

                        <br>

                        <button type="submit" class="btn btn-info">Поменять</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
