<?php

/**
 * Art Impressa — Entry Point
 *
 * PHP 8.3+
 * Stack: Tailwind CSS (CDN Play) · Flowbite 2.3.0 · Alpine.js 3.x
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';

?><!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<?php require __DIR__ . '/components/head.php'; ?>

<body class="bg-white font-sans" style="font-family:'DM Sans',sans-serif;">

  <!-- Skip-to-content for keyboard / screen-reader users -->
  <a href="#main-content"
     class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[9999]
            focus:px-4 focus:py-2 focus:bg-[#C9973B] focus:text-[#0D0D0D]
            focus:rounded-lg focus:font-semibold">
    Pular para o conteúdo principal
  </a>

  <?php require __DIR__ . '/components/navbar.php'; ?>

  <main id="main-content">
    <?php require __DIR__ . '/components/hero.php'; ?>
    <?php require __DIR__ . '/components/about.php'; ?>
    <?php require __DIR__ . '/components/products.php'; ?>
    <?php require __DIR__ . '/components/why-choose.php'; ?>
    <?php require __DIR__ . '/components/quote.php'; ?>
    <?php require __DIR__ . '/components/contact.php'; ?>
  </main>

  <?php require __DIR__ . '/components/footer.php'; ?>
  <?php require __DIR__ . '/components/scripts.php'; ?>

</body>
</html>
