@section('page-title', config('app.name') . ' - Менеджеры - ' . $this->manager->name)

@section('title', $this->manager->surname . ' ' . $this->manager->name)

@push('scripts')
    @livewireScripts
@endpush

<div class="container-fluid">
    <div class="col-md-4 p-3 space-y-5">
        <a href="{{ route('admin.managers') }}" class="text-blue-400 hover:underline hover:text-blue-300">
            Вернуться к менеджерам
        </a>

        <form wire:submit.prevent="updateManager" class="py-3 px-4 rounded-md shadow-sm bg-gray-900/60">
            @csrf

            {{-- Inputs --}}
            <div class="list-group edit-info">
                {{-- Role--}}
                <div class="form-group">
                    <label class="text-primary">Роль</label>
                    <div class="d-flex flex-column justify-items-center radio-options">
                        <div class="form-check mr-3">
                            <input class="form-check-input" name="role" type="radio" wire:model="role" id="user" value="1">
                            <label class="form-check-label radio-label" for="user">
                                Клиент
                            </label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" name="role" type="radio" wire:model="role" id="manager"
                                   value="2">
                            <label class="form-check-label radio-label" for="manager">
                                Менеджер
                            </label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" name="role" type="radio" wire:model="role" id="admin"
                                   value="3">
                            <label class="form-check-label radio-label" for="admin">
                                Админ
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Name--}}
                <div class="form-group">
                    <label class="text-primary">Имя</label>
                    <input class="form-control" type="text" wire:model="name"
                           placeholder="{{ $manager->name }}">
                </div>

                {{-- Surname --}}
                <div class="form-group">
                    <label class="text-primary">Фамилия</label>
                    <input class="form-control" type="text" wire:model="surname"
                           placeholder="{{ $manager->surname }}">
                </div>

                {{-- Balance --}}
                @if (auth()->user()->role === 3)
                    <div class="form-group">
                        <label class="text-primary">Баланс</label>
                        <input class="form-control" type="number" step="0.01" wire:model="balance"
                               placeholder="{{ $manager->balance }}" autocomplete="off">
                    </div>
                @endif

                {{-- Phone --}}
                <div class="form-group">
                    <label class="text-primary">Мобильный</label>
                    <input class="form-control" type="tel" wire:model="phone"
                           placeholder="{{ $manager->phone }}">
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label class="text-primary">E-mail</label>
                    <input class="form-control" type="email" wire:model="email"
                           placeholder="{{ $manager->email }}">
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label class="text-primary">Сменить пароль</label>
                    <input class="form-control" type="password" wire:model="password" placeholder="********">
                </div>
            </div>

            {{-- Submit--}}
            <button type="submit" wire:click.prevent="updateManager" class="btn btn-success mt-3">
                Обновить
            </button>
        </form>
    </div>
</div>
