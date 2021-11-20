{{-- 
---------------------------------------------------------------
It's necessary to await ~3000ms to establish wss connection and
for UX purposes customer shouldn't see this transition.
Described above situation only relates to trading pages, so
this loader accepts an optional timeout parameter.
---------------------------------------------------------------
--}}
<div
	x-data
	x-ref="loader"
	style="z-index: 9999;"
	class="loader fixed top-0 left-0 right-0 bottom-0 bg-gray-900 flex items-center justify-center transition-opacity"
	x-init="() => {
		setTimeout(() => {
			$refs.loader.classList.add('hidden')
		},
		{{ $timeout ?? '1000' }});
	}"
>
	<img class="w-28 animate-pulse" src="{{ asset('img/logo/logo.png') }}">
</div>