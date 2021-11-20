@extends('layouts.user.platform')

@section('data-title', __('Фондовый рынок'))

@section('open-deal-component')
	@livewire('user.open-deal.forex')
@endsection

@section('widget-big')
    @include('includes.user.tradingview.forex.widget-big')
@endsection

@section('widget-small')
    @include('includes.user.tradingview.forex.widget-small')
@endsection

@section('deals-table')
	@livewire('user.deals.show-deals', [
		'market' => 1
	])
@endsection