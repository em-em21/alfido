<li class="received message">
	<span class="text">
		Здравствуйте! Как мы можем Вам помочь? :)
	</span>
	<span class="date">
		{{ \Carbon\Carbon::now()->translatedFormat('H:i') }}
	</span>
</li>
@if(isset($messages))
	@if(count($messages) > 0)
		@foreach ($messages as $m)
			<li class="{{ ($m->from == $id) ? 'sent' : 'received' }} message">
				<span class="text">
					{{ $m->message }}
				</span>
				<span class="date">
					{{ \Carbon\Carbon::parse($m->created_at)->translatedFormat('H:i') }}
				</span>
			</li>
		@endforeach
	@endif
@endif