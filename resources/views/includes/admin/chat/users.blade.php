@if(isset($users))
	@foreach($users as $user)
		<a href="#" class="chat__users--item user" id="{{ $user->id }}">
			@if($messages->where('user_id', $user->id)->count() > 0)
				<span class="pending">
					{{ $messages->where('user_id', $user->id)->count() }}
				</span>
			@endif
			<div class="chat__users--item-left">
				<svg>
					<use xlink:href="/sprite.svg#profile"></use>
				</svg>
			</div>
			<div class="chat__users--item-right">
				<p class="ir--name">
					{{ $user->name.' '.$user->surname }}
				</p>
				<p class="ir--email">
					{{ $user->email }}
				</p>
			</div>
		</a>
	@endforeach	
@endif