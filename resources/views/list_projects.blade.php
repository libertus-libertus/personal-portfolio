<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Proyek &mdash; Libertus</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #0a192f;
            color: #ddd;
            font-family: 'Inter', sans-serif;
        }

        .all-projects {
            color: #ddd;
            font-weight: 700;
        }

        table {
            background-color: #112240;
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            padding: 15px;
            vertical-align: middle;
        }

        .badge {
            background-color: #233554;
            color: #64ffda;
            font-weight: 500;
            margin-right: 5px;
        }

        table a {
            color: #64ffda;
            text-decoration: none;
        }

        table a:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 40px;
            padding: 20px;
            border-radius: 10px;
        }

        .back-home {
            display: inline-block;
            margin-bottom: 20px;
            color: #ddd;
            text-decoration: none;
            font-weight: 600;
        }

        .back-home:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <a href="{{ route('home') }}" class="back-home"><i class="fas fa-arrow-left"></i> Libertus Lin</a>
        <h2 class="all-projects">All Projects</h2>
        <table class="table-dark table-striped">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Proyek</th>
                    <th>Tech Stack</th>
                    <th>Tautan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($project->start_date)->format('Y') }}</td>
                    <td>
                        <strong>{{ $project->title }}</strong>
                    </td>
                    <td>
                        @foreach ($project->skills as $skill)
                        <span class="badge">{{ $skill->name }}</span>
                        @endforeach
                    </td>
                    <td><a href="{{ $project->github_link }}" target="_blank">{{ $project->live_link }} ↗</a></td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="5">
                        <hr>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <footer class="footer text-center mt-5">
        <span>&copy; 2025 Designed by Libertus Sabebeget. All rights reserved.</span>
    </footer>
</body>

</html>
