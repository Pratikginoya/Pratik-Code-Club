<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="icon" type="image/png" href="{{ asset('admin/img/favicon-32x32.png') }}">
  <link rel="manifest" href="/manifest.json">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
    href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">

  <!-- Ion Slider -->
  <link rel="stylesheet" href="{{asset('admin/plugins/ion-rangeslider/css/ion.rangeSlider.min.css')}}">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-slider/css/bootstrap-slider.min.css')}}">

  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('admin/plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('admin/plugins/dropzone/min/dropzone.min.css')}}">

  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{asset('admin/plugins/codemirror/codemirror.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/codemirror/theme/monokai.css')}}">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="{{asset('admin/plugins/simplemde/simplemde.min.css')}}">

  <!-- jsGrid -->
  <link rel="stylesheet" href="{{asset('admin/plugins/jsgrid/jsgrid.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/jsgrid/jsgrid-theme.min.css')}}">

  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fullcalendar/main.css')}}">

  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{asset('admin/plugins/ekko-lightbox/ekko-lightbox.css')}}">

  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

  <!-- pace-progress -->
  <link rel="stylesheet" href="{{asset('admin/plugins/pace-progress/themes/black/pace-theme-flat-top.css')}}">

  <!-- flag-icon-css -->
  <link rel="stylesheet" href="{{asset('admin/plugins/flag-icon-css/css/flag-icon.min.css')}}">

  <style>
    .color-palette {
      height: 35px;
      line-height: 35px;
      text-align: right;
      padding-right: .75rem;
    }

    .color-palette.disabled {
      text-align: center;
      padding-right: 0;
      display: block;
    }

    .color-palette-set {
      margin-bottom: 15px;
    }

    .color-palette span {
      display: none;
      font-size: 12px;
    }

    .color-palette:hover span {
      display: block;
    }

    .color-palette.disabled span {
      display: block;
      text-align: left;
      padding-left: .75rem;
    }

    .color-palette-box h4 {
      position: absolute;
      left: 1.25rem;
      margin-top: .75rem;
      color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      display: block;
      z-index: 7;
    }
  </style>

  <!-- for keywords tag -->
  <style>
    .tag {
      display: inline-flex;
      align-items: center;
      border-radius: 12px;
      padding: 5px 10px;
      margin: 5px;
      color: white;
      font-size: 14px;
    }

    .keyword {
      margin-right: 10px;
    }

    .close-icon {
      font-size: 16px;
      cursor: pointer;
    }

    .blue {
      background-color: #007bff;
    }

    .red {
      background-color: #dc3545;
    }

    .green {
      background-color: #28a745;
    }

    .orange {
      background-color: #fd7e14;
    }

    .gray {
      background-color: #6c757d;
    }
  </style>
  @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  @include('layouts/header')

  @if (isset($slot))
      {{ $slot }} <!-- For views that return content directly -->
  @else
      @yield('content') <!-- For views that extend this layout and provide content -->
  @endif

  @include('layouts/footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  @include('layouts/scripts')
  @yield('scripts')
  @livewireScripts
  <script>
    Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
      respond(() => {
        // Runs after a response is received but before it's processed...
        $(document).ready(function () {

        });
      })

      succeed(({ snapshot, effect }) => {
        // Runs after a successful response is received and processed
        // with a new snapshot and list of effects...
        $(document).ready(function () {

        });
      })

      fail(() => {
        // Runs if some part of the request failed...
        $(document).ready(function () {

        });
      })
    });
  </script>

  <script>
      document.addEventListener('livewire:init', function () {
          Livewire.on('goBack', function () {
              window.history.back();
          });
      });
  </script>
</body>

</html>