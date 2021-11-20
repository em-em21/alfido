@extends('layouts.admin')
@section('page-title', 'ICO | '.config('app.name'))
@section('title', 'ICO')

@section('admin-content')
	<div class="container-fluid">
		<div class="col-md-12 p-3">
			@include('includes.global.alerts')

			{{-- ICO Form --}}
			<div class="card card-outline mb-4 col-md-5 pr-0 pl-0 ico_form collapsed-card">
				<div class="card-header" data-card-widget="collapse">
					<h4 class="card-title text-white">Добавить ICO</h4>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-plus"></i>
						</button>
					</div>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.ico.store') }}" method="POST">
						@csrf
						<div class="form-group">
							<label class="font-weight-regular">Заголовок</label>
							<input class="form-control" name="title">
						</div>
						<div class="form-group">
							<label>Алиас</label>
							<input class="form-control" name="alias">
						</div>
						<div class="form-group">
							<label>Начальная цена (без $)</label>
							<input class="form-control" name="starter_price">
						</div>
						<div class="form-group">
							<label>Текущая цена (без $)</label>
							<input class="form-control" name="current_price">
						</div>
						<div class="form-group">
							<label>Планируемая дата выхода</label>
							<input class="form-control" name="release_date">
						</div>
						<div class="form-group">
							<label>Планируется выпустить</label>
							<input class="form-control" name="amount">
						</div>
						<button type="submit" class="btn btn-info">Отправить</button>
					</form>
				</div>
			</div>

			{{-- ICO ICO Archive --}}
			<div class="card table-wrapper_new">
				<div class="card-body">
					<div class="card-body p-0">
						<table id="dataTable" class="table table-striped table-hover table-admin pt-3" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Название</th>
									<th>Алиас</th>
									<th>Начальная цена</th>
									<th>Текущая цена</th>
									<th>Дата выхода</th>
									<th>Кол-во</th>
									<th>Действия</th>
								</tr>
							</thead>
							<tbody>
								@foreach($icos as $i)
									<tr>
										<td>{{$i->id}}</td>
										<td>{{$i->title}}</td>
										<td>{{$i->alias}}</td>
										<td>{{$i->starter_price}}</td>
										<td>{{$i->current_price}}</td>
										<td>{{$i->release_date}}</td>
										<td>{{$i->amount}}</td>
										<td>
											<div class="d-flex">
												<button type="button" class="crud-btn crud-btn_edit mt-1 mb-1 mr-0" data-toggle="modal" data-target="#editModal">
													<i class="far fa-edit ad"></i>
												</button>

												<button type="button" class="crud-btn crud-btn_delete mt-1 mb-1 mr-0 ml-1" data-toggle="modal" data-target="#deleteModal">
													<i class="fas fa-trash ad"></i>
												</button>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

			{{-- Edit Data Modal --}}
			<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title text-dark" id="exampleModalLongTitle">Изменить ICO</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="POST" id="editForm">
							@csrf
							{{ method_field('PUT') }}

							<div class="modal-body">

								<div class="form-group">
								<label>Название</label>
								<input type="text" name="title" id="title" class="form-control">
								</div>

								<div class="form-group">
								<label>Алиас</label>
								<input type="text" name="alias" id="alias" class="form-control">
								</div>

								<div class="form-group">
								<label>Начальная цена</label>
								<input type="text" name="starter_price" id="starter_price" class="form-control">
								</div>

								<div class="form-group">
								<label>Текущая цена</label>
								<input type="text" name="current_price" id="current_price" class="form-control">
								</div>

								<div class="form-group">
								<label>Дата выхода</label>
								<input type="text" name="release_date" id="release_date" class="form-control">
								</div>

								<div class="form-group">
								<label>Количество</label>
								<input type="text" name="amount" id="amount" class="form-control">
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
								<button type="submit" class="btn btn-primary">Обновить</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			{{-- Delete Data Modal --}}
			<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-dark" id="exampleModalLongTitle"><strong>Удалить ICO</strong></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="/table" method="POST" id="deleteForm">

					@csrf
					{{ method_field('DELETE') }}

					<div class="modal-body">
						<input type="hidden" name="_method" value="DELETE">
						<p>Вы уверены?</p>
						<p>Это действия нельзя отменить</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
						<button type="submit" class="btn btn-primary">Удалить</button>
					</div>
				</form>
				</div>
			</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	<script type="text/javascript">
		const table = $('#dataTable').DataTable();

		//Edit
		table.on('click', '.edit', function() {
			$tr = $(this).closest('tr');

			let data = table.row($tr).data();

			$('#title').val(data[1]);
			$('#alias').val(data[2]);
			$('#starter_price').val(data[3]);
			$('#current_price').val(data[4]);
			$('#release_date').val(data[5]);
			$('#amount').val(data[6]);

			$('#editForm').attr('action', `/admin/ico/${data[0]}`);
			$('#editModal').modal('show');
		});

		//Delete
		table.on('click', '.delete', function() {
			$tr = $(this).closest('tr');

			let data = table.row($tr).data();

			$('#deleteForm').attr('action', `/admin/ico/${data[0]}`);
			$('#deleteModal').modal('show');
		})
	</script>
@endpush