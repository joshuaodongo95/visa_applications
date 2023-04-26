<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>{{ config('app.name', 'Visa Applications') }}</title>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">{{ config('app.name', 'Visa Applications') }}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/home">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Applications">
          <a class="nav-link"  href="{{ route('profile.index') }}">
            <i class="fa fa-fw fa-credit-card"></i>
            <span class="nav-link-text">My Applications</span>
          </a>
        </li>
        @can('application-list')
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Visa Applications">
          <a class="nav-link"  href="{{ route('applications.index') }}">
            <i class="fa fa-fw fa-credit-card"></i>
            <span class="nav-link-text">Visa Applications</span>
          </a>
        </li>
        @endcan
        @can('user-list')
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
          <a class="nav-link"  href="{{ route('users.index') }}">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li>
        @endcan
        @can('role-list')
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Roles">
          <a class="nav-link"  href="{{ route('roles.index') }}" >
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Roles</span>
          </a>
        </li>
        @endcan
        
        @can('agent-list')
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Agents">
          <a class="nav-link"  href="{{ route('agents.index') }}" >
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Agents</span>
          </a>
        </li>
        @endcan
        
        @can('fees-list')
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Fees">
          <a class="nav-link"  href="{{ route('fees.index') }}" >
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Fees</span>
          </a>
        </li>
        @endcan

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      @section("breadcrumb")

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Stage A</a>
          </li>
          <li class="breadcrumb-item">
            <a href="index.html">Stage B</a>
          </li>
          <li class="breadcrumb-item active">Current Page</li>
        </ol>

      @show

      <div class="row">
        <div class="col-12">
          @yield("content")
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © CoPre (U) Ltd {{date('Y')}}</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

            <a class="btn btn-primary" href="{{ route('logout') }}" 
            onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script> -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin.min.js') }}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{ asset('js/sb-admin-datatables.min.js') }}"></script>
    <script>

         var no_of_passports = document.getElementById("no_of_passports").value;
          var unit_cost = document.getElementById("unit_cost").value;
          var total = parseFloat(unit_cost) * no_of_passports

      function calc() 
        {
          var no_of_passports = document.getElementById("no_of_passports").value;
          var unit_cost = document.getElementById("unit_cost").value;
          var total = parseFloat(unit_cost) * no_of_passports
          if (!isNaN(total))
            document.getElementById("total").innerHTML = total
        }

    </script>
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
  
    $("#search" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           $('#search').val(ui.item.label);
           $("#agent_id").val(ui.item.id);
           console.log(ui.item); 
           return false;
        },
        
        focus: function(event, ui){
                    $("#search").val(ui.item.label);
                    $("#agent_id").val(ui.item.value);
                    return false;
                },
      });

      const $btnPrint = document.querySelector("#btnPrint");
      $btnPrint.addEventListener("click", () => {
          window.print();
      });
  
</script>
  </div>
</body>
</html>
