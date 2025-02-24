@extends('layouts.app')

@section('title', 'Proyek')
@section('subtitle', 'Proyek')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah proyek baru</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Judul proyek</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul proyek" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Posisi / Tanggung jawab</label>
                                    <input type="text" class="form-control" id="role" name="role" placeholder="Posisi dalam proyek" value="{{ old('role') }}">
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}">
                                    @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}">
                                    @error('end_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- multiple-select2 --}}
                        <div class="form-group">
                            <label for="skills">Pilih Skill</label>
                            <select name="skills[]" id="skills" class="form-control select2" multiple="multiple" data-placeholder="Pilih skill yang digunakan" style="width: 100%;">
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                @endforeach
                            </select>
                            @error('skills')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi Proyek</label>
                            <textarea name="description" class="form-control" id="description" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Gambar Proyek</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="github_link">Link GitHub</label>
                                    <input type="text" class="form-control" id="github_link" name="github_link" placeholder="Masukkan link GitHub" value="{{ old('github_link') }}">
                                    @error('github_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="live_link">Link Hosting (Opsional)</label>
                                    <input type="text" class="form-control" id="live_link" name="live_link" placeholder="Masukkan link proyek" value="{{ old('live_link') }}">
                                    @error('live_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary btn-flat btn-xs">
                                <i class="fa fa-save"></i> Simpan Proyek
                            </button>
                            <a href="{{ route('project.index') }}" class="btn btn-warning btn-flat btn-xs">
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

@push('js')
    <!-- Select2 -->
<script src="{{ asset('BE/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
        // CKEDITOR.replace('description');
    });
</script>
@endpush
