<ul class="nav-left links-wrapper__common items-center max-w-3/4 hidden lg:flex xl:flex">
	<li class="mr-8">
		<img class="logo" src="{{ asset('img/logo/logo.png') }}">
	</li>

	@include('includes.user.header.menu', [
		'drop_classes' => 'absolute top-full w-52 bg-dark-19 rounded-b-md shadow-md',
		'drop_trigger_classes' => 'py-2 px-3 h-full hover:bg-slightly-lighter',
		'margin_class' => 'mr-3'
	])
</ul>