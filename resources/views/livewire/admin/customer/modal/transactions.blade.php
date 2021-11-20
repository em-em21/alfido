<section class="section trans">
	@isset($customer)
		{{-- Section Header --}}
		<div class="section__header section__part mb-3">
			<h5 class="section__header--title">
				Транзакции | <span>{{ ucfirst($customer->surname) }} {{ ucfirst($customer->name) }}</span>
			</h5>
		</div>

		{{-- Section Body --}}
		<div class="section__body section__part" x-data="{ showEditTransModal: false }">
			<div class="transactions">
				@if (auth()->user()->role === 3)
					{{-- Title Create Transaction --}}
					<div>
						<h5 class="section-title mb-0">
							Создать транзакцию
						</h5>
					</div>

					{{-- Create Transaction --}}
					<div class="card mb-5">
						<div class="card-body">
							<form>
								@csrf
								
								<div class="form-group">
									<label class="text-primary">Тип</label>
									<div class="d-flex flex-column justify-items-center">
										<div class="form-check" wire:click="$set('reason', 'Пополнение BTC кошелька.')">
											<input class="form-check-input" type="radio" wire:model="type" id="income" value="0">
											<label class="form-check-label radio-label" for="income">
												Пополнение
											</label>
										</div>
										<div class="form-check" wire:click="$set('reason', 'Бонусное пополнение в связи с...')">
											<input class="form-check-input" type="radio" wire:model="type" id="bonus" value="1">
											<label class="form-check-label radio-label" for="bonus">
												Бонус
											</label>
										</div>
										<div class="form-check" wire:click="$set('reason', 'Списание баланса в связи с...')">
											<input class="form-check-input" type="radio" wire:model="type" id="outcome" value="2">
											<label class="form-check-label radio-label" for="outcome">
												Списание
											</label>
										</div>
									</div>

									@error('type') <span class="text-danger mt-1">{{ $message }}</span> @enderror
								</div>
								
								<div class="form-group">
									<label>Сумма</label>
									<input type="number" class="form-control" step="0.01" wire:model="amount">
									
									@error('amount') <span class="text-danger mt-1">{{ $message }}</span> @enderror
								</div>
					
								<div class="form-group">
									<label>Причина</label>
									<input type="text" class="form-control" wire:model="reason">

									@error('reason') <span class="text-danger mt-1">{{ $message }}</span> @enderror
								</div>
					
								<button 
									type="submit" 
									class="btn btn-success" 
									wire:click.prevent="createTrans"
								>
									Отправить
								</button>
							</form>
						</div>
					</div>
				@endif 

				<div class="card w-100">
					{{-- Title Show Trans List --}}
					<h5 class="section-title mb-0">Список Транзакций</h5>

					{{-- Show Trans List --}}
					<div class="card w-100">
						<div class="card-body">
							@if (count($transactions) > 0)
								<table class="admin-index-tables table simple-table" width="100%">
									<thead>
										<tr>
											<th>ID</th>
											<th>Сумма</th>
											<th>Причина</th>
											<th>Тип</th>
											<th>Создано</th>
											@if (auth()->user()->role === 3)
												<th>Действия</th>
											@endif
										</tr>
									</thead>
									<tbody>
										@foreach($transactions as $transaction)
											<tr>
												<td>{{ $transaction->id }}</td>
												<td>
													<div class="transactions__amount {{ $transaction->type === 0 ? 'text-success' : ($transaction->type === 1 ? 'text-active' : 'text-danger') }}">
														{{ $transaction->amount }}
														<span>
															&#36;
														</span>
													</div>
												</td>
												<td class="{{ $transaction->type === 0 ? 'text-success' : ($transaction->type === 1 ? 'text-active' : 'text-danger') }}">
													{{ $transaction->reason }}
												</td>
												<td class="{{ $transaction->type === 0 ? 'text-success' : ($transaction->type === 1 ? 'text-active' : 'text-danger') }}">
													{{ $transaction->getTransType() }}
												</td>
												<td>{{ App\Helpers\Utils::getDate($transaction->created_at) }}</td>
												@if (auth()->user()->role === 3)
													<td>
														<div class="d-flex actions-wrapper">
															{{-- Edit Transaction --}}
															<button 
																type="submit" 
																class="crud-btn crud-btn_edit"
																wire:click="findTransToEdit({{ $transaction->id }})"
																x-on:click="showEditTransModal = true"
															>
																<i class="far fa-edit ad"></i>
															</button>
				
															{{-- Delete Transaction --}}
															<button 
																type="button" 
																class="crud-btn crud-btn_delete" 
																wire:click="confirmTransDelete({{ $transaction->id }})"
															>
																<i class="fas fa-trash ad"></i>
															</button>
														</div>
													</td>
												@endif
											</tr>
										@endforeach
									</tbody>
								</table>
							@else
								<p class="mb-0 p-2 text-muted">
									На данный момент транзакций нет.
								</p>
							@endif
						</div>
					</div>
					
					{{-- Edit Transaction Modal --}}
					<div
						class="overlay" 
						x-show.transition.in.duration.400ms="showEditTransModal" 
						x-on:close-modal.window="showEditTransModal = false"
						style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; width: 100%; height: 100%; z-index: 1000; background: rgba(0,0,0,.7); display: flex; justify-content: center; align-items: center;" 
					>
						<div class="modal" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: block">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									{{-- Modal Title --}}
									<div class="modal-header">
										<h5 class="modal-title">Изменить данные</h5>
					
										<button type="button" class="close" aria-label="Close" x-on:click="showEditTransModal = false">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
					
									{{-- Modal Form  --}}
									<form>
										@csrf
										
										@if ($this->trans_edit !== null)
											<div class="modal-body">
												<div class="form-group">
													<label>Сумма</label>
													<input 
														type="number" 
														step="0.01" 
														class="form-control"
														wire:model="trans_edit_amount"
													>
												</div>
					
												<div class="form-group">
													<label>Причина</label>
													<input 
														type="text"
														class="form-control" 
														wire:model="trans_edit_reason"
													>
												</div>
					
												<div class="form-group">
													<label class="text-primary">Тип</label>
													<div class="d-flex flex-column justify-items-center">
														<div class="form-check">
															<input 
																class="form-check-input" 
																type="radio" 
																id="edited_income" 
																wire:model="trans_edit_type"
																value="0"
															>
															<label class="form-check-label radio-label" for="edited_income">
																Пополнение
															</label>
														</div>
														<div class="form-check">
															<input 
																id="edited_bonus" 
																class="form-check-input" 
																type="radio" 
																wire:model="trans_edit_type" 
																value="1"
															>
															<label class="form-check-label radio-label" for="edited_bonus">
																Бонус
															</label>
														</div>
														<div class="form-check">
															<input 
																class="form-check-input" 
																type="radio" 
																wire:model="trans_edit_type" 
																id="edited_outcome" 
																value="2"
															>
															<label class="form-check-label radio-label" for="edited_outcome">
																Списание
															</label>
														</div>
													</div>
					
													@error('type') <span class="text-danger mt-1">{{ $message }}</span> @enderror
												</div>
											</div>
					
											<div class="modal-footer">
												<button 
													type="button" 
													class="btn btn-cancel"
													x-on:click="showEditTransModal = false"
												>
													Закрыть
												</button>
					
												<button 
													wire:click.prevent="editTransProfit" 
													class="btn btn-success"
												>
													Обновить
												</button>
											</div>
										@else
											<p class="text-danger m-3">
												Выбранная транзакция не была найдена. Обновите страницу и попробуйте снова.
											</p>
										@endif
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
				
			</div> {{-- End Transactions --}}
		</div> {{-- End Section Body --}}
	@endisset
</section> {{-- End Section --}}