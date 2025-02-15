@extends('layouts.app')
@section('title')
{{ $skill->name }}
@endsection

@section('subtitle')
Ubah Kategori &mdash; <strong>{{ $skill->name }}</strong>
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah data kategori</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('skill.update', $skill->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <label for="name">Kategori</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $skill->name }}" placeholder="Masukkan kategori" autofocus>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="icon">Ubah file gambar/ikon</label>
                            <!-- Menampilkan gambar jika sudah ada -->
                            @if($skill->icon)
                                <br>
                                <img src="{{ asset('images/icons/' . $skill->icon) }}" width="100" height="100" style="margin-bottom: 10px; border-radius: 5px;">
                            @endif
                            <input type="file" class="form-control" id="icon" name="icon">
                            @error('icon')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="btn-group">
                            <button type="submit" class="btn btn-xs btn-flat btn-primary">
                                <i class="fa fa-file-archive-o" aria-hidden="true"></i>
                                Simpan Perubahan Data
                            </button>
                            <a href="{{ route('skill.index') }}" class="btn btn-xs btn-flat btn-warning">
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
