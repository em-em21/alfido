@extends('layouts.user.platform')

@section('data-title', __('Товарно-сырьевой рынок'))

@section('open-deal-component')
	@livewire('user.open-deal.commodity')
@endsection

@section('widget-big')
    @include('includes.user.tradingview.commodity.widget-big')
@endsection

@section('widget-small')
    @include('includes.user.tradingview.commodity.widget-small')
@endsection

@section('deals-table')
	@livewire('user.deals.show-deals', [
		'market' => 2
	])
@endsection