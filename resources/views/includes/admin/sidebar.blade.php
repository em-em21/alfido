<aside class="main-sidebar sidebar-dark-primary elevation-4" x-data>
	{{-- Sidebar --}}
	<div class="sidebar">
		{{-- Sidebar Menu --}}
		<nav>
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				{{-- <li class="nav-item">
					<a href="{{ route('admin.account') }}" class="nav-link">
						<i class="nav-icon fa fa-user-circle" aria-hidden="true"></i>
						<p>
							Мой аккаунт
						</p>
					</a>
				</li> --}}
				
				<li class="nav-item">
					<a href="{{ route('admin.index') }}" class="nav-link">
						<i class="nav-icon fas fa-users"></i>
						<p>
							Клиенты
						</p>
					</a>
				</li>

				@if (auth()->user()->role === 3)
					<li class="nav-item">
						<a href="{{ route('admin.managers') }}" class="nav-link">
							<i class="nav-icon fas fa-user-tie"></i>
							<p>
								Менеджеры
							</p>
						</a>
					</li>
				@endif

				<li class="nav-item">
					<a href="{{ route('admin.ico.index') }}" class="nav-link">
						<i class="nav-icon fas fa-chart-line"></i>
						<p>
							ICO
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.chat.index') }}" class="nav-link">
						<i class="nav-icon fas fa-headset"></i>
						<p>
							Чат
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('verification.index') }}" class="nav-link">
						<i class="nav-icon fas fa-user-check"></i>
						<p>
							Верификация
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('withdrawals.index') }}" class="nav-link">
						<i class="nav-icon far fa-credit-card"></i>
						<p>
							Вывод средств
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('admin.converter') }}" class="nav-link">
						<i class="nav-icon fas fa-search-dollar"></i>
						<p>
							Конвертер валют
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('outreaches.index') }}" class="nav-link">
						<i class="nav-icon fas fa-comments"></i>
						<p>
							Обратная связь
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('settings.create') }}" class="nav-link">
						<i class="nav-icon fas fa-sliders-h"></i>
						<p>
							Настройки
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a 	class="nav-link"
						href="#"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Выход
						</p>
						<form id="logout-form"
							action="{{ route('logout') }}"
							method="POST"
							class="d-none">
							@csrf
						</form>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
