@extends('layouts.admin')
@section('page-title', 'Обратная связь | '.config('app.name'))
@section('title', 'Обратная связь')

@section('admin-content')
	<div class="container-fluid">
  		<div class="col-md-12 p-3">
			@include('includes.global.alerts')
			
			<div class="card">
				<div class="card-body">
					<table class="table table-hover table-admin pt-3 table-outreach" width="100%">
						<thead class="">
							<th>ID</th>
							<th>Ф. И. О.</th>
							<th>E-mail</th>
							<th>Сообщение</th>
							<th>Дата</th>
							<th>Действия</th>
						</thead>
					
						<tbody>
							@if(count($outreaches) > 0)
								@foreach ($outreaches as $out)
									<tr>
										<td>{{$out->id}}&nbsp;</td>
										<td>{{$out->name}}</td>
										<td>{{$out->email}}</td>
										<td>{{$out->message}}</td>
										<td>{{$out->created_at}}</td>
										<td>
											<div class="actions-wrapper">
												<form method="POST" action="{{ route('outreaches.destroy', $out->id) }}">
													@csrf
													@method('DELETE')
	
													<button type="submit" class="crud-btn crud-btn_delete mt-2 mb-2">
														<i class="fas fa-trash ad" style="pointer-events: none"></i>
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
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			$('.table-outreach').DataTable();
		});
	</script>
@endpush