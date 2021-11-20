<div 
	x-cloak
	class="chat fixed sm:left-12 md:left-32 md:right-auto bottom-0 z-50 mx-5 sm:mx-auto sm:w-80" 
	x-data="{ inputHasFocus: false, chatOpened: false }"
>
	{{-- Trigger --}}
	<button
		type="button"
		x-on:click="chatOpened = !chatOpened" 
		class="w-full relative flex items-center justify-center py-2 px-3 md:px-5 shadow-md rounded-t-lg transition bg-green-700 text-gray-200 hover:bg-green-600 hover:text-gray-50"
		:class="{'chat-opened-bg text-gray-50': chatOpened}"
	>
		<span class="md:text-lg">
			Напишите нам, мы онлайн!
		</span>

		<svg class="w-6 h-6 mt-px ml-3 transform rotate-180 transition-transform" :class="{'rotate-0': chatOpened}" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
			<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
		</svg>
	</button>

	{{-- Messages Box --}}
	<div x-show="chatOpened; $refs.chatCont.scrollTop = $refs.chatCont.scrollHeight" class="h-96 md:h-80 flex w-full bg-gray-900">
		<ul class="flex flex-auto flex-col p-5 overflow-y-auto" x-ref="chatCont">
			{{-- can be received or sent (r || s) --}}
			{{-- Show welcome message --}}
			<li class="message r">
				<span class="text">
					Здравствуйте! Как мы можем Вам помочь?
				</span>
				<span class="date">
					{{ \Carbon\Carbon::now()->translatedFormat('H:i') }}
				</span>
			</li>

			{{-- Fetch messages --}}
			@if(count($chat_messages) > 0)
				@foreach ($chat_messages as $message)
					<li class="message {{ $message->from === auth()->id() ? 's' : 'r' }}">
						<span class="text">
							{{ $message->message }}
						</span>
						<span class="date">
							{{ \Carbon\Carbon::parse($message->created_at)->translatedFormat('H:i') }}
						</span>
					</li>
				@endforeach
			@endif
		</ul>
	</div>

	{{-- Input --}}
	<form 
		x-show="chatOpened" 
		class="send-message h-14 w-full flex items-center justify-between py-2 px-3 bg-gray-900"
		wire:submit.prevent="send"
	>
		<input 
			class="rounded-md transition ease-in bg-transparent border-none focus:ring-0 text-gray-50"
			type="text"
			autocomplete="off"
			wire:model="chat_message" 
			placeholder="Введите сообщение..."
			x-on:focus="inputHasFocus = true"
			x-on:blur="inputHasFocus = false"
		/>

		<svg 
			wire:click.prevent="send" 
			:class="{'input-focused': inputHasFocus}" 
			xmlns="http://www.w3.org/2000/svg" 
			viewBox="0 0 465.882 465.882"
		>
			<path d="m465.882 0-465.882 262.059 148.887 55.143 229.643-215.29-174.674 235.65.142.053-.174-.053v128.321l83.495-97.41 105.77 39.175z"/>
		</svg>
	</form>
</div>