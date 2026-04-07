<?php // components/about.php — About section with highlights grid 
?>

<!-- ABOUT  -->
<section
  id="about"
  class="bg-[#F7F4EF] py-28 overflow-visible scroll-mt-20"
  aria-label="Sobre a <?= esc(SITE_NAME) ?>">

  <div class="max-w-7xl mx-auto px-6 md:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

      <!-- ── Image column ────────────────────────────────────────────── -->
      <div class="relative reveal-left">
        <div class="relative rounded-2xl overflow-hidden shadow-2xl" style="aspect-ratio:4/5;">
          <img
            src="https://images.unsplash.com/photo-1716540103530-cc33cdd20cde?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Equipe da <?= esc(SITE_NAME) ?> trabalhando na produção gráfica em São Paulo"
            class="w-full h-full object-cover"
            loading="lazy" />
        </div>

        <!-- Floating stat card -->
        <aside
          aria-label="15 anos de experiência"
          class="reveal-scale d5 absolute -bottom-8 -right-4 md:-right-8 bg-[#0D0D0D] text-white p-6 rounded-2xl shadow-2xl w-48 md:w-52">
          <p style="font-family:'Playfair Display',serif;font-size:3rem;font-weight:800;color:#C9973B;line-height:1;" aria-hidden="true">
            20+
          </p>
          <p class="text-[0.85rem] font-light opacity-80 mt-2" style="line-height:1.4;">
            Anos de excelência em impressão gráfica
          </p>
        </aside>

        <!-- Decorative gold border -->
        <div class="absolute -top-4 -left-4 w-24 h-24 border-2 border-[#C9973B] rounded-2xl -z-0 opacity-40" aria-hidden="true"></div>
      </div>

      <!-- ── Text column ─────────────────────────────────────────────── -->
      <div class="reveal-right mt-12 lg:mt-0">

        <!-- Eyebrow -->
        <div class="flex items-center gap-3 mb-5">
          <span class="w-8 h-px bg-[#C9973B]" aria-hidden="true"></span>
          <span class="text-[#C9973B] uppercase tracking-widest text-[0.75rem] font-medium">Sobre Nós</span>
        </div>

        <h2 class="text-[#0D0D0D] mb-6"
          style="font-family:'Playfair Display',serif;font-size:clamp(2rem,3.5vw,3rem);font-weight:800;line-height:1.2;">
          Transformamos Ideias em
          <em class="not-italic italic text-[#C9973B]">Impressões Inesquecíveis</em>
        </h2>

        <p class="text-[#4A4A4A] mb-5 font-light" style="font-size:1rem;line-height:1.8;">
          Somos uma empresa com mais de 20 anos de experiência no mercado gráfico, atuando desde 2004.
        </p>
        <p class="text-[#4A4A4A] mb-10 font-light" style="font-size:1rem;line-height:1.8;">
          Visando atender empresas de diferentes portes e segmentos, trazendo inovação e personalidade em seus produtos, transformando suas ideias em arte.
        </p>
        <p class="text-[#4A4A4A] mb-5 font-light" style="font-size:1rem;line-height:1.8;">
          A Art Impressa busca a melhor qualidade e satisfação de seus clientes, desde o atendimento até o resultado final.
        </p>
        <p class="text-[#4A4A4A] mb-5 font-light" style="font-size:1rem;line-height:1.8;">
          Utilizando a tecnologia como uma ferramenta primordial em nosso trabalho, podemos garantir a excelência dos nossos serviços.
        </p>

        <!-- Highlights grid -->
        <!-- <ul class="grid grid-cols-2 gap-4 list-none p-0 m-0" aria-label="Diferenciais da <?= esc(SITE_NAME) ?>">
          <?php foreach ($highlights as $i => $h): ?>
            <li class="reveal <?= stagger($i) ?> flex items-start gap-3 bg-white p-4 rounded-xl border border-[#E8E0D5] hover:border-[#C9973B]/50 transition-colors">
              <div class="w-9 h-9 bg-[#C9973B]/10 rounded-lg flex items-center justify-center flex-shrink-0" aria-hidden="true">
                <?= svg_icon(inner: $h->svgInner, size: 16, stroke: COLOR_GOLD) ?>
              </div>
              <div>
                <p class="text-[#0D0D0D] font-semibold text-[0.9rem]"><?= esc($h->label) ?></p>
                <p class="text-[#717182] font-light text-[0.8rem]"><?= esc($h->desc) ?></p>
              </div>
            </li>
          <?php endforeach; ?>
        </ul> -->

      </div><!-- /text column -->
    </div>
  </div>
</section>
<!-- ===== /ABOUT ===== -->