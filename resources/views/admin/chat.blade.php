@extends('layouts.admin')
@section('page-title', 'Тех-поддержка | '.config('app.name'))
@section('title', 'Тех-поддержка')

@push('styles')
	@livewireStyles
@endpush

@section('admin-content')
	<div class="container-fluid overflow-hidden">
		<section class="chat row col-lg-12 col-md-12 col-sm-12">
			<div class="chat__inner">
				@include('includes.admin.chat.burger')

				<div class="chat__users">
					<div class="chat__users--inner">
						<div class="chat__users--list">
							@include('includes.admin.chat.users')
						</div>
					</div>
				</div>
			
				@include('includes.admin.chat.window')
			</div>
		</section>
	</div>
@endsection

@push('scripts')
	@livewireScripts
	{{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
@endpush