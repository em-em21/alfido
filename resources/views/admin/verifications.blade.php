@extends('layouts.admin')
@section('page-title', 'Верификация пользователей | '.config('app.name'))
@section('title', 'Запросы на верификацию')

@section('admin-content')
<div class="container-fluid">
    <div class="col-md-12 p-3">
        @include('includes.global.alerts')

        <div class="gallery mx-auto">
            @if(count($images) > 0)
				@foreach($images as $img)
					<div class="gallery-item">
						<div class="gallery-img_info">
							<h4>{{$img->user->surname}} {{$img->user->name}}</h4>
						</div>
						<div class="gallery-img_verify d-flex flex-column">
							
							<form action="{{ route('verification.update', $img->user->id) }}" method="POST" class="verifyForm mb-1">
								@method('PUT')
								@csrf
								
								<button class="btn verifyBtn" title="Верифицировать">
									<i class="fas fa-user-check"></i>
								</button>
							</form>
							
							<form action="{{ route('verification.destroy', $img->id) }}" method="POST" class="deleteRequest mb-1">
								@csrf
								@method('DELETE')
								
								<button class="btn" title="Удалить изображение">
									<i class="fas fa-minus-circle"></i>
								</button>
							</form>

						</div>
						<div class="gallery-img_img">
							<img src="{{asset($img->url)}}" alt="" class="gallery-img">
						</div>
					</div>
                @endforeach
            @else
                <p><em class="text-light">На данный момент запросы на верификацию отсутствуют.</em></p>
            @endif
        </div>
    </div>
</div>
@endsection