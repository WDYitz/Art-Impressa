<?php
// components/quote.php — Gutenberg animated quote section
// Words are split here in PHP; IntersectionObserver in scripts.php drives the animation.

$quoteText  = 'A impressão é a mãe de todas as ciências e a base da educação.';
$quoteWords = explode(' ', $quoteText);
// Indices 2 and 3 ("é" "a") rendered in gold italic to match original
$goldIndices = [2, 3];
?>

<!-- ===== QUOTE ===== -->
<section
  id="quote"
  class="relative bg-[#0D0D0D] py-32 overflow-hidden scroll-mt-20 flex items-center min-h-[70vh]"
  aria-label="Citação de Johannes Gutenberg">

  <!-- Grid texture overlay -->
  <div class="absolute inset-0 quote-grid pointer-events-none" aria-hidden="true"></div>

  <!-- ── Gear decorations ──────────────────────────────────────────────── -->
  <?php
    $gearSvgInner = '<path d="M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z"/><path d="M12 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>'
                  . '<path d="M12 2v2"/><path d="M12 22v-2"/>'
                  . '<path d="m17 20.66-1-1.73"/><path d="M11 10.27 7 3.34"/>'
                  . '<path d="m20.66 17-1.73-1"/><path d="m3.34 7 1.73 1"/>'
                  . '<path d="M14 12h8"/><path d="M2 12h2"/>'
                  . '<path d="m20.66 7-1.73 1"/><path d="m3.34 17 1.73-1"/>'
                  . '<path d="m17 3.34-1 1.73"/><path d="m11 13.73-4 6.93"/>';

    $gears = [
        ['class' => 'absolute -left-16 top-1/2 -translate-y-1/2 w-56 h-56 text-[#C9973B]/30 gear-cw'],
        ['class' => 'absolute -right-16 top-1/2 -translate-y-1/2 w-40 h-40 text-[#C9973B]/30 gear-ccw'],
        ['class' => 'absolute top-8 left-1/3 w-20 h-20 text-[#C9973B]/20 gear-cw2'],
        ['class' => 'absolute bottom-8 right-1/3 w-16 h-16 text-[#C9973B]/20 gear-ccw2'],
    ];
  ?>
  <?php foreach ($gears as $gear): ?>
    <div class="<?= esc($gear['class']) ?> pointer-events-none" aria-hidden="true">
      <?= svg_icon(inner: $gearSvgInner, size: 100, stroke: 'currentColor', strokeWidth: 0.8,
          extraAttrs: 'aria-hidden="true" style="width:100%;height:100%;"') ?>
    </div>
  <?php endforeach; ?>

  <!-- ── Ink drops ─────────────────────────────────────────────────────── -->
  <?php
    $inkDrops = [
        ['l' => '8%',  't' => '18%', 'w' => 5,  'h' => 5,  'dur' => '4.2s', 'del' => '0s'],
        ['l' => '22%', 't' => '65%', 'w' => 7,  'h' => 7,  'dur' => '3.8s', 'del' => '.8s'],
        ['l' => '38%', 't' => '30%', 'w' => 4,  'h' => 4,  'dur' => '5.1s', 'del' => '1.4s'],
        ['l' => '55%', 't' => '75%', 'w' => 6,  'h' => 6,  'dur' => '4.6s', 'del' => '.3s'],
        ['l' => '70%', 't' => '20%', 'w' => 5,  'h' => 5,  'dur' => '3.5s', 'del' => '1.1s'],
        ['l' => '82%', 't' => '50%', 'w' => 8,  'h' => 8,  'dur' => '4.9s', 'del' => '.6s'],
        ['l' => '92%', 't' => '35%', 'w' => 4,  'h' => 4,  'dur' => '5.5s', 'del' => '1.9s'],
        ['l' => '15%', 't' => '85%', 'w' => 6,  'h' => 6,  'dur' => '4.1s', 'del' => '.4s'],
    ];
  ?>
  <div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
    <?php foreach ($inkDrops as $d): ?>
      <span class="ink absolute rounded-full bg-[#C9973B]"
            style="width:<?= (int)$d['w'] ?>px;height:<?= (int)$d['h'] ?>px;left:<?= esc($d['l']) ?>;top:<?= esc($d['t']) ?>;--dur:<?= esc($d['dur']) ?>;--del:<?= esc($d['del']) ?>;"></span>
    <?php endforeach; ?>
  </div>

  <!-- ── Content ───────────────────────────────────────────────────────── -->
  <div class="relative z-10 max-w-5xl mx-auto px-6 md:px-8 text-center w-full">

    <!-- Opening quote mark -->
    <div class="mb-8 reveal" aria-hidden="true">
      <span class="text-[#C9973B] select-none"
            style="font-family:'Playfair Display',serif;font-size:8rem;font-weight:900;line-height:0.5;opacity:.4;">&ldquo;</span>
    </div>

    <!-- Animated quote words — IntersectionObserver adds .on in scripts.php -->
    <div
      id="quote-words"
      class="flex flex-wrap justify-center gap-x-3 gap-y-1 mb-10"
      style="perspective:600px;"
      aria-label="Citação: <?= esc($quoteText) ?>">

      <?php foreach ($quoteWords as $idx => $word): ?>
        <?php
          $isGold = in_array($idx, $goldIndices, true);
          $color  = $isGold ? 'color:#C9973B;font-style:italic;' : '';
        ?>
        <span class="qword"
              style="font-family:'Playfair Display',serif;font-size:clamp(1.6rem,3.5vw,3rem);font-weight:700;line-height:1.3;display:inline-block;color:<?= $isGold ? '#C9973B' : 'white' ?>;<?= $isGold ? 'font-style:italic;' : '' ?>">
          <?= esc($word) ?>
        </span>
      <?php endforeach; ?>
    </div>

    <!-- Closing quote mark -->
    <div class="mb-10" aria-hidden="true">
      <span class="text-[#C9973B] select-none"
            style="font-family:'Playfair Display',serif;font-size:8rem;font-weight:900;line-height:0.3;opacity:.4;">&rdquo;</span>
    </div>

    <!-- Animated divider line (scaleX driven by JS) -->
    <div class="flex justify-center mb-8">
      <div id="quote-line"
           style="height:1px;background:linear-gradient(to right,transparent,#C9973B,transparent);width:256px;transform:scaleX(0);transform-origin:center;transition:transform 1s ease;"
           role="presentation" aria-hidden="true"></div>
    </div>

    <!-- Author (fades in after line) -->
    <div id="quote-author"
         style="opacity:0;transform:translateY(20px);transition:opacity .7s ease,transform .7s ease;">
      <p class="text-white text-[1.25rem] font-semibold mb-1" style="font-family:'Playfair Display',serif;">
        Johannes Gutenberg
      </p>
      <p class="text-[#C9973B] text-[0.85rem] font-light tracking-wider">
        Inventor, Impressor e Editor
      </p>
    </div>

    <!-- Press rollers -->
    <div class="mt-16 flex justify-center gap-3" aria-hidden="true">
      <?php for ($r = 0; $r < 7; $r++): ?>
        <span class="roller w-2.5 h-2.5 rounded-full bg-[#C9973B] block"
              style="animation-delay:<?= number_format($r * 0.15, 2) ?>s;"></span>
      <?php endfor; ?>
    </div>

  </div>
</section>
<!-- ===== /QUOTE ===== -->
