<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" class="css">
    <style>
      .bg-custom {
        background-color: #012B6B !important;
      }
      .logo {
        height: 40px; /* Ukuran logo */
        margin-right: 10px; /* Spasi antara logo dan teks */
      }
    </style>
    <title>BCA PAYROLL</title>
  </head>
  <body>
    <div class="container-fluid">
        <!-- Header -->
        <div class="row">
            <div class="col-md-12 bg-custom py-5"> 
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <!-- <img src="assets/images/logo-bca.png" alt="Logo BCA" class="logo"> -->
                        <h1 class="text-white mb-0">BCA PAYROLL</h1>
                    </div>
                    
                    <div class="dropdown float-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-file-earmark-person-fill"></i> USER
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"> {{ Auth::user()->name ?? "" }}</a>
                                <!-- Tombol Logout dengan Form -->
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a>
                                
                                <!-- Form Logout -->
                                <form id="logout-form" method="POST" action="{{ asset('/logout') }}" style="display: none;">
                                    @csrf
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <div class="col-md-2">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link {{ isset($key) && $key == 'home' ? 'active' : '' }}" href="/home">Home</a>
                        <a class="nav-link {{ isset($key) && $key == 'perusahaan' ? 'active' : '' }}" href="/perusahaan">Perusahaan</a>
                        <a class="nav-link {{ isset($key) && $key == 'transaksi' ? 'active' : '' }}" href="/transaksi">Transaksi</a>                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-10">
            <div class="content mt-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
  </body>
</html>
