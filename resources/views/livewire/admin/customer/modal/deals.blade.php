<div class="section deals" @isset($customer) wire:poll @endisset>
	@isset($customer)
		{{-- Section Header --}}
		<div class="section__header section__part mb-3">
			<h5 class="section__header--title">
				Сделки | <span>{{ ucfirst($customer->surname) }} {{ ucfirst($customer->name) }}</span>
			</h5>
		</div>

		{{-- Section Body --}}
		<div class="section__body section__part" x-data="{showEditDealModal: false}">
			{{-- Title --}}
			<div>
				<h5 class="section-title">Открытые</h5>
			</div>

			{{-- Deals Table --}}
			<div class="w-100">
				@if (count($deals) > 0)
					<table class="admin-index-tables table simple-table" width="100%">
						<thead>
							<tr>
								<th style="flex: 0;">ID</th>
								<th>Статус</th>
								<th>Акция</th>
								<th>Инвест.</th>
								<th>Профит</th>
								<th>Созд./Измен.</th>
								<th>Действия</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($deals as $deal)
								<tr wire:key="{{ $loop->index }}" class="{{ !$deal->is_open ? 'opacity-75' : '' }}">
									<td style="flex: 0; padding-right: 20px;">
										<div class="d-flex flex-column">
											<p class="mb-0 text-primary">
												{{ $deal->id }}
											</p>
										</div>
									</td>
									<td class="{{ $deal->is_open ? 'text-success' : 'text-danger' }}">
										{{ $deal->getDealStatus() }}
									</td>
									<td>
										<div class="d-flex flex-column">
											<p class="mb-0 text-muted">{{ $deal->market === 0 ? 'Криптовалютный' : 'Товарный' }}</p>
											<p class="mb-0 text-info">{{ $deal->stock_naming }} | {{$deal->stock_alias}}</p>
										</div>
									</td>
									<td>
										<div class="d-flex flex-column">
											<p class="mb-0 {{ $deal->dest ? 'text-success' : 'text-danger' }}">
												{{$deal->getDealDest()}}
											</p>
											<p class="mb-0 text-gray-300">
												{{$deal->investment}}
											</p>
										</div>
									</td>
									<td>
										<div class="d-flex flex-column">
											{{ $deal->profit }}
										</div>
									</td>
									<td>
										<div class="d-flex flex-column timestamps">
											<span>{{ App\Helpers\Utils::getDate($deal->created_at) }}</span>
											<span>{{ App\Helpers\Utils::getDate($deal->updated_at) }}</span>
										</div>
									</td>
									<td>
										<div class="d-flex actions-wrapper flex-wrap">
											{{-- Toggle Deal Pegging --}}
											{{-- <button 
												class="mt-2 crud-btn {{ $deal->is_pegged ? 'crud-btn_add' : 'crud-btn_edit'}}"
												wire:click="togglePegging({{ $deal->id }})"
											>
												<i class="fas fa-circle"></i>
											</button> --}}

											{{-- Edit Profit --}}
											<button 
												type="button" 
												class="mt-2 crud-btn crud-btn_edit"
												wire:click="findDealToEdit({{ $deal->id }})"
												x-on:click="showEditDealModal = true"
											>
												<i class="far fa-edit ad"></i>
											</button>

											{{-- Toggle Deal Status --}}
											<button 
												type="submit" 
												class="mt-2 crud-btn crud-btn_balance"
												wire:click="toggleStatus({{ $deal->id }})"
											>
												<i class="fas {{ $deal->is_open ? 'fa-lock-open' : 'fa-unlock'}}"></i>
											</button>

											{{-- Delete Deal --}}
											<button 
												type="button" 
												class="mt-2 crud-btn crud-btn_delete" 
												wire:click="confirmDealDelete({{ $deal->id }})"
											>
												<i class="fas fa-trash ad"></i>
											</button>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<p class="mb-0 p-2 text-muted">
						На данный момент сделок нет
					</p>
				@endif
			</div>

			{{-- Edit Data Modal --}}
			<div class="overlay" style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; width: 100%; height: 100%; z-index: 1000; background: rgba(0,0,0,.7); display: flex; justify-content: center; align-items: center;" x-show.transition.in.duration.400ms="showEditDealModal" x-on:close-modal.window="showEditDealModal = false">
				<div class="modal" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: block">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							{{-- Modal Title --}}
							<div class="modal-header">
								<h5 class="modal-title">Изменить данные</h5>
								<button type="button" class="close" aria-label="Close" x-on:click="showEditDealModal = false">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
		
							{{-- Modal Form  --}}
							<form>
								@csrf
								
								@isset ($deal_to_be_edited)
									<div class="modal-body">
										<div class="form-group">
											<label>Профит</label>
											<input 
												type="number" 
												step="0.01" 
												wire:model="deal_new_profit"
												class="form-control" 
												value="{{ $deal_new_profit }}"
											>
										</div>
									</div>
								@else
									<p class="text-center text-light my-4">
										Профит сделки не зарендерился. Попробуйте перезагрузить страницу и попробовать снова.
									</p>
								@endisset
				
								<div class="modal-footer">
									<button 
										type="button" 
										class="btn btn-cancel"
										x-on:click="showEditDealModal = false"
									>
										Закрыть
									</button>
		
									<button 
										wire:click.prevent="editDealProfit" 
										class="btn btn-success"
									>
										Обновить
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endisset
</div> <!-- End section -->