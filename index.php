<?php

/**
 * Art Impressa — Main landing page
 *
 * Tailwind CSS CDN  · Flowbite CDN · Alpine.js CDN
 */

declare(strict_types=1);
require_once __DIR__ . '/web/config/config.php';
?>
<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<?php require __DIR__ . '/web/components/head.php'; ?>

<body class="bg-white font-sans" style="font-family:'DM Sans',sans-serif;">
  <?php require __DIR__ . '/web/components/navbar.php'; ?>
  <main id="main-content">
    <?php require __DIR__ . '/web/components/hero.php'; ?>
    <?php require __DIR__ . '/web/components/carousel.php'; ?>
    <?php require __DIR__ . '/web/components/about.php'; ?>
    <?php require __DIR__ . '/web/components/products.php'; ?>
    <?php require __DIR__ . '/web/components/why-choose.php'; ?>
    <?php require __DIR__ . '/web/components/quote.php'; ?>
    <?php require __DIR__ . '/web/components/contact.php'; ?>
  </main>
  <?php require __DIR__ . '/web/components/footer.php'; ?>
  <?php require __DIR__ . '/web/components/scripts.php'; ?>
</body>

</html>