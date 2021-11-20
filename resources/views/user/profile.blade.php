@extends('layouts.user')

@section('title', ucfirst(auth()->user()->name))

@section('data-title', __('Редактировать профиль'))

@section('content')
  <div class="card | w-full max-w-3xl my-2 md:my-0 mx-auto" x-data="{ active: 1, activeChildTab: 1, activePaymentTab: 1 }"
    x-cloak>
    {{-- Tabs --}}
    <ul class="tabs-wrapper">
      <li class="flex-grow">
        <button class="tab" type="button" :class="{'active': active === 1}" @click="active = 1">
          <svg class="tab-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
              clip-rule="evenodd" />
          </svg>
          {{ __('Информация') }}
        </button>
      </li>
      <li class="flex-grow">
        <button class="tab" type="button" :class="{'active': active === 2}" @click="active = 2">
          <svg class="tab-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
            <path fill-rule="evenodd"
              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
              clip-rule="evenodd" />
          </svg>
          {{ __('Пароль') }}
        </button>
      </li>
      <li class="flex-grow">
        <button class="tab" type="button" :class="{'active': active === 3}" @click="active = 3">
          <svg class="tab-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
            <path fill-rule="evenodd"
              d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
              clip-rule="evenodd" />
          </svg>
          {{ __('Вывести') }}
        </button>
      </li>
      <li class="flex-grow">
        <button class="tab" type="button" :class="{'active': active === 4}" @click="active = 4">
          <svg class="tab-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
              clip-rule="evenodd" />
          </svg>
          {{ __('Верификация') }}
        </button>
      </li>
    </ul>

    {{-- Tab content --}}
    <div class="tab-content">
      {{-- tab1 --}}
      <div x-show="active === 1">
        @livewire('user.info.update-info')
      </div>
      {{-- tab2 --}}
      <div x-show="active === 2">
        @livewire('user.info.update-password')
      </div>
      {{-- tab3 --}}
      <div x-show="active === 3">
        @include('includes.user.profile-tabs.withdrawals')
      </div>
      {{-- tab4 --}}
      <div x-show="active === 4">
        @include('includes.user.profile-tabs.verification')
      </div>
    </div>
  </div>
@endsection
