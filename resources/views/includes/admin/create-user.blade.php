<div class="create-user">
	<button 
		type="button" 
		class="create-user__btn"
		x-on:click="createNewUserModal = true"
	>
		Добавить пользователя
	</button>
</div>

{{-- Edit Data Modal --}}
<div class="overlay" style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; width: 100%; height: 100%; z-index: 1000; background: rgba(0,0,0,.7); display: flex; justify-content: center; align-items: center;" x-show.transition.in.duration.400ms="createNewUserModal" x-on:close-modal.window="createNewUserModal = false">
	<div class="modal" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: block">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				{{-- Modal Title --}}
				<div class="modal-header">
					<h5 class="modal-title">Создать нового пользователя</h5>
					<button type="button" class="close" aria-label="Close" x-on:click="createNewUserModal = false">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				{{-- Modal Form  --}}
				<form>
					@csrf

					<div class="modal-body">
						<div class="form-group">
							<label>Имя</label>
							<input class="form-control" type="text" wire:model.defer="name">
						</div>

						<div class="form-group">
							<label>Фамилия</label>
							<input class="form-control" type="text" wire:model.defer="surname">
						</div>

						<div class="form-group">
							<label>Мобильный</label>
							<input class="form-control" type="text" wire:model.defer="phone">
						</div>

						<div class="form-group">
							<label>E-mail</label>
							<input class="form-control" type="e-mail" wire:model.defer="email">
						</div>

						<div class="form-group">
							<label>Пароль</label>
							<input class="form-control" type="password" wire:model.defer="password">
						</div>
					</div>

					<div class="modal-footer">
						<button 
							type="button" 
							class="btn btn-cancel"
							x-on:click="createNewUserModal = false"
						>
							Закрыть
						</button>

						<button 
							wire:click.prevent="createNewUser" 
							class="btn btn-success"
						>
							Создать
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div> <!-- End modal overlay -->