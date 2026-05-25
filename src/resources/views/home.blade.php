<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="{{ asset('assets/https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&family=DM+Serif+Display:ital@0;1&display=swap')}}" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'DM Sans', sans-serif; background: #09090b; color: #fafafa; min-height: 100vh; }
        .serif { font-family: 'DM Serif Display', serif; }

        .page { display: none !important; }
        .page.active { display: block !important; }

        .grid-bg {
            background-image:
                linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
            background-size: 60px 60px;
        }
        .nav-link { color: #71717a; transition: color 0.2s; font-size: 14px; text-decoration: none; padding: 8px 14px; border-radius: 8px; display: inline-block; }
        .nav-link:hover, .nav-link.active { color: #fafafa; }
        .tag { display: inline-block; padding: 3px 10px; border-radius: 999px; background: #18181b; border: 1px solid #27272a; font-size: 12px; color: #a1a1aa; }
        .project-card { border: 1px solid #27272a; border-radius: 20px; padding: 32px; background: #111113; cursor: pointer; transition: border-color 0.2s, background 0.2s; }
        .project-card:hover { border-color: #3f3f46; background: #18181b; }
        .progress-track { background: #27272a; border-radius: 999px; height: 6px; overflow: hidden; }
        .progress-fill { height: 6px; border-radius: 999px; background: #fafafa; transition: width 0.6s ease; }
        .status-badge { display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; border-radius: 999px; font-size: 12px; }
        .status-progress { background: #0c1627; border: 1px solid #1e40af; color: #60a5fa; }
        .status-done     { background: #0c1a0c; border: 1px solid #166534; color: #4ade80; }
        .status-hold     { background: #1a0c0c; border: 1px solid #7f1d1d; color: #fca5a5; }
        .status-planning { background: #111; border: 1px solid #3f3f46; color: #a1a1aa; }
        .btn-primary   { background: #fafafa; color: #09090b; border: none; border-radius: 12px; padding: 10px 20px; font-family: 'DM Sans', sans-serif; font-size: 14px; font-weight: 500; cursor: pointer; transition: opacity 0.2s; }
        .btn-primary:hover { opacity: 0.85; }
        .btn-secondary { background: transparent; color: #a1a1aa; border: 1px solid #27272a; border-radius: 12px; padding: 10px 20px; font-family: 'DM Sans', sans-serif; font-size: 14px; cursor: pointer; transition: all 0.2s; }
        .btn-secondary:hover { border-color: #3f3f46; color: #fafafa; }
        .btn-danger    { background: transparent; color: #f87171; border: 1px solid #3f1212; border-radius: 8px; padding: 5px 12px; font-family: 'DM Sans', sans-serif; font-size: 12px; cursor: pointer; transition: all 0.2s; }
        .btn-danger:hover { background: #1a0a0a; }
        .btn-sm        { background: transparent; color: #a1a1aa; border: 1px solid #27272a; border-radius: 8px; padding: 5px 12px; font-family: 'DM Sans', sans-serif; font-size: 12px; cursor: pointer; transition: all 0.2s; }
        .btn-sm:hover  { border-color: #3f3f46; color: #fafafa; }
        .admin-input { width: 100%; padding: 10px 16px; background: #09090b; border: 1px solid #27272a; border-radius: 12px; color: #fafafa; font-family: 'DM Sans', sans-serif; font-size: 14px; outline: none; transition: border-color 0.2s; }
        .admin-input:focus { border-color: #52525b; }
        .admin-input::placeholder { color: #52525b; }
        textarea.admin-input { resize: vertical; min-height: 80px; }
        select.admin-input { appearance: none; cursor: pointer; }
        .admin-tab { padding: 8px 20px; border-radius: 10px; cursor: pointer; font-size: 14px; color: #71717a; transition: all 0.2s; border: 1px solid transparent; user-select: none; }
        .admin-tab.active { background: #18181b; border-color: #27272a; color: #fafafa; }
        .admin-tab:hover:not(.active) { color: #a1a1aa; }
        .contact-input { width: 100%; padding: 14px 18px; background: #111113; border: 1px solid #27272a; border-radius: 14px; color: #fafafa; font-family: 'DM Sans', sans-serif; font-size: 15px; outline: none; transition: border-color 0.2s; }
        .contact-input:focus { border-color: #52525b; }
        .contact-input::placeholder { color: #3f3f46; }
        textarea.contact-input { resize: vertical; min-height: 120px; }
        .section-label { font-size: 10px; letter-spacing: 4px; color: #52525b; text-transform: uppercase; }
        .divider { border: none; border-top: 1px solid #18181b; margin: 24px 0; }
        .erd-entity-row { background: #111113; border: 1px solid #27272a; border-radius: 12px; padding: 12px 16px; margin-bottom: 8px; }
        @keyframes fadeUp { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: translateY(0); } }
        .fade-up { animation: fadeUp 0.4s ease forwards; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #09090b; }
        ::-webkit-scrollbar-thumb { background: #27272a; border-radius: 3px; }
        input[type=range].admin-input { padding: 0; height: 36px; background: none; border: none; cursor: pointer; }
        .stack-row { display: grid; grid-template-columns: 1fr 1fr auto; gap: 8px; align-items: center; margin-bottom: 8px; }
        .tech-card{
            padding:16px 20px;
            background:#111113;
            border:1px solid #27272a;
            border-radius:14px;
            font-size:14px;
            color:#d4d4d8;
            transition:all .2s ease;
        }

        .tech-card:hover{
            border-color:#3f3f46;
            transform:translateY(-2px);
        }
    </style>
</head>
<body class="grid-bg">

<!-- ==================== NAVBAR ==================== -->
<nav style="position:fixed;top:0;left:0;right:0;z-index:50;background:rgba(9,9,11,0.85);backdrop-filter:blur(12px);border-bottom:1px solid #18181b;">
    <div style="max-width:1100px;margin:0 auto;padding:0 24px;display:flex;align-items:center;justify-content:space-between;height:68px;">
        <div id="logo" style="font-size:18px;font-weight:600;cursor:pointer;letter-spacing:-0.03em;">Portofolio</div>
        <div style="display:flex;align-items:center;gap:4px;">
            <a href="#" class="nav-link" id="nav-home">Home</a>
            <a href="#" class="nav-link" id="nav-projects">Projects</a>
            <a href="#" class="nav-link" id="nav-contact">Contact</a>
        </div>
    </div>
</nav>

<!-- ==================== HOME ==================== -->
<div id="pg-home" class="page active grid-bg" style="padding-top:68px;">

    <!-- HERO -->
    <section style="max-width:1100px;margin:0 auto;padding:100px 24px 80px;">

        <div style="
            display:grid;
            grid-template-columns:320px 1fr;
            gap:64px;
            align-items:center;
        ">

            <!-- FOTO -->
            <div style="display:flex;justify-content:center;">

                @if($profile?->photo)
                    <img
                        src="{{ asset('storage/' . $profile->photo) }}"
                        alt="Profile"
                        style="
                            width:320px;
                            height:320px;
                            object-fit:cover;
                            border-radius:24px;
                        "
                    >
                @else
                    <div
                        style="
                            width:320px;
                            height:320px;
                            border:1px dashed #3f3f46;
                            border-radius:24px;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            color:#71717a;
                        "
                    >
                        Belum ada foto
                    </div>
                @endif

            </div>

            <!-- CONTENT -->
            <div>

                <div style="
                    display:inline-block;
                    padding:6px 18px;
                    border-radius:999px;
                    background:#111113;
                    border:1px solid #27272a;
                    font-size:10px;
                    letter-spacing:4px;
                    color:#71717a;
                    margin-bottom:24px;
                ">
                    {{ $profile?->badge }}
                </div>

                <h1 class="serif"
                    style="
                        font-size:clamp(52px,8vw,82px);
                        line-height:1;
                        margin:0 0 24px;
                        letter-spacing:-0.03em;
                    ">
                    {{ $profile?->name }}
                </h1>

                <p style="
                    font-size:18px;
                    color:#71717a;
                    margin:0 0 40px;
                    font-weight:300;
                    max-width:580px;
                    line-height:1.7;
                ">
                    {{ $profile?->tagline }}
                </p>

                <div style="display:flex;gap:12px;flex-wrap:wrap;">

                    <button
                        class="btn-primary"
                        id="hero-projects"
                        style="padding:12px 28px;font-size:15px;"
                    >
                        View Projects →
                    </button>

                    <button
                        class="btn-secondary"
                        id="hero-contact"
                        style="padding:12px 28px;font-size:15px;"
                    >
                        Contact Me
                    </button>

                </div>

            </div>

        </div>

    </section>

    <!-- ABOUT -->
    <section style="
        max-width:1100px;
        margin:0 auto;
        padding:64px 24px;
        border-top:1px solid #18181b;
    ">

        <div style="
            display:grid;
            grid-template-columns:1fr 2fr;
            gap:64px;
        ">

            <div>
                <div class="section-label" style="margin-bottom:12px;">About me</div>
            </div>

            <div>

                <p style="
                    font-size:18px;
                    color:#d4d4d8;
                    line-height:1.8;
                    margin:0 0 20px;
                ">
                </p>

                <p style="
                    font-size:18px;
                    color:#71717a;
                    line-height:1.8;
                    margin:0;
                ">
                    {!! nl2br(e($profile?->about_me)) !!}
                </p>

            </div>

        </div>

    </section>

    <!-- TECH STACK -->
    <section style="max-width:1100px; margin:0 auto; padding:64px 24px;border-top:1px solid #18181b;">

        <div class="section-label" style="margin-bottom:10px;">Expertise</div>

        <h2 class="serif" style=" font-size:56px; margin:0 0 36px;">Tech Stack</h2>

        <div style="
            display:grid;
            grid-template-columns:repeat(auto-fill,minmax(160px,1fr));
            gap:14px;">
                @if($profile?->tech_stack)
                @foreach(explode(',', $profile->tech_stack) as $tech)
                    <div class="tech-card">
                        {{ trim($tech) }}
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <!-- FOOTER -->
    <footer style="
        text-align:center;
        padding:40px 24px;
        border-top:1px solid #18181b;
        color:#27272a;
        font-size:13px;
    ">
        © 2026 Portfolio.
    </footer>

</div>

<!-- ==================== PROJECTS ==================== -->
<div id="pg-projects" class="page grid-bg" style="padding-top:68px;">
    <div style="max-width:1100px;margin:0 auto;padding:64px 24px;">
        <div style="margin-bottom:40px;">
            <div class="section-label" style="margin-bottom:10px;">Selected Work</div>
            <h2 class="serif" style="font-size:clamp(44px,7vw,64px);margin:0;">Projects</h2>
        </div>
        <div id="projects-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(480px,1fr));gap:16px;"></div>
    </div>
    <div style="text-align:center;padding:40px 24px;border-top:1px solid #18181b;color:#27272a;font-size:13px;">&copy; 2026 Portofolio.</div>
</div>

<!-- ==================== PROJECT DETAIL ==================== -->
<div id="pg-detail" class="page grid-bg" style="padding-top:68px;">
    <div style="max-width:900px;margin:0 auto;padding:48px 24px;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:40px;">
            <button class="btn-secondary" id="btn-back-projects" style="display:flex;align-items:center;gap:8px;padding:8px 18px;font-size:13px;">&larr; Kembali ke Projects</button>
        </div>
            <h1
                class="serif"
                id="dp-title"
                style="
                    font-size:clamp(40px,6vw,64px);
                    margin:0;
                    letter-spacing:-0.03em;
                "
            ></h1>

        <div style="margin-bottom:40px;">
            <div class="section-label" style="margin-bottom:12px;">1.  Deskripsi Singkat</div>
            <p id="dp-description" style="font-size:16px;color:#d4d4d8;line-height:1.8;white-space:pre-wrap;"></p>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-bottom:40px;">
            <div>
                <div class="section-label" style="margin-bottom:12px;">2. Analisis Masalah</div>
                <p id="dp-problem" style="font-size:14px;color:#a1a1aa;line-height:1.8;white-space:pre-wrap;"></p>
            </div>
            <div>
                <div class="section-label" style="margin-bottom:12px;">Fitur Utama</div>
                <div id="dp-features" style="font-size:14px;color:#d4d4d8;line-height:2;"></div>
            </div>
        </div>
        <div style="margin-bottom:40px;">
            <div class="section-label" style="margin-bottom:16px;">3. Arsitektur &amp; Tech Stack</div>
            <div id="dp-stack" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:12px;"></div>
        </div>
        <div style="background:#111113;border:1px solid #27272a;border-radius:20px;padding:28px 32px;margin-bottom:40px;">
            <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:16px;">
                <div>
                    <div class="section-label" style="margin-bottom:6px;">Status Terkini</div>
                    <div id="dp-status" style="font-size:28px;font-weight:500;"></div>
                </div>
                <div style="text-align:right;">
                    <div class="section-label" style="margin-bottom:6px;">Progress</div>
                    <div style="display:flex;align-items:baseline;gap:4px;">
                        <span id="dp-progress" style="font-size:56px;font-weight:600;line-height:1;"></span>
                        <span style="font-size:20px;color:#71717a;">%</span>
                    </div>
                </div>
            </div>
            <div class="progress-track"><div class="progress-fill" id="dp-progress-bar" style="width:0%"></div></div>
            <div id="dp-updates-section" style="margin-top:24px;display:none;">
                <div class="section-label" style="margin-bottom:12px;">Riwayat Update</div>
                <div id="dp-updates-list"></div>
            </div>
        </div>
        <div>
            <div class="section-label" style="margin-bottom:8px;">4. Rencana Perancangan &mdash; ERD</div>
            <h3 style="font-size:18px;font-weight:500;margin:0 0 8px;">Entity Relationship Diagram</h3>
            <p style="font-size:13px;color:#52525b;margin:0 0 16px;">Struktur data sistem</p>
            <div style="background:#111113;border:1px solid #27272a;border-radius:20px;padding:32px;overflow-x:auto;">
                <img id="dp-erd-image" src="" alt="ERD" style=" width:100%; border-radius:16px; border:1px solid #27272a;">
            </div>
        </div>
    </div>
    <div style="text-align:center;padding:40px 24px;border-top:1px solid #18181b;color:#27272a;font-size:13px;">&copy; 2026 Portofolio.</div>
</div>

<!-- ==================== CONTACT ==================== -->
<div id="pg-contact" class="page grid-bg" style="padding-top:68px;">

    <div style="max-width:560px;margin:0 auto;padding:80px 24px;">

        <div class="section-label" style="margin-bottom:12px;text-align:center;"> Let's Connect </div>

        <h2 class="serif"  style="font-size:clamp(44px,7vw,60px);text-align:center;margin:0 0 10px;"> Get in touch </h2>

        <p style="text-align:center;color:#71717a;margin:0 0 48px;"> Have a project in mind or just want to chat? </p>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div style="
                margin-bottom:16px;
                padding:14px;
                background:#0c1a0c;
                border:1px solid #166534;
                border-radius:12px;
                color:#4ade80;
                text-align:center;
                font-size:14px;
            ">
                {{ session('success') }}
            </div>
        @endif

        {{-- FORM --}}
        <form action="{{ url('/contact') }}" method="POST">
            @csrf

            <div style=" display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:12px; ">

                <input type="text" name="name" placeholder="Your name" class="contact-input" required >

                <input type="email" name="email" placeholder="Email address" class="contact-input" required >

            </div>

            <textarea name="message" placeholder="Tell me about your project..." class="contact-input" style="margin-bottom:16px;" required ></textarea>

            <button type="submit" class="btn-primary" style="width:100%;padding:14px;font-size:15px;" > Send message </button>

        </form>

    </div>

    <div style=" text-align:center; padding:40px 24px; border-top:1px solid #18181; color:#27272a; font-size:13px; "> © 2026 Portofolio. </div>

</div>

{{-- ============================================================
     JAVASCRIPT — semua pakai addEventListener, TIDAK ada onclick
     ============================================================ --}}
<script>
(function() {
    'use strict';

    // ── STATE ─────────────────────────────────────────────────
    var projects = @json($projects);
    var currentEditId   = null;

    function findProject(id) {
        return projects.find(function(p) { return p.id == id; });
    }

    // ── HELPERS ───────────────────────────────────────────────
    function el(id) { return document.getElementById(id); }
    function setText(id, txt) { var e = el(id); if (e) e.textContent = txt || ''; }
    function setHTML(id, html) { var e = el(id); if (e) e.innerHTML = html || ''; }

    function esc(str) {
        return String(str || '')
            .replace(/&/g,'&amp;')
            .replace(/</g,'&lt;')
            .replace(/>/g,'&gt;')
            .replace(/"/g,'&quot;');
    }

    function getStatusBadge(status) {
        var map = {
            'Sedang Dikerjakan': ['status-progress', '\u25CF '],
            'Selesai':           ['status-done',     '\u2713 '],
            'On Hold':           ['status-hold',     '\u23F8 '],
            'Planning':          ['status-planning', '\u25CB ']
        };
        var pair = map[status] || ['status-planning', ''];
        return '<span class="status-badge ' + pair[0] + '">' + pair[1] + esc(status) + '</span>';
    }

    // ── NAVIGATION ────────────────────────────────────────────
    var PAGES = ['home', 'projects', 'detail', 'contact'];

    function showPage(name) {
        PAGES.forEach(function(p) {
            var e = el('pg-' + p);
            if (e) e.classList.remove('active');
        });
        var target = el('pg-' + name);
        if (target) target.classList.add('active');

        // nav active state
        ['home', 'projects', 'contact'].forEach(function(p) {
            var nav = el('nav-' + p);
            if (nav) nav.classList.toggle('active', p === name);
        });

        window.scrollTo(0, 0);

        if (name === 'projects') renderProjects();
    }

    // ── PROJECTS LIST ─────────────────────────────────────────
    function renderProjects() {

        var g = el('projects-grid');

        if (!g) return;

        g.innerHTML = '';

        projects.forEach(function(p) {

            var div = document.createElement('div');

            div.className = 'project-card fade-up';

            var tagsHtml = p.main_feature
                ? p.main_feature.split(',').map(function(t) {

                    return '<span class="tag">' + esc(t.trim()) + '</span>';

                }).join(' ')
                : '';

            div.innerHTML =
                '<div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:20px;">' +
                    getStatusBadge(p.status) +
                    '<span style="font-size:13px;color:#52525b;">' + esc(p.year) + '</span>' +
                '</div>' +
                '<h3 style="font-size:32px;font-weight:600;margin:0 0 6px;letter-spacing:-0.02em;">' + esc(p.title) + '</h3>' +
                '<p style="font-size:14px;color:#71717a;margin:0 0 20px;">' + esc(p.subtitle) + '</p>' +
                '<div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:20px;">' + tagsHtml + '</div>' +
                '<div class="progress-track"><div class="progress-fill" style="width:' + (p.progress || 0) + '%"></div></div>' +
                '<div style="font-size:12px;color:#52525b;margin-top:8px;">' + (p.progress || 0) + '% complete</div>';

            div.addEventListener('click', (function(pid) {
                return function() {
                    showProjectDetail(pid);
                };
            })(p.id));

            g.appendChild(div);

        });
    }

    // ── PROJECT DETAIL ────────────────────────────────────────
    function showProjectDetail(id) {

        var p = findProject(id);

        if (!p) return;

        // Title
        setText('dp-title', p.title || '');

        // Description
        setText(
            'dp-description',
            p.description || '(Belum ada deskripsi)'
        );

        // Problem
        setText(
            'dp-problem',
            p.problem || '(Belum ada analisis masalah)'
        );

        var feats = p.main_feature
            ? p.main_feature.split(',')
            : [];

        setHTML(
            'dp-features',

            feats.length

                ? feats.map(function(f) {

                    return `
                        <div style="
                            display:flex;
                            align-items:flex-start;
                            gap:8px;
                            margin-bottom:10px;
                        ">
                            <span style="
                                color:#4ade80;
                                margin-top:3px;
                            ">
                                •
                            </span>

                            <span>
                                ${esc(f.trim())}
                            </span>
                        </div>
                    `;

                }).join('')

                : '<span style="color:#52525b">Belum ada fitur</span>'
        );

        var stacks = p.tech_stack
            ? p.tech_stack.split(',')
            : [];

        setHTML(
            'dp-stack',

            stacks.length

                ? stacks.map(function(s) {

                    return `
                        <div style="
                            background:#111113;
                            border:1px solid #27272a;
                            border-radius:20px;
                            padding:24px;
                        ">

                            <div style="
                                font-size:18px;
                                font-weight:600;
                                color:#fafafa;
                            ">
                                ${esc(s.trim())}
                            </div>

                        </div>
                    `;

                }).join('')

                : '<span style="color:#52525b">Belum ada tech stack</span>'
        );

        setHTML(
            'dp-status',
            getStatusBadge(p.status)
        );

        setText(
            'dp-progress',
            String(p.progress || 0)
        );

        setTimeout(function() {

            var bar = el('dp-progress-bar');

            if (bar) {
                bar.style.width = (p.progress || 0) + '%';
            }

        }, 80);
        
        var erdImg = el('dp-erd-image');

        if (erdImg && p.erd_image) {

            erdImg.src = '/storage/' + p.erd_image;

        }

        showPage('detail');
    }

    // ── INIT & EVENT BINDING ──────────────────────────────────
    document.addEventListener('DOMContentLoaded', function() {
        
        // Nav
        el('logo').addEventListener('click', function() { showPage('home'); });
        el('nav-home').addEventListener('click',     function(e) { e.preventDefault(); showPage('home'); });
        el('nav-projects').addEventListener('click', function(e) { e.preventDefault(); showPage('projects'); });
        el('nav-contact').addEventListener('click',  function(e) { e.preventDefault(); showPage('contact'); });

        // Home
        el('hero-projects').addEventListener('click', function() { showPage('projects'); });
        el('hero-contact').addEventListener('click',  function() { showPage('contact'); });

        // Detail
        el('btn-back-projects').addEventListener('click', function() { showPage('projects'); });

        // Show home
        showPage('home');
    });

})();
</script>
</body>
</html>