<div class="chat__window">
	<div class="chat__window--messages">
		<ul class="chat__window--inner" id="messages">
			@include('includes.admin.chat.messages')
		</ul>
	</div>
	<div class="chat__window--input input-text">
		<input id="messageInput" 
				type="text" 
				name="message" 
				autocomplete="off"
				placeholder="Введите сообщение..." 
				autofocus/>
		<button id="submitMessage">
			<svg>
				<use xlink:href="/sprite.svg#chatSendMessage"></use>
			</svg>
		</button>
	</div>
</div>