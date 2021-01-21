<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Website Database Absensi</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url("mahasiswa")?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3" position="fixed">UNIVERSITAS </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url("mahasiswa")?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Halaman Utama</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url("mahasiswa")?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Mahasiswa</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url("dosen")?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Dosen</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url("matakuliah")?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Matakuliah</span></a>
      </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Absensi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Teknik Komputer:</h6>
            <a class="collapse-item" href="<?php echo site_url('absensi/absen_rlistrik');?>">Rangkaian Listrik</a>
            <a class="collapse-item" href="<?php echo site_url('absensi/absen_jarkom');?>">Jaringan Komputer</a>
            <a class="collapse-item" href="<?php echo site_url('absensi/absen_wdesign');?>">Website Design</a>
            <a class="collapse-item" href="<?php echo site_url('absensi/absen_ai');?>">Artificial intelligence</a>
            <a class="collapse-item" href="<?php echo site_url('absensi/absen_animasi');?>">Animasi 3D</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Kartu Rencana Studi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="<?php echo site_url('krs/krs_ai');?>">Artificial intelligence</a>
            <a class="collapse-item" href="<?php echo site_url('krs/krs_animasi');?>">Animasi 3D</a>
            <a class="collapse-item" href="<?php echo site_url('krs/krs_jarkom');?>">Jaringan Komputer</a>
            <a class="collapse-item" href="<?php echo site_url('krs/krs_wdesign');?>">Website Design</a>
            <a class="collapse-item" href="<?php echo site_url('krs/krs_rlistrik');?>">Rangkaian Listrik</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pengaturan Admin</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pengaturan Admin :</h6>
            <a class="collapse-item" href="register.html">Daftar Admin Baru</a>
            <a class="collapse-item" href="forgot-password.html">Lupa Password</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <h1 class="h3 mb-2 text-gray-800">DATA ABSENSI MAHASISWA</h1>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information --> 
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow aid_mkated--grow-in" aria-labelledby="userDropdown">
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary">DATA ABSENSI MATAKULIAH ARTIFICIAL INTELLIGENCE</h3>
                            <div class="col-md-12 text-right">
                                <?php echo anchor(site_url('absensi/absen_ai/tambah'),'Absen Baru', 'class="btn btn-primary"'); ?>
                            </div>
                        </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                <tr>
                <th>No.</th>                
                <th>TANGGAL ABSEN</th>
                <th>NAMA </th>
                <th>NIM</th>
                <th>WAKTU ABSEN</th>
                <th>PENGATURAN</th>
            </tr></thead><tbody><?php
            $start=0;
            foreach ($absen_ai as $a)
            {
                ?>
                <tr>
			      <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $a->tanggal ?></td>
            <td><?php echo $a->name ?></td>
            <td><?php echo $a->nim ?></td>
            <td><?php echo $a->waktu?></td>

			<td style="text-align:center" width="200px">
        <?php 
        echo anchor('absensi/absen_ai/hapus/'. $a->id,'Hapus');  
				?>
			</td>
		</tr>
                <?php
            }
            ?>
           </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Zaky Akbar Alfarid 2020 Semoga Sukses</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Anda Ingin Keluar ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo site_url('login');?>">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/jquery/jquery.min.js');?> "></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js');?> "></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js');?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js');?> "></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js');?>"></script>
  <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js');?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/js/demo/datatables-demo.js');?>"></script>

</body>

</html>