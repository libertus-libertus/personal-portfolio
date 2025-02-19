@extends('layouts.app')

@section('title', 'Proyek')
@section('subtitle', 'Daftar Proyek Yang Pernah Dikerjakan!')

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
                    <h3 class="box-title">Silahkan tambahkan proyek Anda yang baru</h3>

                    <div class="box-tools pull-right btn-group">
                        <a href="{{ route('project.create') }}" class="btn btn-xs btn-flat btn-primary">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Tambah Proyek
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Link Git & Domain</th>
                                <th>
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $item)
                                <tr>
                                    <td>
                                        @if($item->image)
                                            <img src="{{ asset('images/projects/' . $item->image) }}" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <i class="fa fa-git" aria-hidden="true"></i>
                                        <a href="{{ $item->github_link }}" target="_blank">{{ $item->github_link }}</a><br>

                                        <i class="fa fa-globe" aria-hidden="true"></i> <a href="{{ $item->live_link }}" target="_blank">{{ $item->live_link }}</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('project.destroy', $item->id) }}" method="post">
                                            <div class="btn-group">
                                                <a href="{{ route('project.edit', $item->id) }}" class="btn btn-xs btn-warning">
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
