<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact &mdash; Libertus Lin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/styles.css') }}">
</head>

<body>
    <div class="cursor"></div>
    <div class="container">

        <!-- Sidebar -->
        <div class="sidebar">
            <h1>Libertus Lin</h1>
            <p>Backend Laravel Developer</p>
            <span>I build accessible, pixel-perfect digital experiences for the web.</span> <br>
            <nav class="nav-links">
                <a href="{{ route('home') }}#about">About</a>
                <a href="{{ route('home') }}#experience">Experience</a>
                <a href="{{ route('home') }}#projects">Projects</a>
                <a href="{{ route('home') }}#tools">My Tools</a>
                <a href="{{ route('contact') }}">Contact</a>
            </nav>
            <div class="social-icons" style="margin-top: 2.5rem;">
                <a href="https://github.com/libertus-libertus" target="_blank"><i class="fab fa-github"></i></a>
                <a href="https://www.linkedin.com/in/libertus/" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="https://www.instagram.com/growth_with_lin/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/@libertus-thecode" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Contact Section -->
            <section id="contact" class="section">
                <p>If you have any questions, feel free to reach out. I'll do my best to respond!</p>

                <form class="contact-form" id="contactForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required placeholder="Your Name" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="Your Email">
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Your Message"></textarea>
                    </div>

                    <!-- Send Message -->
                    <button type="submit" class="btn-submit">Let's Connect</button>
                </form>
            </section>

            <hr>
            <!-- Footer Section -->
            <footer class="footer">
                <div class="row">
                    <div class="col-md-5">
                        <h5>Contact</h5>
                        <span><i class="fas fa-envelope"></i> libert.jobs@gmail.com</span><br>
                        <span><i class="fas fa-map-marker-alt"></i> Mentawai, Indonesia</span><br>
                        <span><a href="" class="text-decoration-none text-white"><i class="fas fa-phone-square-alt"></i> +62 813-4611-1649</a></span>
                    </div>
                    <div class="col-md-7">
                        <h5>Follow Me</h5>
                        <span>&copy; 2025 Designed by Libertus Sabebeget. All rights reserved. Open for flexible working (Work From Home).</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cursor = document.querySelector(".cursor");

            document.addEventListener("mousemove", (e) => {
                requestAnimationFrame(() => {
                    cursor.style.left = `${e.pageX}px`;
                    cursor.style.top = `${e.pageY}px`;
                });
            });

            document.querySelectorAll("a, button").forEach((el) => {
                el.addEventListener("mouseenter", () => {
                    cursor.style.transform = "translate(-50%, -50%) scale(1.5)";
                });
                el.addEventListener("mouseleave", () => {
                    cursor.style.transform = "translate(-50%, -50%) scale(1)";
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const sections = document.querySelectorAll("section");
            const navLinks = document.querySelectorAll(".nav-links a");

            window.addEventListener("scroll", () => {
                let currentSection = "";

                sections.forEach((section) => {
                    const sectionTop = section.offsetTop - 100;
                    const sectionHeight = section.clientHeight;

                    if (pageYOffset >= sectionTop && pageYOffset < sectionTop + sectionHeight) {
                        currentSection = section.getAttribute("id");
                    }
                });

                navLinks.forEach((link) => {
                    link.classList.remove("active");

                    if (link.getAttribute("href").substring(1) === currentSection) {
                        link.classList.add("active");
                    }
                });
            });
        });
    </script>
</body>

</html>
