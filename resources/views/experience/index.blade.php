@extends('layouts.app')

@section('title', 'Pengalaman Kerja')
@section('subtitle', 'Daftar Pengalaman Kerja!')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('BE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Silahkan menambahkan pengalaman kerja yang baru</h3>

                    <div class="box-tools pull-right btn-group">
                        <a href="{{ route('experience.create') }}" class="btn btn-xs btn-flat btn-primary">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Tambah Pengalaman Kerja
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Posisi</th>
                                <th>Perusahaan</th>
                                <th>Waktu Bekerja</th>
                                <th>Lokasi</th>
                                <th>
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($experiences as $item)
                                <tr>
                                    <td>{{ $item->position }}</td>
                                    <td>{{ $item->company }}</td>
                                    <td>
                                        Mulai kerja:
                                        <strong>{{ $item->start_date }}</strong> <br>
                                        Selesai bekerja:
                                        <strong>{{ $item->end_date }}</strong>
                                    </td>
                                    <td>{{ $item->location }}</td>
                                    <td>
                                        <form action="{{ route('experience.destroy', $item->id) }}" method="post">
                                            <div class="btn-group">
                                                <a href="{{ route('experience.edit', $item->id) }}" class="btn btn-xs btn-warning">
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
