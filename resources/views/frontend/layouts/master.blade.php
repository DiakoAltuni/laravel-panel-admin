<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    @yield('head')
    <title>وبلاگ روکسو</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/css/all.css')}}" rel="stylesheet">

</head>

<body>
<div style="font-family: 'Times New Roman'">
<!-- Navigation -->
@yield('navigation')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
            @yield('content')
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            @yield('sidebar')
        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('/js/all.js')}}"></script>

</div>
</body>

</html>
