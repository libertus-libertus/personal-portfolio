@extends('layouts.app')

@section('title', 'Edit Pengalaman Kerja')
@section('subtitle', 'Edit Pengalaman Kerja')

@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{ asset('BE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endpush

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Pengalaman Kerja</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('experience.update', $experience->id) }}" method="post">
                        @csrf
                        @method('patch')

                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position">Jabatan</label>
                                    <input type="text" class="form-control" id="position" name="position" placeholder="Posisinya sebagai apa?" value="{{ old('position', $experience->position) }}" autofocus>
                                    @error('position')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company">Perusahaan Tempat Bekerja</label>
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Nama perusahaan" value="{{ old('company', $experience->company) }}">
                                    @error('company')
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
                                    <option value="{{ $skill->id }}" {{ in_array($skill->id, $experience->skills->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $skill->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('skills')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $experience->start_date) }}">
                                    @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $experience->end_date) }}" {{ $experience->end_date ? '' : 'disabled' }}>
                                    <input type="checkbox" id="still_working" {{ $experience->end_date ? '' : 'checked' }}> Masih bekerja
                                    @error('end_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employment_type">Pilih Tipe Pekerjaan</label>
                                    <input type="text" class="form-control" id="employment_type" name="employment_type" placeholder="Misal: Dikantor/WFH (Work from home)" value="{{ old('employment_type', $experience->employment_type) }}">
                                    @error('employment_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Lokasi Perusahaan Tempat Bekerja</label>
                                    <input type="text" name="location" class="form-control" id="location" value="{{ old('location', $experience->location) }}">
                                    @error('location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi Pekerjaan</label>
                            <textarea name="description" class="form-control" id="description" rows="3">{{ old('description', $experience->description) }}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary btn-flat btn-xs">
                                <i class="fa fa-save"></i> Simpan Perubahan
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

@push('js')
<!-- CK Editor -->
<script src="{{ asset('BE/bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
        CKEDITOR.replace('description');

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
