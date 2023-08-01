<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('layout-admin.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('layout-admin.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
          </div>

          <!-- Content Row -->
        @yield('navbar')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('layout-admin.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

  <script>
  $( function() {
    $( "#date" ).datepicker();
  } );
  </script>

<script>
$( function() {
  $( "#date" ).datepicker({
    dateFormat: "yy-mm-dd"
  });
} );
</script>



<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#pilih_opd').hide();  

      $('#nama_role').on('change', function(){
        var id = $(this).val();

        if(id == 2){
          $('#pilih_opd').show();  
        }else{
          $('#pilih_opd').hide();  
        }
      });

      $('#role').on('change', function(){
        var id = $(this).val();
        //console.log(id);
        if (id) {
          $.ajax({
            url: '/opd/' + id,
            type: 'GET',
            data: {
              '_token': '{{ csrf_token() }}'
          },
          dataType: 'json',
          succes: function(data){
            if (data){
              $('#opd').empty();
              $('#opd').append('<option value="">-Pilih-</option>');
              $.each(data, function(key, opd) {
                $('select[name="nama_opd"]').append(
                  '<option value="' + opd.id + '">' + opd.nama_opd + '</option>'
                );
              });
              } else {
                $('#opd').empty();
              }
            }
          })
        }
      });
    });
  </script>

</body>

</html>