@extends('layouts.main')
@section('start')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">{{ $title }}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">{{ $title }}</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
@section('content')
  @foreach ($student as $student)
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-4 order-2 order-md-1">
            <div class="row">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="/dist/img/user1-128x128.jpg" alt="user image">
                </div>
                <h3 class="profile-username text-center">{{ $student->name }}</h3>
                <p class="text-muted text-center">{{ $student->email }}</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Mapel</b>
                    <a class="float-right">Jumlah mapel yg diambil</a>
                  </li>
                </ul>
                <a href="#" class="btn btn-primary btn-block"><b>Kirim Pesan</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="row">
              <div class="col-12">
                <h4>Aktivitas Terkini</h4>
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="/dist/img/user1-128x128.jpg" alt="user image">
                    <span class="username">
                      <a href="#">Jonathan Burke Jr.</a>
                    </span>
                    <span class="description">Shared publicly - 7:45 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-8 order-1 order-md-2">
            <h3 class="text-primary">{{ $student->kode_siswa }}</h3>
            <div class="text-muted">
              <p class="text-sm">Username
                <b class="d-block">{{ $student->username }}</b>
              </p>
            </div>

            <h5 class="mt-5 text-muted">Biodata</h5>
            <ul class="list-unstyled">
              <li>
                <a href="#" class="btn-link text-secondary"><i
                    class="far fa-fw fa-file-word"></i>{{ $student->alamat }}
                </a>
              </li>
              <li>
                <a href="#" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i>
                  {{ $student->alamat }}</a>
              </li>
              <li>
                <a href="#" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i>
                  {{ $student->nohp }}</a>
              </li>
            </ul>
            <div class="text-center mt-5 mb-3">
              <a href="#" class="btn btn-sm btn-primary">Add files</a>
              <a href="#" class="btn btn-sm btn-warning">Report contact</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  @endforeach
@endsection
