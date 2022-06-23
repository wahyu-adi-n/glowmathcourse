<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

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
      <div class="card-header text-center">
        <a href="/register" class="h3"><b>{{ $title }}</b></a>
      </div>
      <div class="card-body">
        <form action="/register" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" name="name" class="form-control @error('name') invalid-feedback @enderror"
              placeholder="Masukkan Nama" autofocus required value="{{ old('name') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <select name="level" class="form-control @error('level') invalid-feedback @enderror" required
              placeholder="Pilih Level">
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
          </div>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') invalid-feedback @enderror"
              placeholder="Masukkan Email" required value="{{ old('email') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') invalid-feedback @enderror"
              placeholder="Masukkan Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
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

</body>

</html>
