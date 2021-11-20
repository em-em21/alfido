@extends('layouts.admin')
@section('page-title', 'Вывод средств | '.config('app.name'))
@section('title', 'Запросы на вывод средств')

@section('admin-content')
	<div class="container-fluid">
		<div class="col-md-12 p-3">
			@include('includes.global.alerts')

			<div class="card">
				<div class="card-body">
					{{-- Table --}}
					<table class="table table-hover table-admin pt-3" id="dataTable">
						<thead>
							<th>ID</th>
							<th>Пользователь</th>
							<th>Инструмент</th>
							<th>Сумма</th>
							<th>Кошелёк</th>
							<th>Карта</th>
							<th>ФИО</th>
							<th>Создано</th>
							<th>Действия</th>
						</thead>
					
						<tbody>
							@if(count($withdrawals) > 0)
								@foreach ($withdrawals as $withdrawal)
									<tr class="{{ $withdrawal->wallet ? 'text-success' : 'text-info' }}"> 
										<td>{{ $withdrawal->id }}</td>
										<td>{{ ucfirst($withdrawal->user->surname) .' '. ucfirst($withdrawal->user->name)}}</td>
										<td>{{ $withdrawal->tool }}</td>
										<td>{{ $withdrawal->amount }}</td>
										<td>{{ $withdrawal->wallet ?? 'N/S' }}</td>
										<td>{{ $withdrawal->cardnumber ?? 'N/S' }}</td>
										<td>{{ $withdrawal->cardholder ?? 'N/S' }}</td>
										<td>{{ $withdrawal->created_at }}</td>
										<td>
											<div>
												<form action="{{ route('withdrawals.destroy', $withdrawal->id) }}" method="POST">
													@csrf
													@method('DELETE')

													<button class="crud-btn crud-btn_delete mt-2 mb-2">
														<i style="pointer-events: none;" class="fas fa-trash ad"></i>
													</button>
												</form>
											</div>
										</td>
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
			const table = $('.table').DataTable();
		});
	</script>
@endpush