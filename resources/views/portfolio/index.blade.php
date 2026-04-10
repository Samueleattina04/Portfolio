<!DOCTYPE html>
<html lang="it" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ===== SEO PRIMARY ===== -->
    <title>{{ $data['seo']['title'] }}</title>
    <meta name="description" content="{{ $data['seo']['description'] }}">
    <meta name="keywords" content="{{ $data['seo']['keywords'] }}">
    <meta name="author" content="{{ $data['name'] }}">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="{{ $data['seo']['url'] }}">

    <!-- ===== GEO SEO (local) ===== -->
    <meta name="geo.region" content="IT-SR">
    <meta name="geo.placename" content="Adrano, Catania, Sicilia">
    <meta name="geo.position" content="37.6607;14.8345">
    <meta name="ICBM" content="37.6607, 14.8345">

    <!-- ===== OPEN GRAPH ===== -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $data['seo']['url'] }}">
    <meta property="og:title" content="{{ $data['seo']['title'] }}">
    <meta property="og:description" content="{{ $data['seo']['description'] }}">
    <meta property="og:image" content="{{ $data['seo']['image'] }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="it_IT">
    <meta property="og:site_name" content="Samuele Attinà Portfolio">

    <!-- ===== TWITTER CARD ===== -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $data['seo']['title'] }}">
    <meta name="twitter:description" content="{{ $data['seo']['description'] }}">
    <meta name="twitter:image" content="{{ $data['seo']['image'] }}">

    <!-- ===== STRUCTURED DATA – Person ===== -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Person",
      "name": "{{ $data['name'] }}",
      "jobTitle": "IT Support & ICT Specialist | Web Developer",
      "description": "{{ $data['seo']['description'] }}",
      "url": "{{ $data['seo']['url'] }}",
      "email": "mailto:{{ $data['email'] }}",
      "telephone": "{{ $data['phone'] }}",
      "address": {
        "@@type": "PostalAddress",
        "addressLocality": "Adrano",
        "addressRegion": "Catania",
        "addressCountry": "IT"
      },
      "sameAs": ["{{ $data['linkedin'] }}"],
      "knowsAbout": [
        "IT Support","Consulenza Informatica","Sviluppo Siti Web","Laravel","PHP",
        "Cybersecurity","Active Directory","Windows Server","Gestionale","SEO"
      ],
      "offers": [
        {"@@type":"Offer","name":"Sviluppo Siti Web","description":"Siti web moderni e ottimizzati SEO"},
        {"@@type":"Offer","name":"Gestionali su Misura","description":"Applicazioni web gestionali personalizzate"},
        {"@@type":"Offer","name":"Consulenza Informatica","description":"Assistenza IT, reti, sicurezza informatica"},
        {"@@type":"Offer","name":"Cybersecurity","description":"Analisi sicurezza, hardening, endpoint protection"}
      ]
    }
    </script>

    <!-- ===== STRUCTURED DATA – LocalBusiness ===== -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "LocalBusiness",
      "name": "Samuele Attinà – IT & Web Services",
      "description": "{{ $data['seo']['description'] }}",
      "url": "{{ $data['seo']['url'] }}",
      "telephone": "{{ $data['phone'] }}",
      "email": "{{ $data['email'] }}",
      "address": {
        "@@type": "PostalAddress",
        "addressLocality": "Adrano",
        "addressRegion": "Catania",
        "postalCode": "95031",
        "addressCountry": "IT"
      },
      "geo": {
        "@@type": "GeoCoordinates",
        "latitude": 37.6607,
        "longitude": 14.8345
      },
      "areaServed": ["Adrano","Catania","Sicilia","Italia"],
      "priceRange": "€€",
      "serviceType": ["IT Support","Web Development","Consulenza Informatica","Cybersecurity"]
    }
    </script>

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

<!-- ===== CURSOR ===== -->
<div class="cursor-dot" id="cursorDot"></div>
<div class="cursor-outline" id="cursorOutline"></div>

<!-- ===== LOADER ===== -->
<div id="loader">
    <div class="loader-inner">
        <div class="loader-logo">SA</div>
        <div class="loader-bar"><div class="loader-bar-fill"></div></div>
        <p class="loader-text">Inizializzazione sistema...</p>
    </div>
</div>

<!-- ===== WHATSAPP FLOATING BUTTON ===== -->
<a href="https://wa.me/{{ $data['whatsapp'] }}?text=Ciao%20Samuele!%20Ti%20contatto%20dal%20tuo%20portfolio."
   target="_blank" rel="noopener noreferrer"
   class="whatsapp-float" id="whatsappFloat" title="Scrivimi su WhatsApp" aria-label="Contattami su WhatsApp">
    <i class="bi bi-whatsapp"></i>
    <span class="whatsapp-tooltip">Scrivimi su WhatsApp</span>
</a>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand glitch-small" href="#hero" data-text="SA">SA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-label="Menu">
            <span class="navbar-toggler-icon-custom"><span></span><span></span><span></span></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#about">Chi sono</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Servizi</a></li>
                <li class="nav-item"><a class="nav-link" href="#skills">Competenze</a></li>
                <li class="nav-item"><a class="nav-link" href="#experience">Esperienza</a></li>
                <li class="nav-item"><a class="nav-link" href="#education">Formazione</a></li>
                <li class="nav-item"><a class="nav-link" href="#certifications">Certificazioni</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contatti</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ===== HERO ===== -->
<section id="hero" class="hero-section">
    <canvas id="particleCanvas"></canvas>
    <div class="hero-grid-overlay"></div>
    <div class="container hero-content">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8">
                <div class="hero-badge" data-aos="fade-down">
                    <span class="badge-dot"></span>
                    <span>Disponibile per nuovi progetti e collaborazioni</span>
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
                <div class="hero-dual-badge" data-aos="fade-up" data-aos-delay="350">
                    <span class="dual-item">
                        <i class="bi bi-pc-display-horizontal"></i> IT Support & ICT Specialist
                    </span>
                    <span class="dual-sep">+</span>
                    <span class="dual-item">
                        <i class="bi bi-code-slash"></i> Web Developer
                    </span>
                </div>
                <div class="hero-actions" data-aos="fade-up" data-aos-delay="400">
                    <a href="#services" class="btn btn-primary-custom">
                        <span>I miei servizi</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="https://wa.me/{{ $data['whatsapp'] }}?text=Ciao%20Samuele!%20Ti%20contatto%20dal%20tuo%20portfolio."
                       target="_blank" rel="noopener" class="btn btn-whatsapp-hero">
                        <i class="bi bi-whatsapp"></i>
                        <span>WhatsApp</span>
                    </a>
                    <a href="#contact" class="btn btn-outline-custom">
                        <span>Contattami</span>
                    </a>
                </div>
                <div class="hero-socials" data-aos="fade-up" data-aos-delay="500">
                    <a href="mailto:{{ $data['email'] }}" class="social-link" title="Email">
                        <i class="bi bi-envelope-fill"></i>
                    </a>
                    <a href="{{ $data['linkedin'] }}" target="_blank" rel="noopener" class="social-link" title="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="tel:{{ $data['phone'] }}" class="social-link" title="Telefono">
                        <i class="bi bi-telephone-fill"></i>
                    </a>
                    <a href="https://wa.me/{{ $data['whatsapp'] }}" target="_blank" rel="noopener" class="social-link" title="WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center" data-aos="fade-left" data-aos-delay="300">
                <div class="hero-avatar-wrapper">
                    <div class="avatar-ring ring-1"></div>
                    <div class="avatar-ring ring-2"></div>
                    <div class="avatar-ring ring-3"></div>
                    <div class="avatar-placeholder"><span>SA</span></div>
                    <div class="avatar-badge">
                        <i class="bi bi-shield-check-fill"></i>
                        <span>IT + Dev</span>
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

<!-- ===== ABOUT ===== -->
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
                            <span class="dot red"></span><span class="dot yellow"></span><span class="dot green"></span>
                        </div>
                        <span class="terminal-title">profile.json</span>
                    </div>
                    <div class="about-card-body">
                        <pre class="code-block"><code><span class="c-key">"nome"</span>: <span class="c-val">"{{ $data['name'] }}"</span>,
<span class="c-key">"ruolo_1"</span>: <span class="c-val">"IT Support & ICT Specialist"</span>,
<span class="c-key">"ruolo_2"</span>: <span class="c-val">"Full-Stack Web Developer"</span>,
<span class="c-key">"posizione"</span>: <span class="c-val">"{{ $data['location'] }}"</span>,
<span class="c-key">"data_nascita"</span>: <span class="c-val">"23/01/2004"</span>,
<span class="c-key">"patente"</span>: <span class="c-val">"B"</span>,
<span class="c-key">"remoto"</span>: <span class="c-bool">true</span>,
<span class="c-key">"disponibile"</span>: <span class="c-bool">true</span></code></pre>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <p class="about-text">
                    Sono <strong>Samuele Attinà</strong>, un professionista IT che unisce due mondi: lavoro come
                    <strong>IT Support & ICT Specialist Junior</strong> in azienda, occupandomi di infrastrutture,
                    reti e sicurezza informatica, e contemporaneamente sviluppo <strong>siti web</strong>,
                    <strong>applicazioni</strong> e <strong>gestionali su misura</strong> per privati e aziende.
                </p>
                <p class="about-text">
                    Se hai bisogno di <strong>consulenza informatica</strong>, assistenza tecnica, o vuoi
                    <strong>realizzare un sito web / gestionale professionale</strong>, contattami: troverai
                    un professionista affidabile, puntuale e sempre aggiornato.
                </p>
                <div class="about-stats">
                    <div class="stat-item">
                        <span class="stat-number" data-count="2">0</span>
                        <span class="stat-label">Anni IT</span>
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
                    <h3 class="subsection-title">Lingue</h3>
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

<!-- ===== SERVICES ===== -->
<section id="services" class="section-services">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-tag">// services.available()</span>
            <h2 class="section-title">Cosa Posso Fare per Te</h2>
            <p class="section-sub">Sia che tu abbia bisogno di supporto informatico, un sito web o un gestionale — sono il professionista che fa per te.</p>
        </div>
        <div class="row g-4">
            @foreach($data['services'] as $idx => $service)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
                <div class="service-card service-card--{{ $service['color'] }}">
                    <div class="service-icon">
                        <i class="bi bi-{{ $service['icon'] }}"></i>
                    </div>
                    <h3 class="service-title">{{ $service['title'] }}</h3>
                    <p class="service-desc">{{ $service['desc'] }}</p>
                    <div class="service-tags">
                        @foreach($service['tags'] as $tag)
                        <span class="service-tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <a href="#contact" class="service-cta">
                        Richiedi info <i class="bi bi-arrow-right-short"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <!-- CTA banner -->
        <div class="services-cta-banner" data-aos="fade-up" data-aos-delay="400">
            <div class="cta-banner-inner">
                <div>
                    <h4>Hai un progetto in mente?</h4>
                    <p>Contattami subito per un preventivo gratuito e senza impegno.</p>
                </div>
                <div class="cta-banner-btns">
                    <a href="https://wa.me/{{ $data['whatsapp'] }}?text=Ciao%20Samuele!%20Vorrei%20un%20preventivo."
                       target="_blank" rel="noopener" class="btn btn-whatsapp-hero">
                        <i class="bi bi-whatsapp"></i> WhatsApp
                    </a>
                    <a href="mailto:{{ $data['email'] }}" class="btn btn-outline-custom">
                        <i class="bi bi-envelope"></i> Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SKILLS ===== -->
<section id="skills" class="section-skills">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-tag">// skills.map()</span>
            <h2 class="section-title">Competenze Tecniche</h2>
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
        <div class="tech-orbs" data-aos="fade-up" data-aos-delay="300">
            @php
                $techStack = ['HTML5','CSS3','JavaScript','PHP','Laravel','Bootstrap','MySQL','Active Directory','Cisco','Windows Server','GitHub','Microsoft 365','VPN','Firewall','ERP'];
            @endphp
            @foreach($techStack as $tech)
            <div class="tech-orb">{{ $tech }}</div>
            @endforeach
        </div>
    </div>
</section>

<!-- ===== EXPERIENCE ===== -->
<section id="experience" class="section-experience">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-tag">// experience.forEach()</span>
            <h2 class="section-title">Esperienza Lavorativa</h2>
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
                            <p class="timeline-company"><i class="bi bi-building"></i> {{ $exp['company'] }}</p>
                        </div>
                        <span class="timeline-period">
                            @if($exp['type'] === 'current')<span class="live-dot"></span>@endif
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

<!-- ===== EDUCATION ===== -->
<section id="education" class="section-education">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-tag">// education.load()</span>
            <h2 class="section-title">Formazione</h2>
        </div>
        <div class="row g-4">
            @foreach($data['education'] as $idx => $edu)
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $idx * 150 }}">
                <div class="edu-card {{ $edu['upcoming'] ? 'edu-card--upcoming' : '' }}">
                    <div class="edu-icon">
                        <i class="bi bi-{{ $edu['upcoming'] ? 'mortarboard' : 'mortarboard-fill' }}"></i>
                    </div>
                    @if($edu['upcoming'])
                    <span class="edu-upcoming-badge"><i class="bi bi-clock"></i> In partenza a settembre</span>
                    @endif
                    <h4 class="edu-title">{{ $edu['title'] }}</h4>
                    <p class="edu-institution"><i class="bi bi-geo-alt"></i> {{ $edu['institution'] }}</p>
                    <p class="edu-period"><i class="bi bi-calendar3"></i> {{ $edu['period'] }}</p>
                    <p class="edu-desc">{{ $edu['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ===== CERTIFICATIONS ===== -->
<section id="certifications" class="section-certifications">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-tag">// certifications.verify()</span>
            <h2 class="section-title">Certificazioni</h2>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($data['certifications'] as $idx => $cert)
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $idx * 100 }}">
                <div class="cert-card {{ $cert['upcoming'] ? 'cert-card--upcoming' : '' }}">
                    <div class="cert-icon"><i class="bi bi-{{ $cert['icon'] }}"></i></div>
                    @if($cert['upcoming'])
                        <div class="cert-upcoming-badge"><i class="bi bi-hourglass-split"></i> In arrivo</div>
                    @else
                        <div class="cert-verified"><i class="bi bi-patch-check-fill"></i></div>
                    @endif
                    <h5 class="cert-name">{{ $cert['name'] }}</h5>
                    <p class="cert-issuer">{{ $cert['issuer'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ===== CONTACT ===== -->
<section id="contact" class="section-contact">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-tag">// contact.init()</span>
            <h2 class="section-title">Contatti</h2>
            <p class="section-sub">Scrivimi per sviluppo web, gestionali, consulenza IT o qualsiasi altra richiesta.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="contact-info">
                    <p class="contact-intro">
                        Hai bisogno di un sito web, un gestionale, assistenza informatica o consulenza IT?
                        Contattami: rispondo entro poche ore.
                    </p>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="bi bi-whatsapp"></i></div>
                        <div>
                            <span class="contact-label">WhatsApp (risposta rapida)</span>
                            <a href="https://wa.me/{{ $data['whatsapp'] }}?text=Ciao%20Samuele!" target="_blank" rel="noopener" class="contact-value">{{ $data['phone'] }}</a>
                        </div>
                    </div>
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
                            <a href="{{ $data['linkedin'] }}" target="_blank" rel="noopener" class="contact-value">Profilo LinkedIn</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <form id="contactForm" class="contact-form" novalidate>
                    @csrf
                    <div id="formAlert" class="form-alert d-none"></div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating-custom">
                                <label for="name">Nome completo</label>
                                <input type="text" id="name" name="name" placeholder="Il tuo nome" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating-custom">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating-custom">
                                <label for="subject">Oggetto</label>
                                <input type="text" id="subject" name="subject" placeholder="Oggetto" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating-custom">
                                <label for="message">Messaggio</label>
                                <textarea id="message" name="message" rows="5" placeholder="Messaggio" required></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary-custom w-100" id="submitBtn">
                                <span class="btn-text">Invia messaggio</span>
                                <span class="btn-loader d-none"><i class="bi bi-arrow-clockwise spin"></i> Invio...</span>
                                <i class="bi bi-send-fill ms-2 btn-icon"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ===== FOOTER ===== -->
<footer class="footer">
    <div class="container">
        <div class="footer-inner">
            <span class="footer-logo">SA</span>
            <p class="footer-copy">
                &copy; {{ date('Y') }} {{ $data['name'] }} — IT Specialist & Web Developer | Adrano, Catania
            </p>
            <div class="footer-socials">
                <a href="mailto:{{ $data['email'] }}" title="Email"><i class="bi bi-envelope-fill"></i></a>
                <a href="{{ $data['linkedin'] }}" target="_blank" rel="noopener" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                <a href="https://wa.me/{{ $data['whatsapp'] }}" target="_blank" rel="noopener" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
            </div>
        </div>
    </div>
</footer>

<!-- ===== BACK TO TOP ===== -->
<button class="back-to-top" id="backToTop" aria-label="Torna su">
    <i class="bi bi-arrow-up"></i>
</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="{{ asset('js/portfolio.js') }}"></script>
</body>
</html>
