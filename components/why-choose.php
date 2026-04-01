<?php // components/why-choose.php — Differentials section + trust metrics bar ?>

<!-- ===== WHY CHOOSE ===== -->
<section
  id="why"
  class="bg-white py-28 scroll-mt-20"
  aria-label="Por que escolher a <?= esc(SITE_NAME) ?>">

  <div class="max-w-7xl mx-auto px-6 md:px-12">

    <!-- ── Section header ────────────────────────────────────────────── -->
    <header class="text-center mb-16 reveal">
      <div class="flex items-center justify-center gap-3 mb-5">
        <span class="w-8 h-px bg-[#C9973B]" aria-hidden="true"></span>
        <span class="text-[#C9973B] uppercase tracking-widest text-[0.75rem] font-medium">Diferenciais</span>
        <span class="w-8 h-px bg-[#C9973B]" aria-hidden="true"></span>
      </div>
      <h2 class="text-[#0D0D0D] mb-5"
          style="font-family:'Playfair Display',serif;font-size:clamp(2rem,4vw,3rem);font-weight:800;line-height:1.2;">
        Por Que Escolher <em class="not-italic italic text-[#C9973B]">Nossa Gráfica?</em>
      </h2>
      <p class="text-[#717182] max-w-xl mx-auto font-light" style="font-size:1rem;line-height:1.8;">
        Mais de 15 anos de experiência, equipamentos de última geração e uma equipe apaixonada por resultado.
        Conheça o que nos diferencia no mercado gráfico.
      </p>
    </header>

    <!-- ── Reasons grid ───────────────────────────────────────────────── -->
    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 list-none p-0 m-0"
        aria-label="Razões para escolher a <?= esc(SITE_NAME) ?>">

      <?php foreach ($reasons as $i => $reason): ?>
        <li class="reveal <?= stagger($i) ?>">
          <article
            class="card-hover group relative bg-[#F7F4EF] hover:bg-[#0D0D0D] rounded-2xl p-7 border border-[#E8E0D5]
                   hover:border-[#C9973B]/30 transition-all duration-500 overflow-hidden h-full"
            aria-label="<?= esc($reason->title) ?>">

            <!-- Background circle (decorative, visible on hover) -->
            <div class="absolute top-0 right-0 w-32 h-32 opacity-0 group-hover:opacity-5 transition-opacity duration-500 pointer-events-none" aria-hidden="true">
              <div class="w-full h-full border-4 border-white rounded-full translate-x-12 -translate-y-12"></div>
            </div>

            <!-- Icon -->
            <div class="w-14 h-14 bg-[#C9973B]/10 group-hover:bg-[#C9973B] rounded-xl flex items-center justify-center mb-5 transition-colors duration-500 flex-shrink-0" aria-hidden="true">
              <?= svg_icon(inner: $reason->svgInner, size: 24, stroke: COLOR_GOLD,
                  extraAttrs: 'aria-hidden="true" class="group-hover:[stroke:#0D0D0D] transition-colors duration-500"') ?>
            </div>

            <!-- Highlight badge -->
            <span class="inline-block px-3 py-1 bg-[#C9973B]/10 group-hover:bg-[#C9973B]/20 text-[#C9973B] rounded-full mb-3 transition-colors text-[0.7rem] font-semibold tracking-wider">
              <?= esc($reason->highlight) ?>
            </span>

            <!-- Title -->
            <h3 class="text-[#0D0D0D] group-hover:text-white mb-3 transition-colors duration-500"
                style="font-family:'Playfair Display',serif;font-size:1.15rem;font-weight:700;line-height:1.3;">
              <?= esc($reason->title) ?>
            </h3>

            <!-- Description -->
            <p class="text-[#717182] group-hover:text-white/60 transition-colors duration-500 font-light"
               style="font-size:0.88rem;line-height:1.75;">
              <?= esc($reason->description) ?>
            </p>

            <div class="card-accent-line" aria-hidden="true"></div>
          </article>
        </li>
      <?php endforeach; ?>

    </ul><!-- /grid -->

    <!-- ── Trust metrics bar ─────────────────────────────────────────── -->
    <div
      class="mt-20 bg-[#0D0D0D] rounded-2xl p-10 grid grid-cols-2 md:grid-cols-4 gap-8 text-center reveal"
      role="list" aria-label="Métricas de qualidade">

      <?php foreach ($trustStats as $stat): ?>
        <div role="listitem">
          <p style="font-family:'Playfair Display',serif;font-size:2.2rem;font-weight:800;color:#C9973B;line-height:1;">
            <?= esc($stat->value) ?>
          </p>
          <p class="mt-2 text-white/60 text-[0.82rem] font-light tracking-wide">
            <?= esc($stat->label) ?>
          </p>
        </div>
      <?php endforeach; ?>

    </div>

  </div>
</section>
<!-- ===== /WHY CHOOSE ===== -->
