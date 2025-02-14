<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects &mdash; Libertus</title>
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
        th, td {
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
                    <th>Year</th>
                    <th>Project</th>
                    <th>Made at</th>
                    <th>Built with</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2023</td>
                    <td><strong>Emerson Collective</strong></td>
                    <td>Upstatement</td>
                    <td>
                        <span class="badge">Next.js</span>
                        <span class="badge">TypeScript</span>
                        <span class="badge">SCSS</span>
                        <span class="badge">Contentful</span>
                    </td>
                    <td><a href="https://emersoncollective.com" target="_blank">emersoncollective.com ↗</a></td>
                </tr>
                <tr><td colspan="5"><hr></td></tr>
                <tr>
                    <td>2023</td>
                    <td><strong>Harvard Business School Next.js Site</strong></td>
                    <td>Upstatement</td>
                    <td>
                        <span class="badge">React</span>
                        <span class="badge">TypeScript</span>
                        <span class="badge">Next.js</span>
                        <span class="badge">Contentful</span>
                    </td>
                    <td><a href="https://hbs.edu" target="_blank">hbs.edu ↗</a></td>
                </tr>
                <tr><td colspan="5"><hr></td></tr>
                <tr>
                    <td>2022</td>
                    <td><strong>Harvard Business School Design System</strong></td>
                    <td>Upstatement</td>
                    <td>
                        <span class="badge">Storybook</span>
                        <span class="badge">React</span>
                        <span class="badge">TypeScript</span>
                    </td>
                    <td>-</td>
                </tr>
                <tr><td colspan="5"><hr></td></tr>
                <tr>
                    <td>2022</td>
                    <td><strong>Threadable</strong></td>
                    <td>Upstatement</td>
                    <td>
                        <span class="badge">React Native</span>
                        <span class="badge">Ruby on Rails</span>
                        <span class="badge">Firebase</span>
                    </td>
                    <td><a href="https://apps.apple.com" target="_blank">apps.apple.com ↗</a></td>
                </tr>
                <tr><td colspan="5"><hr></td></tr>
                <tr>
                    <td>2022</td>
                    <td><strong>Pratt</strong></td>
                    <td>Upstatement</td>
                    <td>
                        <span class="badge">WordPress</span>
                        <span class="badge">Timber</span>
                        <span class="badge">WordPress Multisite</span>
                        <span class="badge">Gutenberg</span>
                        <span class="badge">JavaScript</span>
                    </td>
                    <td><a href="https://pratt.edu" target="_blank">pratt.edu ↗</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <footer class="footer text-center mt-5">
        <span>&copy; 2025 Designed by Libertus Sabebeget. All rights reserved.</span>
    </footer>
</body>
</html>
