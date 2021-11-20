{{-- Laravel Alerts --}}
@if (Session::has('success'))
	<div class="alert alert-success" role="alert">
		<span class="alert-success_msg">{{ Session::get('success') }}</span>
		<span class="alert-x">&#x2715;</span>
	</div>
@endif

@if (Session::has('error'))
	<div class="alert alert-danger" role="alert">
		<span class="alert-danger_msg">{{ Session::get('error') }}</span>
		<span class="alert-x">&#x2715;</span>
	</div>
@endif

@if (count($errors) > 0)
	<div class="alert alert-danger" role="alert">
		<ul>
			@foreach ($errors->all() as $error)
				<li class="alert-danger_msg">{{$error}}</li>
			@endforeach
		</ul>
		<span class="alert-x">&#x2715;</span>
	</div>
@endif

{{-- JS Alert-Box --}}
<div class="alert-box"></div>