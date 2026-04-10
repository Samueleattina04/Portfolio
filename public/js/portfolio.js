/* =============================================
   SAMUELE ATTINÀ – PORTFOLIO JS
   ============================================= */

document.addEventListener('DOMContentLoaded', () => {

    // ---- LOADER ----
    const loader = document.getElementById('loader');
    window.addEventListener('load', () => {
        setTimeout(() => {
            loader.classList.add('hidden');
            document.body.style.overflow = '';
        }, 1800);
    });
    document.body.style.overflow = 'hidden';

    // ---- CUSTOM CURSOR ----
    const dot = document.getElementById('cursorDot');
    const outline = document.getElementById('cursorOutline');
    let mouseX = 0, mouseY = 0;
    let outX = 0, outY = 0;

    document.addEventListener('mousemove', e => {
        mouseX = e.clientX; mouseY = e.clientY;
        dot.style.left = mouseX + 'px';
        dot.style.top = mouseY + 'px';
    });

    (function animateOutline() {
        outX += (mouseX - outX) * 0.12;
        outY += (mouseY - outY) * 0.12;
        outline.style.left = outX + 'px';
        outline.style.top = outY + 'px';
        requestAnimationFrame(animateOutline);
    })();

    // ---- NAVBAR SCROLL ----
    const nav = document.getElementById('mainNav');
    const navLinks = document.querySelectorAll('.nav-link');

    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 50);
        updateActiveNav();
        toggleBackToTop();
    });

    function updateActiveNav() {
        const sections = document.querySelectorAll('section[id]');
        let current = '';
        sections.forEach(s => {
            if (window.scrollY >= s.offsetTop - 120) current = s.id;
        });
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === '#' + current) link.classList.add('active');
        });
    }

    // ---- PARTICLE CANVAS ----
    const canvas = document.getElementById('particleCanvas');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        let particles = [];
        const W = () => canvas.width = window.innerWidth;
        const H = () => canvas.height = window.innerHeight;
        W(); H();
        window.addEventListener('resize', () => { W(); H(); });

        class Particle {
            constructor() { this.reset(); }
            reset() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.vx = (Math.random() - .5) * .4;
                this.vy = (Math.random() - .5) * .4;
                this.size = Math.random() * 2 + .5;
                this.alpha = Math.random() * .5 + .1;
                this.color = Math.random() > .7 ? '#00d4ff' : '#7c3aed';
            }
            update() {
                this.x += this.vx; this.y += this.vy;
                if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) this.reset();
            }
            draw() {
                ctx.save();
                ctx.globalAlpha = this.alpha;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fillStyle = this.color;
                ctx.fill();
                ctx.restore();
            }
        }

        for (let i = 0; i < 120; i++) particles.push(new Particle());

        function connectParticles() {
            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    const dx = particles[i].x - particles[j].x;
                    const dy = particles[i].y - particles[j].y;
                    const d = Math.sqrt(dx * dx + dy * dy);
                    if (d < 100) {
                        ctx.save();
                        ctx.globalAlpha = (1 - d / 100) * .08;
                        ctx.strokeStyle = '#00d4ff';
                        ctx.lineWidth = .5;
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.stroke();
                        ctx.restore();
                    }
                }
            }
        }

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => { p.update(); p.draw(); });
            connectParticles();
            requestAnimationFrame(animateParticles);
        }
        animateParticles();
    }

    // ---- TYPED TEXT ----
    const typedEl = document.getElementById('typedText');
    if (typedEl) {
        const texts = [
            'IT Support & ICT Specialist',
            'Full-Stack Web Developer',
            'Sviluppo Siti Web & Gestionali',
            'Consulenza Informatica',
            'Cybersecurity Enthusiast',
        ];
        let tIdx = 0, cIdx = 0, deleting = false;
        function typeLoop() {
            const current = texts[tIdx];
            if (!deleting) {
                typedEl.textContent = current.slice(0, ++cIdx);
                if (cIdx === current.length) { deleting = true; setTimeout(typeLoop, 2200); return; }
            } else {
                typedEl.textContent = current.slice(0, --cIdx);
                if (cIdx === 0) { deleting = false; tIdx = (tIdx + 1) % texts.length; }
            }
            setTimeout(typeLoop, deleting ? 40 : 80);
        }
        setTimeout(typeLoop, 2000);
    }

    // ---- AOS INIT ----
    AOS.init({ duration: 700, once: true, easing: 'ease-out-cubic', offset: 80 });

    // ---- ANIMATED COUNTERS ----
    function animateCounter(el) {
        const target = parseInt(el.dataset.count);
        let current = 0;
        const step = Math.ceil(target / 40);
        const timer = setInterval(() => {
            current = Math.min(current + step, target);
            el.textContent = current + '+';
            if (current >= target) clearInterval(timer);
        }, 40);
    }

    const counterObserver = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                animateCounter(e.target);
                counterObserver.unobserve(e.target);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('[data-count]').forEach(el => counterObserver.observe(el));

    // ---- ANIMATED BARS (skills + languages) ----
    const barObserver = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                const w = e.target.dataset.width;
                e.target.style.width = w + '%';
                barObserver.unobserve(e.target);
            }
        });
    }, { threshold: 0.3 });

    document.querySelectorAll('.skill-bar-fill, .lang-bar-fill').forEach(el => barObserver.observe(el));

    // ---- BACK TO TOP ----
    const btt = document.getElementById('backToTop');
    function toggleBackToTop() {
        btt.classList.toggle('visible', window.scrollY > 400);
    }
    btt.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

    // ---- CONTACT FORM ----
    const form = document.getElementById('contactForm');
    const alertEl = document.getElementById('formAlert');
    const submitBtn = document.getElementById('submitBtn');

    if (form) {
        form.addEventListener('submit', async e => {
            e.preventDefault();
            const btnText = submitBtn.querySelector('.btn-text');
            const btnLoader = submitBtn.querySelector('.btn-loader');
            const btnIcon = submitBtn.querySelector('.btn-icon');

            submitBtn.disabled = true;
            btnText.classList.add('d-none');
            btnIcon.classList.add('d-none');
            btnLoader.classList.remove('d-none');
            alertEl.className = 'form-alert d-none';

            const token = document.querySelector('meta[name="csrf-token"]').content;
            const body = new FormData(form);

            try {
                const res = await fetch('/contact', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': token, 'Accept': 'application/json' },
                    body,
                });
                const data = await res.json();

                if (data.success) {
                    alertEl.textContent = data.message;
                    alertEl.className = 'form-alert success';
                    form.reset();
                } else {
                    const errs = Object.values(data.errors || {}).flat().join(' | ');
                    alertEl.textContent = errs || 'Si è verificato un errore.';
                    alertEl.className = 'form-alert error';
                }
            } catch {
                alertEl.textContent = 'Errore di rete. Riprova più tardi.';
                alertEl.className = 'form-alert error';
            }

            submitBtn.disabled = false;
            btnText.classList.remove('d-none');
            btnIcon.classList.remove('d-none');
            btnLoader.classList.add('d-none');
        });
    }

    // ---- SMOOTH SCROLL for anchor links ----
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const target = document.querySelector(a.getAttribute('href'));
            if (target) {
                e.preventDefault();
                const offset = 80;
                const top = target.getBoundingClientRect().top + window.scrollY - offset;
                window.scrollTo({ top, behavior: 'smooth' });
                // Close mobile navbar
                const collapse = document.getElementById('navbarMenu');
                if (collapse && collapse.classList.contains('show')) {
                    bootstrap.Collapse.getInstance(collapse)?.hide();
                }
            }
        });
    });

    // ---- SKILL CARD TILT (subtle 3D on hover) ----
    document.querySelectorAll('.skill-card, .cert-card, .edu-card').forEach(card => {
        card.addEventListener('mousemove', e => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const cx = rect.width / 2;
            const cy = rect.height / 2;
            const rotX = (y - cy) / cy * -6;
            const rotY = (x - cx) / cx * 6;
            card.style.transform = `perspective(800px) rotateX(${rotX}deg) rotateY(${rotY}deg) translateY(-4px)`;
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    });

});
