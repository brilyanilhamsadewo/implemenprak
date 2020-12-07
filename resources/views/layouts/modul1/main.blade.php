<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'test')
    </title>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ asset('/assets/fontawesome/css/all.min.css') }}">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/gogi-bundle.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/assets/css/gogi-app.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/custom-global.css') }}" type="text/css">

    {{-- Extra CSS --}}
    @yield('extra-css')
</head>
<body class="scrollable-layout">
    {{-- Start Preloader --}}
    {{-- End of Preloader --}}

    {{-- Sidebar Group --}}
    {{-- @include('layouts/modul1/sidebar-group') --}}

    {{-- Start Layout Wrapper --}}
    <div class="layout-wrapper">

        {{-- Header --}}
        @include('layouts/header')

        {{-- Start Content Wrapper --}}
        <div class="content-wrapper">

            {{-- Navigation --}}
            @include('layouts/modul1/navigation')

            {{-- Start Content Body --}}
            <div class="content-body">

                {{-- Content --}}
                @yield('content')

                {{-- Footer --}}
                @include('layouts/footer')

            </div>
            {{-- End of Content Body --}}

        </div>
        {{-- End of Content Wrapper --}}
        <div class="modal" tabindex="-1" role="dialog" id="myModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Session habis</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Sesion habis</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Login</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
    </div>
    {{-- End of Layout Wrapper --}}
    
    {{-- Gogi Script --}}
    <script src="{{ asset('/assets/gogi/vendors/gogi-bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/assets/js/gogi-app.min.js') }}"></script>

    {{-- Fontawesome --}}
    <script src="{{ asset('/assets/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('/assets/js/custom-global.js') }}"></script>

    <script type="text/javascript">
      var idleTime = 0;
      $(document).ready(function () {
          //Increment the idle time counter every minute.
          var idleInterval = setInterval(timerIncrement, 30000); // 30 Detik
          //Zero the idle timer on mouse movement.
          $(this).mousemove(function (e) {
              idleTime = 0;
          });
          $(this).keypress(function (e) {
              idleTime = 0;
          });
      });
      function timerIncrement() {
          idleTime = idleTime + 1;
          if (idleTime > 30) { // 30 minutes
            $('#myModal').modal('show');
            if (idleTime > 60) { // 20 minutes
              $('#myModal').modal('hide');
              window.alert("Getaway Timeout");
            }
          }
      }
      function reload(){
        window.location.reload();
      }
      function stop(){
        $('#myModal').modal('hide');
        window.alert("Getaway Timeout");
      }
    </script>

    {{-- Extra Script --}}
    @yield('extra-script')
    
</body>
</html>