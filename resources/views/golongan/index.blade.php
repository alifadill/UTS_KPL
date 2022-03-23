@extends('templates/header')

@push('style')
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('contents')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Golongan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Golongan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        @include('templates/feedback')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{url('golongan/add')}}" class="btn btn-success">Tambah</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Golongan</th>
                                        <th>Gaji Golongan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $row)
                                        <tr>
                                            <td>{{ !empty($i) ? ++$i : $i = 1 }}</td>
                                            <td>{{ $row->nama_golongan }}</td>
                                            <td>{{ $row->gaji_golongan }}</td>
                                            <td>
                                                <a href="{{url("golongan/$row->id/edit")}}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{url("golongan/$row->id/delete")}}" method="post" style="display:inline">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@push('script')
    <script src="{{asset('assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('assets')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('assets')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('assets')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('assets')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        });
    </script>
@endpush
