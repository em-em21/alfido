@extends('layouts.user')

{{-- Page Title --}}
@section('title', __('Трейдинг'))

  {{-- Main Platform Content Layout --}}
@section('content')
  {{-- Loader --}}
  {{-- @include('includes.global.loader', [
  'timeout' => 2750
  ]) --}}

  <div class="bs_widget_wrapper">
    {{-- Chart --}}
    <div>
       @yield('widget-big')
    </div>

    {{-- BS Modal & mini widget --}}
    <div>
      {{-- buy-sell modal --}}
      <div class="card">
        @yield('open-deal-component')
      </div>
      {{-- mini widget --}}
      <div class="card">
         @yield('widget-small')
      </div>
    </div>
  </div>

  {{-- table --}}
  <div class="card w-full my-6 relative">
    {{-- Loading Spinner (used for deals table) --}}
    <div
      class="page-spinner-wrapper w-full h-full hidden items-center justify-center absolute top-0 left-0 right-0 bottom-0 z-50 bg-gray-900 bg-opacity-70">
      @include('includes.user.spinner', ['class' => 'page-spinner'])
    </div>

    {{-- Show user's deals --}}
    @yield('deals-table')
  </div>

  {{-- marque --}}
  @include('includes.user.tradingview.ticker')
@endsection

{{-- Scripts --}}
@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      Echo.channel('changeUserData')
        .listen('AdminChangedUsersData', () => {
          Livewire.emit('getBalance')
          Livewire.emit('reloadTable')
        })

      Echo.channel('changeTaxes')
        .listen('ProfitChanged', () => {
          document.location.reload()
        })
    })
  </script>
@endpush
