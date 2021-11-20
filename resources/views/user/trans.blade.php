@extends('layouts.user')

@section('title', __('Транзакции'))

@section('data-title', __('Транзакции'))

  @push('styles')
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-datatables.css') }}">
  @endpush

@section('content')
  {{-- User Transactions table --}}
  <div class="card table-responsive w-full max-w-5xl mt-5 mx-auto">
    <div class="card__header">
      <h1 class="card__header--title">
        {{ __('Пополнения баланса') }}
      </h1>
    </div>

    <div class="card__body pt-0 dark-themed-bootstrap-datatable">
      <table id="transactionsTable" class="table table-striped table-hover w-full" style="width:100%;">
        <thead>
          <tr>
            <th>{{ __('Сумма (USD)') }}</th>
            <th>{{ __('Источник') }}</th>
            <th>{{ __('Тип') }}</th>
            <th>{{ __('Дата') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transactions as $transaction)
            <tr>
              <td>{{ $transaction->amount }}</td>
              <td class="{{ $transaction->type === 2 ? 'text-red-400' : 'text-green-400' }}">
                {{ app()->getLocale() === 'ru' ? $transaction->reason : $gtr->translate($transaction->reason) }}
              </td>
              <td>{{ __($transaction->getTransType()) }}</td>
              <td class="text-gray-400">
                {{ App\Helpers\Utils::getDate($transaction->created_at) }}
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
      $('#transactionsTable').DataTable({
        responsive: true,
        @if (app()->getLocale() === 'ru')
          language: {
          emptyTable: 'На данный момент транзакций нет.',
          lengthMenu: 'Показать _MENU_ транзакций',
          zeroRecords: 'Ничего не найдено',
          info: 'Страница _PAGE_ из _PAGES_',
          infoEmpty: 'Транзакций нет',
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
