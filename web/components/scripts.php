<?php // components/scripts.php — CDN scripts + IntersectionObserver animations ?>
<!-- ── Flowbite 2.3.0 JS ──────────────────────────────────────────────────── -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<!-- ===== SCRIPTS ===== -->
<script>
(function () {
  'use strict';

  // ── Scroll-reveal IntersectionObserver ─────────────────────────────────────
  const revealSelectors = ['.reveal', '.reveal-left', '.reveal-right', '.reveal-scale'];
  const revealEls = document.querySelectorAll(revealSelectors.join(','));

  const revealObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          revealObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12, rootMargin: '0px 0px -60px 0px' }
  );

  revealEls.forEach((el) => revealObserver.observe(el));

  // ── Quote section: word-rise animation ─────────────────────────────────────
  const quoteSection = document.getElementById('quote');
  const quoteLine    = document.getElementById('quote-line');
  const quoteAuthor  = document.getElementById('quote-author');
  const quoteWords   = document.querySelectorAll('#quote-words .qword');

  let quoteTriggered = false;

  const quoteObserver = new IntersectionObserver(
    (entries) => {
      if (!entries[0].isIntersecting || quoteTriggered) return;
      quoteTriggered = true;

      // Stagger each word into view
      quoteWords.forEach((word, i) => {
        word.style.animationDelay = (0.3 + i * 0.07) + 's';
        word.classList.add('on');
      });

      // Reveal the divider line then author attribution
      const delay = quoteWords.length * 70 + 900;

      setTimeout(() => {
        if (quoteLine)  quoteLine.style.transform = 'scaleX(1)';

        setTimeout(() => {
          if (quoteAuthor) {
            quoteAuthor.style.opacity   = '1';
            quoteAuthor.style.transform = 'translateY(0)';
          }
        }, 600);
      }, delay);

      quoteObserver.disconnect();
    },
    { threshold: 0.25 }
  );

  if (quoteSection) quoteObserver.observe(quoteSection);
})();
</script>
