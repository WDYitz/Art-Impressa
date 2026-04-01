<?php

/**
 * Art Impressa — Entry Point
 *
 * PHP 8.3+
 * Stack: Tailwind CSS  · Flowbite · Alpine.js 
 */

declare(strict_types=1);

require_once __DIR__ . '/web/config/config.php';

?><!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<?php require __DIR__ . '/web/components/head.php'; ?>

<body class="bg-white font-sans" style="font-family:'DM Sans',sans-serif;">

  <!-- screen-reader users -->
  <a href="#main-content"
     class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[9999]
            focus:px-4 focus:py-2 focus:bg-[#C9973B] focus:text-[#0D0D0D]
            focus:rounded-lg focus:font-semibold">
    Pular para o conteúdo principal
  </a>

  <?php require __DIR__ . '/web/components/navbar.php'; ?>

  <main id="main-content">
    <?php require __DIR__ . '/web/components/hero.php'; ?>
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
