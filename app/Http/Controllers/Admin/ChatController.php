<?php

namespace App\Http\Controllers\Admin;

use App\Events\ChatMessageSent;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
	// fetch customers list
    public function fetchUsers()
	{
		$users = auth()->user()->customers()->get();

		$messages = Message::where('is_read', 0)->get();		

		return view('includes.admin.chat.users', [
			'users' => $users,
			'messages' => $messages,
		]);
	}

	// messages duh
	public function showMessages($user_id) 
    {
		$messages = Message::where('to', $user_id)
						->orWhere('from', $user_id)
						->get();

		Message::where(['to' => auth()->id()])
				->update(['is_read' => 1]);
		
        return view('includes.admin.chat.messages', [
			'messages' => $messages
		]);
    }

	// oh, hello
    public function sendMessages(Request $request) 
    {
		$to = $request->receiverID;
		$from = auth()->id();

		$message = new Message([
			'from' => $from,
			'to' => $to,
			'message' => $request->message,
		]);

		auth()->user()->messages()->save($message);
		
		ChatMessageSent::dispatch($message);

		return $message;
	}
}
