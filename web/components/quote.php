<?php
// components/quote.php — Gutenberg animated quote section
// Words are split here in PHP; IntersectionObserver in scripts.php drives the animation.

$quoteText  = 'A impressão é a mãe de todas as ciências e a base da educação.';
$quoteWords = explode(' ', $quoteText);
// Indices 2 and 3 ("é" "a") rendered in gold italic to match original
$goldIndices = [2, 3];
?>

<!-- QUOTE-->
<section
  id="quote"
  class="relative bg-[#0D0D0D] py-32 overflow-hidden scroll-mt-20 flex items-center min-h-[70vh]"
  aria-label="Citação de Johannes Gutenberg">

  <!-- Grid texture overlay -->
  <div class="absolute inset-0 quote-grid pointer-events-none" aria-hidden="true"></div>

  <!-- ── Gear decorations ──────────────────────────────────────────────── -->
  <?php
  $gearSvgInner = '<path d="M12 21a8.985 8.985 0 0 1-1.755-.173 1 1 0 0 1-.791-.813l-.273-1.606a6.933 6.933 0 0 1-1.32-.762l-1.527.566a1 1 0 0 1-1.1-.278 8.977 8.977 0 0 1-1.756-3.041 1 1 0 0 1 .31-1.092l1.254-1.04a6.979 6.979 0 0 1 0-1.524L3.787 10.2a1 1 0 0 1-.31-1.092 8.977 8.977 0 0 1 1.756-3.042 1 1 0 0 1 1.1-.278l1.527.566a6.933 6.933 0 0 1 1.32-.762l.274-1.606a1 1 0 0 1 .791-.813 8.957 8.957 0 0 1 3.51 0 1 1 0 0 1 .791.813l.273 1.606a6.933 6.933 0 0 1 1.32.762l1.527-.566a1 1 0 0 1 1.1.278 8.977 8.977 0 0 1 1.756 3.041 1 1 0 0 1-.31 1.092l-1.254 1.04a6.979 6.979 0 0 1 0 1.524l1.254 1.04a1 1 0 0 1 .31 1.092 8.977 8.977 0 0 1-1.756 3.041 1 1 0 0 1-1.1.278l-1.527-.566a6.933 6.933 0 0 1-1.32.762l-.273 1.606a1 1 0 0 1-.791.813A8.985 8.985 0 0 1 12 21zm-.7-2.035a6.913 6.913 0 0 0 1.393 0l.247-1.451a1 1 0 0 1 .664-.779 4.974 4.974 0 0 0 1.696-.975 1 1 0 0 1 1.008-.186l1.381.512a7.012 7.012 0 0 0 .7-1.206l-1.133-.939a1 1 0 0 1-.343-.964 5.018 5.018 0 0 0 0-1.953 1 1 0 0 1 .343-.964l1.124-.94a7.012 7.012 0 0 0-.7-1.206l-1.38.512a1 1 0 0 1-1-.186 4.974 4.974 0 0 0-1.688-.976 1 1 0 0 1-.664-.779l-.248-1.45a6.913 6.913 0 0 0-1.393 0l-.25 1.45a1 1 0 0 1-.664.779A4.974 4.974 0 0 0 8.7 8.24a1 1 0 0 1-1 .186l-1.385-.512a7.012 7.012 0 0 0-.7 1.206l1.133.939a1 1 0 0 1 .343.964 5.018 5.018 0 0 0 0 1.953 1 1 0 0 1-.343.964l-1.128.94a7.012 7.012 0 0 0 .7 1.206l1.38-.512a1 1 0 0 1 1 .186 4.974 4.974 0 0 0 1.688.976 1 1 0 0 1 .664.779zm.7-3.725a3.24 3.24 0 0 1 0-6.48 3.24 3.24 0 0 1 0 6.48zm0-4.48A1.24 1.24 0 1 0 13.24 12 1.244 1.244 0 0 0 12 10.76z"/>';

  $gears = [
    ['class' => 'absolute -left-16 top-1/2  w-56 h-56 text-[#C9973B]/30 gear-ccw2'],
    ['class' => 'absolute -right-16 top-1/2  w-40 h-40 text-[#C9973B]/30 gear-cw2'],
    ['class' => 'absolute top-8 left-1/3 w-20 h-20 text-[#C9973B]/20 gear-cw2'],
    ['class' => 'absolute bottom-8 right-1/3 w-16 h-16 text-[#C9973B]/20 gear-ccw2'],
  ];
  ?>
  <?php foreach ($gears as $gear): ?>
    <div class="<?= esc($gear['class']) ?> pointer-events-none" aria-hidden="true">
      <?= svg_icon(
        inner: $gearSvgInner,
        size: 100,
        stroke: 'currentColor',
        strokeWidth: 0.8,
        extraAttrs: 'aria-hidden="true" style="width:100%;height:100%;"'
      ) ?>
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