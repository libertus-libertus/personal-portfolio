@extends('layouts.app')

@section('title', 'Skill')
@section('subtitle', 'Daftar Software / Tools Yang Dikuasai & Digunakan')

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
                    <h3 class="box-title">Silahkan menambahkan softwware yang dikuasai</h3>

                    <div class="box-tools pull-right btn-group">
                        <a href="{{ route('skill.create') }}" class="btn btn-xs btn-flat btn-primary">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Tambah Software / Tools
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="7%">No</th>
                                <th>Software (Alat yang dikuasai)</th>
                                <th>Nama Software</th>
                                <th>
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skills as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($item->icon)
                                            <img src="{{ asset('images/icons/' . $item->icon) }}" width="30" height="30">
                                        @else
                                            Tidak Ada Ikon
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <form action="{{ route('skill.destroy', $item->id) }}" method="post">
                                            <div class="btn-group">
                                                <a href="{{ route('skill.edit', $item->id) }}" class="btn btn-xs btn-warning">
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
