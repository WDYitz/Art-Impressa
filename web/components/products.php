<?php
// ============================================================
// INSTRUÇÕES DE INTEGRAÇÃO
// 1. Adicione os dados de fotos ao array $products:
//    $product->photos = ['url1.jpg', 'url2.jpg', ...];
//    $product->photos_alt = ['Alt 1', 'Alt 2', ...]; // opcional
// 2. Inclua este arquivo no seu layout principal (antes do </body>)
// 3. Cole o CSS dentro do seu <style> global ou arquivo CSS
// ============================================================
?>

<!-- ===== PRODUCTS ===== -->
<section
  id="products"
  class="bg-[#0D0D0D] py-28 scroll-mt-20"
  aria-label="Produtos e serviços de impressão da <?= esc(SITE_NAME) ?>">
  <div class="max-w-7xl mx-auto px-6 md:px-12">
    <!-- Section header -->
    <header class="text-center mb-16 reveal">
      <div class="flex items-center justify-center gap-3 mb-5">
        <span class="w-8 h-px bg-[#64d4f6]" aria-hidden="true"></span>
        <span class="text-[#64d4f6] uppercase tracking-widest text-[0.75rem] font-medium">Nossos Produtos</span>
        <span class="w-8 h-px bg-[#64d4f6]" aria-hidden="true"></span>
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
    <!-- Cards grid -->
    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 list-none p-0 m-0"
      aria-label="Lista de produtos e serviços">
      <?php foreach ($products as $i => $product): ?>
        <li class="reveal <?= stagger($i) ?>">
          <article
            class="card-hover group relative bg-white/5 hover:bg-white/10 rounded-2xl border border-white/10
                   hover:border-[#fff182]/50 transition-all duration-500 overflow-hidden h-full
                   product-card cursor-pointer"
            aria-label="<?= esc($product->name) ?>"
            role="button"
            tabindex="0"
            data-product-id="<?= $i ?>"
            data-product-name="<?= esc($product->name) ?>"
            data-product-category="<?= esc($product->category) ?>"
            data-product-description="<?= esc($product->description) ?>"
            data-product-photos='<?= json_encode($product->photos ?? []) ?>'
            data-product-photos-alt='<?= json_encode($product->photos_alt ?? []) ?>'>
            <div class="p-7 flex flex-col gap-4 h-full">
              <!-- Category + badge + arrow row -->
              <div class="flex items-center justify-between">
                <?php if ($product->photos): ?>
                  <img src="<?= esc($product->photos[0]) ?>" alt="<?= esc($product->name) ?>" class="w-14 h-14 object-cover rounded-lg mb-3">
                <?php endif; ?>
               
                <div class="flex items-center gap-2">
                  <!-- <?php if ($product->badge !== null): ?>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold <?= esc($product->badge->cssClass()) ?>">
                      <?= esc($product->badge->value) ?>
                    </span>
                  <?php endif; ?> -->
                  <!-- Ícone de galeria (substitui o de seta) -->
                  <div class="w-8 h-8 bg-[#fff182]/10 group-hover:bg-[#fff182] rounded-full flex items-center justify-center
                               opacity-0 group-hover:opacity-100 transition-all duration-300 product-gallery-icon" aria-hidden="true">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#0D0D0D" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                      <rect x="3" y="3" width="18" height="18" rx="2" />
                      <circle cx="8.5" cy="8.5" r="1.5" />
                      <polyline points="21 15 16 10 5 21" />
                    </svg>
                  </div>
                </div>
              </div>
              <!-- Title -->
              <h3 class="text-white"
                style="font-family:'Playfair Display',serif;font-size:1.25rem;font-weight:700;line-height:1.3;">
                <?= esc($product->name) ?>
              </h3>
              <!-- Description -->
              <!-- <p class="text-white/50 group-hover:text-white/70 transition-colors duration-300 font-light mt-auto"
                style="font-size:0.88rem;line-height:1.75;">
                <?= esc($product->description) ?>
              </p> -->
              <!-- "Ver fotos" hint -->
              <div class="flex items-center gap-1.5 transition-opacity duration-300 mt-1">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#ff6f91" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="11" cy="11" r="8" />
                  <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <span style="color:#ff6f91;font-size:0.72rem;font-weight:500;letter-spacing:0.08em;text-transform:uppercase;">
                  Ver Galeria
                </span>
              </div>
            </div>
            <div class="card-accent-line" aria-hidden="true"></div>
          </article>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
<!-- ===== /PRODUCTS ===== -->
<!-- ===== MODAL DE GALERIA COM ZOOM ===== -->
<div id="productGalleryModal" class="pgm-overlay" role="dialog" aria-modal="true" aria-label="Galeria de fotos" hidden>
  <div class="pgm-backdrop"></div>
  <div class="pgm-container">
    <!-- Header -->
    <div class="pgm-header">
      <div>
        <span class="pgm-category" id="pgm-category"></span>
        <h2 class="pgm-title" id="pgm-title"></h2>
      </div>
      <button class="pgm-close" id="pgm-close" aria-label="Fechar galeria">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
          <line x1="18" y1="6" x2="6" y2="18" />
          <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
      </button>
    </div>
    <!-- Main image with zoom -->
    <div class="pgm-main-wrap">
      <div class="pgm-zoom-area" id="pgm-zoom-area">
        <img id="pgm-main-img" src="" alt="" class="pgm-main-img" draggable="false" />
        <!-- Zoom lens indicator -->
        <div class="pgm-zoom-cursor" id="pgm-zoom-cursor" aria-hidden="true">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
            <circle cx="11" cy="11" r="8" />
            <line x1="21" y1="21" x2="16.65" y2="16.65" />
            <line x1="11" y1="8" x2="11" y2="14" />
            <line x1="8" y1="11" x2="14" y2="11" />
          </svg>
        </div>
      </div>
      <!-- Zoom controls -->
      <div class="pgm-zoom-controls" role="group" aria-label="Controles de zoom">
        <button class="pgm-zoom-btn" id="pgm-zoom-out" aria-label="Diminuir zoom" title="Diminuir zoom">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
            <circle cx="11" cy="11" r="8" />
            <line x1="21" y1="21" x2="16.65" y2="16.65" />
            <line x1="8" y1="11" x2="14" y2="11" />
          </svg>
        </button>
        <span class="pgm-zoom-level" id="pgm-zoom-level">100%</span>
        <button class="pgm-zoom-btn" id="pgm-zoom-in" aria-label="Aumentar zoom" title="Aumentar zoom">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
            <circle cx="11" cy="11" r="8" />
            <line x1="21" y1="21" x2="16.65" y2="16.65" />
            <line x1="11" y1="8" x2="11" y2="14" />
            <line x1="8" y1="11" x2="14" y2="11" />
          </svg>
        </button>
        <button class="pgm-zoom-btn" id="pgm-zoom-reset" aria-label="Resetar zoom" title="Resetar zoom">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
            <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
            <path d="M3 3v5h5" />
          </svg>
        </button>
      </div>
      <!-- Nav arrows -->
      <button class="pgm-nav pgm-nav-prev" id="pgm-prev" aria-label="Foto anterior">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
          <polyline points="15 18 9 12 15 6" />
        </svg>
      </button>
      <button class="pgm-nav pgm-nav-next" id="pgm-next" aria-label="Próxima foto">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
          <polyline points="9 18 15 12 9 6" />
        </svg>
      </button>
      <!-- Counter -->
      <div class="pgm-counter" id="pgm-counter" aria-live="polite"></div>
      <!-- Empty state -->
      <div class="pgm-empty" id="pgm-empty" hidden>
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#C9973B" stroke-width="1.5" stroke-linecap="round">
          <rect x="3" y="3" width="18" height="18" rx="2" />
          <circle cx="8.5" cy="8.5" r="1.5" />
          <polyline points="21 15 16 10 5 21" />
        </svg>
        <p>Nenhuma foto disponível para este produto.</p>
      </div>
    </div>
    <!-- Thumbnails -->
    <div class="pgm-thumbs" id="pgm-thumbs" role="listbox" aria-label="Miniaturas das fotos"></div>
    <!-- Description -->
    <p class="pgm-description" id="pgm-description"></p>
  </div>
</div>
<!-- ===== /MODAL ===== -->
<script>
  (function() {
    'use strict';
    /* ── State ── */
    const state = {
      photos: [],
      alts: [],
      current: 0,
      zoom: 1,
      minZoom: 1,
      maxZoom: 4,
      zoomStep: 0.5,
      panX: 0,
      panY: 0,
      isDragging: false,
      dragStartX: 0,
      dragStartY: 0,
      panStartX: 0,
      panStartY: 0,
    };
    /* ── Elements ── */
    const modal = document.getElementById('productGalleryModal');
    const backdrop = modal.querySelector('.pgm-backdrop');
    const container = modal.querySelector('.pgm-container');
    const closeBtn = document.getElementById('pgm-close');
    const mainImg = document.getElementById('pgm-main-img');
    const zoomArea = document.getElementById('pgm-zoom-area');
    const thumbsEl = document.getElementById('pgm-thumbs');
    const prevBtn = document.getElementById('pgm-prev');
    const nextBtn = document.getElementById('pgm-next');
    const counterEl = document.getElementById('pgm-counter');
    const zoomInBtn = document.getElementById('pgm-zoom-in');
    const zoomOutBtn = document.getElementById('pgm-zoom-out');
    const zoomReset = document.getElementById('pgm-zoom-reset');
    const zoomLevel = document.getElementById('pgm-zoom-level');
    const titleEl = document.getElementById('pgm-title');
    const categoryEl = document.getElementById('pgm-category');
    const descEl = document.getElementById('pgm-description');
    const emptyEl = document.getElementById('pgm-empty');
    /* ── Open modal ── */
    function openModal(card) {
      const photos = JSON.parse(card.dataset.productPhotos || '[]');
      const alts = JSON.parse(card.dataset.productPhotosAlt || '[]');
      const name = card.dataset.productName || '';
      const category = card.dataset.productCategory || '';
      const description = card.dataset.productDescription || '';
      state.photos = photos;
      state.alts = alts;
      state.current = 0;
      resetZoom(false);
      titleEl.textContent = name;
      categoryEl.textContent = category;
      descEl.textContent = description;
      buildThumbs();
      showEmpty(photos.length === 0);
      if (photos.length > 0) setImage(0);
      modal.hidden = false;
      requestAnimationFrame(() => modal.classList.add('pgm-visible'));
      document.body.style.overflow = 'hidden';
      closeBtn.focus();
    }

    function closeModal() {
      modal.classList.remove('pgm-visible');
      setTimeout(() => {
        modal.hidden = true;
        document.body.style.overflow = '';
        mainImg.src = '';
      }, 350);
    }
    /* ── Image ── */
    function setImage(index) {
      if (!state.photos.length) return;
      index = Math.max(0, Math.min(index, state.photos.length - 1));
      state.current = index;
      resetZoom(false);
      mainImg.classList.add('loading');
      const src = state.photos[index];
      const alt = state.alts[index] || `Foto ${index + 1}`;
      const tmp = new Image();
      tmp.onload = () => {
        mainImg.src = src;
        mainImg.alt = alt;
        mainImg.classList.remove('loading');
      };
      tmp.onerror = () => {
        mainImg.src = src; // fallback — mostra broken
        mainImg.classList.remove('loading');
      };
      tmp.src = src;
      updateCounter();
      updateNavBtns();
      updateThumbs();
    }

    function showEmpty(show) {
      emptyEl.hidden = !show;
      zoomArea.style.visibility = show ? 'hidden' : 'visible';
      prevBtn.hidden = show;
      nextBtn.hidden = show;
      counterEl.hidden = show;
    }
    /* ── Thumbnails ── */
    function buildThumbs() {
      thumbsEl.innerHTML = '';
      thumbsEl.hidden = state.photos.length <= 1;
      state.photos.forEach((src, i) => {
        const div = document.createElement('div');
        div.className = 'pgm-thumb' + (i === 0 ? ' active' : '');
        div.setAttribute('role', 'option');
        div.setAttribute('aria-selected', i === 0 ? 'true' : 'false');
        div.setAttribute('aria-label', `Foto ${i + 1}`);
        div.tabIndex = 0;
        const img = document.createElement('img');
        img.src = src;
        img.alt = state.alts[i] || `Foto ${i + 1}`;
        img.loading = 'lazy';
        div.appendChild(img);
        div.addEventListener('click', () => setImage(i));
        div.addEventListener('keydown', e => e.key === 'Enter' && setImage(i));
        thumbsEl.appendChild(div);
      });
    }

    function updateThumbs() {
      const thumbs = thumbsEl.querySelectorAll('.pgm-thumb');
      thumbs.forEach((t, i) => {
        t.classList.toggle('active', i === state.current);
        t.setAttribute('aria-selected', i === state.current ? 'true' : 'false');
      });
      const active = thumbs[state.current];
      if (active) active.scrollIntoView({
        behavior: 'smooth',
        block: 'nearest',
        inline: 'center'
      });
    }

    function updateCounter() {
      counterEl.textContent = `${state.current + 1} / ${state.photos.length}`;
    }

    function updateNavBtns() {
      prevBtn.disabled = state.current <= 0;
      nextBtn.disabled = state.current >= state.photos.length - 1;
    }
    /* ── Zoom ── */
    function applyZoom(animate = true) {
      if (!animate) mainImg.classList.add('no-transition');
      mainImg.style.transform = `scale(${state.zoom}) translate(${state.panX / state.zoom}px, ${state.panY / state.zoom}px)`;
      zoomLevel.textContent = Math.round(state.zoom * 100) + '%';
      zoomArea.classList.toggle('zoomed', state.zoom > 1);
      if (!animate) requestAnimationFrame(() => mainImg.classList.remove('no-transition'));
    }

    function clampPan() {
      const rect = zoomArea.getBoundingClientRect();
      const maxPanX = (rect.width * (state.zoom - 1)) / 2;
      const maxPanY = (rect.height * (state.zoom - 1)) / 2;
      state.panX = Math.max(-maxPanX, Math.min(maxPanX, state.panX));
      state.panY = Math.max(-maxPanY, Math.min(maxPanY, state.panY));
    }

    function resetZoom(animate = true) {
      state.zoom = 1;
      state.panX = 0;
      state.panY = 0;
      applyZoom(animate);
    }

    function changeZoom(delta, cx, cy) {
      const rect = zoomArea.getBoundingClientRect();
      const oldZoom = state.zoom;
      state.zoom = Math.max(state.minZoom, Math.min(state.maxZoom, state.zoom + delta));
      if (state.zoom === oldZoom) return;
      // Zoom toward mouse/center
      const pivotX = (cx != null ? cx - rect.left : rect.width / 2) - rect.width / 2;
      const pivotY = (cy != null ? cy - rect.top : rect.height / 2) - rect.height / 2;
      state.panX += pivotX * (1 - state.zoom / oldZoom);
      state.panY += pivotY * (1 - state.zoom / oldZoom);
      clampPan();
      applyZoom();
    }
    /* ── Wheel zoom ── */
    zoomArea.addEventListener('wheel', e => {
      e.preventDefault();
      const delta = e.deltaY < 0 ? state.zoomStep : -state.zoomStep;
      changeZoom(delta, e.clientX, e.clientY);
    }, {
      passive: false
    });
    /* ── Click to toggle zoom ── */
    zoomArea.addEventListener('click', e => {
      if (state.isDragging) return;
      if (state.zoom === 1) {
        changeZoom(1, e.clientX, e.clientY);
      } else {
        resetZoom();
      }
    });
    /* ── Drag to pan ── */
    zoomArea.addEventListener('mousedown', e => {
      if (state.zoom <= 1) return;
      state.isDragging = false; // track real drag vs click
      state.dragStartX = e.clientX;
      state.dragStartY = e.clientY;
      state.panStartX = state.panX;
      state.panStartY = state.panY;
      zoomArea.classList.add('dragging');

      function onMove(e) {
        const dx = e.clientX - state.dragStartX;
        const dy = e.clientY - state.dragStartY;
        if (Math.abs(dx) > 3 || Math.abs(dy) > 3) state.isDragging = true;
        state.panX = state.panStartX + dx;
        state.panY = state.panStartY + dy;
        clampPan();
        applyZoom(false);
      }

      function onUp() {
        zoomArea.classList.remove('dragging');
        document.removeEventListener('mousemove', onMove);
        document.removeEventListener('mouseup', onUp);
        setTimeout(() => {
          state.isDragging = false;
        }, 50);
      }
      document.addEventListener('mousemove', onMove);
      document.addEventListener('mouseup', onUp);
    });
    /* ── Touch pan/pinch ── */
    let lastTouchDist = null;
    zoomArea.addEventListener('touchstart', e => {
      if (e.touches.length === 2) {
        lastTouchDist = Math.hypot(
          e.touches[0].clientX - e.touches[1].clientX,
          e.touches[0].clientY - e.touches[1].clientY
        );
      } else {
        state.dragStartX = e.touches[0].clientX;
        state.dragStartY = e.touches[0].clientY;
        state.panStartX = state.panX;
        state.panStartY = state.panY;
      }
    }, {
      passive: true
    });
    zoomArea.addEventListener('touchmove', e => {
      e.preventDefault();
      if (e.touches.length === 2) {
        const dist = Math.hypot(
          e.touches[0].clientX - e.touches[1].clientX,
          e.touches[0].clientY - e.touches[1].clientY
        );
        if (lastTouchDist) {
          const cx = (e.touches[0].clientX + e.touches[1].clientX) / 2;
          const cy = (e.touches[0].clientY + e.touches[1].clientY) / 2;
          changeZoom((dist - lastTouchDist) * 0.01, cx, cy);
        }
        lastTouchDist = dist;
      } else if (state.zoom > 1) {
        state.panX = state.panStartX + e.touches[0].clientX - state.dragStartX;
        state.panY = state.panStartY + e.touches[0].clientY - state.dragStartY;
        clampPan();
        applyZoom(false);
      }
    }, {
      passive: false
    });
    zoomArea.addEventListener('touchend', () => {
      lastTouchDist = null;
    });
    /* ── Zoom buttons ── */
    zoomInBtn.addEventListener('click', () => changeZoom(state.zoomStep));
    zoomOutBtn.addEventListener('click', () => changeZoom(-state.zoomStep));
    zoomReset.addEventListener('click', () => resetZoom());
    /* ── Navigation ── */
    prevBtn.addEventListener('click', () => setImage(state.current - 1));
    nextBtn.addEventListener('click', () => setImage(state.current + 1));
    /* ── Close ── */
    closeBtn.addEventListener('click', closeModal);
    backdrop.addEventListener('click', closeModal);
    document.addEventListener('keydown', e => {
      if (modal.hidden) return;
      if (e.key === 'Escape') closeModal();
      if (e.key === 'ArrowRight') setImage(state.current + 1);
      if (e.key === 'ArrowLeft') setImage(state.current - 1);
      if (e.key === '+') changeZoom(state.zoomStep);
      if (e.key === '-') changeZoom(-state.zoomStep);
      if (e.key === '0') resetZoom();
    });
    /* ── Attach cards ── */
    document.querySelectorAll('.product-card').forEach(card => {
      card.addEventListener('click', () => openModal(card));
      card.addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          openModal(card);
        }
      });
    });
  })();
</script>