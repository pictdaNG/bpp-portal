<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=" ">
<head>  
  <meta charset="utf-8" />
  <title>{{ 'e-Procurement' }}</title>
  <meta name="description" content="e-Procurement Services" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="shortcut icon" href=" {{ asset('/favicon.ico') }}" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/icon.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/font.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" />  

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="" >
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
        @yield('content')
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>Powered by PICTDA<br>&copy; 2019</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <!-- <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <!-- App -->
  <script src="{{ asset('js/app.js') }}"></script>  
  <script src="{{ asset('js/slimscroll/jquery.slimscroll.min.js') }}"></script>
  <script src="{{ asset('js/app.plugin.js') }}"></script>
  <script>
    @if(Session::has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch(type) {
        case 'info':
          toastr.options.fadeOut = 9000;
          toastr.info("{{ Session::get('message') }}");
          break;
        case 'warning':
          toastr.options.fadeOut = 9000;
          toastr.warning("{{ Session::get('message') }}");
          break;
        case 'success':
          toastr.options.fadeOut = 9000;
          toastr.success("{{ Session::get('message') }}");
          break;
        case 'error':
          toastr.options.fadeOut = 9000;
          toastr.error("{{ Session::get('message') }}");
          break;
      }
    @endif
  </script>
</body>
</html>