@extends('layouts.admin')
@section('page-title', 'Мой аккаунт | '.auth()->user()->getCreds())
@section('title', 'Мой аккаунт')

@section('admin-content')
<div class="container-fluid">
    <div class="col-md-4 p-3">
        @include('includes.global.alerts')

        <section class="section info">
			<div class="section__header section__part mb-3">
				<h5 class="section__header--title">
					Информация | <span>{{ ucfirst(auth()->user()->surname).' '.ucfirst(auth()->user()->name) }}</span>
				</h5>
			</div>
		
			<form class="section__body section__part" wire:submit.prevent="updateUserInfo">
				@csrf
	
				{{-- Current INFO --}}
				<ul class="list-group">
					{{-- List items --}}
					<li class="list-group-item">
						<span class="text-secondary">ID:</span>
						<p class="text-primary">{{ auth()->user()->id }}</p>
					</li>
					<li class="list-group-item">
						<span class="text-secondary">Менеджер:</span>
						<p class="{{ auth()->user()->managers()->exists() ? 'text-success' : 'text-danger' }}">
							@if (auth()->user()->managers()->exists())
								{{ auth()->user()->getManagerCreds() }}
							@else
								{{ 'Нет' }}
							@endif
						</p>
					</li>
					<li class="list-group-item">
						<span class="text-secondary">Роль:</span>
						<p class="text-primary">{{ auth()->user()->getRoleRUS() }}</p>
					</li>
					<li class="list-group-item">
						<span class="text-secondary">E-mail:</span>
						<p class="text-primary">{{ auth()->user()->email }}</p>
					</li>
					<li class="list-group-item">
						<span class="text-secondary">Кредит:</span>
						<p class="text-primary">{{ auth()->user()->credit }}</p>
					</li>
					<li class="list-group-item">
						<span class="text-secondary">Телефон:</span>
						<p  class="text-primary">{{ auth()->user()->phone }}</p>
					</li>
					<li class="list-group-item">
						<span class="text-secondary">Баланс:</span>
						<p class="text-success">
							{{ number_format(auth()->user()->balance, 2) }}
							<svg class="list-group-item--svg">
								<use xlink:href="/sprite.svg#dollar"></use>
							</svg>
						</p>
					</li>
					<li class="list-group-item">
						<span class="text-secondary">Алготрейдинг:</span>
						<p style="color: {{ auth()->user()->algo ? '#a5d6a7' : '#cf6679' }};">
							{{ auth()->user()->getAlgoState() }}
						</p>
					</li>
					<li class="list-group-item">
						<span class="text-secondary">Заблокирован:</span>
						<p class="{{ auth()->user()->is_baned ? 'text-danger' : 'text-success' }} ">
							{{ auth()->user()->is_baned ? 'Да' : 'Нет' }}
						</p>
					</li>
					<li class="list-group-item list-group-item--date">
						<span class="text-secondary">Зарегистрирован:</span>
						<p class="text-primary">{{ \App\Helpers\Utils::getDate(auth()->user()->created_at) }}</p>
					</li>
					<li class="list-group-item" style="grid-column: 1 / -1;">
						<span class="text-secondary">Статус:</span>
						<p class="{{ auth()->user()->getStatusClass() }}">{{ auth()->user()->getStatus() }}</p>
					</li>
				</ul>
		
				{{-- Edit INFO --}}
				<h6 class="section-title mt-5">
					Изменить
				</h6>
	
				{{-- Inputs --}}
				<div class="list-group edit-info p-3">
					@if (auth()->user()->role === 3)
						<div class="form-group">
							<label class="text-primary">Роль</label>
							<div class="d-flex flex-column justify-items-center radio-options">
								<div class="form-check mr-3">
									<input class="form-check-input" type="radio" wire:model="role" id="user" value="1">
									<label class="form-check-label radio-label" for="user">
										Клиент
									</label>
								</div>
								<div class="form-check mr-3">
									<input class="form-check-input" type="radio" wire:model="role" id="manager" value="2">
									<label class="form-check-label radio-label" for="manager">
										Менеджер
									</label>
								</div>
								<div class="form-check mr-3">
									<input class="form-check-input" type="radio" wire:model="role" id="admin" value="3">
									<label class="form-check-label radio-label" for="admin">
										Админ
									</label>
								</div>
							</div>
						</div>
					@endif 
					<div class="form-group">
						<label class="text-primary">Алго</label>
						<div class="d-flex flex-column justify-items-center radio-options">
							<div class="form-check mr-3">
								<input class="form-check-input" type="radio" wire:model="algo" id="active" value="1">
								<label class="form-check-label radio-label" for="active">
									Активирован
								</label>
							</div>
							<div class="form-check mr-3">
								<input class="form-check-input" type="radio" wire:model="algo" id="inactive" value="0">
								<label class="form-check-label radio-label" for="inactive">
									Деактивирован
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-primary">Статус</label>
						<div class="d-flex flex-column justify-items-center radio-options">
							<div class="form-check mr-3">
								<input class="form-check-input" type="radio" wire:model="status" id="user_new" value="0">
								<label class="form-check-label radio-label {{ App\Models\User::STATUS_CLASS[0] }}" for="user_new">
									Новый
								</label>
							</div>
							<div class="form-check mr-3">
								<input class="form-check-input" type="radio" wire:model="status" id="user_active" value="1">
								<label class="form-check-label radio-label {{ App\Models\User::STATUS_CLASS[1] }}" for="user_active">
									Активен
								</label>
							</div>
							<div class="form-check mr-3">
								<input class="form-check-input" type="radio" wire:model="status" id="user_no_potential" value="2">
								<label class="form-check-label radio-label {{ App\Models\User::STATUS_CLASS[2] }}" for="user_no_potential">
									Высокий потенциал
								</label>
							</div>
							<div class="form-check mr-3">
								<input class="form-check-input" type="radio" wire:model="status" id="user_no_answer" value="3">
								<label class="form-check-label radio-label {{ App\Models\User::STATUS_CLASS[3] }}" for="user_no_answer">
									Низкий потенциал
								</label>
							</div>
							<div class="form-check mr-3">
								<input class="form-check-input" type="radio" wire:model="status" id="user_never_answer" value="4">
								<label class="form-check-label radio-label {{ App\Models\User::STATUS_CLASS[4] }}" for="user_never_answer">
									Не активен
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-primary">Имя</label>
						<input class="form-control" type="text" wire:model="name" placeholder="{{ auth()->user()->name }}">
					</div>
					<div class="form-group">
						<label class="text-primary">Фамилия</label>
						<input class="form-control" type="text" wire:model="surname" placeholder="{{ auth()->user()->surname }}">
					</div>
					@if (auth()->user()->role === 3)
						<div class="form-group">
							<label class="text-primary">Баланс</label>
							<input class="form-control" type="number" step="0.01" wire:model="balance" placeholder="{{ auth()->user()->balance }}" autocomplete="off">
						</div>
					@endif
					<div class="form-group">
						<label class="text-primary">Кредит</label>
						<input class="form-control" type="number" step="0.01" wire:model="credit" placeholder="{{ auth()->user()->credit }}" autocomplete="off">
					</div>
					<div class="form-group">
						<label class="text-primary">Мобильный</label>
						<input class="form-control" type="tel" wire:model="phone" placeholder="{{ auth()->user()->phone }}">
					</div>
					<div class="form-group">
						<label class="text-primary">E-mail</label>
						<input class="form-control" type="email" wire:model="email" placeholder="{{ auth()->user()->email }}">
					</div>
					<div class="form-group">
						<label class="text-primary">Сменить пароль</label>
						<input class="form-control" type="password" wire:model="password" placeholder="********">
					</div>
				</div>
				
				{{-- ------------------------------------------------------------- --}}
				<hr class="my-4" style="border-top: 1px solid rgba(255,255,255,.2)">
				{{-- ------------------------------------------------------------- --}}
	
				<div class="d-flex justify-content-between align-items-center info-buttons">
					{{-- Close Section || Save Changes --}}
					<div class="d-flex justify-content-between align-items-center">
						<button 
							class="btn btn-cancel mr-2" 
							type="button" 
							x-on:click="show = false"
						>
							Закрыть
						</button>
	
						<button 
							class="btn btn-success" 
							type="submit" 
							wire:click.prevent="updateUserInfo"
						>
							Сохранить
						</button>
					</div>
				</div>
			</form>
		</section>
    </div>
</div>
@endsection
