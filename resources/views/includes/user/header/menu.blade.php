{{-- This menu used twice (in burger.blade.php and nav-left.blade.php) --}}
{{-- Every nav item accepts class (margin-right) used only on nav-left --}}
{{-- Dropdowns accepts classes (drop_classes) (in nav-left we want absolute positioning and in burger stacking) --}}
{{-- Dropdown trigger btn accepts classes (drop_trigger_classes) --}}

@php
$classes = 'bg-gray-100 bg-opacity-10 rounded';
@endphp

{{-- Link --}}
<li class="group nav-left__item {{ $margin_class ?? '' }}">
  <a href="{{ route('homepage') }}" class="flex items-center py-2 px-3 h-full text-medium text-gray-400 group-hover:text-gray-100 hover:bg-slightly-lighter rounded">
    <svg class="mr-2 h-5 w-5 mb-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
      <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
    </svg>
    {{ __('Главная') }}
  </a>
</li>

{{-- Market Dropdown --}}
<li class="group nav-left__item relative {{ \Utils::isCurrent('trade', $classes) }} {{ $margin_class ?? '' }}" x-data="{ show: false }" x-cloak>
  <button class="dropdown-btn flex items-center text-medium {{ $drop_trigger_classes }} {{ \App\Helpers\Utils::checkLinks('trade') === 'active' ? 'text-white' : 'text-gray-400 group-hover:text-gray-100' }} rounded" type="button" x-on:click="show = !show" :class="{'active': show, 'bg-slightly-lighter': show}">
    <svg class="mr-2 h-5 w-5 mb-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
      <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
    </svg>
    <p class="inline-flex items-center justify-center">
      {{ __('Рынок') }}

      <svg class="ml-1 h-5 w-5 mt-px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </p>
  </button>

  <ul class="flex flex-col items-start origin-top overflow-hidden mt-3 {{ $drop_classes ?? '' }}" x-show="show" x-on:click.away="show = false" @include('includes.animation.dropdown_transition') style="z-index: 1000;">
    <li class="inline-block w-full">
      <a href="{{route('crypto')}}" class="flex items-center font-normal text-gray-300 hover:text-white bg-gray-700 bg-opacity-50 transition ease-in duration-100 p-3">
        <svg class="mr-2 h-5 w-5 mb-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
        </svg>
        {{ __('Криптовалютный') }}
      </a>
    </li>
    <li class="inline-block w-full">
      <a href="{{route('forex')}}" class="flex items-center font-normal text-gray-300 hover:text-white bg-gray-700 bg-opacity-50 transition ease-in duration-100 p-3">
        <svg class="mr-2 h-5 w-5 mb-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
        </svg>
        {{ __('Фондовый') }}
      </a>
    </li>
    <li class="inline-block w-full">
      <a href="{{route('commodity')}}" class="flex items-center font-normal text-gray-300 hover:text-white bg-gray-700 bg-opacity-50 transition ease-in duration-100 p-3">
        <svg class="mr-2 h-5 w-5 mb-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
        </svg>
        {{ __('Товарно-сырьевой') }}
      </a>
    </li>
  </ul>
</li>

{{-- ICO Dropdown --}}
<li class="group nav-left__item relative {{ \Utils::isCurrent('ico', $classes) }} {{ $margin_class ?? '' }}" x-data="{ show: false }" x-cloak>
  <button type="button" class="dropdown-btn flex items-center text-medium {{ $drop_trigger_classes }} {{ \App\Helpers\Utils::checkLinks('ico') === 'active' ? 'text-white' : 'text-gray-400 group-hover:text-gray-100' }} rounded" x-on:click="show = !show" :class="{'active': show, 'bg-slightly-lighter': show}">
    <svg class="mr-2 h-5 w-5 mb-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
      <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
      <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
    </svg>
    <p class="inline-flex items-center justify-center">
      {{ __('ICO') }}
      <svg class="ml-1 h-5 w-5 mt-px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </p>
  </button>

  <ul class="flex flex-col items-start origin-top overflow-hidden mt-3 {{ $drop_classes ?? '' }}" x-show="show" x-on:click.away="show = false" @include('includes.animation.dropdown_transition')>
    @if(count($icos) > 0)
    @foreach($icos as $i)
    <li class="inline-block w-full">
      <a href="{{ route('user.ico.show', $i->slug) }}" class="flex items-center uppercase font-normal text-gray-300 hover:text-white bg-gray-700 bg-opacity-50 transition ease-in duration-100 p-3">
        <svg class="mr-2 h-5 w-5 mb-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
          <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
        </svg>
        {{$i->title}}
      </a>
    </li>
    @endforeach
    @else
    <li class="inline-block w-full">
      <p class="text-gray-600 py-2 px-4">
        {{ __('На данный момент ICO нет.') }}
      </p>
    </li>
    @endif
  </ul>
</li>

{{-- Link --}}
<li class="group nav-left__item {{ \Utils::isCurrent('transactions', $classes) }} {{ $margin_class ?? '' }}">
  <a href="{{ route('user.transactions') }}" class="flex items-center py-2 px-3 h-full text-medium {{ \App\Helpers\Utils::checkLinks('transactions') === 'active' ? 'text-white' : 'text-gray-400 group-hover:text-gray-100' }} hover:bg-slightly-lighter rounded">
    <svg class="mr-2 h-5 w-5 mb-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
      <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
    </svg>

    {{ __('Транзакции') }}
  </a>
</li>

{{-- Link --}}
<li class="group nav-left__item {{ \Utils::isCurrent('history', $classes) }} {{ $margin_class ?? '' }}">
  <a href="{{ route('user.history') }}" class="flex items-center py-2 px-3 h-full text-medium {{ \App\Helpers\Utils::checkLinks('history') === 'active' ? 'text-white' : 'text-gray-400 group-hover:text-gray-100' }} hover:bg-slightly-lighter rounded">
    <svg class="mr-2 h-5 w-5 mb-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
      <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z" />
      <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z" />
      <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z" />
    </svg>

    {{ __('Архивы') }}
  </a>
</li>
