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
                <form action="{{url('golongan/add')}}" class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    @if (!empty($result))
                        {{ method_field('patch') }}
                    @endif
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nama_golongan">Nama Golongan</label>
                      <input type="text" class="form-control" name="nama_golongan" id="nama_golongan" placeholder="Masukan Nama Golongan" value="{{@$result->nama_golongan}}">
                    </div>
                    <div class="form-group">
                      <label for="gaji_golongan">Gaji Golongan</label>
                      <input type="number" class="form-control" name="gaji_golongan" id="gaji_golongan" placeholder="Masukan Gaji Golongan" value="{{@$result->gaji_golongan}}">
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
