<?php

/**
 * Infinite Brands & Logos Carousel Component
 * 
 * Usage:
 *   $brands = [
 *     ['name' => 'Brand Name', 'logo' => 'path/to/logo.svg', 'url' => 'https://...'],
 *     ...
 *   ];
 *   echo render_brands_carousel($brands, [
 *     'title'    => 'Trusted by the best',
 *     'subtitle' => 'Join hundreds of companies that rely on us',
 *     'speed'    => 30,   // seconds per full cycle (lower = faster)
 *     'theme'    => 'dark' // 'dark' | 'light'
 *   ]);
 */

function render_brands_carousel(array $brands, array $options = []): string
{
  $title    = $options['title']    ?? 'Confiados pelas melhores empresas';
  $subtitle = $options['subtitle'] ?? 'Junte-se a centenas de empresas que confiam em nós';
  $speed    = (int) ($options['speed'] ?? 30);
  $theme    = in_array($options['theme'] ?? 'dark', ['dark', 'light']) ? ($options['theme'] ?? 'dark') : 'dark';

  // Duplicate brands for seamless infinite loop
  $track_brands = array_merge($brands, $brands, $brands);

  ob_start();
?>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clientes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;1,9..40,300&display=swap" rel="stylesheet" />

    <style>
      /* ─── CSS Variables ──────────────────────────────────────────── */
      :root {
        --speed: <?php echo $speed; ?>s;

        <?php if ($theme === 'dark'): ?>--bg: #0a0a0f;
        --surface: #111118;
        --border: rgba(255, 255, 255, 0.07);
        --glow: rgba(99, 102, 241, 0.18);
        --accent: #64d4f6;
        --accent-2: #a78bfa;
        --text-hero: #ffffff;
        --text-sub: rgb(167, 167, 167);
        --logo-filter: brightness(0) invert(1);
        --logo-opacity: 0.55;
        --logo-hover: 1;
        --fade-color: #0a0a0f;
        <?php else: ?>--bg: #f5f4f0;
        --surface: #eeece8;
        --border: rgba(0, 0, 0, 0.08);
        --glow: rgba(99, 102, 241, 0.10);
        --accent: #64d4f6;
        --accent-2: #7c3aed;
        --text-hero: #0f0e17;
        --text-sub: rgba(15, 14, 23, 0.48);
        --logo-filter: none;
        --logo-opacity: 0.45;
        --logo-hover: 1;
        --fade-color: #f5f4f0;
        <?php endif; ?>
      }

      /* ─── Reset ──────────────────────────────────────────────────── */
      *,
      *::before,
      *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }

      /* ─── Wrapper ────────────────────────────────────────────────── */
      .bc-section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: var(--bg);
        padding: 120px 0;
        overflow: hidden;
        font-family: 'DM Sans', sans-serif;
        position: relative;
      }

      .sc-section-full {
        height: 100vh;
      }

      /* subtle radial glow behind header */
      .bc-section::before {
        content: '';
        position: absolute;
        top: -60px;
        left: 50%;
        transform: translateX(-50%);
        width: 700px;
        height: 400px;
        background: radial-gradient(ellipse at center, var(--glow) 0%, transparent 70%);
        pointer-events: none;
      }

      /* ─── Header ─────────────────────────────────────────────────── */
      .bc-header {
        text-align: center;
        margin-bottom: 64px;
        padding: 0 24px;
        position: relative;
        z-index: 2;
      }

      .bc-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: 'Syne', sans-serif;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 20px;
      }

      .bc-eyebrow::before,
      .bc-eyebrow::after {
        content: '';
        display: block;
        width: 28px;
        height: 1px;
        background: var(--accent);
        opacity: 0.6;
      }

      .bc-title {
        font-family: 'Syne';
        font-size: clamp(28px, 5vw, 50px);
        font-weight: 800;
        color: var(--text-hero);
        line-height: 1.1;
        letter-spacing: -0.02em;
        margin-bottom: 16px;
      }

      .bc-title span {
        background: linear-gradient(135deg, var(--accent), var(--accent-2));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }

      .bc-subtitle {
        font-size: 20px;
        font-weight: 300;
        color: var(--text-sub);
        line-height: 1.6;
        max-width: 460px;
        margin: 0 auto;
      }

      /* ─── Carousel Stage ─────────────────────────────────────────── */
      .bc-stage {
        position: relative;
      }

      /* left / right fade masks */
      .bc-stage::before,
      .bc-stage::after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        width: 160px;
        z-index: 3;
        pointer-events: none;
      }

      .bc-stage::before {
        left: 0;
        background: linear-gradient(to right, var(--fade-color), transparent);
      }

      .bc-stage::after {
        right: 0;
        background: linear-gradient(to left, var(--fade-color), transparent);
      }

      /*  Row  */
      .bc-row {
        display: flex;
        overflow: hidden;
        padding: 16px 0;
      }

      .bc-row--reverse .bc-track {
        animation-direction: reverse;
      }

      /* Track  */
      .bc-track {
        display: flex;
        flex-shrink: 0;
        gap: 20px;
        animation: bc-scroll var(--speed) linear infinite;
        will-change: transform;
      }

      /* pause on hover */
      .bc-stage:hover .bc-track {
        animation-play-state: paused;
      }

      @keyframes bc-scroll {
        from {
          transform: translateX(0);
        }

        to {
          transform: translateX(-33.333%);
        }
      }

      /* ─── Card ───────────────────────────────────────────────────── */
      .bc-card {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 200px;
        height: 120px;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 18px 28px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: border-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
      }

      .bc-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
      }

      .bc-card:hover {
        border-color: var(--accent);
        transform: translateY(-3px) scale(1.03);
        box-shadow: 0 12px 40px -8px var(--glow), 0 0 0 1px var(--accent);
      }

      .bc-card:hover::before {
        opacity: 0.06;
      }

      /* ─── Logo inside card ───────────────────────────────────────── */
      .bc-logo-wrap {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        gap: 10px;
      }

      .bc-logo-wrap img {
        max-width: 100%;
        max-height: 50px;
        object-fit: contain;
        filter: var(--logo-filter);
        opacity: var(--logo-opacity);
        transition: opacity 0.3s ease, filter 0.3s ease;
      }

      .bc-card:hover .bc-logo-wrap img {
        opacity: var(--logo-hover);
      }

      /* Text fallback when no image is supplied */
      .bc-logo-text {
        font-family: 'Syne', sans-serif;
        font-weight: 700;
        font-size: 15px;
        letter-spacing: -0.01em;
        color: var(--text-hero);
        opacity: var(--logo-opacity);
        white-space: nowrap;
        transition: opacity 0.3s ease;
      }

      .bc-card:hover .bc-logo-text {
        opacity: var(--logo-hover);
      }

      /* Decorative dot on the card */
      .bc-card-dot {
        position: absolute;
        top: 10px;
        right: 12px;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: var(--accent);
        opacity: 0;
        transition: opacity 0.3s ease;
      }

      .bc-card:hover .bc-card-dot {
        opacity: 1;
      }

      /* ─── Counter bar ────────────────────────────────────────────── */
      .bc-counter {
        text-align: center;
        margin-top: 52px;
        font-family: 'Syne', sans-serif;
        font-size: 13px;
        letter-spacing: 0.06em;
        color: var(--text-sub);
      }

      .bc-counter strong {
        color: var(--text-hero);
      }

      /* ─── Responsive ─────────────────────────────────────────────── */
      @media (max-width: 600px) {
        .bc-section {
          padding: 60px 0 70px;
        }

        .bc-stage::before,
        .bc-stage::after {
          width: 60px;
        }

        .bc-card {
          width: 150px;
          height: 70px;
        }
      }

      /* ─── Accessibility: reduce motion ───────────────────────────── */
      @media (prefers-reduced-motion: reduce) {
        .bc-track {
          animation: none;
        }
      }
    </style>
  </head>

  <section class="bc-section sc-section-full" aria-label="Trusted brands carousel" id="clients">

    <!-- Header -->
    <div class="bc-header">
      <div class="bc-eyebrow">Nossos Clientes</div>
      <h2 class="bc-title">
        <?php echo nl2br(htmlspecialchars($title)); ?>
      </h2>
      <p class="bc-subtitle"><?php echo htmlspecialchars($subtitle); ?></p>
    </div>

    <!-- Carousel -->
    <div class="bc-stage" role="region" aria-label="Logos carousel" aria-roledescription="carousel">

      <!-- Row -->
      <div class="bc-row" aria-hidden="true">
        <div class="bc-track bc-card-size">
          <?php foreach ($track_brands as $brand): ?>
            <?php
            $card_tag  = !empty($brand['url']) ? 'a' : 'div';
            $href_attr = !empty($brand['url'])
              ? ' href="' . htmlspecialchars($brand['url']) . '" target="_blank" rel="noopener noreferrer"'
              : '';
            ?>
            <<?php echo $card_tag . $href_attr; ?> class="bc-card">
              <div class="bc-logo-wrap">
                <?php if (!empty($brand['logo'])): ?>
                  <img
                    src="<?php echo htmlspecialchars($brand['logo']); ?>"
                    alt="<?php echo htmlspecialchars($brand['name'] ?? ''); ?>"
                    loading="lazy"
                    decoding="async" />
                <?php else: ?>
                  <span class="bc-logo-text"><?php echo htmlspecialchars($brand['name'] ?? ''); ?></span>
                <?php endif; ?>
              </div>
              <div class="bc-card-dot" aria-hidden="true"></div>
            </<?php echo $card_tag; ?>>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

<?php
  return ob_get_clean();
}

$demo_brands = [
  ['name' => 'Interlab', 'logo' => 'web/assets/img/clients/interlab.png', 'url' => ''],
  ['name' => 'Renterol', 'logo' => 'web/assets/img/clients/renterol.png', 'url' => ''],
  ['name' => 'Tga', 'logo' => 'web/assets/img/clients/tga.png', 'url' => ''],
  ['name' => 'Confirme', 'logo' => 'web/assets/img/clients/confirme.png', 'url' => ''],
  ['name' => 'Roldão', 'logo' => 'web/assets/img/clients/roldao.png', 'url' => ''],
  ['name' => 'SleepHouse', 'logo' => 'web/assets/img/clients/sleep_house.png', 'url' => ''],
  ['name' => 'Alamar', 'logo' => 'web/assets/img/clients/alamar.png', 'url' => ''],
];

echo render_brands_carousel($demo_brands, [
  'title'    => "Confiança das melhores empresas",
  'subtitle' => 'Junte-se a empresas inovadoras que confiam em nós todos os dias.',
  'speed'    => 28,
  'theme'    => 'light',   // 'dark' | 'light'
]);
