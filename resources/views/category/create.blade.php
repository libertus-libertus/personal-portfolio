@extends('layouts.app')
@section('title')
Kategori
@endsection

@section('subtitle')
Kategori
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah data kategori</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="name">Kategori</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan kategori" autofocus>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="btn-group">
                            <button type="submit" class="btn btn-xs btn-flat btn-primary">
                                <i class="fa fa-file-archive-o" aria-hidden="true"></i>
                                Simpan Kategori
                            </button>
                            <a href="{{ route('category.index') }}" class="btn btn-xs btn-flat btn-warning">
                                <i class="fa fa-undo" aria-hidden="true"></i>
                                Kembali ke Home
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
