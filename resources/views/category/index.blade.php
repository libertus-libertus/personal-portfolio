@extends('layouts.app')

@section('title', 'Kategori')
@section('subtitle', 'Daftar Kategori')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('BE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Silahkan menambahkan kategori yang baru</h3>

                    <div class="box-tools pull-right btn-group">
                        <a href="{{ route('category.create') }}" class="btn btn-xs btn-flat btn-primary">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Tambah Kategori
                        </a>
                        <a href="{{route('category.printPDF')}}" class="btn btn-xs btn-flat btn-success">
                            <i class="fa fa-print" aria-hidden="true"></i>
                            Cetak PDF
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="7%">No</th>
                                <th>Kategori</th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <form action="{{ route('category.destroy', $item->id) }}" method="post">
                                            <div class="btn-group">
                                                <a href="{{ route('category.edit', $item->id) }}" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Ubah
                                                </a>

                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    Hapus
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<!-- DataTables -->
<script src="{{ asset('BE/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('BE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- page script -->
<script>
    $(function () {
        $('#data-table').DataTable()
    })
</script>
@endpush
