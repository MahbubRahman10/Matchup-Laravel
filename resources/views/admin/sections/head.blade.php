	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="token" id="token" value="{{ Auth::check() ? Auth::id() : null }}">

    @yield('title')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- ICON -->
    {{-- <link rel="icon" type="image/png" href="/image/faviconicon.png"> --}}

    
    <!-- JS -->  
    <script type="text/javascript" src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/fontawesome.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/tinymce/tinymce.min.js') }}"></script>

    <!-- Styles -->    
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.min.css') }}">
   {{--  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css.map') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/adminstyle.css') }}">

   
    <script type="text/javascript">
     $(document).ready(function() {
        $(".dropdown-toggle").dropdown();
    });
   </script>