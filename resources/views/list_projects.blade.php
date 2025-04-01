<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Projects - Libertus</title>

    <!-- Meta SEO -->
    <meta name="description" content="Explore the portfolio of Libertus, a Full Stack Developer specializing in Laravel, PHP, JavaScript, and scalable web applications.">
    <meta name="keywords" content="Portfolio, Libertus, Web Development, Laravel, PHP, Full Stack Developer, Software Engineer, Projects">
    <meta name="author" content="Libertus">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    <meta name="distribution" content="global">
    <meta property="og:title" content="Portfolio Projects - Libertus">
    <meta property="og:description" content="Check out the innovative web development projects by Libertus, a skilled Full Stack Developer.">
    <meta property="og:image" content="https://yourwebsite.com/assets/libertus-projects.jpg">
    <meta property="og:url" content="https://yourwebsite.com/portfolio">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link rel="icon" href="https://img.icons8.com/?size=100&id=34886&format=png&color=000000" type="image/x-icon">

    <!-- Stylesheets -->
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
