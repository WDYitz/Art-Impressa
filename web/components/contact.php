<?php
// components/contact.php — Contact info section (no form per spec)
$contactCards = [
  [
    'svgInner' => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
    'label' => 'Endereço',
    'html' => 'Avenida Jaguaribe, 353<br>São Paulo – SP, 06050-020',
  ],
  [
    'svgInner' => '<path d="M11 9h4a1 1 0 0 1 0 2h-5a1 1 0 0 1-1-1V4a1 1 0 1 1 2 0v5zm-1 11C4.477 20 0 15.523 0 10S4.477 0 10 0s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/>',
    'label' => 'Horario de Atendimento',
    'html' => 'Segunda a sexta 08h–18h </br> Sábado e Domingo Fechado',
  ],
];
?>
<!-- ===== CONTACT ===== -->
<section
  id="contact"
  class="bg-[#F7F4EF] py-28 scroll-mt-20"
  aria-label="Informações de contato da <?= esc(SITE_NAME) ?>">
  <div class="max-w-7xl mx-auto px-6 md:px-12">
    <!-- Section header  -->
    <header class="text-center mb-16 reveal">
      <div class="flex items-center justify-center gap-3 mb-5">
        <span class="w-8 h-px bg-[#C9973B]" aria-hidden="true"></span>
        <span class="text-[#C9973B] uppercase tracking-widest text-[0.75rem] font-medium">Entre em Contato</span>
        <span class="w-8 h-px bg-[#C9973B]" aria-hidden="true"></span>
      </div>
      <h2 class="text-[#0D0D0D]"
        style="font-family:'Playfair Display',serif;font-size:clamp(2rem,4vw,3rem);font-weight:800;line-height:1.2;">
        Fale Conosco Agora
      </h2>
    </header>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      <!--Left: info cards  -->
      <div class="reveal-left">
        <p class="text-[#4A4A4A] mb-8 font-light" style="font-size:1rem;line-height:1.8;">
          Entre em contato conosco para discutir seu projeto. Nossa equipe está pronta
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
      <!-- Right: CTA card -->
      <div class="reveal-right flex flex-col gap-5 justify-center">
        <div class="bg-white rounded-2xl p-8 border border-[#E8E0D5] shadow-sm">
          <p class="text-[#4A4A4A] font-light mb-6" style="font-size:0.9rem;line-height:1.7;">
            Escolha o canal mais conveniente para você. Respondemos rapidamente!
          </p>
          <!-- WhatsApp Comercial -->
          <a href="https://wa.me/5511998765432"
            target="_blank" rel="noopener noreferrer"
            aria-label="WhatsApp  – (11) 99855-7757"
            class="flex items-center justify-center gap-3 bg-[#25D366] hover:bg-[#20b858] text-white rounded-xl py-4 mb-3 transition-colors font-semibold">
            <?= wa_svg('w-5 h-5 flex-shrink-0', '#ffffff') ?>
            WhatsApp – (11) 99855-7757
          </a>
          <!-- WhatsApp Suporte -->
          <a href="https://wa.me/5511976543210"
            target="_blank" rel="noopener noreferrer"
            aria-label="WhatsApp  – (11) 99827-0726"
            class="flex items-center justify-center gap-3 bg-[#25D366]/10  text-[#25D366] border border-[#25D366]/30 rounded-xl py-3.5 mb-3 transition-all font-semibold text-[0.9rem]">
            <?= wa_svg('w-5 h-5 flex-shrink-0') ?>
            WhatsApp – (11) 99827-0726
          </a>
          <!-- E-mail -->
          <a href="mailto:eduardoartgraf@uol.com.br"
            aria-label="E-mail para orçamento"
            class="flex items-center justify-center gap-3 bg-[#C9973B]/10 hover:bg-[#C9973B] text-[#C9973B] hover:text-[#0D0D0D] border border-[#C9973B]/30 rounded-xl py-3.5 transition-all font-semibold text-[0.9rem]">
            <?= svg_icon(
              inner: '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
              size: 16,
              stroke: 'currentColor',
            ) ?>
            eduardoartgraf@uol.com.br
          </a>
        </div>
      </div><!-- /right -->
    </div>
  </div>
</section>