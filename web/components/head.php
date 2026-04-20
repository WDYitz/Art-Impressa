<?php // components/head.php — <head> tag: meta, CDNs, styles, JSON-LD 
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Primary SEO -->
  <title><?= esc(SITE_NAME) ?> | Gráfica e Editora LTDA</title>
  <meta name="description" content="<?= esc(SITE_DESCRIPTION) ?>" />
  <meta name="keywords" content="<?= esc(SITE_KEYWORDS) ?>" />
  <meta name="author" content="<?= esc(SITE_NAME) ?>" />
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
  <meta name="theme-color" content="<?= esc(COLOR_BLUE) ?>" />

  <!-- Geo-->
  <meta name="geo.region" content="BR-SP" />
  <meta name="geo.placename" content="São Paulo, Brasil" />
  <meta name="geo.position" content="-23.5505;-46.6333" />
  <meta name="ICBM" content="-23.5505, -46.6333" />

  <!-- Open Graph-->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?= esc(SITE_URL) ?>" />
  <meta property="og:title" content="<?= esc(SITE_NAME) ?> | Gráfica e Editora em São Paulo" />
  <meta property="og:description" content="<?= esc(SITE_DESCRIPTION) ?>" />
  <meta property="og:image" content="<?= esc(SITE_OG_IMAGE) ?>" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:locale" content="pt_BR" />
  <meta property="og:site_name" content="<?= esc(SITE_NAME) ?>" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@artimpressa" />
  <meta name="twitter:title" content="<?= esc(SITE_NAME) ?> | Gráfica e Editora em São Paulo" />
  <meta name="twitter:description" content="<?= esc(SITE_DESCRIPTION) ?>" />
  <meta name="twitter:image" content="<?= esc(SITE_OG_IMAGE) ?>" />

  <!-- Canonical -->
  <link rel="canonical" href="<?= esc(SITE_URL) ?>" />

  <!-- Preconnect hints  -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preconnect" href="https://images.unsplash.com" />

  <!-- Google Fonts  -->
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,300;1,9..40,400&family=Playfair+Display:ital,wght@0,700;0,800;0,900;1,700;1,800&display=swap" rel="stylesheet" />
  <!-- Favicon --->
  <link rel="icon" type="image/png" href="web/assets/img/art-impressa-logo-sem-texto.png">
  <!-- Tailwind CSS Play CDN (config must precede the script)  -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            blue: {
              DEFAULT: '#64d4f6',
              light: '#E8C57D'
            },
            ink: '#0D0D0D',
            cream: '#F7F4EF',
            stone: '#E8E0D5',
            muted: '#717182',
            charcoal: '#4A4A4A',
            graphite: '#0A0A0A',
          },
          fontFamily: {
            sans: ['"DM Sans"', 'sans-serif'],
            serif: ['"Playfair Display"', 'serif'],
          },
        },
      },
    };
  </script>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Flowbite 2.3.0 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

  <!--  Alpine.js 3.x  -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!--Custom Styles -->
  <link rel="stylesheet" href="web/assets/css/minified/product-gallery-modal.css" />
  <style>
    /* Prevent Alpine.js flash of unstyled content */
    [x-cloak] {
      display: none !important;
    }

    /* Scroll-reveal base states  */
    .reveal {
      opacity: 0;
      transform: translateY(36px);
      transition: opacity .75s ease, transform .75s ease;
    }

    .reveal-left {
      opacity: 0;
      transform: translateX(-64px);
      transition: opacity .9s ease, transform .9s ease;
    }

    .reveal-right {
      opacity: 0;
      transform: translateX(64px);
      transition: opacity .9s ease, transform .9s ease;
    }

    .reveal-scale {
      opacity: 0;
      transform: scale(.88);
      transition: opacity .7s ease, transform .7s ease;
    }

    .revealed {
      opacity: 1 !important;
      transform: none !important;
    }

    /* Stagger delay helpers */
    .d1 {
      transition-delay: .10s
    }

    .d2 {
      transition-delay: .20s
    }

    .d3 {
      transition-delay: .30s
    }

    .d4 {
      transition-delay: .40s
    }

    .d5 {
      transition-delay: .50s
    }

    .d6 {
      transition-delay: .60s
    }

    /* ── Gear spin animations ─────────────────────────────── */
    @keyframes g-cw {
      to {
        transform: rotate(360deg);
      }
    }

    @keyframes g-ccw {
      to {
        transform: rotate(-360deg);
      }
    }

    .gear-cw {
      animation: g-cw 20s linear infinite;
    }

    .gear-ccw {
      animation: g-ccw 15s linear infinite;
    }

    .gear-cw2 {
      animation: g-cw 32s linear infinite;
    }

    .gear-ccw2 {
      animation: g-ccw 10s linear infinite;
    }

    /* ── Ink-drop float animation ─────────────────────────── */
    @keyframes ink-float {

      0%,
      100% {
        transform: translateY(0) scale(1);
        opacity: .10;
      }

      50% {
        transform: translateY(-22px) scale(1.3);
        opacity: .40;
      }
    }

    .ink {
      animation: ink-float var(--dur, 4s) ease-in-out var(--del, 0s) infinite;
    }

    /* ── Quote word-rise animation ────────────────────────── */
    @keyframes word-rise {
      from {
        opacity: 0;
        transform: translateY(40px) rotateX(-60deg);
      }

      to {
        opacity: 1;
        transform: translateY(0) rotateX(0deg);
      }
    }

    .qword {
      opacity: 0;
      display: inline-block;
    }

    .qword.on {
      animation: word-rise .6s cubic-bezier(.22, 1, .36, 1) forwards;
    }

    /* ── Press-roller pulse ───────────────────────────────── */
    @keyframes roller {

      0%,
      100% {
        transform: scale(1);
        opacity: .3
      }

      50% {
        transform: scale(1.5);
        opacity: 1
      }
    }

    .roller {
      animation: roller 1.5s ease-in-out infinite;
    }

    /* ── Scroll-down bounce ───────────────────────────────── */
    @keyframes bdwn {

      0%,
      100% {
        transform: translateY(0)
      }

      50% {
        transform: translateY(8px)
      }
    }

    .bounce-d {
      animation: bdwn 2s ease-in-out infinite;
    }

    /* ── Hero crossfade slides ────────────────────────────── */
    .slide {
      position: absolute;
      inset: 0;
      transition: opacity .9s ease;
    }

    /* ── Product/reason card bottom accent line ───────────── */
    .card-accent-line {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 2px;
      width: 0;
      background: #C9973B;
      transition: width .5s ease;
    }

    .card-hover:hover .card-accent-line {
      width: 100%;
    }

    /* ── Navbar nav-link hover underline ──────────────────── */
    .nav-ul {
      position: relative;
    }

    .nav-ul::after {
      content: '';
      display: block;
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 1px;
      background: #C9973B;
      transition: width .3s ease;
    }

    .nav-ul:hover::after {
      width: 100%;
    }

    /* ── Navbar scroll state ──────────────────────────────── */
    .nav-solid {
      background-color: rgba(13, 13, 13, .97) !important;
      box-shadow: 0 2px 24px rgba(0, 0, 0, .3);
    }

    .nav-transparent {
      background-color: transparent;
    }

    /* ── Quote section grid texture ───────────────────────── */
    .quote-grid {
      background-image:
        repeating-linear-gradient(0deg, transparent, transparent 28px, rgba(201, 151, 59, .5) 28px, rgba(201, 151, 59, .5) 29px);
      opacity: .05;
    }
  </style>

  <!-- ── JSON-LD Structured Data ──────────────────────────────────────── -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [{
          "@type": "LocalBusiness",
          "@id": "<?= esc(SITE_URL) ?>/#business",
          "name": "<?= esc(SITE_NAME) ?>",
          "alternateName": "Art Impressa Gráfica e Editora LTDA",
          "description": "<?= esc(SITE_DESCRIPTION) ?>",
          "url": "<?= esc(SITE_URL) ?>",
          "telephone": "<?= esc(SITE_PHONE) ?>",
          "email": "<?= esc(SITE_EMAIL) ?>",
          "foundingDate": "<?= FOUNDING_YEAR ?>",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Rua das Artes Gráficas, 245",
            "addressLocality": "São Paulo",
            "addressRegion": "SP",
            "postalCode": "01310-000",
            "addressCountry": "BR"
          },
          "openingHoursSpecification": [{
              "@type": "OpeningHoursSpecification",
              "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
              "opens": "08:00",
              "closes": "18:00"
            },
            {
              "@type": "OpeningHoursSpecification",
              "dayOfWeek": "Saturday",
              "opens": "08:00",
              "closes": "13:00"
            }
          ],
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.9",
            "bestRating": "5",
            "ratingCount": "312"
          }
        },
        {
          "@type": "WebPage",
          "@id": "<?= esc(SITE_URL) ?>/#webpage",
          "url": "<?= esc(SITE_URL) ?>",
          "name": "<?= esc(SITE_NAME) ?> | Gráfica e Editora em São Paulo",
          "description": "<?= esc(SITE_DESCRIPTION) ?>",
          "inLanguage": "pt-BR",
          "dateModified": "<?= date('Y-m-d') ?>",
          "breadcrumb": {
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Início",
                "item": "<?= esc(SITE_URL) ?>"
              },
              {
                "@type": "ListItem",
                "position": 2,
                "name": "Sobre Nós",
                "item": "<?= esc(SITE_URL) ?>/#about"
              },
              {
                "@type": "ListItem",
                "position": 3,
                "name": "Produtos",
                "item": "<?= esc(SITE_URL) ?>/#products"
              },
              {
                "@type": "ListItem",
                "position": 4,
                "name": "Contato",
                "item": "<?= esc(SITE_URL) ?>/#contact"
              }
            ]
          }
        }
      ]
    }
  </script>
</head>