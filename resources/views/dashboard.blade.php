@extends('layouts.app')

@section('title', 'Dashboard')

@section('subtitle')
    Selamat datang <strong>Mr. {{ Auth::user()->name }}</strong>
@endsection

@push('css')
<!-- Tambahkan library chart.js untuk grafik -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">
@endpush

@section('content')
<section class="content">
    <div class="row">
        <!-- Total Projects -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box shadow">
                <span class="info-box-icon bg-blue"><i class="fa fa-folder-open"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Proyek</span>
                    <span class="info-box-number">{{ $totalProjects }}</span>
                </div>
            </div>
        </div>

        <!-- Total Skills -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box shadow">
                <span class="info-box-icon bg-green"><i class="fa fa-lightbulb-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Skill Dikuasai</span>
                    <span class="info-box-number">{{ $totalSkills }}</span>
                </div>
            </div>
        </div>

        <!-- Total Experiences -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box shadow">
                <span class="info-box-icon bg-purple"><i class="fa fa-briefcase"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pengalaman Kerja</span>
                    <span class="info-box-number">{{ $totalExperiences }}</span>
                </div>
            </div>
        </div>

        <!-- Total Certificates -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box shadow">
                <span class="info-box-icon bg-orange"><i class="fa fa-certificate"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Sertifikasi</span>
                    <span class="info-box-number">{{ $totalCategories }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Statistik -->
    <div class="row">
        <div class="col-md-7">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Grafik Proyek per Tahun</h3>
                </div>
                <div class="box-body">
                    <canvas id="projectChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Komposisi Skill</h3>
                </div>
                <div class="box-body">
                    <canvas id="skillChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Data Terbaru -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Proyek Terbaru</h3>
                    <div class="box-tools">
                        <a href="{{ route('project.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Proyek</a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Posisi</th>
                                <th>Tanggal Mulai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentProjects as $project)
                            <tr>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->role }}</td>
                                <td>{{ $project->start_date }}</td>
                                <td>
                                    <a href="{{ route('project.edit', $project->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('project.destroy', $project->id) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
<!-- ChartJS untuk Grafik -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('projectChart').getContext('2d');
    var projectChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($years) !!},
            datasets: [{
                label: 'Jumlah Proyek',
                data: {!! json_encode($projectCounts) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2
            }]
        }
    });

    var ctx2 = document.getElementById('skillChart').getContext('2d');
    var skillChart = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($skillNames) !!},
            datasets: [{
                data: {!! json_encode($skillCounts) !!},
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc']
            }]
        }
    });
</script>
@endpush
