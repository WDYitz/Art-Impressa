<?php
// components/contact.php — Contact info section (no form per spec)

$contactCards = [
    [
        'svgInner' => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
        'label'    => 'Endereço',
        'html'     => 'Rua das Artes Gráficas, 245<br>São Paulo – SP, 01310-000',
    ],
    [
        'svgInner' => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.99 12 19.79 19.79 0 0 1 1.9 3.39 2 2 0 0 1 3.89 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'label'    => 'Telefone',
        'html'     => '<a href="tel:+551134567890" class="hover:text-[#C9973B] transition-colors">(11) 3456-7890</a><br><a href="https://wa.me/5511998765432" class="hover:text-[#C9973B] transition-colors">(11) 99876-5432</a>',
    ],
    [
        'svgInner' => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
        'label'    => 'E-mail',
        'html'     => '<a href="mailto:' . SITE_EMAIL . '" class="hover:text-[#C9973B] transition-colors">' . SITE_EMAIL . '</a><br><a href="mailto:orcamento@artimpressa.com.br" class="hover:text-[#C9973B] transition-colors">orcamento@artimpressa.com.br</a>',
    ],
    [
        'svgInner' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'label'    => 'Horário',
        'html'     => 'Seg–Sex: 08h às 18h<br>Sáb: 08h às 13h',
    ],
];
?>

<!-- ===== CONTACT ===== -->
<section
  id="contact"
  class="bg-[#F7F4EF] py-28 scroll-mt-20"
  aria-label="Informações de contato da <?= esc(SITE_NAME) ?>">

  <div class="max-w-7xl mx-auto px-6 md:px-12">

    <!-- ── Section header ────────────────────────────────────────────── -->
    <header class="text-center mb-16 reveal">
      <div class="flex items-center justify-center gap-3 mb-5">
        <span class="w-8 h-px bg-[#C9973B]" aria-hidden="true"></span>
        <span class="text-[#C9973B] uppercase tracking-widest text-[0.75rem] font-medium">Entre em Contato</span>
        <span class="w-8 h-px bg-[#C9973B]" aria-hidden="true"></span>
      </div>
      <h2 class="text-[#0D0D0D]"
          style="font-family:'Playfair Display',serif;font-size:clamp(2rem,4vw,3rem);font-weight:800;line-height:1.2;">
        Vamos Criar Algo <em class="not-italic italic text-[#C9973B]">Extraordinário</em>
      </h2>
    </header>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

      <!-- ── Left: info cards ──────────────────────────────────────────── -->
      <div class="reveal-left">
        <p class="text-[#4A4A4A] mb-8 font-light" style="font-size:1rem;line-height:1.8;">
          Entre em contato conosco para discutir seu projeto. Nossa equipe especializada está pronta
          para oferecer o melhor orçamento e orientar você sobre as melhores soluções gráficas para sua necessidade.
        </p>

        <address class="not-italic grid grid-cols-1 sm:grid-cols-2 gap-4" aria-label="Informações de contato">
          <?php foreach ($contactCards as $idx => $card): ?>
            <div class="reveal <?= stagger($idx, 2) ?> bg-white p-5 rounded-xl border border-[#E8E0D5] hover:border-[#C9973B]/40 transition-colors">
              <div class="w-10 h-10 bg-[#C9973B]/10 rounded-lg flex items-center justify-center mb-3" aria-hidden="true">
                <?= svg_icon(inner: $card['svgInner'], size: 16, stroke: COLOR_GOLD) ?>
              </div>
              <p class="text-[#0D0D0D] font-semibold text-[0.85rem] mb-1"><?= esc($card['label']) ?></p>
              <p class="text-[#717182] font-light text-[0.82rem]" style="line-height:1.6;">
                <?= $card['html'] /* pre-built HTML, links already sanitised in data */ ?>
              </p>
            </div>
          <?php endforeach; ?>
        </address>
      </div>

      <!-- ── Right: CTA card ───────────────────────────────────────────── -->
      <div class="reveal-right flex flex-col gap-5 justify-center">

        <div class="bg-white rounded-2xl p-8 border border-[#E8E0D5] shadow-sm">
          <h3 class="text-[#0D0D0D] mb-2" style="font-family:'Playfair Display',serif;font-size:1.4rem;font-weight:700;">
            Fale Conosco Agora
          </h3>
          <p class="text-[#4A4A4A] font-light mb-6" style="font-size:0.9rem;line-height:1.7;">
            Escolha o canal mais conveniente para você. Respondemos rapidamente!
          </p>

          <!-- WhatsApp Comercial -->
          <a href="https://wa.me/5511998765432"
             target="_blank" rel="noopener noreferrer"
             aria-label="WhatsApp Comercial – (11) 99876-5432"
             class="flex items-center justify-center gap-3 bg-[#25D366] hover:bg-[#20b858] text-white rounded-xl py-4 mb-3 transition-colors font-semibold">
            <?= wa_svg('w-5 h-5 flex-shrink-0') ?>
            WhatsApp Comercial – (11) 99876-5432
          </a>

          <!-- WhatsApp Suporte -->
          <a href="https://wa.me/5511976543210"
             target="_blank" rel="noopener noreferrer"
             aria-label="WhatsApp Suporte – (11) 97654-3210"
             class="flex items-center justify-center gap-3 bg-[#25D366]/10 hover:bg-[#25D366] text-[#25D366] hover:text-white border border-[#25D366]/30 rounded-xl py-3.5 mb-3 transition-all font-semibold text-[0.9rem]">
            <?= wa_svg('w-5 h-5 flex-shrink-0') ?>
            WhatsApp Suporte – (11) 97654-3210
          </a>

          <!-- E-mail -->
          <a href="mailto:orcamento@artimpressa.com.br"
             aria-label="E-mail para orçamento"
             class="flex items-center justify-center gap-3 bg-[#C9973B]/10 hover:bg-[#C9973B] text-[#C9973B] hover:text-[#0D0D0D] border border-[#C9973B]/30 rounded-xl py-3.5 transition-all font-semibold text-[0.9rem]">
            <?= svg_icon(
                inner:  '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
                size:   16,
                stroke: 'currentColor',
            ) ?>
            orcamento@artimpressa.com.br
          </a>
        </div>

        <!-- Location hint -->
        <p class="text-center text-[#717182] text-[0.82rem] font-light">
          📍 <?= esc(SITE_ADDRESS) ?>
        </p>

      </div><!-- /right -->
    </div>
  </div>
</section>
<!-- ===== /CONTACT ===== -->
