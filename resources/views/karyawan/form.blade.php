@extends('templates/header')

@section('contents')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        {{empty($result) ? 'tambah' : 'edit'}} Golongan
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('golongan')}}">Golongan</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        @include('templates/feedback')
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{empty($result) ? 'tambah' : 'edit'}} Data Golongan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{url('karyawan/add')}}" class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    @if (!empty($result))
                        {{ method_field('patch') }}
                    @endif
                  <div class="card-body">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" name="nik" id="nik" placeholder="Masukan Gaji Golongan" value="{{@$result->nik}}">
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Karyawan</label>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Golongan" value="{{@$result->nama}}">
                    </div>
                    <div class="form-group">
                        <label>Golongan</label>
                        <select class="form-control select2" style="width: 100%;" name="id_golongan">
                        <option hidden>Pilih Golongan</option>
                        @foreach (\App\Models\Golongan::all() as $golongan)
                            <option value="{{$golongan->id}}" {{ @$result->id_golongan == $golongan->id ? 'selected' : ''}}>{{$golongan->nama_golongan}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio1" name="jenis_kelamin" value="Laki-Laki" {{ (@$result->jenis_kelamin == "Laki-Laki" ? 'checked' : '') }}>
                        <label for="customRadio1" class="custom-control-label">Laki-Laki</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio2" name="jenis_kelamin" value="Perempuan" {{ (@$result->jenis_kelamin == "Perempuan" ? 'checked' : '') }}>
                        <label for="customRadio2" class="custom-control-label">Perempuan</label>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection
