<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shayna - Admin</title>
    <meta name="description" content="ShaynaAdmin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- include CSS -->
    @include('includes.style')
    
</head>

<body>
        <!-- include sidebar -->
        @include('includes.sidebar')
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
            @include('includes.nav')
        <!-- /#header -->

        <!-- Content -->
        <div class="content">
            @yield('main')
        </div>
        <!-- /.content -->
        
        <div class="clearfix"></div>

    </div>

    <!-- Scripts -->
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
    
</body>
</html>
