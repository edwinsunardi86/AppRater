<style>
  /* mengatur ukuran canvas tanda tangan  */
  canvas {
      border: 1px solid #ccc;
      border-radius: 0.5rem;
      width: 100%;
      height: 400px;
  }
</style>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-gradient-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link nav-link">
          <img src="/images/LOGO-PT-SOS.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
          <span class="brand-text font-weight-light">PT SOS Indonesia</span>
        </a>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user-cog"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <a href="/change_password" class="dropdown-item">
            <i class="fas fa-key"></i> Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-sm">
            <i class="fas fa-sign-out-alt"></i> Log Out
          </a>
        </div>
      </li>
      <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Sign Out</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin ingin sign out?</p>
        </div>
        <div class="modal-footer justify-content-around">
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Iya</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


