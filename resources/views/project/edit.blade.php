@extends('layouts.app')

@section('title')
{{ $project->title }}
@endsection

@section('subtitle')
Ubah Project &mdash; <strong>{{ $project->title }}</strong>
@endsection

@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
@endpush

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah proyek {{ $project->title }}</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('project.update', $project->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Judul proyek</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul proyek" value="{{ $project->title }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Posisi / Tanggung jawab</label>
                                    <input type="text" class="form-control" id="role" name="role" placeholder="Posisi dalam proyek" value="{{ $project->role }}">
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
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $project->start_date }}">
                                    @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $project->end_date }}">
                                    @error('end_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Select2 Multiple Skills -->
                        <div class="form-group">
                            <label for="skills">Pilih Skill</label>
                            <select name="skills[]" id="skills" class="form-control select2" multiple="multiple" data-placeholder="Pilih skill yang digunakan" style="width: 100%;">
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->id }}" {{ in_array($skill->id, $project->skills->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $skill->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('skills')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi Proyek</label>
                            <textarea name="description" class="form-control" id="description" rows="3">{{ $project->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Gambar Proyek</label> <br>
                            @if ($project->image)
                                <img src="{{ asset('images/projects/'.$project->image) }}" width="100">
                            @endif
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="github_link">Link GitHub</label>
                                    <input type="text" class="form-control" id="github_link" name="github_link" placeholder="Masukkan link GitHub" value="{{ $project->github_link }}">
                                    @error('github_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="live_link">Link Hosting (Opsional)</label>
                                    <input type="text" class="form-control" id="live_link" name="live_link" placeholder="Masukkan link proyek" value="{{ $project->live_link }}">
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();

        // Handle Masih Bekerja
        $('#still_working').change(function() {
            if ($(this).is(':checked')) {
                $('#end_date').prop('disabled', true).val('');
            } else {
                $('#end_date').prop('disabled', false);
            }
        });
    });
</script>
@endpush
