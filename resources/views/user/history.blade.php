@extends('layouts.user')

@section('title', __('История сделок'))

@section('data-title', __('История сделок'))

  @push('styles')
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-datatables.css') }}" />
  @endpush

@section('content')
  {{-- User Deals History Table --}}
  <div class="card table-responsive w-full max-w-5xl mt-5 mx-auto">
    <div class="card__header">
      <h1 class="card__header--title">
        {{ __('История сделок') }}
      </h1>
    </div>
    <div class="card__body pt-0 dark-themed-bootstrap-datatable">
      <table id="dealHistoryTable" class="table table-striped table-hover w-full" style="width:100%;">
        <thead>
          <tr>
            <th>{{ __('Рынок') }}</th>
            <th>{{ __('Акция') }}</th>
            <th>{{ __('Инвестиция') }}</th>
            <th>{{ __('Направление') }}</th>
            <th>{{ __('Профит') }}</th>
            <th>{{ __('Была закрыта') }}</th>
          </tr>
        </thead>
        <tbody style="overflow-x: scroll;">
          @foreach ($deals as $deal)
            <tr class="opacity-63 disabled">
              <td>{{ $deal->getDealMarket() }}</td>
              <td>
                <span class="text-teal-300">
                  {{ $deal->stock_naming }} | {{ $deal->stock_alias }}
                </span>
              </td>
              <td>
                <div class="flex items-center">
                  {{ $deal->investment }}
                  <svg fill="#d4d4d4" width="12" height="12" style="margin: 0 1px 0 0">
                    <use xlink:href="/sprite.svg#dollar"></use>
                  </svg>
                </div>
              </td>
              <td>
                <span class="{{ $deal->dest ? 'text-green-500' : 'text-red-500' }}">
                  {{ $deal->getDealDest() }}
                </span>
              </td>
              <td>
                <div class="flex items-center">
                  {{ $deal->profit }}
                  <svg fill="#d4d4d4" width="12" height="12" style="margin: 0 1px 0 0">
                    <use xlink:href="/sprite.svg#dollar"></use>
                  </svg>
                </div>
              </td>
              <td>
                {{ App\Helpers\Utils::getDate($deal->updated_at) }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/plugins/jquery.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables.js') }}"></script>
  <script defer>
    window.addEventListener('DOMContentLoaded', () => {
      $('#dealHistoryTable').DataTable({
        responsive: true,
        @if (app()->getLocale() === 'ru')
          language: {
          emptyTable: 'На данный момент сделок нет.',
          lengthMenu: 'Показать _MENU_ сделок',
          zeroRecords: 'Ничего не найдено',
          info: 'Страница _PAGE_ из _PAGES_',
          infoEmpty: 'Cделок нет',
          infoFiltered: '(filtered from _MAX_ total records)',
          search: 'Поиск:',
          paginate: {
          previous: 'Пред.',
          next: 'След.'
          }
          }
        @endif
      });
    });
  </script>
@endpush
