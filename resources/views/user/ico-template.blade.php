@extends('layouts.user.ico')

{{-- ico properties --}}
@section('title', $ico->title)

@section('alias', $ico->alias)

@section('starter-point', $ico->starter_price)

@section('current-point', $ico->current_price)

@section('release-date', $ico->release_date)

@section('amount', $ico->amount)

{{-- this one is for breadcrumbs --}}
@section('data-title', 'ICO - '.$ico->title)

{{-- open new ico deal --}}
@section('ico-investment-form')
	@livewire('user.open-deal.ico', [
		'ico' => $ico,
	])
@endsection