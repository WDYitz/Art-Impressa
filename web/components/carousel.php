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
 *     'theme'    => 'dark' // 'dark' | 'light'
 *   ]);
 */

function render_brands_carousel(array $brands, array $options = []): string
{
  $title    = $options['title']    ?? 'Confiados pelas melhores empresas';
  $subtitle = $options['subtitle'] ?? 'Junte-se a centenas de empresas que confiam em nós';
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
