@extends('layouts.app')

@section('title')
{{ Auth::user()->name }}
@endsection

@section('subtitle')
Ubah Informasi Profil Anda <strong>{{ Auth::user()->name }}</strong>
@endsection

@push('css')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{ asset('BE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endpush

@section('content')
<section class="content">

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    @if ($user->avatar)
                    <img class="profile-user-img img-responsive img-circle"
                        src="{{ asset('images/profile/'.$user->avatar) }}" alt="User profile picture">
                    @else
                    <img class="profile-user-img img-responsive img-circle" src="BE/dist/img/user4-128x128.jpg"
                        alt="User profile picture">
                    @endif

                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                    <p class="text-muted text-center">{{ Auth::user()->position }}</p>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div>
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
                    <p class="text-muted">
                        Lulusan Sistem Informasi di Universitas Widya Dharma Pontianak tahun 2021
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                    <p class="text-muted">{{ Auth::user()->location }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#settings" data-toggle="tab">Pengaturan Profil</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="settings">
                        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Isikan nama lengkap" value="{{  $user->name }}" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Alamat Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Isi alamat email" value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone_number">Nomor Telp/Wa</label>
                                        <input type="phone_number" class="form-control" id="phone_number"
                                            name="phone_number" placeholder="Isikan nomor what'sApp"
                                            value="{{ $user->phone_number }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="position">Jabatan</label>
                                        <input type="position" class="form-control" id="position" name="position" placeholder="Isikan jabatan" value="{{ $user->position }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="location">Lokasi</label>
                                        <input type="location" class="form-control" id="location" name="location"
                                            placeholder="Isikan jabatan" value="{{ $user->location }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="bio">Tentang Saya</label>
                                <textarea name="bio" class="form-control" id="bio" rows="3">{{ old('bio', $user->bio) }}</textarea>
                                @error('bio')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="avatar">Unggah Foto</label>
                                <input type="file" class="form-control" id="avatar" name="avatar">
                            </div>

                            <!-- Pembagian kolom inputan -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password">Password Baru (Opsional)</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password">
                                        @error('password')
                                        <span class="text-danger">
                                            <i class="fa fa-times-circle-o"></i> {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Password Konfirmasi</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Password Kofirmasi">
                                        @error('password_confirmation')
                                        <span class="text-danger">
                                            <i class="fa fa-times-circle-o"></i> {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="submit" class="btn btn-xs btn-flat btn-primary">
                                    <i class="fa fa-save" aria-hidden="true"></i>
                                    Simpan Perubahan Profil
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@push('js')
<!-- CK Editor -->
<script src="{{ asset('BE/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
    $(document).ready(function () {
        CKEDITOR.replace('bio');
    });
</script>
@endpush
