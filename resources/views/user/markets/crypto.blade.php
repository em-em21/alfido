@extends('layouts.user.platform')

@section('data-title', __('Криптовалютный рынок'))

@section('open-deal-component')
	@livewire('user.open-deal.crypto')
@endsection

@section('widget-big')
    @include('includes.user.tradingview.crypto.widget-big')
@endsection

@section('widget-small')
    @include('includes.user.tradingview.crypto.widget-small')
@endsection

@section('deals-table')
	@livewire('user.deals.show-deals', [
		'market' => 0
	])
@endsection