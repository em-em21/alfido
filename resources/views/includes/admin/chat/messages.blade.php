@if(isset($messages))
	@if(count($messages) > 0)
		@foreach ($messages as $message)
			<li class="{{ $message->from === auth()->id() ? 'sent' : 'received' }} message">
				<span class="text">
					{{ $message->message }}
				</span>
				<span class="date">
					{{ \Carbon\Carbon::parse($message->created_at)->translatedFormat('H:i, j F Y ') }}
				</span>
			</li>
		@endforeach
	@else
		<p class="no-messages-alert chat-info">
			<svg class="no-messages-svg chat-info-svgs">
				<use xlink:href="/sprite.svg#noMessages"></use>
			</svg>
			<span class="no-messages-text chat-info-texts">
				Здесь пока пусто.
			</span>
		</p>
	@endif
@else
	<p class="start-chat-alert chat-info">
		<svg class="start-chat-svg chat-info-svgs">
			<use xlink:href="/sprite.svg#startChat"></use>
		</svg>
		<span class="start-chat-text chat-info-texts">
			Выберите пользователя, чтобы начать беседу.
		</span>
	</p>
@endif