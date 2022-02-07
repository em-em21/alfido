@section('page-title', 'Менеджеры | '.config('app.name'))
	
@section('title', 'Менеджеры')

@push('styles')
	@livewireStyles
@endpush

<div class="container-fluid admin-index-page">
	@include('includes.global.alerts')
	
	<div class="p-3">
		<div class="table-wrapper_new card">
			<div class="card-body" wire:ignore>
				<table class="table table-hover table-admin pt-3 scroll-bar users-table" width="100%">
					<thead>
						<th>ID</th>
						<th>Фамилия</th>
						<th>Имя</th>
						<th>Номер</th>
						<th>E-mail</th>
						<th>Зарегистрирован</th>
						<th>###</th>
					</thead>
					<tbody class="focus-on-hover">
						@foreach ($managers as $manager)
							<tr
								class="{{ $selected_manager === $manager->id && $customers ? 'selected-manager' : '' }}" 
							>
								<td>{{$manager->id}}</td>
								<td>{{ucfirst($manager->surname)}}</td>
								<td>{{ucfirst($manager->name)}}</td>
								<td>{{$manager->phone}}</td>
								<td>{{$manager->email}}</td>
								<td>{{$manager->created_at}}</td>
								<td>
									<div class="d-flex align-items-center">
										<a
												href="{{ route('admin.managers.edit', [ 'manager' => $manager->id ]) }}"
												title="Изменить менеджера"
												class="crud-btn crud-btn_edit mt-1 mb-1"
										>
											<i class="fas fa-edit ad" style="pointer-events: none;"></i>
										</a>
										<button
											type="button"
											title="Удалить менеджера"
											class="crud-btn crud-btn_delete mt-1 mb-1"
											wire:click="confirmDeletion({{ $manager->id }})"
										>
											<i class="fas fa-trash ad" style="pointer-events: none;"></i>
										</button>
										<button
											type="button"
											title="Список пользователей, закреплённых за данным менеджером"
											class="crud-btn crud-btn_add mt-1 mb-1"
											wire:click="setCustomers({{ $manager->id }})"
										>
											<i class="fas fa-users"></i>
										</button>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		{{-- Show users list --}}
		@if ($selected_manager)
			<div class="table-wrapper_new mt-3 card">
				<div class="card-header card-header__green" data-card-widget="collapse">
					<h5 class="card-title d-flex align-items-center">
						Клиенты {{ ucfirst($selected_manager->surname).' '.ucfirst($selected_manager->name) }}

						@if ($customers->count())
							<div class="ml-3 text-primary bg-dark d-flex align-items-center justify-content-center" style="border-radius: 100%; width: 25px; height: 25px;">
								<span style="font-size: 1rem; font-weight: 600;">
									{{ $customers->count() }}
								</span>
							</div>
						@endif
					</h5>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-plus"></i>
						</button>
					</div>
				</div>

				<div class="card-body">
					@if ($customers->count())
						<table class="admin-index-tables table simple-table" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Фамилия</th>
									<th>Имя</th>
									<th>Номер</th>
									<th>Email</th>
									<th>Статус</th>
									<th>Баланс</th>
								</tr>
							</thead>
							<tbody class="focus-on-hover">
								@forelse ($customers as $customer)
									<tr style="cursor: pointer;" onclick="window.dispatchEvent(new CustomEvent('got-user-id', {detail: {{ $customer->id }}}))">
										<td>{{ $customer->id }}</td>
										<td>{{ ucfirst($customer->surname) }}</td>
										<td>{{ ucfirst($customer->name) }}</td>
										<td>{{ $customer->phone }}</td>
										<td>{{ $customer->email }}</td>
										<td class="{{ $customer->getStatusClass() }}">{{ $customer->getStatus() }}</td>
										<td>${{ $customer->balance }}</td>
									</tr>
								@empty
									<p class="text-muted">
										Клиенты не найдены.
									</p>
								@endforelse
							</tbody>
						</table>
					@else
						<p class="p-2 m-0 text-muted">
							У данного менеджера нет ни одного клиента
						</p>
					@endif
				</div>
			</div>
		@endif

		{{-- Display Modal With Selected Customer Info --}}
		@livewire('admin.customer.root')
	</div>
</div>
	
@push('scripts')
	@livewireScripts
	<script>
		window.addEventListener('got-user-id', e => {
			Livewire.emitTo('admin.customer.root', 'customer:chosen', e.detail)
		})
	</script>
@endpush