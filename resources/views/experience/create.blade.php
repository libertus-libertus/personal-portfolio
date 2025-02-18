@extends('layouts.app')

@section('title', 'Pengalaman Kerja')
@section('subtitle', 'Pengalaman Kerja')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah pengalaman kerja yang baru</h3>
                </div>
                <div class="box-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('experience.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position">Jabatan</label>
                                    <input type="text" class="form-control" id="position" name="position" placeholder="Posisinya sebagai apa?" value="{{ old('position') }}" autofocus>
                                    @error('position')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company">Perusahaan Tempat Bekerja</label>
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Nama perusahaan" value="{{ old('company') }}">
                                    @error('company')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="employment_type">Pilih Tipe Pekerjaan</label>
                                    <input type="text" class="form-control" id="employment_type" name="employment_type" placeholder="Misal: Dikantor/WFH (Work from home)" value="{{ old('employment_type') }}">
                                    @error('employment_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_date">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}">
                                    @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}">
                                    @error('end_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="location">Lokasi Perusahaan Tempat Bekerja</label>
                            <textarea name="location" class="form-control" id="location" rows="3">{{ old('location') }}</textarea>
                            @error('location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi Pekerjaan</label>
                            <textarea name="description" class="form-control" id="description" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary btn-flat btn-xs">
                                <i class="fa fa-save"></i> Simpan Proyek
                            </button>
                            <a href="{{ route('experience.index') }}" class="btn btn-warning btn-flat btn-xs">
                                <i class="fa fa-arrow-left"></i> Kembali ke Home
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
