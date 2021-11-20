<?php

namespace App\Http\Livewire\User;

use App\Events\ChatMessageSent;
use App\Models\Message;
use Livewire\Component;

class Chat extends Component
{
	protected $listeners = [
		'refetch' => 'mount'
	];
	
	public $chat_message, $chat_messages = [];

	// fetch messages list
	public function mount()
	{
		$this->chat_messages = Message::where('to', auth()->id())
									->orWhere('from', auth()->id())
									->get();
	}

	public function send()
	{
		$manager = auth()->user()->managers()->first();
		
		$message = new Message([
			'message' => $this->chat_message,
			'from' => auth()->id(),
			'to' => $manager->id
		]);

		auth()->user()->messages()->save($message);

		$this->chat_message = '';
		$this->emitSelf('refetch');

		ChatMessageSent::dispatch($message);
	}
	
    public function render()
    {
        return view('livewire.user.chat');
    }
}
