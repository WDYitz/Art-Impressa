<?php // components/products.php — Products grid section ?>

<!-- ===== PRODUCTS ===== -->
<section
  id="products"
  class="bg-[#0D0D0D] py-28 scroll-mt-20"
  aria-label="Produtos e serviços de impressão da <?= esc(SITE_NAME) ?>">

  <div class="max-w-7xl mx-auto px-6 md:px-12">

    <!-- ── Section header ────────────────────────────────────────────── -->
    <header class="text-center mb-16 reveal">
      <div class="flex items-center justify-center gap-3 mb-5">
        <span class="w-8 h-px bg-[#C9973B]" aria-hidden="true"></span>
        <span class="text-[#C9973B] uppercase tracking-widest text-[0.75rem] font-medium">Nossos Produtos</span>
        <span class="w-8 h-px bg-[#C9973B]" aria-hidden="true"></span>
      </div>
      <h2 class="text-white mb-5"
          style="font-family:'Playfair Display',serif;font-size:clamp(2rem,4vw,3rem);font-weight:800;line-height:1.2;">
        O Que Nós Produzimos
      </h2>
      <p class="text-white/60 max-w-xl mx-auto font-light" style="font-size:1rem;line-height:1.8;">
        De materiais corporativos a projetos artísticos especiais, oferecemos soluções completas de impressão
        para todas as necessidades da sua empresa.
      </p>
    </header>

    <!-- ── Cards grid ────────────────────────────────────────────────── -->
    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 list-none p-0 m-0"
        aria-label="Lista de produtos e serviços">

      <?php foreach ($products as $i => $product): ?>
        <li class="reveal <?= stagger($i) ?>">
          <article
            class="card-hover group relative bg-white/5 hover:bg-white/10 rounded-2xl border border-white/10
                   hover:border-[#C9973B]/50 transition-all duration-500 overflow-hidden h-full"
            aria-label="<?= esc($product->name) ?>">

            <div class="p-7 flex flex-col gap-4 h-full">

              <!-- Category + badge + arrow row -->
              <div class="flex items-center justify-between">
                <span class="text-[#C9973B] uppercase tracking-widest text-[0.7rem] font-medium">
                  <?= esc($product->category) ?>
                </span>

                <div class="flex items-center gap-2">
                  <?php if ($product->badge !== null): ?>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold <?= esc($product->badge->cssClass()) ?>">
                      <?= esc($product->badge->value) ?>
                    </span>
                  <?php endif; ?>

                  <div class="w-8 h-8 bg-[#C9973B]/10 group-hover:bg-[#C9973B] rounded-full flex items-center justify-center
                              opacity-0 group-hover:opacity-100 transition-all duration-300" aria-hidden="true">
                    <?= svg_icon(
                        inner:  '<path d="M7 7h10v10"/><path d="M7 17 17 7"/>',
                        size:   14,
                        stroke: COLOR_INK,
                    ) ?>
                  </div>
                </div>
              </div>

              <!-- Title -->
              <h3 class="text-white"
                  style="font-family:'Playfair Display',serif;font-size:1.25rem;font-weight:700;line-height:1.3;">
                <?= esc($product->name) ?>
              </h3>

              <!-- Description -->
              <p class="text-white/50 group-hover:text-white/70 transition-colors duration-300 font-light mt-auto"
                 style="font-size:0.88rem;line-height:1.75;">
                <?= esc($product->description) ?>
              </p>
            </div>

            <div class="card-accent-line" aria-hidden="true"></div>
          </article>
        </li>
      <?php endforeach; ?>

    </ul><!-- /grid -->

    <!-- ── CTA ───────────────────────────────────────────────────────── -->
    <div class="text-center mt-14 reveal">
      <a href="#contact"
         class="inline-block px-10 py-4 border border-[#C9973B] text-[#C9973B] hover:bg-[#C9973B] hover:text-[#0D0D0D]
                rounded-full transition-all duration-300 font-medium text-[0.95rem]">
        Ver Todos os Serviços
      </a>
    </div>

  </div>
</section>
<!-- ===== /PRODUCTS ===== -->
