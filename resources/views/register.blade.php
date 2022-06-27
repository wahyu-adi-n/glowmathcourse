<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Glowmathcourse Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      @if (session()->has('fail'))
        <div class="fail" data-flashdata="{{ session('fail') }}"></div>
      @endif
      @if (session()->has('success'))
        <div class="success" data-flashdata="{{ session('success') }}"></div>
      @endif
      <div class="card-header text-center">
        <a href="/register" class="h3"><b>Register</b></a>
      </div>
      <div class="card-body">
        <div class="fail" data-flashdata=""></div>
        <form action="/register" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
              placeholder="Masukkan Nama" autofocus value="{{ old('name') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            {{-- @error('name')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror --}}
          </div>
          <div class="input-group mb-3">
            <select name="level" class="form-control @error('level') is-invalid @enderror" placeholder="Pilih Level">
              <option value="">Pilih Level</option>
              <option value="0">Siswa</option>
              <option value="1">Tentor</option>
              <option value="2">Admin</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-users"></span>
              </div>
            </div>
            {{-- @error('level')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror --}}
          </div>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
              placeholder="Masukkan Email" value="{{ old('email') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            {{-- @error('email')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror --}}
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
              placeholder="Masukkan Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            {{-- @error('password')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror --}}
          </div>
          <div class="row">
            <div class="col-lg-12">
              <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            </div>
          </div>
        </form>
        <p class="mb-0">
          <small class="d-block text-center mt-3">Kamu sudah punya akun ? <a href="/login">Masuk sekarang
              !</a></small>
        </p>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="plugins/jquery/jquery.min.js"></script>
  <script>
    const fail = $('.fail').data('flashdata');
    const success = $('.success').data('flashdata');

    if (fail) {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      Toast.fire({
        icon: 'error',
        title: fail
      });
    }

    if (success) {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      Toast.fire({
        icon: 'success',
        title: success
      });
    }
  </script>

</body>

</html>
