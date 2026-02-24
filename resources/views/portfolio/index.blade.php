<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $data['name'] }} — Portfolio</title>
    <meta name="description" content="{{ $data['name'] }} – {{ $data['role'] }}. Portfolio professionale IT.">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <!-- AOS Animations -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>
<body>

<!-- ========== CURSOR CUSTOM ========== -->
<div class="cursor-dot" id="cursorDot"></div>
<div class="cursor-outline" id="cursorOutline"></div>

<!-- ========== LOADER ========== -->
<div id="loader">
    <div class="loader-inner">
        <div class="loader-logo">SA</div>
        <div class="loader-bar"><div class="loader-bar-fill"></div></div>
        <p class="loader-text">Inizializzazione sistema...</p>
    </div>
</div>

<!-- ========== NAVBAR ========== -->
<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand glitch-small" href="#hero" data-text="SA">SA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon-custom"><span></span><span></span><span></span></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#about">Chi sono</a></li>
                <li class="nav-item"><a class="nav-link" href="#skills">Competenze</a></li>
                <li class="nav-item"><a class="nav-link" href="#experience">Esperienza</a></li>
                <li class="nav-item"><a class="nav-link" href="#education">Formazione</a></li>
                <li class="nav-item"><a class="nav-link" href="#certifications">Certificazioni</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contatti</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ========== HERO ========== -->
<section id="hero" class="hero-section">
    <canvas id="particleCanvas"></canvas>
    <div class="hero-grid-overlay"></div>
    <div class="container hero-content">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8">
                <div class="hero-badge" data-aos="fade-down">
                    <span class="badge-dot"></span>
                    <span>Disponibile per opportunità</span>
                </div>
                <h1 class="hero-name glitch" data-text="{{ $data['name'] }}" data-aos="fade-right" data-aos-delay="100">
                    {{ $data['name'] }}
                </h1>
                <div class="hero-role" data-aos="fade-right" data-aos-delay="200">
                    <span class="typed-text" id="typedText"></span><span class="typed-cursor">_</span>
                </div>
                <p class="hero-desc" data-aos="fade-right" data-aos-delay="300">
                    {{ $data['about'] }}
                </p>
                <div class="hero-actions" data-aos="fade-up" data-aos-delay="400">
                    <a href="#contact" class="btn btn-primary-custom">
                        <span>Contattami</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="#about" class="btn btn-outline-custom">
                        <span>Scopri di più</span>
                    </a>
                </div>
                <div class="hero-socials" data-aos="fade-up" data-aos-delay="500">
                    <a href="mailto:{{ $data['email'] }}" class="social-link" title="Email">
                        <i class="bi bi-envelope-fill"></i>
                    </a>
                    <a href="{{ $data['linkedin'] }}" target="_blank" class="social-link" title="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="tel:{{ $data['phone'] }}" class="social-link" title="Telefono">
                        <i class="bi bi-telephone-fill"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center" data-aos="fade-left" data-aos-delay="300">
                <div class="hero-avatar-wrapper">
                    <div class="avatar-ring ring-1"></div>
                    <div class="avatar-ring ring-2"></div>
                    <div class="avatar-ring ring-3"></div>
                    <div class="avatar-placeholder">
                        <span>SA</span>
                    </div>
                    <div class="avatar-badge">
                        <i class="bi bi-shield-check-fill"></i>
                        <span>Cybersecurity</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-scroll-indicator">
        <span>Scroll</span>
        <div class="scroll-line"></div>
    </div>
</section>

<!-- ========== ABOUT ========== -->
<section id="about" class="section-about">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-tag">// about_me</span>
            <h2 class="section-title">Chi Sono</h2>
        </div>
        <div class="row g-4 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-card">
                    <div class="about-card-header">
                        <div class="terminal-dots">
                            <span class="dot red"></span>
                            <span class="dot yellow"></span>
                            <span class="dot green"></span>
                        </div>
                        <span class="terminal-title">about.json</span>
                    </div>
                    <div class="about-card-body">
                        <pre class="code-block"><code><span class="c-key">"nome"</span>: <span class="c-val">"{{ $data['name'] }}"</span>,
<span class="c-key">"ruolo"</span>: <span class="c-val">"{{ $data['role'] }}"</span>,
<span class="c-key">"posizione"</span>: <span class="c-val">"{{ $data['location'] }}"</span>,
<span class="c-key">"data_nascita"</span>: <span class="c-val">"23/01/2004"</span>,
<span class="c-key">"patente"</span>: <span class="c-val">"B"</span>,
<span class="c-key">"disponibile"</span>: <span class="c-bool">true</span></code></pre>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <p class="about-text">{{ $data['about'] }}</p>
                <div class="about-stats">
                    <div class="stat-item">
                        <span class="stat-number" data-count="2">0</span>
                        <span class="stat-label">Anni di esperienza IT</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-count="4">0</span>
                        <span class="stat-label">Certificazioni</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-count="3">0</span>
                        <span class="stat-label">Lingue</span>
                    </div>
                </div>
                <div class="languages-section mt-4">
                    <h5 class="subsection-title">Lingue</h5>
                    @foreach($data['languages'] as $lang)
                    <div class="lang-item">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="lang-name">{{ $lang['name'] }}</span>
                            <span class="lang-level">{{ $lang['level'] }}</span>
                        </div>
                        <div class="lang-bar">
                            <div class="lang-bar-fill" data-width="{{ $lang['percent'] }}"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== SKILLS ========== -->
<section id="skills" class="section-skills">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-tag">// skills.map()</span>
            <h2 class="section-title">Competenze</h2>
        </div>
        <div class="row g-4">
            @foreach($data['skills'] as $catIndex => $category)
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $catIndex * 100 }}">
                <div class="skill-card">
                    <h4 class="skill-category">{{ $category['category'] }}</h4>
                    @foreach($category['items'] as $skill)
                    <div class="skill-item">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="skill-name">{{ $skill['name'] }}</span>
                            <span class="skill-percent">{{ $skill['level'] }}%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-bar-fill" data-width="{{ $skill['level'] }}"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        <!-- Tech Stack Orbs -->
        <div class="tech-orbs" data-aos="fade-up" data-aos-delay="300">
            @php
                $techStack = ['HTML5','CSS3','JavaScript','PHP','Laravel','Bootstrap','MySQL','Active Directory','Cisco','Windows Server','GitHub','Microsoft 365'];
            @endphp
            @foreach($techStack as $tech)
            <div class="tech-orb">{{ $tech }}</div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========== EXPERIENCE ========== -->
<section id="experience" class="section-experience">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-tag">// experience.forEach()</span>
            <h2 class="section-title">Esperienza</h2>
        </div>
        <div class="timeline">
            @foreach($data['experience'] as $idx => $exp)
            <div class="timeline-item {{ $exp['type'] }}" data-aos="fade-up" data-aos-delay="{{ $idx * 150 }}">
                <div class="timeline-dot">
                    @if($exp['type'] === 'current')
                    <div class="timeline-dot-pulse"></div>
                    @endif
                </div>
                <div class="timeline-content">
                    <div class="timeline-header">
                        <div>
                            <h3 class="timeline-role">{{ $exp['role'] }}</h3>
                            <p class="timeline-company">
                                <i class="bi bi-building"></i> {{ $exp['company'] }}
                            </p>
                        </div>
                        <span class="timeline-period">
                            @if($exp['type'] === 'current')
                            <span class="live-dot"></span>
                            @endif
                            {{ $exp['period'] }}
                        </span>
                    </div>
                    <p class="timeline-desc">{{ $exp['description'] }}</p>
                    <div class="timeline-tags">
                        @foreach($exp['tags'] as $tag)
                        <span class="tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========== EDUCATION ========== -->
<section id="education" class="section-education">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-tag">// education.load()</span>
            <h2 class="section-title">Formazione</h2>
        </div>
        <div class="row g-4">
            @foreach($data['education'] as $idx => $edu)
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $idx * 150 }}">
                <div class="edu-card">
                    <div class="edu-icon"><i class="bi bi-mortarboard-fill"></i></div>
                    <h4 class="edu-title">{{ $edu['title'] }}</h4>
                    <p class="edu-institution">
                        <i class="bi bi-geo-alt"></i> {{ $edu['institution'] }}
                    </p>
                    <p class="edu-period"><i class="bi bi-calendar3"></i> {{ $edu['period'] }}</p>
                    <p class="edu-desc">{{ $edu['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========== CERTIFICATIONS ========== -->
<section id="certifications" class="section-certifications">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-tag">// certifications.verify()</span>
            <h2 class="section-title">Certificazioni</h2>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($data['certifications'] as $idx => $cert)
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $idx * 100 }}">
                <div class="cert-card">
                    <div class="cert-icon">
                        <i class="bi bi-{{ $cert['icon'] }}"></i>
                    </div>
                    <div class="cert-verified">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <h5 class="cert-name">{{ $cert['name'] }}</h5>
                    <p class="cert-issuer">{{ $cert['issuer'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========== CONTACT ========== -->
<section id="contact" class="section-contact">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-tag">// contact.init()</span>
            <h2 class="section-title">Contatti</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="contact-info">
                    <p class="contact-intro">Hai un progetto in mente o vuoi semplicemente fare una chiacchierata? Scrivimi!</p>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="bi bi-envelope-fill"></i></div>
                        <div>
                            <span class="contact-label">Email</span>
                            <a href="mailto:{{ $data['email'] }}" class="contact-value">{{ $data['email'] }}</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="bi bi-telephone-fill"></i></div>
                        <div>
                            <span class="contact-label">Telefono</span>
                            <a href="tel:{{ $data['phone'] }}" class="contact-value">{{ $data['phone'] }}</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div>
                            <span class="contact-label">Posizione</span>
                            <span class="contact-value">{{ $data['location'] }}</span>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="bi bi-linkedin"></i></div>
                        <div>
                            <span class="contact-label">LinkedIn</span>
                            <a href="{{ $data['linkedin'] }}" target="_blank" class="contact-value">Profilo LinkedIn</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <form id="contactForm" class="contact-form">
                    @csrf
                    <div id="formAlert" class="form-alert d-none"></div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating-custom">
                                <input type="text" id="name" name="name" placeholder="Il tuo nome" required>
                                <label for="name">Nome completo</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating-custom">
                                <input type="email" id="email" name="email" placeholder="Email" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating-custom">
                                <input type="text" id="subject" name="subject" placeholder="Oggetto" required>
                                <label for="subject">Oggetto</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating-custom">
                                <textarea id="message" name="message" rows="5" placeholder="Messaggio" required></textarea>
                                <label for="message">Messaggio</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary-custom w-100" id="submitBtn">
                                <span class="btn-text">Invia messaggio</span>
                                <span class="btn-loader d-none"><i class="bi bi-arrow-clockwise spin"></i> Invio in corso...</span>
                                <i class="bi bi-send-fill ms-2 btn-icon"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ========== FOOTER ========== -->
<footer class="footer">
    <div class="container">
        <div class="footer-inner">
            <span class="footer-logo">SA</span>
            <p class="footer-copy">
                &copy; {{ date('Y') }} {{ $data['name'] }} — Realizzato con <i class="bi bi-heart-fill text-danger"></i> usando Laravel + Bootstrap
            </p>
            <div class="footer-socials">
                <a href="mailto:{{ $data['email'] }}"><i class="bi bi-envelope-fill"></i></a>
                <a href="{{ $data['linkedin'] }}" target="_blank"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>

<!-- ========== BACK TO TOP ========== -->
<button class="back-to-top" id="backToTop">
    <i class="bi bi-arrow-up"></i>
</button>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="{{ asset('js/portfolio.js') }}"></script>
</body>
</html>
