@extends('layouts.admin')

@section('page-title', 'Клиенты | '.config('app.name'))

@section('title', 'Клиенты')

@push('styles')
	@livewireStyles
@endpush

@section('admin-content')
	<div class="container-fluid admin-index-page">
		<div class="p-3">
			@include('includes.global.alerts')

			{{-- Display List Of Customers --}}
			@livewire('admin.customers')

			{{-- Display Modal With Selected Customer Info --}}
			@livewire('admin.customer.root')
		</div>
	</div>
@endsection

@push('scripts')
	@livewireScripts
	<script>
		window.addEventListener('got-user-id', e => {
			Livewire.emitTo('admin.customer.root', 'customer:chosen', e.detail)
		})
	</script>
@endpush