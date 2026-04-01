<?php // components/navbar.php — sticky responsive navbar with Alpine.js ?>

<!-- ===== NAVBAR ===== -->
<header
  role="banner"
  x-data="{
    mob:   false,
    drop:  false,
    solid: false,
    init() {
      window.addEventListener('scroll', () => { this.solid = window.scrollY > 40; });
    }
  }"
  :class="solid ? 'nav-solid' : 'bg-[#0D0D0D]/60 backdrop-blur-sm'"
  class="fixed top-0 left-0 right-0 z-50 transition-all duration-500">

  <nav
    class="max-w-7xl mx-auto px-6 md:px-12 flex items-center justify-between h-16 md:h-[72px]"
    aria-label="Navegação principal">

    <!-- ── Logo ──────────────────────────────────────────────────────── -->
    <a href="#hero" class="flex items-center gap-3 group" aria-label="<?= esc(SITE_NAME) ?> – página inicial">
      <div class="w-10 h-10 bg-[#C9973B] group-hover:bg-[#E8C57D] rounded-lg flex items-center justify-center flex-shrink-0 transition-colors duration-300" aria-hidden="true">
        <?= svg_icon(
            inner:  '<polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/>',
            size:   20,
            stroke: COLOR_INK,
        ) ?>
      </div>
      <div>
        <span class="block text-white font-serif text-[1.2rem] leading-tight"><?= esc(SITE_NAME) ?></span>
        <span class="block text-[#C9973B] text-[0.62rem] tracking-[0.15em] uppercase"><?= esc(SITE_TAGLINE) ?></span>
      </div>
    </a>

    <!-- ── Desktop nav links ─────────────────────────────────────────── -->
    <ul class="hidden md:flex items-center gap-7 list-none" role="list">
      <?php foreach ($navLinks as $link): ?>
        <li>
          <a href="<?= esc($link->href) ?>"
             class="nav-ul text-white/75 hover:text-[#C9973B] transition-colors text-sm font-light tracking-wide">
            <?= esc($link->label) ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <!-- ── CTA dropdown + hamburger ──────────────────────────────────── -->
    <div class="flex items-center gap-3">

      <!-- Desktop: "Solicitar Orçamento" dropdown -->
      <div class="relative hidden md:block" @click.away="drop = false">
        <button
          @click="drop = !drop"
          :aria-expanded="drop.toString()"
          aria-haspopup="true"
          class="flex items-center gap-2 px-5 py-2.5 bg-[#C9973B] hover:bg-[#E8C57D] text-[#0D0D0D] rounded-full text-sm font-semibold transition-colors duration-200">
          Solicitar Orçamento
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
               :class="drop ? 'rotate-180' : ''" class="transition-transform duration-200" aria-hidden="true">
            <path d="m6 9 6 6 6-6"/>
          </svg>
        </button>

        <!-- Dropdown card -->
        <div
          x-show="drop" x-cloak
          x-transition:enter="transition ease-out duration-200"
          x-transition:enter-start="opacity-0 translate-y-2 scale-95"
          x-transition:enter-end="opacity-100 translate-y-0 scale-100"
          x-transition:leave="transition ease-in duration-150"
          x-transition:leave-start="opacity-100 translate-y-0 scale-100"
          x-transition:leave-end="opacity-0 translate-y-2 scale-95"
          class="absolute right-0 top-full mt-3 w-72 bg-[#0D0D0D] border border-white/10 rounded-2xl shadow-2xl overflow-hidden z-50"
          role="dialog" aria-label="Opções de contato para orçamento">

          <div class="px-5 pt-4 pb-3 border-b border-white/10">
            <p class="text-white/40 uppercase tracking-widest text-[0.65rem] font-medium">Entre em contato</p>
          </div>

          <div class="p-2">
            <?php foreach ($dropdownContacts as $item): ?>
              <?php $isWa = str_starts_with($item->href, 'https://wa.me'); ?>
              <?php if ($isWa && $item !== $dropdownContacts[0]): ?>
                <!-- Separator before non-WA items -->
              <?php endif; ?>
              <?php
                // Insert divider before the first non-WhatsApp item
                $prevIsWa = isset($prevWa) ? $prevWa : true;
                $currIsWa = $isWa;
                if ($prevIsWa && !$currIsWa):
              ?>
                <div class="h-px bg-white/10 my-1 mx-3"></div>
              <?php endif; ?>
              <?php $prevWa = $isWa; ?>

              <a href="<?= esc($item->href) ?>"
                 <?= $item->external ? 'target="_blank" rel="noopener noreferrer"' : '' ?>
                 @click="drop = false"
                 class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-white/5 transition-colors group/item">
                <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0 <?= esc($item->iconBgClass) ?>">
                  <?= $item->svgHtml ?>
                </div>
                <div class="min-w-0">
                  <p class="text-white/40 text-[0.68rem]"><?= esc($item->label) ?></p>
                  <p class="text-white group-hover/item:text-[#C9973B] transition-colors text-[0.88rem] font-medium truncate">
                    <?= esc($item->value) ?>
                  </p>
                </div>
              </a>
            <?php endforeach; ?>
          </div>

          <div class="px-5 py-3 border-t border-white/10 bg-white/[0.03]">
            <p class="text-white/30 text-center text-[0.72rem] font-light">Seg–Sex 08h–18h · Sáb 08h–13h</p>
          </div>
        </div>
      </div><!-- /dropdown -->

      <!-- Hamburger (mobile) -->
      <button
        @click="mob = !mob"
        :aria-expanded="mob.toString()"
        aria-label="Abrir menu"
        class="md:hidden p-2 text-white/80 hover:text-[#C9973B] transition-colors">
        <svg x-show="!mob" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <line x1="4" x2="20" y1="6"  y2="6"/><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="18" y2="18"/>
        </svg>
        <svg x-show="mob" x-cloak xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
        </svg>
      </button>

    </div><!-- /cta + hamburger -->
  </nav>

  <!-- ── Mobile menu ───────────────────────────────────────────────────── -->
  <div
    x-show="mob" x-cloak
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2"
    class="md:hidden bg-[#0D0D0D]/98 backdrop-blur-lg border-t border-white/10"
    role="navigation" aria-label="Menu mobile">

    <nav class="px-6 py-6">
      <!-- Nav links -->
      <ul class="flex flex-col gap-1 list-none mb-6">
        <?php foreach ($navLinks as $link): ?>
          <li>
            <a href="<?= esc($link->href) ?>"
               @click="mob = false"
               class="block py-2.5 text-white/75 hover:text-[#C9973B] border-b border-white/5 transition-colors font-light">
              <?= esc($link->label) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

      <!-- Contact items -->
      <p class="text-white/30 uppercase tracking-widest text-[0.65rem] mb-3">Solicitar Orçamento</p>
      <div class="flex flex-col gap-2">
        <?php foreach ($dropdownContacts as $item): ?>
          <a href="<?= esc($item->href) ?>"
             <?= $item->external ? 'target="_blank" rel="noopener noreferrer"' : '' ?>
             @click="mob = false"
             class="flex items-center gap-3 px-4 py-3 bg-white/5 hover:bg-white/10 rounded-xl transition-colors">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0 <?= esc($item->iconBgClass) ?>">
              <?= $item->svgHtml ?>
            </div>
            <div>
              <p class="text-white/40 text-[0.68rem]"><?= esc($item->label) ?></p>
              <p class="text-white text-sm font-medium"><?= esc($item->value) ?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </nav>
  </div><!-- /mobile menu -->

</header>
<!-- ===== /NAVBAR ===== -->
