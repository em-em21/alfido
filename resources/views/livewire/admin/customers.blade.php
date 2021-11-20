<div>
	{{-- Users (CUSTOMERS) Table --}}
	<div class="table-wrapper_new card">
		<div class="card-body">
			<table class="table table-hover table-admin pt-3 scroll-bar users-table" id="customersTable" width="100%">
				<thead>
					<th>ID</th>
					<th>Фамилия</th>
					<th>Имя</th>
					<th>Номер</th>
					<th>E-mail</th>
					<th>Статус</th>
					<th>Агент</th>
					<th>Баланс</th>
				</thead>
				<tbody class="focus-on-hover">
					@foreach ($customers as $customer)
						<tr onclick="window.dispatchEvent(new CustomEvent('got-user-id', {detail: {{ $customer->id }}}))" style="cursor: pointer;">
							<td>{{$customer->id}}</td>
							<td>{{ucfirst($customer->surname)}}</td>
							<td>{{ucfirst($customer->name)}}</td>
							<td>{{$customer->phone}}</td>
							<td>{{$customer->email}}</td>
							<td class="{{ $customer->getStatusClass() }}">{{$customer->getStatus()}}</td>
							<td>
								@php
									if ($customer->managers()->exists()) {
										$manager = ucfirst($customer->managers->first()->surname) . ' ' . 
										ucfirst($customer->managers->first()->name);
									} else {
										$manager = '—';
									}
								@endphp
								
								<span>
									{{ $manager }}
								</span>
							</td>
							<td>${{ $customer->balance }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
