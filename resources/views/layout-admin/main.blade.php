<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="{{ asset('/resources/demos/style.css') }}">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('../css/sb-admin-2.css') }}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{ asset('../../vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

  

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

  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#pilih_opd').hide();  

      $('#id_role').on('change', function(){
        var id = $(this).val();

        if(id == 2){
          $('#pilih_opd').show();
        }else{
          $('#pilih_opd').hide(); 
        }
      });

    //   $('#role').on('change', function(){
    //     var id = $(this).val();
    //     //console.log(id);
    //     if (id) {
    //       $.ajax({
    //         url: '/opd/' + id,
    //         type: 'GET',
    //         data: {
    //           '_token': '{{ csrf_token() }}'
    //       },
    //       dataType: 'json',
    //       succes: function(data){
    //         if (data){
    //           $('#opd').empty();
    //           $('#opd').append('<option value="">-Pilih-</option>');
    //           $.each(data, function(key, opd) {
    //             $('select[name="nama_opd"]').append(
    //               '<option value="' + opd.id + '">' + opd.nama_opd + '</option>'
    //             );
    //           });
    //           } else {
    //             $('#opd').empty();
    //           }
    //         }
    //       })
    //     }
    //   });
    });
    
  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
            $('#id_domain').on('change', function() {
               var id = $(this).val();
               if(id) {
                   $.ajax({
                       url: '/getAspek/'+id,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                         if(data){
                            $('#id_aspek').empty();
                            $('#id_aspek').append('<option hidden>Pilih Aspek</option>'); 
                            $.each(data, function(key, id_aspek){
                                $('select[name="id_aspek"]').append('<option value="'+ id_aspek.id +'">' + id_aspek.nama_aspek+ id_aspek.deskripsi+  '</option>');
                            });
                        }else{
                            $('#id_aspek').empty();
                        }
                     }
                   });
               }else{
                 $('#id_aspek').empty();
               }
            });
            });
        </script>

      <script>
      $(document).ready(function(){
        $('#myDIV').hide(); 
      });
      function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
      </script>


      <script>
      $(document).ready(function(){
        $('#myDIV').hide(); 
      });
      function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
      </script>

<script>
  $(document).ready(function(){
    $('#myDIV2').hide(); 
  });
      function myFunction2() {
        var x = document.getElementById("myDIV2");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
      </script>

<script>
  $(document).ready(function(){
    $('#myDIV3').hide(); 
  });
      function myFunction3() {
        var x = document.getElementById("myDIV3");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
      </script>

<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto").remove();
      });
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <script>
        $(function () {
            $(document).ready(function () {
                $('#fileUploadForm').ajaxForm({
                    beforeSend: function () {
                        var percentage = '0';
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage+'%', function() {
                          return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },
                    complete: function (xhr) {
                        console.log('File has uploaded');
                    }
                });
            });
        });
    </script>


  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>



  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

  <!-- <script>
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
</script> -->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    
    <script src="{{ asset('../../vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('../../js/demo/datatables-demo.js') }}"></script>

    @stack('scripts')

</body>

</html>