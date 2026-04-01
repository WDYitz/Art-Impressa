<?php // components/footer.php — site footer with brand, nav columns, socials ?>

<!-- ===== FOOTER ===== -->
<footer class="bg-[#0A0A0A] text-white pt-20 pb-8" aria-label="Rodapé da <?= esc(SITE_NAME) ?>">
  <div class="max-w-7xl mx-auto px-6 md:px-12">

    <!-- ── Top grid ──────────────────────────────────────────────────── -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 mb-16">

      <!-- Brand column -->
      <div class="lg:col-span-2">
        <div class="flex items-center gap-3 mb-5">
          <div class="w-10 h-10 bg-[#C9973B] rounded-lg flex items-center justify-center" aria-hidden="true">
            <?= svg_icon(
                inner:  '<polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/>',
                size:   20,
                stroke: COLOR_INK,
            ) ?>
          </div>
          <div>
            <span class="block text-white font-serif text-[1.2rem] leading-tight"><?= esc(SITE_NAME) ?></span>
            <span class="block text-[#C9973B] text-[0.65rem] tracking-[0.15em] uppercase"><?= esc(SITE_SUBTITLE) ?></span>
          </div>
        </div>

        <p class="text-white/50 mb-6 max-w-xs font-light text-[0.88rem]" style="line-height:1.8;">
          Desde <?= FOUNDING_YEAR ?>, transformando ideias em impressões que inspiram, conectam e comunicam com excelência.
        </p>

        <!-- Social links -->
        <nav aria-label="Redes sociais da <?= esc(SITE_NAME) ?>">
          <ul class="flex gap-3 list-none p-0 m-0">
            <?php foreach ($socialLinks as $s): ?>
              <li>
                <a href="<?= esc($s->href) ?>"
                   target="_blank" rel="noopener noreferrer"
                   aria-label="<?= esc($s->label) ?>"
                   class="w-9 h-9 rounded-lg border border-white/10 flex items-center justify-center text-white/50
                          hover:border-[#C9973B]/50 hover:text-[#C9973B] transition-colors">
                  <?= svg_icon(inner: $s->svgInner, size: 16) ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </nav>
      </div><!-- /brand -->

      <!-- Link columns -->
      <?php foreach ($footerGroups as $group): ?>
        <nav aria-label="Links de <?= esc($group->title) ?>">
          <h3 class="text-white mb-4 font-semibold text-[0.9rem]"><?= esc($group->title) ?></h3>
          <ul class="flex flex-col gap-2.5 list-none p-0 m-0">
            <?php foreach ($group->links as $label => $href): ?>
              <li>
                <a href="<?= esc($href) ?>"
                   class="text-white/40 hover:text-[#C9973B] transition-colors font-light text-[0.85rem]">
                  <?= esc($label) ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </nav>
      <?php endforeach; ?>

    </div><!-- /top grid -->

    <!-- Divider -->
    <div class="h-px bg-white/5 mb-8" aria-hidden="true"></div>

    <!-- ── Bottom bar ─────────────────────────────────────────────────── -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-4">
      <small class="text-white/30 font-light text-[0.8rem]">
        &copy; <?= date('Y') ?> <?= esc(SITE_NAME) ?>. Todos os direitos reservados.
      </small>
      <p class="text-white/20 flex items-center gap-1 font-light text-[0.75rem]">
        Feito com <span class="text-[#C9973B]" aria-hidden="true">&#9829;</span>
        <span class="sr-only">amor</span> em São Paulo, Brasil
      </p>
    </div>

  </div>
</footer>
<!-- ===== /FOOTER ===== -->
