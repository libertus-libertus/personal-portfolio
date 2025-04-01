<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libertus - Full Stack Developer & Laravel Expert</title>

    <!-- Meta SEO -->
    <meta name="description" content="Libertus is a passionate Full Stack Developer specializing in Laravel, PHP, and scalable web applications.">
    <meta name="keywords" content="Libertus, Libertus, Full Stack Developer, Laravel Expert, Web Development, PHP, MySQL, JavaScript, Vue.js, Backend Development, Frontend Development">
    <meta name="author" content="Libertus">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    <meta name="distribution" content="global">
    <meta property="og:title" content="Libertus - Full Stack Developer & Laravel Expert">
    <meta property="og:description" content="Explore the expertise of Libertus, a skilled Full Stack Developer with a deep understanding of Laravel, PHP, and modern web technologies.">
    <meta property="og:image" content="https://yourwebsite.com/assets/libertus-profile.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://img.icons8.com/?size=100&id=34886&format=png&color=000000" type="image/x-icon">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/styles.css') }}">
</head>

<body>
    <canvas id="galaxyCanvas"></canvas>
    <div class="cursor"></div>
    <div class="container">

        <!-- Sidebar -->
        <div class="sidebar">
            <h1>Libertus Lin</h1>
            <p>Backend Laravel Developer</p>
            <span>I build accessible, pixel-perfect digital experiences for the web.</span> <br>
            <nav class="nav-links">
                <a href="#about">About</a>
                <a href="#experience">Experience</a>
                <a href="#projects">Projects</a>
                <a href="#tools">My Tools</a>
                <a href="{{ route('contact') }}">Contact</a>
            </nav>
            <div class="social-icons" style="margin-top: 2.5rem;">
                <a href="https://github.com/libertus-libertus" target="_blank"><i class="fab fa-github"></i></a>
                <a href="https://www.linkedin.com/in/libertus/" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="https://www.instagram.com/growth_with_lin/" target="_blank"><i
                        class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/@libertus-thecode" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">

            <!-- About Section -->
            <section id="about" class="section fade-in">
                <h2>About</h2>
                {!! $user->bio !!}

                <a href="#projects" class="btn-get-started">Get Started</a>
            </section>

            <!-- Experience Section -->
            <section id="experience" class="section fade-in">
                <h2>Experience</h2>

                @foreach ($experiences as $experience)
                <div class="experience-item">
                    <h3>{{ $experience->position }}</h3>
                    <p class="company">{{ $experience->company }} · {{ $experience->employment_type }}</p>
                    <p class="date-location">
                        {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} -
                        {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Ongoing' }} |
                        {{ $experience->location }} · On-site
                    </p>

                    <ul class="experience-details">
                        {!! $experience->description !!}
                    </ul>
                    <p class="tech-stack">
                        💻 {{ $experience->skills->pluck('name')->implode(', ') }}
                    </p>
                </div>
                @endforeach

                <!-- Load More Button -->
                <div class="load-more-container">
                    <a href="https://drive.google.com/file/d/1YQe261t6t3e6EIr3aENpy1WcWevsVFiX/view?usp=sharing"
                        target="_blank" class="load-more-button">
                        View Full Resume
                    </a>
                </div>
            </section>

            <!-- Project Section -->
            <section id="projects" class="section fade-in">
                <h2>Projects</h2>

                @foreach ($projects as $project)
                <div class="project-item">
                    <h3>{{ $project->title }}</h3>
                    <p class="company">Personal Project &mdash; {{ $project->role }}</p>
                    <p class="date-location">
                        {{ \Carbon\Carbon::parse($project->start_date)->format('M Y') }} -
                        {{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('M Y') : 'Ongoing' }}
                    </p>

                    <div class="project-details" style="text-align: justify">
                        <span>{!! $project->description !!}</span>
                    </div>

                    <p class="tech-stack">
                        💻 {{ $project->skills->pluck('name')->implode(', ') }}
                    </p>

                    <!-- Link GitHub -->
                    <a href="{{ $project->github_link }}" target="_blank" class="github-link">
                        🔗 View on GitHub
                    </a>
                </div>
                @endforeach

                <!-- Load More Button -->
                <div class="load-more-container">
                    <a href="{{ route('project.list') }}" class="load-more-button">
                        View Full Project Archive
                    </a>
                </div>
            </section>

            <!-- Tools Section -->
            <section id="tools" class="section fade-in">
                <h2>My Tools</h2>
                <p>Saya menggunakan berbagai teknologi modern untuk membangun aplikasi web yang scalable, responsif, dan
                    efisien.
                    Dengan keahlian dalam frontend dan backend development, saya memastikan pengalaman pengguna yang
                    optimal dan performa sistem yang handal.</p>

                <!-- List untuk Frontend dan Backend dengan Deskripsi -->
                <h3>Frontend Tools</h3>
                <ul>
                    <li><strong>HTML5</strong> - Struktur utama untuk membangun halaman web.</li>
                    <li><strong>CSS3</strong> - Styling untuk tampilan yang menarik dan responsif.</li>
                    <li><strong>Bootstrap</strong> - Framework untuk desain yang cepat dan mobile-friendly.</li>
                    <li><strong>Vue.js</strong> - Framework JavaScript progresif untuk frontend yang dinamis.</li>
                </ul>

                <h3>Backend Tools</h3>
                <ul>
                    <li><strong>PHP</strong> - Bahasa pemrograman server-side untuk membangun aplikasi dinamis.</li>
                    <li><strong>Laravel</strong> - Framework PHP yang powerful dan efisien untuk pengembangan backend.
                    </li>
                    <li><strong>MySQL</strong> - Database management system untuk menyimpan dan mengelola data.</li>
                </ul>

                <div class="tools-slider">
                    <div class="tools-track">
                        <div class="tools-item">
                            <img class="icon" src="https://img.icons8.com/ios-filled/60/ffffff/html-5.png"
                                data-color="https://img.icons8.com/color/60/000000/html-5.png" alt="HTML5">
                        </div>
                        <div class="tools-item">
                            <img class="icon" src="https://img.icons8.com/ios-filled/60/ffffff/css3.png"
                                data-color="https://img.icons8.com/color/60/000000/css3.png" alt="CSS3">
                        </div>
                        <div class="tools-item">
                            <img class="icon" src="https://img.icons8.com/ios-filled/60/ffffff/javascript.png"
                                data-color="https://img.icons8.com/color/60/000000/javascript.png" alt="JavaScript">
                        </div>
                        <div class="tools-item">
                            <img class="icon" src="https://img.icons8.com/ios-filled/60/ffffff/bootstrap.png"
                                data-color="https://img.icons8.com/color/60/000000/bootstrap.png" alt="Bootstrap">
                        </div>
                        <div class="tools-item">
                            <img class="icon" src="https://img.icons8.com/ios-filled/60/ffffff/jquery.png"
                                data-color="https://img.icons8.com/?size=100&id=9Um0Q4sZ0QCC&format=png&color=000000"
                                alt="jQuery">
                        </div>
                        <div class="tools-item">
                            <img class="icon" src="https://img.icons8.com/ios-filled/60/ffffff/php-logo.png"
                                data-color="https://img.icons8.com/officel/60/000000/php-logo.png" alt="PHP">
                        </div>
                        <div class="tools-item">
                            <img class="icon"
                                src="https://img.icons8.com/?size=100&id=UG5EO81XNkPs&format=png&color=000000"
                                data-color="https://img.icons8.com/?size=60&id=UG5EO81XNkPs&format=png" alt="Laravel">
                        </div>
                        <div class="tools-item">
                            <img class="icon" src="https://img.icons8.com/ios-filled/60/ffffff/mysql-logo.png"
                                data-color="https://img.icons8.com/color/60/000000/mysql-logo.png" alt="MySQL">
                        </div>
                        <div class="tools-item">
                            <img class="icon"
                                src="https://img.icons8.com/?size=100&id=rY6agKizO9eb&format=png&color=000000"
                                data-color="https://img.icons8.com/color/60/000000/vue-js.png" alt="Vue.js">
                        </div>
                        <div class="tools-item">
                            <img class="icon"
                                src="https://img.icons8.com/?size=100&id=xBKl2pdJg5kk&format=png&color=000000"
                                data-color="https://img.icons8.com/?size=100&id=20906&format=png&color=000000"
                                alt="GitHub">
                        </div>
                        <div class="tools-item">
                            <img class="icon"
                                src="https://img.icons8.com/?size=100&id=9OGIyU8hrxW5&format=png&color=000000"
                                data-color="https://img.icons8.com/?size=100&id=9OGIyU8hrxW5&format=png&color=000000"
                                alt="VS Code">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Footer Section -->
            <hr>
            <footer class="footer">
                <div class="row">
                    <div class="col-md-5">
                        <h5>Contact</h5>
                        <span><i class="fas fa-envelope"></i> {{ $user->email }}</span><br>
                        <span><i class="fas fa-map-marker-alt"></i> {{ $user->location }}</span><br>
                        <span>
                            <a href="https://wa.me/62{{ ltrim(str_replace(['+', ' ', '-'], '', $user->phone_number), '0') }}"
                               class="text-decoration-none text-white"
                               target="_blank">
                                <i class="fas fa-phone-square-alt"></i> {{ $user->phone_number ?? 'Phone not set' }}
                            </a>
                        </span>

                    </div>
                    <div class="col-md-7">
                        <h5>Follow Me</h5>
                        <span>&copy; 2025 Designed by Libertus Sabebeget. All rights reserved. Open for flexible working
                            (Work
                            From Home).</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script src="{{ asset('frontend/js/data.js') }}"></script>
</body>

</html>
