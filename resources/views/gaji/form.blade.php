@extends('templates/header')

@section('contents')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        {{empty($result) ? 'tambah' : 'edit'}} Gaji
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('gaji')}}">Gaji</a></li>
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
                  <h3 class="card-title">{{empty($result) ? 'tambah' : 'edit'}} Data Gaji</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{url('gaji/add')}}" class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    @if (!empty($result))
                        {{ method_field('patch') }}
                    @endif

                  <div class="card-body">
                    <div class="form-group">
                        <label>Karyawan</label>
                        <select class="form-control select2" style="width: 100%;" name="id_karyawan">
                            <option>Pilih Karyawan</option>
                            @foreach (\App\Models\Karyawan::all() as $karyawan)
                                <option value="{{$karyawan->nik}}" {{ @$result->id_karyawan == $karyawan->nik ? 'selected' : ''}}>{{$karyawan->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tunjangan">Tunjangan</label>
                        <input type="number" class="form-control" name="tunjangan" id="tunjangan" placeholder="Masukan Tunjangan Karyawan" value="{{@$result->tunjangan}}">
                    </div>
                    <div class="form-group">
                        <label for="potongan">Potongan</label>
                        <input type="number" class="form-control" name="potongan" id="potongan" placeholder="Masukan Potongan Karyawan" value="{{@$result->potongan}}">
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
