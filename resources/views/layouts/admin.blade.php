<!DOCTYPE html>
<html lang="ru" style="background: #282828;">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('includes.global.favicon')
  <title>@yield('page-title')</title>
  {{-- styles --}}
  <link rel="stylesheet" href="{{ asset('css/plugins/adminlte.css') }}">
  <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-datatables.css') }}">
  <link rel="stylesheet" href="{{ asset('css/plugins/font-awesome/fa.css') }}">
  @push('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
  </head>

  <body class="hold-transition sidebar-collapse sidebar-mini dark layout-fixed admin" id="layer-admin" data-title="admin">
    {{-- Wrapper --}}
    <div class="wrapper">
      {{-- Navbar --}}
      @include('includes.admin.navbar')

      {{-- Main Sidebar Container --}}
      @include('includes.admin.sidebar')

      {{-- Content Wrapper. Contains page content --}}
      <div class="content-wrapper">
        <div class="title">
          <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="content">
          @yield('admin-content')
        </div>
      </div>
    </div>

    {{-- scripts --}}
    <script type="text/javascript" src="{{ asset('js/plugins/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/btstrp.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/adminlte.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/datatables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/pusher.js') }}"></script>
    @stack('scripts')
    <script type="text/javascript" src="{{ asset('js/scripts/admin.js') }}"></script>
  </body>

  </html>
