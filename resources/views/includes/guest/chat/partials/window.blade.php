<div class="chat__window">
	<div class="chat__window--messages">
		<ul class="chat__window--inner" id="messages">
				@include('includes.guest.chat.messages')
		</ul>
	</div>
	<div class="chat__window--input input-text">
		<input id="messageInput" 
				type="text"
				autocomplete="off"
				name="message" 
				placeholder="Введите сообщение..." 
				autofocus/>
		<button id="submitMessage">
			<svg class="chat__icons chat__icons--submit-message">
				<use xlink:href="/sprite.svg#chatSendMessage"></use>
			</svg>
		</button>
	</div>
</div>