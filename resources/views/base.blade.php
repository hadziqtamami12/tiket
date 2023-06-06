<!DOCTYPE html>


<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logo.png">
  <link rel="icon" type="image/png" href="../assets/img/logo.png">

  <title>
    {{ config('app.name') }}
  </title>
  <!-- <link href="../assets/css/app.css" rel="stylesheet" /> -->
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/vendors/css/vendor.bundle.base.css" rel="stylesheet">
  <link href="../assets/vendors/mdi/css/materialdesignicons.min.css" rel="stylesheet">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">



  <!-- Styles -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
  <!-- Or for RTL support -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

  <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">



  <style>
    body {
      background-color: #fbfbfb;
    }


    li:hover {
      cursor: pointer;

    }


    @media (min-width: 991.98px) {
      .sidebar {
        margin-top: 25px;

      }

      .content {
        padding-left: 240px;
        margin-top: 100px;

      }
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      padding: 58px 0 0;
      /* Height of navbar */
      box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
      width: 240px;
      z-index: 999;
    }

    @media (max-width: 991.98px) {
      .sidebar {
        width: 100%;
      }
    }

    .sidebar .active {
      border-radius: 5px;
      box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
    }

    .sidebar-sticky {
      position: relative;
      top: 0;
      height: calc(100vh - 48px);
      padding-top: 0.5rem;
      overflow-x: hidden;
      overflow-y: auto;
      /* Scrollable contents if viewport is shorter than content. */
    }

    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }

    .h-custom {
      height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
      .h-custom {
        height: 100%;
      }
    }
  </style>


</head>

<body>

  @yield('login')
  @yield('regis')

  @yield('navbar')
  @yield('sidebar')
  <main class="content">
    @yield('content')
  </main>




  @if(session()->has('success'))
  <div class="alert alert-info position-fixed top-50 start-50 translate-middle ps-5 pe-5" id="success-alert" role="alert">
    <strong class="text-black">Berhasil ! {{ session('success')}} </strong>
  </div>
  @endif

  @if(session()->has('danger'))
  <div class="alert alert-danger position-fixed top-50 start-50 translate-middle ps-5 pe-5" id="danger-alert" role="alert">
    <strong class="text-dark">Gagal ! {{ session('danger')}} </strong>
  </div>
  @endif

  @if(session()->has('warning'))
  <div class="alert alert-warning position-fixed top-50 start-50 translate-middle ps-5 pe-5" id="warning-alert" role="alert">
    <strong class="text-dark">Peringatan ! {{ session('warning')}} </strong>
  </div>
  @endif



  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="../assets/js/chart.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>






</body>

<script>
  $(".alert").fadeTo(3000, 500).slideUp(500, function() {
    $(".alert").slideUp(500);
  });

  $('#datatable').DataTable({});

  $('.select2').select2({
    dropdownParent: $("#modal-add"),
    theme: "bootstrap-5",
  });



  $('.select2-edit').select2({
    dropdownParent: $("#modal-edit"),
    theme: "bootstrap-5",
  });
</script>

</html>