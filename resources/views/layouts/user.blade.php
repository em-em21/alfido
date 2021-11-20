<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-full bg-gray-900 box-border">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('includes.global.favicon')
  <title>{{ config('app.name') }} | @yield('title')</title>

  {{-- preload --}}
  <link rel="preload" href="{{ asset('css/app.css') }}" as="style">
  <link rel="preload" href="{{ asset('css/tailwind.css') }}" as="style">
  <link rel="preload" href="{{ asset('js/scripts/user.js') }}" as="script">

  {{-- styles --}}
  @livewireStyles
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
  @stack('styles')
</head>

<body id="layer-user" x-cloak class="font-sans h-full" data-platform="true" x-data="{ 
    showPayModal: false, 
    modalFocused: false, 
    activePay: null, 
    showBurger: false 
   }">
  {{-- Wrapper --}}
  <div class="flex flex-col">
    @if (auth()->user()->managers()->exists())
      @livewire('user.chat')
    @endif
    @include('includes.user.modals.payment_modal')
    @include('includes.user.header')

    {{-- content wrapper --}}
    <div class="min-h-screen bg-[#212121]" :class="{'darken': showBurger}">
      <div class="container">
        {{-- Breadcrumbs --}}
        @include('includes.user.breadcrumbs')

        <main class="content py-1 w-full">
          @include('includes.user.tail-alerts')

          @yield('content')
        </main>
      </div>
    </div>
  </div>

  {{-- scripts --}}
  @livewireScripts
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script type="module" src="{{ asset('js/scripts/user.js') }}"></script>
  @stack('scripts')
</body>

</html>
