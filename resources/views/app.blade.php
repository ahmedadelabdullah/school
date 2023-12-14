@include('layouts.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->

@include('layouts.nav')
  <!-- /.navbar -->
  <div class="content-wrapper">
  <!-- Main Sidebar Container -->
  @include('layouts.breadcramp')

  @include('layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->

  @yield('content')
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layouts.scripts')
</body>
</html>
