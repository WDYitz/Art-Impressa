<?php // components/hero.php — full-screen Alpine.js carousel
$slideCount = count($heroSlides);
?>

<!-- ===== HERO ===== -->
<section
  id="hero"
  aria-label="Carrossel de destaque – <?= esc(SITE_NAME) ?>"
  x-data="{
    cur: 0,
    tot: <?= $slideCount ?>,
    tmr: null,
    init() { this.tmr = setInterval(() => this.next(), 8000); },
    next() { this.cur = (this.cur + 1) % this.tot; },
    prev() { this.cur = (this.cur - 1 + this.tot) % this.tot; },
    go(i)  { this.cur = i; clearInterval(this.tmr); this.tmr = setInterval(() => this.next(), 8000); }
  }"
  class="relative h-screen w-full overflow-hidden">

  <!-- Gold left accent line -->
  <div class="absolute left-0 top-0 w-1 h-full bg-gradient-to-b from-transparent via-[#C9973B] to-transparent opacity-60 z-10" aria-hidden="true"></div>

  <!-- ── Slides ────────────────────────────────────────────────────────── -->
  <?php foreach ($heroSlides as $slide): ?>
    <div class="slide" :class="cur === <?= $slide->index ?> ? 'opacity-100 z-[2]' : 'opacity-0 z-[1]'" aria-hidden="true">
      <img
        src="<?= esc($slide->image) ?>"
        alt="<?= esc($slide->alt) ?>"
        class="w-full h-full object-cover"
        <?= $slide->index === 0 ? 'fetchpriority="high"' : 'loading="lazy"' ?> />
      <div class="absolute inset-0 bg-gradient-to-r from-[#0D0D0D]/80 via-[#0D0D0D]/50 to-transparent"></div>
      <div class="absolute inset-0 bg-gradient-to-t from-[#0D0D0D]/60 via-transparent to-transparent"></div>
    </div>
  <?php endforeach; ?>

  <!-- ── Slide content overlays ─────────────────────────────────────────── -->
  <div class="relative z-10 h-full flex flex-col justify-center px-8 md:px-16 lg:px-24 max-w-7xl">
    <?php foreach ($heroSlides as $slide): ?>
      <div
        x-show="cur === <?= $slide->index ?>" x-cloak
        x-transition:enter="transition duration-700 delay-300"
        x-transition:enter-start="opacity-0 translate-y-10"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="max-w-2xl">

        <!-- Tag -->
        <div class="inline-flex items-center gap-2 mb-6">
          <span class="w-8 h-px bg-[#C9973B]" aria-hidden="true"></span>
          <span class="text-[#C9973B] uppercase tracking-widest text-[0.75rem] font-medium">
            <?= esc($slide->tag) ?>
          </span>
        </div>

        <!-- Heading -->
        <h1
          class="text-white mb-6"
          style="font-family:'Playfair Display',serif;font-size:clamp(2.8rem,6vw,5rem);font-weight:800;line-height:1.1;">
          <?= nl2br(esc($slide->title)) ?>
        </h1>

        <!-- Subtitle -->
        <p class="text-white/70 mb-10 max-w-md text-[1.1rem] font-light" style="line-height:1.7;">
          <?= esc($slide->subtitle) ?>
        </p>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- ── Dot indicators ─────────────────────────────────────────────────── -->
  <div
    class="absolute bottom-24 md:bottom-28 left-1/2 -translate-x-1/2 z-10 flex items-center gap-3"
    role="tablist" aria-label="Slides do carrossel">
    <?php for ($i = 0; $i < $slideCount; $i++): ?>
      <button
        @click="go(<?= $i ?>)"
        role="tab"
        :aria-selected="cur === <?= $i ?>"
        :class="cur === <?= $i ?> ? 'w-10 h-2 bg-[#C9973B]' : 'w-2 h-2 bg-white/40 hover:bg-white/70'"
        class="rounded-full transition-all duration-500">
      </button>
    <?php endfor; ?>
  </div>

  <!-- ── Arrow controls ─────────────────────────────────────────────────── -->
  <button
    @click="prev()"
    aria-label="Slide anterior"
    class="absolute left-4 md:left-6 top-1/2 -translate-y-1/2 z-10 w-12 h-12 rounded-full border border-white/20 bg-black/20 backdrop-blur-sm flex items-center justify-center text-white hover:border-[#C9973B] hover:text-[#C9973B] transition-all duration-200">
    <?= svg_icon('<path d="m15 18-6-6 6-6"/>', 20) ?>
  </button>
  <button
    @click="next()"
    aria-label="Próximo slide"
    class="absolute right-4 md:right-6 top-1/2 -translate-y-1/2 z-10 w-12 h-12 rounded-full border border-white/20 bg-black/20 backdrop-blur-sm flex items-center justify-center text-white hover:border-[#C9973B] hover:text-[#C9973B] transition-all duration-200">
    <?= svg_icon('<path d="m9 18 6-6-6-6"/>', 20) ?>
  </button>

  <!-- ── Scroll-down prompt ─────────────────────────────────────────────── -->
  <a href="#about"
     aria-label="Rolar para Sobre Nós"
     class="bounce-d absolute bottom-24 right-6 md:right-10 z-10 flex flex-col items-center gap-1 text-white/50 hover:text-[#C9973B] transition-colors">
    <span class="text-[0.7rem] tracking-[0.1em] font-light">SCROLL</span>
    <?= svg_icon('<path d="M12 5v14"/><path d="m19 12-7 7-7-7"/>', 16) ?>
  </a>

  <!-- ── Stats bar (desktop only) ───────────────────────────────────────── -->
  <div class="absolute bottom-0 left-0 right-0 z-10 hidden md:flex" aria-label="Estatísticas da <?= esc(SITE_NAME) ?>">
    <div class="bg-[#C9973B] px-10 py-5 flex gap-12">
      <?php
        $heroStats = [
            ['value' => '15+',    'label' => 'Anos de Experiência'],
            ['value' => '2.500+', 'label' => 'Clientes Satisfeitos'],
            ['value' => '50k+',   'label' => 'Projetos Entregues'],
        ];
        foreach ($heroStats as $s):
      ?>
        <div class="text-[#0D0D0D]">
          <p style="font-family:'Playfair Display',serif;font-size:1.6rem;font-weight:800;line-height:1;">
            <?= esc($s['value']) ?>
          </p>
          <p class="text-[0.75rem] font-normal opacity-70 tracking-wide mt-0.5">
            <?= esc($s['label']) ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

</section>
<!-- ===== /HERO ===== -->
